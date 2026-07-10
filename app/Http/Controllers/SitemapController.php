<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        $urls = collect([
            $this->url(route('home'), now(), '1.0', 'weekly'),
            $this->url(route('portfolio'), now(), '0.8', 'monthly'),
            $this->url(route('careers.index'), now(), '0.7', 'weekly'),
            $this->url(route('web-development'), now(), '0.8', 'monthly'),
            $this->url(route('ux-ui-design'), now(), '0.8', 'monthly'),
            $this->url(route('digital-marketing'), now(), '0.8', 'monthly'),
            $this->url(route('seo'), now(), '0.8', 'monthly'),
            $this->url(route('video-editing'), now(), '0.8', 'monthly'),
            $this->url(route('mobile-app-development'), now(), '0.8', 'monthly'),
            $this->url(route('graphic-designing'), now(), '0.8', 'monthly'),
        ]);

        Job::open()
            ->latest('updated_at')
            ->get()
            ->each(function (Job $job) use ($urls) {
                $urls->push($this->url(
                    route('careers.show', $job),
                    $job->updated_at,
                    '0.6',
                    'weekly'
                ));
            });

        return response()
            ->view('sitemap', ['urls' => $urls])
            ->header('Content-Type', 'application/xml');
    }

    private function url(string $loc, Carbon $lastmod, string $priority, string $changefreq): array
    {
        return compact('loc', 'lastmod', 'priority', 'changefreq');
    }
}
