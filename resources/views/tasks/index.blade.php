@extends('app')
@section('title', 'Tasks')

@section('content')
    <div class="box">
        <div class="top">
            <h2>My Tasks</h2>
            <a href="{{ route('tasks.create') }}" class="btn">+ Add Task</a>
        </div>

        <form method="GET" action="{{ route('tasks.index') }}" class="filters">
            <input type="text" name="search" placeholder="Search title..." value="{{ request('search') }}">
            <select name="status">
                <option value="">All Status</option>
                <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
            <button type="submit" class="btn">Filter</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-gray">Reset</a>
        </form>

        @if ($tasks->isEmpty())
            <div class="empty">No tasks found.</div>
        @else
            <table>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Due</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $tasks->firstItem() + $loop->index }}</td>
                        <td>
                            <strong>{{ $task->title }}</strong>
                            @if ($task->description)
                                <div style="color:#6b7280;font-size:13px">{{ $task->description }}</div>
                            @endif
                        </td>
                        <td>{{ $task->due_date ?? '-' }}</td>
                        <td><span class="badge {{ $task->status }}">{{ ucfirst($task->status) }}</span></td>
                        <td>
                            <div class="actions">
                                <form method="POST" action="{{ route('tasks.toggle', $task->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-sm btn-green" type="submit">
                                        {{ $task->status === 'completed' ? 'Undo' : 'Done' }}
                                    </button>
                                </form>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm">Edit</a>
                                <form method="POST" action="{{ route('tasks.destroy', $task->id) }}" onsubmit="return confirm('Delete this task?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-red" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>

            {{ $tasks->links('pagination::bootstrap-4') }}
        @endif
    </div>
@endsection