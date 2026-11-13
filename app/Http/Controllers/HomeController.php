<?php

namespace App\Http\Controllers;

use App\Support\SeoMeta;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.home', [
            'title' => 'Exlon Tech',
            'meta' => [
                'title' => 'Exlon Tech | Web, Apps, Design & Digital Marketing',
                'description' => 'Exlon Tech is a Sargodha digital agency for custom websites, mobile apps, UI/UX, branding, SEO, marketing, and video. Hire a Pakistan software team that ships.',
                'keywords' => 'Exlon Tech, web development company Pakistan, mobile app development Sargodha, UI UX design, digital marketing agency, SEO services, graphic design, software company Pakistan',
                'canonical' => route('home'),
                'image' => 'assets/img/services/web hero.jpg',
                'image_alt' => 'Exlon Tech digital solutions company in Sargodha, Pakistan',
                'page_type' => 'WebPage',
                'breadcrumbs' => [
                    ['name' => 'Home', 'url' => SeoMeta::siteUrl() . '/'],
                ],
            ],
        ]);
    }
}
