<?php

namespace App\Providers;

use App\Support\ServicesMenu;
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
        View::composer(
            ['layouts.partials.nav', 'layouts.partials.mobile-nav'],
            function ($view) {
                $view->with('servicesMegaMenu', ServicesMenu::megaMenu());
            }
        );
    }
}
