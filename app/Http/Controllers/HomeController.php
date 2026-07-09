<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.home', [
            'title' => 'ExlonTech | Web, Mobile App, SaaS & Digital Marketing Agency',
            'meta' => [
                'title' => 'ExlonTech | Web, Mobile App, SaaS & Digital Marketing Agency',
                'description' => 'ExlonTech helps startups, SMEs, and global businesses build custom websites, mobile apps, SaaS platforms, ecommerce stores, SEO campaigns, and digital marketing systems.',
                'keywords' => 'custom software development company, web development agency for startups, mobile app development company, SaaS development company, Laravel development agency, Flutter app development company, ecommerce development agency, SEO agency for small businesses, remote software development team, software outsourcing company Pakistan',
                'canonical' => route('home'),
                'image' => 'assets/img/services/web hero.jpg',
                'image_alt' => 'ExlonTech digital solutions company serving global businesses',
            ],
        ]);
    }


}
