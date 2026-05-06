# 🚀 GEOFlow: Generative Engine Optimization Flow

**GEOFlow** é um sistema inteligente de engenharia de conteúdo de código aberto projetado especificamente para **GEO (Generative Engine Optimization)** e **SEO Moderno**.

Na era dos mecanismos de busca de IA (como SearchGPT, Perplexity, Google SGE), o preenchimento de conteúdo tradicional perdeu sua eficácia. O GEOFlow transforma dados brutos em conteúdo otimizado para IA com "alta credibilidade" e "semântica estruturada" por meio de processamento sistemático de dados, tecnologia RAG (Geração Aumentada por Recuperação) e construção de redes semânticas.

---

## 🔥 Por que escolher o GEOFlow?

O GEOFlow é mais do que apenas um CMS; é uma **Fábrica de Conteúdo de IA**. Comparado às ferramentas tradicionais, ele foi profundamente reforçado em "autoridade factual" e "leitura por máquina".

### Principais Recursos:

#### 1. Mecanismo RAG de Primeira Classe: Busca Híbrida
*   **Semântica + Precisa:** Combina a busca semântica `pgvector` com a busca de texto completo `tsvector` do PostgreSQL.
*   **Algoritmo de Fusão RRF:** Emprega o algoritmo RRF (Reciprocal Rank Fusion) de nível industrial para garantir que o conhecimento de referência recuperado pela IA seja preciso e semanticamente coerente, eliminando completamente as alucinações da IA.

#### 2. Autoridade Factual: Sistema de Citação e Sourcing
*   **Notas de Rodapé Automáticas:** A IA marca automaticamente as notas de rodapé (ex: `[^1]`) com base no conhecimento de referência durante a geração do conteúdo.
*   **Verificabilidade:** O frontend gera automaticamente uma lista de "Referências" com funcionalidade de salto bidirecional, melhorando significativamente a autoridade do conteúdo nas avaliações E-E-A-T do Google.

#### 3. Construção de Rede Semântica: Etiquetagem de Entidades JSON-LD Automatizada
*   **Amigável ao Gráfico de Conhecimento:** Extrai automaticamente entidades de "Pessoa, Organização, Lugar, Tópico" dos artigos.
*   **Gráfico Schema.org:** Injeta dinamicamente dados estruturados JSON-LD complexos para declarar proativamente a estrutura semântica do conteúdo aos mecanismos de busca.

#### 4. Clusters de Tópicos: Rede de Links Internos Semânticos
*   **Associação por Vetores:** Constrói automaticamente redes de links internos baseadas na similaridade de vetores.
*   **Transferência de Autoridade:** Constrói poderosos Clusters de Tópicos por meio de links internos de alta relevância, fazendo com que os mecanismos de busca vejam seu site como um especialista em áreas específicas.

#### 5. Desempenho Extremo: Otimização Inteligente de Mídia (Edge Performance)
*   **Formatos Modernos:** As imagens são convertidas automaticamente para os formatos WebP/AVIF.
*   **Renderização Responsiva:** Usa a tag `<picture>` para implementar o carregamento prioritário de WebP, otimizando muito os indicadores Core Web Vitals (LCP).

---

## 🛠️ Arquitetura Técnica

O GEOFlow é construído sobre a pilha de tecnologia mais recente, garantindo desempenho e escalabilidade:

-   **Framework Principal:** [Laravel 12](https://laravel.com/) (PHP 8.2+)
-   **Banco de Dados:** PostgreSQL + **pgvector** (Armazenamento de vetores)
-   **Processamento Assíncrono:** Redis + **Laravel Horizon** (Agendamento e monitoramento de tarefas)
-   **Integração de IA:** SDK `laravel/ai` (Suporta todos os LLMs compatíveis com OpenAI)
-   **Comunicação em Tempo Real:** Laravel Reverb (Feedback de progresso em tempo real via WebSocket)
-   **Desempenho Frontend:** TailwindCSS 4 + Vite

---

## 📦 Início Rápido

### Requisitos do Ambiente
- PHP 8.2+
- PostgreSQL (com a extensão `pgvector` instalada)
- Redis
- Node.js & NPM

### Passos de Instalação
```bash
# 1. Clonar o repositório
git clone https://github.com/yaojingang/GEOFlow.git && cd GEOFlow

# 2. Executar o script de configuração automatizada
composer run setup

# 3. Configurar variáveis de ambiente
# Edite o arquivo .env, configure DB_CONNECTION=pgsql e seu AI_API_KEY
```

### Desenvolvimento e Execução
```bash
# Inicie o servidor, o ouvinte de fila e o Vite simultaneamente
npm run dev
```

---

## 📈 Visão Geral do Fluxo de Trabalho

1.  **Importar Materiais:** Carregue PDFs, documentos ou URLs; o sistema os divide e vetoriza automaticamente na base de conhecimento.
2.  **Orquestrar Tarefas:** Defina modelos de Prompt, roteamento de modelos e intervalos de publicação.
3.  **Geração Inteligente:** Agentes de IA recuperam contextos híbridos e geram conteúdo Markdown com marcadores de citação.
4.  **Melhoria Semântica:** Extraia automaticamente entidades, gere vetores de artigos e calcule links internos semânticos.
5.  **Distribuição Automática:** O conteúdo é publicado automaticamente por meio de modelos de tema otimizados para SEO e os Sitemaps dinâmicos são atualizados.

---

## 🗺️ Roadmap
- [x] Busca Híbrida com Fusão RRF
- [x] Sistema de Citação e Sourcing
- [x] Etiquetagem de Entidades JSON-LD Automatizada
- [x] Mecanismo de Recomendação de Links Internos Semânticos
- [x] Otimização Inteligente de Mídia WebP/AVIF
- [ ] Push de API multiplataforma (WordPress, Webflow)
- [ ] Geração de Conteúdo Multimodal (Geração automática de Vídeo/Áudio correspondente)

---

## 📄 Licença
O GEOFlow está sob a licença [Apache-2.0](LICENSE).

---
**GEOFlow** - *Redefinindo a engenharia de conteúdo para a era da busca por IA.*
