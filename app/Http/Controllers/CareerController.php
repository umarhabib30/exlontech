<?php

namespace App\Http\Controllers;

use App\Mail\JobApplicationMail;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Throwable;

class CareerController extends Controller
{
    public function index(): View
    {
        return view('user.careers.index', [
            'title' => 'Careers | ExlonTech',
            'jobs' => Job::open()->latest()->get(),
            'meta' => [
                'title' => 'Careers | ExlonTech Jobs & Opportunities',
                'description' => 'Explore careers at ExlonTech and apply for openings in web development, mobile app development, UI/UX design, digital marketing, SEO, and creative services.',
                'keywords' => 'ExlonTech careers, software jobs Pakistan, web developer jobs, app developer jobs, UI UX jobs, digital marketing jobs, SEO jobs, graphic design jobs',
                'canonical' => route('careers.index'),
                'image' => 'assets/img/logo/logo.png',
                'image_alt' => 'Careers at ExlonTech',
            ],
        ]);
    }

    public function show(Job $job): View
    {
        abort_unless($job->is_active, 404);

        return view('user.careers.show', [
            'title' => $job->title . ' | Careers | ExlonTech',
            'job' => $job,
            'meta' => [
                'title' => $job->title . ' | Careers | ExlonTech',
                'description' => Str::limit(strip_tags($job->description), 155),
                'keywords' => implode(', ', array_filter([
                    $job->title,
                    $job->type,
                    $job->location,
                    $job->experience_level,
                    'ExlonTech careers',
                    'software jobs Pakistan',
                    'digital agency jobs',
                ])),
                'canonical' => route('careers.show', $job),
                'image' => 'assets/img/logo/logo.png',
                'image_alt' => $job->title . ' at ExlonTech',
                'type' => 'article',
                'json_ld_extra' => [[
                    '@context' => 'https://schema.org',
                    '@type' => 'JobPosting',
                    'title' => $job->title,
                    'description' => Str::limit(strip_tags($job->description), 5000),
                    'datePosted' => optional($job->created_at)->toAtomString(),
                    'employmentType' => strtoupper(str_replace(' ', '_', $job->type ?? 'FULL_TIME')),
                    'hiringOrganization' => [
                        '@type' => 'Organization',
                        'name' => 'ExlonTech',
                        'sameAs' => route('home'),
                        'logo' => \App\Support\SeoMeta::assetUrl('assets/img/logo/logo.png'),
                    ],
                    'jobLocation' => [
                        '@type' => 'Place',
                        'address' => [
                            '@type' => 'PostalAddress',
                            'addressLocality' => $job->location ?: 'Sargodha',
                            'addressCountry' => 'PK',
                        ],
                    ],
                    'applicantLocationRequirements' => [
                        '@type' => 'Country',
                        'name' => 'Pakistan',
                    ],
                    'directApply' => true,
                    'url' => route('careers.show', $job),
                ]],
            ],
        ]);
    }

    public function apply(Request $request, Job $job): RedirectResponse|\Illuminate\Http\JsonResponse
    {
        abort_unless($job->is_active, 404);

        if ($job->deadline && $job->deadline->isBefore(today())) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Applications for this job are now closed.',
                ], 422);
            }

            return back()->withErrors(['resume' => 'Applications for this job are now closed.']);
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'current_company' => ['nullable', 'string', 'max:255'],
            'experience' => ['nullable', 'string', 'max:100'],
            'portfolio_url' => ['nullable', 'url', 'max:255'],
            'cover_letter' => ['nullable', 'string', 'max:5000'],
            'resume' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
        ]);

        $resume = $request->file('resume');
        $data['job_id'] = $job->id;
        $data['resume_path'] = $resume->store('resumes');
        $data['resume_original_name'] = $resume->getClientOriginalName();

        unset($data['resume']);

        $application = JobApplication::create($data);

        try {
            Mail::to('mumarhabibrb102@gmail.com')->queue(new JobApplicationMail($application));
        } catch (Throwable $exception) {
            Log::warning('Job application mail could not be queued.', [
                'application_id' => $application->id,
                'email' => $application->email,
                'error' => $exception->getMessage(),
            ]);
        }

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Your application has been submitted successfully.',
            ]);
        }

        return redirect()
            ->route('careers.show', $job)
            ->with('success', 'Your application has been submitted successfully.');
    }
}
