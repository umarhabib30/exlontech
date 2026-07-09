@extends('layouts.app')

@section('title', $title)

@push('styles')
    <style>
        .seo-service {
            background: #0f0715;
            color: #fff;
        }

        .seo-service__hero {
            padding: 10rem 0 4rem;
            background:
                radial-gradient(circle at 85% 0%, rgba(135, 80, 247, 0.28), transparent 26rem),
                #0f0715;
        }

        .seo-service__eyebrow {
            color: #b57dff;
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 0.14em;
            margin-bottom: 0.85rem;
            text-transform: uppercase;
        }

        .seo-service__title {
            max-width: 920px;
            margin: 0;
            font-size: clamp(2.2rem, 5vw, 4.7rem);
            line-height: 1.06;
            background: linear-gradient(90deg, #fff 0%, #b57dff 58%, #8750f7 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .seo-service__intro {
            max-width: 760px;
            margin: 1.25rem 0 0;
            color: #c8b9dd;
            font-size: 1.05rem;
            line-height: 1.8;
        }

        .seo-service__actions {
            display: flex;
            flex-wrap: wrap;
            gap: 0.85rem;
            margin-top: 2rem;
        }

        .seo-service__button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            min-height: 3rem;
            padding: 0.85rem 1.25rem;
            border-radius: 999px;
            color: #fff;
            background: linear-gradient(135deg, #8750f7, #6b2fd4);
        }

        .seo-service__button--ghost {
            background: rgba(135, 80, 247, 0.12);
            border: 1px solid rgba(135, 80, 247, 0.28);
        }

        .seo-service__section {
            padding: 4rem 0;
        }

        .seo-service__grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1rem;
        }

        .seo-service__card {
            padding: 1.35rem;
            border-radius: 1rem;
            background: linear-gradient(145deg, rgba(27, 16, 38, 0.96), rgba(12, 7, 21, 0.96));
            border: 1px solid rgba(135, 80, 247, 0.24);
        }

        .seo-service__card h2,
        .seo-service__card h3 {
            margin: 0 0 0.75rem;
            font-size: 1.1rem;
        }

        .seo-service__card p,
        .seo-service__card li {
            color: #c8b9dd;
            line-height: 1.75;
        }

        .seo-service__card ul {
            margin: 0;
            padding-left: 1.2rem;
        }

        .seo-service__faq {
            display: grid;
            gap: 0.85rem;
        }

        .seo-service__faq details {
            padding: 1rem 1.2rem;
            border-radius: 0.85rem;
            background: rgba(135, 80, 247, 0.1);
            border: 1px solid rgba(135, 80, 247, 0.24);
        }

        .seo-service__faq summary {
            cursor: pointer;
            color: #fff;
            font-weight: 700;
        }

        .seo-service__faq p {
            margin: 0.75rem 0 0;
            color: #c8b9dd;
            line-height: 1.75;
        }

        @media (max-width: 900px) {
            .seo-service__grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@section('content')
    <main class="main-wrapper seo-service">
        <section class="seo-service__hero">
            <div class="container">
                <p class="seo-service__eyebrow">ExlonTech services</p>
                <h1 class="seo-service__title">{{ $serviceH1 }}</h1>
                <p class="seo-service__intro">{{ $serviceIntro }}</p>
                <div class="seo-service__actions">
                    <a href="{{ route('home') }}#contact" class="seo-service__button">
                        Start Your Project
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <a href="{{ route('portfolio') }}" class="seo-service__button seo-service__button--ghost">
                        View Our Work
                    </a>
                </div>
            </div>
        </section>

        <section class="seo-service__section">
            <div class="container">
                <div class="seo-service__grid">
                    <article class="seo-service__card">
                        <h2>What We Build</h2>
                        <ul>
                            @if ($serviceKey === 'custom-software-saas')
                                <li>SaaS platforms, CRM systems, portals, and dashboards</li>
                                <li>Booking, reporting, workflow, and automation systems</li>
                                <li>Secure admin panels, APIs, and third-party integrations</li>
                            @else
                                <li>Shopify, WooCommerce, and custom ecommerce stores</li>
                                <li>Product catalogs, checkout flows, payment integrations, and order systems</li>
                                <li>SEO-ready category, collection, and product page structures</li>
                            @endif
                        </ul>
                    </article>

                    <article class="seo-service__card">
                        <h2>Why Choose ExlonTech</h2>
                        <p>
                            ExlonTech works as a remote technology partner for startups, SMEs, ecommerce brands, and
                            growing companies worldwide. We combine strategy, design, development, SEO structure, and
                            practical communication so projects move from idea to launch with fewer surprises.
                        </p>
                    </article>

                    <article class="seo-service__card">
                        <h2>Our Process</h2>
                        <ul>
                            <li>Discovery, requirements, and roadmap planning</li>
                            <li>UX structure, interface design, and technical architecture</li>
                            <li>Agile development, testing, launch support, and maintenance</li>
                        </ul>
                    </article>
                </div>
            </div>
        </section>

        <section class="seo-service__section">
            <div class="container">
                <div class="seo-service__grid">
                    <article class="seo-service__card">
                        <h2>Technologies We Use</h2>
                        <p>Laravel, PHP, MySQL, JavaScript, APIs, Bootstrap, Tailwind, WordPress, WooCommerce, Shopify, payment gateways, and cloud-ready deployment workflows.</p>
                    </article>
                    <article class="seo-service__card">
                        <h2>Industries We Serve</h2>
                        <p>Ecommerce, education, hospitality, services, agencies, startups, small businesses, professional firms, and operations-heavy companies.</p>
                    </article>
                    <article class="seo-service__card">
                        <h2>Serving Clients Worldwide</h2>
                        <p>We support global clients through remote collaboration, structured project management, regular updates, and transparent delivery milestones.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="seo-service__section">
            <div class="container">
                <div class="seo-service__grid" style="grid-template-columns: minmax(0, 0.8fr) minmax(0, 1.2fr);">
                    <article class="seo-service__card">
                        <h2>Frequently Asked Questions</h2>
                        <p>Practical answers for businesses planning a serious digital product, online store, or software platform.</p>
                    </article>
                    <div class="seo-service__faq">
                        @foreach ($serviceFaqs as $faq)
                            <details>
                                <summary>{{ $faq['q'] }}</summary>
                                <p>{{ $faq['a'] }}</p>
                            </details>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="seo-service__section">
            <div class="container">
                <article class="seo-service__card">
                    <h2>Start Your Project</h2>
                    <p>
                        Tell us what you want to build. ExlonTech can help define the scope, recommend the right
                        technology path, and create a practical launch plan for your business.
                    </p>
                    <div class="seo-service__actions">
                        <a href="{{ route('home') }}#contact" class="seo-service__button">Book a Free Consultation</a>
                        <a href="{{ route('web-development') }}" class="seo-service__button seo-service__button--ghost">Explore web development services</a>
                    </div>
                </article>
            </div>
        </section>
    </main>
@endsection
