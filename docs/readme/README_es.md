# 🚀 GEOFlow: Generative Engine Optimization Flow

[English](./README_en.md) | [繁體中文](../../README.md) | [Español](./README_es.md) | [日本語](./README_ja.md) | [Português](./README_pt_BR.md) | [Русский](./README_ru.md)

**GEOFlow** es un sistema inteligente de ingeniería de contenidos de código abierto diseñado específicamente para **GEO (Generative Engine Optimization)** y **SEO Moderno**.

En la era de los motores de búsqueda de IA (como SearchGPT, Perplexity, Google SGE), el relleno de contenido tradicional ha perdido su eficacia. GEOFlow transforma los datos brutos en contenido optimizado para IA con "alta credibilidad" y "semántica estructurada" a través del procesamiento sistemático de datos, la tecnología RAG (Generación Aumentada por Recuperación) y la construcción de redes semánticas.

---

## 🔥 ¿Por qué elegir GEOFlow?

GEOFlow es más que un simple CMS; es una **Fábrica de Contenidos de IA**. En comparación con las herramientas tradicionales, se ha reforzado profundamente en "autoridad fáctica" y "legibilidad por máquina".

### Características Principales:

#### 1. Motor RAG de Primer Nivel: Búsqueda Híbrida
*   **Semántica + Precisa:** Combina la búsqueda semántica `pgvector` con la búsqueda de texto completo `tsvector` de PostgreSQL.
*   **Algoritmo de Fusión RRF:** Emplea el algoritmo RRF (Reciprocal Rank Fusion) de grado industrial para garantizar que el conocimiento de referencia recuperado por la IA sea preciso y semánticamente coherente, eliminando por completo las alucinaciones de la IA.

#### 2. Autoridad Fáctica: Sistema de Citación y Sourcing
*   **Notas al Pie Automáticas:** La IA marca automáticamente las notas al pie (por ejemplo, `[^1]`) basándose en el conocimiento de referencia durante la generación de contenido.
*   **Verificabilidad:** El frontend genera automáticamente una lista de "Referencias" con funcionalidad de salto bidireccional, mejorando significativamente la autoridad del contenido en las calificaciones E-E-A-T de Google.

#### 3. Construcción de Red Semántica: Etiquetado de Entidades JSON-LD Automatizado
*   **Amigable con el Grafo de Conocimiento:** Extrae automáticamente entidades de "Persona, Organización, Lugar, Tema" de los artículos.
*   **Grafo Schema.org:** Inyecta dinámicamente datos estructurados JSON-LD complejos para declarar proactivamente la estructura semántica del contenido a los motores de búsqueda.

#### 4. Clústeres de Temas: Red de Enlaces Internos Semánticos
*   **Asociación por Vectores:** Construye automáticamente redes de enlaces internos basadas en la similitud de vectores.
*   **Transferencia de Autoridad:** Construye poderosos Clústeres de Temas a través de enlaces internos de alta relevancia, haciendo que los motores de búsqueda vean su sitio como un experto en campos específicos.

#### 5. Rendimiento Extremo: Optimización Inteligente de Medios (Edge Performance)
*   **Formatos Modernos:** Las imágenes se convierten automáticamente a formatos WebP/AVIF.
*   **Renderizado Responsivo:** Utiliza la etiqueta `<picture>` para implementar la carga prioritaria de WebP, optimizando enormemente los indicadores Core Web Vitals (LCP).

---

## 🛠️ Arquitectura Técnica

GEOFlow está construido sobre la última pila tecnológica, garantizando rendimiento y escalabilidad:

-   **Framework Principal:** [Laravel 12](https://laravel.com/) (PHP 8.2+)
-   **Base de Datos:** PostgreSQL + **pgvector** (Almacenamiento de vectores)
-   **Procesamiento Asíncrono:** Redis + **Laravel Horizon** (Programación y monitoreo de tareas)
-   **Integración de IA:** SDK `laravel/ai` (Soporta todos los LLMs compatibles con OpenAI)
-   **Comunicación en Tiempo Real:** Laravel Reverb (Retroalimentación de progreso en tiempo real por WebSocket)
-   **Rendimiento Frontend:** TailwindCSS 4 + Vite

---

## 📦 Inicio Rápido

### Requisitos del Entorno
- PHP 8.2+
- PostgreSQL (con la extensión `pgvector` instalada)
- Redis
- Node.js & NPM

### Pasos de Instalación
```bash
# 1. Clonar el repositorio
git clone https://github.com/yaojingang/GEOFlow.git && cd GEOFlow

# 2. Ejecutar el script de configuración automatizada
composer run setup

# 3. Configurar variables de entorno
# Edite el archivo .env, configure DB_CONNECTION=pgsql y su AI_API_KEY
```

### Desarrollo y Ejecución
```bash
# Inicie el servidor, el escuchador de colas y Vite simultáneamente
npm run dev
```

---

## 📈 Resumen del Flujo de Trabajo

1.  **Importar Materiales:** Suba PDFs, documentos o URLs; el sistema los divide y vectoriza automáticamente en la base de conocimientos.
2.  **Orquestar Tareas:** Establezca plantillas de Prompt, enrutamiento de modelos e intervalos de publicación.
3.  **Generación Inteligente:** Los Agentes de IA recuperan contextos híbridos y generan contenido Markdown con marcadores de citación.
4.  **Mejora Semántica:** Extraiga automáticamente entidades, genere vectores de artículos y calcule enlaces internos semánticos.
5.  **Distribución Automática:** El contenido se publica automáticamente a través de plantillas de temas optimizadas para SEO y se actualizan los Sitemaps dinámicos.

---

## 🗺️ Hoja de Ruta (Roadmap)
- [x] Búsqueda Híbrida con Fusión RRF
- [x] Sistema de Citación y Sourcing
- [x] Etiquetado de Entidades JSON-LD Automatizado
- [x] Motor de Recomendación de Enlaces Internos Semánticos
- [x] Optimización Inteligente de Medios WebP/AVIF
- [ ] Push de API multiplataforma (WordPress, Webflow)
- [ ] Generación de Contenido Multimodal (Generación automática de Video/Audio coincidente)

---

## 📄 Licencia
GEOFlow está bajo la licencia [Apache-2.0](LICENSE).

---
**GEOFlow** - *Redefiniendo la ingeniería de contenidos para la era de la búsqueda por IA.*
