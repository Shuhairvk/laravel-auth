<label>Title</label>
<input type="text" name="title" value="{{ old('title', $task->title ?? '') }}" required>
@error('title') <div class="error">{{ $message }}</div> @enderror

<label>Description</label>
<textarea name="description" rows="4">{{ old('description', $task->description ?? '') }}</textarea>
@error('description') <div class="error">{{ $message }}</div> @enderror

<label>Due Date</label>
<input type="date" name="due_date" value="{{ old('due_date', $task->due_date ?? '') }}">
@error('due_date') <div class="error">{{ $message }}</div> @enderror

@isset($task)
    <label>Status</label>
    <select name="status">
        <option value="pending" {{ old('status', $task->status) === 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="completed" {{ old('status', $task->status) === 'completed' ? 'selected' : '' }}>Completed</option>
    </select>
    @error('status') <div class="error">{{ $message }}</div> @enderror
@endisset