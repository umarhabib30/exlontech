<footer class="site-footer">
    <div class="site-footer__glow" aria-hidden="true"></div>

    <div class="container">
        <div class="site-footer__inner">
        <div class="site-footer__brand">
            <a href="{{ route('home') }}" class="site-footer__logo-wrap">
                <img src="{{ public_asset('assets/img/logo/logo.png') }}" alt="ExlonTech Logo" class="site-footer__logo site-footer__logo--dark" />
                <img src="{{ public_asset('assets/img/logo/logo-dark.png') }}" alt="ExlonTech Logo" class="site-footer__logo site-footer__logo--light" />
            </a>

            <p class="site-footer__tagline">
                Turning Ideas into Digital Reality.
            </p>

            <a href="#" class="site-footer__legal-link">Privacy Policy</a>

            <ul class="site-footer__socials">
                <li>
                    <a href="https://www.facebook.com/exlontech/" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/exlontech/" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.linkedin.com/company/exlon-tech" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.pinterest.com/exlontech/" target="_blank" rel="noopener noreferrer" aria-label="Pinterest">
                        <i class="fa-brands fa-pinterest-p"></i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="site-footer__services">
            <h3 class="site-footer__column-title">Services</h3>
            <ul class="site-footer__links">
                <li><a href="{{ route('web-development') }}">Website Development</a></li>
                <li><a href="{{ route('mobile-app-development') }}">App Development</a></li>
                <li><a href="{{ route('ux-ui-design') }}">UI/UX Design</a></li>
                <li><a href="{{ route('graphic-designing') }}">Graphics Designing</a></li>
                <li><a href="{{ route('digital-marketing') }}">Digital Marketing</a></li>
                <li><a href="{{ route('seo') }}">SEO</a></li>
                <li><a href="{{ route('video-editing') }}">Video Editing</a></li>
            </ul>
        </div>

        <div class="site-footer__contact">
            <h3 class="site-footer__column-title">Get in Touch</h3>

            <ul class="site-footer__contact-list">
                <li class="site-footer__contact-item">
                    <span class="site-footer__contact-icon"><i class="fa-solid fa-phone"></i></span>
                    <a href="tel:03096176606">0309-6176606</a>
                </li>
                <li class="site-footer__contact-item">
                    <span class="site-footer__contact-icon"><i class="fa-solid fa-envelope"></i></span>
                    <a href="mailto:info@exlontech.com">info@exlontech.com</a>
                </li>
                <li class="site-footer__contact-item">
                    <span class="site-footer__contact-icon"><i class="fa-solid fa-location-dot"></i></span>
                    <span>Sargodha, Pakistan</span>
                </li>
            </ul>

            <div class="site-footer__newsletter">
                <h4 class="site-footer__newsletter-title">Join Our Newsletter</h4>
                <form class="site-footer__newsletter-form">
                    <input type="email" placeholder="Enter your email" aria-label="Email address" />
                    <button type="button">Subscribe</button>
                </form>
            </div>
        </div>
        </div>

        <div class="site-footer__bottom">
            <p>
                &copy; {{ date('Y') }} <span class="site-footer__brand-name">ExlonTech</span>. All Rights Reserved.
            </p>
        </div>
    </div>
</footer>
