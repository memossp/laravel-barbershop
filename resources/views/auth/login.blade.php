@extends('layouts.main')

@section('title', 'Login')

@section('additional_css')
    <link rel="stylesheet" href="{{ asset('css/log_in.css') }}"/>
    <style>
        .invalid-feedback {
            color: #dc3545;
            font-size: 0.875em;
            margin-top: 0.25rem;
            display: block;
        }
        .is-invalid {
            border-color: #dc3545;
        }
    </style>
@endsection

@section('content')
    <!-- Login Form -->
    <div class="former-wrap">
        <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email field -->
            <label for="email">Email Address:</label>
            <input id="email"
                   type="email"
                   class="@error('email') is-invalid @enderror"
                   name="email"
                   value="{{ old('email') }}"
                   required
                   autocomplete="email"
                   autofocus>
            @error('email')
            <span class="invalid-feedback">
            {{ $message }}
        </span>
            @enderror

            <label for="password">Password:</label>
            <input id="password"
                   type="password"
                   class="@error('password') is-invalid @enderror"
                   name="password"
                   required
                   autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback">
            {{ $message }}
        </span>
            @enderror

            <input type="submit" value="Login">
            <p>Don't have an account? <a href="{{ route('register') }}">Sign Up</a></p>
        </form>
    </div>
@endsection
