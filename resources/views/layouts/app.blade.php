<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    @include('layouts.partials.meta')
    <link rel="stylesheet" href="{{ public_asset('assets/css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ public_asset('assets/css/font-awesome-pro.min.css') }}" />
    <link rel="stylesheet" href="{{ public_asset('assets/css/flaticon_gerold.css') }}" />
    <link rel="stylesheet" href="{{ public_asset('assets/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ public_asset('assets/css/backToTop.css') }}" />
    <link rel="stylesheet" href="{{ public_asset('assets/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ public_asset('assets/css/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ public_asset('assets/css/odometer-theme-default.css') }}" />
    <link rel="stylesheet" href="{{ public_asset('assets/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ public_asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ public_asset('assets/css/site-footer.css') }}" />
    <link rel="stylesheet" href="{{ public_asset('assets/css/services-dropdown.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('styles')
    <style>
        .exlon-submit-loader {
            position: fixed;
            inset: 0;
            z-index: 99999;
            display: none;
            place-items: center;
            background: rgba(15, 7, 21, 0.72);
            backdrop-filter: blur(8px);
        }

        .exlon-submit-loader.is-active {
            display: grid;
        }

        .exlon-submit-loader__box {
            display: flex;
            align-items: center;
            gap: 0.9rem;
            color: #f7f3ff;
            padding: 1rem 1.25rem;
            border-radius: 1rem;
            background: linear-gradient(145deg, rgba(27, 16, 38, 0.96), rgba(12, 7, 21, 0.96));
            border: 1px solid rgba(135, 80, 247, 0.32);
            box-shadow: 0 24px 48px rgba(0, 0, 0, 0.32);
        }

        .exlon-submit-loader__spinner {
            width: 1.65rem;
            height: 1.65rem;
            border-radius: 999px;
            border: 3px solid rgba(181, 125, 255, 0.25);
            border-top-color: #8750f7;
            animation: exlon-submit-spin 0.8s linear infinite;
        }

        @keyframes exlon-submit-spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="@yield('body_class', 'font-sora dark:bg-dark-color')">
    <div class="exlon-submit-loader" data-submit-loader aria-hidden="true">
        <div class="exlon-submit-loader__box">
            <span class="exlon-submit-loader__spinner"></span>
            <span>Submitting...</span>
        </div>
    </div>

    <div class="preloader">
        <svg viewBox="0 0 1000 1000" preserveAspectRatio="none">
            <path id="preloaderSvg" d="M0,1005S175,995,500,995s500,5,500,5V0H0Z"></path>
        </svg>

        <div class="preloader-heading">
            <div class="load-text">
                <span>L</span>
                <span>o</span>
                <span>a</span>
                <span>d</span>
                <span>i</span>
                <span>n</span>
                <span>g</span>
            </div>
        </div>
    </div>

    <div class="fixed top-[200px] lg:top-[300px] transition-all duration-300 right-[-50px] hover:right-0 z-4xl">
        <button
            class="theme-controller w-90px h-10 bg-200 bg-gradient-secondary hover:bg-[-100%] rounded-l-full text-whiteColor px-10px flex items-center transition-all duration-300 font-sora">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-10px w-5 block dark:hidden" viewBox="0 0 512 512">
                <path
                    d="M160 136c0-30.62 4.51-61.61 16-88C99.57 81.27 48 159.32 48 248c0 119.29 96.71 216 216 216 88.68 0 166.73-51.57 200-128-26.39 11.49-57.38 16-88 16-119.29 0-216-96.71-216-216z"
                    fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="32"></path>
            </svg>
            <span class="text-base block dark:hidden">Dark</span>

            <svg xmlns="http://www.w3.org/2000/svg" class="hidden mr-10px w-5 dark:block" viewBox="0 0 512 512">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                    stroke-width="32"
                    d="M256 48v48M256 416v48M403.08 108.92l-33.94 33.94M142.86 369.14l-33.94 33.94M464 256h-48M96 256H48M403.08 403.08l-33.94-33.94M142.86 142.86l-33.94-33.94">
                </path>
                <circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-miterlimit="10" stroke-width="32"></circle>
            </svg>
            <span class="text-base hidden dark:block">Light</span>
        </button>
    </div>

    <div class="progress-wrap" id="scrollUp">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <header class="header-area header-absolute">
        <div class="pt-15px xl:pt-5 pb-5 md:pb-30px xl:pb-5 relative">
            <div class="container">
                <div class="flex flex-wrap justify-between items-center">
                    <div>
                        <ul class="flex items-center gap-x-15px xl:gap-x-35px">
                            <li>
                                <a href="{{ route('home') }}" class="logo">
                                    <img class="hidden dark:inline-block" style="width: 160px;"
                                        src="{{ public_asset('assets/img/logo/logo.png') }}" alt="Exlon Tech" />
                                    <img class="inlin-block dark:hidden" style="width: 160px;"
                                        src="{{ public_asset('assets/img/logo/logo-dark.png') }}" alt="Exlon Tech" />
                                </a>
                            </li>
                            {{-- <li class="hidden md:block">
                                <a href="mailto:info@exlontech.com"
                                    class="text-size-15 font-medium text-seondary-color dark:text-white-color">info@exlontech.com</a>
                            </li> --}}
                        </ul>
                    </div>
                    <nav>
                        @include('layouts.partials.nav')
                    </nav>
                </div>
            </div>
            <div
                class="mobile-menu absolute left-0 top-full min-h-screen-90 w-full bg-seondary-color block origin-top-left lg:hidden">
                <div class="container py-5">
                    @include('layouts.partials.mobile-nav')
                </div>
            </div>
        </div>
    </header>

    <header class="header-area header-2 header-sticky">
        <div class="py-10px relative">
            <div class="container">
                <div class="flex flex-wrap justify-between items-center">
                    <div>
                        <ul class="flex items-center gap-x-15px xl:gap-x-35px">
                            <li>
                                <a href="{{ route('home') }}" class="logo">
                                    <img class="hidden dark:inline-block" style="width: 160px;"
                                        src="{{ public_asset('assets/img/logo/logo.png') }}" alt="Exlon Tech" />
                                    <img class="inlin-block dark:hidden" style="width: 160px;"
                                        src="{{ public_asset('assets/img/logo/logo-dark.png') }}" alt="Exlon Tech" />
                                </a>
                            </li>
                            {{-- <li class="hidden md:block">
                                <a href="mailto:info@exlontech.com"
                                    class="text-size-15 font-medium text-seondary-color dark:text-white-color">info@exlontech.com</a>
                            </li> --}}
                        </ul>
                    </div>
                    <nav>
                        @include('layouts.partials.nav')
                    </nav>
                </div>
            </div>
            <div
                class="mobile-menu absolute left-0 top-full min-h-screen-90 w-full bg-seondary-color block origin-top-left lg:hidden">
                <div class="container py-5">
                    @include('layouts.partials.mobile-nav')
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    @include('layouts.partials.footer')

    <script src="{{ public_asset('assets/js/gsap.min.js') }}"></script>
    <script src="{{ public_asset('assets/js/appear.min.js') }}"></script>
    <script src="{{ public_asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ public_asset('assets/js/odometer.min.js') }}"></script>
    <script src="{{ public_asset('assets/js/imagesloaded-pkgd.js') }}"></script>
    <script src="{{ public_asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ public_asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ public_asset('assets/js/nice-select.min.js') }}"></script>
    <script src="{{ public_asset('assets/js/backToTop.js') }}"></script>
    <script src="{{ public_asset('assets/js/lenis.min.js') }}"></script>
    <script src="{{ public_asset('assets/js/theme-controller.js') }}"></script>
    <script src="{{ public_asset('assets/js/main.js') }}"></script>
    <script>
        const exlonAlert = Swal.mixin({
            confirmButtonColor: '#8750f7',
            background: '#140c1c',
            color: '#f7f3ff',
            customClass: {
                popup: 'exlon-swal-popup',
                confirmButton: 'exlon-swal-confirm'
            }
        });

        document.querySelectorAll('[data-ajax-form]').forEach((form) => {
            form.addEventListener('submit', async (event) => {
                event.preventDefault();

                const submitButton = form.querySelector('[type="submit"]');
                const loader = document.querySelector('[data-submit-loader]');

                if (submitButton) {
                    submitButton.disabled = true;
                }

                loader?.classList.add('is-active');

                try {
                    const response = await fetch(form.action, {
                        method: form.method || 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: new FormData(form)
                    });

                    const result = await response.json().catch(() => ({}));

                    if (!response.ok) {
                        const validationMessage = result.errors
                            ? Object.values(result.errors).flat()[0]
                            : result.message;

                        throw new Error(validationMessage || 'Please check the form and try again.');
                    }

                    loader?.classList.remove('is-active');

                    await exlonAlert.fire({
                        icon: 'success',
                        title: 'Submitted',
                        text: result.message || form.dataset.successMessage || 'Submitted successfully.',
                        iconColor: '#8750f7'
                    });

                    form.reset();

                    if (window.jQuery && jQuery.fn.niceSelect) {
                        jQuery(form).find('select').niceSelect('update');
                    }
                } catch (error) {
                    exlonAlert.fire({
                        icon: 'error',
                        title: 'Submission Failed',
                        text: error.message || 'Please try again.',
                        iconColor: '#ef4444',
                        confirmButtonColor: '#8750f7'
                    });
                } finally {
                    if (submitButton) {
                        submitButton.disabled = false;
                    }
                    loader?.classList.remove('is-active');
                }
            });
        });
    </script>
    @if (session('success'))
        <script>
            exlonAlert.fire({
                icon: 'success',
                title: 'Submitted',
                text: @json(session('success')),
                iconColor: '#8750f7'
            });
        </script>
    @endif
    @stack('scripts')
</body>

</html>
