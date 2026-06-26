<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class JobApplicationController extends Controller
{
    public function index(Request $request): View
    {
        $selectedJob = null;
        $applicationsQuery = JobApplication::with('job')->latest();

        if ($request->filled('job_id')) {
            $selectedJob = Job::findOrFail($request->integer('job_id'));
            $applicationsQuery->where('job_id', $selectedJob->id);
        }

        return view('admin.applications.index', [
            'title' => 'Job Applications | Exlon Tech',
            'applications' => $applicationsQuery->get(),
            'selectedJob' => $selectedJob,
        ]);
    }

    public function show(JobApplication $application): View
    {
        return view('admin.applications.show', [
            'title' => 'Job Application | Exlon Tech',
            'application' => $application->load('job'),
        ]);
    }

    public function update(Request $request, JobApplication $application): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'in:new,reviewing,shortlisted,rejected,hired'],
        ]);

        $application->update($data);

        return back()->with('success', 'Application status updated.');
    }

    public function downloadResume(JobApplication $application): StreamedResponse
    {
        abort_unless(Storage::exists($application->resume_path), 404);

        return Storage::download($application->resume_path, $application->resume_original_name);
    }

    public function destroy(JobApplication $application): RedirectResponse
    {
        Storage::delete($application->resume_path);
        $application->delete();

        return redirect()
            ->route('admin.applications.index')
            ->with('success', 'Application deleted successfully.');
    }
}
