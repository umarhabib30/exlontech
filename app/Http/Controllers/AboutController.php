<?php

namespace App\Http\Controllers;

use App\Support\SeoMeta;

class AboutController extends Controller
{
    public function index()
    {
        $canonical = route('about');

        return view('user.about', [
            'title' => 'About Us | Exlon Tech',
            'meta' => [
                'title' => 'About Exlon Tech | Digital Agency in Sargodha, Pakistan',
                'description' => 'Exlon Tech is a Sargodha digital agency building websites, apps, design, SEO, and marketing. Learn our mission, vision, and how we help businesses grow.',
                'keywords' => 'about Exlon Tech, digital agency Sargodha, software company Pakistan, web development company Punjab, Exlon Tech team',
                'canonical' => $canonical,
                'image' => 'assets/img/about/about_hero.jpg',
                'image_alt' => 'Exlon Tech team — digital agency in Sargodha, Pakistan',
                'page_type' => 'AboutPage',
                'breadcrumbs' => SeoMeta::breadcrumbsFor('About', $canonical),
            ],
        ]);
    }
}
