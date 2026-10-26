@extends('layout')
@section('title', 'Dashboard')

@section('content')
    <h2>Dashboard</h2>
    <p style="text-align:center">Welcome, <strong>{{ auth()->user()->name }}</strong></p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection