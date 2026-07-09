@extends('layouts.app')

@include('layouts.partials.service-page-assets')

@section('body_class', 'font-[Sora] text-white bg-[#0F0715]')

@section('title', $title ?? 'Web Development | Exlon Tech')

@section('content')
@push('styles')
<style>
    .web-feature-marquee {
        overflow: hidden;
        padding: 0.5rem 0;
        -webkit-mask-image: linear-gradient(to right, transparent, #000 8%, #000 92%, transparent);
        mask-image: linear-gradient(to right, transparent, #000 8%, #000 92%, transparent);
    }

    .web-feature-marquee__track {
        display: flex;
        gap: 1.25rem;
        width: max-content;
        animation: web-feature-marquee 100s linear infinite;
    }

    .web-feature-marquee:hover .web-feature-marquee__track {
        animation-play-state: paused;
    }

    @keyframes web-feature-marquee {
        from {
            transform: translateX(0);
        }
        to {
            transform: translateX(-50%);
        }
    }

    .web-feature-card--marquee {
        min-width: 300px;
        max-width: 300px;
        flex-shrink: 0;
        min-height: 200px;
    }

    .tech-marquee {
        overflow: hidden;
        margin-top: 3rem;
        -webkit-mask-image: linear-gradient(to right, transparent, #000 6%, #000 94%, transparent);
        mask-image: linear-gradient(to right, transparent, #000 6%, #000 94%, transparent);
    }

    .tech-marquee__track {
        display: flex;
        gap: 2.5rem;
        width: max-content;
        animation: tech-marquee 45s linear infinite;
    }

    .tech-marquee:hover .tech-marquee__track {
        animation-play-state: paused;
    }

    @keyframes tech-marquee {
        from {
            transform: translateX(-50%);
        }
        to {
            transform: translateX(0);
        }
    }

    .tech-stack-item--marquee {
        flex-shrink: 0;
    }

    .tech-stack-item__icon--django {
        font-size: 2rem;
        color: #0c4b33;
        background: linear-gradient(135deg, rgba(12, 75, 51, 0.25), rgba(9, 46, 32, 0.5));
    }

    .tech-stack-panels {
        position: relative;
        margin-top: 3rem;
        min-height: 11rem;
    }

    .tech-stack-panel {
        width: 100%;
    }

    .tech-stack-panel--grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 2rem 2.5rem;
    }

    @media (min-width: 640px) {
        .tech-stack-panel--grid {
            gap: 2.5rem;
        }
    }

    .tech-stack-tab {
        position: relative;
        padding: 0.5rem 0.25rem 0.75rem;
        border-bottom: 2px solid transparent;
        font-size: 0.875rem;
        transition: color 0.3s ease, border-color 0.3s ease;
    }

    @media (min-width: 640px) {
        .tech-stack-tab {
            font-size: 1rem;
        }
    }

    .tech-stack-tab.is-active {
        color: #c084fc;
        border-color: #c084fc;
    }

    .tech-stack-tab:not(.is-active) {
        color: #9ca3af;
    }

    .tech-stack-tab:not(.is-active):hover {
        color: #c084fc;
        border-color: rgba(192, 132, 252, 0.45);
    }

    .web-feature-card {
        background: linear-gradient(145deg, rgba(15, 7, 21, 0.95), rgba(24, 12, 40, 0.9));
        border: 1px solid rgba(135, 80, 247, 0.25);
        border-radius: 1rem;
        padding: 1.75rem;
        min-height: 220px;
        transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .web-feature-card:hover {
        transform: translateY(-4px);
        border-color: rgba(181, 125, 255, 0.55);
        box-shadow: 0 16px 40px rgba(135, 80, 247, 0.18);
    }

    .web-feature-card__icon {
        width: 3rem;
        height: 3rem;
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, rgba(135, 80, 247, 0.35), rgba(54, 28, 105, 0.8));
        color: #fff;
        font-size: 1.1rem;
        margin-bottom: 1rem;
    }

    .tech-stack-item {
        width: 7rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.75rem;
    }

    .tech-stack-item__icon {
        width: 4.5rem;
        height: 4.5rem;
        border-radius: 1rem;
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid rgba(135, 80, 247, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0.75rem;
        transition: border-color 0.25s ease, transform 0.25s ease;
    }

    .tech-stack-item:hover .tech-stack-item__icon {
        border-color: rgba(181, 125, 255, 0.5);
        transform: translateY(-3px);
    }

    .tech-stack-item__icon img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .tech-stack-item__label {
        font-size: 0.8rem;
        color: #d8c9ff;
        text-align: center;
    }

    [x-cloak] {
        display: none !important;
    }

    .web-faq-section {
        position: relative;
        overflow: hidden;
    }

    .web-faq-section__glow {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 36rem;
        height: 36rem;
        transform: translate(-50%, -50%);
        background: radial-gradient(circle, rgba(135, 80, 247, 0.14) 0%, transparent 70%);
        pointer-events: none;
    }

    .web-faq-section__glow--left {
        top: 20%;
        left: -8%;
        transform: none;
        width: 24rem;
        height: 24rem;
    }

    .web-faq-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.35rem 0.9rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: #c9a8ff;
        background: rgba(135, 80, 247, 0.12);
        border: 1px solid rgba(181, 125, 255, 0.25);
        margin-bottom: 1.25rem;
    }

    .web-faq-title {
        font-size: clamp(1.75rem, 4vw, 2.5rem);
        font-weight: 700;
        line-height: 1.2;
        background: linear-gradient(135deg, #ffffff 0%, #d8c9ff 55%, #b57dff 100%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .web-faq-cta {
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        margin-top: 1.75rem;
        padding: 0.85rem 1.4rem;
        border-radius: 9999px;
        font-size: 0.9rem;
        font-weight: 600;
        color: #fff;
        background: linear-gradient(135deg, #8750f7, #6b2fd4);
        border: 1px solid rgba(255, 255, 255, 0.12);
        box-shadow: 0 10px 30px rgba(135, 80, 247, 0.28);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .web-faq-cta:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 36px rgba(135, 80, 247, 0.38);
    }

    .web-faq-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .web-faq-item {
        border-radius: 1.25rem;
        background: linear-gradient(145deg, rgba(18, 10, 28, 0.95), rgba(24, 12, 40, 0.75));
        border: 1px solid rgba(135, 80, 247, 0.18);
        overflow: hidden;
        transition: border-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
    }

    .web-faq-item:hover {
        border-color: rgba(181, 125, 255, 0.35);
    }

    .web-faq-item.is-open {
        border-color: rgba(181, 125, 255, 0.55);
        box-shadow: 0 12px 40px rgba(135, 80, 247, 0.16);
        transform: translateY(-2px);
    }

    .web-faq-item__trigger {
        width: 100%;
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.15rem 1.25rem;
        text-align: left;
        color: #f3ecff;
        transition: background 0.25s ease;
    }

    .web-faq-item.is-open .web-faq-item__trigger {
        background: linear-gradient(90deg, rgba(135, 80, 247, 0.18), rgba(135, 80, 247, 0.04));
    }

    .web-faq-item__number {
        flex-shrink: 0;
        width: 2.25rem;
        height: 2.25rem;
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
        font-weight: 700;
        color: #d8c9ff;
        background: rgba(135, 80, 247, 0.15);
        border: 1px solid rgba(181, 125, 255, 0.25);
        transition: background 0.25s ease, color 0.25s ease;
    }

    .web-faq-item.is-open .web-faq-item__number {
        color: #fff;
        background: linear-gradient(135deg, #8750f7, #6b2fd4);
        border-color: transparent;
    }

    .web-faq-item__question {
        flex: 1;
        font-size: 0.98rem;
        font-weight: 600;
        line-height: 1.45;
        padding-right: 0.5rem;
    }

    @media (min-width: 640px) {
        .web-faq-item__question {
            font-size: 1.05rem;
        }
    }

    .web-faq-item__chevron {
        flex-shrink: 0;
        width: 2rem;
        height: 2rem;
        border-radius: 9999px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #b57dff;
        background: rgba(135, 80, 247, 0.1);
        border: 1px solid rgba(181, 125, 255, 0.2);
        transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1), background 0.25s ease, color 0.25s ease;
    }

    .web-faq-item.is-open .web-faq-item__chevron {
        transform: rotate(180deg);
        color: #fff;
        background: #8750f7;
        border-color: transparent;
    }

    .web-faq-item__collapse {
        display: grid;
        grid-template-rows: 0fr;
        transition: grid-template-rows 0.45s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .web-faq-item.is-open .web-faq-item__collapse {
        grid-template-rows: 1fr;
    }

    .web-faq-item__collapse-inner {
        overflow: hidden;
        min-height: 0;
    }

    .web-faq-item__panel {
        padding: 0 1.25rem 1.25rem 4.5rem;
    }

    .web-faq-item__answer {
        padding-top: 0.15rem;
        padding-left: 0.25rem;
        border-left: 2px solid rgba(181, 125, 255, 0.35);
        color: #c4b5d8;
        font-size: 0.92rem;
        line-height: 1.75;
        opacity: 0;
        transform: translateY(-6px);
        transition: opacity 0.35s ease, transform 0.35s ease;
    }

    .web-faq-item.is-open .web-faq-item__answer {
        opacity: 1;
        transform: translateY(0);
        transition-delay: 0.12s;
    }

    .web-faq-item:not(.is-open) .web-faq-item__answer {
        transition-delay: 0s;
    }

    @media (max-width: 639px) {
        .web-faq-item__panel {
            padding-left: 1.25rem;
        }
    }
</style>
@endpush

<!------------------------------------------------- Hero 1 Section ------------------------------------------>

    <section
        class="relative py-[200px] px-4 sm:px-6 md:px-12 lg:px-[80px] xl:px-[125px] 2xl:px-[127px] bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset('assets/img/services/web hero.jpg') }}')">
        <div class="mx-auto max-w-7xl flex flex-col items-center text-center md:items-start md:text-left space-y-6">
            <h1 class="text-4xl sm:text-5xl font-bold">{{ $serviceH1 ?? 'Web Development Services for Global Businesses' }}</h1>

            <h3 class="text-lg sm:text-xl md:text-2xl font-semibold w-[480px] text-white" data-wow-delay=".4s">
                Fast, secure, SEO-ready websites and web applications for startups, SMEs, ecommerce brands, and growing companies.
            </h3>

            <p class="text-primary-color-light dark:text-body-color max-w-700px wow fadeInUp" data-wow-delay=".4s">
                ExlonTech builds scalable websites, dashboards, portals, and custom web platforms for businesses
                worldwide that need reliable remote development support.
            </p>

            <a href="{{ route('home') }}#contact" 
                class="mt-8 sm:mt-12 group inline-flex items-center gap-2 overflow-hidden rounded-full border bg-gradient-to-r from-[#712BFE] to-[#E5D9FD] border-[#8C57F7] px-8 sm:px-10 py-3 sm:py-4 text-sm text-white transition duration-300 hover:bg-[#8C57F7] cursor-pointer">
                Let’s Connect
                <i class="fas fa-arrow-right text-sm transition duration-300 group-hover:translate-x-1"></i>
            </a>
        </div>
    </section>

    <!------------------------------------------------- Hero 2 Section ------------------------------------------>
    <section class="relative py-24 px-4 sm:px-6 md:px-12 lg:px-[80px] xl:px-[125px] 2xl:px-[127px]">
        <div class="mx-auto flex w-full max-w-7xl flex-col md:flex-row items-center">
            <!-- Text Content -->
            <div class="w-full mt-32 p-6 sm:p-8 md:w-1/2 order-1 md:order-1 space-y-5 text-left bg-transparent">
                <h2 class="text-xl sm:text-3xl font-semibold text-[#FFFFFF] bg-clip-text">
                    Professional Web Development for Long-Term Growth
                </h2>

                <p class="text-primary-color-light dark:text-body-color max-w-700px wow fadeInUp">
                    We build custom, user-friendly websites designed to grow with your business. Our development
                    approach focuses on clean code, scalable architecture, and seamless user experiences—ensuring your
                    digital presence is not only visually strong but technically reliable. Whether you're starting fresh
                    or upgrading, we deliver long-term value through tailored solutions that support your goals today
                    and tomorrow.
                </p>

                <p class="text-primary-color-light dark:text-body-color max-w-700px wow fadeInUp">
                    Our team dives deep into user behavior to craft experiences that are smooth, personal, and visually
                    striking. Whether you’re building something new or improving what you already have, we’re here to
                    help you stand out.
                </p>

                <!-- CTA Button -->
                <div class="flex flex-col items-start sm:flex-row md:justify-start gap-6 mt-6">
                    <a href="{{ route('home') }}#contact"
                        class="group inline-flex items-center gap-2 overflow-hidden rounded-full border border-[#8C57F7] px-6 sm:px-8 py-2 sm:py-3 text-[#8750F7] text-sm transition duration-300 hover:bg-[#8C57F7] cursor-pointer">
                        Book a Meeting
                        <i class="fas fa-arrow-right text-sm transition duration-300 group-hover:translate-x-1"></i>
                    </a>
                </div>
            </div>

            <!-- Hero Image -->
            <div class="w-[634px] h-[601px] md:w-1/2 order-2 md:order-2 flex justify-center">
                <img src="{{ asset('assets/img/services/web hero2.jpg') }}" alt="Hero" loading="lazy"
                    class="w-[250px] sm:w-[320px] ml-32 md:w-[400px] lg:w-[450px] h-auto object-cover rounded-3xl shadow-xl cursor-pointer transform -rotate-3" />
            </div>
        </div>
    </section>

    <!------------------------------------------------- Cards Section ------------------------------------------>

    <section class="relative py-20 px-4 sm:px-6 md:px-12 lg:px-[80px] xl:px-[125px] 2xl:px-[127px] bg-[#030303]">
        <div class="max-w-7xl mx-auto">
            <!-- Section Heading -->
            <h2 class="text-1xl text-center md:text-[45px] font-bold leading-tight text-[#FFFFFF] bg-clip-text mb-12">
                The Full-Force Custom Web Development Experience
            </h2>

            <!-- Grid Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div
                    class="bg-[#0F0715] p-6 rounded-lg shadow-md border-2 border-[#492a85] cursor-pointer hover:shadow-2xl hover:bg-[#1b0f2e] transform hover:-translate-y-1 transition-all duration-300">
                    <div class="mb-4 flex">
                        <img src="{{ asset('assets/img/services/Property 1=Cursor.png') }}" alt="Trophy" class="w-10 h-10 object-contain" />
                        <h3 class="text-xl font-semibold ml-3 mt-2 text-[#8750F7]">
                            Fully Custom Builds
                        </h3>
                    </div>

                    <p class="text-white text-sm md:text-base">
                        We don’t use templates. Every website is custom-built to match your goals, audience, and brand
                        identity — ensuring a perfect fit for your business needs.
                    </p>
                </div>

                <!-- Card 2 -->
                <div
                    class="bg-[#0F0715] p-6 rounded-lg shadow-md border-2 border-[#492a85] cursor-pointer hover:shadow-2xl hover:bg-[#1b0f2e] transform hover:-translate-y-1 transition-all duration-300">
                    <div class="mb-4 flex">
                        <img src="{{ asset('assets/img/services/Property 1=Phone.png') }}" alt="Trophy" class="w-10 h-10 object-contain" />
                        <h3 class="text-xl font-semibold ml-3 mt-2 text-[#8750F7]">
                            Mobile Responsive
                        </h3>
                    </div>

                    <p class="text-white text-sm md:text-base">
                        Your website will look and function flawlessly on desktop, tablet, and mobile—delivering a
                        consistent experience for users on every screen size.
                    </p>
                </div>

                <!-- Card 3 -->
                <div
                    class="bg-[#0F0715] p-6 rounded-lg shadow-md border-2 border-[#492a85] cursor-pointer hover:shadow-2xl hover:bg-[#1b0f2e] transform hover:-translate-y-1 transition-all duration-300">
                    <div class="mb-4 flex">
                        <img src="{{ asset('assets/img/services/Property 1=cycle.png') }}" alt="Trophy" class="w-10 h-10 object-contain" />
                        <h3 class="text-xl font-semibold ml-3 mt-2 text-[#8750F7]">
                            Fast & Optimized
                        </h3>
                    </div>
                    <p class="text-white text-sm md:text-base">
                        We develop with performance in mind—clean, efficient code for fast load times, better SEO, and
                        smoother user experiences.
                    </p>
                </div>

                <!-- Card 4 -->
                <div
                    class="bg-[#0F0715] p-6 rounded-lg shadow-md border-2 border-[#492a85] cursor-pointer hover:shadow-2xl hover:bg-[#1b0f2e] transform hover:-translate-y-1 transition-all duration-300">
                    <div class="mb-4 flex">
                        <img src="{{ asset('assets/img/services/Property 1=Search.png') }}" alt="Trophy" class="w-10 h-10 object-contain" />
                        <h3 class="text-xl font-semibold ml-3 mt-2 text-[#8750F7]">
                            SEO-Friendly
                        </h3>
                    </div>
                    <p class="text-white text-sm md:text-base">
                        Our development process includes SEO best practices from the start, helping your website get
                        discovered and rank better in search engines.
                    </p>
                </div>

                <!-- Card 5 -->
                <div
                    class="bg-[#0F0715] p-6 rounded-lg shadow-md border-2 border-[#492a85] cursor-pointer hover:shadow-2xl hover:bg-[#1b0f2e] transform hover:-translate-y-1 transition-all duration-300">
                    <div class="mb-4 flex">
                        <img src="{{ asset('assets/img/services/Property 1=Secure.png') }}" alt="Trophy" class="w-10 h-10 object-contain" />
                        <h3 class="text-xl font-semibold ml-3 mt-2 text-[#8750F7]">
                            Secure & Scalable
                        </h3>
                    </div>
                    <p class="text-white text-sm md:text-base">
                        We build with modern frameworks and security best practices to ensure your site is protected,
                        scalable, and ready to grow with your business.
                    </p>
                </div>

                <!-- Card 6 -->
                <div
                    class="bg-[#0F0715] p-6 rounded-lg shadow-md border-2 l border-[#492a85] cursor-pointer hover:shadow-2xl hover:bg-[#1b0f2e] transform hover:-translate-y-1 transition-all duration-300">
                    <div class="mb-4 flex">
                        <img src="{{ asset('assets/img/services/Property 1=Support.png') }}" alt="Trophy" class="w-10 h-10 object-contain" />
                        <h3 class="text-xl font-semibold ml-3 mt-2 text-[#8750F7]">
                            Ongoing Support
                        </h3>
                    </div>
                    <p class="text-white text-sm md:text-base">
                        From launch to long-term success, we offer support, updates, and improvements to keep your
                        website running smoothly and securely.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!------------------------------------------------- CTA Section ------------------------------------------>

    <section class="relative py-4 px-4 sm:px-6 md:px-12 lg:px-[80px] xl:px-[125px] 2xl:px-[127px] bg-[#030303]">
        <div class="w-[900px] max-w-full mx-auto border border-[#492a85] rounded-2xl p-4 sm:p-6 bg-[#7c4be1]">
            <div class="space-y-4 text-center">
                <h2 class="text-lg sm:text-xl font-semibold leading-snug text-white">
                    Ready to Grow Your Business by Creating Best <br />
                    <span class="block">User Experiences</span>
                </h2>

                <a href="{{ route('home') }}#contact"
                    class="group inline-flex items-center gap-2 overflow-hidden rounded-full border border-[#8C57F7] px-6 sm:px-8 py-2 sm:py-3 text-sm transition duration-300 bg-white text-[#0F0715] font-bold">
                    Get Free Proposal
                </a>
            </div>
        </div>
    </section>

    <!------------------------------------------------- Service Process Section ------------------------------------------>

    <section class="text-white relative py-20 px-4 sm:px-6 md:px-12 lg:px-[80px] xl:px-[125px] 2xl:px-[127px]">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-semibold mb-[100px]">
                The Web Development Service Process
            </h2>

            <div class="relative grid grid-cols-1 md:grid-cols-4 gap-12">
                <!-- Arrows -->
                <img src="{{ asset('assets/img/services/Vector 9.png') }}" alt="Arrow Top"
                    class="hidden md:block absolute -top-12 left-[16%] w-48" />
                <img src="{{ asset('assets/img/services/Vector 10.png') }}" alt="Arrow Bottom"
                    class="hidden md:block absolute mt-4 -bottom-14 left-[45%] w-48" />
                <img src="{{ asset('assets/img/services/Vector 11.png') }}" alt="Arrow Top"
                    class="hidden md:block absolute -top-12 left-[65%] w-48" />

                <!-- Step 1 -->
                <div class="relative pl-6 border-l border-[#492a85]">
                    <div class="flex flex-col space-y-4">
                        <img src="{{ asset('assets/img/services/Property 1=Component 1.png') }}" alt="Step 1 Icon" class="w-10 h-10 mt-1" />
                        <div class="space-y-2">
                            <h3 class="text-lg font-semibold text-[#A5A5A5]">Step 1</h3>
                            <h4 class="text-xl font-bold">Discovery & Planning</h4>
                            <p class="text-sm leading-relaxed text-gray-300 pr-2">
                                We learn about your business goals, target audience, and technical requirements—then
                                define scope, sitemap, and a clear project roadmap before development begins.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="relative pl-6 border-l border-[#492a85]">
                    <div class="flex flex-col space-y-4">
                        <img src="{{ asset('assets/img/services/Property 1=Component 83.png') }}" alt="Step 2 Icon" class="w-10 h-10 mt-1" />
                        <div class="space-y-2">
                            <h3 class="text-lg font-semibold text-[#A5A5A5]">Step 2</h3>
                            <h4 class="text-xl font-bold">Design Integration</h4>
                            <p class="text-sm leading-relaxed text-gray-300 pr-2">
                                We translate approved UI/UX designs into responsive front-end layouts and reusable
                                components that align with your brand and user journey.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="relative pl-6 border-l border-[#492a85]">
                    <div class="flex flex-col space-y-4">
                        <img src="{{ asset('assets/img/services/Property 1=Component 84.png') }}" alt="Step 3 Icon" class="w-10 h-10 mt-1" />
                        <div class="space-y-2">
                            <h3 class="text-lg font-semibold text-[#A5A5A5]">Step 3</h3>
                            <h4 class="text-xl font-bold">Development & Testing</h4>
                            <p class="text-sm leading-relaxed text-gray-300 pr-2">
                                Our developers build your website with clean, maintainable code—then run performance,
                                security, and cross-browser testing before launch.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="relative pl-6 border-l border-[#492a85]">
                    <div class="flex flex-col space-y-4">
                        <img src="{{ asset('assets/img/services/Property 1=Component 85.png') }}" alt="Step 4 Icon" class="w-10 h-10 mt-1" />
                        <div class="space-y-2">
                            <h3 class="text-lg font-semibold text-[#A5A5A5]">Step 4</h3>
                            <h4 class="text-xl font-bold">Launch & Support</h4>
                            <p class="text-sm leading-relaxed text-gray-300 pr-2">
                                We deploy your site, monitor stability, and provide ongoing updates, optimizations,
                                and support so your platform keeps performing as you grow.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!------------------------------------------------- Features Marquee Section ------------------------------------------>
    @php
        $webFeatures = [
            ['icon' => 'fa-shield-halved', 'title' => 'Strong Security Practices', 'desc' => 'SSL, secure authentication, input validation, and hardened server configurations to protect your data and users.'],
            ['icon' => 'fa-gauge-high', 'title' => 'High-Speed Performance', 'desc' => 'Optimized assets, caching, and lean code deliver fast page loads and better conversion rates.'],
            ['icon' => 'fa-layer-group', 'title' => 'Scalable Architecture', 'desc' => 'Modular structure that grows with traffic, new features, and evolving business requirements.'],
            ['icon' => 'fa-mobile-screen-button', 'title' => 'Fully Responsive Design', 'desc' => 'Pixel-perfect layouts across mobile, tablet, and desktop for a consistent brand experience.'],
            ['icon' => 'fa-magnifying-glass-chart', 'title' => 'SEO-Ready Structure', 'desc' => 'Semantic markup, clean URLs, meta controls, and performance foundations that support search visibility.'],
            ['icon' => 'fa-code', 'title' => 'Clean, Maintainable Code', 'desc' => 'Well-documented codebases that are easy to extend, debug, and hand off to your internal team.'],
            ['icon' => 'fa-puzzle-piece', 'title' => 'CMS Integration', 'desc' => 'WordPress, Shopify, or custom admin panels so your team can update content without developers.'],
            ['icon' => 'fa-cart-shopping', 'title' => 'E-Commerce Solutions', 'desc' => 'Online stores with product management, checkout flows, and inventory-ready architecture.'],
            ['icon' => 'fa-plug', 'title' => 'API Development', 'desc' => 'RESTful and GraphQL APIs to connect your website with apps, CRMs, and third-party services.'],
            ['icon' => 'fa-credit-card', 'title' => 'Payment Gateways', 'desc' => 'Secure integration with Stripe, PayPal, and regional payment providers for smooth transactions.'],
            ['icon' => 'fa-chart-line', 'title' => 'Analytics & Tracking', 'desc' => 'Google Analytics, Tag Manager, and event tracking setup to measure traffic and conversions.'],
            ['icon' => 'fa-link', 'title' => 'Third-Party Integrations', 'desc' => 'Connect email marketing, chat widgets, booking systems, and business tools your team already uses.'],
            ['icon' => 'fa-globe', 'title' => 'Cross-Browser Compatibility', 'desc' => 'Thorough testing across Chrome, Safari, Firefox, and Edge for reliable user experiences.'],
            ['icon' => 'fa-code-branch', 'title' => 'Version Control & Deployment', 'desc' => 'Git-based workflows with staging environments and safe production deployments.'],
            ['icon' => 'fa-headset', 'title' => 'Ongoing Maintenance', 'desc' => 'Post-launch updates, security patches, and performance monitoring to keep your site healthy.'],
        ];
    @endphp

    <section class="w-full py-20 relative bg-cover bg-center bg-no-repeat overflow-hidden"
        style="background-image: url('{{ asset('assets/img/services/frame.jpg') }}')">
        <div class="max-w-7xl mx-auto relative px-4 sm:px-6">
            <div class="text-center mb-12">
                <p class="text-sm uppercase tracking-[0.2em] text-[#b57dff] mb-3">What You Get</p>
                <h2 class="text-2xl sm:text-4xl font-bold text-white">
                    Our Web Development Solutions Features
                </h2>
                <p class="text-gray-300 max-w-2xl mx-auto mt-4 text-sm sm:text-base">
                    End-to-end web capabilities built for performance, security, and long-term growth.
                </p>
            </div>

            <div class="web-feature-marquee">
                <div class="web-feature-marquee__track">
                    @for ($copy = 0; $copy < 2; $copy++)
                        @foreach ($webFeatures as $feature)
                            <div class="web-feature-card web-feature-card--marquee">
                                <div class="web-feature-card__icon"><i class="fa-solid {{ $feature['icon'] }}"></i></div>
                                <h3 class="text-lg font-semibold text-white mb-2">{{ $feature['title'] }}</h3>
                                <p class="text-sm text-gray-300 leading-relaxed">{{ $feature['desc'] }}</p>
                            </div>
                        @endforeach
                    @endfor
                </div>
            </div>
        </div>
    </section>

    <!------------------------------------------------- Tech Stack Section ------------------------------------------>
    @php
        $techStack = [
            'frontend' => [
                ['img' => 'html.png', 'label' => 'HTML5'],
                ['img' => 'css.png', 'label' => 'CSS3'],
                ['img' => 'bootstrp.png', 'label' => 'Bootstrap'],
                ['img' => 'js.png', 'label' => 'JavaScript'],
                ['img' => 'reactjs.png', 'label' => 'React'],
                ['img' => 'typescript.png', 'label' => 'TypeScript'],
                ['img' => 'angular.png', 'label' => 'Angular'],
                ['img' => 'nextjs.png', 'label' => 'Next.js'],
                ['img' => 'vue.png', 'label' => 'Vue.js'],
            ],
            'database' => [
                ['img' => 'mongoDb.png', 'label' => 'MongoDB'],
                ['img' => 'dunamoDB.png', 'label' => 'DynamoDB'],
                ['img' => 'postgresal.png', 'label' => 'PostgreSQL'],
                ['img' => 'mysql.png', 'label' => 'MySQL'],
                ['img' => 'firebase.png', 'label' => 'Firebase'],
            ],
            'backend' => [
                ['img' => 'Node.png', 'label' => 'Node.js'],
                ['img' => 'php 1.png', 'label' => 'PHP'],
                ['img' => 'laravel.png', 'label' => 'Laravel'],
                ['icon' => 'fa-brands fa-python', 'label' => 'Django'],
                ['img' => 'graphql.png', 'label' => 'GraphQL'],
                ['img' => 'codeigniter.png', 'label' => 'CodeIgniter'],
                ['img' => 'mearnstack.png', 'label' => 'MERN Stack'],
            ],
            'cms' => [
                ['img' => 'shopifyy.png', 'label' => 'Shopify'],
                ['img' => 'wordpress.png', 'label' => 'WordPress'],
                ['img' => 'Drupal.png', 'label' => 'Drupal'],
            ],
        ];

        $techTabs = [
            'frontend' => 'Front End',
            'database' => 'Database',
            'backend' => 'Back End',
            'cms' => 'CMS',
        ];
    @endphp

    <section
        class="py-24 px-4 sm:px-6 md:px-12 lg:px-[80px] xl:px-[125px] 2xl:px-[127px] bg-black text-white"
        x-data="{ activeTab: 'frontend' }">

        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-4">Our Tech Stack</h2>
            <p class="text-gray-400 max-w-3xl mx-auto text-sm sm:text-base">
                We build with modern, battle-tested technologies across front end, back end, databases, and CMS platforms.
            </p>

            <div class="flex flex-wrap justify-center gap-4 sm:gap-8 border-b border-gray-700 mt-10 pb-1">
                @foreach ($techTabs as $key => $label)
                    <button type="button" class="tech-stack-tab"
                        :class="activeTab === '{{ $key }}' ? 'is-active' : ''"
                        @click="activeTab = '{{ $key }}'">
                        {{ $label }}
                    </button>
                @endforeach
            </div>

            <div class="tech-stack-panels">
                @foreach ($techStack as $tabKey => $items)
                    <div class="tech-stack-panel {{ $tabKey !== 'frontend' ? 'tech-stack-panel--grid' : '' }}"
                        x-show="activeTab === '{{ $tabKey }}'"
                        x-transition:enter="transition ease-out duration-500"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-300 absolute inset-x-0 top-0"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-3"
                        x-cloak>
                        @if ($tabKey === 'frontend')
                            <div class="tech-marquee !mt-0">
                                <div class="tech-marquee__track">
                                    @for ($copy = 0; $copy < 2; $copy++)
                                        @foreach ($items as $item)
                                            <div class="tech-stack-item tech-stack-item--marquee">
                                                <div class="tech-stack-item__icon">
                                                    <img src="{{ asset('assets/img/services/' . $item['img']) }}" alt="{{ $item['label'] }}">
                                                </div>
                                                <p class="tech-stack-item__label">{{ $item['label'] }}</p>
                                            </div>
                                        @endforeach
                                    @endfor
                                </div>
                            </div>
                        @else
                            @foreach ($items as $item)
                                <div class="tech-stack-item">
                                    <div class="tech-stack-item__icon {{ isset($item['icon']) ? 'tech-stack-item__icon--django' : '' }}">
                                        @if (isset($item['icon']))
                                            <i class="{{ $item['icon'] }}"></i>
                                        @else
                                            <img src="{{ asset('assets/img/services/' . $item['img']) }}" alt="{{ $item['label'] }}">
                                        @endif
                                    </div>
                                    <p class="tech-stack-item__label">{{ $item['label'] }}</p>
                                </div>
                            @endforeach
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!------------------------------------------------- Hire Section ------------------------------------------>
    <section class="text-white py-20 px-4 sm:px-6 md:px-12 lg:px-[80px] xl:px-[125px] 2xl:px-[127px]">
        <div class="max-w-7xl mx-auto">
            <h2
                class="text-3xl text-center md:text-[45px] font-bold leading-tight bg-gradient-to-r from-[#712BFE] to-[#E5D9FD] bg-clip-text text-transparent mb-12">
                Hire Web Developers
            </h2>
            <p class="text-white text-center max-w-2xl mx-auto">
                Need a reliable team to build or scale your website? Explore our flexible engagement models below.
            </p>

            <!-- Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 py-12">
                <!-- Card -->
                <div
                    class="bg-[#0F0715] border border-[#2d1a4d] p-6 rounded-xl shadow-md hover:shadow-2xl hover:bg-[#120a1c] hover:border-[#492a85] transform hover:-translate-y-1 transition-all duration-300 flex items-center gap-4 min-h-[150px]">
                    <img src="{{ asset('assets/img/services/Property 1=Group 36.png') }}" alt="Service feature icon"
                        class="w-12 h-12 object-contain flex-shrink-0" />
                    <div class="flex flex-col justify-center">
                        <h3 class="text-lg font-semibold text-[#a182e1] mb-2">
                            Project Based
                        </h3>
                        <p class="text-white text-sm leading-relaxed">
                            Ideal for pre-defined projects with fixed deadlines and specific
                            deliverables.
                        </p>
                    </div>
                </div>

                <!-- Card -->
                <div
                    class="bg-[#0F0715] border border-[#2d1a4d] p-6 rounded-xl shadow-md hover:shadow-2xl hover:bg-[#120a1c] hover:border-[#492a85] transform hover:-translate-y-1 transition-all duration-300 flex items-center gap-4 min-h-[150px]">
                    <img src="{{ asset('assets/img/services/Property 1=Group 37.png') }}" alt="Service feature icon"
                        class="w-12 h-12 object-contain flex-shrink-0" />
                    <div class="flex flex-col justify-center">
                        <h3 class="text-lg font-semibold text-[#a182e1] mb-2">
                            Hourly Basis
                        </h3>
                        <p class="text-white text-sm leading-relaxed">
                            Flexible hourly engagement for updates, fixes, and iterative improvements.
                        </p>
                    </div>
                </div>

                <!-- Card -->
                <div
                    class="bg-[#0F0715] border border-[#2d1a4d] p-6 rounded-xl shadow-md hover:shadow-2xl hover:bg-[#120a1c] hover:border-[#492a85] transform hover:-translate-y-1 transition-all duration-300 flex items-center gap-4 min-h-[150px]">
                    <img src="{{ asset('assets/img/services/Property 1=Group 39.png') }}" alt="Service feature icon"
                        class="w-12 h-12 object-contain flex-shrink-0" />
                    <div class="flex flex-col justify-center">
                        <h3 class="text-lg font-semibold text-[#a182e1] mb-2">
                            Dedicated Team
                        </h3>
                        <p class="text-white text-sm leading-relaxed">
                            A devoted team assigned to work exclusively on your specific
                            project.
                        </p>
                    </div>
                </div>

                <!-- Card -->
                <div
                    class="bg-[#0F0715] border border-[#2d1a4d] p-6 rounded-xl shadow-md hover:shadow-2xl hover:bg-[#120a1c] hover:border-[#492a85] transform hover:-translate-y-1 transition-all duration-300 flex items-center gap-4 min-h-[150px]">
                    <img src="{{ asset('assets/img/services/Property 1=Group 38.png') }}" alt="Service feature icon"
                        class="w-12 h-12 object-contain flex-shrink-0" />
                    <div class="flex flex-col justify-center">
                        <h3 class="text-lg font-semibold text-[#a182e1] mb-2">
                            Not Sure
                        </h3>
                        <p class="text-white text-sm leading-relaxed">
                            Need help? We will guide you on which plan will work best for
                            your project.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!------------------------------------------------- Projects Section ------------------------------------------>
    <section class="py-24 px-4 sm:px-6 md:px-12 lg:px-[80px] xl:px-[125px] 2xl:px-[127px]">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-semibold">
                    Related <span class="text-purple-500">Projects</span>
                </h2>
                <a href="{{ route('portfolio') }}" class="text-sm text-purple-500 hover:underline">View More</a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-[#0F0715] rounded-xl overflow-hidden border border-[#492a85] shadow-lg">
                    <img src="{{ asset('assets/img/services/intro.jpg') }}" alt="E-Commerce Platform" class="w-full h-56 object-cover">
                    <div class="p-5">
                        <h3 class="text-lg font-semibold">E-Commerce Platform</h3>
                        <p class="text-sm text-gray-300 mt-2">
                            Custom Laravel store with product management, secure checkout, and admin dashboard.
                        </p>
                    </div>
                </div>

                <div class="bg-[#0F0715] rounded-xl overflow-hidden border border-[#492a85] shadow-lg">
                    <img src="{{ asset('assets/img/services/web hero2.jpg') }}" alt="Corporate Website" class="w-full h-56 object-cover">
                    <div class="p-5">
                        <h3 class="text-lg font-semibold">Corporate Business Website</h3>
                        <p class="text-sm text-gray-300 mt-2">
                            Responsive company website with service pages, lead forms, and SEO-ready structure.
                        </p>
                    </div>
                </div>

                <div class="bg-[#0F0715] rounded-xl overflow-hidden border border-[#492a85] shadow-lg">
                    <img src="{{ asset('assets/img/services/heroimg.jpg') }}" alt="SaaS Dashboard" class="w-full h-56 object-cover">
                    <div class="p-5">
                        <h3 class="text-lg font-semibold">SaaS Admin Dashboard</h3>
                        <p class="text-sm text-gray-300 mt-2">
                            React and API-powered dashboard for analytics, user management, and reporting.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!------------------------------------------------- FAQ Section ------------------------------------------>
    @php
        $faqs = [
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
        ];
    @endphp

    <section class="web-faq-section relative py-24 px-4 sm:px-6 md:px-12 lg:px-[80px] xl:px-[125px] 2xl:px-[127px]"
        x-data="{ openFaq: 0 }">
        <div class="web-faq-section__glow" aria-hidden="true"></div>
        <div class="web-faq-section__glow web-faq-section__glow--left" aria-hidden="true"></div>

        <div class="max-w-6xl mx-auto relative">
            <div class="grid lg:grid-cols-12 gap-12 lg:gap-16 items-start">
                <div class="lg:col-span-5 text-center lg:text-left lg:sticky lg:top-28">
                    <p class="web-faq-eyebrow">
                        <i class="fa-regular fa-circle-question"></i>
                        FAQ
                    </p>
                    <h2 class="web-faq-title">
                        Got questions?<br class="hidden sm:block"> We've got answers.
                    </h2>
                    <p class="text-gray-400 mt-4 text-sm sm:text-base leading-relaxed max-w-md mx-auto lg:mx-0">
                        Everything you need to know about timelines, technology, SEO, and support for your web project.
                    </p>
                    <a href="{{ route('home') }}#contact" class="web-faq-cta">
                        Still have questions?
                        <i class="fa-solid fa-arrow-right text-sm"></i>
                    </a>
                </div>

                <div class="lg:col-span-7">
                    <div class="web-faq-list">
                        @foreach ($faqs as $index => $faq)
                            <div class="web-faq-item"
                                :class="openFaq === {{ $index }} ? 'is-open' : ''">
                                <button type="button" class="web-faq-item__trigger"
                                    @click="openFaq = openFaq === {{ $index }} ? -1 : {{ $index }}"
                                    :aria-expanded="openFaq === {{ $index }}">
                                    <span class="web-faq-item__number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                    <span class="web-faq-item__question">{{ $faq['q'] }}</span>
                                    <span class="web-faq-item__chevron" aria-hidden="true">
                                        <i class="fa-solid fa-chevron-down text-xs"></i>
                                    </span>
                                </button>
                                <div class="web-faq-item__collapse">
                                    <div class="web-faq-item__collapse-inner">
                                        <div class="web-faq-item__panel">
                                            <p class="web-faq-item__answer">{{ $faq['a'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
