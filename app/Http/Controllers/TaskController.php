<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::where('user_id', Auth::id())
            ->when($request->search, fn ($q, $s) => $q->where('title', 'like', "%{$s}%"))
            ->when($request->status, fn ($q, $s) => $q->where('status', $s))
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date'    => 'nullable|date',
        ]);

        $data['user_id'] = Auth::id();
        Task::create($data);

        return redirect()->route('tasks.index')->with('success', 'Task added.');
    }

    public function edit($id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);

        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date'    => 'nullable|date',
            'status'      => 'required|in:pending,completed',
        ]);

        $task->update($data);

        return redirect()->route('tasks.index')->with('success', 'Task updated.');
    }

    public function toggle($id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        $task->status = $task->status === 'completed' ? 'pending' : 'completed';
        $task->save();

        return back()->with('success', 'Status changed.');
    }

    public function destroy($id)
    {
        Task::where('user_id', Auth::id())->findOrFail($id)->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted.');
    }
}
