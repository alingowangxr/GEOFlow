# 🚀 GEOFlow: Generative Engine Optimization Flow

[English](./README_en.md) | [简体中文](./README_zh_CN.md) | [繁體中文](../../README.md) | [Español](./README_es.md) | [日本語](./README_ja.md) | [Português](./README_pt_BR.md) | [Русский](./README_ru.md)

**GEOFlow** is an open-source intelligent content engineering system specifically designed for **GEO (Generative Engine Optimization)** and **Modern SEO**.

In the era of AI search engines (such as SearchGPT, Perplexity, Google SGE), content "authority" and "machine readability" have become critical for traffic acquisition. GEOFlow transforms raw materials into high-quality content that is factually grounded, semantically rich, and lightning-fast by leveraging systematic data processing, top-tier RAG technology, and semantic network construction.

---

## 🍴 Fork Info
This project is forked from [yaojingang/GEOFlow](https://github.com/yaojingang/GEOFlow), with deep optimizations and industrial-grade functional enhancements.

---

## 🌟 Core Feature Matrix

### 1. Advanced RAG (Retrieval-Augmented Generation) Engine
*   **Hybrid Search:** Combines `pgvector` semantic search with PostgreSQL `tsvector` full-text search to precisely capture user intent and core keywords.
*   **RRF Fusion Algorithm:** Employs the industrial-grade Reciprocal Rank Fusion algorithm to balance search results and completely eliminate AI hallucinations.
*   **Citation & Sourcing:** AI automatically marks footnotes (e.g., `[^1]`), and the frontend generates a jumpable reference list, meeting Google's E-E-A-T authority requirements.
*   **Intelligent Material Processing:** Supports PDF/document uploads and URL crawling with automatic high-quality chunking and vectorization.

### 2. Semantic Web & GEO Optimization
*   **JSON-LD Entity Engine:** Automatically extracts entities (Person, Organization, Place, etc.) and injects Schema.org Graph structured data to proactively interface with search engine knowledge graphs.
*   **Semantic Internal Linking:** Automatically builds "Topic Clusters" based on vector similarity, achieving high-relevance semantic linking between articles.
*   **Smart Snippets & Meta:** Automatically generates SEO-compliant Meta descriptions, keywords, and content excerpts.

### 3. Material & Task Orchestration
*   **Centralized Management:** Built-in libraries for titles, keywords, images, and author management systems.
*   **AI Batch Tasks:** Supports loop tasks, publication interval settings, and multi-model automatic routing.
*   **Multi-Model Support:** Compatible with all major LLMs via OpenAI protocol, supporting failover strategies.
*   **Lifecycle Management:** Covers the entire process from draft generation and manual/auto-review to scheduled publishing.

### 4. Technical SEO & Extreme Performance
*   **Intelligent Media Optimization:** Images are automatically converted to WebP format and rendered using the `<picture>` tag for responsive loading, greatly improving LCP indicators.
*   **Dynamic Sitemap:** Automatically generates XML sitemaps based on content weight to guide crawlers to core content.
*   **Real-time Monitoring:** Integrated with Laravel Horizon for visualized task queue monitoring and heartbeat tracking.

---

## 🛠️ Technical Architecture

-   **Core Framework:** [Laravel 12](https://laravel.com/) (PHP 8.2+)
-   **Database:** PostgreSQL + **pgvector** (Vector Data Hub)
-   **Async Processing:** Redis + **Laravel Horizon** (High-performance task queues)
-   **AI SDK:** `laravel/ai` Official Package
-   **Real-time:** Laravel Reverb (WebSocket)
-   **Frontend:** TailwindCSS 4 + Vite

---

## 📦 Quick Start

### Environment Requirements
- PHP 8.2+
- PostgreSQL (with `pgvector` extension)
- Redis 6.2+
- Node.js & NPM

### Installation Steps
```bash
# 1. Clone the repository
git clone https://github.com/alingowangxr/GEOFlow.git && cd GEOFlow

# 2. Run the automated setup script
composer run setup

# 3. Configure environment variables
# Edit .env, set DB_CONNECTION=pgsql and your AI_API_KEY
```

### Start Development
```bash
npm run dev
```

---

## 🗺️ Roadmap
- [x] Hybrid Search & RRF Algorithm
- [x] Citations & Bidirectional Footnotes
- [x] Automated JSON-LD Entity Labeling
- [x] Semantic Link Recommendation Engine
- [x] WebP/AVIF Intelligent Media Optimization
- [ ] Cross-platform API Publisher (WordPress/Webflow)
- [ ] Multimodal Content Generation (Text-to-Video)

---

## 📄 License
This project is licensed under the [Apache-2.0](LICENSE) license.

---
**GEOFlow** - *Redefining content engineering for the AI search era.*
