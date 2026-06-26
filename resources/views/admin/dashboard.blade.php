@extends('admin.layouts.app')

@section('title', $title ?? 'Admin Dashboard | Exlon Tech')
@section('page_title', 'Dashboard')
@section('page_subtitle', 'Overview of website inquiries, jobs, and applications.')

@section('content')
    <div class="admin-grid admin-grid--stats">
        <div class="admin-card stat">
            <span>Total Contact Leads</span>
            <strong>{{ $totalContacts }}</strong>
        </div>
        <div class="admin-card stat">
            <span>Active Jobs</span>
            <strong>{{ $activeJobs }}</strong>
        </div>
        <div class="admin-card stat">
            <span>Job Applications</span>
            <strong>{{ $totalApplications }}</strong>
        </div>
    </div>

    <div class="admin-grid" style="grid-template-columns: minmax(0, 1.4fr) minmax(18rem, 0.6fr); margin-top: 1rem;">
        <div class="admin-card">
            <div class="admin-card__body">
                <div style="display: flex; align-items: center; justify-content: space-between; gap: 1rem; margin-bottom: 1rem;">
                    <h2 style="margin: 0; font-size: 1.1rem;">Recent Leads</h2>
                    <a href="{{ route('admin.contacts.index') }}" class="button button--ghost">View All</a>
                </div>

                <div class="table-wrap">
                    <table class="{{ $recentContacts->isNotEmpty() ? 'admin-data-table' : '' }}" data-page-length="5">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Service</th>
                                <th>Received</th>
                                <th class="no-sort"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($recentContacts as $contact)
                                <tr>
                                    <td>
                                        <span class="text-strong">{{ $contact->first_name }} {{ $contact->last_name }}</span><br>
                                        {{ $contact->email }}
                                    </td>
                                    <td>{{ $contact->service ?: 'Not selected' }}</td>
                                    <td>{{ $contact->created_at?->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('admin.contacts.show', $contact) }}" class="button button--ghost">Open</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No contact submissions yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="admin-card">
            <div class="admin-card__body">
                <h2 style="margin: 0 0 1rem; font-size: 1.1rem;">Career Snapshot</h2>

                <div class="admin-grid">
                    <div style="display: flex; align-items: center; justify-content: space-between; gap: 1rem; color: var(--muted);">
                        <span>Total Jobs</span>
                        <span class="badge">{{ $totalJobs }}</span>
                    </div>
                    <div style="display: flex; align-items: center; justify-content: space-between; gap: 1rem; color: var(--muted);">
                        <span>Published Jobs</span>
                        <span class="badge">{{ $activeJobs }}</span>
                    </div>
                    <div style="display: flex; align-items: center; justify-content: space-between; gap: 1rem; color: var(--muted);">
                        <span>Applications</span>
                        <span class="badge">{{ $totalApplications }}</span>
                    </div>
                    <a href="{{ route('admin.jobs.create') }}" class="button" style="margin-top: 0.5rem;">
                        <i class="fa-solid fa-plus"></i>
                        Add Job
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="admin-grid" style="grid-template-columns: minmax(0, 1.4fr) minmax(18rem, 0.6fr); margin-top: 1rem;">
        <div class="admin-card">
            <div class="admin-card__body">
                <div style="display: flex; align-items: center; justify-content: space-between; gap: 1rem; margin-bottom: 1rem;">
                    <h2 style="margin: 0; font-size: 1.1rem;">Recent Job Applications</h2>
                    <a href="{{ route('admin.applications.index') }}" class="button button--ghost">View All</a>
                </div>

                <div class="table-wrap">
                    <table class="{{ $recentApplications->isNotEmpty() ? 'admin-data-table' : '' }}" data-page-length="5">
                        <thead>
                            <tr>
                                <th>Candidate</th>
                                <th>Job</th>
                                <th>Status</th>
                                <th class="no-sort"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($recentApplications as $application)
                                <tr>
                                    <td>
                                        <span class="text-strong">{{ $application->name }}</span><br>
                                        {{ $application->email }}
                                    </td>
                                    <td>{{ $application->job?->title ?: 'Deleted job' }}</td>
                                    <td><span class="badge">{{ ucfirst($application->status) }}</span></td>
                                    <td>
                                        <a href="{{ route('admin.applications.show', $application) }}" class="button button--ghost">Open</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No job applications yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="admin-card">
            <div class="admin-card__body">
                <h2 style="margin: 0 0 1rem; font-size: 1.1rem;">Top Requested Services</h2>

                <div class="admin-grid">
                    @forelse ($serviceBreakdown as $service)
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 1rem; color: var(--muted);">
                            <span>{{ $service->service_name ?: 'Not selected' }}</span>
                            <span class="badge">{{ $service->total }}</span>
                        </div>
                    @empty
                        <p style="margin: 0; color: var(--muted);">No service data available.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
