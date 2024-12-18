<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function archived(){

        $archivedTasks = Task::onlyTrashed()->get();
        return view('tasks.archived', compact('archivedTasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'project_id' => 'required|exists:projects,id',
        ]);

        $task = Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'project_id' => $validated['project_id'],
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task = Task::withTrashed()->findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);

        if ($task->trashed()) {
            return redirect()->route('tasks.index')->with('error', 'Archived tasks cannot be updated.');
        }

        return view('tasks.edit', compact('task'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'project_id' => 'required|exists:projects,id',
        ]);
        $task = Task::findOrFail($id);

        $task->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'project_id' => $validated['project_id'],
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function archive($id)
    {
        $task = Task::findOrFail($id);

        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }    public function forceDelete($id)
    {
        $task = Task::withTrashed()->findOrFail($id);

        $task->forceDelete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
    public function restore($id )
    {
        $task = Task::onlyTrashed()->findOrFail($id);
        $task->restore();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
