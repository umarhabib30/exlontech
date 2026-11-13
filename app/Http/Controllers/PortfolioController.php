<?php

namespace App\Http\Controllers;

use App\Support\SeoMeta;

class PortfolioController extends Controller
{
    public function index()
    {
        $canonical = route('portfolio');

        return view('user.portfolio', [
            'title' => 'Portfolio | Exlon Tech',
            'meta' => [
                'title' => 'Portfolio | Exlon Tech Web, App & Design Work',
                'description' => 'Browse Exlon Tech projects: websites, mobile apps, UI/UX, branding, booking systems, and business platforms built for clients in Pakistan and abroad.',
                'keywords' => 'Exlon Tech portfolio, web development projects Pakistan, mobile app case studies, UI UX portfolio, Laravel projects, software portfolio Sargodha',
                'canonical' => $canonical,
                'image' => 'assets/img/portfolio_images/p1.jpg',
                'image_alt' => 'Exlon Tech portfolio projects showcase',
                'page_type' => 'CollectionPage',
                'breadcrumbs' => SeoMeta::breadcrumbsFor('Portfolio', $canonical),
            ],
        ]);
    }
}
