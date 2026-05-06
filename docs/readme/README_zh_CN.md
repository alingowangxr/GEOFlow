# 🚀 GEOFlow: Generative Engine Optimization Flow

[English](./README_en.md) | [简体中文](./README_zh_CN.md) | [繁體中文](../../README.md) | [Español](./README_es.md) | [日本語](./README_ja.md) | [Português](./README_pt_BR.md) | [Русский](./README_ru.md)

**GEOFlow** 是一个专为 **GEO (生成式引擎优化)** 与 **现代 SEO** 打造的开源智能内容工程系统。

在 AI 搜索引擎（如 SearchGPT, Perplexity, Google SGE）崛起的时代，内容的“权威性”与“机器可读性”已成为获取流量的关键。GEOFlow 通过系统化的数据处理、顶尖的 RAG 技术与语义网络构建，将原始素材转化为具备事实支撑、语义丰富且极速加载的优质内容。

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
*   **智能摘要与 Meta:** 自动生成符合 SEO 标准的 Meta 描述、核心关键词与内容摘要。

### 3. 素材与任务编排体系
*   **集中化管理:** 内置标题库、关键词库、图片库及作者管理系统。
*   **AI 批量任务:** 支持循环任务 (Loop)、发布间隔设置及多模型自动路由。
*   **多模型支持:** 兼容 OpenAI 协议的所有主流大模型，支持故障转移 (Failover) 策略。
*   **全生命周期管理:** 涵盖草稿生成、人工/自动审核、定时发布的全流程。

### 4. 技术 SEO 与极致效能
*   **智能媒体优化:** 图片自动转换为 WebP 格式，并采用 `<picture>` 标签实现响应式渲染，极大化提升 LCP 指标。
*   **动态 Sitemap:** 根据内容权重自动生成的 XML 站点地图，主动引导爬虫抓取核心内容。
*   **实时监控:** 集成 Laravel Horizon，提供可视化的任务队列监控与心跳追踪。

---

## 🛠️ 技术架构

-   **核心框架:** [Laravel 12](https://laravel.com/) (PHP 8.2+)
-   **数据库:** PostgreSQL + **pgvector** (向量数据中心)
-   **异步处理:** Redis + **Laravel Horizon** (高性能任务队列)
-   **AI SDK:** `laravel/ai` 官方套件
-   **实时通讯:** Laravel Reverb (WebSocket)
-   **前端开发:** TailwindCSS 4 + Vite

---

## 📦 快速开始

### 环境要求
- PHP 8.2+
- PostgreSQL (需安装 `pgvector` 扩展)
- Redis 6.2+
- Node.js & NPM

### 安装步骤
```bash
# 1. 克隆仓库
git clone https://github.com/alingowangxr/GEOFlow.git && cd GEOFlow

# 2. 执行自动化设置脚本
composer run setup

# 3. 配置环境变量
# 编辑 .env，配置 DB_CONNECTION=pgsql 及你的 AI_API_KEY
```

### 启动开发环境
```bash
npm run dev
```

---

## 🗺️ 路线图 (Roadmap)
- [x] 混合检索与 RRF 算法
- [x] 引用溯源与双向脚注
- [x] 自动化 JSON-LD 实体标注
- [x] 语义内链推荐引擎
- [x] WebP/AVIF 智能媒体优化
- [ ] 跨平台 API 发布器 (WordPress/Webflow)
- [ ] 多模态内容生成 (图文转视频)

---

## 📄 许可证
本项目采用 [Apache-2.0](LICENSE) 许可证。

---
**GEOFlow** - *为 AI 搜索时代重新定义内容工程。*
