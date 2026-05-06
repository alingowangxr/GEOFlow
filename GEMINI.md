# GEMINI.md - GEOFlow Project Context

## Project Overview
**GEOFlow** (Generative Engine Optimization Flow) is an open-source intelligent content engineering system designed specifically for **GEO (Generative Engine Optimization)**. It provides a systematic infrastructure for data, content, and distribution, bridging the gap between raw data and multi-channel AI-optimized content.

### Core Architecture
- **Framework:** Laravel 12 (PHP 8.2+)
- **Database:** PostgreSQL with **pgvector** for RAG (Retrieval-Augmented Generation)
- **Cache/Queue:** Redis with **Laravel Horizon** for monitoring
- **AI SDK:** `laravel/ai` (Official Laravel AI SDK)
- **Frontend:** Blade templates with **TailwindCSS 4** and **Vite**
- **Real-time:** **Laravel Reverb** (WebSocket)
- **Deployment:** Docker Compose (Nginx + PHP-FPM)

## Key Workflows
1. **Material Management:** Centralized management of knowledge bases, title libraries, keywords, images, and authors.
2. **RAG (Retrieval-Augmented Generation):** Knowledge bases are automatically chunked and vectorized (using pgvector) for AI context retrieval.
3. **AI Task Orchestration:** Batch tasks generate content using configured AI models (OpenAI-compatible) and prompts.
4. **Content Lifecycle:** Draft -> Review -> Publish (with SEO metadata and structured data).
5. **Distribution:** Multi-language support and themeable frontend display.

## Important Directories
- `app/Ai/Agents`: Logic for AI agents (e.g., `MarkdownContentWriterAgent`).
- `app/Services/GeoFlow`: Core business logic for the GEO workflow.
- `app/Models`: Core entities like `Task`, `KnowledgeBase`, `KnowledgeChunk`, `Article`.
- `app/Jobs`: Asynchronous jobs for content generation and vectorization.
- `config/geoflow.php`: Main configuration for GEOFlow-specific settings.
- `docs/`: Comprehensive documentation in multiple languages.

## Development Commands
- **Setup:** `composer run setup` (installs deps, runs migrations, builds assets).
- **Development Server:** `npm run dev` (starts Vite and concurrently runs artisan serve/queue).
- **Queue/Jobs:** `php artisan horizon` or `php artisan queue:work`.
- **Scheduler:** `php artisan schedule:work`.
- **Testing:** `composer test` or `php artisan test`.
- **Linting:** `./vendor/bin/pint` (Laravel Pint).
- **WebSockets:** `php artisan reverb:start`.

## Technical Conventions & Guidelines
- **AI Integration:** Use the `Laravel\Ai\` namespace. AI Agents (found in `app/Ai/Agents`) should implement `Agent`, `Conversational`, and `HasTools` interfaces, and use the `Promptable` trait. Note the use of `#[Timeout(X)]` attributes for long-running AI requests.
- **Styling:** Adhere to **TailwindCSS 4** utility classes.
- **Database:** Use Eloquent models and migrations. Ensure pgvector is used for embedding storage.
- **Concurrency:** Prefer asynchronous jobs for long-running AI tasks.
- **API:** OpenAI-compatible interfaces are standard for model integration.

## Testing Strategy
- Use **PHPUnit** for unit and feature tests.
- **Database:** Tests use an in-memory **SQLite** database by default (see `tests/TestCase.php`). Note that `pgvector` specific features may need careful mocking or a dedicated PostgreSQL testing database.
- Mock AI responses using `laravel/ai` testing capabilities to avoid unnecessary API costs.
- Verify RAG retrieval logic by testing vector similarity queries when using a compatible database environment.
