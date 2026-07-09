@extends('layouts.app')

@section('title', $title)

@section('content')
    <main class="main-wrapper">
        <section class="relative pt-130px lg:pt-40 xl:pt-200px pb-60px md:pb-20 overflow-hidden">
            <div class="container">
                <p class="text-primary-color font-bold uppercase tracking-[0.14em] mb-15px">About ExlonTech</p>
                <h1 class="text-3xl md:text-size-45 lg:text-size-50 bg-gradient-text-light dark:bg-gradient-text bg-clip-text text-transparent mb-15px max-w-900px">
                    Digital Solutions Company Serving Global Businesses
                </h1>
                <p class="text-primary-color-light dark:text-body-color max-w-760px text-lg leading-1.8">
                    ExlonTech is a Pakistan-based remote technology partner helping startups, SMEs, ecommerce brands,
                    agencies, and growing companies worldwide build websites, mobile apps, custom software platforms,
                    SEO campaigns, branding systems, and digital marketing foundations.
                </p>
            </div>
        </section>

        <section class="pb-60px md:pb-100px">
            <div class="container">
                <div class="grid md:grid-cols-3 gap-25px">
                    <article class="p-25px rounded-10px bg-cream-light-color dark:bg-seondary-color">
                        <h2 class="text-2xl text-primary-color dark:text-white-color mb-10px">What We Do</h2>
                        <p class="text-primary-color-light dark:text-body-color leading-1.8">
                            We plan, design, develop, optimize, and support scalable digital products and growth systems
                            for businesses that need practical technical execution.
                        </p>
                    </article>
                    <article class="p-25px rounded-10px bg-cream-light-color dark:bg-seondary-color">
                        <h2 class="text-2xl text-primary-color dark:text-white-color mb-10px">How We Work</h2>
                        <p class="text-primary-color-light dark:text-body-color leading-1.8">
                            Our team works remotely with clear discovery, documented scope, structured milestones,
                            regular communication, testing, launch support, and maintenance.
                        </p>
                    </article>
                    <article class="p-25px rounded-10px bg-cream-light-color dark:bg-seondary-color">
                        <h2 class="text-2xl text-primary-color dark:text-white-color mb-10px">Who We Serve</h2>
                        <p class="text-primary-color-light dark:text-body-color leading-1.8">
                            We serve international startups, SMEs, ecommerce businesses, agencies needing outsourcing
                            support, and business owners launching software, websites, or marketing systems.
                        </p>
                    </article>
                </div>

                <div class="mt-30px p-25px rounded-10px bg-cream-light-color dark:bg-seondary-color">
                    <h2 class="text-2xl text-primary-color dark:text-white-color mb-10px">Start With a Clear Project Plan</h2>
                    <p class="text-primary-color-light dark:text-body-color leading-1.8 max-w-760px">
                        Whether you need a Laravel application, Flutter app, ecommerce store, SaaS product, SEO roadmap,
                        or digital marketing support, ExlonTech can help define the next practical step.
                    </p>
                    <a href="{{ route('contact') }}"
                        class="inline-flex mt-20px text-size-15 font-medium text-primary-color hover:text-body-color capitalize py-17px px-35px bg-transparent hover:bg-primary-color rounded-full leading-1 border border-primary-color">
                        Book a Free Consultation
                    </a>
                </div>
            </div>
        </section>
    </main>
@endsection
