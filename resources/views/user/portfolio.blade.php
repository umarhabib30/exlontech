@extends('layouts.app')

@section('title', $title ?? 'Portfolio | Exlon Tech')

@push('styles')
<style>
    .portfolio-page .filter-button-group {
        width: fit-content;
        max-width: 100%;
        margin-left: auto;
        margin-right: auto;
        flex-wrap: wrap;
        gap: 0.15rem;
    }

    .portfolio-page .portfolio-item {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .portfolio-page .portfolio-page__media {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        aspect-ratio: 16 / 9;
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.02);
    }

    .portfolio-page .portfolio-page__image {
        display: block;
        width: 100%;
        max-width: 100%;
        height: 100%;
        margin: 0 auto;
        object-fit: contain;
        object-position: center;
        border-radius: 10px;
    }
</style>
@endpush

@section('content')
    <div class="main-wrapper portfolio-page">
        <section class="relative pt-130px lg:pt-40 xl:pt-200px pb-10 md:pb-30px lg:pb-50px after:absolute after:top-0 after:right-0 after:w-322px after:h-308px after:blur-[150px] after:rounded-50% after:bg-gradient-circle after:-z-1 after:-mt-5% after:-mr-5% overflow-hidden">
            <div class="container">
                <div class="text-center flex flex-col items-center mb-10 md:mb-50px">
                    <h1 class="text-3xl md:text-size-35 lg:text-size-40 xl:text-size-45 bg-gradient-text-light dark:bg-gradient-text bg-clip-text xl:leading-1.2 text-transparent mb-15px wow fadeInUp"
                        data-wow-delay=".3s">
                        Our Recent Works
                    </h1>
                    <p class="text-primary-color-light dark:text-body-color max-w-700px wow fadeInUp"
                        data-wow-delay=".4s">
                        Explore our portfolio of web development, mobile apps, UX/UI design, branding, and digital
                        solutions — crafted to help businesses grow and stand out online.
                    </p>
                </div>
            </div>
        </section>

        <section class="pb-30px md:pb-60px lg:pb-100px">
            <div class="container">
                <div class="portfolio-filter">
                    <div class="button-group filter-button-group mx-auto flex items-center justify-center bg-cream-light-color dark:bg-black rounded-full px-2 py-0 md:py-1.5 relative z-0 wow fadeInUp"
                        data-wow-delay=".5s">
                        <button data-filter="*"
                            class="text-size-15 px-1.5 md:px-25px py-10px md:py-3 text-primary-color dark:text-white-color leading-1 active">
                            All
                        </button>
                        <button data-filter=".uxui"
                            class="text-size-15 px-1.5 md:px-25px py-10px md:py-3 text-primary-color dark:text-white-color leading-1">
                            UX/UI
                        </button>
                        <button data-filter=".branding"
                            class="text-size-15 px-1.5 md:px-25px py-10px md:py-3 text-primary-color dark:text-white-color leading-1">
                            Branding
                        </button>
                        <button data-filter=".web"
                            class="text-size-15 px-1.5 md:px-25px py-10px md:py-3 text-primary-color dark:text-white-color leading-1">
                            Web
                        </button>
                        <button data-filter=".mobile-app"
                            class="text-size-15 px-1.5 md:px-25px py-10px md:py-3 text-primary-color dark:text-white-color leading-1">
                            Apps
                        </button>
                        <div class="active-bg !-z-1"></div>
                    </div>

                    <div class="portfolio-box wow fadeInUp mt-10 md:mt-50px" data-wow-delay=".6s">
                        <div class="portfolio-sizer"></div>
                        <div class="gutter-sizer"></div>

                        <div class="portfolio-item branding bg-primary-color-light px-15px pt-25px pb-0 lg:p-9 lg:pb-0 rounded-10px group relative float-left">
                            <div class="portfolio-page__media">
                                <img src="{{ asset('assets/img/portfolio_images/p2.jpg') }}" alt="Restore Partner Pro"
                                    width="1920" height="1080" loading="lazy" decoding="async"
                                    class="portfolio-page__image" />
                            </div>
                            <div class="absolute left-0 bottom-[15px] group-hover:bottom-5 translate-y-5 group-hover:translate-y-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible w-full px-15px lg:px-5 transition-all duration-300">
                                <a href="https://restorepartnerpro.com/" target="_blank" rel="noopener noreferrer"
                                    class="text-white-color p-15px pr-30px lg:p-5 lg:pr-50px bg-gradient-primary rounded-15px w-full">
                                    <span class="block text-xl md:text-size-25 lg:text-3xl font-bold mb-2 lg:mb-15px">
                                        Restore Partner Pro
                                    </span>
                                    <span class="block text-body-color">
                                        Market Place for restoration companies and plumbers.
                                    </span>
                                    <i class="flaticon-up-right-arrow text-size-15 md:text-xl text-primary-color group-hover:text-white-color absolute top-[20%] lg:top-1/2 right-5 lg:right-[55px] rotate-[-360deg] group-hover:rotate-0 transition-all duration-300"></i>
                                </a>
                            </div>
                        </div>

                        <div class="portfolio-item uxui bg-primary-color-light px-15px pt-25px pb-0 lg:p-9 lg:pb-0 rounded-10px group relative float-left">
                            <div class="portfolio-page__media">
                                <img src="{{ asset('assets/img/portfolio_images/p1.jpg') }}" alt="Global Mind Consultants"
                                    width="1920" height="1080" loading="lazy" decoding="async"
                                    class="portfolio-page__image" />
                            </div>
                            <div class="absolute left-0 bottom-[15px] group-hover:bottom-5 translate-y-5 group-hover:translate-y-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible w-full px-15px lg:px-5 transition-all duration-300">
                                <a href="https://globalmindsconsultants.com/" target="_blank" rel="noopener noreferrer"
                                    class="text-white-color p-15px pr-30px lg:p-5 lg:pr-50px bg-gradient-primary rounded-15px w-full">
                                    <span class="block text-xl md:text-size-25 lg:text-3xl font-bold mb-2 lg:mb-15px">
                                        Global Mind Consultants
                                    </span>
                                    <span class="block text-body-color">
                                        Global Mind Consultants is a visa and immigration consultancy firm.
                                    </span>
                                    <i class="flaticon-up-right-arrow text-size-15 md:text-xl text-primary-color group-hover:text-white-color absolute top-[20%] lg:top-1/2 right-5 lg:right-[55px] rotate-[-360deg] group-hover:rotate-0 transition-all duration-300"></i>
                                </a>
                            </div>
                        </div>

                        <div class="portfolio-item web bg-primary-color-light px-15px pt-25px pb-0 lg:p-9 lg:pb-0 rounded-10px group relative float-left">
                            <div class="portfolio-page__media">
                                <img src="{{ asset('assets/img/portfolio_images/p5.jpg') }}" alt="Booking Management System"
                                    width="1920" height="1080" loading="lazy" decoding="async"
                                    class="portfolio-page__image" />
                            </div>
                            <div class="absolute left-0 bottom-[15px] group-hover:bottom-5 translate-y-5 group-hover:translate-y-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible w-full px-15px lg:px-5 transition-all duration-300">
                                <a href="https://tajmehal.exlontech.com/" target="_blank" rel="noopener noreferrer"
                                    class="text-white-color p-15px pr-30px lg:p-5 lg:pr-50px bg-gradient-primary rounded-15px w-full">
                                    <span class="block text-xl md:text-size-25 lg:text-3xl font-bold mb-2 lg:mb-15px">
                                        Booking Management System
                                    </span>
                                    <span class="block text-body-color">
                                        Booking management system for hotels and restaurants.
                                    </span>
                                    <i class="flaticon-up-right-arrow text-size-15 md:text-xl text-primary-color group-hover:text-white-color absolute top-[20%] lg:top-1/2 right-5 lg:right-[55px] rotate-[-360deg] group-hover:rotate-0 transition-all duration-300"></i>
                                </a>
                            </div>
                        </div>

                        <div class="portfolio-item web bg-primary-color-light px-15px pt-25px pb-0 lg:p-9 lg:pb-0 rounded-10px group relative float-left">
                            <div class="portfolio-page__media">
                                <img src="{{ asset('assets/img/portfolio_images/p6.jpg') }}" alt="Disaster Management System"
                                    width="1920" height="1080" loading="lazy" decoding="async"
                                    class="portfolio-page__image" />
                            </div>
                            <div class="absolute left-0 bottom-[15px] group-hover:bottom-5 translate-y-5 group-hover:translate-y-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible w-full px-15px lg:px-5 transition-all duration-300">
                                <a href="https://distribution.exlontech.com/" target="_blank" rel="noopener noreferrer"
                                    class="text-white-color p-15px pr-30px lg:p-5 lg:pr-50px bg-gradient-primary rounded-15px w-full">
                                    <span class="block text-xl md:text-size-25 lg:text-3xl font-bold mb-2 lg:mb-15px">
                                        Disaster Management System
                                    </span>
                                    <span class="block text-body-color">
                                        Distribution inventory and sales management system.
                                    </span>
                                    <i class="flaticon-up-right-arrow text-size-15 md:text-xl text-primary-color group-hover:text-white-color absolute top-[20%] lg:top-1/2 right-5 lg:right-[55px] rotate-[-360deg] group-hover:rotate-0 transition-all duration-300"></i>
                                </a>
                            </div>
                        </div>

                        <div class="portfolio-item mobile-app bg-primary-color-light px-15px pt-25px pb-0 lg:p-9 lg:pb-0 rounded-10px group relative float-left">
                            <div class="portfolio-page__media">
                                <img src="{{ asset('assets/img/portfolio_images/p7.jpg') }}" alt="HQA School Management System"
                                    width="1920" height="1080" loading="lazy" decoding="async"
                                    class="portfolio-page__image" />
                            </div>
                            <div class="absolute left-0 bottom-[15px] group-hover:bottom-5 translate-y-5 group-hover:translate-y-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible w-full px-15px lg:px-5 transition-all duration-300">
                                <a href="https://hqafund.org/" target="_blank" rel="noopener noreferrer"
                                    class="text-white-color p-15px pr-30px lg:p-5 lg:pr-50px bg-gradient-primary rounded-15px w-full">
                                    <span class="block text-xl md:text-size-25 lg:text-3xl font-bold mb-2 lg:mb-15px">
                                        HQA School Management System
                                    </span>
                                    <span class="block text-body-color">
                                        School management system for schools and colleges.
                                    </span>
                                    <i class="flaticon-up-right-arrow text-size-15 md:text-xl text-primary-color group-hover:text-white-color absolute top-[20%] lg:top-1/2 right-5 lg:right-[55px] rotate-[-360deg] group-hover:rotate-0 transition-all duration-300"></i>
                                </a>
                            </div>
                        </div>

                        <div class="portfolio-item branding bg-primary-color-light px-15px pt-25px pb-0 lg:p-9 lg:pb-0 rounded-10px group relative float-left">
                            <div class="portfolio-page__media">
                                <img src="{{ asset('assets/img/portfolio_images/p3.jpg') }}" alt="The Genius Arena"
                                    width="1920" height="1080" loading="lazy" decoding="async"
                                    class="portfolio-page__image" />
                            </div>
                            <div class="absolute left-0 bottom-[15px] group-hover:bottom-5 translate-y-5 group-hover:translate-y-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible w-full px-15px lg:px-5 transition-all duration-300">
                                <a href="{{ route('home') }}#contact"
                                    class="text-white-color p-15px pr-30px lg:p-5 lg:pr-50px bg-gradient-primary rounded-15px w-full">
                                    <span class="block text-xl md:text-size-25 lg:text-3xl font-bold mb-2 lg:mb-15px">
                                        The Genius Arena
                                    </span>
                                    <span class="block text-body-color">
                                        Online gaming and tournament platform.
                                    </span>
                                    <i class="flaticon-up-right-arrow text-size-15 md:text-xl text-primary-color group-hover:text-white-color absolute top-[20%] lg:top-1/2 right-5 lg:right-[55px] rotate-[-360deg] group-hover:rotate-0 transition-all duration-300"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pb-30px md:pb-60px lg:pb-100px">
            <div class="container">
                <div class="text-center flex flex-col items-center mb-10 md:mb-50px">
                    <h2 class="text-3xl md:text-size-35 lg:text-size-40 bg-gradient-text-light dark:bg-gradient-text bg-clip-text text-transparent mb-15px">
                        Selected Case Studies
                    </h2>
                    <p class="text-primary-color-light dark:text-body-color max-w-700px">
                        A closer look at the type of business problems ExlonTech solves through custom web platforms,
                        operational systems, branding, and digital product development.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 gap-25px">
                    <article class="p-25px rounded-10px bg-cream-light-color dark:bg-seondary-color">
                        <h2 class="text-2xl text-primary-color dark:text-white-color mb-10px">Hotel Booking Management System</h2>
                        <p class="text-primary-color-light dark:text-body-color"><strong>Client Type:</strong> Hospitality business</p>
                        <p class="text-primary-color-light dark:text-body-color"><strong>Problem:</strong> The client needed a centralized way to manage bookings, rooms, customers, and daily operations.</p>
                        <p class="text-primary-color-light dark:text-body-color"><strong>Solution:</strong> ExlonTech developed a custom booking management platform with admin dashboard, booking calendar, customer records, room management, and reporting tools.</p>
                        <p class="text-primary-color-light dark:text-body-color"><strong>Technologies:</strong> Laravel, MySQL, JavaScript, Bootstrap</p>
                        <p class="text-primary-color-light dark:text-body-color"><strong>Result:</strong> The system helped reduce manual booking work and improve operational control.</p>
                    </article>

                    <article class="p-25px rounded-10px bg-cream-light-color dark:bg-seondary-color">
                        <h2 class="text-2xl text-primary-color dark:text-white-color mb-10px">Distribution Inventory & Sales System</h2>
                        <p class="text-primary-color-light dark:text-body-color"><strong>Client Type:</strong> Distribution and operations business</p>
                        <p class="text-primary-color-light dark:text-body-color"><strong>Problem:</strong> The business needed better visibility into stock, sales activity, customer records, and operational reporting.</p>
                        <p class="text-primary-color-light dark:text-body-color"><strong>Solution:</strong> ExlonTech created a web-based management system for inventory, sales records, reporting, and admin workflows.</p>
                        <p class="text-primary-color-light dark:text-body-color"><strong>Technologies:</strong> Laravel, MySQL, JavaScript, Bootstrap</p>
                        <p class="text-primary-color-light dark:text-body-color"><strong>Result:</strong> The platform improved day-to-day control and reduced reliance on scattered manual records.</p>
                    </article>

                    <article class="p-25px rounded-10px bg-cream-light-color dark:bg-seondary-color">
                        <h2 class="text-2xl text-primary-color dark:text-white-color mb-10px">Global Mind Consultants Website</h2>
                        <p class="text-primary-color-light dark:text-body-color"><strong>Client Type:</strong> Professional services firm</p>
                        <p class="text-primary-color-light dark:text-body-color"><strong>Problem:</strong> The consultancy needed a credible online presence that clearly presented services and encouraged inquiries.</p>
                        <p class="text-primary-color-light dark:text-body-color"><strong>Solution:</strong> ExlonTech delivered a responsive website with service pages, conversion-focused content structure, and a professional visual experience.</p>
                        <p class="text-primary-color-light dark:text-body-color"><strong>Result:</strong> The website gives the brand a stronger trust signal for prospective clients.</p>
                    </article>

                    <article class="p-25px rounded-10px bg-cream-light-color dark:bg-seondary-color">
                        <h2 class="text-2xl text-primary-color dark:text-white-color mb-10px">Restore Partner Pro Marketplace</h2>
                        <p class="text-primary-color-light dark:text-body-color"><strong>Client Type:</strong> Service marketplace</p>
                        <p class="text-primary-color-light dark:text-body-color"><strong>Problem:</strong> The business needed a platform to connect restoration companies and plumbers through a clearer digital workflow.</p>
                        <p class="text-primary-color-light dark:text-body-color"><strong>Solution:</strong> ExlonTech supported a marketplace experience with structured service presentation and user-focused web delivery.</p>
                        <p class="text-primary-color-light dark:text-body-color"><strong>Result:</strong> The platform presents the service model more clearly for users and partners.</p>
                    </article>
                </div>

                <div class="text-center mt-30px">
                    <a href="{{ route('home') }}#contact"
                        class="text-size-15 font-medium text-primary-color hover:text-body-color capitalize py-17px px-35px bg-transparent hover:bg-primary-color rounded-full leading-1 border border-primary-color">
                        Book a free software consultation
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection
