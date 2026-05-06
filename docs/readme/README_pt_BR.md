# 🚀 GEOFlow: Generative Engine Optimization Flow

[English](./README_en.md) | [简体中文](./README_zh_CN.md) | [繁體中文](../../README.md) | [Español](./README_es.md) | [日本語](./README_ja.md) | [Português](./README_pt_BR.md) | [Русский](./README_ru.md)

**GEOFlow** é um sistema inteligente de engenharia de conteúdo de código aberto projetado especificamente para **GEO (Generative Engine Optimization)** e **SEO Moderno**.

Na era dos mecanismos de busca de IA (como SearchGPT, Perplexity, Google SGE), a "autoridade" e a "leitura por máquina" do conteúdo tornaram-se críticas para a aquisição de tráfego. O GEOFlow transforma materiais brutos em conteúdo de alta qualidade, fundamentado em fatos, semanticamente rico e com carregamento ultrarrápido, por meio de processamento sistemático de dados, tecnologia RAG de ponta e construção de redes semânticas.

---

## 🍴 Informações de Fork
Este projeto é um fork de [yaojingang/GEOFlow](https://github.com/yaojingang/GEOFlow), com otimizações profundas e melhorias funcionais de nível industrial.

---

## 🌟 Matriz de Recursos Principais

### 1. Mecanismo RAG (Geração Aumentada por Recuperação) Avançado
*   **Busca Híbrida:** Combina a busca semântica `pgvector` com a busca de texto completo `tsvector` do PostgreSQL para capturar com precisão a intenção do usuário e palavras-chave centrais.
*   **Algoritmo de Fusão RRF:** Emprega o algoritmo Reciprocal Rank Fusion de nível industrial para equilibrar os resultados da busca e eliminar completamente as alucinações da IA.
*   **Citação e Sourcing:** A IA marca automaticamente as notas de rodapé (ex: `[^1]`) e o frontend gera uma lista de referências clicáveis, atendendo aos requisitos de autoridade E-E-A-T do Google.
*   **Processamento Inteligente de Materiais:** Suporta upload de PDF/documentos e rastreamento de URL com fragmentação e vetorização automática de alta qualidade.

### 2. Web Semântica e Otimização GEO
*   **Mecanismo de Entidades JSON-LD:** Extrai automaticamente entidades (Pessoa, Organização, Local, etc.) e injeta dados estruturados Schema.org Graph para interagir proativamente com os gráficos de conhecimento dos mecanismos de busca.
*   **Links Internos Semânticos:** Constrói automaticamente "Clusters de Tópicos" baseados na similaridade de vetores, alcançando links semânticos de alta relevância entre artigos.
*   **Snippets Inteligentes e Meta:** Gera automaticamente descrições Meta, palavras-chave e resumos de conteúdo compatíveis com SEO.

### 3. Orquestração de Materiais e Tarefas
*   **Gestão Centralizada:** Bibliotecas integradas para títulos, palavras-chave, imagens e sistemas de gestão de autores.
*   **Tarefas em Lote de IA:** Suporta tarefas em loop, configurações de intervalo de publicação e roteamento automático multimodelo.
*   **Suporte Multimodelo:** Compatível com todos os principais LLMs via protocolo OpenAI, suportando estratégias de failover.
*   **Gestão do Ciclo de Vida:** Abrange todo o processo, desde a geração de rascunhos e revisão manual/auto até a publicação agendada.

### 4. SEO Técnico e Desempenho Extremo
*   **Otimização Inteligente de Mídia:** Imagens são convertidas automaticamente para o formato WebP e renderizadas usando a tag `<picture>` para carregamento responsivo, melhorando muito os indicadores LCP.
*   **Sitemap Dinâmico:** Gera automaticamente sitemaps XML baseados no peso do conteúdo para guiar os rastreadores ao conteúdo principal.
*   **Monitoramento em Tempo Real:** Integrado ao Laravel Horizon para monitoramento visualizado de filas de tarefas e rastreamento de batimentos cardíacos.

---

## 🛠️ Arquitetura Técnica

-   **Framework Principal:** [Laravel 12](https://laravel.com/) (PHP 8.2+)
-   **Banco de Dados:** PostgreSQL + **pgvector** (Hub de Dados Vetoriais)
-   **Processamento Assíncrono:** Redis + **Laravel Horizon** (Filas de tarefas de alto desempenho)
-   **AI SDK:** Pacote oficial `laravel/ai`
-   **Tempo Real:** Laravel Reverb (WebSocket)
-   **Frontend:** TailwindCSS 4 + Vite

---

## 📦 Início Rápido

### Requisitos do Ambiente
- PHP 8.2+
- PostgreSQL (com extensão `pgvector`)
- Redis 6.2+
- Node.js & NPM

### Passos de Instalação
```bash
# 1. Clonar o repositório
git clone https://github.com/alingowangxr/GEOFlow.git && cd GEOFlow

# 2. Executar o script de configuração automatizada
composer run setup

# 3. Configurar variáveis de ambiente
# Edite .env, configure DB_CONNECTION=pgsql e sua AI_API_KEY
```

### Iniciar Desenvolvimento
```bash
npm run dev
```

---

## 🗺️ Roadmap
- [x] Busca Híbrida e Algoritmo RRF
- [x] Citações e Notas de Rodapé Bidirecionais
- [x] Etiquetagem de Entidades JSON-LD Automatizada
- [x] Mecanismo de Recomendação de Links Semânticos
- [x] Otimização Inteligente de Mídia WebP/AVIF
- [ ] Publicador de API Multiplataforma (WordPress/Webflow)
- [ ] Geração de Conteúdo Multimodal (Texto para Vídeo)

---

## 📄 Licença
Este projeto está sob a licença [Apache-2.0](LICENSE).

---
**GEOFlow** - *Redefinindo a engenharia de conteúdo para a era da busca por IA.*
