<?php

namespace App\Support\Site;

use App\Models\Article;
use App\Support\GeoFlow\ImageUrlNormalizer;
use League\CommonMark\GithubFlavoredMarkdownConverter;

/**
 * 文章正文 Markdown 渲染与摘要生成（对齐旧版前台展示习惯）。
 */
final class ArticleHtmlPresenter
{
    /**
     * 将 Markdown 转为 HTML（剥离不安全 HTML 输入）。
     *
     * @param array<int, array{index:int, content:string, id:int|null}> $references
     */
    public static function markdownToHtml(string $markdown, array $references = []): string
    {
        $markdown = self::normalizeMarkdownImages(trim($markdown));
        if ($markdown === '') {
            return '';
        }

        // 如果有引用信息，追加 Footnote 定义
        if (! empty($references)) {
            $markdown .= "\n\n---\n\n"; // 添加分割线
            foreach ($references as $ref) {
                $index = $ref['index'] ?? 0;
                $content = trim($ref['content'] ?? '');
                if ($index > 0 && $content !== '') {
                    // Markdown 脚注定义格式: [^1]: 来源内容
                    $markdown .= "[^{$index}]: {$content}\n";
                }
            }
        }

        $config = [
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
            'footnote' => [
                'backlink_symbol' => '↩',
            ],
        ];

        // GithubFlavoredMarkdownConverter 默认包含 GFM 扩展，
        // 但 CommonMark v2 脚注通常需要手动开启。
        // 这里我们使用基础的 Environment 配置来确保扩展可用。
        $environment = new \League\CommonMark\Environment\Environment($config);
        $environment->addExtension(new \League\CommonMark\Extension\GithubFlavoredMarkdownExtension());
        $environment->addExtension(new \League\CommonMark\Extension\Footnote\FootnoteExtension());
        
        $converter = new \League\CommonMark\MarkdownConverter($environment);

        return self::decorateRenderedHtml($converter->convert($markdown)->getContent());
    }

    /**
     * 从正文中去掉与标题一致的首行 H1，避免详情页重复大标题。
     */
    public static function stripLeadingTitleHeading(string $content, string $title): string
    {
        $content = (string) $content;
        $title = trim($title);
        if ($title === '') {
            return $content;
        }

        $pattern = '/^\s*#\s*'.preg_quote($title, '/').'\s*(?:\r?\n)+/u';

        return (string) preg_replace($pattern, '', $content, 1);
    }

    /**
     * 列表卡片摘要：优先 excerpt，否则从正文抽纯文本片段。
     */
    public static function cardSummary(Article $article, int $limit = 120): string
    {
        $excerpt = trim((string) $article->excerpt);
        if ($excerpt !== '') {
            $excerpt = self::stripLeadingTitleHeading($excerpt, (string) $article->title);
            $excerpt = preg_replace('/!\[[^\]]*\]\([^)]+\)/u', '', $excerpt) ?? $excerpt;
            $plain = self::toPlainLine($excerpt);

            return mb_strlen($plain) > $limit ? mb_substr($plain, 0, $limit).'…' : $plain;
        }

        $body = self::stripLeadingTitleHeading((string) $article->content, (string) $article->title);
        $body = preg_replace('/!\[[^\]]*\]\([^)]+\)/u', '', $body) ?? $body;
        $plain = self::toPlainLine($body);

        return mb_strlen($plain) > $limit ? mb_substr($plain, 0, $limit).'…' : $plain;
    }

    private static function toPlainLine(string $text): string
    {
        $text = preg_replace('/[#*_`>\[\]()]/u', ' ', $text) ?? $text;
        $text = preg_replace('/\s+/u', ' ', $text) ?? $text;

        return trim($text);
    }

    private static function normalizeMarkdownImages(string $markdown): string
    {
        return preg_replace_callback(
            '/!\[([^\]]*)\]\(([^)\s]+)(?:\s+(".*?"|\'.*?\'))?\)/u',
            static function (array $matches): string {
                $alt = ImageUrlNormalizer::readableAlt((string) ($matches[1] ?? ''));
                $url = ImageUrlNormalizer::toPublicUrl((string) ($matches[2] ?? ''));
                $title = trim((string) ($matches[3] ?? ''));

                return '!['.$alt.']('.$url.($title !== '' ? ' '.$title : '').')';
            },
            $markdown
        ) ?? $markdown;
    }

    private static function decorateRenderedHtml(string $html): string
    {
        $html = preg_replace('/<table>/u', '<div class="article-table-wrap"><table class="article-table">', $html) ?? $html;
        $html = preg_replace('/<\/table>/u', '</table></div>', $html) ?? $html;
        
        // Task 3.1: 智能媒体优化 - 将 <img> 包装为 <picture> 以支持 WebP 优先加载
        $html = preg_replace_callback('/<img\b([^>]*)src="([^"]+)"([^>]*)>/u', function ($matches) {
            $attrs1 = $matches[1];
            $src = $matches[2];
            $attrs2 = $matches[3];

            // 检查是否有对应的 .webp 路径
            $webpSrc = preg_replace('/\.(jpe?g|png)$/i', '.webp', $src);
            
            // 如果已经是 webp 或不是本地路径，直接返回原图（带懒加载）
            if ($webpSrc === $src || !str_starts_with($src, '/')) {
                $img = "<img {$attrs1}src=\"{$src}\"{$attrs2}>";
            } else {
                // 构建响应式 picture 标签
                $img = "<picture>";
                $img .= "<source srcset=\"{$webpSrc}\" type=\"image/webp\">";
                $img .= "<img {$attrs1}src=\"{$src}\"{$attrs2}>";
                $img .= "</picture>";
            }

            // 补齐现代属性
            if (!str_contains($img, 'loading=')) {
                $img = str_replace('<img ', '<img loading="lazy" ', $img);
            }
            if (!str_contains($img, 'decoding=')) {
                $img = str_replace('<img ', '<img decoding="async" ', $img);
            }

            return $img;
        }, $html) ?? $html;

        return $html;
    }
}
