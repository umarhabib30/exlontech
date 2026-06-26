@extends('admin.layouts.app')

@section('title', 'Admin Login | Exlon Tech')

@section('content')
    <div style="min-height: 100vh; display: grid; place-items: center; padding: 1.25rem;">
        <div class="admin-card" style="width: min(100%, 28rem);">
            <div class="admin-card__body" style="padding: 2rem;">
                <a href="{{ route('home') }}" class="admin-logo" style="margin-bottom: 1.5rem;">
                    <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Exlon Tech">
                </a>

                <h1 class="admin-title">Admin Login</h1>
                <p class="admin-subtitle" style="margin-bottom: 1.5rem;">Access the Exlon Tech admin panel.</p>

                <form action="{{ route('admin.login.store') }}" method="POST">
                    @csrf
                    <div class="field">
                        <label for="email">Email Address</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" required>
                        @error('password')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <label style="display: flex; align-items: center; gap: 0.5rem; color: var(--muted); margin-bottom: 1.25rem;">
                        <input type="checkbox" name="remember" value="1">
                        Remember me
                    </label>

                    <button type="submit" class="button" style="width: 100%;">
                        <i class="fa-solid fa-lock"></i>
                        Sign In
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
