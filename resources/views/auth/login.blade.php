@extends('layout')
@section('title', 'Login')

@section('content')
    <h2>Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email') <div class="error">{{ $message }}</div> @enderror

        <label>Password</label>
        <input type="password" name="password" required>

        <label class="remember"><input type="checkbox" name="remember"> Remember me</label>

        <button type="submit">Login</button>
    </form>
    <div class="link">No account? <a href="{{ route('register') }}">Register</a></div>
@endsection