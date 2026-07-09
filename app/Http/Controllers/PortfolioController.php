<?php

namespace App\Http\Controllers;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('user.portfolio', [
            'title' => 'Case Studies & Portfolio | ExlonTech Projects',
            'meta' => [
                'title' => 'Case Studies & Portfolio | ExlonTech Projects',
                'description' => 'Explore ExlonTech’s web development, mobile app, ecommerce, SaaS, branding, SEO, and digital marketing projects for businesses and startups.',
                'keywords' => 'ExlonTech portfolio, case studies, web development projects, mobile app projects, ecommerce projects, SaaS projects, Laravel projects, software portfolio Pakistan',
                'canonical' => route('portfolio'),
                'image' => 'assets/img/portfolio_images/p1.jpg',
                'image_alt' => 'ExlonTech case studies and portfolio projects',
                'breadcrumbs' => [
                    ['name' => 'Home', 'url' => route('home')],
                    ['name' => 'Case Studies & Portfolio', 'url' => route('portfolio')],
                ],
            ],
        ]);
    }
}
