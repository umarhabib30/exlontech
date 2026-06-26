@extends('admin.layouts.app')

@section('title', $title ?? 'Contact Submissions | Exlon Tech')
@section('page_title', 'Contact Leads')
@section('page_subtitle', 'Review inquiries submitted from the website contact form.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__body">
            <div class="table-wrap">
                <table class="{{ $contacts->isNotEmpty() ? 'admin-data-table' : '' }}" data-page-length="10">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Service</th>
                            <th>Submitted</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($contacts as $contact)
                            <tr>
                                <td class="text-strong">{{ $contact->first_name }} {{ $contact->last_name }}</td>
                                <td>
                                    {{ $contact->email }}<br>
                                    {{ $contact->phone ?: 'No phone' }}
                                </td>
                                <td>{{ $contact->service ?: 'Not selected' }}</td>
                                <td>{{ $contact->created_at?->format('M d, Y h:i A') }}</td>
                                <td>
                                    <a href="{{ route('admin.contacts.show', $contact) }}" class="button button--ghost">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No contact submissions found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
