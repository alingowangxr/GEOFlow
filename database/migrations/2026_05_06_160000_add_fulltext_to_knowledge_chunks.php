<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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

        // 1. 增加 tsv 栏位用于存储分词向量 (使用中文配置 zh_CN 如果可用，否则用 simple)
        DB::statement('ALTER TABLE knowledge_chunks ADD COLUMN IF NOT EXISTS search_vector tsvector');

        // 2. 创建 GIN 索引加速全文检索
        DB::statement('CREATE INDEX IF NOT EXISTS knowledge_chunks_search_vector_idx ON knowledge_chunks USING GIN(search_vector)');

        // 3. 初始化现有数据 (这里简单使用 simple 配置，因为 zh_CN 可能需要额外插件如 zhparser)
        DB::statement("UPDATE knowledge_chunks SET search_vector = to_tsvector('simple', COALESCE(content, ''))");

        // 4. (可选) 创建触发器自动更新 search_vector
        DB::unprepared("
            CREATE OR REPLACE FUNCTION knowledge_chunks_search_vector_trigger() RETURNS trigger AS $$
            begin
              new.search_vector := to_tsvector('simple', COALESCE(new.content, ''));
              return new;
            end
            $$ LANGUAGE plpgsql;
        ");

        DB::unprepared("
            DROP TRIGGER IF EXISTS tsvectorupdate ON knowledge_chunks;
            CREATE TRIGGER tsvectorupdate BEFORE INSERT OR UPDATE
            ON knowledge_chunks FOR EACH ROW EXECUTE FUNCTION knowledge_chunks_search_vector_trigger();
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (DB::getDriverName() !== 'pgsql') {
            return;
        }

        DB::unprepared("DROP TRIGGER IF EXISTS tsvectorupdate ON knowledge_chunks");
        DB::unprepared("DROP FUNCTION IF EXISTS knowledge_chunks_search_vector_trigger()");
        DB::statement('DROP INDEX IF EXISTS knowledge_chunks_search_vector_idx');
        DB::statement('ALTER TABLE knowledge_chunks DROP COLUMN IF EXISTS search_vector');
    }
};
