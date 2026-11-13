@php($isCourse = $kind === 'course')
@php($label = $isCourse ? 'Course' : 'Instructor')
@php($route = $isCourse ? 'admin.courses' : 'admin.instructors')
@extends('admin.layouts.app')

@section('title', $label . 's | Admin')
@section('page_title', $label . 's')
@section('page_subtitle', 'Create and manage the ' . strtolower($label) . ' options used in student fee records.')

@section('content')
    <div class="page-actions">
        <span class="badge">{{ $items->count() }} {{ strtolower($label) }}s</span>
        <a href="{{ route($route . '.create') }}" class="button"><i class="fa-solid fa-plus"></i> Add {{ $label }}</a>
    </div>
    <div class="admin-card"><div class="admin-card__body"><div class="table-wrap">
        <table class="{{ $items->isNotEmpty() ? 'admin-data-table' : '' }}" data-page-length="10">
            <thead><tr>
                <th>Name</th>
                @if ($isCourse)<th>Duration</th><th>Fee</th><th>Description</th>@else<th>Contact</th><th>Email</th><th>Specialization</th>@endif
                <th>Fee Records</th><th class="no-sort"></th>
            </tr></thead>
            <tbody>
            @forelse ($items as $item)
                <tr>
                    <td class="text-strong">{{ $item->name }}</td>
                    @if ($isCourse)<td>{{ $item->duration }}</td><td>{{ number_format((float) $item->fee_amount, 2) }}</td><td>{{ $item->description ?: '—' }}</td>
                    @else<td>{{ $item->contact_number ?: '—' }}</td><td>{{ $item->email ?: '—' }}</td><td>{{ $item->specialization ?: '—' }}</td>@endif
                    <td>{{ $item->fee_records_count }}</td>
                    <td><div class="stack-actions">
                        <a href="{{ route($route . '.edit', $item) }}" class="button button--ghost button--sm">Edit</a>
                        <form action="{{ route($route . '.destroy', $item) }}" method="POST" data-confirm-delete data-confirm-title="Delete this {{ strtolower($label) }}?" data-confirm-text="{{ $item->fee_records_count ? 'This record is in use and cannot be deleted.' : 'This action cannot be undone.' }}">
                            @csrf @method('DELETE')<button class="button button--danger button--sm" type="submit" @disabled($item->fee_records_count)>Delete</button>
                        </form>
                    </div></td>
                </tr>
            @empty<tr><td colspan="6">No {{ strtolower($label) }}s created yet.</td></tr>@endforelse
            </tbody>
        </table>
    </div></div></div>
@endsection
