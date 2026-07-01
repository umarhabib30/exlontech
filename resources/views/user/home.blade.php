@extends('layouts.app')

@section('title', $title ?? 'Exlon Tech')

@push('styles')
    <style>
        .tech-skills-marquee {
            overflow: hidden;
            padding: 0.5rem 0;
            -webkit-mask-image: linear-gradient(to right, transparent, #000 6%, #000 94%, transparent);
            mask-image: linear-gradient(to right, transparent, #000 6%, #000 94%, transparent);
        }

        .tech-skills-marquee__track {
            display: flex;
            gap: 1.25rem;
            width: max-content;
            will-change: transform;
            animation: tech-skills-marquee 55s linear infinite;
            animation-play-state: running;
        }

        .tech-skills-marquee:hover .tech-skills-marquee__track {
            animation-play-state: paused;
        }

        @keyframes tech-skills-marquee {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }
        }

        .tech-skills-marquee__item {
            flex-shrink: 0;
            width: 180px;
        }

        .tech-skills-marquee__card {
            min-height: 148px;
        }

        .tech-skills-marquee__icon-wrap {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .tech-skills-marquee__icon-wrap img {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }

        .tech-skills-marquee__icon-wrap i {
            font-size: 2.75rem;
            line-height: 1;
            display: block;
        }

        .intro_text svg text.animate-stroke {
            animation-duration: 2s;
        }
    </style>
@endpush

@section('content')
    <div class="main-wrapper">
        <!-- hero banner  -->
        <section
            class="hero-section relative pt-130px lg:pt-40 xl:pt-200px pb-10 md:pb-30px lg:pb-50px after:absolute after:top-0 after:right-0 after:w-322px after:h-308px after:blur-[150px] after:rounded-50% after:bg-gradient-circle after:-z-1 after:-mt-5% after:-mr-5% overflow-hidden">
            <!-- intro tex -->
            <div class="intro_text">
                <svg viewBox="0 0 1320 300" class="overflow-hidden">
                    <text x="50%" y="50%" text-anchor="middle" class="animate-stroke">
                        HI
                    </text>
                </svg>
            </div>
            <div class="container">
                <div class="hidded md:grid md:grid-cols-2 md:items-center gap-30px">
                    <div>
                        <h4
                            class="text-seondary-color dark:text-body-color text-size-22 md:text-size-25 lg:text-4xl lg:leading-1.5 font-bold mb-1.5 xl:mb-10px">
                            Welcome to ExlonTech
                        </h4>
                        <h1
                            class="text-size-35 md:text-size-38 lg:text-size-50 xl:text-6xl 2xl:text-size-65 bg-gradient-text-light dark:bg-gradient-text bg-clip-text xl:leading-1.2 text-transparent mb-15px">
                            Your digital <br />
                            Partner.
                        </h1>
                        <div class="flex md:hidden justify-center items-center my-30px">
                            <img src="./assets/img/hero/hero1.png" alt="banner image"
                                class="rounded-38px border-2 border-seondary-color hover:border-primary-color rotate-[4.29deg] hover:rotate-0 transition-all duration-300 max-w-[80%]" />
                        </div>
                        <p class="text-xl leading-1.5 text-primary-color-light dark:text-body-color max-w-540px">
                            ExlonTech provides top-notch software solutions tailored to your needs.
                        </p>
                        <!-- action and social -->
                        <div
                            class="flex items-center gap-30px lg:gap-25px mt-5 flex-wrap lg:flex-nowrap md:mt-30px lg:mt-50px">
                            <div>
                                <a href="#contact"
                                    class="text-size-15 font-medium text-primary-color hover:text-body-color capitalize py-17px px-35px bg-200 bg-transparent hover:bg-primary-color rounded-full leading-1 border border-primary-color text-nowrap tracking-1px">Contact
                                    Us <i class="flaticon-phone-call ml-0.5 text-size-17"></i></a>
                            </div>
                            <div>
                                <ul class="flex gap-x-5">
                                    <li>
                                        <a href="https://www.facebook.com/exlontech/" target="_blank"
                                            class="text-primary-color hover:text-body-color border border-primary-color w-35px h-35px rounded-full flex items-center justify-center overflow-hidden relative z-0 after:absolute after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:w-full after:h-full after:scale-0 after:bg-primary-color hover:after:scale-105 after:transition-all after:duration-300 after:z-[-1] after:rounded-full"><i
                                                class="fa-brands fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/exlontech/" target="_blank"
                                            class="text-primary-color hover:text-body-color border border-primary-color w-35px h-35px rounded-full flex items-center justify-center overflow-hidden relative z-0 after:absolute after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:w-full after:h-full after:scale-0 after:bg-primary-color hover:after:scale-105 after:transition-all after:duration-300 after:z-[-1] after:rounded-full"><i
                                                class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/company/exlon-tech" target="_blank"
                                            class="text-primary-color hover:text-body-color border border-primary-color w-35px h-35px rounded-full flex items-center justify-center overflow-hidden relative z-0 after:absolute after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:w-full after:h-full after:scale-0 after:bg-primary-color hover:after:scale-105 after:transition-all after:duration-300 after:z-[-1] after:rounded-full"><i
                                                class="fa-brands fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.pinterest.com/exlontech/" target="_blank"
                                            class="text-primary-color hover:text-body-color border border-primary-color w-35px h-35px rounded-full flex items-center justify-center overflow-hidden relative z-0 after:absolute after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:w-full after:h-full after:scale-0 after:bg-primary-color hover:after:scale-105 after:transition-all after:duration-300 after:z-[-1] after:rounded-full"><i
                                                class="fa-brands fa-pinterest"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div
                        class="hidden md:flex md:justify-center md:items-center relative after:absolute after:bottom-0 after:left-0 after:w-220px after:h-220px after:blur-[150px] after:rounded-50% after:bg-gradient-circle after:-z-1 after:-mt-5% after:-mr-5%">
                        <img src="./assets/img/hero/hero1.png" alt="banner image"
                            class="rounded-38px border-2 border-seondary-color hover:border-primary-color rotate-[4.29deg] hover:rotate-0 transition-all duration-300" />
                    </div>
                </div>
            </div>
            <!-- fanfact -->
            <div class="funfact-area mt-60px xl:mt-70px 2xl:mt-30">
                <div class="container">
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-x-6 text-primary-color dark:text-body-color">
                        <div
                            class="funfact-item flex flex-wrap sm:flex-nowrap flex-col sm:flex-row justify-center lg:justify-start items-center gap-15px">
                            <div class="number text-size-45 md:text-size-55 xl:text-size-64 font-medium">
                                <span class="odometer !font-sora tracking-[0.04em]" data-count="4">0</span>
                            </div>
                            <div class="text">Years of <br />Experience</div>
                        </div>

                        <div
                            class="funfact-item flex flex-wrap sm:flex-nowrap flex-col sm:flex-row justify-center lg:justify-start items-center gap-15px">
                            <div class="number text-size-45 md:text-size-55 xl:text-size-64 font-medium">
                                <span class="odometer !font-sora tracking-[0.04em]" data-count="40">0</span>+
                            </div>
                            <div class="text">Project <br />Completed</div>
                        </div>

                        <div
                            class="funfact-item flex flex-wrap sm:flex-nowrap flex-col sm:flex-row justify-center lg:justify-start items-center gap-15px">
                            <div class="number text-size-45 md:text-size-55 xl:text-size-64 font-medium">
                                <span class="odometer !font-sora tracking-[0.04em]" data-count="100">0</span>+
                            </div>
                            <div class="text">Happy <br />Clients</div>
                        </div>

                        <div
                            class="funfact-item flex flex-wrap sm:flex-nowrap flex-col sm:flex-row justify-center lg:justify-start items-center gap-15px">
                            <div class="number text-size-45 md:text-size-55 xl:text-size-64 font-medium">
                                <span class="odometer !font-sora tracking-[0.04em]" data-count="10">0</span> +
                            </div>
                            <div class="text">Team <br />Members</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- services area -->
        <section id="services">
            <div class="bg-cream-light-color dark:bg-black-color py-60px md:py-20 lg:py-30">
                <div class="container">
                    <!-- section heading -->
                    <div class="text-center flex flex-col items-center mb-10 md:mb-50px">
                        <h2 class="text-3xl md:text-size-35 lg:text-size-40 xl:text-size-45 bg-gradient-text-light dark:bg-gradient-text bg-clip-text xl:leading-1.2 text-transparent mb-15px wow fadeInUp"
                            data-wow-delay=".05s">
                            Our Services
                        </h2>
                        <p class="text-primary-color-light dark:text-body-color max-w-700px wow fadeInUp"
                            data-wow-delay=".1s">
                            We are a team of passionate and experienced developers, designers, and strategists who are
                            dedicated to
                            helping you achieve your goals. We understand that every business is unique, and we take the
                            time to
                            understand your needs and create a customized solution that works for you.
                        </p>
                    </div>
                    <!-- services -->
                    <div class="services-widget relative">
                        <div class="service-item current px-15px lg:px-30px border dark:border-0 dark:border-b border-body-color dark:border-seondary-color relative z-10 group wow fadeInUp"
                            data-wow-delay=".15s">
                            <a href="{{ route('web-development') }}"
                                class="text-primary-color dark:text-white-color flex items-center gap-15px md:gap-5 flex-wrap md:flex-nowrap py-5 lg:py-30px group-hover:text-white">
                                <span
                                    class="text-xl w-full md:w-[calc(40%-10px)] flex flex-wrap lg:flex-nowrap items-center gap-10px md:gap-5">
                                    <b
                                        class="service-sl-num text-primary-color group-hover:text-white transition-all duration-300">01</b>
                                    <b class="text-xl md:text-size-25 lg:text-3xl">Web Development</b>
                                </span>

                                <span
                                    class="text-primary-color-light dark:text-body-color w-full md:w-[calc(45%-10px)] group-hover:text-white">
                                    Create responsive, user-friendly websites using modern technologies like Laravel,
                                    Tailwind, Bootstrap,
                                    Livewire.
                                </span>
                                <i
                                    class="flaticon-up-right-arrow text-size-15 md:text-xl text-primary-color group-hover:text-white-color absolute top-[20%] md:top-1/2 right-5 lg:right-[55px] transition-all duration-300"></i>
                            </a>
                        </div>
                        <div class="service-item px-15px lg:px-30px border dark:border-0 dark:border-b border-body-color dark:border-seondary-color relative z-10 group wow fadeInUp"
                            data-wow-delay=".2s">
                            <a href="{{ route('mobile-app-development') }}"
                                class="text-primary-color dark:text-white-color flex items-center gap-15px md:gap-5 flex-wrap md:flex-nowrap py-5 lg:py-30px group-hover:text-white">
                                <span
                                    class="text-xl w-full md:w-[calc(40%-10px)] flex flex-wrap lg:flex-nowrap items-center gap-10px md:gap-5">
                                    <b
                                        class="service-sl-num text-primary-color group-hover:text-white transition-all duration-300">02</b>
                                    <b class="text-xl md:text-size-25 lg:text-3xl">Mobile App Development</b>
                                </span>

                                <span
                                    class="text-primary-color-light dark:text-body-color w-full md:w-[calc(45%-10px)] group-hover:text-white">
                                    Build cross-platform mobile applications using Flutter and Dart, ensuring a seamless
                                    user experience
                                    across devices.
                                </span>
                                <i
                                    class="flaticon-up-right-arrow text-size-15 md:text-xl text-primary-color group-hover:text-white-color absolute top-[20%] lg:top-1/2 right-5 lg:right-[55px] transition-all duration-300"></i>
                            </a>
                        </div>
                        <div class="service-item px-15px lg:px-30px border dark:border-0 dark:border-b border-body-color dark:border-seondary-color relative z-10 group wow fadeInUp"
                            data-wow-delay=".25s">
                            <a href="{{ route('ux-ui-design') }}"
                                class="text-primary-color dark:text-white-color flex items-center gap-15px md:gap-5 flex-wrap md:flex-nowrap py-5 lg:py-30px group-hover:text-white">
                                <span
                                    class="text-xl w-full md:w-[calc(40%-10px)] flex flex-wrap lg:flex-nowrap items-center gap-10px md:gap-5">
                                    <b
                                        class="service-sl-num text-primary-color group-hover:text-white transition-all duration-300">03</b>
                                    <b class="text-xl md:text-size-25 lg:text-3xl">UX/UI</b>
                                </span>

                                <span
                                    class="text-primary-color-light dark:text-body-color w-full md:w-[calc(45%-10px)] group-hover:text-white">
                                    Design intuitive and visually appealing user interfaces that enhance user experience
                                    and engagement.
                                </span>
                                <i
                                    class="flaticon-up-right-arrow text-size-15 md:text-xl text-primary-color group-hover:text-white-color absolute top-[20%] lg:top-1/2 right-5 lg:right-[55px] transition-all duration-300"></i>
                            </a>
                        </div>
                        <div class="service-item px-15px lg:px-30px border dark:border-0 dark:border-b border-body-color dark:border-seondary-color relative z-10 group wow fadeInUp"
                            data-wow-delay=".3s">
                            <a href="{{ route('digital-marketing') }}"
                                class="text-primary-color dark:text-white-color flex items-center gap-15px md:gap-5 flex-wrap md:flex-nowrap py-5 lg:py-30px group-hover:text-white">
                                <span
                                    class="text-xl w-full md:w-[calc(40%-10px)] flex flex-wrap lg:flex-nowrap items-center gap-10px md:gap-5">
                                    <b
                                        class="service-sl-num text-primary-color group-hover:text-white transition-all duration-300">04</b>
                                    <b class="text-xl md:text-size-25 lg:text-3xl">Digital Marketing</b>
                                </span>

                                <span
                                    class="text-primary-color-light dark:text-body-color w-full md:w-[calc(45%-10px)] group-hover:text-white">
                                    Implement effective digital marketing strategies, including SEO, social media
                                    marketing, and content
                                    marketing to boost online presence.
                                </span>
                                <i
                                    class="flaticon-up-right-arrow text-size-15 md:text-xl text-primary-color group-hover:text-white-color absolute top-[20%] lg:top-1/2 right-5 lg:right-[55px] transition-all duration-300"></i>
                            </a>
                        </div>
                        <div class="service-item px-15px lg:px-30px border dark:border-0 dark:border-b border-body-color dark:border-seondary-color relative z-10 group wow fadeInUp"
                            data-wow-delay=".3s">
                            <a href="{{ route('graphic-designing') }}"
                                class="text-primary-color dark:text-white-color flex items-center gap-15px md:gap-5 flex-wrap md:flex-nowrap py-5 lg:py-30px group-hover:text-white">
                                <span
                                    class="text-xl w-full md:w-[calc(40%-10px)] flex flex-wrap lg:flex-nowrap items-center gap-10px md:gap-5">
                                    <b
                                        class="service-sl-num text-primary-color group-hover:text-white transition-all duration-300">05</b>
                                    <b class="text-xl md:text-size-25 lg:text-3xl">Graphic Designing</b>
                                </span>

                                <span
                                    class="text-primary-color-light dark:text-body-color w-full md:w-[calc(45%-10px)] group-hover:text-white">
                                    Create stunning graphics, logos, and branding materials that effectively communicate
                                    your brand
                                    message and values.
                                </span>
                                <i
                                    class="flaticon-up-right-arrow text-size-15 md:text-xl text-primary-color group-hover:text-white-color absolute top-[20%] lg:top-1/2 right-5 lg:right-[55px] transition-all duration-300"></i>
                            </a>
                        </div>
                        <div class="service-item px-15px lg:px-30px border dark:border-0 dark:border-b border-body-color dark:border-seondary-color relative z-10 group wow fadeInUp"
                            data-wow-delay=".3s">
                            <a href="{{ route('video-editing') }}"
                                class="text-primary-color dark:text-white-color flex items-center gap-15px md:gap-5 flex-wrap md:flex-nowrap py-5 lg:py-30px group-hover:text-white">
                                <span
                                    class="text-xl w-full md:w-[calc(40%-10px)] flex flex-wrap lg:flex-nowrap items-center gap-10px md:gap-5">
                                    <b
                                        class="service-sl-num text-primary-color group-hover:text-white transition-all duration-300">06</b>
                                    <b class="text-xl md:text-size-25 lg:text-3xl">Video Editing</b>
                                </span>

                                <span
                                    class="text-primary-color-light dark:text-body-color w-full md:w-[calc(45%-10px)] group-hover:text-white">
                                    Edit and produce high-quality videos for marketing, training, and promotional
                                    purposes, ensuring a
                                    professional and polished final product.
                                </span>
                                <i
                                    class="flaticon-up-right-arrow text-size-15 md:text-xl text-primary-color group-hover:text-white-color absolute top-[20%] lg:top-1/2 right-5 lg:right-[55px] transition-all duration-300"></i>
                            </a>
                        </div>
                        <!-- bg animation -->
                        <div class="active-bg wow fadeInUp hidden sm:block" data-wow-delay=".2s"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- portfolio area -->
        <section id="portfolio">
            <div class="pt-60px pb-30px md:pt-20 md:pb-60px lg:pt-100px lg:pb-20">
                <div class="container">
                    <!-- section heading -->

                    <div class="text-center flex flex-col items-center mb-10 md:mb-50px">
                        <h2 class="text-3xl md:text-size-35 lg:text-size-40 xl:text-size-45 bg-gradient-text-light dark:bg-gradient-text bg-clip-text xl:leading-1.2 text-transparent mb-15px wow fadeInUp"
                            data-wow-delay=".05s">
                            Our Products
                        </h2>
                        <p class="text-primary-color-light dark:text-body-color max-w-700px wow fadeInUp"
                            data-wow-delay=".1s">
                            We take pride in offering high-quality products designed to meet your needs. Our recent products
                            showcase our commitment to innovation, reliability, and user-focused solutions across different
                            categories.
                        </p>
                    </div>


                    <!-- Products preview -->
                    <div class="text-center mb-10">
                        <div class="portfolio-filter">
                            <div class="portfolio-box wow fadeInUp mt-10 md:mt-50px wow fadeInUp" data-wow-delay=".2s">
                                <div class="portfolio-sizer"></div>
                                <div class="gutter-sizer"></div>

                                <div
                                    class="portfolio-item branding bg-primary-color-light px-15px pt-25px pb-0 lg:p-9 lg:pb-0 rounded-10px group relative float-left inline-flex">
                                    <img src="{{ asset('assets/img/portfolio_images/p5.png') }}"
                                        alt="Restore Partner Pro" />
                                    <div
                                        class="absolute left-0 bottom-[15px] group-hover:bottom-5 translate-y-5 group-hover:translate-y-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible w-full group-hover: px-15px lg:px-5 transition-all duration-300">
                                        <a href="https://tajmehal.exlontech.com/" target="_blank"
                                            rel="noopener noreferrer"
                                            class="text-white-color p-15px pr-30px lg:p-5 lg:pr-50px bg-gradient-primary rounded-15px w-full">
                                            <span
                                                class="block text-xl md:text-size-25 lg:text-3xl font-bold mb-2 lg:mb-15px">
                                                Booking Management System
                                            </span>
                                            <span class="block text-body-color">
                                                Booking Management System for hotels and restaurants.
                                            </span>
                                            <i
                                                class="flaticon-up-right-arrow text-size-15 md:text-xl text-primary-color group-hover:text-white-color absolute top-[20%] lg:top-1/2 right-5 lg:right-[55px] rotate-[-360deg] group-hover:rotate-0 transition-all duration-300"></i>
                                        </a>
                                    </div>
                                </div>

                                <div
                                    class="portfolio-item uxui bg-primary-color-light px-15px pt-25px pb-0 lg:p-9 lg:pb-0 rounded-10px group relative float-left inline-flex">
                                    <img src="{{ asset('assets/img/portfolio_images/p6.png') }}"
                                        alt="Global Mind Consultants" />
                                    <div
                                        class="absolute left-0 bottom-[15px] group-hover:bottom-5 translate-y-5 group-hover:translate-y-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible w-full group-hover: px-15px lg:px-5 transition-all duration-300">
                                        <a href="https://distribution.exlontech.com/" target="_blank"
                                            rel="noopener noreferrer"
                                            class="text-white-color p-15px pr-30px lg:p-5 lg:pr-50px bg-gradient-primary rounded-15px w-full">
                                            <span
                                                class="block text-xl md:text-size-25 lg:text-3xl font-bold mb-2 lg:mb-15px">
                                               Stock Management System
                                            </span>
                                            <span class="block text-body-color">
                                                Distribution inventory and sales management system.
                                            </span>
                                            <i
                                                class="flaticon-up-right-arrow text-size-15 md:text-xl text-primary-color group-hover:text-white-color absolute top-[20%] lg:top-1/2 right-5 lg:right-[55px] rotate-[-360deg] group-hover:rotate-0 transition-all duration-300"></i>
                                        </a>
                                    </div>
                                </div>
                                <div
                                    class="portfolio-item uxui bg-primary-color-light px-15px pt-25px pb-0 lg:p-9 lg:pb-0 rounded-10px group relative float-left inline-flex">
                                    <img src="{{ asset('assets/img/portfolio_images/p8.png') }}"
                                        alt="Chatbot Assistant" />
                                    <div
                                        class="absolute left-0 bottom-[15px] group-hover:bottom-5 translate-y-5 group-hover:translate-y-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible w-full group-hover: px-15px lg:px-5 transition-all duration-300">
                                        <a href="https://chatbot.exlontech.com/" target="_blank"
                                            rel="noopener noreferrer"
                                            class="text-white-color p-15px pr-30px lg:p-5 lg:pr-50px bg-gradient-primary rounded-15px w-full">
                                            <span
                                                class="block text-xl md:text-size-25 lg:text-3xl font-bold mb-2 lg:mb-15px">
                                               Whatsapp Chatbot Assistant
                                            </span>
                                            <span class="block text-body-color">
                                                Whatsapp Chatbot Assistant for businesses.
                                            </span>
                                            <i
                                                class="flaticon-up-right-arrow text-size-15 md:text-xl text-primary-color group-hover:text-white-color absolute top-[20%] lg:top-1/2 right-5 lg:right-[55px] rotate-[-360deg] group-hover:rotate-0 transition-all duration-300"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('portfolio') }}"
                            class="inline-flex items-center gap-2 mt-10 md:mt-50px text-size-15 font-bold text-white-color capitalize py-17px px-35px bg-200 bg-gradient-secondary hover:bg-[-100%] rounded-full leading-1 transition-all duration-300 wow fadeInUp"
                            data-wow-delay=".25s">
                            View Full Portfolio
                            <i class="fa-solid fa-arrow-right text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- experience area -->


        <!-- skills area -->
        <section id="skills">
            <div class="pt-60px pb-30px md:pt-20 md:pb-60px lg:pt-100px lg:pb-20">
                <div class="container">
                    <!-- section heading -->
                    <div class="text-center flex flex-col items-center mb-10 md:mb-50px">
                        <h2
                            class="text-3xl md:text-size-35 lg:text-size-40 xl:text-size-45 bg-gradient-text-light dark:bg-gradient-text bg-clip-text xl:leading-1.2 text-transparent mb-15px">
                            Technologies
                        </h2>
                        <p class="text-primary-color-light dark:text-body-color max-w-700px">
                            We are proficient in a wide range of technologies and tools, ensuring that we can deliver
                            the best
                            solutions for your needs. Our team is constantly learning and adapting to new technologies
                            to stay ahead
                            in the ever-evolving digital landscape.
                        </p>
                    </div>
                    <!-- skills slider -->
                    @php
                        $technologies = [
                            ['name' => 'Figma', 'image' => 'assets/img/services/figma1.png'],
                            ['name' => 'Laravel', 'image' => 'assets/img/services/laravel.png'],
                            ['name' => 'Adobe XD', 'image' => 'assets/img/services/adobe.png'],
                            ['name' => 'WordPress', 'image' => 'assets/img/services/wordpress.png'],
                            ['name' => 'React', 'image' => 'assets/img/services/reactjs.png'],
                            ['name' => 'JavaScript', 'image' => 'assets/img/services/js.png'],
                            ['name' => 'Python', 'icon' => 'fa-brands fa-python', 'icon_color' => '#3776ab'],
                            ['name' => 'AI', 'icon' => 'fa-solid fa-brain', 'icon_color' => '#b57dff'],
                            ['name' => 'Node.js', 'image' => 'assets/img/services/Node.png'],
                            ['name' => 'TypeScript', 'image' => 'assets/img/services/typescript.png'],
                            ['name' => 'PHP', 'image' => 'assets/img/services/php 1.png'],
                            ['name' => 'Flutter', 'image' => 'assets/img/services/fluter.png'],
                            ['name' => 'Vue.js', 'image' => 'assets/img/services/vue.png'],
                            ['name' => 'Next.js', 'image' => 'assets/img/services/nextjs.png'],
                            ['name' => 'MongoDB', 'image' => 'assets/img/services/mongoDb.png'],
                            ['name' => 'MySQL', 'image' => 'assets/img/services/mysql.png'],
                            ['name' => 'Firebase', 'image' => 'assets/img/services/firebase.png'],
                            ['name' => 'GraphQL', 'image' => 'assets/img/services/graphql.png'],
                            ['name' => 'Shopify', 'image' => 'assets/img/services/shopifyy.png'],
                            ['name' => 'Android', 'image' => 'assets/img/services/android.png'],
                            ['name' => 'Photoshop', 'image' => 'assets/img/services/ps.png'],
                            ['name' => 'Illustrator', 'image' => 'assets/img/services/ai.png'],
                        ];
                    @endphp

                    <div class="skills">
                        <div class="tech-skills-marquee">
                            <div class="tech-skills-marquee__track">
                                @for ($copy = 0; $copy < 2; $copy++)
                                    @foreach ($technologies as $tech)
                                        <div class="tech-skills-marquee__item group">
                                            <div
                                                class="tech-skills-marquee__card flex flex-col items-center py-25px px-15px md:pt-30px 2xl:pt-10 2xl:mb-30px rounded-25px bg-cream-light-color dark:bg-primary-color-light border border-transparent group-hover:border-primary-color group-hover:bg-seondary-color transition-all duration-500 mb-15px">
                                                <div
                                                    class="mb-5 md:mb-30px mx-9 2xl:mx-44px tech-skills-marquee__icon-wrap">
                                                    @if (!empty($tech['image']))
                                                        <img class="grayscale-[90%] group-hover:grayscale-0 transition-all duration-500 group-hover:scale-110 opacity-50 group-hover:opacity-100"
                                                            src="{{ asset($tech['image']) }}"
                                                            alt="{{ $tech['name'] }}" />
                                                    @else
                                                        <i class="{{ $tech['icon'] }} grayscale-[90%] group-hover:grayscale-0 transition-all duration-500 group-hover:scale-110 opacity-50 group-hover:opacity-100"
                                                            style="color: {{ $tech['icon_color'] }}"></i>
                                                    @endif
                                                </div>
                                            </div>
                                            <p class="text-primary-color text-center">{{ $tech['name'] }}</p>
                                        </div>
                                    @endforeach
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- testimonials area -->
        <section id="testimonials">
            <div class="bg-cream-light-color dark:bg-black-color py-60px md:py-20 lg:py-30">
                <div class="container">
                    <div class="testimonials grid lg:grid-cols-12 gap-6">
                        <!-- section heading -->
                        <div class="lg:col-start-1 lg:col-span-5">
                            <div class="mb-10 md:mb-50px wow fadeInUp" data-wow-delay=".05s">
                                <h2 class="text-3xl md:text-size-35 lg:text-size-40 xl:text-size-45 bg-gradient-text-light dark:bg-gradient-text bg-clip-text xl:leading-1.2 text-transparent mb-15px wow fadeInLeft"
                                    data-wow-delay=".05s">
                                    Our Client's Stories
                                </h2>
                                <p class="text-primary-color-light dark:text-body-color wow fadeInLeft"
                                    data-wow-delay=".1s">
                                    We are proud to have worked with a diverse range of clients, from startups to
                                    established businesses,
                                    and we are committed to delivering the best possible results for each and every one
                                    of them. Here are
                                    some of their stories.
                                </p>
                            </div>
                        </div>
                        <!-- testimonial single -->
                        <div class="lg:col-start-6 xl:col-start-7 lg:col-span-7 xl:col-span-6 wow fadeInRight overflow-hidden"
                            data-wow-delay=".15s">
                            <div class="owl-carousel testimonial-carousel">
                                <div
                                    class="p-25px bg-white-color dark:bg-primary-color-light rounded-15px relative z-0 group">
                                    <div class="flex justify-between gap-30px mb-5">
                                        <div class="max-w-100px w-full">
                                            <img src="./assets/img/testimonials/logo/white-logo-transparent.svg"
                                                alt="" class="!hidden dark:!block" />
                                            <img src="./assets/img/testimonials/logo/main-logo-transparent.svg"
                                                alt="" class="!block dark:!hidden" />
                                        </div>
                                        <div class="max-w-120px w-2/5">
                                            <img class="rounded-5px rounded-bl-125px w-full"
                                                src="./assets/img/testimonials/user/t1.png" alt="" />
                                        </div>
                                    </div>
                                    <div class="text-primary-color-light dark:text-white-color relative z-10">
                                        <div class="icon-box mb-25px flex gap-1">
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg" class="transition-all duration-300">
                                                <path
                                                    d="M0.105431 2.18998C0.0301532 0.988687 1.02531 -0.00647222 2.2266 0.0688056L19.4961 1.15097C21.2148 1.25867 22.0029 3.34358 20.7852 4.56127L4.5979 20.7486C3.3802 21.9663 1.2953 21.1781 1.1876 19.4594L0.105431 2.18998Z"
                                                    fill="url(#paint6_linear_263_514)" class="fill-primary-color">
                                                </path>
                                                <defs>
                                                    <linearGradient x1="-0.0363755" y1="-0.0729998" x2="35.3333"
                                                        y2="-0.0729991" gradientUnits="userSpaceOnUse">
                                                        <stop offset="1" stop-color="var(--tj-theme-primary)">
                                                        </stop>
                                                        <stop offset="1" stop-color="#140C1C" stop-opacity="0">
                                                        </stop>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="transition-all duration-300 ml-1">
                                                <path
                                                    d="M0.105431 2.18998C0.0301532 0.988687 1.02531 -0.00647222 2.2266 0.0688056L19.4961 1.15097C21.2148 1.25867 22.0029 3.34358 20.7852 4.56127L4.5979 20.7486C3.3802 21.9663 1.2953 21.1781 1.1876 19.4594L0.105431 2.18998Z"
                                                    fill="url(#paint7_linear_263_515)" class="fill-primary-color">
                                                </path>
                                                <defs>
                                                    <linearGradient x1="-0.0363755" y1="-0.0729998" x2="35.3333"
                                                        y2="-0.0729991" gradientUnits="userSpaceOnUse">
                                                        <stop offset="1" stop-color="var(--tj-theme-primary)">
                                                        </stop>
                                                        <stop offset="1" stop-color="#140C1C" stop-opacity="0">
                                                        </stop>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </div>
                                        <p class="text-primary-color-light dark:text-body-color mb-30px md:mb-50px">
                                            "Excellent service! The team was very professional and delivered
                                            the project on time. I highly recommend them for any web development needs.
                                        </p>
                                        <h4 class="text-lg mb-2">Anthony</h4>

                                        <p class="text-primary-color-light dark:text-body-color text-sm">
                                            Co Fouder & CEO
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="p-25px bg-white-color dark:bg-primary-color-light rounded-15px relative z-0 group">
                                    <div class="flex justify-between gap-30px mb-5">
                                        <div class="max-w-100px w-full">
                                            <img src="./assets/img/testimonials/logo/logo1.svg" alt=""
                                                class="!hidden dark:!block" />
                                            <img src="./assets/img/testimonials/logo/logo1.svg" alt=""
                                                class="!block dark:!hidden" />
                                        </div>
                                        <div class="max-w-120px w-2/5">
                                            <img class="rounded-5px rounded-bl-125px w-full"
                                                src="./assets/img/testimonials/user/t2.png" alt="" />
                                        </div>
                                    </div>
                                    <div class="text-primary-color-light dark:text-white-color relative z-10">
                                        <div class="icon-box mb-25px flex gap-1">
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg" class="transition-all duration-300">
                                                <path
                                                    d="M0.105431 2.18998C0.0301532 0.988687 1.02531 -0.00647222 2.2266 0.0688056L19.4961 1.15097C21.2148 1.25867 22.0029 3.34358 20.7852 4.56127L4.5979 20.7486C3.3802 21.9663 1.2953 21.1781 1.1876 19.4594L0.105431 2.18998Z"
                                                    fill="url(#paint6_linear_263_514)" class="fill-primary-color">
                                                </path>
                                                <defs>
                                                    <linearGradient x1="-0.0363755" y1="-0.0729998" x2="35.3333"
                                                        y2="-0.0729991" gradientUnits="userSpaceOnUse">
                                                        <stop offset="1" stop-color="var(--tj-theme-primary)">
                                                        </stop>
                                                        <stop offset="1" stop-color="#140C1C" stop-opacity="0">
                                                        </stop>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="transition-all duration-300 ml-1">
                                                <path
                                                    d="M0.105431 2.18998C0.0301532 0.988687 1.02531 -0.00647222 2.2266 0.0688056L19.4961 1.15097C21.2148 1.25867 22.0029 3.34358 20.7852 4.56127L4.5979 20.7486C3.3802 21.9663 1.2953 21.1781 1.1876 19.4594L0.105431 2.18998Z"
                                                    fill="url(#paint7_linear_263_515)" class="fill-primary-color">
                                                </path>
                                                <defs>
                                                    <linearGradient x1="-0.0363755" y1="-0.0729998" x2="35.3333"
                                                        y2="-0.0729991" gradientUnits="userSpaceOnUse">
                                                        <stop offset="1" stop-color="var(--tj-theme-primary)">
                                                        </stop>
                                                        <stop offset="1" stop-color="#140C1C" stop-opacity="0">
                                                        </stop>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </div>
                                        <p class="text-primary-color-light dark:text-body-color mb-30px md:mb-50px">
                                            “I was impressed with the level of detail and creativity that went into the
                                            design. The team
                                            really understood my vision and brought it to life.
                                        </p>
                                        <h4 class="text-lg mb-2">Ms Ayesha</h4>

                                        <p class="text-primary-color-light dark:text-body-color text-sm">
                                            Founder & CEO
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="p-25px bg-white-color dark:bg-primary-color-light rounded-15px relative z-0 group">
                                    <div class="flex justify-between gap-30px mb-5">
                                        <div class="max-w-100px w-full">
                                            <img src="./assets/img/testimonials/logo/sofa.svg" alt=""
                                                class="!hidden dark:!block" />
                                            <img src="./assets/img/testimonials/logo/sofa.svg" alt=""
                                                class="!block dark:!hidden" />
                                        </div>
                                        <div class="max-w-120px w-2/5">
                                            <img class="rounded-5px rounded-bl-125px w-full"
                                                src="./assets/img/testimonials/user/t3.png" alt="" />
                                        </div>
                                    </div>
                                    <div class="text-primary-color-light dark:text-white-color relative z-10">
                                        <div class="icon-box mb-25px flex gap-1">
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg" class="transition-all duration-300">
                                                <path
                                                    d="M0.105431 2.18998C0.0301532 0.988687 1.02531 -0.00647222 2.2266 0.0688056L19.4961 1.15097C21.2148 1.25867 22.0029 3.34358 20.7852 4.56127L4.5979 20.7486C3.3802 21.9663 1.2953 21.1781 1.1876 19.4594L0.105431 2.18998Z"
                                                    fill="url(#paint6_linear_263_514)" class="fill-primary-color">
                                                </path>
                                                <defs>
                                                    <linearGradient x1="-0.0363755" y1="-0.0729998" x2="35.3333"
                                                        y2="-0.0729991" gradientUnits="userSpaceOnUse">
                                                        <stop offset="1" stop-color="var(--tj-theme-primary)">
                                                        </stop>
                                                        <stop offset="1" stop-color="#140C1C" stop-opacity="0">
                                                        </stop>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="transition-all duration-300 ml-1">
                                                <path
                                                    d="M0.105431 2.18998C0.0301532 0.988687 1.02531 -0.00647222 2.2266 0.0688056L19.4961 1.15097C21.2148 1.25867 22.0029 3.34358 20.7852 4.56127L4.5979 20.7486C3.3802 21.9663 1.2953 21.1781 1.1876 19.4594L0.105431 2.18998Z"
                                                    fill="url(#paint7_linear_263_515)" class="fill-primary-color">
                                                </path>
                                                <defs>
                                                    <linearGradient x1="-0.0363755" y1="-0.0729998" x2="35.3333"
                                                        y2="-0.0729991" gradientUnits="userSpaceOnUse">
                                                        <stop offset="1" stop-color="var(--tj-theme-primary)">
                                                        </stop>
                                                        <stop offset="1" stop-color="#140C1C" stop-opacity="0">
                                                        </stop>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </div>
                                        <p class="text-primary-color-light dark:text-body-color mb-30px md:mb-50px">
                                            "They provided ecommerce solutions that helped us increase our online sales
                                            by 50% in just three months.
                                            Highly recommend!
                                        </p>
                                        <h4 class="text-lg mb-2">Rizwan</h4>

                                        <p class="text-primary-color-light dark:text-body-color text-sm">
                                            Owner The Sofa Hub
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="p-25px bg-white-color dark:bg-primary-color-light rounded-15px relative z-0 group">
                                    <div class="flex justify-between gap-30px mb-5">
                                        <div class="max-w-100px w-full">
                                            <img src="./assets/img/testimonials/logo/global.png" alt=""
                                                class="!hidden dark:!block" />
                                            <img src="./assets/img/testimonials/logo/global.png" alt=""
                                                class="!block dark:!hidden" />
                                        </div>
                                        <div class="max-w-120px w-2/5">
                                            <img class="rounded-5px rounded-bl-125px w-full"
                                                src="./assets/img/testimonials/user/t4.png" alt="" />
                                        </div>
                                    </div>
                                    <div class="text-primary-color-light dark:text-white-color relative z-10">
                                        <div class="icon-box mb-25px flex gap-1">
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg" class="transition-all duration-300">
                                                <path
                                                    d="M0.105431 2.18998C0.0301532 0.988687 1.02531 -0.00647222 2.2266 0.0688056L19.4961 1.15097C21.2148 1.25867 22.0029 3.34358 20.7852 4.56127L4.5979 20.7486C3.3802 21.9663 1.2953 21.1781 1.1876 19.4594L0.105431 2.18998Z"
                                                    fill="url(#paint6_linear_263_514)" class="fill-primary-color">
                                                </path>
                                                <defs>
                                                    <linearGradient x1="-0.0363755" y1="-0.0729998" x2="35.3333"
                                                        y2="-0.0729991" gradientUnits="userSpaceOnUse">
                                                        <stop offset="1" stop-color="var(--tj-theme-primary)">
                                                        </stop>
                                                        <stop offset="1" stop-color="#140C1C" stop-opacity="0">
                                                        </stop>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="transition-all duration-300 ml-1">
                                                <path
                                                    d="M0.105431 2.18998C0.0301532 0.988687 1.02531 -0.00647222 2.2266 0.0688056L19.4961 1.15097C21.2148 1.25867 22.0029 3.34358 20.7852 4.56127L4.5979 20.7486C3.3802 21.9663 1.2953 21.1781 1.1876 19.4594L0.105431 2.18998Z"
                                                    fill="url(#paint7_linear_263_515)" class="fill-primary-color">
                                                </path>
                                                <defs>
                                                    <linearGradient x1="-0.0363755" y1="-0.0729998" x2="35.3333"
                                                        y2="-0.0729991" gradientUnits="userSpaceOnUse">
                                                        <stop offset="1" stop-color="var(--tj-theme-primary)">
                                                        </stop>
                                                        <stop offset="1" stop-color="#140C1C" stop-opacity="0">
                                                        </stop>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </div>
                                        <p class="text-primary-color-light dark:text-body-color mb-30px md:mb-50px">
                                            "They developed a custom booking system for our travel agency that has
                                            streamlined our operations and improved customer satisfaction.
                                        </p>
                                        <h4 class="text-lg mb-2">Khalid</h4>

                                        <p class="text-primary-color-light dark:text-body-color text-sm">
                                            Founder & CEO
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="p-25px bg-white-color dark:bg-primary-color-light rounded-15px relative z-0 group">
                                    <div class="flex justify-between gap-30px mb-5">
                                        <div class="max-w-100px w-full">
                                            <img src="./assets/img/testimonials/logo/oasipay.jpg" alt=""
                                                class="!hidden dark:!block" />
                                            <img src="./assets/img/testimonials/logo/oasipay.jpg" alt=""
                                                class="!block dark:!hidden" />
                                        </div>
                                        <div class="max-w-120px w-2/5">
                                            <img class="rounded-5px rounded-bl-125px w-full"
                                                src="./assets/img/testimonials/user/t5.png" alt="" />
                                        </div>
                                    </div>
                                    <div class="text-primary-color-light dark:text-white-color relative z-10">
                                        <div class="icon-box mb-25px flex gap-1">
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg" class="transition-all duration-300">
                                                <path
                                                    d="M0.105431 2.18998C0.0301532 0.988687 1.02531 -0.00647222 2.2266 0.0688056L19.4961 1.15097C21.2148 1.25867 22.0029 3.34358 20.7852 4.56127L4.5979 20.7486C3.3802 21.9663 1.2953 21.1781 1.1876 19.4594L0.105431 2.18998Z"
                                                    fill="url(#paint6_linear_263_514)" class="fill-primary-color">
                                                </path>
                                                <defs>
                                                    <linearGradient x1="-0.0363755" y1="-0.0729998" x2="35.3333"
                                                        y2="-0.0729991" gradientUnits="userSpaceOnUse">
                                                        <stop offset="1" stop-color="var(--tj-theme-primary)">
                                                        </stop>
                                                        <stop offset="1" stop-color="#140C1C" stop-opacity="0">
                                                        </stop>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="transition-all duration-300 ml-1">
                                                <path
                                                    d="M0.105431 2.18998C0.0301532 0.988687 1.02531 -0.00647222 2.2266 0.0688056L19.4961 1.15097C21.2148 1.25867 22.0029 3.34358 20.7852 4.56127L4.5979 20.7486C3.3802 21.9663 1.2953 21.1781 1.1876 19.4594L0.105431 2.18998Z"
                                                    fill="url(#paint7_linear_263_515)" class="fill-primary-color">
                                                </path>
                                                <defs>
                                                    <linearGradient x1="-0.0363755" y1="-0.0729998" x2="35.3333"
                                                        y2="-0.0729991" gradientUnits="userSpaceOnUse">
                                                        <stop offset="1" stop-color="var(--tj-theme-primary)">
                                                        </stop>
                                                        <stop offset="1" stop-color="#140C1C" stop-opacity="0">
                                                        </stop>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </div>
                                        <p class="text-primary-color-light dark:text-body-color mb-30px md:mb-50px">
                                            "Payment processing was a breeze with their custom solution. The team was
                                            responsive and attentive to our needs.
                                        </p>
                                        <h4 class="text-lg mb-2">Tim Bailey</h4>

                                        <p class="text-primary-color-light dark:text-body-color text-sm">
                                            Project Manager
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="p-25px bg-white-color dark:bg-primary-color-light rounded-15px relative z-0 group">
                                    <div class="flex justify-between gap-30px mb-5">
                                        <div class="max-w-100px w-full">
                                            <img src="./assets/img/testimonials/logo/koi.png" alt=""
                                                class="!hidden dark:!block" />
                                            <img src="./assets/img/testimonials/logo/koi.png" alt=""
                                                class="!block dark:!hidden" />
                                        </div>
                                        <div class="max-w-120px w-2/5">
                                            <img class="rounded-5px rounded-bl-125px w-full"
                                                src="./assets/img/testimonials/user/2.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div class="text-primary-color-light dark:text-white-color relative z-10">
                                        <div class="icon-box mb-25px flex gap-1">
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg" class="transition-all duration-300">
                                                <path
                                                    d="M0.105431 2.18998C0.0301532 0.988687 1.02531 -0.00647222 2.2266 0.0688056L19.4961 1.15097C21.2148 1.25867 22.0029 3.34358 20.7852 4.56127L4.5979 20.7486C3.3802 21.9663 1.2953 21.1781 1.1876 19.4594L0.105431 2.18998Z"
                                                    fill="url(#paint6_linear_263_514)" class="fill-primary-color">
                                                </path>
                                                <defs>
                                                    <linearGradient x1="-0.0363755" y1="-0.0729998" x2="35.3333"
                                                        y2="-0.0729991" gradientUnits="userSpaceOnUse">
                                                        <stop offset="1" stop-color="var(--tj-theme-primary)">
                                                        </stop>
                                                        <stop offset="1" stop-color="#140C1C" stop-opacity="0">
                                                        </stop>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="transition-all duration-300 ml-1">
                                                <path
                                                    d="M0.105431 2.18998C0.0301532 0.988687 1.02531 -0.00647222 2.2266 0.0688056L19.4961 1.15097C21.2148 1.25867 22.0029 3.34358 20.7852 4.56127L4.5979 20.7486C3.3802 21.9663 1.2953 21.1781 1.1876 19.4594L0.105431 2.18998Z"
                                                    fill="url(#paint7_linear_263_515)" class="fill-primary-color">
                                                </path>
                                                <defs>
                                                    <linearGradient x1="-0.0363755" y1="-0.0729998" x2="35.3333"
                                                        y2="-0.0729991" gradientUnits="userSpaceOnUse">
                                                        <stop offset="1" stop-color="var(--tj-theme-primary)">
                                                        </stop>
                                                        <stop offset="1" stop-color="#140C1C" stop-opacity="0">
                                                        </stop>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </div>
                                        <p class="text-primary-color-light dark:text-body-color mb-30px md:mb-50px">
                                            This quiz app made learning fun and engaging for our students. The team was
                                            great to work with and delivered a high-quality product.
                                        </p>
                                        <h4 class="text-lg mb-2">Abhishek Siani</h4>

                                        <p class="text-primary-color-light dark:text-body-color text-sm">
                                            Principal
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blogs area -->
        {{-- <section>
            <div id="blogs" class="py-60px md:py-20 lg:py-100px xl:py-30">
                <div class="container">
                    <!-- section heading -->
                    <div class="text-center flex flex-col items-center mb-10 md:mb-50px">
                        <h2 class="text-3xl md:text-size-35 lg:text-size-40 xl:text-size-45 bg-gradient-text-light dark:bg-gradient-text bg-clip-text xl:leading-1.2 text-transparent mb-15px wow fadeInUp"
                            data-wow-delay=".05s">
                            Recent Blogs
                        </h2>
                        <p class="text-primary-color-light dark:text-body-color max-w-700px wow fadeInUp"
                            data-wow-delay=".1s">
                            We put your ideas and thus your wishes in the form of a unique
                            web project that inspires you and you customers.
                        </p>
                    </div>
                    <!-- blogs -->

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-25px 2xl:gap-35px">
                        <div class="group relative flex flex-col items-center wow fadeInUp" data-wow-delay=".15s">
                            <div class="rounded-10px relative overflow-hidden max-w-400 w-full">
                                <a href="blog-details.html" class="rounded-10px overflow-hidden">
                                    <img src="./assets/img/blog/1.jpg" alt=""
                                        class="group-hover:scale-110 transition-all duration-500" /></a>
                                <a href="#"
                                    class="text-size-13 uppercase px-10px py-7px rounded-50px leading-1 absolute top-[15px] left-[15px] text-white-color bg-gradient-secondary-2 bg-200 hover:bg-100">Tutorial</a>
                                <div
                                    class="absolute left-0 bottom-5 w-full px-10px lg:px-5 transition-all duration-500">
                                    <div
                                        class="relative z-0 p-15px pb-5 bg-white-color dark:bg-seondary-color rounded-15px w-full after:absolute after:top-0 after:left-0 after:w-full after:h-full after:opacity-0 group-hover:after:opacity-100 after:transition-all after:duration-500 after:z-1 after:bg-gradient-primary after:rounded-15px">
                                        <div class="relative z-10">
                                            <ul class="flex gap-5 items-center mb-2">
                                                <li
                                                    class="text-sm font-medium text-primary-color group-hover:text-white-color transition-all duration-500">
                                                    <i class="fa-light fa-calendar-days mr-0.5"></i> Oct
                                                    01, 2022
                                                </li>
                                                <li class="text-sm font-medium">
                                                    <i
                                                        class="fa-light fa-comments mr-0.5 text-primary-color group-hover:text-white-color transition-all duration-500"></i>
                                                    <a href="#"
                                                        class="text-primary-color group-hover:text-white-color transition-all duration-500">Comment
                                                        (0)</a>
                                                </li>
                                            </ul>
                                            <a href="blog-details.html"
                                                class="text-primary-color-light dark:text-white-color group-hover:text-white-color w-full capitalize">
                                                <span class="block text-lg md:text-size-22 font-bold">
                                                    top 10 ui ux designers
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="group relative flex flex-col items-center wow fadeInUp" data-wow-delay=".2s">
                            <div class="rounded-10px relative overflow-hidden max-w-400 w-full">
                                <a href="blog-details.html" class="rounded-10px overflow-hidden">
                                    <img src="./assets/img/blog/2.jpg" alt=""
                                        class="group-hover:scale-110 transition-all duration-500" /></a>
                                <a href="#"
                                    class="text-size-13 uppercase px-10px py-7px rounded-50px leading-1 absolute top-[15px] left-[15px] text-white-color bg-gradient-secondary-2 bg-200 hover:bg-100">TIPS</a>
                                <div
                                    class="absolute left-0 bottom-5 w-full px-10px lg:px-5 transition-all duration-500">
                                    <div
                                        class="relative z-0 p-15px pb-5 bg-white-color dark:bg-seondary-color rounded-15px w-full after:absolute after:top-0 after:left-0 after:w-full after:h-full after:opacity-0 group-hover:after:opacity-100 after:transition-all after:duration-500 after:z-1 after:bg-gradient-primary after:rounded-15px">
                                        <div class="relative z-10">
                                            <ul class="flex gap-5 items-center mb-2">
                                                <li
                                                    class="text-sm font-medium text-primary-color group-hover:text-white-color transition-all duration-500">
                                                    <i class="fa-light fa-calendar-days mr-0.5"></i> Nov
                                                    01, 2022
                                                </li>
                                                <li class="text-sm font-medium">
                                                    <i
                                                        class="fa-light fa-comments mr-0.5 text-primary-color group-hover:text-white-color transition-all duration-500"></i>
                                                    <a href="#"
                                                        class="text-primary-color group-hover:text-white-color transition-all duration-500">Comment
                                                        (0)</a>
                                                </li>
                                            </ul>
                                            <a href="blog-details.html"
                                                class="text-primary-color-light dark:text-white-color group-hover:text-white-color w-full capitalize">
                                                <span class="block text-lg md:text-size-22 font-bold">
                                                    App Development Guides
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="group relative flex flex-col items-center wow fadeInUp" data-wow-delay=".25s">
                            <div class="rounded-10px relative overflow-hidden max-w-400 w-full">
                                <a href="blog-details.html" class="rounded-10px overflow-hidden">
                                    <img src="./assets/img/blog/3.jpg" alt=""
                                        class="group-hover:scale-110 transition-all duration-500" /></a>
                                <a href="#"
                                    class="text-size-13 uppercase px-10px py-7px rounded-50px leading-1 absolute top-[15px] left-[15px] text-white-color bg-gradient-secondary-2 bg-200 hover:bg-100">FREEBIES</a>
                                <div
                                    class="absolute left-0 bottom-5 w-full px-10px lg:px-5 transition-all duration-500">
                                    <div
                                        class="relative z-0 p-15px pb-5 bg-white-color dark:bg-seondary-color rounded-15px w-full after:absolute after:top-0 after:left-0 after:w-full after:h-full after:opacity-0 group-hover:after:opacity-100 after:transition-all after:duration-500 after:z-1 after:bg-gradient-primary after:rounded-15px">
                                        <div class="relative z-10">
                                            <ul class="flex gap-5 items-center mb-2">
                                                <li
                                                    class="text-sm font-medium text-primary-color group-hover:text-white-color transition-all duration-500">
                                                    <i class="fa-light fa-calendar-days mr-0.5"></i> Dec
                                                    01, 2022
                                                </li>
                                                <li class="text-sm font-medium">
                                                    <i
                                                        class="fa-light fa-comments mr-0.5 text-primary-color group-hover:text-white-color transition-all duration-500"></i>
                                                    <a href="#"
                                                        class="text-primary-color group-hover:text-white-color transition-all duration-500">Comment
                                                        (0)</a>
                                                </li>
                                            </ul>
                                            <a href="blog-details.html"
                                                class="text-primary-color-light dark:text-white-color group-hover:text-white-color w-full capitalize">
                                                <span class="block text-lg md:text-size-22 font-bold">
                                                    learn graphic design free
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <!-- contact area -->
        <section id="contact">
            <div class="bg-cream-light-color dark:bg-black-color py-60px md:py-20 lg:py-100px xl:py-30">
                <div class="container">
                    <div class="flex flex-col-reverse md:grid md:grid-cols-12 md:items-center gap-x-6 gap-y-10">
                        <!-- section heading -->
                        <div class="md:col-start-1 md:col-span-7 lg:col-span-6">
                            <div class="wow fadeInLeft" data-wow-delay=".05s">
                                <form action="{{ url('contact-us') }}" method="POST" data-ajax-form
                                    data-success-message="Thanks for contacting us, we will get in touch soon!"
                                    class="contact px-15px py-30px md:px-5 lg:px-30px lg:py-10 xl:px-10 bg-white-color dark:bg-primary-color-light rounded-15px">
                                    @csrf
                                    <div class="mb-25px">
                                        <h2
                                            class="text-3xl md:text-size-35 lg:text-size-40 xl:text-size-45 bg-gradient-text-light dark:bg-gradient-text bg-clip-text xl:leading-1.2 text-transparent mb-15px">
                                            Let’s work together!
                                        </h2>
                                        <p class="text-primary-color-light dark:text-body-color wow fadeInLeft"
                                            data-wow-delay=".1s">
                                            We work for you and your business. We are here to help you
                                            grow your business and achieve your goals. Let’s work together to make it
                                            happen!
                                        </p>
                                    </div>
                                    <!-- inputs -->

                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-15px">
                                        <!-- first name -->
                                        <div>
                                            <input name="first_name" type="text" placeholder="First name" required
                                                class="text-white-color w-full px-5 py-14px border border-gray-color-3 bg-cream-light-color dark:bg-black-color focus:border-primary-color rounded-lg outline-none focus:outline-none transition-all duration-300 placeholder:text-gray-color leading-1" />
                                        </div>
                                        <!-- Last name -->
                                        <div>
                                            <input name="last_name" type="text" placeholder="Last name"
                                                class="text-white-color w-full px-5 py-14px border border-gray-color-3 bg-cream-light-color dark:bg-black-color focus:border-primary-color rounded-lg outline-none focus:outline-none transition-all duration-300 placeholder:text-gray-color leading-1" />
                                        </div>
                                        <!-- Email address -->
                                        <div>
                                            <input name="email" type="email" placeholder="Email address" required
                                                class="text-white-color w-full px-5 py-14px border border-gray-color-3 bg-cream-light-color dark:bg-black-color focus:border-primary-color rounded-lg outline-none focus:outline-none transition-all duration-300 placeholder:text-gray-color leading-1" />
                                        </div>
                                        <!-- Phone number -->
                                        <div>
                                            <input name="phone" type="text" placeholder="Phone number"
                                                class="text-white-color w-full px-5 py-14px border border-gray-color-3 bg-cream-light-color dark:bg-black-color focus:border-primary-color rounded-lg outline-none focus:outline-none transition-all duration-300 placeholder:text-gray-color leading-1" />
                                        </div>
                                        <div class="form_group sm:col-start-1 sm:col-span-2">
                                            <select name="service" id="conService" class="tj-nice-select" required>
                                                <option value="" selected="" disabled="">
                                                    Choose Service
                                                </option>
                                                <option value="Web Development">Web Development</option>
                                                <option value="App Design">App Development</option>
                                                <option value="Graphic Design">Graphic Design</option>
                                                <option value="uxui">UI/UX Design</option>
                                                <option value="Shopify Store">Shopify Store</option>
                                                <option value="Digital Marketing">Digital Marketing</option>
                                                <option value="Video Editing">Video Editing</option>
                                            </select>
                                        </div>
                                        <div class="sm:col-start-1 sm:col-span-2">
                                            <textarea cols="1" rows="10" placeholder="Message" name="message"
                                                class="text-white-color w-full px-5 py-14px border border-gray-color-3 bg-cream-light-color dark:bg-black-color focus:border-primary-color rounded-lg outline-none focus:outline-none transition-all duration-300 placeholder:text-gray-color leading-1"></textarea>
                                        </div>
                                        <div class="sm:col-start-1 sm:col-span-2">
                                            <button type="submit"
                                                class="text-size-15 font-bold text-white-color capitalize py-17px px-35px bg-200 bg-gradient-secondary hover:bg-[-100%] rounded-full leading-1 transition-all duration-300">
                                                Send Message
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- experience single area -->
                        <div class="md:col-start-8 md:col-span-5">
                            <div class="contact-info-list">
                                <ul class="flex flex-col gap-y-10">
                                    <li class="flex flex-wrap items-center gap-25px position-relative wow fadeInRight"
                                        data-wow-delay=".1s">
                                        <div
                                            class="icon-box text-xl w-50px h-50px text-white-color flex justify-center items-center flex-col bg-gradient-primary-2 rounded-full leading-1">
                                            <i class="flaticon-phone-call leading-1 mt-1"></i>
                                        </div>
                                        <div class="text-box">
                                            <p class="text-primary-color-light dark:text-white-color mb-1">
                                                Phone
                                            </p>
                                            <a href="tel:+92 309 6176606"
                                                class="text-primary-color-light dark:text-white-color text-lg lg:text-xl font-medium hover:text-primary-color">
                                                +92 309 6176606</a>
                                        </div>
                                    </li>
                                    <li class="flex flex-wrap items-center gap-25px position-relative wow fadeInRight"
                                        data-wow-delay=".15s">
                                        <div
                                            class="icon-box text-xl w-50px h-50px text-white-color flex justify-center items-center flex-col bg-gradient-primary-2 rounded-full leading-1">
                                            <i class="flaticon-mail-inbox-app leading-1 mt-1"></i>
                                        </div>
                                        <div class="text-box">
                                            <p class="text-primary-color-light dark:text-white-color mb-1">
                                                Email
                                            </p>
                                            <a href="info@exlontech.com"
                                                class="text-primary-color-light dark:text-white-color text-lg lg:text-xl font-medium hover:text-primary-color">info@exlontech.com</a>
                                        </div>
                                    </li>
                                    <li class="flex flex-wrap items-center gap-25px position-relative wow fadeInRight"
                                        data-wow-delay=".2s">
                                        <div
                                            class="icon-box text-xl w-50px h-50px text-white-color flex justify-center items-center flex-col bg-gradient-primary-2 rounded-full leading-1">
                                            <i class="flaticon-location leading-1 mt-1"></i>
                                        </div>
                                        <div class="text-box">
                                            <p class="text-primary-color-light dark:text-white-color mb-1">
                                                Address
                                            </p>
                                            <a href="#"
                                                class="text-primary-color-light dark:text-white-color text-lg lg:text-xl font-medium hover:text-primary-color">
                                                House # 49-C, Satellite <br />
                                                Sargodha, Pakistan</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
