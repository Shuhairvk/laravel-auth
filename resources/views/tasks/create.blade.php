@extends('app')
@section('title', 'Add Task')

@section('content')
    <div class="box">
        <h2>Add Task</h2>
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            @include('tasks._form')
            <br>
            <button type="submit" class="btn">Save Task</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-gray">Cancel</a>
        </form>
    </div>
@endsection