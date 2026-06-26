@extends('admin.layouts.app')

@section('title', $title ?? 'Add Job | Exlon Tech')
@section('page_title', 'Add Job')
@section('page_subtitle', 'Create a job description for the public careers page.')

@section('content')
    <div class="admin-card">
        <div class="admin-card__body">
            <form action="{{ route('admin.jobs.store') }}" method="POST">
                @include('admin.jobs._form')
            </form>
        </div>
    </div>
@endsection
