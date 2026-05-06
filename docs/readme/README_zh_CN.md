# 🚀 GEOFlow: Generative Engine Optimization Flow

[English](./README_en.md) | [简体中文](./README_zh_CN.md) | [繁體中文](../../README.md) | [Español](./README_es.md) | [日本語](./README_ja.md) | [Português](./README_pt_BR.md) | [Русский](./README_ru.md)

**GEOFlow** 是一个专为 **GEO (生成式引擎优化)** 与 **现代 SEO** 打造的开源智能内容工程系统。

在 AI 搜索引擎（如 SearchGPT, Perplexity, Google SGE）崛起的时代，传统的内容堆砌已失去效力。GEOFlow 通过系统化的数据处理、RAG (检索增强生成) 技术以及语义网络构建，将原始数据转化为具备“高采信度”与“结构化语义”的 AI 优化内容。

---

## 🍴 Fork 说明
本项目 Fork 自 [yaojingang/GEOFlow](https://github.com/yaojingang/GEOFlow)，并在其基础上进行了深度优化与功能增强。

---

## 🔥 为什么选择 GEOFlow？

GEOFlow 不仅仅是一个 CMS，它是一个 **AI 内容工厂**。相比于传统工具，它在“事实权威性”与“机器可读性”上进行了深度强化。

### 核心强势功能：

#### 1. 顶尖 RAG 引擎：混合检索 (Hybrid Search)
*   **语义 + 精确：** 同时结合 `pgvector` 语义搜索与 PostgreSQL `tsvector` 全文检索。
*   **RRF 融合算法：** 采用工业级 RRF (Reciprocal Rank Fusion) 算法，确保 AI 获取的参考知识既精确又具备语义连贯性，从而彻底消除 AI 幻觉。

#### 2. 事实权威性：引用溯源系统 (Citation & Sourcing)
*   **自动脚注：** AI 在生成内容时会自动根据参考知识标注脚注（如 `[^1]`）。
*   **可验证性：** 前端自动生成具备双向跳转功能的“参考文献”列表，极大提升内容在 Google E-E-A-T 评分中的权威度。

#### 3. 语义网络构建：自动化 JSON-LD 实体标注
*   **知识图谱友好：** 自动提取文章中的“人物、组织、地点、话题”实体。
*   **Schema.org Graph：** 动态注入复杂的 JSON-LD 结构化数据，主动向搜索引擎宣告内容的语义结构。

#### 4. 主题集群：语义内链网络 (Topic Clusters)
*   **向量关联：** 基于向量相似度自动构建文章间的内链网络。
*   **权威传递：** 通过高相关性的内链链接，构建强大的主题集群，让搜索引擎将您的站点视为特定领域的专家。

#### 5. 极致性能：智能媒体优化 (Edge Performance)
*   **现代格式：** 图片自动转换为 WebP/AVIF 格式。
*   **响应式渲染：** 采用 `<picture>` 标签实现 WebP 优先加载，极大优化 Core Web Vitals (LCP) 指标。

---

## 🛠️ 技术架构

GEOFlow 基于最新的技术栈构建，确保效能与可扩展性：

-   **核心框架:** [Laravel 12](https://laravel.com/) (PHP 8.2+)
-   **数据库:** PostgreSQL + **pgvector** (向量存储)
-   **异步处理:** Redis + **Laravel Horizon** (任务调度与监控)
-   **AI 集成:** `laravel/ai` SDK (支持 OpenAI 兼容的所有 LLMs)
-   **实时通讯:** Laravel Reverb (WebSocket 实时进度回传)
-   **前端性能:** TailwindCSS 4 + Vite

---

## 📦 快速开始

### 环境要求
- PHP 8.2+
- PostgreSQL (需安装 `pgvector` 扩展)
- Redis
- Node.js & NPM

### 安装步骤
```bash
# 1. 克隆仓库
git clone https://github.com/alingowangxr/GEOFlow.git && cd GEOFlow

# 2. 执行自动化设置脚本
composer run setup

# 3. 配置环境变量
# 编辑 .env 文件，配置 DB_CONNECTION=pgsql 以及你的 AI_API_KEY
```

### 开发与执行
```bash
# 同时启动服务、队列监控与 Vite
npm run dev
```

---

## 📈 工作流概述

1.  **导入素材:** 上传 PDF、文档或 URL，系统自动分块并向量化进入知识库。
2.  **编排任务:** 设置 Prompt 模板、模型路由与发布间隔。
3.  **智能生成:** AI 代理 (Agents) 检索混合上下文，生成带有引用标注的 Markdown 内容。
4.  **语义增强:** 自动提取实体、生成文章向量、计算语义内链。
5.  **自动分发:** 内容自动通过 SEO 优化的主题模板发布，并更新动态 Sitemap。

---

## 🗺️ 路线图 (Roadmap)
- [x] 混合检索 (Hybrid Search) 与 RRF 融合
- [x] 引用溯源系统 (Citation System)
- [x] 自动化 JSON-LD 实体标注
- [x] 语义内链推荐引擎
- [x] WebP/AVIF 智能媒体优化
- [ ] 跨平台 API 推送 (WordPress, Webflow)
- [ ] 多模态内容生成 (自动生成与内容匹配的影片/音频)

---

## 📄 许可证
本项目采用 [Apache-2.0](LICENSE) 许可证。

---
**GEOFlow** - *为 AI 搜索时代重新定义内容工程。*
