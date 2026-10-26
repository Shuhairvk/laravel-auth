@extends('layout')
@section('title', 'Register')

@section('content')
    <h2>Register</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <label>Name</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        @error('name') <div class="error">{{ $message }}</div> @enderror

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email') <div class="error">{{ $message }}</div> @enderror

        <label>Password</label>
        <input type="password" name="password" required>
        @error('password') <div class="error">{{ $message }}</div> @enderror

        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" required>

        <button type="submit">Create Account</button>
    </form>
    <div class="link">Already have an account? <a href="{{ route('login') }}">Login</a></div>
@endsection