@php
    $home = route('home');
@endphp

<ul class="nav flex items-center gap-x-5 xl:gap-x-30px 2xl:gap-x-45px">
    <li class="nav_item group relative has-dropdown has-mega-menu hidden lg:block">
        <a href="{{ $home }}#services"
            class="services-nav-trigger text-size-15 font-medium text-seondary-color dark:text-white-color capitalize py-10px md:py-15px lg:py-25px 2xl:py-30px relative z-0 after:w-0 after:h-0.5 after:bg-gradient-primary after:absolute after:right-0 hover:after:left-0 after:bottom-[25px] after:transition-all after:duration-500 group-hover:after:w-full">
            Services
            <i class="fa-solid fa-chevron-down services-nav-chevron"></i>
        </a>

        <div class="services-mega-menu" role="menu" aria-label="Services">
            <div class="services-mega-menu__panel">
                <aside class="services-mega-menu__aside">
                    <span class="services-mega-menu__eyebrow">Our Services</span>
                    <h3 class="services-mega-menu__heading">Digital solutions built for growth</h3>
                    <p class="services-mega-menu__intro">
                        From development and design to marketing and media — explore everything we offer.
                    </p>
                    <a href="{{ $home }}#services" class="services-mega-menu__view-all">
                        View all services
                        <i class="fa-solid fa-arrow-right-long"></i>
                    </a>
                    <a href="{{ $home }}#contact" class="services-mega-menu__cta">
                        Get a free proposal
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </aside>

                <div class="services-mega-menu__columns">
                    @foreach ($servicesMegaMenu as $column)
                        <div class="services-mega-menu__column">
                            <h4 class="services-mega-menu__column-title">
                                <i class="fa-solid {{ $column['icon'] }}"></i>
                                {{ $column['label'] }}
                            </h4>
                            <ul class="services-mega-menu__list">
                                @foreach ($column['items'] as $service)
                                    <li class="services-mega-menu__item">
                                        <a href="{{ route($service['route']) }}" class="services-mega-menu__link" role="menuitem">
                                            <span class="services-mega-menu__icon">
                                                <i class="fa-solid {{ $service['icon'] }}"></i>
                                            </span>
                                            <span class="services-mega-menu__text">
                                                <span class="services-mega-menu__title">{{ $service['title'] }}</span>
                                                <span class="services-mega-menu__desc">{{ $service['desc'] }}</span>
                                            </span>
                                            <i class="fa-solid fa-arrow-right services-mega-menu__arrow"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </li>

    <li class="nav_item group relative hidden lg:block">
        <a href="{{ route('about') }}"
            class="text-size-15 font-medium text-seondary-color dark:text-white-color capitalize py-10px md:py-15px lg:py-25px 2xl:py-30px relative z-0 after:w-0 after:h-0.5 after:bg-gradient-primary after:absolute after:right-0 hover:after:left-0 after:bottom-[25px] after:transition-all after:duration-500 group-hover:after:w-full">About Us
        </a>
    </li>
    <li class="nav_item group relative hidden lg:block">
        <a href="{{ route('portfolio') }}"
            class="text-size-15 font-medium text-seondary-color dark:text-white-color capitalize py-10px md:py-15px lg:py-25px 2xl:py-30px relative z-0 after:w-0 after:h-0.5 after:bg-gradient-primary after:absolute after:right-0 hover:after:left-0 after:bottom-[25px] after:transition-all after:duration-500 group-hover:after:w-full">Portfolio
        </a>
    </li>
    <li class="nav_item group relative hidden lg:block">
        <a href="{{ $home }}#skills"
            class="text-size-15 font-medium text-seondary-color dark:text-white-color capitalize py-10px md:py-15px lg:py-25px 2xl:py-30px relative z-0 after:w-0 after:h-0.5 after:bg-gradient-primary after:absolute after:right-0 hover:after:left-0 after:bottom-[25px] after:transition-all after:duration-500 group-hover:after:w-full">Technologies
        </a>
    </li>
    <li class="nav_item group relative hidden lg:block">
        <a href="{{ $home }}#testimonials"
            class="text-size-15 font-medium text-seondary-color dark:text-white-color capitalize py-10px md:py-15px lg:py-25px 2xl:py-30px relative z-0 after:w-0 after:h-0.5 after:bg-gradient-primary after:absolute after:right-0 hover:after:left-0 after:bottom-[25px] after:transition-all after:duration-500 group-hover:after:w-full">Testimonials
        </a>
    </li>
    <li class="nav_item group relative hidden lg:block">
        <a href="{{ route('careers.index') }}"
            class="text-size-15 font-medium text-seondary-color dark:text-white-color capitalize py-10px md:py-15px lg:py-25px 2xl:py-30px relative z-0 after:w-0 after:h-0.5 after:bg-gradient-primary after:absolute after:right-0 hover:after:left-0 after:bottom-[25px] after:transition-all after:duration-500 group-hover:after:w-full">Career
        </a>
    </li>
    <li class="nav_item group relative hidden lg:block">
        <a href="{{ $home }}#contact"
            class="text-size-15 font-medium text-seondary-color dark:text-white-color capitalize py-10px md:py-15px lg:py-25px 2xl:py-30px relative z-0 after:w-0 after:h-0.5 after:bg-gradient-primary after:absolute after:right-0 hover:after:left-0 after:bottom-[25px] after:transition-all after:duration-500 group-hover:after:w-full">Contact
        </a>
    </li>
    <li class="hidden lg:block">
        <a href="{{ $home }}#contact"
            class="text-size-15 font-bold text-white-color capitalize py-17px px-35px ml-10px bg-200 bg-gradient-secondary hover:bg-[-100%] rounded-full leading-1 transition-all duration-300">Hire
            Us!</a>
    </li>
    <li class="menu-bar lg:hidden flex items-center justify-center my-auto">
        <div class="menu-bar flex items-center justify-center">
            <button type="button">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </li>
</ul>
