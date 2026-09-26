<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // View all tasks
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    // Show Add Task Form
    public function create()
    {
        return view('tasks.create');
    }

    // Save new task
    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required',
            'description' => 'nullable',
            'due_date' => 'nullable|date',
        ]);

        Task::create([
            'task_name' => $request->task_name,
            'description' => $request->description,
            'status' => 'Pending',
            'due_date' => $request->due_date,
        ]);

        return response('', 303)->header('Location', '/tasks');
    }

    // Show Edit Task form
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }
    
    //Update an existing task
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'task_name' => 'required',
            'description' => 'nullable',
            'due_date' => 'nullable|date',
        ]);

        $task->update([
            'task_name' => $request->task_name,
            'description' => $request->description,
            'due_date' => $request->due_date,
     ]);

        return response('', 303)->header('Location', '/tasks');
    }
    
    // Delete task
    public function destroy(Task $task)
    {
        $task->delete();

        return response('', 303)->header('Location', '/tasks');
    }

    // Show Update Status form
    public function editStatus(Task $task)
    {
        return view('tasks.status', compact('task'));
    }

// Save updated status
    public function updateStatus(Request $request, Task $task)
    {
        $request->validate([
            'status' => 'required|in:Pending,Completed',
        ]);

        $task->update([
            'status' => $request->status,
        ]);

        return response('', 303)->header('Location', '/tasks');
    }
}

