<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = DB::table('tasks')->get();

        return view('task.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'title' => 'required|unique:tasks|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'is_completed' => 'required|in:0,1',
            'due_date' => 'required|date|after_or_equal:today'

        ]);
        //dd($request->all());
        $validated['image'] = $request->file('image')->store('uploads', 'public');

        Task::create($validated);
        return redirect()->route('tasks.index')->with('success', 'Task Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = DB::table('tasks')->find($id);

        if (request()->ajax()) {
            return response()->json($task);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = DB::table('tasks')->find($id);

        return view('task.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);
        if ($task) {
            $validated = $request->validate([

                'title' => 'required|max:255',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
                'is_completed' => 'required|in:0,1',
                'due_date' => 'required|date|after_or_equal:today'

            ]);
            //dd($request->all());
            $validated['image'] = $request->file('image')->store('uploads', 'public');
            $task->update($validated);
            return redirect()->route('tasks.index')->with('success', 'Task Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        if ($task) {
            $task->delete();
        }
        return redirect()->route('tasks.index')->with('success', 'Task Deleted Successfully');
    }
}
