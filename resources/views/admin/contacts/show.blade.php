@extends('admin.layouts.app')

@section('title', $title ?? 'Contact Submission | Exlon Tech')
@section('page_title', 'Lead Details')
@section('page_subtitle', 'Full message and contact information.')

@section('content')
    <div style="display: flex; align-items: center; justify-content: space-between; gap: 1rem; margin-bottom: 1rem;">
        <a href="{{ route('admin.contacts.index') }}" class="button button--ghost">
            <i class="fa-solid fa-arrow-left"></i>
            Back to Leads
        </a>

        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" data-confirm-delete
            data-confirm-title="Delete this contact submission?"
            data-confirm-text="This lead will be permanently removed.">
            @csrf
            @method('DELETE')
            <button type="submit" class="button button--danger">
                <i class="fa-solid fa-trash"></i>
                Delete
            </button>
        </form>
    </div>

    <div class="admin-card">
        <div class="admin-card__body">
            <dl class="detail-list">
                <div>
                    <dt>Name</dt>
                    <dd>{{ $contact->first_name }} {{ $contact->last_name }}</dd>
                </div>
                <div>
                    <dt>Email</dt>
                    <dd><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></dd>
                </div>
                <div>
                    <dt>Phone</dt>
                    <dd>{{ $contact->phone ?: 'No phone provided' }}</dd>
                </div>
                <div>
                    <dt>Service</dt>
                    <dd>{{ $contact->service ?: 'Not selected' }}</dd>
                </div>
                <div>
                    <dt>Submitted</dt>
                    <dd>{{ $contact->created_at?->format('M d, Y h:i A') }}</dd>
                </div>
                <div>
                    <dt>Message</dt>
                    <dd>{{ $contact->message }}</dd>
                </div>
            </dl>
        </div>
    </div>
@endsection
