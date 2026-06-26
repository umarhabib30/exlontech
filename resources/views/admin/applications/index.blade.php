@extends('admin.layouts.app')

@section('title', $title ?? 'Job Applications | Exlon Tech')
@section('page_title', 'Applications')
@section('page_subtitle', 'Review candidates who applied through the careers page.')

@section('content')
    <div class="page-actions">
        <div class="stack-actions">
            <span class="badge">
                {{ $applications->count() }}
                {{ $selectedJob ? 'applications for ' . $selectedJob->title : 'total applications' }}
            </span>
            @if ($selectedJob)
                <a href="{{ route('admin.applications.index') }}" class="button button--ghost">
                    <i class="fa-solid fa-xmark"></i>
                    Clear Filter
                </a>
            @endif
        </div>
        <div class="stack-actions">
            <a href="{{ route('admin.jobs.index') }}" class="button button--ghost">
                <i class="fa-solid fa-briefcase"></i>
                Jobs
            </a>
            <a href="{{ route('admin.jobs.create') }}" class="button">
                <i class="fa-solid fa-plus"></i>
                Add Job
            </a>
        </div>
    </div>

    <div class="admin-card">
        <div class="admin-card__body">
            <div class="table-wrap">
                <table class="{{ $applications->isNotEmpty() ? 'admin-data-table' : '' }}" data-page-length="10">
                    <thead>
                        <tr>
                            <th>Candidate</th>
                            <th>Job</th>
                            <th>Experience</th>
                            <th>Status</th>
                            <th>Applied</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($applications as $application)
                            <tr>
                                <td>
                                    <span class="text-strong">{{ $application->name }}</span><br>
                                    {{ $application->email }}<br>
                                    {{ $application->phone ?: 'No phone' }}
                                </td>
                                <td>{{ $application->job?->title ?: 'Deleted job' }}</td>
                                <td>{{ $application->experience ?: 'Not provided' }}</td>
                                <td><span class="badge">{{ ucfirst($application->status) }}</span></td>
                                <td>{{ $application->created_at?->format('M d, Y h:i A') }}</td>
                                <td>
                                    <div class="stack-actions">
                                        <a href="{{ route('admin.applications.show', $application) }}" class="button button--ghost button--sm">View</a>
                                        <a href="{{ route('admin.applications.resume', $application) }}" class="button button--ghost button--sm">Resume</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No job applications yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
