<?php

namespace App\Http\Controllers;

class ServiceController extends Controller
{
    private array $seo = [
        'web-development' => [
            'title' => 'Web Development Services for Global Businesses | ExlonTech',
            'description' => 'Build fast, secure, SEO-ready websites and web applications with ExlonTech. We develop scalable business websites, dashboards, portals, and custom web platforms.',
            'keywords' => 'web development agency for startups, Laravel development agency, hire Laravel developers, ecommerce development agency, web development company in Pakistan',
            'image' => 'assets/img/services/web hero.jpg',
            'h1' => 'Web Development Services for Global Businesses',
            'service' => 'Web Development',
        ],
        'ux-ui-design' => [
            'title' => 'UI/UX Design Services for Websites, Apps & SaaS | ExlonTech',
            'description' => 'ExlonTech creates clean, modern, and conversion-focused UI/UX designs for websites, mobile apps, SaaS dashboards, ecommerce stores, and digital products.',
            'keywords' => 'UI UX design services, SaaS UI design, website UX design, mobile app UI design, ecommerce UX design, conversion-focused design',
            'image' => 'assets/img/services/uiux.jpg',
            'h1' => 'UI/UX Design Services for Websites, Apps & SaaS',
            'service' => 'UI/UX Design',
        ],
        'digital-marketing' => [
            'title' => 'Digital Marketing Agency for Global Businesses | ExlonTech',
            'description' => 'ExlonTech helps businesses grow online through SEO, paid ads, social media marketing, content strategy, branding, and conversion-focused campaigns.',
            'keywords' => 'digital marketing agency for global businesses, digital marketing agency Pakistan, social media marketing, paid ads, content strategy',
            'image' => 'assets/img/services/bg.jpg',
            'h1' => 'Digital Marketing Agency for Global Businesses',
            'service' => 'Digital Marketing',
        ],
        'seo' => [
            'title' => 'SEO Services for Startups & Small Businesses | ExlonTech',
            'description' => 'Improve search visibility with ExlonTech’s SEO services, including technical SEO, keyword research, on-page SEO, content optimization, local SEO, and link strategy.',
            'keywords' => 'SEO agency for small businesses, SEO services Pakistan, technical SEO, keyword research, local SEO, ecommerce SEO',
            'image' => 'assets/img/services/pic.jpg',
            'h1' => 'SEO Services for Startups & Small Businesses',
            'service' => 'SEO Services',
        ],
        'video-editing' => [
            'title' => 'Video Editing Services for Brands & Marketing Teams | ExlonTech',
            'description' => 'Create polished marketing videos, reels, YouTube content, brand videos, motion graphics, and social media assets with ExlonTech’s video editing team.',
            'keywords' => 'video editing services, social media video editing, reels editing, YouTube video editing, motion graphics, brand video editing',
            'image' => 'assets/img/services/videobg.jpg',
            'h1' => 'Video Editing Services for Brands & Marketing Teams',
            'service' => 'Video Editing',
        ],
        'mobile-app-development' => [
            'title' => 'Mobile App Development Services | iOS, Android & Flutter | ExlonTech',
            'description' => 'ExlonTech designs and develops mobile apps for startups and businesses worldwide, including Flutter, Android, iOS, admin panels, APIs, and scalable backend systems.',
            'keywords' => 'mobile app development company, Flutter app development company, hire Flutter developers, mobile app development Pakistan, Android app development, iOS app development',
            'image' => 'assets/img/services/intro.jpg',
            'h1' => 'Mobile App Development Services for iOS, Android & Flutter',
            'service' => 'Mobile App Development',
        ],
        'graphic-designing' => [
            'title' => 'Branding & Graphic Design Services for Digital Businesses | ExlonTech',
            'description' => 'Build a professional visual identity with ExlonTech’s branding and graphic design services for logos, social media creatives, marketing assets, and campaigns.',
            'keywords' => 'branding services, graphic design services, logo design, social media creatives, visual identity design, marketing design',
            'image' => 'assets/img/services/service-graphic.png',
            'image_alt' => 'ExlonTech branding and graphic design services',
            'h1' => 'Branding & Graphic Design Services for Digital Businesses',
            'service' => 'Branding & Graphic Design',
        ],
        'custom-software-saas' => [
            'title' => 'Custom Software & SaaS Development Company | ExlonTech',
            'description' => 'ExlonTech builds custom software, SaaS platforms, business dashboards, CRM systems, booking systems, and automation tools for growing companies.',
            'keywords' => 'custom software development company, SaaS development company, remote software development team, software outsourcing company, CRM development, business dashboard development',
            'image' => 'assets/img/services/web hero.jpg',
            'h1' => 'Custom Software & SaaS Development Company',
            'service' => 'Custom Software & SaaS Development',
        ],
        'ecommerce-development' => [
            'title' => 'Ecommerce Development Services | Shopify, WooCommerce & Custom Stores | ExlonTech',
            'description' => 'Launch and scale your online store with ExlonTech’s ecommerce development services, including Shopify, WooCommerce, custom ecommerce platforms, payment integration, and SEO-ready structure.',
            'keywords' => 'ecommerce development agency, Shopify development, WooCommerce development, custom ecommerce development, ecommerce SEO, payment integration',
            'image' => 'assets/img/services/web hero.jpg',
            'h1' => 'Ecommerce Development Services for Online Stores',
            'service' => 'Ecommerce Development',
        ],
    ];

