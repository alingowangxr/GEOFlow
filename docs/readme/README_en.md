# 🚀 GEOFlow: Generative Engine Optimization Flow

[English](./README_en.md) | [繁體中文](../../README.md) | [Español](./README_es.md) | [日本語](./README_ja.md) | [Português](./README_pt_BR.md) | [Русский](./README_ru.md)

**GEOFlow** is an open-source intelligent content engineering system specifically designed for **GEO (Generative Engine Optimization)** and **Modern SEO**.

In the era of AI search engines (such as SearchGPT, Perplexity, Google SGE), traditional content stuffing has lost its effectiveness. GEOFlow transforms raw data into AI-optimized content with "high credibility" and "structured semantics" through systematic data processing, RAG (Retrieval-Augmented Generation) technology, and semantic network construction.

---

## 🔥 Why Choose GEOFlow?

GEOFlow is more than just a CMS; it is an **AI Content Factory**. Compared to traditional tools, it has been deeply reinforced in "factual authority" and "machine readability."

### Core Powerful Features:

#### 1. Top-tier RAG Engine: Hybrid Search
*   **Semantic + Precise:** Combines `pgvector` semantic search with PostgreSQL `tsvector` full-text search.
*   **RRF Fusion Algorithm:** Employs the industrial-grade RRF (Reciprocal Rank Fusion) algorithm to ensure that the reference knowledge retrieved by AI is both accurate and semantically coherent, completely eliminating AI hallucinations.

#### 2. Factual Authority: Citation & Sourcing System
*   **Automatic Footnotes:** AI automatically marks footnotes (e.g., `[^1]`) based on the reference knowledge during content generation.
*   **Verifiability:** The frontend automatically generates a "References" list with bidirectional jump functionality, significantly enhancing the authority of the content in Google's E-E-A-T ratings.

#### 3. Semantic Network Construction: Automated JSON-LD Entity Labeling
*   **Knowledge Graph Friendly:** Automatically extracts "Person, Organization, Place, Topic" entities from articles.
*   **Schema.org Graph:** Dynamically injects complex JSON-LD structured data to proactively declare the semantic structure of content to search engines.

#### 4. Topic Clusters: Semantic Internal Link Network
*   **Vector Association:** Automatically builds internal link networks based on vector similarity.
*   **Authority Transfer:** Builds powerful Topic Clusters through high-relevance internal links, making search engines view your site as an expert in specific fields.

#### 5. Extreme Performance: Intelligent Media Optimization (Edge Performance)
*   **Modern Formats:** Images are automatically converted to WebP/AVIF formats.
*   **Responsive Rendering:** Uses the `<picture>` tag to implement WebP-first loading, greatly optimizing Core Web Vitals (LCP) indicators.

---

## 🛠️ Technical Architecture

GEOFlow is built on the latest technology stack, ensuring performance and scalability:

-   **Core Framework:** [Laravel 12](https://laravel.com/) (PHP 8.2+)
-   **Database:** PostgreSQL + **pgvector** (Vector storage)
-   **Asynchronous Processing:** Redis + **Laravel Horizon** (Task scheduling and monitoring)
-   **AI Integration:** `laravel/ai` SDK (Supports all OpenAI-compatible LLMs)
-   **Real-time Communication:** Laravel Reverb (WebSocket real-time progress feedback)
-   **Frontend Performance:** TailwindCSS 4 + Vite

---

## 📦 Quick Start

### Environment Requirements
- PHP 8.2+
- PostgreSQL (with `pgvector` extension installed)
- Redis
- Node.js & NPM

### Installation Steps
```bash
# 1. Clone the repository
git clone https://github.com/yaojingang/GEOFlow.git && cd GEOFlow

# 2. Run the automated setup script
composer run setup

# 3. Configure environment variables
# Edit the .env file, configure DB_CONNECTION=pgsql and your AI_API_KEY
```

### Development & Execution
```bash
# Start the server, queue listener, and Vite simultaneously
npm run dev
```

---

## 📈 Workflow Overview

1.  **Import Materials:** Upload PDFs, documents, or URLs; the system automatically chunks and vectorizes them into the knowledge base.
2.  **Orchestrate Tasks:** Set Prompt templates, model routing, and publication intervals.
3.  **Intelligent Generation:** AI Agents retrieve hybrid contexts and generate Markdown content with citation markers.
4.  **Semantic Enhancement:** Automatically extract entities, generate article vectors, and calculate semantic internal links.
5.  **Automatic Distribution:** Content is automatically published through SEO-optimized theme templates and dynamic Sitemaps are updated.

---

## 🗺️ Roadmap
- [x] Hybrid Search with RRF Fusion
- [x] Citation & Sourcing System
- [x] Automated JSON-LD Entity Labeling
- [x] Semantic Internal Link Recommendation Engine
- [x] WebP/AVIF Intelligent Media Optimization
- [ ] Cross-platform API Push (WordPress, Webflow)
- [ ] Multimodal Content Generation (Auto-generate matching Video/Audio)

---

## 📄 License
GEOFlow is licensed under the [Apache-2.0](LICENSE) license.

---
**GEOFlow** - *Redefining content engineering for the AI search era.*
