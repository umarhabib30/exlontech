<?php

namespace App\Support;

class ServicesMenu
{
    public static function megaMenu(): array
    {
        return [
            [
                'label' => 'Development',
                'icon' => 'fa-laptop-code',
                'items' => [
                    [
                        'route' => 'web-development',
                        'title' => 'Web Development',
                        'desc' => 'Custom websites and scalable web applications',
                        'icon' => 'fa-code',
                    ],
                    [
                        'route' => 'mobile-app-development',
                        'title' => 'Mobile App Development',
                        'desc' => 'Cross-platform and native apps for iOS and Android',
                        'icon' => 'fa-mobile-screen-button',
                    ],
                ],
            ],
            [
                'label' => 'Design',
                'icon' => 'fa-pen-nib',
                'items' => [
                    [
                        'route' => 'ux-ui-design',
                        'title' => 'UI/UX Design',
                        'desc' => 'Intuitive interfaces and engaging user experiences',
                        'icon' => 'fa-pen-ruler',
                    ],
                    [
                        'route' => 'graphic-designing',
                        'title' => 'Graphic Designing',
                        'desc' => 'Logos, branding, and visual identity design',
                        'icon' => 'fa-palette',
                    ],
                ],
            ],
            [
                'label' => 'Marketing & Media',
                'icon' => 'fa-chart-simple',
                'items' => [
                    [
                        'route' => 'digital-marketing',
                        'title' => 'Digital Marketing',
                        'desc' => 'Campaigns that grow your brand and reach',
                        'icon' => 'fa-bullhorn',
                    ],
                    [
                        'route' => 'seo',
                        'title' => 'SEO',
                        'desc' => 'Search visibility and organic traffic growth',
                        'icon' => 'fa-chart-line',
                    ],
                    [
                        'route' => 'video-editing',
                        'title' => 'Video Editing',
                        'desc' => 'Professional videos for marketing and media',
                        'icon' => 'fa-film',
                    ],
                ],
            ],
        ];
    }
}
