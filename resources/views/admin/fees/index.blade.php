@extends('admin.layouts.app')
@section('title', 'Student Fees | Admin')
@section('page_title', 'Student Fees')
@section('page_subtitle', 'Manage student admissions, course assignments, and fee balances.')
@section('content')
<div class="page-actions"><span class="badge">{{ $records->count() }} records</span><a href="{{ route('admin.fees.create') }}" class="button"><i class="fa-solid fa-plus"></i> Add Student Fee</a></div>
<div class="admin-card"><div class="admin-card__body"><div class="table-wrap"><table class="{{ $records->isNotEmpty() ? 'admin-data-table' : '' }}" data-page-length="10">
<thead><tr><th>Student</th><th>Contact</th><th>Course</th><th>Instructor</th><th>Monthly Fee</th><th>Months Recorded</th><th>Balance Due</th><th class="no-sort"></th></tr></thead>
<tbody>@forelse ($records as $fee)<tr>
<td><span class="text-strong">{{ $fee->student_name }}</span><br>{{ $fee->id_card_number }}</td><td>{{ $fee->contact_number }}</td><td>{{ $fee->course->name }}</td><td>{{ $fee->instructor->name }}</td>
<td>{{ number_format((float) $fee->total_fee, 2) }}</td><td>{{ $fee->monthlyPayments->count() }}</td><td>{{ number_format($fee->monthlyPayments->sum(fn ($month) => max(0, (float) $month->amount_due - (float) $month->amount_paid)), 2) }}</td>
<td><div class="stack-actions"><a href="{{ route('admin.fees.show', $fee) }}" class="button button--ghost button--sm">View</a><a href="{{ route('admin.fees.edit', $fee) }}" class="button button--ghost button--sm">Edit</a>
<form action="{{ route('admin.fees.destroy', $fee) }}" method="POST" data-confirm-delete>@csrf @method('DELETE')<button class="button button--danger button--sm" type="submit">Delete</button></form></div></td>
</tr>@empty<tr><td colspan="8">No student fee records yet.</td></tr>@endforelse</tbody>
</table></div></div></div>
@endsection
