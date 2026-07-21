@php
    $home = route('home');
@endphp

<div class="mobile-nav-wrapper py-2">
    <ul class="mobile-nav-list">
        {{-- Services --}}
        <li class="mobile-nav-item">
            <a class="mobile-nav-link mobile-services-label" href="{{ $home }}#services">
                <div class="mobile-nav-link-content">
                    <span class="mobile-nav-icon-badge">
                        <i class="fa-solid fa-layer-group"></i>
                    </span>
                    <span class="mobile-nav-title">Services</span>
                </div>
                <i class="fa-solid fa-chevron-down mobile-nav-chevron"></i>
            </a>
            <div class="mobile-services-submenu">
                @foreach ($servicesMegaMenu as $group)
                    <div class="mobile-services-group">
                        <div class="mobile-services-group__label">
                            <i class="fa-solid {{ $group['icon'] }}"></i>
                            {{ $group['label'] }}
                        </div>
                        <ul class="mobile-services-group__list">
                            @foreach ($group['items'] as $service)
                                <li>
                                    <a href="{{ route($service['route']) }}">
                                        <i class="fa-solid {{ $service['icon'] }}"></i>
                                        {{ $service['title'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </li>

        {{-- About Us --}}
        <li class="mobile-nav-item">
            <a class="mobile-nav-link" href="{{ route('about') }}">
                <div class="mobile-nav-link-content">
                    <span class="mobile-nav-icon-badge">
                        <i class="fa-solid fa-circle-info"></i>
                    </span>
                    <span class="mobile-nav-title">About Us</span>
                </div>
                <i class="fa-solid fa-chevron-right mobile-nav-arrow"></i>
            </a>
        </li>

        {{-- Portfolio --}}
        <li class="mobile-nav-item">
            <a class="mobile-nav-link" href="{{ route('portfolio') }}">
                <div class="mobile-nav-link-content">
                    <span class="mobile-nav-icon-badge">
                        <i class="fa-solid fa-briefcase"></i>
                    </span>
                    <span class="mobile-nav-title">Portfolio</span>
                </div>
                <i class="fa-solid fa-chevron-right mobile-nav-arrow"></i>
            </a>
        </li>

        {{-- Technologies --}}
        <li class="mobile-nav-item">
            <a class="mobile-nav-link" href="{{ $home }}#skills">
                <div class="mobile-nav-link-content">
                    <span class="mobile-nav-icon-badge">
                        <i class="fa-solid fa-microchip"></i>
                    </span>
                    <span class="mobile-nav-title">Technologies</span>
                </div>
                <i class="fa-solid fa-chevron-right mobile-nav-arrow"></i>
            </a>
        </li>

        {{-- Testimonials --}}
        <li class="mobile-nav-item">
            <a class="mobile-nav-link" href="{{ $home }}#testimonials">
                <div class="mobile-nav-link-content">
                    <span class="mobile-nav-icon-badge">
                        <i class="fa-solid fa-star"></i>
                    </span>
                    <span class="mobile-nav-title">Testimonials</span>
                </div>
                <i class="fa-solid fa-chevron-right mobile-nav-arrow"></i>
            </a>
        </li>

        {{-- Career --}}
        <li class="mobile-nav-item">
            <a class="mobile-nav-link" href="{{ route('careers.index') }}">
                <div class="mobile-nav-link-content">
                    <span class="mobile-nav-icon-badge">
                        <i class="fa-solid fa-rocket"></i>
                    </span>
                    <span class="mobile-nav-title">Career</span>
                </div>
                <i class="fa-solid fa-chevron-right mobile-nav-arrow"></i>
            </a>
        </li>

        {{-- Contact --}}
        <li class="mobile-nav-item">
            <a class="mobile-nav-link" href="{{ $home }}#contact">
                <div class="mobile-nav-link-content">
                    <span class="mobile-nav-icon-badge">
                        <i class="fa-solid fa-paper-plane"></i>
                    </span>
                    <span class="mobile-nav-title">Contact</span>
                </div>
                <i class="fa-solid fa-chevron-right mobile-nav-arrow"></i>
            </a>
        </li>
    </ul>

    {{-- Mobile CTA Button --}}
    <div class="mobile-nav-cta-wrapper">
        <a href="{{ $home }}#contact" class="mobile-nav-cta-btn">
            <span>Hire Us!</span>
            <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>
</div>
