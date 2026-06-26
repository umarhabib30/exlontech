@extends('admin.layouts.app')

@section('title', $title ?? 'Job | Exlon Tech')
@section('page_title', $job->title)
@section('page_subtitle', 'Review job details and public visibility.')

@section('content')
    <div class="page-actions">
        <div class="stack-actions">
            <a href="{{ route('admin.jobs.index') }}" class="button button--ghost">
                <i class="fa-solid fa-arrow-left"></i>
                Back
            </a>
            <a href="{{ route('admin.jobs.edit', $job) }}" class="button">
                <i class="fa-solid fa-pen"></i>
                Edit Job
            </a>
            @if ($job->is_active)
                <a href="{{ route('careers.show', $job) }}" target="_blank" rel="noopener noreferrer" class="button button--ghost">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    Public Page
                </a>
            @endif
        </div>

        @if (! $job->archived_at)
            <form action="{{ route('admin.jobs.destroy', $job) }}" method="POST" data-confirm-delete
                data-confirm-title="Move this job to older jobs?"
                data-confirm-text="The job will leave the active list, but all applications will stay saved.">
                @csrf
                @method('DELETE')
                <button type="submit" class="button button--danger">
                    <i class="fa-solid fa-box-archive"></i>
                    Archive
                </button>
            </form>
        @endif
    </div>

    <div class="admin-grid" style="grid-template-columns: minmax(0, 1fr) 18rem;">
        <div class="admin-card">
            <div class="admin-card__body">
                <dl class="detail-list">
                    <div><dt>Description</dt><dd class="rich-content">{!! $job->description !!}</dd></div>
                    <div><dt>Responsibilities</dt><dd class="rich-content">{!! $job->responsibilities ?: 'Not provided' !!}</dd></div>
                    <div><dt>Requirements</dt><dd class="rich-content">{!! $job->requirements !!}</dd></div>
                    <div><dt>Benefits</dt><dd class="rich-content">{!! $job->benefits ?: 'Not provided' !!}</dd></div>
                </dl>
            </div>
        </div>

        <div class="admin-card">
            <div class="admin-card__body">
                <dl class="detail-list">
                    <div><dt>Status</dt><dd><span class="badge">{{ $job->archived_at ? 'Older Job' : ($job->is_active ? 'Published' : 'Draft') }}</span></dd></div>
                    <div><dt>Type</dt><dd>{{ $job->type }}</dd></div>
                    <div><dt>Location</dt><dd>{{ $job->location }}</dd></div>
                    <div><dt>Experience</dt><dd>{{ $job->experience_level ?: 'Not provided' }}</dd></div>
                    <div><dt>Salary</dt><dd>{{ $job->salary_range ?: 'Not provided' }}</dd></div>
                    <div><dt>Deadline</dt><dd>{{ $job->deadline?->format('M d, Y') ?: 'No deadline' }}</dd></div>
                    @if ($job->archived_at)
                        <div><dt>Archived</dt><dd>{{ $job->archived_at->format('M d, Y h:i A') }}</dd></div>
                    @endif
                    <div><dt>Applications</dt><dd>{{ $job->applications_count }}</dd></div>
                </dl>
            </div>
        </div>
    </div>
@endsection
