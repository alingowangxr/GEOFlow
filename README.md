# 🚀 GEOFlow: Generative Engine Optimization Flow

[English](./docs/readme/README_en.md) | [简体中文](./docs/readme/README_zh_CN.md) | [繁體中文](./README.md) | [Español](./docs/readme/README_es.md) | [日本語](./docs/readme/README_ja.md) | [Português](./docs/readme/README_pt_BR.md) | [Русский](./docs/readme/README_ru.md)

**GEOFlow** 是一個專為 **GEO (生成式引擎優化)** 與 **現代 SEO** 打造的開源智能內容工程系統。

在 AI 搜尋引擎（如 SearchGPT, Perplexity, Google SGE）崛起的時代，內容的「事實權威性」與「機器可讀性」已成為獲取流量的關鍵。GEOFlow 通過系統化的數據處理、頂尖的 RAG 技術與語義網路構建，將原始素材轉化為具備事實支撐、語義豐富且極速加載的優質內容。

---

## 🍴 Fork 說明
本項目 Fork 自 [yaojingang/GEOFlow](https://github.com/yaojingang/GEOFlow)，並在其基礎上進行了深度優化與工業級功能增強。

---

## 🌟 核心功能矩陣

### 1. 頂尖 RAG (檢索增強生成) 引擎
*   **混合檢索 (Hybrid Search):** 同時結合 `pgvector` 語義向量搜索與 PostgreSQL `tsvector` 全文檢索，精準捕捉用戶意圖與核心關鍵詞。
*   **RRF 融合算法:** 採用工業級 Reciprocal Rank Fusion 算法平衡檢索結果，徹底消除 AI 幻覺。
*   **引用溯源系統 (Citation):** AI 自動標註腳註（如 `[^1]`），前端自動生成可跳轉的參考文獻列表，滿足 Google E-E-A-T 權威性要求。
*   **智能素材處理:** 支持 PDF、文檔上傳及 URL 抓取，系統自動進行高品質分塊 (Chunking) 與向量化。

### 2. 語義網路與 GEO 優化
*   **JSON-LD 實體引擎:** 自動提取文章中的人物、組織、地點等實體，並注入 Schema.org Graph 結構化數據，主動與搜尋引擎知識圖譜對接。
*   **語義內鏈網路 (Semantic Linking):** 基於向量相似度自動構建「主題集群 (Topic Clusters)」，實現文章間的高相關性語義鏈接。
*   **智能摘要與 Meta:** 自動生成符合 SEO 標準的 Meta 描述、核心關鍵詞、Open Graph 標籤與內容摘要。

### 3. 素材與 AI 任務編排
*   **集中化素材管理:** 內建標題庫、關鍵詞庫、圖片庫、知識庫（支持切片與向量化預覽）及作者管理系統。
*   **三段式工作流:** 提供「草稿 → 審核 → 發佈」的完整鏈路，支持人工干預或自動化策略。
*   **AI 批量調度:** 支持循環任務 (Loop)、自定義發佈間隔及多模型故障轉移 (Failover) 路由。
*   **多模型兼容:** 兼容 OpenAI 協議的所有主流大模型（如 GPT-4, Claude, DeepSeek, Gemini 等）。

### 4. 技術 SEO 與極致效能
*   **智能媒體優化:** 圖片自動轉換為 WebP 格式，並採用 `<picture>` 標籤實現響應式渲染，極大化提升 Core Web Vitals (LCP) 指標。
*   **動態 Sitemap:** 根據內容權重自動生成的 XML 站點地圖，主動引導爬蟲抓取核心內容。
*   **實時監控與 API:** 集成 Laravel Horizon 隊列監控，提供 RESTful API 與 CLI 工具，方便集成到現有的自動化流水線中。

---

## 🛠️ 技術架構

-   **核心框架:** [Laravel 12](https://laravel.com/) (PHP 8.2+)
-   **數據庫:** PostgreSQL + **pgvector** (向量數據中心)
-   **異步處理:** Redis + **Laravel Horizon** (高性能任務隊列)
-   **AI SDK:** `laravel/ai` 官方套件
-   **實時通訊:** Laravel Reverb (WebSocket)
-   **部署:** 全面支持 Docker Compose 一鍵部署

---

## 📦 快速開始 (Docker)

### 環境要求
- Docker & Docker Compose
- AI 模型 API Key (OpenAI 兼容)

### 安裝步驟
```bash
# 1. 克隆倉庫
git clone https://github.com/alingowangxr/GEOFlow.git && cd GEOFlow

# 2. 準備環境變量
cp .env.example .env
# 編輯 .env，配置 DB_CONNECTION=pgsql 及你的 AI_API_KEY

# 3. 啟動服務
docker compose --profile scheduler up -d --build
```

### 訪問地址
- **前台地址:** `http://localhost:18080`
- **後台地址:** `http://localhost:18080/geo_admin/` (默認賬號: `admin` / `admin888`)

---

## 🗺️ 路線圖 (Roadmap)
- [x] 混合檢索與 RRF 算法 (Hybrid RAG)
- [x] 引用溯源與雙向腳註 (Citations)
- [x] 自動化 JSON-LD 實體標註 (Structured Data)
- [x] 語義內鏈推薦引擎 (Topic Clusters)
- [x] WebP/AVIF 智能媒體優化 (LCP Enhancement)
- [ ] 跨平台 API 發佈器 (WordPress/Webflow)
- [ ] 多模態內容生成 (圖文轉影片)

---

## 📄 許可證
本項目採用 [Apache-2.0](LICENSE) 許可證，歡迎商業使用。

---
**GEOFlow** - *為 AI 搜尋時代重新定義內容工程。*
