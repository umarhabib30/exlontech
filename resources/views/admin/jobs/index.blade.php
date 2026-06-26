@extends('admin.layouts.app')

@section('title', $title ?? 'Jobs | Exlon Tech')
@section('page_title', 'Jobs')
@section('page_subtitle', 'Create and manage openings shown on the careers page.')

@section('content')
    <div class="page-actions">
        <span class="badge">{{ $jobs->count() }} total jobs</span>
        <div class="stack-actions">
            <a href="{{ route('admin.jobs.archived') }}" class="button button--ghost">
                <i class="fa-solid fa-box-archive"></i>
                Older Jobs
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
                <table class="{{ $jobs->isNotEmpty() ? 'admin-data-table' : '' }}" data-page-length="10">
                    <thead>
                        <tr>
                            <th>Job</th>
                            <th>Type</th>
                            <th>Location</th>
                            <th>Status</th>
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
                                <td><span class="badge">{{ $job->is_active ? 'Published' : 'Draft' }}</span></td>
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
                                        <form action="{{ route('admin.jobs.destroy', $job) }}" method="POST" data-confirm-delete
                                            data-confirm-title="Move this job to older jobs?"
                                            data-confirm-text="The job will leave the active list, but all applications will stay saved.">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="button button--danger button--sm">Archive</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No jobs have been created yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
