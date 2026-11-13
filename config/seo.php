<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Public Site URL
    |--------------------------------------------------------------------------
    |
    | Used for canonical tags, Open Graph URLs, and structured data on the
    | main marketing site. Keep this on exlontech.com even if APP_URL differs:
    | APP_URL is deliberately NOT consulted here, because a deploy that points
    | it at a subdomain would emit canonicals handing the whole site to that
    | subdomain. Only override via SITE_URL, and only with the public domain.
    |
    */

    'site_url' => rtrim(env('SITE_URL', 'https://exlontech.com'), '/'),

    'site_name' => 'Exlon Tech',
    'legal_name' => 'Exlon Tech',
    'slogan' => 'Turning Ideas into Digital Reality.',
    'price_range' => '$$',
    'locale' => 'en_US',
    'language' => 'en',
    'theme_color' => '#8750f7',

    'contact' => [
        'email' => 'info@exlontech.com',
        'telephone' => '+92-309-6176606',
        'telephone_display' => '0309-6176606',
        'geo_region' => 'PK-PB',
        'geo_placename' => 'Sargodha, Pakistan',
        'address_locality' => 'Sargodha',
        'address_region' => 'Punjab',
        'address_country' => 'PK',
        'latitude' => 32.0836,
        'longitude' => 72.6711,
    ],

    'social' => [
        'https://www.facebook.com/exlontech/',
        'https://www.instagram.com/exlontech/',
        'https://www.linkedin.com/company/exlon-tech',
        'https://www.pinterest.com/exlontech/',
    ],

    'knows_about' => [
        'Web Development',
        'Mobile App Development',
        'UI/UX Design',
        'Graphic Design',
        'Digital Marketing',
        'Search Engine Optimization',
        'Video Editing',
        'Laravel',
        'PHP',
        'React',
        'Flutter',
        'WordPress',
    ],

    'area_served' => [
        ['@type' => 'Country', 'name' => 'Pakistan'],
        ['@type' => 'AdministrativeArea', 'name' => 'Punjab'],
        ['@type' => 'City', 'name' => 'Sargodha'],
        'Worldwide',
    ],

    'default_image' => 'assets/img/services/web hero.jpg',
    'default_image_width' => 3000,
    'default_image_height' => 1789,
    'logo' => 'assets/img/logo/logo.png',
    'logo_width' => 3402,
    'logo_height' => 763,

    'description' => 'Exlon Tech is a digital agency in Sargodha, Pakistan that builds websites, mobile apps, UI/UX design, branding, SEO, digital marketing, and video editing for businesses in Pakistan and worldwide.',

    'services' => [
        'web-development' => [
            'route' => 'web-development',
            'name' => 'Web Development',
            'path' => 'services/web',
            'service_type' => 'Web Development',
            'title' => 'Web Development Company | Custom Websites & Laravel Apps',
            'description' => 'Custom websites and scalable web apps from Exlon Tech using Laravel, PHP, React, WordPress, and modern frontend stacks. Fast, secure, SEO-ready builds.',
            'keywords' => 'web development company Pakistan, website development Sargodha, Laravel development, PHP development, custom web applications, responsive website design, Exlon Tech',
            'image' => 'assets/img/services/web hero.jpg',
            'image_alt' => 'Exlon Tech web development services',
            'summary' => 'Custom websites, e-commerce, and scalable Laravel/PHP web applications with SEO-ready structure and ongoing maintenance.',
            'faqs' => [
                [
                    'q' => 'How long does a typical website project take?',
                    'a' => 'Timeline depends on scope. A business website usually takes 4–8 weeks, while complex web apps may take 10–16 weeks. We share a clear timeline after discovery.',
                ],
                [
                    'q' => 'Do you build custom websites or use templates?',
                    'a' => 'We specialize in custom development tailored to your brand and goals. CMS-based solutions like WordPress or Shopify are used only when they fit your needs.',
                ],
                [
                    'q' => 'Will my website be mobile-friendly and SEO optimized?',
                    'a' => 'Yes. Every site we build is fully responsive and follows SEO best practices including semantic markup, performance optimization, and clean URL structure.',
                ],
                [
                    'q' => 'Can you redesign or upgrade my existing website?',
                    'a' => 'Absolutely. We audit your current site, improve UX and performance, migrate content, and modernize the tech stack without disrupting your business.',
                ],
                [
                    'q' => 'Do you provide post-launch support and maintenance?',
                    'a' => 'Yes. We offer ongoing maintenance plans covering security updates, backups, bug fixes, and feature enhancements after launch.',
                ],
                [
                    'q' => 'What technologies do you use for web development?',
                    'a' => 'We work with Laravel, PHP, React, Next.js, Node.js, WordPress, Shopify, and modern databases—choosing the stack that best fits your project.',
                ],
            ],
        ],
        'ux-ui-design' => [
            'route' => 'ux-ui-design',
            'name' => 'UI/UX Design',
            'path' => 'services/ux-ui-design',
            'service_type' => 'UI/UX Design',
            'title' => 'UI/UX Design Agency | Wireframes, Prototypes & Product UI',
            'description' => 'UI/UX design from Exlon Tech: research, wireframes, prototypes, dashboards, and mobile app interfaces that improve usability, engagement, and conversions.',
            'keywords' => 'UI UX design agency Pakistan, user experience design, Figma design, wireframing, prototyping, app UI design, Exlon Tech design',
            'image' => 'assets/img/services/uiux.jpg',
            'image_alt' => 'Exlon Tech UI/UX design services',
            'summary' => 'Research-led interface and experience design for websites, dashboards, and mobile apps, from wireframes to design systems.',
            'faqs' => [
                [
                    'q' => 'Can I see your designers\' portfolio?',
                    'a' => 'Yes, we proudly showcase our designers\' portfolios. You can review their previous work to assess skills, style, and expertise. Contact us and we\'ll share relevant case studies.',
                ],
                [
                    'q' => 'Do you provide custom design services?',
                    'a' => 'Absolutely. We specialize in custom UI/UX design tailored to your brand identity, audience, and business goals—never generic templates.',
                ],
                [
                    'q' => 'How long does a typical UI/UX project take?',
                    'a' => 'Timelines depend on scope. A landing page redesign may take 2–4 weeks, while a full product design can take 6–12 weeks. We share a clear timeline after discovery.',
                ],
                [
                    'q' => 'Can I request revisions?',
                    'a' => 'Yes. We include structured revision rounds at each milestone so you can refine layouts, visuals, and flows until the design meets your expectations.',
                ],
                [
                    'q' => 'What industries do you work with?',
                    'a' => 'We work across tech, healthcare, e-commerce, education, finance, and more—adapting our design approach to each industry\'s users and regulations.',
                ],
                [
                    'q' => 'Do you offer ongoing design support?',
                    'a' => 'Yes. We provide ongoing design support for new features, A/B testing, design system updates, and seasonal refreshes after launch.',
                ],
            ],
        ],
        'digital-marketing' => [
            'route' => 'digital-marketing',
            'name' => 'Digital Marketing',
            'path' => 'services/digital-marketing',
            'service_type' => 'Digital Marketing',
            'title' => 'Digital Marketing Agency | Ads, Social & Growth Campaigns',
            'description' => 'Exlon Tech digital marketing: social campaigns, content strategy, paid ads, analytics, and conversion-focused growth for brands in Pakistan and worldwide.',
            'keywords' => 'digital marketing agency Pakistan, social media marketing, PPC advertising, content marketing, brand growth, Exlon Tech marketing',
            'image' => 'assets/img/services/bg.jpg',
            'image_alt' => 'Exlon Tech digital marketing services',
            'summary' => 'Paid ads, social media, content, and conversion campaigns with transparent reporting and ongoing optimization.',
            'faqs' => [
                [
                    'q' => 'What digital marketing services do you offer?',
                    'a' => 'We offer SEO, PPC, social media marketing, content marketing, email campaigns, analytics, and conversion optimization—tailored to your business goals.',
                ],
                [
                    'q' => 'How long before I see results from digital marketing?',
                    'a' => 'PPC and social ads can show results within weeks. SEO typically takes 3–6 months for meaningful organic growth. We set realistic timelines during planning.',
                ],
                [
                    'q' => 'Do you provide monthly performance reports?',
                    'a' => 'Yes. Every client receives transparent monthly reports covering traffic, conversions, ad spend, ROI, and recommended next steps.',
                ],
                [
                    'q' => 'Can you manage our existing ad accounts?',
                    'a' => 'Absolutely. We can audit and take over your Google Ads, Meta Ads, and other accounts—optimizing what\'s already running while scaling what works.',
                ],
                [
                    'q' => 'What industries do you work with?',
                    'a' => 'We work across e-commerce, SaaS, healthcare, education, real estate, and local businesses—adapting strategies to each industry\'s audience and regulations.',
                ],
                [
                    'q' => 'Do you offer ongoing marketing support?',
                    'a' => 'Yes. We provide continuous campaign management, content updates, A/B testing, and strategy refinements to keep your marketing performing long-term.',
                ],
            ],
        ],
        'seo' => [
            'route' => 'seo',
            'name' => 'SEO',
            'path' => 'services/seo',
            'service_type' => 'Search Engine Optimization',
            'title' => 'SEO Services Pakistan | Technical, On-Page & Local SEO',
            'description' => 'Exlon Tech SEO services: keyword research, on-page SEO, technical SEO, content optimization, local SEO, and rank tracking to grow organic search traffic.',
            'keywords' => 'SEO services Pakistan, SEO agency Sargodha, technical SEO, on page SEO, local SEO, keyword research, Exlon Tech SEO',
            'image' => 'assets/img/services/pic.jpg',
            'image_alt' => 'Exlon Tech SEO services',
            'summary' => 'Technical, on-page, and local SEO with keyword research, content optimization, and monthly ranking reports.',
            'faqs' => [
                [
                    'q' => 'How long does SEO take to show results?',
                    'a' => 'Most sites see initial improvements in 3–4 months, with significant organic growth typically between 6–12 months depending on competition and site authority.',
                ],
                [
                    'q' => 'Do you guarantee first-page rankings?',
                    'a' => 'No ethical SEO agency can guarantee specific rankings. We focus on proven strategies, transparent reporting, and sustainable growth that aligns with search engine guidelines.',
                ],
                [
                    'q' => 'What SEO services do you provide?',
                    'a' => 'We offer keyword research, on-page optimization, technical SEO, link building, content optimization, local SEO, and monthly performance reporting.',
                ],
                [
                    'q' => 'Will you work with my existing website?',
                    'a' => 'Yes. We audit your current site, fix technical issues, optimize existing pages, and build a roadmap to improve rankings without requiring a full rebuild.',
                ],
                [
                    'q' => 'How do you measure SEO success?',
                    'a' => 'We track keyword rankings, organic traffic, click-through rates, conversions, and revenue attribution—reporting progress with clear metrics each month.',
                ],
                [
                    'q' => 'Do you provide ongoing SEO support?',
                    'a' => 'Yes. SEO is ongoing. We offer monthly retainers covering content updates, link building, technical maintenance, and strategy refinements as algorithms evolve.',
                ],
            ],
        ],
        'video-editing' => [
            'route' => 'video-editing',
            'name' => 'Video Editing',
            'path' => 'services/video-editing',
            'service_type' => 'Video Editing',
            'title' => 'Video Editing Services | Reels, YouTube & Brand Videos',
            'description' => 'Professional video editing from Exlon Tech for brand films, reels, YouTube, motion graphics, color grading, captions, and marketing campaigns.',
            'keywords' => 'video editing services Pakistan, reels editing, YouTube video editing, motion graphics, social media video editing, Exlon Tech video',
            'image' => 'assets/img/services/videobg.jpg',
            'image_alt' => 'Exlon Tech video editing services',
            'summary' => 'Brand videos, social reels, YouTube edits, motion graphics, color grading, and captions with fast turnaround.',
            'faqs' => [
                [
                    'q' => 'Can I see samples of your video editing work?',
                    'a' => 'Yes. We share a portfolio of past projects including promos, social content, and long-form edits. Contact us and we will send relevant samples for your industry.',
                ],
                [
                    'q' => 'What types of videos do you edit?',
                    'a' => 'We edit corporate promos, YouTube content, social reels, product demos, podcasts, event highlights, training videos, and more.',
                ],
                [
                    'q' => 'How long does a typical video edit take?',
                    'a' => 'Turnaround depends on length and complexity. A short reel may take 1–3 days, while a 10-minute YouTube video typically takes 5–7 business days after footage is received.',
                ],
                [
                    'q' => 'Can I request revisions?',
                    'a' => 'Yes. Every project includes structured revision rounds so you can refine pacing, graphics, audio, and final details until you are satisfied.',
                ],
                [
                    'q' => 'What file formats do you deliver?',
                    'a' => 'We deliver in MP4, MOV, or your preferred format at the resolutions you need—1080p, 4K, and vertical formats for social platforms.',
                ],
                [
                    'q' => 'Do you offer ongoing video editing support?',
                    'a' => 'Yes. We offer monthly retainer plans for channels and brands that need consistent editing support for regular content publishing.',
                ],
            ],
        ],
        'mobile-app-development' => [
            'route' => 'mobile-app-development',
            'name' => 'Mobile App Development',
            'path' => 'services/mobile-app-development',
            'service_type' => 'Mobile Application Development',
            'title' => 'Mobile App Development | Android, iOS & Flutter Apps',
            'description' => 'Exlon Tech builds Android and iOS apps with Flutter, React Native, and native stacks, plus API integration, UI/UX, and App Store / Play Store launch support.',
            'keywords' => 'mobile app development Pakistan, Android app development, iOS app development, Flutter development, React Native apps, Exlon Tech apps',
            'image' => 'assets/img/services/intro.jpg',
            'image_alt' => 'Exlon Tech mobile app development services',
            'summary' => 'Native and cross-platform iOS and Android apps with store submission, APIs, and post-launch updates.',
            'faqs' => [
                [
                    'q' => 'How long does it take to build a mobile app?',
                    'a' => 'Timeline depends on scope. A simple MVP usually takes 8–12 weeks, while complex apps with custom backends may take 16–24 weeks. We share a clear timeline after discovery.',
                ],
                [
                    'q' => 'Do you build native or cross-platform apps?',
                    'a' => 'We offer both. Cross-platform with Flutter or React Native is cost-effective for most projects. Native development is recommended when you need maximum performance or platform-specific features.',
                ],
                [
                    'q' => 'Will my app work on both iOS and Android?',
                    'a' => 'Yes. We develop for both platforms using cross-platform frameworks or native builds. Every app is tested across multiple devices and OS versions before launch.',
                ],
                [
                    'q' => 'Can you help with App Store and Play Store submission?',
                    'a' => 'Absolutely. We handle store listing setup, compliance review, screenshots, metadata, and the full submission process for both Apple App Store and Google Play.',
                ],
                [
                    'q' => 'Do you provide post-launch support and updates?',
                    'a' => 'Yes. We offer ongoing maintenance plans covering OS updates, bug fixes, security patches, and feature enhancements after your app goes live.',
                ],
                [
                    'q' => 'What technologies do you use for mobile development?',
                    'a' => 'We work with Flutter, React Native, Swift, Kotlin, Node.js, Laravel, Firebase, and modern databases—choosing the stack that best fits your project goals.',
                ],
            ],
        ],
        'graphic-designing' => [
            'route' => 'graphic-designing',
            'name' => 'Graphic Designing',
            'path' => 'services/graphic-designing',
            'service_type' => 'Graphic Design',
            'title' => 'Graphic Design Agency | Logos, Branding & Creatives',
            'description' => 'Exlon Tech graphic design for logos, brand identity, social creatives, marketing materials, and digital campaigns that make your business stand out.',
            'keywords' => 'graphic design agency Pakistan, logo design Sargodha, branding design, social media creatives, visual identity, Exlon Tech graphics',
            'image' => 'assets/img/services/service-graphic.png',
            'image_alt' => 'Exlon Tech graphic design services',
            'summary' => 'Logos, brand identity, social creatives, and print/digital marketing design with source files included.',
            'faqs' => [
                [
                    'q' => 'How long does a typical graphic design project take?',
                    'a' => 'Timeline depends on scope. A logo design usually takes 1–2 weeks, while a full brand identity may take 3–6 weeks. We share a clear timeline after the initial brief.',
                ],
                [
                    'q' => 'Do you provide source files with the final designs?',
                    'a' => 'Yes. Every project includes editable source files (AI, PSD, Figma, etc.) along with web and print-ready exports in the formats you need.',
                ],
                [
                    'q' => 'How many revision rounds are included?',
                    'a' => 'We include structured revision rounds at each stage—concept, design, and final delivery—so you can refine details until you\'re fully satisfied with the outcome.',
                ],
                [
                    'q' => 'Can you redesign or refresh my existing brand?',
                    'a' => 'Absolutely. We audit your current visual identity, identify gaps, and modernize your brand while preserving recognition and consistency across all touchpoints.',
                ],
                [
                    'q' => 'Do you design for both print and digital?',
                    'a' => 'Yes. We deliver print-ready CMYK files for brochures, packaging, and stationery, as well as web-optimized assets for social media, websites, and digital ads.',
                ],
                [
                    'q' => 'What design tools and software do you use?',
                    'a' => 'We work with Adobe Photoshop, Illustrator, After Effects, Figma, Sketch, and Adobe XD—choosing the right tool for each project\'s requirements.',
                ],
            ],
        ],
    ],

];
