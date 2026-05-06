# GEOFlow Changelog

This document tracks user-facing updates in the public repository. For future GitHub pushes, update this file together with the Chinese version in `CHANGELOG.md`.

## 2026-05-06

### v1.3 - Industrial-Grade Optimization & GEO Enhancement (The Google-Agent Update)

- **Added Advanced RAG Hybrid Search Engine**:
  - Combined PostgreSQL `tsvector` full-text search with `pgvector` semantic search
  - Implemented industrial-grade **RRF (Reciprocal Rank Fusion)** to balance search results, significantly improving AI context precision and eliminating hallucinations
- **Added Citation & Sourcing System**:
  - Automatic footnote marking (e.g., `[^1]`) during content generation
  - Front-end jumpable reference lists to fulfill Google's E-E-A-T verifiability requirements
- **Added Automated JSON-LD Entity Engine**:
  - Automatically extracts core entities (Person, Organization, Place, Topic) from AI-generated content
  - Injects Schema.org compliant **JSON-LD Graph** data to proactively interface with search engine knowledge graphs
- **Added Semantic Internal Linking & Topic Clusters**:
  - Implemented semantic-based article recommendations using article-level vector similarity
  - Automatically builds a site-wide semantic network to help search engines establish domain authority
- **Added Intelligent Media Optimization & LCP Enhancement**:
  - Integrated automatic WebP conversion, reducing image size by 60%-80%
  - Upgraded front-end rendering to the `<picture>` tag structure for responsive modern format loading, boosting Core Web Vitals scores
- **Added Dynamic Sitemap System**:
  - Automatically generates standard `sitemap.xml`
  - Intelligently assigns crawl priority based on article "hot" and "featured" status to shorten Google indexing cycles

## 2026-04-18

### v1.2

- Added first-stage Chinese/English interface support:
  - English is now available across the formal admin pages
  - The login page now has its own language selector
  - The frontend shell follows the admin language selection
- Added `Smart Model Failover` for tasks:
  - Tasks can now use `Fixed Model` or `Smart Failover`
  - When the primary model fails, GEOFlow automatically tries the next available chat model by priority
- Improved provider endpoint handling:
  - Supports versioned chat and embedding endpoints for OpenAI, DeepSeek, MiniMax, Zhipu GLM, and Volcengine Ark
  - Model settings now accept either a base URL or a full endpoint
- Improved task execution behavior:
  - `task-execute.php` now queues execution instead of blocking the page synchronously
  - `published_count` is now updated correctly for tasks that publish directly
- Added frontend theme preview and activation:
  - dynamic `preview/<theme-id>` routes for safe preview-first inspection
  - theme package support under `themes/<theme-id>`
  - admin-side theme preview and activation in Site Settings
  - sample theme `qiaomu-editorial-20260418` is now included in the public repository
  - homepage, category, and archive card summaries now strip Markdown artifacts before rendering
- Added an admin first-login welcome panel:
  - shown automatically after the first admin login
  - redesigned as a single welcome letter instead of a multi-card module layout
  - defaults to Chinese with an in-panel English switch
  - footer now includes a `Project Intro` entry that reopens the panel
  - implementation notes are documented in `project/ADMIN_WELCOME_en.md`
- Added the companion `geoflow-template` skill entry:
  - maps reference URLs into GEOFlow-compatible theme packages
  - outputs `tokens.json`, `mapping.json`, and preview-first theme plans
- Upgraded default GEO prompt templates:
  - Long-form templates now cover article generation, ranking articles, keywords, and descriptions
  - Templates are aligned with GeoFlow's variable rules
- Fixed multiple admin usability issues:
  - PostgreSQL timezone drift
  - Missing leading `/` in generated image paths
  - PostgreSQL boolean write error when saving AI-generated titles
  - Default provider examples now use a neutral DeepSeek sample instead of the old third-party domain
