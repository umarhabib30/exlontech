@extends('layouts.app')

@section('title', $title ?? 'About Us | Exlon Tech')

@push('styles')
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        prefix: 'tw-',
        darkMode: 'class',
        corePlugins: {
            preflight: false,
        }
    }
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    /* Base Page Styling */
    .about-page {
        color: #0f0715;
        font-family: 'Inter', sans-serif;
        overflow-x: hidden;
    }

    .dark .about-page {
        background-color: #0f0715;
        color: #ffffff;
    }

    html:not(.dark) .about-page {
        background-color: #ffffff;
        color: #0f0715;
    }

    /* Hero Section */
    .about-hero {
        padding: 13rem 0 6rem;
        position: relative;
    }

    @media (max-width: 991px) {
        .about-hero {
            padding: 10rem 0 6rem;
        }
    }

    .dark .about-hero {
        background: #0f0715;
    }

    html:not(.dark) .about-hero {
        background: #ffffff;
    }

    .hero-glow-right {
        position: absolute;
        top: 0;
        right: 0;
        width: 450px;
        height: 450px;
        background: radial-gradient(circle, rgba(135,80,247,0.15) 0%, rgba(15,7,21,0) 70%);
        filter: blur(80px);
        pointer-events: none;
        z-index: 0;
    }
    
    .hero-glow-center {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(135,80,247,0.1) 0%, rgba(15,7,21,0) 70%);
        filter: blur(80px);
        pointer-events: none;
        z-index: 0;
    }

    .about-text-content {
        position: relative;
        z-index: 2;
        width: 100%;
    }

    .hero-title {
        font-size: clamp(3rem, 5vw, 4rem);
        font-weight: 700;
        line-height: 1.1;
        margin-bottom: 1.25rem;
        background: linear-gradient(to right, #8750f7 0%, #b57dff 100%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .hero-subtitle {
        font-size: clamp(1.8rem, 3.5vw, 2.2rem);
        line-height: 1.3;
        font-weight: 600;
        color: #0f0715;
        margin-bottom: 1.25rem;
    }

    .dark .hero-subtitle {
        color: #ffffff;
    }

    .hero-paragraph {
        font-size: 0.95rem;
        line-height: 1.7;
        color: #554a65;
        margin-bottom: 2rem;
    }

    .dark .hero-paragraph {
        color: #a098b0;
    }

    .btn-outline {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 14px 36px;
        border: 1px solid #8750f7;
        color: #8750f7;
        border-radius: 9999px;
        font-size: 15px;
        font-weight: 500;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    
    .btn-outline:hover {
        background: #8750f7;
        color: #ffffff;
        box-shadow: 0 4px 15px rgba(135, 80, 247, 0.3);
    }

    .hero-image-wrapper {
        position: relative;
        z-index: 2;
        width: 100%;
    }
    
    .hero-img {
        width: 100%;
        height: auto;
        border-radius: 12px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(135, 80, 247, 0.15);
    }

    .dark .hero-img {
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.05);
    }

    /* Innovation Section */
    .about-innovation {
        padding: 8rem 0;
        background: #000000;
        position: relative;
        overflow: hidden;
    }

    html:not(.dark) .about-innovation {
        background: #f8f6fc;
    }

    .innovate-title {
        font-size: clamp(1.8rem, 3.5vw, 2.75rem);
        line-height: 1.2;
        font-weight: 700;
        margin-bottom: 1.5rem;
        color: #ffffff;
    }

    html:not(.dark) .innovate-title {
        color: #0f0715;
    }

    .text-gradient {
        background: linear-gradient(to right, #b57dff 0%, #8750f7 100%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .innovate-paragraph {
        font-size: 0.95rem;
        line-height: 1.7;
        color: #a098b0;
        margin-bottom: 1.25rem;
    }

    html:not(.dark) .innovate-paragraph {
        color: #554a65;
    }

    .btn-solid {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 14px 36px;
        background: linear-gradient(to right, #8750f7 0%, #3e1e75 100%);
        color: #ffffff;
        border-radius: 9999px;
        font-size: 15px;
        font-weight: 500;
        transition: all 0.3s ease;
        text-decoration: none;
        margin-top: 1rem;
    }
    
    .btn-solid:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(135, 80, 247, 0.4);
    }

    .skew-layout-wrapper {
        position: relative;
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
        padding: 40px 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .skew-main-frame {
        position: relative;
        z-index: 2;
        width: 100%;
        max-width: 380px;
        height: 480px;
        border-radius: 12px;
        overflow: hidden;
        transform: skewX(-18deg); 
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.8);
        background: #0f0715;
    }

    html:not(.dark) .skew-main-frame {
        border: 1px solid rgba(135, 80, 247, 0.2);
        box-shadow: 0 20px 45px rgba(135, 80, 247, 0.15);
        background: #ffffff;
    }

    .skew-inner-img {
        position: absolute;
        top: 0;
        left: 50%;
        width: 160%;
        height: 100%;
        object-fit: cover;
        transform: translateX(-50%);
    }

    .accent-block {
        position: absolute;
        width: 50px;
        height: 80px;
        border-radius: 6px;
        background: linear-gradient(135deg, #a855f7 0%, #4c1d95 100%);
        transform: skewX(-18deg);
        z-index: 1;
    }

    .accent-tl {
        top: 15px;
        left: 20px;
    }
    
    .accent-br {
        bottom: 15px;
        right: 20px;
    }

    /* Vision Section */
    .about-vision {
        padding: 8rem 0;
        background-color: #0f0715;
        position: relative;
        overflow: hidden;
    }

    html:not(.dark) .about-vision {
        background-color: #ffffff;
    }

    .vision-glow {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(113,43,254,0.15) 0%, rgba(15,7,21,0) 70%);
        filter: blur(80px);
        pointer-events: none;
        z-index: 0;
    }

    .vision-title {
        font-size: clamp(1.8rem, 3.5vw, 2.75rem);
        line-height: 1.2;
        font-weight: 700;
        margin-bottom: 1.5rem;
        background: linear-gradient(to right, #712bfe 0%, #e5d9fd 100%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    html:not(.dark) .vision-title {
        background: linear-gradient(to right, #8750f7 0%, #2a1454 100%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .view-more-link {
        color: #8750f7;
        font-size: 16px;
        font-weight: 500;
        text-decoration: underline;
        transition: all 0.3s ease;
        display: inline-block;
        margin-top: 1rem;
    }

    .view-more-link:hover {
        color: #b57dff;
    }

    /* Mission Section */
    .about-mission {
        padding: 8rem 0;
        background-color: #000000;
        position: relative;
        overflow: hidden;
    }

    html:not(.dark) .about-mission {
        background-color: #f8f6fc;
    }

    /* Core Beliefs Section */
    .beliefs-section {
        padding: 8rem 0;
        background-color: #0f0715;
        position: relative;
        overflow: hidden;
    }

    html:not(.dark) .beliefs-section {
        background-color: #f8f6fc;
    }

    .beliefs-heading {
        font-size: clamp(2rem, 4.5vw, 3rem);
        font-weight: 800;
        margin: 0;
        background: linear-gradient(to right, #712bfe 0%, #e5d9fd 100%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    html:not(.dark) .beliefs-heading {
        background: linear-gradient(to right, #8750f7 0%, #2a1454 100%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .belief-card {
        background: rgba(25, 15, 38, 0.4);
        border: 1px solid rgba(140, 87, 247, 0.3);
        border-radius: 1rem;
        padding: 30px;
        width: 100%;
        max-width: 440px;
        transition: all 0.3s ease;
        position: relative;
        z-index: 10;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    html:not(.dark) .belief-card {
        background: #ffffff;
        border: 1px solid rgba(140, 87, 247, 0.2);
        box-shadow: 0 4px 20px rgba(135, 80, 247, 0.08);
    }

    .belief-card-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 0.5rem;
    }

    html:not(.dark) .belief-card-title {
        color: #0f0715;
    }

    .belief-card-text {
        font-size: 0.875rem;
        line-height: 1.625;
        color: #a098b0;
        margin: 0;
    }

    html:not(.dark) .belief-card-text {
        color: #554a65;
    }

    /* Team Section Gradient & Ambient Glow Background - Original Dark Mode */
    .team-section {
        background: radial-gradient(ellipse 100% 60% at 50% 0%, rgba(135, 80, 247, 0.22) 0%, rgba(14, 7, 22, 0.98) 70%), linear-gradient(180deg, #0b0514 0%, #05020a 100%);
    }

    html:not(.dark) .team-section {
        background: radial-gradient(ellipse 100% 60% at 50% 0%, rgba(135, 80, 247, 0.12) 0%, #ffffff 70%), linear-gradient(180deg, #f8f6fc 0%, #ffffff 100%);
    }

    .team-section-bg-glow {
        position: absolute;
        top: 35%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 650px;
        height: 400px;
        background: radial-gradient(circle, rgba(135, 80, 247, 0.25) 0%, rgba(135, 80, 247, 0) 70%);
        filter: blur(90px);
        pointer-events: none;
        z-index: 1;
    }
    .team-section-grid {
        position: absolute;
        inset: 0;
        background-image: radial-gradient(rgba(135, 80, 247, 0.15) 1px, transparent 1px);
        background-size: 28px 28px;
        opacity: 0.6;
        pointer-events: none;
        z-index: 1;
    }
    .team-swiper-container {
        width: 100%;
        max-width: 980px;
        margin: 0 auto;
        position: relative;
        padding: 10px 0;
    }
    .team-swiper-clip {
        width: 100%;
        max-width: 900px;
        margin: 0 auto;
        overflow: hidden !important;
        padding: 5px 0;
        /* Smooth gradient fade blur on side edges */
        -webkit-mask-image: linear-gradient(to right, transparent 0%, rgba(0,0,0,1) 8%, rgba(0,0,0,1) 92%, transparent 100%);
        mask-image: linear-gradient(to right, transparent 0%, rgba(0,0,0,1) 8%, rgba(0,0,0,1) 92%, transparent 100%);
    }
    .team-swiper {
        width: 100%;
        padding: 30px 0 50px 0 !important;
        overflow: visible !important;
    }
    .team-swiper .swiper-slide {
        width: 260px !important;
        opacity: 0.55; /* Dim inactive left/right slides */
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        justify-content: center;
        will-change: transform, opacity; /* GPU acceleration */
    }
    @media (min-width: 640px) {
        .team-swiper .swiper-slide {
            width: 310px !important;
        }
    }
    .team-swiper .swiper-slide-active {
        opacity: 1 !important;
        z-index: 10;
    }
    .team-card {
        background: #a77bf3;
        border: 1px solid rgba(135, 80, 247, 0.25);
        border-radius: 20px;
        overflow: hidden;
        position: relative;
        width: 100%;
        height: 430px;
        transition: all 0.5s ease;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
    }
    .team-card-info {
        background: linear-gradient(to top, rgba(14, 7, 22, 0.96) 0%, rgba(14, 7, 22, 0.88) 75%, rgba(14, 7, 22, 0.5) 100%);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-top: 1px solid rgba(135, 80, 247, 0.3);
        transform: translateY(100%);
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        padding: 18px 20px !important;
    }
    .team-swiper .swiper-slide-active .team-card:hover .team-card-info {
        transform: translateY(0);
    }
    .team-card img {
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        object-fit: cover;
        object-position: top center;
    }
    .team-swiper .swiper-slide-active .team-card:hover img {
        transform: translateY(-45px) scale(1.04);
    }
    .team-swiper .swiper-slide-active .team-card {
        border-color: #8750f7;
        box-shadow: 0 15px 40px rgba(135, 80, 247, 0.4);
    }
    /* Pagination styling */
    .team-swiper .swiper-pagination-bullet {
        background: rgba(255, 255, 255, 0.3) !important;
        opacity: 1 !important;
        width: 9px !important;
        height: 9px !important;
        margin: 0 5px !important;
        transition: all 0.3s ease !important;
    }
    .team-swiper .swiper-pagination-bullet-active {
        background: #8750f7 !important;
        width: 11px !important;
        height: 11px !important;
    }
    /* Focus visible indicator for accessibility */
    .swiper-prev-btn:focus-visible,
    .swiper-next-btn:focus-visible {
        outline: 2px solid #8750f7 !important;
        outline-offset: 4px;
    }

    /* Stats Section */
    .about-stats-section {
        padding: 2rem 0;
        background-color: #09050e;
        border-top: 1px solid rgba(140, 87, 247, 0.1);
        border-bottom: 1px solid rgba(140, 87, 247, 0.1);
    }

    html:not(.dark) .about-stats-section {
        background-color: #ffffff;
        border-top: 1px solid rgba(140, 87, 247, 0.15);
        border-bottom: 1px solid rgba(140, 87, 247, 0.15);
    }

    .stats-number {
        font-weight: 800;
        color: #ffffff;
        line-height: 1;
    }

    html:not(.dark) .stats-number {
        color: #8750f7;
    }

    .stats-label {
        font-weight: 700;
        color: #ffffff;
        line-height: 1.2;
    }

    html:not(.dark) .stats-label {
        color: #0f0715;
    }

    /* Why Choose Us Section */
    .why-choose-section {
        padding: 6rem 0;
        background-color: #0f0715;
        position: relative;
        overflow: hidden;
    }

    html:not(.dark) .why-choose-section {
        background-color: #f8f6fc;
    }

    .why-choose-title {
        font-size: clamp(2.2rem, 5vw, 3rem);
        font-weight: 800;
        color: #ffffff;
        margin: 0;
    }

    html:not(.dark) .why-choose-title {
        color: #0f0715;
    }

    .why-choose-card {
        background: #0f0715;
        border: 1px solid rgba(140, 87, 247, 0.2);
        border-radius: 1rem;
        padding: 2rem;
        display: flex;
        flex-direction: column;
        gap: 1rem;
        align-items: flex-start;
        transition: all 0.3s ease;
    }

    html:not(.dark) .why-choose-card {
        background: #ffffff;
        border: 1px solid rgba(140, 87, 247, 0.2);
        box-shadow: 0 4px 20px rgba(135, 80, 247, 0.06);
    }

    .why-choose-card-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #ffffff;
        margin: 0;
    }

    html:not(.dark) .why-choose-card-title {
        color: #0f0715;
    }

    .why-choose-card-text {
        font-size: 0.875rem;
        line-height: 1.625;
        color: #a098b0;
        margin: 0;
    }

    html:not(.dark) .why-choose-card-text {
        color: #554a65;
    }

    @media (max-width: 767px) {
        .skew-layout-wrapper {
            padding: 20px 25px;
            max-width: 100%;
        }
        .skew-main-frame {
            max-width: 270px;
            height: 330px;
        }
        .accent-block {
            width: 35px;
            height: 60px;
        }
        .accent-tl {
            top: 5px;
            left: 10px;
        }
        .accent-br {
            bottom: 5px;
            right: 10px;
        }
    }
</style>
@endpush

@section('content')
<div class="main-wrapper about-page">
    {{-- Hero Section --}}
    <section class="about-hero">
        <div class="hero-glow-right"></div>
        <div class="container">
            <div class="tw-flex tw-flex-col md:tw-flex-row tw-items-center tw-justify-between tw-gap-12 lg:tw-gap-20">
                <div class="about-text-content tw-w-full md:tw-w-[48%] lg:tw-w-[540px] wow fadeInUp" data-wow-delay=".3s">
                    <h1 class="hero-title">About Us</h1>
                    <h2 class="hero-subtitle">Helping Businesses and Learners Grow — Together</h2>
                    <p class="hero-paragraph">
                        Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                    </p>
                    <a href="#learn-more" class="btn-outline">Learn More</a>
                </div>
                <div class="hero-image-wrapper tw-w-full md:tw-w-[48%] lg:tw-w-[680px] wow fadeInUp" data-wow-delay=".5s">
                    <div class="hero-glow-center"></div>
                    <img src="{{ public_asset('assets/img/about/about_hero.jpg') }}" alt="ExlonTech Team" class="hero-img" />
                </div>
            </div>
        </div>
    </section>

    {{-- Innovation Section --}}
    <section class="about-innovation">
        <div class="container">
            <div class="tw-flex tw-flex-col md:tw-flex-row tw-items-center tw-justify-between tw-gap-12 lg:tw-gap-16">
                <div class="about-text-content tw-w-full md:tw-w-[48%] lg:tw-w-[510px] wow fadeInUp" data-wow-delay=".3s">
                    <h2 class="innovate-title">
                        <span class="text-gradient">Drive Unstoppable</span> Business Success <span class="text-gradient">with Digital Innovation</span>
                    </h2>
                    <p class="innovate-paragraph">
                        Maximize your business potential with our customer-focused, growth-driven digital solutions. Our passionate team of developers, designers, and strategists is committed to delivering tailored services that exceed expectations.
                    </p>
                    <p class="innovate-paragraph">
                        We specialize in web development, mobile apps, UI/UX design, digital marketing, branding, and more — all crafted to help you scale, streamline operations, and stand out in a competitive market. Partner with us to build smarter, grow faster, and stay ahead — your vision, our execution.
                    </p>
                    <a href="#consultation" class="btn-solid">Get a Free Consultation</a>
                </div>
                <div class="tw-w-full md:tw-w-[48%] lg:tw-w-[500px] tw-flex tw-justify-center wow fadeInUp" data-wow-delay=".5s">
                    <div class="skew-layout-wrapper">
                        <div class="accent-block accent-tl"></div>
                        <div class="skew-main-frame">
                            <img src="{{ public_asset('assets/img/about/handshake.jpg') }}" alt="Robot and Human Handshake" class="skew-inner-img" />
                        </div>
                        <div class="accent-block accent-br"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Vision Section --}}
    <section class="about-vision">
        <div class="vision-glow"></div>
        <div class="container">
            <div class="tw-flex tw-flex-col md:tw-flex-row tw-items-center tw-justify-between tw-gap-12 lg:tw-gap-16">
                <div class="tw-w-full md:tw-w-[48%] lg:tw-w-[500px] tw-flex tw-justify-center tw-order-2 md:tw-order-1 wow fadeInUp" data-wow-delay=".5s">
                    <div class="skew-layout-wrapper">
                        <div class="accent-block accent-tl"></div>
                        <div class="skew-main-frame">
                            <img src="{{ public_asset('assets/img/about/vision.png') }}" alt="Our Vision" class="skew-inner-img" />
                        </div>
                        <div class="accent-block accent-br"></div>
                    </div>
                </div>
                <div class="about-text-content tw-w-full md:tw-w-[48%] lg:tw-w-[510px] tw-order-1 md:tw-order-2 wow fadeInUp" data-wow-delay=".3s">
                    <h2 class="vision-title">Our Vision</h2>
                    <p class="innovate-paragraph">
                        At the heart of our agency lies a powerful vision:<br>To bridge the gap between skill and opportunity by delivering world-class digital solutions to businesses and career-building education to students.
                    </p>
                    <p class="innovate-paragraph">
                        We believe that innovation should be accessible, learning should be practical, and digital success should be within reach for everyone — whether you're scaling a company or launching your career.
                    </p>
                    <p class="innovate-paragraph">
                        Our goal is simple:<br>To be the go-to platform where businesses thrive and individuals transform through technology, creativity, and continuous learning.
                    </p>
                    <a href="#vision-more" class="view-more-link">View More</a>
                </div>
            </div>
        </div>
    </section>

    {{-- Mission Section --}}
    <section class="about-mission">
        <div class="container">
            <div class="tw-flex tw-flex-col md:tw-flex-row tw-items-center tw-justify-between tw-gap-12 lg:tw-gap-16">
                <div class="about-text-content tw-w-full md:tw-w-[48%] lg:tw-w-[510px] wow fadeInUp" data-wow-delay=".3s">
                    <h2 class="vision-title">Our Mission</h2>
                    <p class="innovate-paragraph">
                        Our mission is to deliver powerful, practical, and people-first digital solutions that help businesses grow and students thrive.
                    </p>
                    <p class="innovate-paragraph">
                        Whether we're building websites, launching campaigns, or designing career-focused courses, our purpose stays the same — to create impact through excellence, innovation, and integrity.
                    </p>
                    <p class="innovate-paragraph">
                        We're here to simplify technology, personalize learning, and support every client and learner on their journey to success.
                    </p>
                    <a href="#mission-more" class="view-more-link">View More</a>
                </div>
                <div class="tw-w-full md:tw-w-[48%] lg:tw-w-[500px] tw-flex tw-justify-center wow fadeInUp" data-wow-delay=".5s">
                    <div class="skew-layout-wrapper">
                        <div class="accent-block accent-tl"></div>
                        <div class="skew-main-frame">
                            <img src="{{ public_asset('assets/img/about/mission.jpg') }}" alt="Our Mission" class="skew-inner-img" />
                        </div>
                        <div class="accent-block accent-br"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Core Beliefs Section --}}
    <section class="beliefs-section">
        <div class="tw-absolute tw-top-[10%] tw-left-[-10%] tw-w-[500px] tw-h-[500px] tw-rounded-full tw-bg-[radial-gradient(circle,rgba(140,87,247,0.15)_0%,rgba(15,7,21,0)_70%)] tw-filter tw-blur-[80px] tw-pointer-events-none tw-z-0"></div>
        <div class="tw-absolute tw-top-[40%] tw-right-[-15%] tw-w-[600px] tw-h-[600px] tw-rounded-full tw-bg-[radial-gradient(circle,rgba(113,43,254,0.12)_0%,rgba(15,7,21,0)_70%)] tw-filter tw-blur-[80px] tw-pointer-events-none tw-z-0"></div>
        <div class="tw-absolute tw-bottom-[10%] tw-left-[-10%] tw-w-[500px] tw-h-[500px] tw-rounded-full tw-bg-[radial-gradient(circle,rgba(135,80,247,0.15)_0%,rgba(15,7,21,0)_70%)] tw-filter tw-blur-[80px] tw-pointer-events-none tw-z-0"></div>
        
        <div class="container">
            <div class="tw-text-center tw-mb-16 tw-relative tw-z-10 wow fadeInUp" data-wow-delay=".2s">
                <span class="tw-text-lg tw-font-semibold tw-text-[#8750f7] tw-block tw-mb-2">Core Principles</span>
                <h2 class="beliefs-heading">The Three Exlon Tech Beliefs</h2>
            </div>
            
            <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 tw-gap-y-16 md:tw-gap-y-[60px] tw-gap-x-12 lg:tw-gap-x-20 tw-items-center tw-justify-items-center tw-w-full tw-mx-auto">
                
                <div class="belief-card tw-mx-auto md:tw-mr-auto md:tw-ml-0 tw-order-1 md:tw-col-start-1 md:tw-row-start-1 wow fadeInUp" data-wow-delay=".3s">
                    <div class="tw-w-11 tw-h-11 tw-rounded-lg tw-bg-[#8750f7]/15 tw-flex tw-items-center tw-justify-center tw-text-[#8750f7] tw-mb-5 tw-flex-shrink-0">
                        <svg class="tw-w-6 tw-h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 5.5a2.5 2.5 0 0 0-4.75-.95L7 5l-.25-.45a2.5 2.5 0 0 0-4.75.95c0 2.22 3 4.5 5 6.5 2-2 5-4.28 5-6.5z" />
                            <path d="M2 18h12a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H9L6 13H2" />
                        </svg>
                    </div>
                    <h3 class="belief-card-title">People First</h3>
                    <p class="belief-card-text">We build with empathy — for our clients, learners, and team. Every solution starts with understanding real needs.</p>
                </div>

                <div class="tw-w-full tw-max-w-[320px] md:tw-max-w-[350px] tw-flex tw-justify-center md:tw-justify-end tw-mx-auto md:tw-ml-auto md:tw-mr-0 tw-order-2 md:tw-col-start-2 md:tw-row-start-1 wow fadeInUp" data-wow-delay=".4s">
                    <img src="{{ public_asset('assets/img/about/circle_images.png') }}" alt="Core Beliefs Circular Avatars" class="tw-w-full tw-h-auto tw-block" />
                </div>

                <div class="belief-card tw-mx-auto md:tw-ml-auto md:tw-mr-0 tw-order-3 md:tw-col-start-2 md:tw-row-start-2 wow fadeInUp" data-wow-delay=".3s">
                    <div class="tw-w-11 tw-h-11 tw-rounded-lg tw-bg-[#8750f7]/15 tw-flex tw-items-center tw-justify-center tw-text-[#8750f7] tw-mb-5 tw-flex-shrink-0">
                        <svg class="tw-w-6 tw-h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88"/>
                        </svg>
                    </div>
                    <h3 class="belief-card-title">Purpose-Driven Tasks</h3>
                    <p class="belief-card-text">Every project, course, and campaign is crafted with clarity, impact, and long-term value in mind — not just trends.</p>
                </div>

                <div class="tw-w-full tw-max-w-[250px] md:tw-max-w-[280px] tw-flex tw-justify-center md:tw-justify-start tw-mx-auto md:tw-mr-auto md:tw-ml-0 tw-order-4 md:tw-col-start-1 md:tw-row-start-2 wow fadeInUp" data-wow-delay=".4s">
                    <img src="{{ public_asset('assets/img/about/center-vector.png') }}" alt="Beliefs Loop Vector" class="tw-w-full tw-h-auto tw-block" />
                </div>

                <div class="belief-card tw-mx-auto md:tw-mr-auto md:tw-ml-0 tw-order-5 md:tw-col-start-1 md:tw-row-start-3 wow fadeInUp" data-wow-delay=".3s">
                    <div class="tw-w-11 tw-h-11 tw-rounded-lg tw-bg-[#8750f7]/15 tw-flex tw-items-center tw-justify-center tw-text-[#8750f7] tw-mb-5 tw-flex-shrink-0">
                        <svg class="tw-w-6 tw-h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"/>
                        </svg>
                    </div>
                    <h3 class="belief-card-title">Collaboration Wins</h3>
                    <p class="belief-card-text">We believe the best results come from shared ideas and open minds — we work with you, not just for you.</p>
                </div>

                <div class="tw-w-full tw-max-w-[320px] md:tw-max-w-[350px] tw-flex tw-justify-center md:tw-justify-end tw-mx-auto md:tw-ml-auto md:tw-mr-0 tw-order-6 md:tw-col-start-2 md:tw-row-start-3 wow fadeInUp" data-wow-delay=".4s">
                    <img src="{{ public_asset('assets/img/about/loop_image.png') }}" alt="Connection Vector and Avatars" class="tw-w-full tw-h-auto tw-block" />
                </div>

            </div>
        </div>
    </section>

    {{-- Team Section --}}
    <section class="team-section tw-py-24 sm:tw-py-32 tw-relative tw-overflow-hidden tw-w-full">
        <!-- Glowing Orbs & Tech Grid Overlay -->
        <div class="team-section-bg-glow"></div>
        <div class="team-section-grid"></div>

        <div class="tw-w-full tw-px-2 sm:tw-px-4 lg:tw-px-6 tw-relative tw-z-10">
            <div class="tw-text-center tw-mb-16 tw-relative tw-z-10 wow fadeInUp" data-wow-delay=".2s">
                <span class="tw-inline-flex tw-items-center tw-gap-2 tw-px-4 tw-py-1.5 tw-rounded-full tw-bg-[#8750f7]/10 tw-border tw-border-[#8750f7]/30 tw-text-[#8750f7] dark:tw-text-[#a77bf3] tw-text-sm tw-font-semibold tw-tracking-wide tw-mb-3 tw-shadow-[0_0_20px_rgba(135,80,247,0.2)]">
                    <i class="fa-solid fa-sparkles tw-text-xs"></i> 100% Skilled Staff
                </span>
                <h2 class="tw-text-[clamp(2.2rem,5vw,3.2rem)] tw-font-extrabold tw-m-0 tw-bg-gradient-to-r tw-from-[#0f0715] tw-via-[#5527a6] tw-to-[#8750f7] dark:tw-from-white dark:tw-via-[#d4bbfd] dark:tw-to-[#8750f7] tw-bg-clip-text tw-text-transparent tw-drop-shadow-sm">
                    Meet Our Team
                </h2>
            </div>
            <div class="team-swiper-container tw-relative tw-w-full">
                <!-- Navigation Buttons -->
                <button class="swiper-prev-btn tw-absolute tw-left-0 sm:tw-left-[-10px] tw-top-1/2 tw--translate-y-1/2 tw-z-20 tw-w-11 tw-h-11 tw-rounded-full tw-bg-[#8750f7]/10 dark:tw-bg-white/10 tw-border tw-border-[#8750f7]/30 dark:tw-border-white/20 tw-text-[#8750f7] dark:tw-text-white tw-flex tw-items-center tw-justify-center hover:tw-bg-[#8750f7] hover:tw-text-white dark:hover:tw-bg-white/20 hover:tw-scale-110 tw-transition-all tw-duration-300 tw-shadow-lg focus:tw-outline-none" aria-label="Previous slide">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button class="swiper-next-btn tw-absolute tw-right-0 sm:tw-right-[-10px] tw-top-1/2 tw--translate-y-1/2 tw-z-20 tw-w-11 tw-h-11 tw-rounded-full tw-bg-[#8750f7]/10 dark:tw-bg-white/10 tw-border tw-border-[#8750f7]/30 dark:tw-border-white/20 tw-text-[#8750f7] dark:tw-text-white tw-flex tw-items-center tw-justify-center hover:tw-bg-[#8750f7] hover:tw-text-white dark:hover:tw-bg-white/20 hover:tw-scale-110 tw-transition-all tw-duration-300 tw-shadow-lg focus:tw-outline-none" aria-label="Next slide">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>

                <div class="team-swiper-clip">
                    <div class="swiper team-swiper">
                    <div class="swiper-wrapper">
                        <!-- Slide 1 -->
                        <div class="swiper-slide">
                            <div class="team-card tw-w-full">
                                <img src="{{ public_asset('assets/img/team/12.png') }}" alt="M Umar Habib" class="tw-w-full tw-h-full tw-object-cover tw-object-top" />
                                <div class="team-card-info tw-absolute tw-bottom-0 tw-left-0 tw-right-0 tw-w-full tw-p-6 tw-text-center">
                                    <h3 class="tw-text-xl tw-font-bold tw-text-white tw-mb-1">M Umar Habib</h3>
                                    <span class="tw-text-sm tw-font-medium tw-text-[#8750f7] tw-mb-2 tw-block">Founder & CEO</span>
                                    <p class="tw-text-[13px] sm:tw-text-[14px] tw-leading-relaxed tw-text-white/80 tw-m-0">Visionary leader steering ExlonTech towards digital excellence and innovation.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="swiper-slide">
                            <div class="team-card tw-w-full">
                                <img src="{{ public_asset('assets/img/team/13.png') }}" alt="Nouman Afzal" class="tw-w-full tw-h-full tw-object-cover tw-object-top" />
                                <div class="team-card-info tw-absolute tw-bottom-0 tw-left-0 tw-right-0 tw-w-full tw-p-6 tw-text-center">
                                    <h3 class="tw-text-xl tw-font-bold tw-text-white tw-mb-1">Nouman Afzal</h3>
                                    <span class="tw-text-sm tw-font-medium tw-text-[#8750f7] tw-mb-2 tw-block">Team Lead MERN</span>
                                    <p class="tw-text-[13px] sm:tw-text-[14px] tw-leading-relaxed tw-text-white/80 tw-m-0">Expert developer leading engineering teams to build robust web applications.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 3 -->
                        <div class="swiper-slide">
                            <div class="team-card tw-w-full">
                                <img src="{{ public_asset('assets/img/team/14.png') }}" alt="Saad Ullah" class="tw-w-full tw-h-full tw-object-cover tw-object-top" />
                                <div class="team-card-info tw-absolute tw-bottom-0 tw-left-0 tw-right-0 tw-w-full tw-p-6 tw-text-center">
                                    <h3 class="tw-text-xl tw-font-bold tw-text-white tw-mb-1">Saad Ullah</h3>
                                    <span class="tw-text-sm tw-font-medium tw-text-[#8750f7] tw-mb-2 tw-block">Team Lead Laravel</span>
                                    <p class="tw-text-[13px] sm:tw-text-[14px] tw-leading-relaxed tw-text-white/80 tw-m-0">Senior backend engineer specialized in high-performance Laravel systems.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 4 -->
                        <div class="swiper-slide">
                            <div class="team-card tw-w-full">
                                <img src="{{ public_asset('assets/img/team/1.png') }}" alt="Mubashir Ijaz" class="tw-w-full tw-h-full tw-object-cover tw-object-top" />
                                <div class="team-card-info tw-absolute tw-bottom-0 tw-left-0 tw-right-0 tw-w-full tw-p-6 tw-text-center">
                                    <h3 class="tw-text-xl tw-font-bold tw-text-white tw-mb-1">Mubashir Ijaz</h3>
                                    <span class="tw-text-sm tw-font-medium tw-text-[#8750f7] tw-mb-2 tw-block">MERN Stack Developer</span>
                                    <p class="tw-text-[13px] sm:tw-text-[14px] tw-leading-relaxed tw-text-white/80 tw-m-0">Passionate full-stack developer crafting robust frontend and backend solutions.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 5 -->
                        <div class="swiper-slide">
                            <div class="team-card tw-w-full">
                                <img src="{{ public_asset('assets/img/team/2.png') }}" alt="Tasbeeha Khan" class="tw-w-full tw-h-full tw-object-cover tw-object-top" />
                                <div class="team-card-info tw-absolute tw-bottom-0 tw-left-0 tw-right-0 tw-w-full tw-p-6 tw-text-center">
                                    <h3 class="tw-text-xl tw-font-bold tw-text-white tw-mb-1">Tasbeeha Khan</h3>
                                    <span class="tw-text-sm tw-font-medium tw-text-[#8750f7] tw-mb-2 tw-block">UX/UI Designer</span>
                                    <p class="tw-text-[13px] sm:tw-text-[14px] tw-leading-relaxed tw-text-white/80 tw-m-0">Creative designer building visually stunning and user-friendly user experiences.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Duplicate Set 2 for Seamless Infinite Loop -->
                        <!-- Slide 6 -->
                        <div class="swiper-slide">
                            <div class="team-card tw-w-full">
                                <img src="{{ public_asset('assets/img/team/12.png') }}" alt="M Umar Habib" class="tw-w-full tw-h-full tw-object-cover tw-object-top" />
                                <div class="team-card-info tw-absolute tw-bottom-0 tw-left-0 tw-right-0 tw-w-full tw-p-6 tw-text-center">
                                    <h3 class="tw-text-xl tw-font-bold tw-text-white tw-mb-1">M Umar Habib</h3>
                                    <span class="tw-text-sm tw-font-medium tw-text-[#8750f7] tw-mb-2 tw-block">Founder & CEO</span>
                                    <p class="tw-text-[13px] sm:tw-text-[14px] tw-leading-relaxed tw-text-white/80 tw-m-0">Visionary leader steering ExlonTech towards digital excellence and innovation.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 7 -->
                        <div class="swiper-slide">
                            <div class="team-card tw-w-full">
                                <img src="{{ public_asset('assets/img/team/13.png') }}" alt="Nouman Afzal" class="tw-w-full tw-h-full tw-object-cover tw-object-top" />
                                <div class="team-card-info tw-absolute tw-bottom-0 tw-left-0 tw-right-0 tw-w-full tw-p-6 tw-text-center">
                                    <h3 class="tw-text-xl tw-font-bold tw-text-white tw-mb-1">Nouman Afzal</h3>
                                    <span class="tw-text-sm tw-font-medium tw-text-[#8750f7] tw-mb-2 tw-block">Team Lead MERN</span>
                                    <p class="tw-text-[13px] sm:tw-text-[14px] tw-leading-relaxed tw-text-white/80 tw-m-0">Expert developer leading engineering teams to build robust web applications.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 8 -->
                        <div class="swiper-slide">
                            <div class="team-card tw-w-full">
                                <img src="{{ public_asset('assets/img/team/14.png') }}" alt="Saad Ullah" class="tw-w-full tw-h-full tw-object-cover tw-object-top" />
                                <div class="team-card-info tw-absolute tw-bottom-0 tw-left-0 tw-right-0 tw-w-full tw-p-6 tw-text-center">
                                    <h3 class="tw-text-xl tw-font-bold tw-text-white tw-mb-1">Saad Ullah</h3>
                                    <span class="tw-text-sm tw-font-medium tw-text-[#8750f7] tw-mb-2 tw-block">Team Lead Laravel</span>
                                    <p class="tw-text-[13px] sm:tw-text-[14px] tw-leading-relaxed tw-text-white/80 tw-m-0">Senior backend engineer specialized in high-performance Laravel systems.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 9 -->
                        <div class="swiper-slide">
                            <div class="team-card tw-w-full">
                                <img src="{{ public_asset('assets/img/team/1.png') }}" alt="Mubashir Ijaz" class="tw-w-full tw-h-full tw-object-cover tw-object-top" />
                                <div class="team-card-info tw-absolute tw-bottom-0 tw-left-0 tw-right-0 tw-w-full tw-p-6 tw-text-center">
                                    <h3 class="tw-text-xl tw-font-bold tw-text-white tw-mb-1">Mubashir Ijaz</h3>
                                    <span class="tw-text-sm tw-font-medium tw-text-[#8750f7] tw-mb-2 tw-block">MERN Stack Developer</span>
                                    <p class="tw-text-[13px] sm:tw-text-[14px] tw-leading-relaxed tw-text-white/80 tw-m-0">Passionate full-stack developer crafting robust frontend and backend solutions.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 10 -->
                        <div class="swiper-slide">
                            <div class="team-card tw-w-full">
                                <img src="{{ public_asset('assets/img/team/2.png') }}" alt="Tasbeeha Khan" class="tw-w-full tw-h-full tw-object-cover tw-object-top" />
                                <div class="team-card-info tw-absolute tw-bottom-0 tw-left-0 tw-right-0 tw-w-full tw-p-6 tw-text-center">
                                    <h3 class="tw-text-xl tw-font-bold tw-text-white tw-mb-1">Tasbeeha Khan</h3>
                                    <span class="tw-text-sm tw-font-medium tw-text-[#8750f7] tw-mb-2 tw-block">UX/UI Designer</span>
                                    <p class="tw-text-[13px] sm:tw-text-[14px] tw-leading-relaxed tw-text-white/80 tw-m-0">Creative designer building visually stunning and user-friendly user experiences.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Duplicate Set 3 for Symmetrical Both Sides -->
                        <!-- Slide 11 -->
                        <div class="swiper-slide">
                            <div class="team-card tw-w-full">
                                <img src="{{ public_asset('assets/img/team/12.png') }}" alt="M Umar Habib" class="tw-w-full tw-h-full tw-object-cover tw-object-top" />
                                <div class="team-card-info tw-absolute tw-bottom-0 tw-left-0 tw-right-0 tw-w-full tw-p-6 tw-text-center">
                                    <h3 class="tw-text-xl tw-font-bold tw-text-white tw-mb-1">M Umar Habib</h3>
                                    <span class="tw-text-sm tw-font-medium tw-text-[#8750f7] tw-mb-2 tw-block">Founder & CEO</span>
                                    <p class="tw-text-[13px] sm:tw-text-[14px] tw-leading-relaxed tw-text-white/80 tw-m-0">Visionary leader steering ExlonTech towards digital excellence and innovation.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 12 -->
                        <div class="swiper-slide">
                            <div class="team-card tw-w-full">
                                <img src="{{ public_asset('assets/img/team/13.png') }}" alt="Nouman Afzal" class="tw-w-full tw-h-full tw-object-cover tw-object-top" />
                                <div class="team-card-info tw-absolute tw-bottom-0 tw-left-0 tw-right-0 tw-w-full tw-p-6 tw-text-center">
                                    <h3 class="tw-text-xl tw-font-bold tw-text-white tw-mb-1">Nouman Afzal</h3>
                                    <span class="tw-text-sm tw-font-medium tw-text-[#8750f7] tw-mb-2 tw-block">Team Lead MERN</span>
                                    <p class="tw-text-[13px] sm:tw-text-[14px] tw-leading-relaxed tw-text-white/80 tw-m-0">Expert developer leading engineering teams to build robust web applications.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 13 -->
                        <div class="swiper-slide">
                            <div class="team-card tw-w-full">
                                <img src="{{ public_asset('assets/img/team/14.png') }}" alt="Saad Ullah" class="tw-w-full tw-h-full tw-object-cover tw-object-top" />
                                <div class="team-card-info tw-absolute tw-bottom-0 tw-left-0 tw-right-0 tw-w-full tw-p-6 tw-text-center">
                                    <h3 class="tw-text-xl tw-font-bold tw-text-white tw-mb-1">Saad Ullah</h3>
                                    <span class="tw-text-sm tw-font-medium tw-text-[#8750f7] tw-mb-2 tw-block">Team Lead Laravel</span>
                                    <p class="tw-text-[13px] sm:tw-text-[14px] tw-leading-relaxed tw-text-white/80 tw-m-0">Senior backend engineer specialized in high-performance Laravel systems.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 14 -->
                        <div class="swiper-slide">
                            <div class="team-card tw-w-full">
                                <img src="{{ public_asset('assets/img/team/1.png') }}" alt="Mubashir Ijaz" class="tw-w-full tw-h-full tw-object-cover tw-object-top" />
                                <div class="team-card-info tw-absolute tw-bottom-0 tw-left-0 tw-right-0 tw-w-full tw-p-6 tw-text-center">
                                    <h3 class="tw-text-xl tw-font-bold tw-text-white tw-mb-1">Mubashir Ijaz</h3>
                                    <span class="tw-text-sm tw-font-medium tw-text-[#8750f7] tw-mb-2 tw-block">MERN Stack Developer</span>
                                    <p class="tw-text-[13px] sm:tw-text-[14px] tw-leading-relaxed tw-text-white/80 tw-m-0">Passionate full-stack developer crafting robust frontend and backend solutions.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 15 -->
                        <div class="swiper-slide">
                            <div class="team-card tw-w-full">
                                <img src="{{ public_asset('assets/img/team/2.png') }}" alt="Tasbeeha Khan" class="tw-w-full tw-h-full tw-object-cover tw-object-top" />
                                <div class="team-card-info tw-absolute tw-bottom-0 tw-left-0 tw-right-0 tw-w-full tw-p-6 tw-text-center">
                                    <h3 class="tw-text-xl tw-font-bold tw-text-white tw-mb-1">Tasbeeha Khan</h3>
                                    <span class="tw-text-sm tw-font-medium tw-text-[#8750f7] tw-mb-2 tw-block">UX/UI Designer</span>
                                    <p class="tw-text-[13px] sm:tw-text-[14px] tw-leading-relaxed tw-text-white/80 tw-m-0">Creative designer building visually stunning and user-friendly user experiences.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Stats Counter Section --}}
    <section class="about-stats-section">
        <div class="container">
            <div class="tw-grid tw-grid-cols-3 sm:tw-grid-cols-4 tw-gap-x-2 sm:tw-gap-8 tw-justify-items-center tw-items-center">
                <div class="tw-flex tw-items-center tw-gap-1.5 sm:tw-gap-3 tw-justify-center wow fadeInUp" data-wow-delay=".1s">
                    <span class="stats-number tw-text-xl sm:tw-text-4xl lg:tw-text-5xl">10</span>
                    <div class="stats-label tw-text-[9px] sm:tw-text-xs lg:tw-text-sm">Team<br>Members</div>
                </div>
                <div class="tw-flex tw-items-center tw-gap-1.5 sm:tw-gap-3 tw-justify-center wow fadeInUp" data-wow-delay=".2s">
                    <span class="stats-number tw-text-xl sm:tw-text-4xl lg:tw-text-5xl">50+</span>
                    <div class="stats-label tw-text-[9px] sm:tw-text-xs lg:tw-text-sm">Projects<br>Completed</div>
                </div>
                <div class="tw-hidden sm:tw-flex tw-items-center tw-gap-3 tw-justify-center wow fadeInUp" data-wow-delay=".3s">
                    <span class="stats-number tw-text-4xl lg:tw-text-5xl">50</span>
                    <div class="stats-label tw-text-xs lg:tw-text-sm">Happy<br>Clients</div>
                </div>
                <div class="tw-flex tw-items-center tw-gap-1.5 sm:tw-gap-3 tw-justify-center wow fadeInUp" data-wow-delay=".4s">
                    <span class="stats-number tw-text-xl sm:tw-text-4xl lg:tw-text-5xl">5</span>
                    <div class="stats-label tw-text-[9px] sm:tw-text-xs lg:tw-text-sm">Years of<br>Experience</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Why Choose Us Section --}}
    <section class="why-choose-section">
        <div class="tw-absolute tw-top-[30%] tw-left-[-15%] tw-w-[500px] tw-h-[500px] tw-rounded-full tw-bg-[radial-gradient(circle,rgba(140,87,247,0.1)_0%,rgba(15,7,21,0)_70%)] tw-filter tw-blur-[80px] tw-pointer-events-none tw-z-0"></div>
        <div class="tw-absolute tw-bottom-[30%] tw-right-[-15%] tw-w-[500px] tw-h-[500px] tw-rounded-full tw-bg-[radial-gradient(circle,rgba(113,43,254,0.08)_0%,rgba(15,7,21,0)_70%)] tw-filter tw-blur-[80px] tw-pointer-events-none tw-z-0"></div>

        <div class="container">
            <div class="tw-text-center tw-mb-16 tw-relative tw-z-10 wow fadeInUp" data-wow-delay=".2s">
                <h2 class="why-choose-title">Why Choose Us?</h2>
            </div>

            <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-2 tw-gap-8 tw-relative tw-z-10 tw-w-full tw-mx-auto">
                <div class="why-choose-card hover:tw-border-[#8c57f7]/50 hover:tw--translate-y-1.5 wow fadeInUp" data-wow-delay=".1s">
                    <div class="tw-w-9 tw-h-9 tw-rounded-lg tw-bg-[#8750f7]/15 tw-border tw-border-[#8c57f7]/30 tw-flex tw-items-center tw-justify-center tw-text-[#8750f7] tw-text-sm tw-flex-shrink-0 tw-mb-1">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3 class="why-choose-card-title">Proven Track Record of Excellence</h3>
                    <p class="why-choose-card-text">Our dedicated team consistently goes the extra mile to exceed expectations and ensure complete client satisfaction.</p>
                </div>

                <div class="why-choose-card hover:tw-border-[#8c57f7]/50 hover:tw--translate-y-1.5 wow fadeInUp" data-wow-delay=".2s">
                    <div class="tw-w-9 tw-h-9 tw-rounded-lg tw-bg-[#8750f7]/15 tw-border tw-border-[#8c57f7]/30 tw-flex tw-items-center tw-justify-center tw-text-[#8750f7] tw-text-sm tw-flex-shrink-0 tw-mb-1">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3 class="why-choose-card-title">Global Presence</h3>
                    <p class="why-choose-card-text">Our international footprint allows us to deliver digital excellence with the agility and responsiveness needed to support organizations in today's dynamic global market.</p>
                </div>

                <div class="why-choose-card hover:tw-border-[#8c57f7]/50 hover:tw--translate-y-1.5 wow fadeInUp" data-wow-delay=".3s">
                    <div class="tw-w-9 tw-h-9 tw-rounded-lg tw-bg-[#8750f7]/15 tw-border tw-border-[#8c57f7]/30 tw-flex tw-items-center tw-justify-center tw-text-[#8750f7] tw-text-sm tw-flex-shrink-0 tw-mb-1">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3 class="why-choose-card-title">Industry Specific Expertise</h3>
                    <p class="why-choose-card-text">With deep knowledge of your industry's unique standards and requirements, we deliver exceptional results with efficiency and precision.</p>
                </div>

                <div class="why-choose-card hover:tw-border-[#8c57f7]/50 hover:tw--translate-y-1.5 wow fadeInUp" data-wow-delay=".4s">
                    <div class="tw-w-9 tw-h-9 tw-rounded-lg tw-bg-[#8750f7]/15 tw-border tw-border-[#8c57f7]/30 tw-flex tw-items-center tw-justify-center tw-text-[#8750f7] tw-text-sm tw-flex-shrink-0 tw-mb-1">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3 class="why-choose-card-title">On-Time Delivery</h3>
                    <p class="why-choose-card-text">We are committed to delivering the promised solutions within the agreed timeframe, without compromising on quality or accuracy.</p>
                </div>

                <div class="why-choose-card hover:tw-border-[#8c57f7]/50 hover:tw--translate-y-1.5 wow fadeInUp" data-wow-delay=".5s">
                    <div class="tw-w-9 tw-h-9 tw-rounded-lg tw-bg-[#8750f7]/15 tw-border tw-border-[#8c57f7]/30 tw-flex tw-items-center tw-justify-center tw-text-[#8750f7] tw-text-sm tw-flex-shrink-0 tw-mb-1">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3 class="why-choose-card-title">Skilled Team</h3>
                    <p class="why-choose-card-text">At Exlon Tech, our team of industry specialists and business professionals brings deep expertise, innovative thinking, and a strong commitment to success.</p>
                </div>

                <div class="why-choose-card hover:tw-border-[#8c57f7]/50 hover:tw--translate-y-1.5 wow fadeInUp" data-wow-delay=".6s">
                    <div class="tw-w-9 tw-h-9 tw-rounded-lg tw-bg-[#8750f7]/15 tw-border tw-border-[#8c57f7]/30 tw-flex tw-items-center tw-justify-center tw-text-[#8750f7] tw-text-sm tw-flex-shrink-0 tw-mb-1">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3 class="why-choose-card-title">Premium Value</h3>
                    <p class="why-choose-card-text">Through flexible hiring models—ranging from dedicated teams and fixed-price projects to hourly engagements—we offer tailored solutions that deliver exceptional value to our clients.</p>
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const teamSwiper = new Swiper('.team-swiper', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            loop: true,
            watchSlidesProgress: true, // Crucial for coverflow visibility and transforms
            speed: 400, // Faster 400ms transition speed
            slideToClickedSlide: true, // Clickable slides
            keyboard: {
                enabled: true,
                onlyInViewport: true,
            },
            navigation: {
                nextEl: '.swiper-next-btn',
                prevEl: '.swiper-prev-btn',
            },
            autoplay: {
                delay: 1800, // Move to next slide faster (every 1.8 seconds)
                disableOnInteraction: false, // Continue autoplay after user interaction
                pauseOnMouseEnter: true, // Pause slider when mouse enters slider!
            },
            coverflowEffect: {
                rotate: 28,       // Y-rotation angle
                stretch: -20,     // Overlap distance
                depth: 130,       // 3D depth
                modifier: 1,
                slideShadows: false,
            },
            breakpoints: {
                // Responsive Breakpoints
                0: {
                    coverflowEffect: {
                        rotate: 15,
                        stretch: -10,
                        depth: 70,
                        modifier: 1,
                    }
                },
                640: {
                    coverflowEffect: {
                        rotate: 25,
                        stretch: -15,
                        depth: 100,
                        modifier: 1,
                    }
                },
                1024: {
                    coverflowEffect: {
                        rotate: 28,
                        stretch: -20,
                        depth: 130,
                        modifier: 1,
                    }
                }
            }
        });

        // Autoplay Pause on Mouse Hover
        const swiperEl = document.querySelector('.team-swiper');
        if (swiperEl) {
            swiperEl.addEventListener('mouseenter', () => {
                teamSwiper.autoplay.stop();
            });
            swiperEl.addEventListener('mouseleave', () => {
                teamSwiper.autoplay.start();
            });
            swiperEl.addEventListener('focusin', () => {
                teamSwiper.autoplay.stop();
            });
            swiperEl.addEventListener('focusout', () => {
                teamSwiper.autoplay.start();
            });
        }
    });
</script>
@endpush

@endsection