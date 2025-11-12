<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = DB::table('tasks')
        ->orderBy('id', 'desc')
        ->paginate(5);

        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks.createtask');
    }

    public function store(Request $request)
    {
        $title = $request->title;
        $description = $request->description;
        $status = $request->status;
        $name = $request->name;

        $image = $request->hasFile('image');
        $imagePath = null;
        if ($image) {
            $imagePath = $request->file('image')->store('task_images', 'public');
        }

        DB::table('tasks')->insert([
            'title' => $title,
            'description' => $description,
            'status' => $status,
            'name' => $name,
            'image' => $imagePath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('tasks.createtask')->with('success', 'Task created successfully.');
    }

    public function edit($id)
    {
        $task = DB::table('tasks')->where('id', $id)->first();

        return view('tasks.edit', ['task' => $task]);
    }

    public function update(Request $request, $id)
    {
        $title = $request->title;
        $description = $request->description;
        $status = $request->status;
        $name = $request->name;

        $image = $request->hasFile('image');
        $imagePath = null;
        if ($image) {
            $imagePath = $request->file('image')->store('task_images', 'public');
        }

        $updateData = [
            'title' => $title,
            'description' => $description,
            'status' => $status,
            'name' => $name,
            'updated_at' => now(),
        ];

        if ($imagePath) {
            $updateData['image'] = $imagePath;
        }

        DB::table('tasks')->where('id', $id)->update($updateData);

        return redirect()->route('tasks.edit', $id)->with('success', 'Task updated successfully.');

    }

    public function destroy($id)
    {
        DB::table('tasks')->where('id', $id)->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
