# 🚀 GEOFlow: Generative Engine Optimization Flow

[English](./README_en.md) | [简体中文](./README_zh_CN.md) | [繁體中文](../../README.md) | [Español](./README_es.md) | [日本語](./README_ja.md) | [Português](./README_pt_BR.md) | [Русский](./README_ru.md)

**GEOFlow** es un sistema inteligente de ingeniería de contenidos de código abierto diseñado específicamente para **GEO (Generative Engine Optimization)** y **SEO Moderno**.

En la era de los motores de búsqueda de IA (como SearchGPT, Perplexity, Google SGE), la "autoridad fáctica" y la "legibilidad por máquina" del contenido se han vuelto críticas para la adquisición de tráfico. GEOFlow transforma los materiales brutos en contenido de alta calidad que está fundamentado en hechos, es semánticamente rico y se carga a la velocidad del rayo mediante el procesamiento sistemático de datos, tecnología RAG de primer nivel y construcción de redes semánticas.

---

## 🍴 Información de Fork
Este proyecto es un fork de [yaojingang/GEOFlow](https://github.com/yaojingang/GEOFlow), con optimizaciones profundas y mejoras funcionales de grado industrial.

---

## 🌟 Matriz de Funciones Principales

### 1. Motor RAG (Generación Aumentada por Recuperación) Avanzado
*   **Búsqueda Híbrida:** Combina la búsqueda semántica `pgvector` con la búsqueda de texto completo `tsvector` de PostgreSQL para capturar con precisión la intención del usuario y las palabras clave principales.
*   **Algoritmo de Fusión RRF:** Emplea el algoritmo Reciprocal Rank Fusion de grado industrial para equilibrar los resultados de búsqueda y eliminar por completo las alucinaciones de la IA.
*   **Citación y Sourcing:** La IA marca automáticamente las notas al pie (ej. `[^1]`) y el frontend genera una lista de referencias con saltos, cumpliendo con los requisitos de autoridad E-E-A-T de Google.
*   **Procesamiento Inteligente de Materiales:** Soporta carga de PDF/documentos y rastreo de URL con fragmentación y vectorización automática de alta calidad.

### 2. Web Semántica y Optimización GEO
*   **Motor de Entidades JSON-LD:** Extrae automáticamente entidades (Persona, Organización, Lugar, etc.) e inyecta datos estructurados Schema.org Graph para interactuar proactivamente con los grafos de conocimiento de los motores de búsqueda.
*   **Enlaces Internos Semánticos:** Construye automáticamente "Clústeres de Temas" basados en la similitud de vectores, logrando enlaces semánticos de alta relevancia entre artículos.
*   **Fragmentos Inteligentes y Meta:** Genera automáticamente descripciones Meta, palabras clave, etiquetas Open Graph y extractos de contenido que cumplen con SEO.

### 3. Orquestación de Materiales y Tareas de IA
*   **Gestión Centralizada de Materiales:** Bibliotecas integradas para títulos, palabras clave, imágenes, bases de conocimientos (con fragmentación/vista previa de vectores) y sistemas de gestión de autores.
*   **Flujo de Trabajo de Tres Etapas:** Proporciona un pipeline completo de "Borrador → Revisión → Publicación" con soporte para intervención manual o estrategias automatizadas.
*   **Programación por Lotes de IA:** Soporta tareas en bucle, intervalos de publicación personalizados y enrutamiento de failover multimodelo.
*   **Compatibilidad Multimodelo:** Compatible con todos los LLM principales a través del protocolo OpenAI (ej. GPT-4, Claude, DeepSeek, Gemini, etc.).

### 4. SEO Técnico y Rendimiento Extremo
*   **Optimización Inteligente de Medios:** Las imágenes se convierten automáticamente al formato WebP y se renderizan usando la etiqueta `<picture>` para carga responsiva, mejorando enormemente los Core Web Vitals (LCP).
*   **Sitemap Dinámico:** Genera automáticamente sitemaps XML basados en el peso del contenido para guiar a los rastreadores al contenido principal.
*   **Monitoreo en Tiempo Real y API:** Integrado con Laravel Horizon para monitoreo visualizado de colas, proporcionando APIs RESTful y herramientas CLI para una integración de automatización perfecta.

---

## 🛠️ Arquitectura Técnica

-   **Framework Principal:** [Laravel 12](https://laravel.com/) (PHP 8.2+)
-   **Base de Datos:** PostgreSQL + **pgvector** (Centro de Datos de Vectores)
-   **Procesamiento Asíncrono:** Redis + **Laravel Horizon** (Colas de tareas de alto rendimiento)
-   **AI SDK:** Paquete oficial `laravel/ai`
-   **Tiempo Real:** Laravel Reverb (WebSocket)
-   **Despliegue:** Soporte completo de Docker Compose para configuración en un clic.

---

## 📦 Inicio Rápido (Docker)

### Requisitos del Entorno
- Docker & Docker Compose
- API Key de modelo de IA (compatible con OpenAI)

### Pasos de Instalación
```bash
# 1. Clonar el repositorio
git clone https://github.com/alingowangxr/GEOFlow.git && cd GEOFlow

# 2. Preparar variables de entorno
cp .env.example .env
# Edite .env, configure DB_CONNECTION=pgsql y su AI_API_KEY

# 3. Iniciar servicios
docker compose --profile scheduler up -d --build
```

### URLs de Acceso
- **Frontend:** `http://localhost:18080`
- **Backend:** `http://localhost:18080/geo_admin/` (Por defecto: `admin` / `admin888`)

---

## 🗺️ Hoja de Ruta (Roadmap)
- [x] Búsqueda Híbrida y Algoritmo RRF (Hybrid RAG)
- [x] Citaciones y Notas al Pie Bidireccionales (Citations)
- [x] Etiquetado de Entidades JSON-LD Automatizado (Structured Data)
- [x] Motor de Recomendación de Enlaces Semánticos (Topic Clusters)
- [x] Optimización Inteligente de Medios WebP/AVIF (LCP Enhancement)
- [ ] Publicador de API Multiplataforma (WordPress/Webflow)
- [ ] Generación de Contenido Multimodal (Texto a Video)

---

## 📄 Licencia
Este proyecto está bajo la licencia [Apache-2.0](LICENSE). El uso comercial es bienvenido.

---
**GEOFlow** - *Redefiniendo la ingeniería de contenidos para la era de la búsqueda por IA.*
