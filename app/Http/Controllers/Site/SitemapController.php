<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\GeoFlow\SitemapService;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(SitemapService $sitemapService): Response
    {
        $content = $sitemapService->generate();

        return response($content)->header('Content-Type', 'text/xml');
    }
}
