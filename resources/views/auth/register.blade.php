@extends('layouts.main')

@section('title', 'Barber - Sign Up')

@section('content')
    <div class="former-wrap">
        <h1>Sign Up</h1>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            @method('POST')

            <!-- Name field -->
            <label for="name">Name:</label>
            <input type="text" id="name"
                   class="@error('name') is-invalid @enderror"
                   name="name"
                   value="{{ old('name') }}"
                   required
                   autocomplete="name"
                   autofocus>
            @error('name')
            <span class="invalid-feedback">
            {{ $message }}
        </span>
            @enderror

            <!-- Email field -->
            <label for="email">Email:</label>
            <input type="email" id="email"
                   class="@error('email') is-invalid @enderror"
                   name="email"
                   value="{{ old('email') }}"
                   required
                   autocomplete="email">
            @error('email')
            <span class="invalid-feedback">
            {{ $message }}
        </span>
            @enderror

            <!-- Password field -->
            <label for="password">Password:</label>
            <input type="password" id="password"
                   class="@error('password') is-invalid @enderror"
                   name="password"
                   required
                   autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback">
            {{ $message }}
        </span>
            @enderror

            <!-- Confirm Password field -->
            <label for="password-confirm">Confirm Password:</label>
            <input type="password"
                   id="password-confirm"
                   name="password_confirmation"
                   required
                   autocomplete="new-password">

            <!-- Submit button -->
            <input type="submit" value="Create Account">

            <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
        </form>
    </div>
@endsection

@section('additional_css')
    <link rel="stylesheet" href="{{ asset('css/log_in.css') }}"/>
@endsection
