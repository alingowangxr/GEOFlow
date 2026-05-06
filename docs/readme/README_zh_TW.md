# GEOFlow

> Languages: [简体中文](../../README.md) | [繁體中文](README_zh_TW.md) | [English](README_en.md) | [日本語](README_ja.md) | [Español](README_es.md) | [Русский](README_ru.md) | [Português (BR)](README_pt_BR.md)

> GEOFlow 是一套專門面向 GEO（生成式引擎最佳化）的開源智慧內容工程系統，是全球最早圍繞 GEO 場景系統化設計的資料、內容與分發基礎設施之一。它把資料沉澱、知識庫、素材管理、AI 生成、審核發佈、前台展示與後續多端分發串聯為一條可持續迭代的工作鏈路，目標是逐步演進為一套強大的「從資料到內容、從內容到多端發佈」的 GEO 最佳化系統。

[![PHP](https://img.shields.io/badge/PHP-8.2%2B-blue)](https://www.php.net/)
[![PostgreSQL](https://img.shields.io/badge/Database-PostgreSQL-336791)](https://www.postgresql.org/)
[![Docker](https://img.shields.io/badge/Docker-Compose-blue)](https://docs.docker.com/compose/)
[![License](https://img.shields.io/badge/License-Apache--2.0-blue.svg)](../../LICENSE)
[![GitHub stars](https://img.shields.io/github/stars/yaojingang/GEOFlow?style=social)](https://github.com/yaojingang/GEOFlow/stargazers)
[![GitHub forks](https://img.shields.io/github/forks/yaojingang/GEOFlow?style=social)](https://github.com/yaojingang/GEOFlow/network/members)
[![GitHub issues](https://img.shields.io/github/issues/yaojingang/GEOFlow)](https://github.com/yaojingang/GEOFlow/issues)

GEOFlow 以 [Apache License 2.0](../../LICENSE) 開源發佈。你可以自由使用、複製、修改和分發本專案，包括商業使用；請保留版權聲明和許可證文本，並遵守 Apache-2.0 的專利授權、商標與免責聲明條款。

---

## ✨ 你可以用它做什麼

| 特性 | 說明 |
|------|------|
| 🤖 多模型內容生成 | 相容 OpenAI 風格介面，支援 chat / embedding 等模型類型、Provider URL 自動適配、智慧模型切換與失敗重試 |
| 📦 批量任務執行 | 任務建立、文章總數與發佈節奏控制、隊列執行、失敗記錄與任務文章篩選；可選 **Laravel Horizon** 監控 |
| 🗂 素材統一管理 | 標題庫、關鍵字庫、圖片庫、作者庫、知識庫、提示詞集中管理 |
| 🧠 知識庫 RAG | 知識庫上傳後自動分塊；設定 embedding 模型後可寫入向量並在生成時檢索相關片段 |
| 📋 審核與發佈工作流程 | 草稿、審核、發佈流程，可設定自動發佈；文章管理支援狀態、作者、任務等篩選 |
| 🔍 面向搜尋展示最佳化 | 文章 SEO 元資料、Open Graph、結構化資料；前台 Markdown 支援標題、表格、列表、圖片等渲染 |
| 🎨 前台與主題 | 預設主題、主題包、預覽路徑、後台主題切換；站點名稱僅影響前台，後台品牌固定為 GEOFlow |
| 🌍 後台多語言 | 後台支援中文、英文、日語、西班牙語、俄語、葡萄牙語（巴西）切換 |
| 🔔 版本提醒 | 後台可按 `version.json` 檢查 GitHub 新版本，並在有新版本時提醒管理員 |
| 🐳 可直接部署 | **Docker Compose** 一鍵拉起 PostgreSQL（pgvector）、Redis、應用、隊列、排程與 Reverb |
| 🗄 PostgreSQL 執行階段 | 預設基於 PostgreSQL，適合穩定執行與併發寫入 |

---

## 🖼 介面預覽

<p>
  <img src="../../docs/images/screenshots/home.png" alt="GEOFlow 首頁預覽" width="48%" />
  <img src="../../docs/images/screenshots/task-management.png" alt="GEOFlow 任務管理預覽" width="48%" />
</p>
<p>
  <img src="../../docs/images/screenshots/article-management.png" alt="GEOFlow 文章管理預覽" width="48%" />
  <img src="../../docs/images/screenshots/ai-config.png" alt="GEOFlow AI 設定器預覽" width="48%" />
</p>

上述頁面覆蓋站點首頁、任務排程、文章流程與模型設定等主鏈路；更多後台說明見 `docs/`（若目錄中暫無截圖資源，請本地補全或替換為你的截圖路徑）。

---

## 🆕 新版本重點

新版本重點變化包括：

- **後台體驗**：固定後台品牌為 GEOFlow，支援多語言切換、管理員編輯/刪除、首次歡迎頁、版本更新提醒和儀表板快速上手。
- **任務鏈路**：任務支援固定模型與智慧模型切換；生成與發佈分離，任務文章可從任務列表跳轉到對應篩選結果。
- **素材體系**：素材庫入口覆蓋知識庫、標題庫、關鍵字庫、圖片庫和作者庫；知識庫提供分塊與向量化狀態預覽。
- **模型接入**：Provider URL 規則更清晰，相容 OpenAI 風格介面以及智譜、火山方舟等非 `/v1` 路徑；embedding 未設定時提供明確引導。
- **前台輸出**：文章頁 Markdown 採用 GFM 渲染，支援表格、標題、列表、圖片；歷史圖片路徑自動相容 `/uploads` 與 `/storage/uploads`。
- **部署與安全**：支援自定義後台路徑 `ADMIN_BASE_PATH`，生產建議使用 Nginx + PHP-FPM，預設管理員密碼必須在上線前修改。

---

## 🏗 執行結構

```
後台管理頁面
    ↓
任務排程器 / 隊列（Horizon 可選）
    ↓
Worker 執行 AI 生成
    ↓
草稿 / 審核 / 發佈
    ↓
前台文章與 SEO 頁面輸出
```

---

## 🧱 系統架構

| 層級 | 說明 |
|------|------|
| Web / Admin | **Laravel** 路由與控制器；前台文章站點與 **Blade** 後台；內容瀏覽、素材、任務與設定入口 |
| API | `routes/api.php` 等提供機器可調用的 HTTP 介面（鑑權以專案設定為准） |
| Scheduler / Queue / Reverb | **Laravel Scheduler** 掃描與入隊；**`queue:work` / Horizon** 消費任務；**Reverb** 提供 WebSocket（按需啟用） |
| Domain & Jobs | `app/Services`、`app/Jobs`、`app/Http/Controllers` 等承載業務規則與 GEO 任務流水線 |
| Persistence | **PostgreSQL**（推薦 **pgvector** 映像檔與線上實例一致）+ **Redis**（隊列/快取等） |

核心鏈路：

1. 在後台設定模型、提示詞與素材庫
2. 準備知識庫、標題庫、關鍵字庫、圖片庫和作者庫
3. 建立任務並進入排程與隊列
4. Worker（隊列程序）調用模型生成正文與元資料
5. 文章進入草稿、審核、發佈鏈路
6. 前台輸出文章與 SEO 頁面

---

## ⚡ 後台三步上手

登入後台後，建議按儀表板裡的「快速上手」完成第一輪驗證：

1. **設定 API**：至少添加一個可用 chat 模型；如果需要知識庫 RAG 檢索，再添加一個 embedding 模型。
2. **設定素材庫**：準備知識庫、標題庫、關鍵字庫、圖片庫和作者。知識庫建議先用真實、可驗證的業務資料。
3. **新建任務**：選擇標題庫、素材、模型、生成數量和發佈頻率，先讓文章進入草稿或審核流程，再逐步開啟自動發佈。

---

## 🎯 適用場景與目標收益

GEOFlow 適合這些真實且可落地的場景：

- **獨立 GEO 官網**
  把官網內容、產品資料、FAQ、案例和品牌知識組織成一個可持續更新內容系統。目標是提升 AI 搜尋能見度、品牌信源覆蓋和內容營運效率，而不是堆砌低質量頁面。
- **官網中的 GEO 子頻道**
  在現有官網下搭建一個獨立的資訊、知識或解決方案頻道。目標是讓品牌內容更結構化、更適合搜尋引用，也方便不同團隊協同更新。
- **獨立 GEO 資訊來源站點**
  面向某個行業、主題或問題領域，持續沉澱高質量文章、榜單、解讀、指南和資料。目標是構建穩定可信的外部內容資產，而不是做資訊污染。
- **GEO 內容管理系統**
  作為內部內容生產後台，統一管理模型、素材、標題、圖片、知識庫、審核和發佈。目標是提升團隊效率、降低重複勞動、減少分散工具切換。
- **GEO 多站點 / 多欄目部署**
  用同一套系統管理多個站點、多個欄目或多個主題模板。目標是讓內容生產、模板切換、分發和維護更標準化。
- **自動化資訊來源管理與內容分發**
  對知識庫、專題內容、資訊更新和內容分發流程進行工程化管理。目標是讓真正有價值的訊息更穩定地被用戶和 AI 理解、引用和檢索。

這套系統的收益，應該建立在**真實、優質、持續維護的知識庫**之上。
我們不鼓勵利用系統製造資訊噪音、批量污染網際網路或堆積虛假內容。GEOFlow 的本質是幫助團隊更高效地管理、生產和分發可信內容，提升 AI 行銷效率和 GEO 營運效率，而不是替代事實、替代判斷或替代內容品質本身。

---

## 🧭 場景對應的部署與使用方式

不同場景下，建議這樣使用 GEOFlow：

- **作為獨立 GEO 官網執行**
  直接部署完整前台與後台，圍繞官網欄目、產品頁延展內容、FAQ、案例和專題進行營運。適合希望把官網做成 AI 搜尋友善型內容資產的團隊。
- **作為官網中的 GEO 子頻道執行**
  將 GEOFlow 作為一個相對獨立內容頻道部署，再透過導航、子網域或目錄與主站串接。適合不想重構主站、但需要快速上線內容頻道的團隊。
- **作為 GEO 資訊來源站執行**
  單獨維護一個面向特定主題的內容站點，把知識庫和資料建設放在首位，再透過任務系統做穩定更新。適合想做行業型、專題型或問題導向型內容資產的團隊。
- **作為內部 GEO 內容管理後台執行**
  把前台弱化，重點使用後台的模型設定、素材庫、任務排程、審核發佈與 API 能力。適合內容團隊、增長團隊、品牌團隊做內部生產系統。
- **作為多站點 / 多頻道系統執行**
  使用不同模板、欄目、網域或部署實例，管理多個內容出口。適合需要同時維護多個品牌頻道、多個主題站或多個實驗站點的團隊。
- **作為自動化資訊來源管理系統執行**
  重點建設知識庫、標題庫、圖片庫和提示詞體系，把系統當作一個內容工程與分發操作台。適合希望長期沉澱可信知識資產、再逐步擴展自動化能力的團隊。

建議的使用順序是：

1. 先確定真實的業務目標和目標讀者
2. 先建設知識庫，再建設自動化流程
3. 先確保內容真實、可核驗、可維護
4. 再用模型、任務和模板能力去提升效率

如果知識庫本身不真實、不完整、不穩定，再強的自動化也之後放大噪音。
所以在 GEOFlow 裡，**知識庫建設應該始終排在最前面**。

---

## 🚀 快速上手

### 方式一：Docker（開發 / 演示）

```bash
# 1. 複製儲存庫
git clone https://github.com/yaojingang/GEOFlow.git
cd GEOFlow

# 2. 複製環境變數
cp .env.example .env

# 3. 按需編輯 .env（資料庫、Redis、APP_URL、ADMIN_BASE_PATH、REVERB_* 等）
vi .env

# 4. 建置並啟動（含 postgres、redis、init、app、queue, scheduler、reverb）
docker compose build
docker compose up -d
```

- 前台預設存取：`http://localhost:18080`（連接埠由環境變數 **`APP_PORT`** 控制，預設 `18080`）
- 後台登入：`http://localhost:18080/geo_admin/login`（前綴由 **`ADMIN_BASE_PATH`** 控制，預設 `geo_admin`）

首次啟動會執行 **`init`** 容器：在資料庫就緒後執行首次遷移與種子（預設管理員見下文「預設管理員」）。

### 方式一補充：Docker（生產）

生產環境建議使用 **`docker-compose.prod.yml`**，改為 **`Nginx + php-fpm`**，而不是 `php artisan serve`。

```bash
cp .env.prod.example .env.prod
vi .env.prod

docker compose --env-file .env.prod -f docker-compose.prod.yml build
docker compose --env-file .env.prod -f docker-compose.prod.yml up -d postgres redis
docker compose --env-file .env.prod -f docker-compose.prod.yml up -d init
docker compose --env-file .env.prod -f docker-compose.prod.yml up -d app web queue scheduler reverb
```

- 前台 / 後台統一經 `web`（Nginx）存取
- PHP 由 `app`（php-fpm）解析
- **預設管理員**：生產不會自動 `db:seed`，遷移成功後需手動執行一次（命令與帳號見 `../../docs/deployment/DEPLOYMENT.md`「預設管理員（首次種子）」）
- 詳細說明見 `../../docs/deployment/DEPLOYMENT.md`

### 方式二：本地 PHP 伺服器

**前置要求：** PHP **8.2+**，啟用 `pdo_pgsql`、`redis` 等 Laravel 常用擴充；本機已安裝 **PostgreSQL** 與 **Redis**；已安裝 **Composer 2.x**。

```bash
# 1. 複製儲存庫
git clone https://github.com/yaojingang/GEOFlow.git
cd GEOFlow

# 2. 環境與依賴
cp .env.example .env
# 編輯 .env：將 DB_HOST/DB_* 指向本機 Postgres，REDIS_* 指向本機 Redis，QUEUE_CONNECTION=redis 等

composer install --no-interaction --prefer-dist
php artisan key:generate

# 3. 資料庫與儲存
php artisan migrate --force
php artisan db:seed --force    # 可選：寫入預設管理員等
php artisan storage:link

# 4. 開發用 HTTP（僅本地除錯；生產請用 Nginx + PHP-FPM，站點根目錄 public/）
php artisan serve --host=127.0.0.1 --port=8080
```

另開終端機啟動常駐程序（與 Docker 中 `queue` / `scheduler` / `reverb` 對應）：

```bash
php artisan queue:work redis --queue=geoflow,default --sleep=1 --tries=1 --timeout=300
php artisan schedule:work
php artisan reverb:start
```

- 後台：`http://127.0.0.1:8080/geo_admin/login`（若修改了 `ADMIN_BASE_PATH` 請替換路徑）
- 生產可用 `php artisan horizon` 替代 `queue:work`（需按專案設定託管程序）

---

## 環境要求（部署檢查清單）

| 元件 | 說明 |
|------|------|
| PHP | **8.2+**（Docker 映像檔可為 8.4） |
| 擴充 | Laravel 常規擴充；PostgreSQL 需 `pdo_pgsql`；Redis 隊列需 `redis` |
| Composer | 2.x |
| 資料庫 | **PostgreSQL**（推薦 **pgvector**，與 `docker-compose.yml` 中映像檔一致） |
| Redis | 隊列、快取等（本地極簡除錯可將 `QUEUE_CONNECTION` 改為 `sync`，生產不推薦） |

---

## 原始碼部署補充說明

**目錄權限（Linux / macOS 常見）：**

```bash
chmod -R ug+rwx storage bootstrap/cache
```

**預設管理員（執行 `php artisan db:seed` 後，以 `Database\\Seeders\\AdminUserSeeder` 為準）：**

| 欄位 | 值 |
|------|-----|
| 用戶名 | `admin` |
| 密碼 | `password`（**生產環境請立即修改**） |

### 管理員登入失敗鎖定與手動解鎖

- 後台帳號連續登入失敗 **5 次** 會自動鎖定（`status=locked`）。
- 被鎖定帳號無法繼續登入，需管理員手動解鎖。
- 解鎖命令：

```bash
php artisan geoflow:admin-unlock <username>
```

例如：

```bash
php artisan geoflow:admin-unlock admin
```

**生產環境 Web：** 使用 Nginx / Apache + **PHP-FPM**，網站根目錄指向專案 **`public/`**，勿將儲存庫根目錄直接暴露為文件根。

---

## Docker 部署補充說明

### 開發 Compose 服務一覽

| 服務 | 作用 |
|------|------|
| `postgres` | PostgreSQL 16 + pgvector |
| `redis` | Redis 7 |
| `init` | 一次性初始化（`restart: "no"`） |
| `app` | `php artisan serve`，映射 **`${APP_PORT:-18080}:8080`** |
| `queue` | `queue:work redis` |
| `scheduler` | `schedule:work` |
| `reverb` | WebSocket，映射 **`${REVERB_EXPOSE_PORT:-18081}:8080`** |

宿主機僅綁定 **127.0.0.1** 暴露資料庫 / Redis 連接埠時，見 `docker-compose.yml` 中的 `DB_EXPOSE_PORT`、`REDIS_EXPOSE_PORT`。

### 入口腳本（`docker/entrypoint.sh`）常用變數

| 變數 | 預設 | 含義 |
|------|------|------|
| `COMPOSER_ON_START` | `true` | 容器啟動時執行 `composer install` |
| `AUTO_MIGRATE` | `true` | 每次啟動執行 `php artisan migrate --force` |
| `AUTO_INIT_ONCE` | 僅 `init` 為 `true` | 新庫時執行一次 `migrate` + `db:seed` |
| `AUTO_GENERATE_APP_KEY` | `init` 內為 `true` | 無有效 `APP_KEY` 時自動生成 |
| `AUTO_SEED` | `false` | 為 `true` 時**每次**啟動都 `db:seed`（慎用） |

Compose 將 **`./storage`** 與 **`./.env`** 掛載進容器；應用程式代碼在映像檔內。若要用於正式生產，請改用儲存庫新增的 **`docker-compose.prod.yml`**（`Nginx + php-fpm`），並參見 `../../docs/deployment/DEPLOYMENT.md`。

**升級建議：** `git pull` → `docker compose build` → `docker compose up -d`。

---

## 開發與測試

```bash
composer test
./vendor/bin/pint
```

---

## 🌍 多語言文件

- [简体中文](../../README.md)
- [繁體中文](README_zh_TW.md)
- [English](README_en.md)
- [日本語](README_ja.md)
- [Español](README_es.md)
- [Русский](README_ru.md)
- [Português (BR)](README_pt_BR.md)

---

## 📄 開源協議

本專案採用 [Apache License 2.0](../../LICENSE)。該協議允許個人和企業在遵守許可證聲明、版權保留、修改說明、專利授權和免責聲明等條款的前提下使用、修改、分發和商用 GEOFlow。

---

## ⭐ Star 趨勢

[![Star History Chart](https://api.star-history.com/svg?repos=yaojingang/GEOFlow&type=Date)](https://star-history.com/#yaojingang/GEOFlow&Date)