    private array $faqs = [
        'web-development' => [
            ['q' => 'Does ExlonTech work with international clients?', 'a' => 'Yes. ExlonTech works remotely with startups, SMEs, ecommerce brands, and businesses worldwide through clear communication and structured delivery milestones.'],
            ['q' => 'What types of websites do you build?', 'a' => 'We build business websites, landing pages, ecommerce stores, dashboards, booking platforms, portals, and custom web applications.'],
            ['q' => 'Do you build SEO-ready websites?', 'a' => 'Yes. We follow SEO-friendly structure, clean URLs, optimized metadata, fast loading practices, responsive design, and proper heading hierarchy.'],
            ['q' => 'Can you redesign an existing website?', 'a' => 'Yes. We can improve your existing website’s design, performance, SEO structure, content, and conversion flow.'],
        ],
        'mobile-app-development' => [
            ['q' => 'Can ExlonTech build apps for both Android and iOS?', 'a' => 'Yes. We build cross-platform Flutter apps and native mobile experiences with scalable APIs, admin panels, and backend systems.'],
            ['q' => 'Do you help startups validate an app idea?', 'a' => 'Yes. We can plan an MVP, define core features, design user flows, and build a launch-ready first version.'],
            ['q' => 'Can you connect an app with an existing website or system?', 'a' => 'Yes. We integrate mobile apps with existing APIs, CRMs, ecommerce systems, payment gateways, and custom dashboards.'],
        ],
        'seo' => [
            ['q' => 'Do you provide SEO for international businesses?', 'a' => 'Yes. We support technical SEO, keyword strategy, on-page optimization, local SEO, and content planning for businesses targeting local or global markets.'],
            ['q' => 'Can you audit an existing website?', 'a' => 'Yes. We review crawlability, metadata, content structure, technical issues, performance, internal links, and conversion opportunities.'],
            ['q' => 'Do you guarantee rankings?', 'a' => 'No ethical SEO team can guarantee rankings. We focus on sustainable improvements, measurable fixes, and search-friendly content strategy.'],
        ],
        'digital-marketing' => [
            ['q' => 'What digital marketing services do you offer?', 'a' => 'We support SEO, paid ads, social media marketing, content strategy, campaign creatives, brand positioning, and conversion-focused landing pages.'],
            ['q' => 'Can you work with small businesses and startups?', 'a' => 'Yes. We create practical marketing plans that match the budget, stage, audience, and growth goals of each business.'],
            ['q' => 'Do you handle both strategy and execution?', 'a' => 'Yes. We can plan campaigns, create assets, manage channels, track performance, and improve campaigns over time.'],
        ],
        'ux-ui-design' => [
            ['q' => 'What do you design?', 'a' => 'We design websites, mobile apps, SaaS dashboards, ecommerce interfaces, landing pages, wireframes, prototypes, and design systems.'],
            ['q' => 'Can you redesign an existing product?', 'a' => 'Yes. We can audit usability, improve user flows, modernize the visual system, and create clearer conversion paths.'],
            ['q' => 'Do developers receive handoff files?', 'a' => 'Yes. We prepare organized design files, components, responsive states, and implementation notes for smoother development.'],
        ],
        'custom-software-saas' => [
            ['q' => 'What custom software can ExlonTech build?', 'a' => 'We build SaaS platforms, CRMs, booking systems, admin dashboards, portals, automation tools, reporting systems, and internal business applications.'],
            ['q' => 'Can you build an MVP first?', 'a' => 'Yes. We can start with a focused MVP, validate the core workflow, and expand the platform in planned phases.'],
            ['q' => 'Do you provide ongoing maintenance?', 'a' => 'Yes. We support improvements, bug fixes, security updates, performance work, and new feature development after launch.'],
        ],
        'ecommerce-development' => [
            ['q' => 'Which ecommerce platforms do you work with?', 'a' => 'We work with Shopify, WooCommerce, Laravel-based custom stores, payment gateways, product catalogs, checkout flows, and order management systems.'],
            ['q' => 'Can you improve an existing online store?', 'a' => 'Yes. We can improve speed, UX, SEO structure, product pages, checkout flow, analytics, and conversion paths.'],
            ['q' => 'Do you build SEO-ready ecommerce stores?', 'a' => 'Yes. We plan clean categories, product metadata, schema-ready structure, responsive templates, and performance-focused pages.'],
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

    public function customSoftwareSaas()
    {
        return $this->render('custom-software-saas', 'Custom Software & SaaS Development | ExlonTech', 'user.services.generic');
    }

    public function ecommerceDevelopment()
    {
        return $this->render('ecommerce-development', 'Ecommerce Development | ExlonTech', 'user.services.generic');
    }

    private function render(string $view, string $title, ?string $template = null)
    {
        $seo = $this->seo[$view];

        return view($template ?: "user.services.{$view}", [
            'title' => $seo['title'] ?? $title,
            'active' => 'services',
            'serviceKey' => $view,
            'serviceH1' => $seo['h1'],
            'serviceIntro' => $seo['description'],
            'serviceFaqs' => $this->faqs[$view] ?? [],
            'meta' => [
                'title' => $seo['title'] ?? $title,
                'description' => $seo['description'],
                'keywords' => $seo['keywords'],
                'canonical' => url()->current(),
                'image' => $seo['image'],
                'image_alt' => $seo['image_alt'] ?? $title,
                'breadcrumbs' => [
                    ['name' => 'Home', 'url' => route('home')],
                    ['name' => $seo['h1'], 'url' => url()->current()],
                ],
                'service' => [
                    'name' => $seo['service'],
                    'description' => $seo['description'],
                    'type' => $seo['service'],
                ],
                'faqs' => $this->faqs[$view] ?? [],
            ],
        ]);
    }
}
