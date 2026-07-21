@extends('layouts.app')

@include('layouts.partials.service-page-assets')

@section('body_class', 'service-page font-sora bg-cream-light-color dark:bg-[#0F0715] text-seondary-color dark:text-white')

@section('title', $title ?? 'Graphic Designing | Exlon Tech')

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
        style="background-image: url('{{ asset('assets/img/services/uiux.jpg') }}')">
        <div class="mx-auto max-w-7xl flex flex-col items-center text-center md:items-start md:text-left space-y-6">
            <h2 class="text-4xl sm:text-5xl font-bold">Graphic Designing</h2>

            <h3 class="text-lg sm:text-xl md:text-2xl font-semibold w-[480px] text-white" data-wow-delay=".4s">
                Creative Graphic Design That Brings Your Brand to Life
            </h3>

            <p class="text-primary-color-light dark:text-body-color max-w-700px wow fadeInUp" data-wow-delay=".4s">
                Elevate your brand with our professional graphic design services. From logos to marketing collateral,
                we craft visually compelling designs that capture attention and communicate your message with impact.
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
                    Professional Graphic Design for Lasting Brand Impact
                </h2>

                <p class="text-primary-color-light dark:text-body-color max-w-700px wow fadeInUp">
                    We create custom visual identities designed to resonate with your audience and strengthen your
                    brand presence. Our design approach focuses on strategic thinking, creative excellence, and
                    consistent brand expression—ensuring every asset you receive is not only beautiful but purposeful.
                    Whether you need a complete rebrand or fresh marketing materials, we deliver designs that support
                    your goals today and scale with your business tomorrow.
                </p>

                <p class="text-primary-color-light dark:text-body-color max-w-700px wow fadeInUp">
                    Our designers dive deep into your brand story to craft visuals that are memorable, cohesive, and
                    strategically aligned. Whether you are launching a new identity or refreshing existing assets,
                    we are here to help you stand out in a crowded marketplace.
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
                <img src="{{ asset('assets/img/services/service-graphic.png') }}" alt="Graphic Design Hero" loading="lazy"
                    class="w-[250px] sm:w-[320px] ml-32 md:w-[400px] lg:w-[450px] h-auto object-cover rounded-3xl shadow-xl cursor-pointer transform -rotate-3" />
            </div>
        </div>
    </section>

    <!------------------------------------------------- Cards Section ------------------------------------------>

    <section class="relative py-20 px-4 sm:px-6 md:px-12 lg:px-[80px] xl:px-[125px] 2xl:px-[127px] bg-[#030303]">
        <div class="max-w-7xl mx-auto">
            <!-- Section Heading -->
            <h2 class="text-1xl text-center md:text-[45px] font-bold leading-tight text-[#FFFFFF] bg-clip-text mb-12">
                The Full-Force Custom Graphic Design Experience
            </h2>

            <!-- Grid Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div
                    class="bg-[#0F0715] p-6 rounded-lg shadow-md border-2 border-[#492a85] cursor-pointer hover:shadow-2xl hover:bg-[#1b0f2e] transform hover:-translate-y-1 transition-all duration-300">
                    <div class="mb-4 flex">
                        <img src="{{ asset('assets/img/services/icon1.png') }}" alt="Logo Design" class="w-10 h-10 object-contain" />
                        <h3 class="text-xl font-semibold ml-3 mt-2 text-[#8750F7]">
                            Logo Design
                        </h3>
                    </div>

                    <p class="text-white text-sm md:text-base">
                        Distinctive, memorable logos crafted from scratch to represent your brand identity—designed
                        for versatility across digital and print applications.
                    </p>
                </div>

                <!-- Card 2 -->
                <div
                    class="bg-[#0F0715] p-6 rounded-lg shadow-md border-2 border-[#492a85] cursor-pointer hover:shadow-2xl hover:bg-[#1b0f2e] transform hover:-translate-y-1 transition-all duration-300">
                    <div class="mb-4 flex">
                        <img src="{{ asset('assets/img/services/icon2.png') }}" alt="Brand Identity" class="w-10 h-10 object-contain" />
                        <h3 class="text-xl font-semibold ml-3 mt-2 text-[#8750F7]">
                            Brand Identity
                        </h3>
                    </div>

                    <p class="text-white text-sm md:text-base">
                        Complete visual identity systems including color palettes, typography, and brand guidelines
                        that ensure consistent expression across every touchpoint.
                    </p>
                </div>

                <!-- Card 3 -->
                <div
                    class="bg-[#0F0715] p-6 rounded-lg shadow-md border-2 border-[#492a85] cursor-pointer hover:shadow-2xl hover:bg-[#1b0f2e] transform hover:-translate-y-1 transition-all duration-300">
                    <div class="mb-4 flex">
                        <img src="{{ asset('assets/img/services/icon3.png') }}" alt="Social Media Graphics" class="w-10 h-10 object-contain" />
                        <h3 class="text-xl font-semibold ml-3 mt-2 text-[#8750F7]">
                            Social Media Graphics
                        </h3>
                    </div>
                    <p class="text-white text-sm md:text-base">
                        Eye-catching posts, stories, banners, and ad creatives optimized for every platform—designed
                        to boost engagement and grow your online presence.
                    </p>
                </div>

                <!-- Card 4 -->
                <div
                    class="bg-[#0F0715] p-6 rounded-lg shadow-md border-2 border-[#492a85] cursor-pointer hover:shadow-2xl hover:bg-[#1b0f2e] transform hover:-translate-y-1 transition-all duration-300">
                    <div class="mb-4 flex">
                        <img src="{{ asset('assets/img/services/icon4.png') }}" alt="Print Design" class="w-10 h-10 object-contain" />
                        <h3 class="text-xl font-semibold ml-3 mt-2 text-[#8750F7]">
                            Print Design
                        </h3>
                    </div>
                    <p class="text-white text-sm md:text-base">
                        Professional brochures, flyers, business cards, and stationery with print-ready files—ensuring
                        crisp, high-quality output every time.
                    </p>
                </div>

                <!-- Card 5 -->
                <div
                    class="bg-[#0F0715] p-6 rounded-lg shadow-md border-2 border-[#492a85] cursor-pointer hover:shadow-2xl hover:bg-[#1b0f2e] transform hover:-translate-y-1 transition-all duration-300">
                    <div class="mb-4 flex">
                        <img src="{{ asset('assets/img/services/icon5.png') }}" alt="Marketing Collateral" class="w-10 h-10 object-contain" />
                        <h3 class="text-xl font-semibold ml-3 mt-2 text-[#8750F7]">
                            Marketing Collateral
                        </h3>
                    </div>
                    <p class="text-white text-sm md:text-base">
                        Pitch decks, banners, email headers, and promotional materials that align with your brand and
                        drive conversions across every marketing channel.
                    </p>
                </div>

                <!-- Card 6 -->
                <div
                    class="bg-[#0F0715] p-6 rounded-lg shadow-md border-2 border-[#492a85] cursor-pointer hover:shadow-2xl hover:bg-[#1b0f2e] transform hover:-translate-y-1 transition-all duration-300">
                    <div class="mb-4 flex">
                        <img src="{{ asset('assets/img/services/icon6.png') }}" alt="Packaging Design" class="w-10 h-10 object-contain" />
                        <h3 class="text-xl font-semibold ml-3 mt-2 text-[#8750F7]">
                            Packaging Design
                        </h3>
                    </div>
                    <p class="text-white text-sm md:text-base">
                        Shelf-ready packaging that tells your product story at a glance—combining structural creativity
                        with brand-aligned visuals that drive purchase decisions.
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
                    Ready to Grow Your Brand by Creating Stunning <br />
                    <span class="block">Visual Experiences</span>
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
                The Graphic Design Service Process
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
                            <h4 class="text-xl font-bold">Brief & Research</h4>
                            <p class="text-sm leading-relaxed text-gray-300 pr-2">
                                We gather your brand goals, audience insights, and design preferences—then research
                                competitors and industry trends to inform a clear creative direction.
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
                            <h4 class="text-xl font-bold">Concept & Sketching</h4>
                            <p class="text-sm leading-relaxed text-gray-300 pr-2">
                                Our designers explore multiple creative directions through mood boards, sketches, and
                                concept drafts—presenting options for your feedback and alignment.
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
                            <h4 class="text-xl font-bold">Design & Refinement</h4>
                            <p class="text-sm leading-relaxed text-gray-300 pr-2">
                                We develop the chosen concept into polished, high-fidelity designs—refining details,
                                typography, and color through structured revision rounds.
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
                            <h4 class="text-xl font-bold">Delivery & Assets</h4>
                            <p class="text-sm leading-relaxed text-gray-300 pr-2">
                                Final files are delivered in all required formats—print-ready PDFs, web-optimized
                                PNGs, editable source files, and brand guidelines for your team.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!------------------------------------------------- Features Marquee Section ------------------------------------------>
    @php
        $graphicFeatures = [
            ['icon' => 'fa-palette', 'title' => 'Custom Logo Design', 'desc' => 'Unique, scalable logos designed from scratch to represent your brand across every platform and medium.'],
            ['icon' => 'fa-swatchbook', 'title' => 'Brand Identity Systems', 'desc' => 'Cohesive visual identities with color palettes, typography, and style guides for consistent brand expression.'],
            ['icon' => 'fa-share-nodes', 'title' => 'Social Media Templates', 'desc' => 'Platform-optimized post templates, story frames, and ad creatives that boost engagement and brand recall.'],
            ['icon' => 'fa-print', 'title' => 'Print-Ready Artwork', 'desc' => 'High-resolution, CMYK-ready files for brochures, flyers, business cards, and all print collateral.'],
            ['icon' => 'fa-font', 'title' => 'Typography & Color Systems', 'desc' => 'Strategic font pairings and color schemes that reinforce your brand personality and improve readability.'],
            ['icon' => 'fa-bezier-curve', 'title' => 'Vector Illustrations', 'desc' => 'Custom illustrations and iconography that add personality and visual interest to your brand materials.'],
            ['icon' => 'fa-box-open', 'title' => 'Packaging Design', 'desc' => 'Eye-catching product packaging that stands out on shelves and communicates quality at first glance.'],
            ['icon' => 'fa-bullhorn', 'title' => 'Marketing Collateral', 'desc' => 'Pitch decks, banners, email headers, and promotional assets aligned with your campaign goals.'],
            ['icon' => 'fa-icons', 'title' => 'Icon Sets & UI Elements', 'desc' => 'Consistent icon libraries and interface elements for apps, websites, and digital products.'],
            ['icon' => 'fa-book-open', 'title' => 'Brand Guidelines', 'desc' => 'Comprehensive brand books documenting logo usage, colors, typography, and visual standards.'],
            ['icon' => 'fa-wand-magic-sparkles', 'title' => 'Photo Retouching', 'desc' => 'Professional image editing, color correction, and compositing to elevate your visual content.'],
            ['icon' => 'fa-chart-pie', 'title' => 'Infographic Design', 'desc' => 'Data-driven visuals that simplify complex information and make your content shareable and memorable.'],
            ['icon' => 'fa-display', 'title' => 'Presentation Decks', 'desc' => 'Polished slide designs for pitches, reports, and conferences that leave a lasting impression.'],
            ['icon' => 'fa-film', 'title' => 'Motion-Ready Assets', 'desc' => 'Design elements prepared for animation and video integration across digital campaigns.'],
            ['icon' => 'fa-file-export', 'title' => 'Multi-Format Delivery', 'desc' => 'Source files, web assets, and print exports delivered in every format your team needs.'],
        ];
    @endphp

    <section class="w-full py-20 relative bg-cover bg-center bg-no-repeat overflow-hidden"
        style="background-image: url('{{ asset('assets/img/services/frame.jpg') }}')">
        <div class="max-w-7xl mx-auto relative px-4 sm:px-6">
            <div class="text-center mb-12">
                <p class="text-sm uppercase tracking-[0.2em] text-[#b57dff] mb-3">What You Get</p>
                <h2 class="text-2xl sm:text-4xl font-bold text-white">
                    Our Graphic Design Solutions Features
                </h2>
                <p class="text-gray-300 max-w-2xl mx-auto mt-4 text-sm sm:text-base">
                    End-to-end design capabilities built for brand consistency, visual impact, and creative excellence.
                </p>
            </div>

            <div class="web-feature-marquee">
                <div class="web-feature-marquee__track">
                    @for ($copy = 0; $copy < 2; $copy++)
                        @foreach ($graphicFeatures as $feature)
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

    <!------------------------------------------------- Design Tools Section ------------------------------------------>
    @php
        $designTools = [
            'design_tools' => [
                ['img' => 'ps.png', 'label' => 'Photoshop'],
                ['img' => 'ai.png', 'label' => 'Illustrator'],
                ['img' => 'figma1.png', 'label' => 'Figma'],
                ['img' => 'sketch.png', 'label' => 'Sketch'],
                ['img' => 'adobe.png', 'label' => 'Adobe XD'],
            ],
            'branding' => [
                ['img' => 'ai.png', 'label' => 'Illustrator'],
                ['img' => 'ps.png', 'label' => 'Photoshop'],
                ['img' => 'figma1.png', 'label' => 'Figma'],
            ],
            'print_packaging' => [
                ['img' => 'ai.png', 'label' => 'Illustrator'],
                ['img' => 'ps.png', 'label' => 'Photoshop'],
            ],
            'social_media' => [
                ['img' => 'figma1.png', 'label' => 'Figma'],
                ['img' => 'ae.png', 'label' => 'After Effects'],
                ['img' => 'ps.png', 'label' => 'Photoshop'],
            ],
        ];

        $designTabs = [
            'design_tools' => 'Design Tools',
            'branding' => 'Branding',
            'print_packaging' => 'Print & Packaging',
            'social_media' => 'Social Media',
        ];
    @endphp

    <section
        class="py-24 px-4 sm:px-6 md:px-12 lg:px-[80px] xl:px-[125px] 2xl:px-[127px] bg-black text-white"
        x-data="{ activeTab: 'design_tools' }">

        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-4">Our Design Tools</h2>
            <p class="text-gray-400 max-w-3xl mx-auto text-sm sm:text-base">
                We work with industry-leading design software to deliver pixel-perfect visuals across branding, print, and digital channels.
            </p>

            <div class="flex flex-wrap justify-center gap-4 sm:gap-8 border-b border-gray-700 mt-10 pb-1">
                @foreach ($designTabs as $key => $label)
                    <button type="button" class="tech-stack-tab"
                        :class="activeTab === '{{ $key }}' ? 'is-active' : ''"
                        @click="activeTab = '{{ $key }}'">
                        {{ $label }}
                    </button>
                @endforeach
            </div>

            <div class="tech-stack-panels">
                @foreach ($designTools as $tabKey => $items)
                    <div class="tech-stack-panel {{ $tabKey !== 'design_tools' ? 'tech-stack-panel--grid' : '' }}"
                        x-show="activeTab === '{{ $tabKey }}'"
                        x-transition:enter="transition ease-out duration-500"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-300 absolute inset-x-0 top-0"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-3"
                        x-cloak>
                        @if ($tabKey === 'design_tools')
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
                                    <div class="tech-stack-item__icon">
                                        <img src="{{ asset('assets/img/services/' . $item['img']) }}" alt="{{ $item['label'] }}">
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
                Hire Graphic Designers
            </h2>
            <p class="text-white text-center max-w-2xl mx-auto">
                Need a creative team to build or refresh your brand visuals? Explore our flexible engagement models below.
            </p>

            <!-- Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 py-12">
                <!-- Card -->
                <div
                    class="bg-[#0F0715] border border-[#2d1a4d] p-6 rounded-xl shadow-md hover:shadow-2xl hover:bg-[#120a1c] hover:border-[#492a85] transform hover:-translate-y-1 transition-all duration-300 flex items-center gap-4 min-h-[150px]">
                    <img src="{{ asset('assets/img/services/Property 1=Group 36.png') }}" alt="Icon"
                        class="w-12 h-12 object-contain flex-shrink-0" />
                    <div class="flex flex-col justify-center">
                        <h3 class="text-lg font-semibold text-[#a182e1] mb-2">
                            Project Based
                        </h3>
                        <p class="text-white text-sm leading-relaxed">
                            Ideal for pre-defined design projects with fixed deadlines and specific
                            deliverables.
                        </p>
                    </div>
                </div>

                <!-- Card -->
                <div
                    class="bg-[#0F0715] border border-[#2d1a4d] p-6 rounded-xl shadow-md hover:shadow-2xl hover:bg-[#120a1c] hover:border-[#492a85] transform hover:-translate-y-1 transition-all duration-300 flex items-center gap-4 min-h-[150px]">
                    <img src="{{ asset('assets/img/services/Property 1=Group 37.png') }}" alt="Icon"
                        class="w-12 h-12 object-contain flex-shrink-0" />
                    <div class="flex flex-col justify-center">
                        <h3 class="text-lg font-semibold text-[#a182e1] mb-2">
                            Hourly Basis
                        </h3>
                        <p class="text-white text-sm leading-relaxed">
                            Flexible hourly engagement for design updates, revisions, and iterative creative work.
                        </p>
                    </div>
                </div>

                <!-- Card -->
                <div
                    class="bg-[#0F0715] border border-[#2d1a4d] p-6 rounded-xl shadow-md hover:shadow-2xl hover:bg-[#120a1c] hover:border-[#492a85] transform hover:-translate-y-1 transition-all duration-300 flex items-center gap-4 min-h-[150px]">
                    <img src="{{ asset('assets/img/services/Property 1=Group 39.png') }}" alt="Icon"
                        class="w-12 h-12 object-contain flex-shrink-0" />
                    <div class="flex flex-col justify-center">
                        <h3 class="text-lg font-semibold text-[#a182e1] mb-2">
                            Dedicated Team
                        </h3>
                        <p class="text-white text-sm leading-relaxed">
                            A devoted design team assigned to work exclusively on your brand and
                            creative assets.
                        </p>
                    </div>
                </div>

                <!-- Card -->
                <div
                    class="bg-[#0F0715] border border-[#2d1a4d] p-6 rounded-xl shadow-md hover:shadow-2xl hover:bg-[#120a1c] hover:border-[#492a85] transform hover:-translate-y-1 transition-all duration-300 flex items-center gap-4 min-h-[150px]">
                    <img src="{{ asset('assets/img/services/Property 1=Group 38.png') }}" alt="Icon"
                        class="w-12 h-12 object-contain flex-shrink-0" />
                    <div class="flex flex-col justify-center">
                        <h3 class="text-lg font-semibold text-[#a182e1] mb-2">
                            Not Sure
                        </h3>
                        <p class="text-white text-sm leading-relaxed">
                            Need help? We will guide you on which plan will work best for
                            your design project.
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
                    <img src="{{ asset('assets/img/services/uiux.jpg') }}" alt="Brand Identity System" class="w-full h-56 object-cover">
                    <div class="p-5">
                        <h3 class="text-lg font-semibold">Brand Identity & Logo System</h3>
                        <p class="text-sm text-gray-300 mt-2">
                            Complete visual identity with logo suite, color palette, typography, and brand guidelines for a fintech startup.
                        </p>
                    </div>
                </div>

                <div class="bg-[#0F0715] rounded-xl overflow-hidden border border-[#492a85] shadow-lg">
                    <img src="{{ asset('assets/img/services/digital-slider.jpg') }}" alt="Social Media Campaign" class="w-full h-56 object-cover">
                    <div class="p-5">
                        <h3 class="text-lg font-semibold">Social Media Campaign Graphics</h3>
                        <p class="text-sm text-gray-300 mt-2">
                            Cohesive social media templates, ad creatives, and story frames for a multi-platform marketing campaign.
                        </p>
                    </div>
                </div>

                <div class="bg-[#0F0715] rounded-xl overflow-hidden border border-[#492a85] shadow-lg">
                    <img src="{{ asset('assets/img/services/pic.jpg') }}" alt="Product Packaging" class="w-full h-56 object-cover">
                    <div class="p-5">
                        <h3 class="text-lg font-semibold">Product Packaging Design</h3>
                        <p class="text-sm text-gray-300 mt-2">
                            Shelf-ready packaging with structural design, label artwork, and print-ready files for a consumer goods brand.
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
                        Everything you need to know about timelines, deliverables, revisions, and our design process.
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
