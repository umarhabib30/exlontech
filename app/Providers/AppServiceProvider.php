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
        $appUrl = config('app.url');

        if ($appUrl) {
            URL::forceRootUrl($appUrl);

            $scheme = parse_url($appUrl, PHP_URL_SCHEME);

            if (is_string($scheme) && $scheme !== '') {
                URL::forceScheme($scheme);
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
