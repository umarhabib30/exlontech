@extends('layouts.app')

@section('title', $title ?? 'Careers | Exlon Tech')

@push('styles')
    <style>
        .careers-page {
            background: #0f0715;
            color: #fff;
        }

        .careers-hero {
            position: relative;
            padding: 10rem 0 4rem;
            overflow: hidden;
        }

        .careers-hero::before {
            content: '';
            position: absolute;
            inset: -10rem -8rem auto auto;
            width: 28rem;
            height: 28rem;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(135, 80, 247, 0.28), transparent 68%);
            pointer-events: none;
        }

        .careers-eyebrow {
            color: #b57dff;
            font-weight: 700;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            font-size: 0.78rem;
            margin-bottom: 0.85rem;
        }

        .careers-title {
            margin: 0;
            max-width: 760px;
            font-size: clamp(2.2rem, 5vw, 4.6rem);
            line-height: 1.05;
            background: linear-gradient(90deg, #fff 0%, #b57dff 55%, #8750f7 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .careers-copy {
            max-width: 680px;
            color: #c8b9dd;
            font-size: 1.05rem;
            line-height: 1.8;
            margin-top: 1.25rem;
        }

        .jobs-section {
            padding: 2rem 0 6rem;
        }

        .jobs-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1.25rem;
        }

        .job-card {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            min-height: 100%;
            padding: 1.5rem;
            border-radius: 1rem;
            background: linear-gradient(145deg, rgba(27, 16, 38, 0.96), rgba(12, 7, 21, 0.96));
            border: 1px solid rgba(135, 80, 247, 0.24);
            box-shadow: 0 24px 48px rgba(0, 0, 0, 0.28);
        }

        .job-card__meta {
            display: flex;
            flex-wrap: wrap;
            gap: 0.55rem;
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

        .job-card h2 {
            margin: 0;
            font-size: 1.4rem;
            line-height: 1.3;
        }

        .job-card p {
            margin: 0;
            color: #c8b9dd;
            line-height: 1.7;
        }

        .job-card__footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-top: auto;
            padding-top: 1rem;
        }

        .careers-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            color: #fff;
            min-height: 2.75rem;
            padding: 0.75rem 1rem;
            border-radius: 999px;
            background: linear-gradient(135deg, #8750f7, #6b2fd4);
        }

        .empty-careers {
            padding: 2rem;
            border-radius: 1rem;
            border: 1px solid rgba(135, 80, 247, 0.24);
            background: rgba(135, 80, 247, 0.08);
            color: #c8b9dd;
        }

        @media (max-width: 768px) {
            .careers-hero {
                padding-top: 8rem;
            }

            .jobs-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@section('content')
    <main class="main-wrapper careers-page">
        <section class="careers-hero">
            <div class="container">
                <div class="careers-eyebrow">Careers at Exlon Tech</div>
                <h1 class="careers-title">Build meaningful digital products with us.</h1>
                <p class="careers-copy">
                    Join a team focused on web development, mobile apps, design, marketing, and practical software
                    delivery for growing businesses.
                </p>
            </div>
        </section>

        <section class="jobs-section">
            <div class="container">
                @if ($jobs->isNotEmpty())
                    <div class="jobs-grid">
                        @foreach ($jobs as $job)
                            <article class="job-card">
                                <div class="job-card__meta">
                                    <span class="job-pill"><i class="fa-solid fa-briefcase"></i>{{ $job->type }}</span>
                                    <span class="job-pill"><i class="fa-solid fa-location-dot"></i>{{ $job->location }}</span>
                                    @if ($job->experience_level)
                                        <span class="job-pill"><i class="fa-solid fa-chart-line"></i>{{ $job->experience_level }}</span>
                                    @endif
                                </div>

                                <h2>{{ $job->title }}</h2>
                                <p>{{ \Illuminate\Support\Str::limit(strip_tags($job->description), 160) }}</p>

                                <div class="job-card__footer">
                                    <span style="color: #b9a9cf; font-size: 0.9rem;">
                                        {{ $job->deadline ? 'Apply by ' . $job->deadline->format('M d, Y') : 'Open until filled' }}
                                    </span>
                                    <a href="{{ route('careers.show', $job) }}" class="careers-button">
                                        View & Apply
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @else
                    <div class="empty-careers">
                        No open positions are available right now. Please check back soon.
                    </div>
                @endif
            </div>
        </section>
    </main>
@endsection
