<?php

namespace App\Http\Controllers;

use App\Support\SeoMeta;

class ServiceController extends Controller
{
    public function webDevelopment()
    {
        return $this->render('web-development');
    }

    public function uxUiDesign()
    {
        return $this->render('ux-ui-design');
    }

    public function digitalMarketing()
    {
        return $this->render('digital-marketing');
    }

    public function seo()
    {
        return $this->render('seo');
    }

    public function videoEditing()
    {
        return $this->render('video-editing');
    }

    public function mobileAppDevelopment()
    {
        return $this->render('mobile-app-development');
    }

    public function graphicDesigning()
    {
        return $this->render('graphic-designing');
    }

    private function render(string $key)
    {
        $service = config("seo.services.{$key}");
        abort_unless($service, 404);

        $canonical = route($service['route']);

        return view("user.services.{$key}", [
            'title' => $service['title'],
            'active' => 'services',
            'faqs' => $service['faqs'] ?? [],
            'meta' => [
                'title' => $service['title'],
                'description' => $service['description'],
                'keywords' => $service['keywords'],
                'canonical' => $canonical,
                'image' => $service['image'],
                'image_alt' => $service['image_alt'] ?? $service['title'],
                'page_type' => 'WebPage',
                'service_name' => $service['name'],
                'service_type' => $service['service_type'] ?? $service['name'],
                'faqs' => $service['faqs'] ?? [],
                'breadcrumbs' => SeoMeta::breadcrumbsFor($service['name'], $canonical, [
                    ['name' => 'Services', 'url' => route('home') . '#services'],
                ]),
            ],
        ]);
    }
}
