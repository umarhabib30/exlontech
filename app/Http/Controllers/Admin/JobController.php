<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobController extends Controller
{
    public function index(): View
    {
        return view('admin.jobs.index', [
            'title' => 'Jobs | Exlon Tech',
            'jobs' => Job::current()->withCount('applications')->latest()->get(),
        ]);
    }

    public function archived(): View
    {
        return view('admin.jobs.archived', [
            'title' => 'Older Jobs | Exlon Tech',
            'jobs' => Job::archived()->withCount('applications')->latest('archived_at')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.jobs.create', [
            'title' => 'Add Job | Exlon Tech',
            'job' => new Job(['is_active' => true]),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $job = Job::create($this->validatedData($request));

        return redirect()
            ->route('admin.jobs.show', $job)
            ->with('success', 'Job created successfully.');
    }

    public function show(Job $job): View
    {
        return view('admin.jobs.show', [
            'title' => $job->title . ' | Jobs | Exlon Tech',
            'job' => $job->loadCount('applications'),
        ]);
    }

    public function edit(Job $job): View
    {
        return view('admin.jobs.edit', [
            'title' => 'Edit Job | Exlon Tech',
            'job' => $job,
        ]);
    }

    public function update(Request $request, Job $job): RedirectResponse
    {
        $job->update($this->validatedData($request));

        return redirect()
            ->route('admin.jobs.show', $job)
            ->with('success', 'Job updated successfully.');
    }

    public function destroy(Job $job): RedirectResponse
    {
        $job->update([
            'is_active' => false,
            'archived_at' => now(),
        ]);

        return redirect()
            ->route('admin.jobs.index')
            ->with('success', 'Job moved to older jobs. Applications are retained.');
    }

    private function validatedData(Request $request): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:100'],
            'location' => ['required', 'string', 'max:255'],
            'experience_level' => ['nullable', 'string', 'max:255'],
            'salary_range' => ['nullable', 'string', 'max:255'],
            'deadline' => ['nullable', 'date'],
            'description' => ['required', 'string'],
            'responsibilities' => ['nullable', 'string'],
            'requirements' => ['required', 'string'],
            'benefits' => ['nullable', 'string'],
        ]);

        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
