@php($isCourse = $kind === 'course')
@php($label = $isCourse ? 'Course' : 'Instructor')
@php($route = $isCourse ? 'admin.courses' : 'admin.instructors')
@php($editing = $item->exists)
@extends('admin.layouts.app')

@section('title', ($editing ? 'Edit ' : 'Add ') . $label . ' | Admin')
@section('page_title', ($editing ? 'Edit ' : 'Add ') . $label)
@section('page_subtitle', $isCourse ? 'Set the course details and its default fee.' : 'Add instructor details for assignment to fee records.')

@section('content')
<div class="admin-card"><div class="admin-card__body">
    <form action="{{ $editing ? route($route . '.update', $item) : route($route . '.store') }}" method="POST">
        @csrf @if ($editing) @method('PUT') @endif
        <div class="form-grid">
            <div class="field"><label for="name">{{ $label }} Name</label><input id="name" name="name" value="{{ old('name', $item->name) }}" required>@error('name')<span class="error">{{ $message }}</span>@enderror</div>
            @if ($isCourse)
                <div class="field"><label for="duration">Course Duration</label><input id="duration" name="duration" value="{{ old('duration', $item->duration) }}" placeholder="e.g. 6 months" required>@error('duration')<span class="error">{{ $message }}</span>@enderror</div>
                <div class="field"><label for="fee_amount">Fee</label><input id="fee_amount" name="fee_amount" type="number" min="0" step="0.01" value="{{ old('fee_amount', $item->fee_amount) }}" required>@error('fee_amount')<span class="error">{{ $message }}</span>@enderror</div>
                <div class="field field--full"><label for="description">Description</label><textarea id="description" name="description">{{ old('description', $item->description) }}</textarea>@error('description')<span class="error">{{ $message }}</span>@enderror</div>
            @else
                <div class="field"><label for="contact_number">Contact Number</label><input id="contact_number" name="contact_number" value="{{ old('contact_number', $item->contact_number) }}">@error('contact_number')<span class="error">{{ $message }}</span>@enderror</div>
                <div class="field"><label for="email">Email</label><input id="email" name="email" type="email" value="{{ old('email', $item->email) }}">@error('email')<span class="error">{{ $message }}</span>@enderror</div>
                <div class="field"><label for="specialization">Specialization</label><input id="specialization" name="specialization" value="{{ old('specialization', $item->specialization) }}">@error('specialization')<span class="error">{{ $message }}</span>@enderror</div>
                <div class="field field--full"><label for="address">Address</label><textarea id="address" name="address">{{ old('address', $item->address) }}</textarea>@error('address')<span class="error">{{ $message }}</span>@enderror</div>
            @endif
        </div>
        <div class="stack-actions"><button class="button" type="submit">Save {{ $label }}</button><a class="button button--ghost" href="{{ route($route . '.index') }}">Cancel</a></div>
    </form>
</div></div>
@endsection
