<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        return view('user.about', [
            'title' => 'About ExlonTech | Digital Solutions Company Serving Global Businesses',
            'meta' => [
                'title' => 'About ExlonTech | Digital Solutions Company Serving Global Businesses',
                'description' => 'ExlonTech is a Pakistan-based digital solutions company helping businesses worldwide build websites, mobile apps, software platforms, ecommerce stores, and digital growth systems.',
                'keywords' => 'about ExlonTech, digital solutions company, Pakistan software company, remote technology partner, software outsourcing company',
                'canonical' => route('about'),
                'image' => 'assets/img/logo/logo.png',
                'image_alt' => 'About ExlonTech digital solutions company',
                'breadcrumbs' => [
                    ['name' => 'Home', 'url' => route('home')],
                    ['name' => 'About ExlonTech', 'url' => route('about')],
                ],
            ],
        ]);
    }

    public function contact(): View
    {
        return view('user.contact', [
            'title' => 'Contact ExlonTech | Start Your Web, App or Software Project',
            'meta' => [
                'title' => 'Contact ExlonTech | Start Your Web, App or Software Project',
                'description' => 'Contact ExlonTech to discuss your website, mobile app, custom software, ecommerce, SEO, branding, or digital marketing project.',
                'keywords' => 'contact ExlonTech, start software project, web development consultation, mobile app consultation, SEO consultation',
                'canonical' => route('contact'),
                'image' => 'assets/img/logo/logo.png',
                'image_alt' => 'Contact ExlonTech for web app software and marketing projects',
                'breadcrumbs' => [
                    ['name' => 'Home', 'url' => route('home')],
                    ['name' => 'Contact ExlonTech', 'url' => route('contact')],
                ],
            ],
        ]);
    }
}
