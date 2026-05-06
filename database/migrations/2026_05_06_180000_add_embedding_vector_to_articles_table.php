<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (DB::getDriverName() !== 'pgsql') {
            return;
        }

        $hasVector = DB::selectOne("
            SELECT EXISTS (
                SELECT 1 FROM pg_extension WHERE extname = 'vector'
            ) as ok
        ");
        if (! $hasVector || ! $hasVector->ok) {
            return;
        }

        $hasColumn = DB::selectOne("
            SELECT EXISTS (
                SELECT 1 FROM information_schema.columns
                WHERE table_name = 'articles' AND column_name = 'embedding_vector'
            ) as ok
        ");
        if (! $hasColumn || ! $hasColumn->ok) {
            DB::statement('ALTER TABLE articles ADD COLUMN embedding_vector vector(3072)');
        }
        
        // 为 articles 向量列增加索引 (可选，取决于数据量)
        // DB::statement('CREATE INDEX IF NOT EXISTS articles_embedding_vector_idx ON articles USING hnsw (embedding_vector vector_cosine_ops)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (DB::getDriverName() !== 'pgsql') {
            return;
        }

        DB::statement('ALTER TABLE articles DROP COLUMN IF EXISTS embedding_vector');
    }
};
