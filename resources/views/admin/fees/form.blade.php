@php($editing = $fee->exists)
@extends('admin.layouts.app')
@section('title', $title . ' | Admin')
@section('page_title', $title)
@section('page_subtitle', 'Enter student details, choose a course and instructor, and record fee payments.')
@section('content')
@if ($courses->isEmpty() || $instructors->isEmpty())
    <div class="admin-card"><div class="admin-card__body"><p>Create at least one course and one instructor before entering fee records.</p><div class="stack-actions"><a class="button" href="{{ route('admin.courses.create') }}">Add Course</a><a class="button button--ghost" href="{{ route('admin.instructors.create') }}">Add Instructor</a></div></div></div>
@else
<div class="admin-card"><div class="admin-card__body"><form action="{{ $editing ? route('admin.fees.update', $fee) : route('admin.fees.store') }}" method="POST">
@csrf @if ($editing) @method('PUT') @endif
<div class="form-grid">
    <div class="field"><label for="student_name">Student Name</label><input id="student_name" name="student_name" value="{{ old('student_name', $fee->student_name) }}" required>@error('student_name')<span class="error">{{ $message }}</span>@enderror</div>
    <div class="field"><label for="contact_number">Student Contact Number</label><input id="contact_number" name="contact_number" value="{{ old('contact_number', $fee->contact_number) }}" required>@error('contact_number')<span class="error">{{ $message }}</span>@enderror</div>
    <div class="field"><label for="id_card_number">ID Card Number</label><input id="id_card_number" name="id_card_number" value="{{ old('id_card_number', $fee->id_card_number) }}" required>@error('id_card_number')<span class="error">{{ $message }}</span>@enderror</div>
    <div class="field"><label for="father_name">Father Name</label><input id="father_name" name="father_name" value="{{ old('father_name', $fee->father_name) }}" required>@error('father_name')<span class="error">{{ $message }}</span>@enderror</div>
    <div class="field"><label for="father_contact_number">Father Contact Number</label><input id="father_contact_number" name="father_contact_number" value="{{ old('father_contact_number', $fee->father_contact_number) }}" required>@error('father_contact_number')<span class="error">{{ $message }}</span>@enderror</div>
    <div class="field"><label for="date_of_birth">Date of Birth</label><input id="date_of_birth" name="date_of_birth" type="date" value="{{ old('date_of_birth', $fee->date_of_birth?->format('Y-m-d')) }}" required>@error('date_of_birth')<span class="error">{{ $message }}</span>@enderror</div>
    <div class="field"><label for="date_of_admission">Date of Admission</label><input id="date_of_admission" name="date_of_admission" type="date" value="{{ old('date_of_admission', $fee->date_of_admission?->format('Y-m-d')) }}" required>@error('date_of_admission')<span class="error">{{ $message }}</span>@enderror</div>
    <div class="field"><label for="course_id">Course</label><select id="course_id" name="course_id" required><option value="">Select a course</option>@foreach ($courses as $course)<option value="{{ $course->id }}" data-duration="{{ $course->duration }}" data-fee="{{ $course->fee_amount }}" @selected((string) old('course_id', $fee->course_id) === (string) $course->id)>{{ $course->name }}</option>@endforeach</select>@error('course_id')<span class="error">{{ $message }}</span>@enderror</div>
    <div class="field"><label for="degree">Degree</label><input id="degree" name="degree" value="{{ old('degree', $fee->degree) }}" required>@error('degree')<span class="error">{{ $message }}</span>@enderror</div>
    <div class="field"><label for="course_duration">Course Duration</label><input id="course_duration" value="{{ old('course_id') ? $courses->firstWhere('id', old('course_id'))?->duration : ($fee->course_duration ?: '') }}" readonly><small>Set in course management.</small></div>
    <div class="field"><label for="instructor_id">Instructor</label><select id="instructor_id" name="instructor_id" required><option value="">Select an instructor</option>@foreach ($instructors as $instructor)<option value="{{ $instructor->id }}" @selected((string) old('instructor_id', $fee->instructor_id) === (string) $instructor->id)>{{ $instructor->name }}</option>@endforeach</select>@error('instructor_id')<span class="error">{{ $message }}</span>@enderror</div>
    <div class="field"><label for="total_fee">Monthly Fee</label><input id="total_fee" name="total_fee" type="number" min="0" step="0.01" value="{{ old('total_fee', $fee->total_fee) }}" required>@error('total_fee')<span class="error">{{ $message }}</span>@enderror</div>
    <div class="field field--full"><small>The fee amount will be used as the amount due for each month. The first month comes from the admission date.</small></div>
    <div class="field field--full"><label for="address">Address</label><textarea id="address" name="address" required>{{ old('address', $fee->address) }}</textarea>@error('address')<span class="error">{{ $message }}</span>@enderror</div>
</div>
<div class="stack-actions"><button class="button" type="submit">Save Fee Record</button><a class="button button--ghost" href="{{ route('admin.fees.index') }}">Cancel</a></div>
</form></div></div>
@push('scripts')<script>
const courseSelect = document.getElementById('course_id');
courseSelect?.addEventListener('change', () => {
    const option = courseSelect.selectedOptions[0];
    document.getElementById('course_duration').value = option?.dataset.duration || '';
    const fee = document.getElementById('total_fee');
    if (option?.dataset.fee && (!fee.value || Number(fee.value) === 0)) fee.value = option.dataset.fee;
});
</script>@endpush
@endif
@endsection
