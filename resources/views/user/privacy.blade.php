@extends('layouts.app')

@section('title', $title ?? 'Privacy Policy | Exlon Tech')

@section('content')
<section class="relative pt-40 pb-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-size-35 md:text-size-50 font-bold text-seondary-color dark:text-white-color mb-4">
            Privacy Policy
        </h1>
        <p class="text-primary-color-light dark:text-body-color mb-10">
            Last updated: {{ date('F j, Y') }}
        </p>

        <div class="space-y-8 text-primary-color-light dark:text-body-color leading-relaxed">
            <p>
                Exlon Tech (“we”, “us”) operates {{ rtrim(\App\Support\SeoMeta::siteUrl(), '/') }}.
                This policy explains what information we collect when you use our website, contact us, or apply for a role, and how we use it.
            </p>

            <div>
                <h2 class="text-2xl font-semibold text-seondary-color dark:text-white-color mb-3">Information we collect</h2>
                <ul class="list-disc pl-5 space-y-2">
                    <li>Contact details you submit (name, email, phone, company, and message).</li>
                    <li>Job application data (resume, portfolio URL, experience, and cover letter).</li>
                    <li>Technical data such as IP address, browser type, and pages visited, collected by the server and analytics tools if enabled.</li>
                </ul>
            </div>

            <div>
                <h2 class="text-2xl font-semibold text-seondary-color dark:text-white-color mb-3">How we use it</h2>
                <p>
                    We use this information to respond to enquiries, deliver services, review applications, improve the website, and meet legal obligations. We do not sell your personal data.
                </p>
            </div>

            <div>
                <h2 class="text-2xl font-semibold text-seondary-color dark:text-white-color mb-3">Sharing</h2>
                <p>
                    We share data only with service providers who help us operate (for example email delivery and hosting), or when required by law. Those providers may process data outside Pakistan.
                </p>
            </div>

            <div>
                <h2 class="text-2xl font-semibold text-seondary-color dark:text-white-color mb-3">Retention</h2>
                <p>
                    Contact messages and application files are kept only as long as needed to handle your request and our ordinary business records, then deleted or archived securely.
                </p>
            </div>

            <div>
                <h2 class="text-2xl font-semibold text-seondary-color dark:text-white-color mb-3">Your choices</h2>
                <p>
                    You can ask to access, correct, or delete your information by emailing
                    <a href="mailto:info@exlontech.com" class="text-primary-color">info@exlontech.com</a>.
                </p>
            </div>

            <div>
                <h2 class="text-2xl font-semibold text-seondary-color dark:text-white-color mb-3">Contact</h2>
                <p>
                    Exlon Tech, Sargodha, Punjab, Pakistan<br>
                    Email: <a href="mailto:info@exlontech.com" class="text-primary-color">info@exlontech.com</a><br>
                    Phone: <a href="tel:+923096176606" class="text-primary-color">+92 309 6176606</a>
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
