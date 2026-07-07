<?php

namespace App\Providers;

use App\Support\ServicesMenu;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $appUrl = (string) config('app.url');
        $host = parse_url($appUrl, PHP_URL_HOST);
        $scheme = parse_url($appUrl, PHP_URL_SCHEME);

        // Only pin generated URLs to a real production domain. We never force the
        // scheme down to http, since that fights an HTTPS reverse proxy / .htaccess
        // rule and creates an infinite redirect loop.
        if (is_string($host) && $host !== '' && ! in_array($host, ['localhost', '127.0.0.1'], true)) {
            URL::forceRootUrl($appUrl);

            if ($scheme === 'https') {
                URL::forceScheme('https');
            }
        }

        View::composer(
            ['layouts.partials.nav', 'layouts.partials.mobile-nav'],
            function ($view) {
                $view->with('servicesMegaMenu', ServicesMenu::megaMenu());
            }
        );
    }
}
