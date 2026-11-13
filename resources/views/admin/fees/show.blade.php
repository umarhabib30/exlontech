@extends('admin.layouts.app')
@section('title', $fee->student_name . ' Fee Record | Admin')
@section('page_title', $fee->student_name)
@section('page_subtitle', 'Student admission and monthly fee ledger.')
@section('content')
@php
    $monthlyDue = $fee->monthlyPayments->sum('amount_due');
    $monthlyPaid = $fee->monthlyPayments->sum('amount_paid');
    $nextMonth = $fee->monthlyPayments->last()?->billing_month?->copy()->addMonth()->format('Y-m') ?? $fee->date_of_admission->format('Y-m');
@endphp
@if ($errors->any())
    <div class="admin-card" style="margin-bottom:1rem"><div class="admin-card__body"><strong>Could not save the monthly fee record:</strong><ul>@foreach ($errors->all() as $error)<li class="error">{{ $error }}</li>@endforeach</ul></div></div>
@endif
<div class="page-actions"><div class="stack-actions"><a href="{{ route('admin.fees.index') }}" class="button button--ghost">Back to Fees</a><a href="{{ route('admin.fees.edit', $fee) }}" class="button">Edit Student</a></div>
<form action="{{ route('admin.fees.destroy', $fee) }}" method="POST" data-confirm-delete>@csrf @method('DELETE')<button class="button button--danger" type="submit">Delete Student</button></form></div>

<div class="admin-grid admin-grid--stats">
    <div class="admin-card stat"><span>Monthly Fee</span><strong>{{ number_format((float) $fee->total_fee, 2) }}</strong></div>
    <div class="admin-card stat"><span>Total Paid</span><strong>{{ number_format((float) $monthlyPaid, 2) }}</strong></div>
    <div class="admin-card stat"><span>Balance Due</span><strong>{{ number_format(max(0, (float) $monthlyDue - (float) $monthlyPaid), 2) }}</strong></div>
</div>

<div class="admin-card" style="margin-top: 1rem"><div class="admin-card__body"><h2 style="margin-top:0">Student Details</h2><dl class="detail-list">
@foreach (['Student Name' => $fee->student_name, 'Student Contact' => $fee->contact_number, 'ID Card Number' => $fee->id_card_number, 'Father Name' => $fee->father_name, 'Father Contact' => $fee->father_contact_number, 'Address' => $fee->address, 'Date of Birth' => $fee->date_of_birth->format('M d, Y'), 'Degree' => $fee->degree, 'Date of Admission' => $fee->date_of_admission->format('M d, Y'), 'Course' => $fee->course->name, 'Course Duration' => $fee->course_duration, 'Instructor' => $fee->instructor->name] as $label => $value)
<div><dt>{{ $label }}</dt><dd>{{ $value }}</dd></div>
@endforeach
</dl></div></div>

<div class="admin-card" style="margin-top: 1rem"><div class="admin-card__body">
    <h2 style="margin-top:0">Monthly Fee Records</h2>
    <p class="admin-subtitle" style="margin-bottom:1rem">One record per month. The admission month is added automatically; the new record form starts at the next month.</p>
    <div class="table-wrap"><table><thead><tr><th>Month</th><th>Amount Due</th><th>Amount Paid</th><th>Paid Date</th><th>Balance</th><th class="no-sort">Actions</th></tr></thead><tbody>
    @forelse ($fee->monthlyPayments as $payment)
        <tr>
            <td colspan="6">
                <form action="{{ route('admin.fees.months.update', [$fee, $payment]) }}" method="POST" class="form-grid" style="align-items:end; margin:0">
                    @csrf @method('PUT')
                    <div class="field"><label for="month-{{ $payment->id }}">Month</label><input id="month-{{ $payment->id }}" name="billing_month" type="month" value="{{ $payment->billing_month->format('Y-m') }}" required></div>
                    <div class="field"><label for="due-{{ $payment->id }}">Amount Due</label><input id="due-{{ $payment->id }}" name="amount_due" type="number" min="0" step="0.01" value="{{ $payment->amount_due }}" required></div>
                    <div class="field"><label for="paid-{{ $payment->id }}">Amount Paid</label><input id="paid-{{ $payment->id }}" name="amount_paid" type="number" min="0" step="0.01" value="{{ $payment->amount_paid }}" required></div>
                    <div class="field"><label for="paid-at-{{ $payment->id }}">Paid Date</label><input id="paid-at-{{ $payment->id }}" name="paid_at" type="date" value="{{ $payment->paid_at?->format('Y-m-d') }}"></div>
                    <div class="field"><label>Balance</label><span class="badge">{{ number_format(max(0, (float) $payment->amount_due - (float) $payment->amount_paid), 2) }}</span></div>
                    <div class="field"><button class="button button--sm" type="submit">Save Month</button></div>
                </form>
                <form action="{{ route('admin.fees.months.destroy', [$fee, $payment]) }}" method="POST" data-confirm-delete style="margin-top:.4rem">@csrf @method('DELETE')<button class="button button--danger button--sm" type="submit">Delete Month</button></form>
            </td>
        </tr>
    @empty
        <tr><td colspan="6">No monthly fee records yet.</td></tr>
    @endforelse
    </tbody></table></div>
</div></div>

<div class="admin-card" style="margin-top: 1rem"><div class="admin-card__body">
    <h2 style="margin-top:0">Add Monthly Fee</h2>
    <form action="{{ route('admin.fees.months.store', $fee) }}" method="POST"><div class="form-grid">@csrf
        <div class="field"><label for="new-billing-month">Month</label><input id="new-billing-month" name="billing_month" type="month" value="{{ old('billing_month', $nextMonth) }}" required>@error('billing_month')<span class="error">{{ $message }}</span>@enderror</div>
        <div class="field"><label for="new-amount-due">Amount Due</label><input id="new-amount-due" name="amount_due" type="number" min="0" step="0.01" value="{{ old('amount_due', $fee->total_fee) }}" required>@error('amount_due')<span class="error">{{ $message }}</span>@enderror</div>
        <div class="field"><label for="new-amount-paid">Amount Paid</label><input id="new-amount-paid" name="amount_paid" type="number" min="0" step="0.01" value="{{ old('amount_paid', 0) }}" required>@error('amount_paid')<span class="error">{{ $message }}</span>@enderror</div>
        <div class="field"><label for="new-paid-at">Paid Date</label><input id="new-paid-at" name="paid_at" type="date" value="{{ old('paid_at') }}">@error('paid_at')<span class="error">{{ $message }}</span>@enderror</div>
    </div><button class="button" type="submit">Add Month</button></form>
</div></div>
@endsection
