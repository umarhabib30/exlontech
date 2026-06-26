@php
    $home = route('home');
@endphp

<ul class="ml-4">
    <li>
        <a class="text-size-25 text-white-color uppercase leading-1.2 py-15px mobile-services-label" href="{{ $home }}#services">
            Services
            <i class="fa-solid fa-chevron-down"></i>
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
    <li>
        <a class="text-size-25 text-white-color uppercase leading-1.2 py-15px" href="{{ route('portfolio') }}">
            Portfolio
        </a>
    </li>
    <li>
        <a class="text-size-25 text-white-color uppercase leading-1.2 py-15px" href="{{ $home }}#skills">
            Technologies
        </a>
    </li>
    <li>
        <a class="text-size-25 text-white-color uppercase leading-1.2 py-15px" href="{{ $home }}#testimonials">
            Testimonials
        </a>
    </li>
    <li>
        <a class="text-size-25 text-white-color uppercase leading-1.2 py-15px" href="{{ route('careers.index') }}">
            Career
        </a>
    </li>
    <li>
        <a class="text-size-25 text-white-color uppercase leading-1.2 py-15px" href="{{ $home }}#contact">
            Contact
        </a>
    </li>
</ul>
