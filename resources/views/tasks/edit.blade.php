@extends('app')
@section('title', 'Edit Task')

@section('content')
    <div class="box">
        <h2>Edit Task</h2>
        <form method="POST" action="{{ route('tasks.update', $task->id) }}">
            @csrf
            @method('PUT')
            @include('tasks._form')
            <br>
            <button type="submit" class="btn">Update Task</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-gray">Cancel</a>
        </form>
    </div>
@endsection