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
            $this->entry(route('home'), 'user/home', '1.0', 'weekly'),
            $this->entry(route('about'), 'user/about', '0.8', 'monthly'),
            $this->entry(route('portfolio'), 'user/portfolio', '0.9', 'weekly'),
            $this->entry(route('careers.index'), 'user/careers/index', '0.7', 'weekly'),
            $this->entry(route('privacy'), 'user/privacy', '0.3', 'yearly'),
        ]);

        foreach (config('seo.services', []) as $service) {
            $urls->push($this->entry(
                route($service['route']),
                "user/services/{$service['route']}",
                '0.8',
                'monthly'
            ));
        }

        try {
            Job::open()
                ->latest('updated_at')
                ->get()
                ->each(function (Job $job) use ($urls) {
                    $urls->push($this->entry(
                        route('careers.show', $job),
                        null,
                        '0.6',
                        'weekly',
                        $job->updated_at
                    ));
                });
        } catch (Throwable) {
            // Keep static pages in the sitemap even if the jobs DB is unavailable.
        }

        return response()
            ->view('sitemap', ['urls' => $urls])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    private function entry(
        string $loc,
        ?string $view,
        string $priority,
        string $changefreq,
        ?Carbon $lastmod = null
    ): array {
        $path = parse_url($loc, PHP_URL_PATH) ?: '/';

        return [
            'loc' => SeoMeta::siteUrl() . ($path === '/' ? '/' : rtrim($path, '/')),
            'lastmod' => ($lastmod ?? $this->viewModifiedAt($view))->toAtomString(),
            'changefreq' => $changefreq,
            'priority' => $priority,
        ];
    }

    /**
     * Real content dates keep lastmod trustworthy; a moving "now" on every
     * request trains crawlers to ignore the signal entirely.
     */
    private function viewModifiedAt(?string $view): Carbon
    {
        if ($view) {
            $path = resource_path("views/{$view}.blade.php");

            if (is_file($path) && ($timestamp = filemtime($path))) {
                return Carbon::createFromTimestamp($timestamp);
            }
        }

        return now();
    }
}
