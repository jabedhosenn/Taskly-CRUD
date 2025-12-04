<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public function index()
    {
        // $tasks = DB::table('tasks')
        // ->orderBy('id', 'desc')
        // ->paginate(5);

        # Using Eloquent ORM
        $tasks = Task::orderBy('id', 'desc')->paginate(5);

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

        // DB::table('tasks')->insert([
        //     'title' => $title,
        //     'description' => $description,
        //     'status' => $status,
        //     'name' => $name,
        //     'image' => $imagePath,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // Using Eloquent ORM
        // $task = new Task();
        // $task->title = $title;
        // $task->description = $description;
        // $task->status = $status;
        // $task->name = $name;
        // $task->image = $imagePath;
        // $task->save();

        // Mass Assignment
        /*
        Task::create([
            'title' => $title,
            'description' => $description,
            'status' => $status,
            'name' => $name,
            'image' => $imagePath,
        ]); // more secure way to allow mass assignment. best practice
        */

        $data = $request->all();
        $data['image'] = $imagePath;

        Task::create($data);
        return redirect()->route('tasks.createtask')->with('success', 'Task created successfully.');
    }

    public function edit($id)
    {
        // $task = DB::table('tasks')->where('id', $id)->first();

        # Using Eloquent ORM
        $task = Task::findOrFail($id);

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

        // $updateData = [
        //     'title' => $title,
        //     'description' => $description,
        //     'status' => $status,
        //     'name' => $name,
        //     'updated_at' => now(),
        // ];

        // if ($imagePath) {
        //     $updateData['image'] = $imagePath;
        // }

        // DB::table('tasks')->where('id', $id)->update($updateData);

        // Using Eloquent ORM
        // $task = Task::findOrFail($id);
        // $task->title = $title;
        // $task->description = $description;
        // $task->status = $status;
        // $task->name = $name;
        // if ($imagePath) {
        //     $task->image = $imagePath;
        // }
        // $task->save();

        Task::where('id', $id)->update(array_filter([
            'title' => $title,
            'description' => $description,
            'status' => $status,
            'name' => $name,
            'image' => $imagePath,
        ]));

        return redirect()->route('tasks.edit', $id)->with('success', 'Task updated successfully.');

    }

    public function destroy($id)
    {
        // DB::table('tasks')->where('id', $id)->delete();
        // $imagePath =  $task->image;
        // if ($imagePath) {
        //     // Delete the image file from storage
        //     Storage::disk('public')->delete($imagePath);
        // }


        // Using Eloquent ORM
        $task = Task::findOrFail($id);

        $imagePath = $task->image;
        if ($imagePath) {
            // Delete the image file from storage
            Storage::disk('public')->delete($imagePath);
        }
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
