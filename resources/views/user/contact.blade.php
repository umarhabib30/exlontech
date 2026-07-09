@extends('layouts.app')

@section('title', $title)

@section('content')
    <main class="main-wrapper">
        <section class="relative pt-130px lg:pt-40 xl:pt-200px pb-60px md:pb-20 overflow-hidden">
            <div class="container">
                <p class="text-primary-color font-bold uppercase tracking-[0.14em] mb-15px">Contact ExlonTech</p>
                <h1 class="text-3xl md:text-size-45 lg:text-size-50 bg-gradient-text-light dark:bg-gradient-text bg-clip-text text-transparent mb-15px max-w-900px">
                    Start Your Web, App, Software, SEO or Marketing Project
                </h1>
                <p class="text-primary-color-light dark:text-body-color max-w-760px text-lg leading-1.8">
                    Tell us what you want to build or improve. ExlonTech helps global businesses plan and deliver
                    websites, mobile apps, custom software, ecommerce stores, SEO campaigns, branding, and digital
                    marketing systems.
                </p>
            </div>
        </section>

        <section class="pb-60px md:pb-100px">
            <div class="container">
                <div class="grid lg:grid-cols-2 gap-30px items-start">
                    <form action="{{ route('contact-us') }}" method="POST" data-ajax-form data-success-message="Thanks for contacting us. We will get in touch soon." class="p-25px rounded-10px bg-cream-light-color dark:bg-seondary-color">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-15px">
                            <label class="block">
                                <span class="text-primary-color dark:text-white-color">First Name</span>
                                <input type="text" name="first_name" required class="w-full mt-2 p-3 rounded-10px border border-primary-color bg-transparent text-primary-color dark:text-white-color">
                            </label>
                            <label class="block">
                                <span class="text-primary-color dark:text-white-color">Last Name</span>
                                <input type="text" name="last_name" class="w-full mt-2 p-3 rounded-10px border border-primary-color bg-transparent text-primary-color dark:text-white-color">
                            </label>
                        </div>
                        <label class="block mt-15px">
                            <span class="text-primary-color dark:text-white-color">Email</span>
                            <input type="email" name="email" required class="w-full mt-2 p-3 rounded-10px border border-primary-color bg-transparent text-primary-color dark:text-white-color">
                        </label>
                        <label class="block mt-15px">
                            <span class="text-primary-color dark:text-white-color">Service</span>
                            <select name="service" class="w-full mt-2 p-3 rounded-10px border border-primary-color bg-transparent text-primary-color dark:text-white-color">
                                <option value="">Select a service</option>
                                <option>Web Development</option>
                                <option>Mobile App Development</option>
                                <option>Custom Software & SaaS</option>
                                <option>Ecommerce Development</option>
                                <option>SEO Services</option>
                                <option>Digital Marketing</option>
                                <option>UI/UX Design</option>
                            </select>
                        </label>
                        <label class="block mt-15px">
                            <span class="text-primary-color dark:text-white-color">Message</span>
                            <textarea name="message" required rows="6" class="w-full mt-2 p-3 rounded-10px border border-primary-color bg-transparent text-primary-color dark:text-white-color"></textarea>
                        </label>
                        <button type="submit" class="mt-20px text-size-15 font-medium text-white-color capitalize py-17px px-35px bg-gradient-secondary rounded-full leading-1">
                            Start Your Project
                        </button>
                    </form>

                    <aside class="p-25px rounded-10px bg-cream-light-color dark:bg-seondary-color">
                        <h2 class="text-2xl text-primary-color dark:text-white-color mb-10px">Project Conversations We Can Help With</h2>
                        <ul class="text-primary-color-light dark:text-body-color leading-1.8 pl-5 list-disc">
                            <li>Planning a new website, ecommerce store, SaaS platform, or mobile app</li>
                            <li>Improving an existing website’s SEO, UX, speed, and conversion flow</li>
                            <li>Hiring remote Laravel, Flutter, design, or marketing support</li>
                            <li>Building a realistic roadmap, scope, and delivery plan</li>
                        </ul>
                        <p class="text-primary-color-light dark:text-body-color mt-20px">
                            Email: <a href="mailto:info@exlontech.com" class="text-primary-color">info@exlontech.com</a><br>
                            Location signal: Sargodha, Pakistan
                        </p>
                    </aside>
                </div>
            </div>
        </section>
    </main>
@endsection
