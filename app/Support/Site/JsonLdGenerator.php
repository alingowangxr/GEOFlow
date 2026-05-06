<?php

namespace App\Support\Site;

use App\Models\Article;

/**
 * 结构化数据 (JSON-LD) 生成器，助力 GEO (Generative Engine Optimization)。
 */
class JsonLdGenerator
{
    /**
     * 为文章页生成完整的 JSON-LD Graph。
     */
    public static function generateForArticle(Article $article, string $siteUrl): string
    {
        $pubDate = $article->published_at?->toIso8601String() ?: $article->created_at->toIso8601String();
        $modDate = $article->updated_at->toIso8601String();
        $articleUrl = rtrim($siteUrl, '/') . '/article/' . $article->slug;

        $graph = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'Article',
                    '@id' => $articleUrl . '#article',
                    'isPartOf' => ['@id' => $siteUrl . '#website'],
                    'author' => [
                        '@type' => 'Person',
                        'name' => $article->author->name ?? 'Admin',
                    ],
                    'headline' => $article->title,
                    'datePublished' => $pubDate,
                    'dateModified' => $modDate,
                    'mainEntityOfPage' => ['@id' => $articleUrl],
                    'publisher' => [
                        '@type' => 'Organization',
                        'name' => config('geoflow.site_name'),
                        'logo' => [
                            '@type' => 'ImageObject',
                            'url' => rtrim($siteUrl, '/') . '/favicon.ico',
                        ],
                    ],
                    'description' => $article->meta_description ?: $article->excerpt,
                ],
            ],
        ];

        // 注入 AI 提取的实体
        if (! empty($article->entities)) {
            $entities = $article->entities;
            $mentions = [];

            if (! empty($entities['person'])) {
                foreach ((array) $entities['person'] as $name) {
                    $mentions[] = ['@type' => 'Person', 'name' => $name];
                }
            }
            if (! empty($entities['organization'])) {
                foreach ((array) $entities['organization'] as $name) {
                    $mentions[] = ['@type' => 'Organization', 'name' => $name];
                }
            }
            if (! empty($entities['place'])) {
                foreach ((array) $entities['place'] as $name) {
                    $mentions[] = ['@type' => 'Place', 'name' => $name];
                }
            }
            if (! empty($entities['topic'])) {
                foreach ((array) $entities['topic'] as $name) {
                    $mentions[] = ['@type' => 'DefinedTerm', 'name' => $name];
                }
            }

            if (! empty($mentions)) {
                $graph['@graph'][0]['mentions'] = $mentions;
            }
        }

        return '<script type="application/ld+json">' . json_encode($graph, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . '</script>';
    }
}
