# 🚀 GEOFlow: Generative Engine Optimization Flow

[English](./README_en.md) | [简体中文](./README_zh_CN.md) | [繁體中文](../../README.md) | [Español](./README_es.md) | [日本語](./README_ja.md) | [Português](./README_pt_BR.md) | [Русский](./README_ru.md)

**GEOFlow** 是一个专为 **GEO (生成式引擎优化)** 与 **现代 SEO** 打造的开源智能内容工程系统。

在 AI 搜索引擎（如 SearchGPT, Perplexity, Google SGE）崛起的时代，内容的“事实权威性”与“机器可读性”已成为获取流量的关键。GEOFlow 通过系统化的数据处理、顶尖的 RAG 技术与语义网络构建，将原始素材转化为具备事实支撑、语义丰富且极速加载的优质内容。

---

## 🍴 Fork 说明
本项目 Fork 自 [yaojingang/GEOFlow](https://github.com/yaojingang/GEOFlow)，并在其基础上进行了深度优化与工业级功能增强。

---

## 🌟 核心功能矩阵

### 1. 顶尖 RAG (检索增强生成) 引擎
*   **混合检索 (Hybrid Search):** 同时结合 `pgvector` 语义向量搜索与 PostgreSQL `tsvector` 全文检索，精准捕捉用户意图与核心关键词。
*   **RRF 融合算法:** 采用工业级 Reciprocal Rank Fusion 算法平衡检索结果，彻底消除 AI 幻觉。
*   **引用溯源系统 (Citation):** AI 自动标注脚注（如 `[^1]`），前端自动生成可跳转的参考文献列表，满足 Google E-E-A-T 权威性要求。
*   **智能素材处理:** 支持 PDF、文档上传及 URL 抓取，系统自动进行高质量分块 (Chunking) 与向量化。

### 2. 语义网络与 GEO 优化
*   **JSON-LD 实体引擎:** 自动提取文章中的人物、组织、地点等实体，并注入 Schema.org Graph 结构化数据，主动与搜索引擎知识图谱对接。
*   **语义内链网络 (Semantic Linking):** 基于向量相似度自动构建“主题集群 (Topic Clusters)”，实现文章间的高相关性语义链接。
*   **智能摘要与 Meta:** 自动生成符合 SEO 标准的 Meta 描述、核心关键词、Open Graph 标签与内容摘要。

### 3. 素材与 AI 任务编排
*   **集中化素材管理:** 内置标题库、关键词库、图片库、知识库（支持切片与向量化预览）及作者管理系统。
*   **三段式工作流:** 提供“草稿 → 审核 → 发布”的完整链路，支持人工干预或自动化策略。
*   **AI 批量调度:** 支持循环任务 (Loop)、自定义发布间隔及多模型故障转移 (Failover) 路由。
*   **多模型兼容:** 兼容 OpenAI 协议的所有主流大模型（如 GPT-4, Claude, DeepSeek, Gemini 等）。

### 4. 技术 SEO 与极致效能
*   **智能媒体优化:** 图片自动转换为 WebP 格式，并采用 `<picture>` 标签实现响应式渲染，极大化提升 Core Web Vitals (LCP) 指标。
*   **动态 Sitemap:** 根据内容权重自动生成的 XML 站点地图，主动引导爬虫抓取核心内容。
*   **实时监控与 API:** 集成 Laravel Horizon 队列监控，提供 RESTful API 与 CLI 工具，方便集成到现有的自动化流水线中。

---

## 🛠️ 技术架构

-   **核心框架:** [Laravel 12](https://laravel.com/) (PHP 8.2+)
-   **数据库:** PostgreSQL + **pgvector** (向量数据中心)
-   **异步处理:** Redis + **Laravel Horizon** (高性能任务队列)
-   **AI SDK:** `laravel/ai` 官方套件
-   **实时通讯:** Laravel Reverb (WebSocket)
-   **部署:** 全面支持 Docker Compose 一键部署

---

## 📦 快速开始 (Docker)

### 环境要求
- Docker & Docker Compose
- AI 模型 API Key (OpenAI 兼容)

### 安装步骤
```bash
# 1. 克隆仓库
git clone https://github.com/alingowangxr/GEOFlow.git && cd GEOFlow

# 2. 准备环境变量
cp .env.example .env
# 编辑 .env，配置 DB_CONNECTION=pgsql 及你的 AI_API_KEY

# 3. 启动服务
docker compose --profile scheduler up -d --build
```

### 访问地址
- **前台地址:** `http://localhost:18080`
- **后台地址:** `http://localhost:18080/geo_admin/` (默认账号: `admin` / `admin888`)

---

## 🗺️ 路线图 (Roadmap)
- [x] 混合检索与 RRF 算法 (Hybrid RAG)
- [x] 引用溯源与双向脚注 (Citations)
- [x] 自动化 JSON-LD 实体标注 (Structured Data)
- [x] 语义内链推荐引擎 (Topic Clusters)
- [x] WebP/AVIF 智能媒体优化 (LCP Enhancement)
- [ ] 跨平台 API 发布器 (WordPress/Webflow)
- [ ] 多模态内容生成 (图文转视频)

---

## 📄 许可证
本项目采用 [Apache-2.0](LICENSE) 许可证，欢迎商业使用。

---
**GEOFlow** - *为 AI 搜索时代重新定义内容工程。*
