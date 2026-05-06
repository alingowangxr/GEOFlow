<?php

namespace App\Services\GeoFlow;

use App\Models\Article;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * 语义相关性链接服务：基于 pgvector 向量相似度寻找相关文章。
 */
class SemanticLinkService
{
    /**
     * 获取与目标文章语义最相关的其它文章。
     *
     * @return Collection<int, Article>
     */
    public static function getRelatedArticles(Article $article, int $limit = 5): Collection
    {
        if (DB::getDriverName() !== 'pgsql' || empty($article->embedding_vector)) {
            // 如果不支持 pgvector 或文章没有向量，回退到同分类随机推荐
            return Article::query()
                ->published()
                ->where('category_id', $article->category_id)
                ->whereKeyNot($article->id)
                ->inRandomOrder()
                ->limit($limit)
                ->get(['id', 'title', 'slug', 'excerpt']);
        }

        // 使用 pgvector 余弦相似度检索
        return Article::query()
            ->published()
            ->whereKeyNot($article->id)
            ->whereNotNull('embedding_vector')
            ->select(['id', 'title', 'slug', 'excerpt'])
            ->selectRaw('1 - (embedding_vector <=> CAST(? AS vector)) AS similarity', [$article->embedding_vector])
            ->orderByRaw('embedding_vector <=> CAST(? AS vector)', [$article->embedding_vector])
            ->limit($limit)
            ->get();
    }
}
