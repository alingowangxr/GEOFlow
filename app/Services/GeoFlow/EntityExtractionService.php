<?php

namespace App\Services\GeoFlow;

use App\Models\AiModel;
use App\Support\GeoFlow\OpenAiRuntimeProvider;
use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\Conversational;
use Laravel\Ai\Promptable;
use Throwable;

/**
 * 实体提取服务：利用 AI 从文章内容中提取 Schema.org 兼容的实体。
 */
class EntityExtractionService implements Agent, Conversational
{
    use Promptable;

    public function instructions(): string
    {
        return '你是一个专业的语义分析助手。请从提供的文章中提取核心实体，并以 JSON 格式返回。格式要求：{"person": [], "organization": [], "place": [], "topic": []}。请确保提取的实体是文章中最相关的。';
    }

    public function messages(): iterable
    {
        return [];
    }

    /**
     * 执行提取。
     */
    public function extract(string $content, AiModel $aiModel, string $apiKey): array
    {
        $prompt = "请分析以下文章，提取其中的核心人物、组织、地点和主要话题：\n\n{$content}\n\n请直接返回 JSON 结果，不要有任何解释文字。";

        $providerUrl = OpenAiRuntimeProvider::resolveChatBaseUrl((string) ($aiModel->api_url ?? ''));
        $driver = OpenAiRuntimeProvider::resolveChatDriver($providerUrl, (string) ($aiModel->model_id ?? ''));
        $providerName = OpenAiRuntimeProvider::registerProvider('extractor', $driver, $providerUrl, $apiKey);

        try {
            $response = $this->prompt($prompt, [], $providerName, (string) ($aiModel->model_id ?? ''));
            $text = trim((string) ($response->text ?? ''));
            
            // 简单清洗 JSON
            if (preg_match('/\{.*\}/s', $text, $matches)) {
                $json = json_decode($matches[0], true);
                if (is_array($json)) {
                    return $json;
                }
            }
        } catch (Throwable) {
            // 提取失败不阻塞主流程
        }

        return [];
    }
}
