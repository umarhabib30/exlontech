@extends('admin.layouts.app')

@section('title', $title ?? 'Job Application | Exlon Tech')
@section('page_title', $application->name)
@section('page_subtitle', 'Candidate details, resume, and application status.')

@section('content')
    <div class="page-actions">
        <div class="stack-actions">
            <a href="{{ route('admin.applications.index') }}" class="button button--ghost">
                <i class="fa-solid fa-arrow-left"></i>
                Back
            </a>
            <a href="{{ route('admin.applications.resume', $application) }}" class="button">
                <i class="fa-solid fa-download"></i>
                Download Resume
            </a>
        </div>

        <form action="{{ route('admin.applications.destroy', $application) }}" method="POST" data-confirm-delete
            data-confirm-title="Delete this application?"
            data-confirm-text="This application and resume file will be permanently removed.">
            @csrf
            @method('DELETE')
            <button type="submit" class="button button--danger">
                <i class="fa-solid fa-trash"></i>
                Delete
            </button>
        </form>
    </div>

    <div class="admin-grid" style="grid-template-columns: minmax(0, 1fr) 20rem;">
        <div class="admin-card">
            <div class="admin-card__body">
                <dl class="detail-list">
                    <div><dt>Job</dt><dd>{{ $application->job?->title ?: 'Deleted job' }}</dd></div>
                    <div><dt>Name</dt><dd>{{ $application->name }}</dd></div>
                    <div><dt>Email</dt><dd><a href="mailto:{{ $application->email }}">{{ $application->email }}</a></dd></div>
                    <div><dt>Phone</dt><dd>{{ $application->phone ?: 'Not provided' }}</dd></div>
                    <div><dt>Current Company</dt><dd>{{ $application->current_company ?: 'Not provided' }}</dd></div>
                    <div><dt>Experience</dt><dd>{{ $application->experience ?: 'Not provided' }}</dd></div>
                    <div><dt>Portfolio</dt><dd>{{ $application->portfolio_url ?: 'Not provided' }}</dd></div>
                    <div><dt>Resume</dt><dd>{{ $application->resume_original_name }}</dd></div>
                    <div><dt>Cover Letter</dt><dd>{!! nl2br(e($application->cover_letter ?: 'Not provided')) !!}</dd></div>
                </dl>
            </div>
        </div>

        <div class="admin-card">
            <div class="admin-card__body">
                <form action="{{ route('admin.applications.update', $application) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="field">
                        <label for="status">Status</label>
                        <select id="status" name="status">
                            @foreach (['new', 'reviewing', 'shortlisted', 'rejected', 'hired'] as $status)
                                <option value="{{ $status }}" @selected($application->status === $status)>{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                        @error('status') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="button" style="width: 100%;">Update Status</button>
                </form>

                <dl class="detail-list" style="margin-top: 1.25rem;">
                    <div><dt>Submitted</dt><dd>{{ $application->created_at?->format('M d, Y h:i A') }}</dd></div>
                    <div><dt>Last Updated</dt><dd>{{ $application->updated_at?->format('M d, Y h:i A') }}</dd></div>
                </dl>
            </div>
        </div>
    </div>
@endsection
