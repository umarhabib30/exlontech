@extends('admin.layouts.app')

@section('title', $title ?? 'Edit Job | Exlon Tech')
@section('page_title', 'Edit Job')
@section('page_subtitle', 'Update the job details shown to applicants.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__body">
            <form action="{{ route('admin.jobs.update', $job) }}" method="POST">
                @method('PUT')
                @include('admin.jobs._form')
            </form>
        </div>
    </div>
@endsection
