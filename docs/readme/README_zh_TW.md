# 🚀 GEOFlow: Generative Engine Optimization Flow

[English](./README_en.md) | [简体中文](./README_zh_CN.md) | [繁體中文](../../README.md) | [Español](./README_es.md) | [日本語](./README_ja.md) | [Português](./README_pt_BR.md) | [Русский](./README_ru.md)

**GEOFlow** 是一個專為 **GEO (生成式引擎優化)** 與 **現代 SEO** 打造的開源智能內容工程系統。

在 AI 搜尋引擎（如 SearchGPT, Perplexity, Google SGE）崛起的時代，傳統的內容堆砌已失去效力。GEOFlow 通過系統化的數據處理、RAG (檢索增強生成) 技術以及語義網路構建，將原始數據轉化為具備「高採信度」與「結構化語義」的 AI 優化內容。

---

## 🍴 Fork 說明
本項目 Fork 自 [yaojingang/GEOFlow](https://github.com/yaojingang/GEOFlow)，並在其基礎上進行了深度優化與功能增強。

---

## 🔥 為什麼選擇 GEOFlow？

GEOFlow 不僅是一個 CMS，它是一個 **AI 內容工廠**。相比於傳統工具，它在「事實權威性」與「機器可讀性」上進行了深度強化。

### 核心強勢功能：

#### 1. 頂尖 RAG 引擎：混合檢索 (Hybrid Search)
*   **語義 + 精確：** 同時結合 `pgvector` 語義搜索與 PostgreSQL `tsvector` 全文檢索。
*   **RRF 融合算法：** 採用工業級 RRF (Reciprocal Rank Fusion) 算法，確保 AI 獲取的參考知識既精確又具備語義連貫性，從而徹底消除 AI 幻覺。

#### 2. 事實權威性：引用溯源系統 (Citation & Sourcing)
*   **自動腳註：** AI 在生成內容時會自動根據參考知識標註腳註（如 `[^1]`）。
*   **可驗證性：** 前端自動生成具備雙向跳轉功能的「參考文獻」列表，極大提升內容在 Google E-E-A-T 評分中的權威度。

#### 3. 語義網路構建：自動化 JSON-LD 實體標注
*   **知識圖譜友好：** 自動提取文章中的「人物、組織、地點、話題」實體。
*   **Schema.org Graph：** 動態注入複雜的 JSON-LD 結構化數據，主動向搜尋引擎宣告內容的語義結構。

#### 4. 主題集群：語義內鏈網路 (Topic Clusters)
*   **向量關聯：** 基於向量相似度自動構建文章間的內鏈網路。
*   **權威傳遞：** 通過高相關性的內鏈鏈接，構建強大的主題集群，讓搜尋引擎將您的站點視為特定領域的專家。

#### 5. 極致性能：智能媒體優化 (Edge Performance)
*   **現代格式：** 圖片自動轉換為 WebP/AVIF 格式。
*   **響應式渲染：** 採用 `<picture>` 標籤實現 WebP 優先加載，極大優化 Core Web Vitals (LCP) 指標。

---

## 🛠️ 技術架構

GEOFlow 基於最新的技術棧構建，確保效能與可擴展性：

-   **核心框架:** [Laravel 12](https://laravel.com/) (PHP 8.2+)
-   **數據庫:** PostgreSQL + **pgvector** (向量存儲)
-   **異步處理:** Redis + **Laravel Horizon** (任務調度與監控)
-   **AI 集成:** `laravel/ai` SDK (支持 OpenAI 兼容的所有 LLMs)
-   **實時通訊:** Laravel Reverb (WebSocket 實時進度回傳)
-   **前端性能:** TailwindCSS 4 + Vite

---

## 📦 快速開始

### 環境要求
- PHP 8.2+
- PostgreSQL (需安裝 `pgvector` 擴展)
- Redis
- Node.js & NPM

### 安裝步驟
```bash
# 1. 克隆倉庫
git clone https://github.com/alingowangxr/GEOFlow.git && cd GEOFlow

# 2. 執行自動化設置腳本
composer run setup

# 3. 配置環境變量
# 編輯 .env 檔案，配置 DB_CONNECTION=pgsql 以及你的 AI_API_KEY
```

### 開發與執行
```bash
# 同時啟動服務、隊列監控與 Vite
npm run dev
```

---

## 📈 工作流概述

1.  **導入素材:** 上傳 PDF、文檔或 URL，系統自動分塊並向量化進入知識庫。
2.  **編排任務:** 設置 Prompt 模板、模型路由與發佈間隔。
3.  **智能生成:** AI 代理 (Agents) 檢索混合上下文，生成帶有引用標註的 Markdown 內容。
4.  **語義增強:** 自動提取實體、生成文章向量、計算語義內鏈。
5.  **自動分發:** 內容自動通過 SEO 優化的主題模板發佈，並更新動態 Sitemap。

---

## 🗺️ 路線圖 (Roadmap)
- [x] 混合檢索 (Hybrid Search) 與 RRF 融合
- [x] 引用溯源系統 (Citation System)
- [x] 自動化 JSON-LD 實體標注
- [x] 語義內鏈推薦引擎
- [x] WebP/AVIF 智能媒體優化
- [ ] 跨平台 API 推送 (WordPress, Webflow)
- [ ] 多模態內容生成 (自動生成與內容匹配的影片/音頻)

---

## 📄 許可證
本項目採用 [Apache-2.0](LICENSE) 許可證。

---
**GEOFlow** - *為 AI 搜尋時代重新定義內容工程。*
