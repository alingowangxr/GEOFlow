<?php

namespace App\Services\GeoFlow;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\URL;

/**
 * 动态站点地图服务：生成符合搜尋引擎標準的 XML。
 */
class SitemapService
{
    /**
     * 生成 sitemap.xml 内容。
     */
    public function generate(): string
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // 1. 首页
        $xml .= $this->buildUrlTag(route('site.home'), now()->toIso8601String(), 'daily', '1.0');

        // 2. 分类页
        Category::all()->each(function ($category) use (&$xml) {
            $xml .= $this->buildUrlTag(route('site.category', $category->slug), $category->updated_at->toIso8601String(), 'weekly', '0.6');
        });

        // 3. 文章页 (按权重分配 priority)
        Article::published()->chunk(100, function ($articles) use (&$xml) {
            foreach ($articles as $article) {
                // 专家策略：热门或精选文章赋予更高优先级
                $priority = '0.7';
                if ($article->is_hot || $article->is_featured) {
                    $priority = '0.9';
                }

                $xml .= $this->buildUrlTag(
                    route('site.article', $article->slug),
                    $article->updated_at->toIso8601String(),
                    'weekly',
                    $priority
                );
            }
        });

        $xml .= '</urlset>';

        return $xml;
    }

    private function buildUrlTag(string $url, string $lastMod, string $freq, string $priority): string
    {
        return "<url>
            <loc>{$url}</loc>
            <lastmod>{$lastMod}</lastmod>
            <changefreq>{$freq}</changefreq>
            <priority>{$priority}</priority>
        </url>";
    }
}
