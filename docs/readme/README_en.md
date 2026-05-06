# 🚀 GEOFlow: Generative Engine Optimization Flow

[English](./README_en.md) | [简体中文](./README_zh_CN.md) | [繁體中文](../../README.md) | [Español](./README_es.md) | [日本語](./README_ja.md) | [Português](./README_pt_BR.md) | [Русский](./README_ru.md)

**GEOFlow** is an open-source intelligent content engineering system specifically designed for **GEO (Generative Engine Optimization)** and **Modern SEO**.

In the era of AI search engines (such as SearchGPT, Perplexity, Google SGE), content "factual authority" and "machine readability" have become critical for traffic acquisition. GEOFlow transforms raw materials into high-quality content that is factually grounded, semantically rich, and lightning-fast by leveraging systematic data processing, top-tier RAG technology, and semantic network construction.

---

## 🍴 Fork Info
This project is forked from [yaojingang/GEOFlow](https://github.com/yaojingang/GEOFlow), with deep optimizations and industrial-grade functional enhancements.

---

## 🌟 Core Feature Matrix

### 1. Advanced RAG (Retrieval-Augmented Generation) Engine
*   **Hybrid Search:** Combines `pgvector` semantic search with PostgreSQL `tsvector` full-text search to precisely capture user intent and core keywords.
*   **RRF Fusion Algorithm:** Employs the industrial-grade Reciprocal Rank Fusion algorithm to balance search results and completely eliminate AI hallucinations.
*   **Citation & Sourcing:** AI automatically marks footnotes (e.g., `[^1]`), and the frontend generates jumpable reference lists, meeting Google's E-E-A-T authority requirements.
*   **Intelligent Material Processing:** Supports PDF/document uploads and URL crawling with automatic high-quality chunking and vectorization.

### 2. Semantic Web & GEO Optimization
*   **JSON-LD Entity Engine:** Automatically extracts entities (Person, Organization, Place, etc.) and injects Schema.org Graph structured data to proactively interface with search engine knowledge graphs.
*   **Semantic Internal Linking:** Automatically builds "Topic Clusters" based on vector similarity, achieving high-relevance semantic linking between articles.
*   **Smart Snippets & Meta:** Automatically generates SEO-compliant Meta descriptions, keywords, Open Graph tags, and content excerpts.

### 3. Material & AI Task Orchestration
*   **Centralized Material Management:** Built-in libraries for titles, keywords, images, knowledge bases (with chunking/vector preview), and author management systems.
*   **Three-Stage Workflow:** Provides a complete "Draft → Review → Publish" pipeline with support for manual intervention or automated strategies.
*   **AI Batch Scheduling:** Supports loop tasks, custom publication intervals, and multi-model failover routing.
*   **Multi-Model Compatibility:** Compatible with all major LLMs via OpenAI protocol (e.g., GPT-4, Claude, DeepSeek, Gemini, etc.).

### 4. Technical SEO & Extreme Performance
*   **Intelligent Media Optimization:** Images are automatically converted to WebP format and rendered using the `<picture>` tag for responsive loading, greatly improving Core Web Vitals (LCP).
*   **Dynamic Sitemap:** Automatically generates XML sitemaps based on content weight to guide crawlers to core content.
*   **Real-time Monitoring & API:** Integrated with Laravel Horizon for visualized queue monitoring, providing RESTful APIs and CLI tools for seamless automation integration.

---

## 🛠️ Technical Architecture

-   **Core Framework:** [Laravel 12](https://laravel.com/) (PHP 8.2+)
-   **Database:** PostgreSQL + **pgvector** (Vector Data Hub)
-   **Async Processing:** Redis + **Laravel Horizon** (High-performance task queues)
-   **AI SDK:** `laravel/ai` Official Package
-   **Real-time:** Laravel Reverb (WebSocket)
-   **Deployment:** Full Docker Compose support for one-click setup.

---

## 📦 Quick Start (Docker)

### Environment Requirements
- Docker & Docker Compose
- AI Model API Key (OpenAI compatible)

### Installation Steps
```bash
# 1. Clone the repository
git clone https://github.com/alingowangxr/GEOFlow.git && cd GEOFlow

# 2. Prepare environment variables
cp .env.example .env
# Edit .env, set DB_CONNECTION=pgsql and your AI_API_KEY

# 3. Start services
docker compose --profile scheduler up -d --build
```

### Access URLs
- **Frontend:** `http://localhost:18080`
- **Backend:** `http://localhost:18080/geo_admin/` (Default: `admin` / `admin888`)

---

## 🗺️ Roadmap
- [x] Hybrid Search & RRF Algorithm (Hybrid RAG)
- [x] Citations & Bidirectional Footnotes (Citations)
- [x] Automated JSON-LD Entity Labeling (Structured Data)
- [x] Semantic Link Recommendation Engine (Topic Clusters)
- [x] WebP/AVIF Intelligent Media Optimization (LCP Enhancement)
- [ ] Cross-platform API Publisher (WordPress/Webflow)
- [ ] Multimodal Content Generation (Text-to-Video)

---

## 📄 License
This project is licensed under the [Apache-2.0](LICENSE) license. Commercial use is welcomed.

---
**GEOFlow** - *Redefining content engineering for the AI search era.*
