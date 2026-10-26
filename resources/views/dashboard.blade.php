@extends('app')
@section('title', 'Dashboard')

@section('content')
    <h2>Welcome, {{ auth()->user()->name }}</h2>

    <div class="stats">
        <div class="stat"><div>Total Tasks</div><div class="num">{{ $total }}</div></div>
        <div class="stat"><div>Pending</div><div class="num">{{ $pending }}</div></div>
        <div class="stat"><div>Completed</div><div class="num">{{ $completed }}</div></div>
    </div>

    <div class="box">
        <a href="{{ route('tasks.create') }}" class="btn">+ Add New Task</a>
        <a href="{{ route('tasks.index') }}" class="btn btn-gray">View All Tasks</a>
    </div>
@endsection