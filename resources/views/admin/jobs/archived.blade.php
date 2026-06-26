@extends('admin.layouts.app')

@section('title', $title ?? 'Older Jobs | Exlon Tech')
@section('page_title', 'Older Jobs')
@section('page_subtitle', 'Archived jobs are hidden from careers, while their applications remain available.')

@section('content')
    <div class="page-actions">
        <span class="badge">{{ $jobs->count() }} older jobs</span>
        <a href="{{ route('admin.jobs.index') }}" class="button button--ghost">
            <i class="fa-solid fa-briefcase"></i>
            Active Jobs
        </a>
    </div>

    <div class="admin-card">
        <div class="admin-card__body">
            <div class="table-wrap">
                <table class="{{ $jobs->isNotEmpty() ? 'admin-data-table' : '' }}" data-page-length="10">
                    <thead>
                        <tr>
                            <th>Job</th>
                            <th>Type</th>
                            <th>Location</th>
                            <th>Archived</th>
                            <th>Applications</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jobs as $job)
                            <tr>
                                <td>
                                    <span class="text-strong">{{ $job->title }}</span><br>
                                    {{ $job->deadline ? 'Deadline: ' . $job->deadline->format('M d, Y') : 'No deadline' }}
                                </td>
                                <td>{{ $job->type }}</td>
                                <td>{{ $job->location }}</td>
                                <td>{{ $job->archived_at?->format('M d, Y h:i A') }}</td>
                                <td>
                                    <a href="{{ route('admin.applications.index', ['job_id' => $job->id]) }}" class="badge">
                                        {{ $job->applications_count }} applications
                                    </a>
                                </td>
                                <td>
                                    <div class="stack-actions">
                                        <a href="{{ route('admin.applications.index', ['job_id' => $job->id]) }}" class="button button--ghost button--sm">Applications</a>
                                        <a href="{{ route('admin.jobs.show', $job) }}" class="button button--ghost button--sm">View</a>
                                        <a href="{{ route('admin.jobs.edit', $job) }}" class="button button--ghost button--sm">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No older jobs yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
