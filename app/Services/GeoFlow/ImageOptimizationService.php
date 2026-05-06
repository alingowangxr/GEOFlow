<?php

namespace App\Services\GeoFlow;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Throwable;

/**
 * 智能媒体优化服务：处理图片转换与响应式尺寸生成。
 */
class ImageOptimizationService
{
    /**
     * 确保图片有 WebP 版本。
     * 
     * @param string $path 相对路径或绝对路径
     * @return string|null 返回优化的 WebP 路径，失败则返回原路径
     */
    public function optimize(string $path): ?string
    {
        $fullPath = $this->resolveFullPath($path);
        if (!File::exists($fullPath) || !is_file($fullPath)) {
            return null;
        }

        $extension = strtolower(pathinfo($fullPath, PATHINFO_EXTENSION));
        if ($extension === 'webp') {
            return $path;
        }

        $webpPath = preg_replace('/\.(jpe?g|png)$/i', '.webp', $fullPath);
        if (File::exists($webpPath)) {
            return $this->toRelativePath($webpPath);
        }

        try {
            return $this->convertToWebp($fullPath, $webpPath);
        } catch (Throwable $e) {
            Log::warning('Image optimization failed: ' . $e->getMessage());
            return $path;
        }
    }

    /**
     * 生成 WebP 格式图片。
     */
    private function convertToWebp(string $source, string $destination): ?string
    {
        $info = getimagesize($source);
        if (!$info) return null;

        $mime = $info['mime'];
        $image = null;

        if ($mime === 'image/jpeg') {
            $image = imagecreatefromjpeg($source);
        } elseif ($mime === 'image/png') {
            $image = imagecreatefrompng($source);
            imagepalettetotruecolor($image);
            imagealphablending($image, true);
            imagesavealpha($image, true);
        }

        if (!$image) return null;

        imagewebp($image, $destination, 80);
        imagedestroy($image);

        return $this->toRelativePath($destination);
    }

    private function resolveFullPath(string $path): string
    {
        if (File::isAbsolutePath($path)) return $path;
        
        // 尝试匹配 public 目录
        $publicPath = public_path($path);
        if (File::exists($publicPath)) return $publicPath;
        
        // 尝试匹配 storage 目录
        $storagePath = storage_path('app/public/' . ltrim($path, 'storage/'));
        if (File::exists($storagePath)) return $storagePath;

        return $path;
    }

    private function toRelativePath(string $fullPath): string
    {
        $publicRoot = public_path();
        if (str_starts_with($fullPath, $publicRoot)) {
            return ltrim(substr($fullPath, strlen($publicRoot)), DIRECTORY_SEPARATOR);
        }
        return $fullPath;
    }
}
