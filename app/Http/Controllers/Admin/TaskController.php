<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseFile;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(): View
    {
        $tasks = Task::with('case')->latest()->paginate(15);

        return view('admin.tasks.index', compact('tasks'));
    }

    public function create(): View
    {
        return view('admin.tasks.create', ['cases' => CaseFile::all()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'case_id' => ['required', 'exists:cases,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'status' => ['required', 'in:Pending,In Progress,Completed'],
            'due_date' => ['required', 'date'],
        ]);

        Task::create($validated);

        return redirect()->route('admin.tasks.index')->with('status', 'Task created.');
    }

    public function edit(Task $task): View
    {
        return view('admin.tasks.edit', ['task' => $task, 'cases' => CaseFile::all()]);
    }

    public function update(Request $request, Task $task): RedirectResponse
    {
        $validated = $request->validate([
            'case_id' => ['required', 'exists:cases,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'status' => ['required', 'in:Pending,In Progress,Completed'],
            'due_date' => ['required', 'date'],
        ]);

        $task->update($validated);

        return redirect()->route('admin.tasks.index')->with('status', 'Task updated.');
    }

    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();

        return redirect()->route('admin.tasks.index')->with('status', 'Task deleted.');
    }
}
