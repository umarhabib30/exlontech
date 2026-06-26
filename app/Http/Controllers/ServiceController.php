<?php

namespace App\Http\Controllers;

class ServiceController extends Controller
{
    private array $seo = [
        'web-development' => [
            'description' => 'Build fast, secure, responsive websites and scalable web applications with Exlon Tech using Laravel, PHP, React, WordPress, and modern frontend technologies.',
            'keywords' => 'web development, website development, Laravel development, PHP development, responsive website design, custom web applications, Exlon Tech web services',
            'image' => 'assets/img/services/web hero.jpg',
        ],
        'ux-ui-design' => [
            'description' => 'Create intuitive UI/UX designs, wireframes, prototypes, dashboards, mobile app interfaces, and user journeys that improve engagement and conversions.',
            'keywords' => 'UI UX design, user interface design, user experience design, wireframing, prototyping, Figma design, app UI design, Exlon Tech design',
            'image' => 'assets/img/services/uiux.jpg',
        ],
        'digital-marketing' => [
            'description' => 'Grow your brand with Exlon Tech digital marketing services, including social media campaigns, content strategy, paid ads, analytics, and conversion-focused marketing.',
            'keywords' => 'digital marketing, social media marketing, online advertising, content marketing, brand growth, digital marketing agency Pakistan, Exlon Tech marketing',
            'image' => 'assets/img/services/bg.jpg',
        ],
        'seo' => [
            'description' => 'Improve search visibility with Exlon Tech SEO services, including keyword research, on-page SEO, technical SEO, content optimization, and performance tracking.',
            'keywords' => 'SEO services, search engine optimization, technical SEO, on page SEO, keyword research, local SEO, SEO agency Pakistan, Exlon Tech SEO',
            'image' => 'assets/img/services/pic.jpg',
        ],
        'video-editing' => [
            'description' => 'Professional video editing services for brand videos, reels, social media content, YouTube videos, motion graphics, color grading, and marketing campaigns.',
            'keywords' => 'video editing, professional video editing, reels editing, YouTube video editing, motion graphics, social media video editing, Exlon Tech video services',
            'image' => 'assets/img/services/videobg.jpg',
        ],
        'mobile-app-development' => [
            'description' => 'Launch mobile apps for Android and iOS with Exlon Tech, including cross-platform apps, native app development, API integration, UI/UX, and app store support.',
            'keywords' => 'mobile app development, Android app development, iOS app development, Flutter development, React Native apps, app development company, Exlon Tech apps',
            'image' => 'assets/img/services/intro.jpg',
        ],
        'graphic-designing' => [
            'description' => 'Stand out with Exlon Tech graphic design services for logos, branding, social media creatives, marketing materials, visual identity, and digital campaigns.',
            'keywords' => 'graphic design, logo design, branding design, social media creatives, visual identity, marketing design, graphic design agency Pakistan, Exlon Tech graphics',
            'image' => 'assets/img/services/service-graphic.png',
            'image_alt' => 'Exlon Tech graphic design services',
        ],
    ];

    public function webDevelopment()
    {
        return $this->render('web-development', 'Web Development | Exlon Tech');
    }

    public function uxUiDesign()
    {
        return $this->render('ux-ui-design', 'UI/UX Design | Exlon Tech');
    }

    public function digitalMarketing()
    {
        return $this->render('digital-marketing', 'Digital Marketing | Exlon Tech');
    }

    public function seo()
    {
        return $this->render('seo', 'SEO | Exlon Tech');
    }

    public function videoEditing()
    {
        return $this->render('video-editing', 'Video Editing | Exlon Tech');
    }

    public function mobileAppDevelopment()
    {
        return $this->render('mobile-app-development', 'Mobile App Development | Exlon Tech');
    }

    public function graphicDesigning()
    {
        return $this->render('graphic-designing', 'Graphic Designing | Exlon Tech');
    }

    private function render(string $view, string $title)
    {
        $seo = $this->seo[$view];

        return view("user.services.{$view}", [
            'title' => $title,
            'active' => 'services',
            'meta' => [
                'title' => $title,
                'description' => $seo['description'],
                'keywords' => $seo['keywords'],
                'canonical' => url()->current(),
                'image' => asset($seo['image']),
                'image_alt' => $seo['image_alt'] ?? $title,
            ],
        ]);
    }
}
