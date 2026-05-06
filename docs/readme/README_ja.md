# 🚀 GEOFlow: Generative Engine Optimization Flow

[English](./README_en.md) | [简体中文](./README_zh_CN.md) | [繁體中文](../../README.md) | [Español](./README_es.md) | [日本語](./README_ja.md) | [Português](./README_pt_BR.md) | [Русский](./README_ru.md)

**GEOFlow** は、**GEO (生成エンジン最適化)** および **モダン SEO** 向けに設計されたオープンソースのインテリジェント・コンテンツ・エンジニアリング・システムです。

AI 検索エンジン（SearchGPT、Perplexity、Google SGE など）の台頭により、コンテンツの「事実に基づく権威性」と「マシンリーダブル（機械可読性）」がトラフィック獲得の鍵となりました。GEOFlow は、体系的なデータ処理、トップクラスの RAG 技術、および意味ネットワークの構築を通じて、生の素材を事実に基づいた、意味的に豊かで、超高速にロードされる高品質なコンテンツに変換します。

---

## 🍴 フォーク情報
このプロジェクトは [yaojingang/GEOFlow](https://github.com/yaojingang/GEOFlow) のフォークであり、高度な最適化と産業グレードの機能強化が行われています。

---

## 🌟 主要機能マトリックス

### 1. 高度な RAG (検索拡張生成) エンジン
*   **ハイブリッド検索:** `pgvector` による意味検索と PostgreSQL `tsvector` による全文検索を組み合わせ、ユーザーの意図と主要なキーワードを正確に捉えます。
*   **RRF 融合アルゴリズム:** 産業グレードの Reciprocal Rank Fusion アルゴリズムを採用して検索結果のバランスを整え、AI のハルシネーション（幻覚）を完全に排除します。
*   **引用・ソース管理 (Citation):** AI が脚注（例：`[^1]`）を自動的に付与し、フロントエンドでジャンプ可能な参考文献リストを生成。Google の E-E-A-T 権威性要件を満たします。
*   **インテリジェント素材処理:** PDF、ドキュメントのアップロードおよび URL クロールに対応し、高品質なチャンク化とベクトル化を自動実行します。

### 2. 意味ネットワークと GEO 最適化
*   **JSON-LD エンティティ・エンジン:** 記事から人物、組織、場所などのエンティティを自動抽出し、Schema.org Graph 構造化データを注入。検索エンジンのナレッジグラフと能動的に連携します。
*   **セマンティック内部リンク:** ベクトル類似度に基づいて「トピッククラスター」を自動構築し、記事間の関連性の高い意味的なリンクを実現します。
*   **スマートスニペット & Meta:** SEO に準拠した Meta 説明、キーワード、Open Graph タグ、およびコンテンツ要約を自動生成します。

### 3. 素材・AI タスク編成システム
*   **集中素材管理:** タイトル、キーワード、画像、ナレッジベース（チャンク/ベクトルプレビュー付き）、および著者管理システムを内蔵。
*   **三段階ワークフロー:** 「ドラフト → 承認 → 公開」の完全なパイプラインを提供。手動介入または自動化戦略をサポート。
*   **AI バッチスケジューリング:** ループタスク、カスタム公開間隔、およびマルチモデル・フェイルオーバー・ルーティングをサポート。
*   **マルチモデル対応:** OpenAI プロトコル経由ですべての主要な LLM（GPT-4, Claude, DeepSeek, Gemini など）と互換性があります。

### 4. テクニカル SEO と究極のパフォーマンス
*   **インテリジェント・メディア最適化:** 画像を WebP 形式に自動変換し、`<picture>` タグを使用してレスポンシブ読み込みを実現。Core Web Vitals (LCP) を大幅に改善します。
*   **動的サイトマップ:** コンテンツの重みに基づいて XML サイトマップを自動生成し、クローラーを主要コンテンツへ誘導します。
*   **リアルタイム監視 & API:** Laravel Horizon と統合し、タスクキューの監視を可視化。シームレスな自動化統合のための RESTful API と CLI ツールを提供。

---

## 🛠️ 技術アーキテクチャ

-   **コアフレームワーク:** [Laravel 12](https://laravel.com/) (PHP 8.2+)
-   **データベース:** PostgreSQL + **pgvector** (ベクトルデータハブ)
-   **非同期処理:** Redis + **Laravel Horizon** (高性能タスクキュー)
-   **AI SDK:** `laravel/ai` 公式パッケージ
-   **リアルタイム:** Laravel Reverb (WebSocket)
-   **デプロイ:** Docker Compose によるワンクリックセットアップを完全サポート。

---

## 📦 クイックスタート (Docker)

### 環境要件
- Docker & Docker Compose
- AI モデル API Key (OpenAI 互換)

### インストール手順
```bash
# 1. リポジトリをクローン
git clone https://github.com/alingowangxr/GEOFlow.git && cd GEOFlow

# 2. 環境変数を準備
cp .env.example .env
# .env を編集し、DB_CONNECTION=pgsql と AI_API_KEY を設定

# 3. サービスを起動
docker compose --profile scheduler up -d --build
```

### アクセス URL
- **フロントエンド:** `http://localhost:18080`
- **管理画面:** `http://localhost:18080/geo_admin/` (初期設定: `admin` / `admin888`)

---

## 🗺️ ロードマップ
- [x] ハイブリッド検索と RRF アルゴリズム (Hybrid RAG)
- [x] 引用と双方向脚注 (Citations)
- [x] 自動 JSON-LD エンティティ・ラベリング (Structured Data)
- [x] セマンティック内部リンク推奨エンジン (Topic Clusters)
- [x] WebP/AVIF インテリジェント・メディア最適化 (LCP Enhancement)
- [ ] クロスプラットフォーム API パブリッシャー (WordPress/Webflow)
- [ ] 多模態コンテンツ生成 (テキストからビデオ)

---

## 📄 ライセンス
このプロジェクトは [Apache-2.0](LICENSE) ライセンスの下で提供されています。商用利用を歓迎します。

---
**GEOFlow** - *AI 検索時代に向けたコンテンツ・エンジニアリングの再定義。*
