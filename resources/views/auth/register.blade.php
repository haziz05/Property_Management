@extends('adminlte::page')

@section('title', 'Register')

{{-- Hide the AdminLTE left sidebar & apply the same gradient/card styling as the login page --}}
@section('css')
<style>
    .main-header {
        display: none !important;
    }
    .main-sidebar {
        display: none !important;
    }
    .content-wrapper, .main-header, .main-footer {
        margin-top: 0 !important;
        margin-left: 0 !important;
        width: 100% !important;
    }

    body {
        min-height: 100vh;
        margin: 0;
        padding: 0;
        background: linear-gradient(to right, #9c27b0, #03a9f4);
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: calc(100vh - 100px);
    }

    .login-card {
        background-color: #fff;
        width: 350px;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 0 30px rgba(0,0,0,0.1);
        text-align: center;
    }

    .login-card h1 {
        margin-bottom: 1.5rem;
        font-weight: bold;
    }

    .form-control {
        border-radius: 30px;
        padding: 0.75rem 1rem;
    }
    .input-group-text {
        border-radius: 30px;
    }

    .gradient-button {
        background: linear-gradient(to right, #03a9f4, #9c27b0);
        color: #fff;
        border: none;
        border-radius: 30px;
        padding: 0.75rem 1.5rem;
        font-weight: bold;
        transition: 0.3s;
    }
    .gradient-button:hover {
        opacity: 0.9;
    }

    .social-icons {
        margin: 1rem 0;
        display: flex;
        justify-content: center;
        gap: 1.5rem;
    }
    .social-icons a {
        font-size: 1.5rem;
        color: #555;
        transition: 0.3s;
    }
    .social-icons a:hover {
        color: #000;
    }

    .login-extra-links {
        margin-top: 1rem;
        font-size: 0.9rem;
        color: #666;
    }

</style>
@stop

@section('content_header')
@stop

@section('content')
<div class="login-container">
    <div class="login-card">
        <h1>Register</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <div class="input-group">
                    <input id="name" type="text" name="name" class="form-control" placeholder="Type your name" value="{{ old('name') }}" required autofocus>
                </div>
                @error('name')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <div class="input-group">
                    <input id="email" type="email" name="email" class="form-control" placeholder="Type your email" value="{{ old('email') }}" required>
                </div>
                @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <div class="input-group">
                    <input id="password" type="password" name="password" class="form-control" placeholder="Type your password" required autocomplete="new-password">
                </div>
                @error('password')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <div class="input-group">
                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="Confirm your password" required autocomplete="new-password">
                </div>
                @error('password_confirmation')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="mt-4">
                <button type="submit" class="btn gradient-button w-100">
                    REGISTER
                </button>
            </div>

            <!-- Optional social icons (same style as login) -->
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-google"></i></a>
            </div>

            <!-- Already have an account? -->
            <div class="login-extra-links">
                Already have an account? <a href="{{ route('login') }}">Log in</a>
            </div>
        </form>
    </div>
</div>
@stop

@section('js')
@stop
