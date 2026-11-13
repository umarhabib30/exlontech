<?php

namespace App\Http\Controllers;

use App\Support\LlmsTxt;
use Illuminate\Http\Response;

class LlmsTxtController extends Controller
{
    public function index(): Response
    {
        return $this->plain(LlmsTxt::index());
    }

    public function full(): Response
    {
        return $this->plain(LlmsTxt::full());
    }

    private function plain(string $body): Response
    {
        return response($body, 200, [
            'Content-Type' => 'text/plain; charset=UTF-8',
            'Cache-Control' => 'public, max-age=86400',
            'X-Robots-Tag' => 'index, follow',
        ]);
    }
}
