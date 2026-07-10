<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.home', [
            'title' => 'Exlon Tech',
            'meta' => [
                'title' => 'Exlon Tech | Web Development, Mobile Apps, Design & Digital Marketing',
                'description' => 'Exlon Tech delivers custom websites, scalable web apps, mobile apps, UI/UX design, branding, SEO, digital marketing, and video editing for businesses in Pakistan and worldwide.',
                'keywords' => 'Exlon Tech, web development company, mobile app development, UI UX design, digital marketing agency, SEO services, graphic design, video editing, software company Pakistan, Sargodha',
                'canonical' => route('home'),
                'image' => 'assets/img/services/web hero.jpg',
                'image_alt' => 'Exlon Tech digital solutions company',
            ],
        ]);
    }


}
