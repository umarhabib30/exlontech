<?php

namespace App\Http\Controllers;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('user.portfolio', [
            'title' => 'Portfolio | Exlon Tech',
            'meta' => [
                'title' => 'Portfolio | Exlon Tech Projects & Digital Solutions',
                'description' => 'Explore Exlon Tech portfolio projects across web development, mobile apps, UI/UX design, branding, booking systems, business platforms, and digital products.',
                'keywords' => 'Exlon Tech portfolio, web development projects, mobile app projects, UI UX portfolio, branding projects, Laravel projects, software portfolio Pakistan',
                'canonical' => route('portfolio'),
                'image' => 'assets/img/portfolio_images/p1.jpg',
                'image_alt' => 'Exlon Tech portfolio projects showcase',
            ],
        ]);
    }
}
