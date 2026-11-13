<?php

namespace App\Http\Controllers;

use App\Mail\JobApplicationMail;
use App\Models\Job;
use App\Models\JobApplication;
use App\Support\SeoMeta;
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
        $canonical = route('careers.index');

        return view('user.careers.index', [
            'title' => 'Careers | Exlon Tech',
            'jobs' => Job::open()->latest()->get(),
            'meta' => [
                'title' => 'Careers | Exlon Tech Jobs in Web, Apps & Design',
                'description' => 'Join Exlon Tech in Sargodha. Open roles in web development, mobile apps, UI/UX, digital marketing, SEO, and creative production.',
                'keywords' => 'Exlon Tech careers, software jobs Pakistan, web developer jobs Sargodha, app developer jobs, UI UX jobs, digital marketing jobs, SEO jobs',
                'canonical' => $canonical,
                'image' => 'assets/img/logo/logo.png',
                'image_alt' => 'Careers at Exlon Tech',
                'page_type' => 'CollectionPage',
                'breadcrumbs' => SeoMeta::breadcrumbsFor('Careers', $canonical),
            ],
        ]);
    }

    public function show(Job $job): View
    {
        abort_unless($job->is_active, 404);

        $canonical = route('careers.show', $job);
        $location = $job->location ?: 'Sargodha';
        $isRemote = str_contains(strtolower($location), 'remote');

        $jobPosting = [
            '@context' => 'https://schema.org',
            '@type' => 'JobPosting',
            'title' => $job->title,
            'description' => Str::limit(strip_tags($job->description), 5000),
            'identifier' => [
                '@type' => 'PropertyValue',
                'name' => 'Exlon Tech',
                'value' => (string) $job->id,
            ],
            'datePosted' => optional($job->created_at)?->toAtomString(),
            'employmentType' => $this->employmentType($job->type),
            'hiringOrganization' => [
                '@id' => SeoMeta::siteUrl() . '/#organization',
                '@type' => 'Organization',
                'name' => 'Exlon Tech',
                'sameAs' => SeoMeta::siteUrl(),
                'logo' => SeoMeta::assetUrl('assets/img/logo/logo.png'),
            ],
            'jobLocation' => [
                '@type' => 'Place',
                'address' => [
                    '@type' => 'PostalAddress',
                    'addressLocality' => $isRemote ? 'Sargodha' : $location,
                    'addressRegion' => 'Punjab',
                    'addressCountry' => 'PK',
                ],
            ],
            'applicantLocationRequirements' => [
                '@type' => 'Country',
                'name' => 'Pakistan',
            ],
            'directApply' => true,
            'url' => $canonical,
        ];

        if ($job->deadline) {
            $jobPosting['validThrough'] = $job->deadline->endOfDay()->toAtomString();
        }

        if ($isRemote) {
            $jobPosting['jobLocationType'] = 'TELECOMMUTE';
        }

        return view('user.careers.show', [
            'title' => $job->title . ' | Careers | Exlon Tech',
            'job' => $job,
            'meta' => [
                'title' => $job->title . ' | Careers | Exlon Tech',
                'description' => Str::limit(strip_tags($job->description), 155),
                'keywords' => implode(', ', array_filter([
                    $job->title,
                    $job->type,
                    $job->location,
                    $job->experience_level,
                    'Exlon Tech careers',
                    'software jobs Pakistan',
                    'digital agency jobs',
                ])),
                'canonical' => $canonical,
                'image' => 'assets/img/logo/logo.png',
                'image_alt' => $job->title . ' at Exlon Tech',
                'type' => 'article',
                'page_type' => 'WebPage',
                'breadcrumbs' => SeoMeta::breadcrumbsFor($job->title, $canonical, [
                    ['name' => 'Careers', 'url' => route('careers.index')],
                ]),
                'json_ld_extra' => [$jobPosting],
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

    private function employmentType(?string $type): string
    {
        $normalized = strtoupper(str_replace([' ', '-'], '_', trim((string) $type)));

        return match ($normalized) {
            'FULL_TIME', 'FULLTIME' => 'FULL_TIME',
            'PART_TIME', 'PARTTIME' => 'PART_TIME',
            'CONTRACT', 'CONTRACTOR' => 'CONTRACTOR',
            'TEMPORARY' => 'TEMPORARY',
            'INTERN', 'INTERNSHIP' => 'INTERN',
            default => 'FULL_TIME',
        };
    }
}
