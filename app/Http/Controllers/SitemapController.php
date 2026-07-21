<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Support\SeoMeta;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Throwable;

class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        $urls = collect([
            $this->entry(route('home'), now(), '1.0', 'weekly'),
            $this->entry(route('about'), now(), '0.8', 'monthly'),
            $this->entry(route('portfolio'), now(), '0.9', 'weekly'),
            $this->entry(route('careers.index'), now(), '0.7', 'weekly'),
            $this->entry(route('web-development'), now(), '0.8', 'monthly'),
            $this->entry(route('ux-ui-design'), now(), '0.8', 'monthly'),
            $this->entry(route('digital-marketing'), now(), '0.8', 'monthly'),
            $this->entry(route('seo'), now(), '0.8', 'monthly'),
            $this->entry(route('video-editing'), now(), '0.8', 'monthly'),
            $this->entry(route('mobile-app-development'), now(), '0.8', 'monthly'),
            $this->entry(route('graphic-designing'), now(), '0.8', 'monthly'),
        ]);

        try {
            Job::open()
                ->latest('updated_at')
                ->get()
                ->each(function (Job $job) use ($urls) {
                    $urls->push($this->entry(
                        route('careers.show', $job),
                        $job->updated_at ?? now(),
                        '0.6',
                        'weekly'
                    ));
                });
        } catch (Throwable) {
            // Keep static pages in the sitemap even if the jobs DB is unavailable.
        }

        return response()
            ->view('sitemap', ['urls' => $urls])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    private function entry(string $loc, Carbon $lastmod, string $priority, string $changefreq): array
    {
        $path = parse_url($loc, PHP_URL_PATH) ?: '/';

        return [
            'loc' => rtrim(SeoMeta::siteUrl(), '/') . ($path === '/' ? '/' : rtrim($path, '/')),
            'lastmod' => $lastmod->toAtomString(),
            'changefreq' => $changefreq,
            'priority' => $priority,
        ];
    }
}
