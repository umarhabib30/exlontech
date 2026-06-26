@extends('layouts.app')

@section('title', $title ?? 'Job | Exlon Tech')

@push('styles')
    <style>
        .career-detail {
            background: #0f0715;
            color: #fff;
        }

        .career-detail__hero {
            padding: 10rem 0 3rem;
            background:
                radial-gradient(circle at 85% 0%, rgba(135, 80, 247, 0.28), transparent 26rem),
                #0f0715;
        }

        .career-detail__title {
            max-width: 820px;
            margin: 0;
            font-size: clamp(2rem, 4.5vw, 4rem);
            line-height: 1.08;
            background: linear-gradient(90deg, #fff, #b57dff);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .career-detail__meta {
            display: flex;
            flex-wrap: wrap;
            gap: 0.6rem;
            margin-top: 1.25rem;
        }

        .job-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            border-radius: 999px;
            padding: 0.42rem 0.7rem;
            color: #d8c9ff;
            background: rgba(135, 80, 247, 0.14);
            border: 1px solid rgba(135, 80, 247, 0.24);
            font-size: 0.8rem;
        }

        .career-detail__body {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 25rem;
            gap: 1.5rem;
            padding: 2rem 0 6rem;
        }

        .career-panel {
            border-radius: 1rem;
            padding: 1.5rem;
            background: linear-gradient(145deg, rgba(27, 16, 38, 0.96), rgba(12, 7, 21, 0.96));
            border: 1px solid rgba(135, 80, 247, 0.24);
            box-shadow: 0 24px 48px rgba(0, 0, 0, 0.28);
        }

        .career-panel + .career-panel {
            margin-top: 1rem;
        }

        .career-panel h2 {
            margin: 0 0 0.85rem;
            font-size: 1.15rem;
        }

        .career-panel p,
        .career-panel div {
            color: #c8b9dd;
            line-height: 1.8;
        }

        .career-rich-content p,
        .career-rich-content ul,
        .career-rich-content ol,
        .career-rich-content blockquote {
            margin: 0 0 0.9rem;
        }

        .career-rich-content ul,
        .career-rich-content ol {
            padding-left: 1.5rem;
        }

        .career-rich-content li {
            margin-bottom: 0.35rem;
        }

        .career-rich-content strong,
        .career-rich-content b {
            color: #fff;
        }

        .career-rich-content a {
            color: #b57dff;
            text-decoration: underline;
        }

        .career-field {
            display: grid;
            gap: 0.4rem;
            margin-bottom: 1rem;
        }

        .career-field label {
            color: #d8c9ff;
            font-weight: 700;
            font-size: 0.85rem;
        }

        .career-field input,
        .career-field textarea {
            width: 100%;
            color: #fff;
            min-height: 3rem;
            border: 1px solid rgba(135, 80, 247, 0.28);
            border-radius: 0.85rem;
            background: rgba(255, 255, 255, 0.04);
            padding: 0.8rem 1rem;
            outline: none;
        }

        .career-field textarea {
            min-height: 8rem;
            resize: vertical;
            line-height: 1.7;
        }

        .career-field input:focus,
        .career-field textarea:focus {
            border-color: #b57dff;
            box-shadow: 0 0 0 4px rgba(135, 80, 247, 0.16);
        }

        .career-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            width: 100%;
            min-height: 3rem;
            border: 0;
            color: #fff;
            border-radius: 999px;
            background: linear-gradient(135deg, #8750f7, #6b2fd4);
            cursor: pointer;
        }

        .career-errors {
            margin-bottom: 1rem;
            padding: 1rem;
            border-radius: 0.85rem;
            color: #fecaca;
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .career-errors ul {
            margin: 0;
            padding-left: 1.2rem;
        }

        @media (max-width: 980px) {
            .career-detail__body {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .career-detail__hero {
                padding-top: 8rem;
            }
        }
    </style>
@endpush

@section('content')
    <main class="main-wrapper career-detail">
        <section class="career-detail__hero">
            <div class="container">
                <a href="{{ route('careers.index') }}" style="color: #b57dff; display: inline-flex; gap: 0.5rem; align-items: center; margin-bottom: 1rem;">
                    <i class="fa-solid fa-arrow-left"></i>
                    Back to Careers
                </a>
                <h1 class="career-detail__title">{{ $job->title }}</h1>
                <div class="career-detail__meta">
                    <span class="job-pill"><i class="fa-solid fa-briefcase"></i>{{ $job->type }}</span>
                    <span class="job-pill"><i class="fa-solid fa-location-dot"></i>{{ $job->location }}</span>
                    @if ($job->experience_level)
                        <span class="job-pill"><i class="fa-solid fa-chart-line"></i>{{ $job->experience_level }}</span>
                    @endif
                    @if ($job->salary_range)
                        <span class="job-pill"><i class="fa-solid fa-wallet"></i>{{ $job->salary_range }}</span>
                    @endif
                    <span class="job-pill"><i class="fa-solid fa-calendar"></i>{{ $job->deadline ? 'Apply by ' . $job->deadline->format('M d, Y') : 'Open until filled' }}</span>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="career-detail__body">
                    <div>
                        <article class="career-panel">
                            <h2>Job Description</h2>
                            <div class="career-rich-content">{!! $job->description !!}</div>
                        </article>

                        @if ($job->responsibilities)
                            <article class="career-panel">
                                <h2>Responsibilities</h2>
                                <div class="career-rich-content">{!! $job->responsibilities !!}</div>
                            </article>
                        @endif

                        <article class="career-panel">
                            <h2>Requirements</h2>
                            <div class="career-rich-content">{!! $job->requirements !!}</div>
                        </article>

                        @if ($job->benefits)
                            <article class="career-panel">
                                <h2>Benefits</h2>
                                <div class="career-rich-content">{!! $job->benefits !!}</div>
                            </article>
                        @endif
                    </div>

                    <aside class="career-panel" id="apply">
                        <h2>Apply for this job</h2>
                        <p style="margin-bottom: 1rem;">Submit your basic information and resume. Accepted files: PDF, DOC, DOCX up to 5MB.</p>

                        @if ($errors->any())
                            <div class="career-errors">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('careers.apply', $job) }}" method="POST" enctype="multipart/form-data"
                            data-ajax-form data-success-message="Your application has been submitted successfully.">
                            @csrf
                            <div class="career-field">
                                <label for="name">Full Name</label>
                                <input id="name" name="name" type="text" value="{{ old('name') }}" required>
                            </div>
                            <div class="career-field">
                                <label for="email">Email Address</label>
                                <input id="email" name="email" type="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="career-field">
                                <label for="phone">Phone Number</label>
                                <input id="phone" name="phone" type="text" value="{{ old('phone') }}">
                            </div>
                            <div class="career-field">
                                <label for="experience">Experience</label>
                                <input id="experience" name="experience" type="text" value="{{ old('experience') }}" placeholder="Example: 2 years">
                            </div>
                            <div class="career-field">
                                <label for="current_company">Current Company</label>
                                <input id="current_company" name="current_company" type="text" value="{{ old('current_company') }}">
                            </div>
                            <div class="career-field">
                                <label for="portfolio_url">Portfolio / LinkedIn URL</label>
                                <input id="portfolio_url" name="portfolio_url" type="url" value="{{ old('portfolio_url') }}">
                            </div>
                            <div class="career-field">
                                <label for="resume">Resume</label>
                                <input id="resume" name="resume" type="file" accept=".pdf,.doc,.docx" required>
                            </div>
                            <div class="career-field">
                                <label for="cover_letter">Cover Letter</label>
                                <textarea id="cover_letter" name="cover_letter">{{ old('cover_letter') }}</textarea>
                            </div>
                            <button type="submit" class="career-button">
                                Submit Application
                                <i class="fa-solid fa-paper-plane"></i>
                            </button>
                        </form>
                    </aside>
                </div>
            </div>
        </section>
    </main>
@endsection
