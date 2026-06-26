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
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.02);
    }

    .portfolio-page .portfolio-page__image {
        display: block;
        width: 100%;
        max-width: 100%;
        height: auto;
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
                                <img src="{{ asset('assets/img/portfolio_images/p2.png') }}" alt="Restore Partner Pro"
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
                                <img src="{{ asset('assets/img/portfolio_images/p1.png') }}" alt="Global Mind Consultants"
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
                                <img src="{{ asset('assets/img/portfolio_images/p5.png') }}" alt="Booking Management System"
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
                                <img src="{{ asset('assets/img/portfolio_images/p6.png') }}" alt="Disaster Management System"
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
                                <img src="{{ asset('assets/img/portfolio_images/p7.png') }}" alt="HQA School Management System"
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
                                <img src="{{ asset('assets/img/portfolio_images/p3.png') }}" alt="The Genius Arena"
                                    class="portfolio-page__image" />
                            </div>
                            <div class="absolute left-0 bottom-[15px] group-hover:bottom-5 translate-y-5 group-hover:translate-y-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible w-full px-15px lg:px-5 transition-all duration-300">
                                <a href="#"
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
    </div>
@endsection
