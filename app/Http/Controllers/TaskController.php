<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditTaskRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTaskRequest;
use Exception;
use Illuminate\Support\Facades\Log;

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

    public function store(StoreTaskRequest $request)
    {
        // $title = $request->title;
        // $description = $request->description;
        // $status = $request->status;
        // $name = $request->name;

        // $validatedData = $request->validate([
        //     'title' => ['required', 'string', 'max:255'],
        //     'description' => ['required', 'string', 'min:10', 'max:500'],
        //     'status' => ['required', 'string', 'max:50'],
        //     'name' => ['required', 'string', 'max:100'],
        //     'image' => ['nullable','image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        // ]);

        $validatedData = $request->validated();
        try {
            $image = $request->hasFile('image');
            $imagePath = null;
            if ($image) {
                $imagePath = $request->file('image')->store('task_images', 'public');
            }
            // Using Eloquent ORM
            $task = new Task();
            $task->title = $validatedData['title'];
            $task->description = $validatedData['description'];
            $task->status = $validatedData['status'];
            $task->name = $validatedData['name'];
            $task->image = $imagePath;
            $task->save();

            Log::channel('daily')->info('Task created: ', [
                'id' => $task->id,
                'title' => $task->title
            ]);

            return redirect()->route('tasks.createtask')->with('success', 'Task created successfully.');
        } catch (Exception $e) {
            Log::channel('daily')->error('Error creating task: ', [
                'error' => $e->getMessage()
            ]);
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        // $task = DB::table('tasks')->where('id', $id)->first();

        # Using Eloquent ORM
        $task = Task::findOrFail($id);

        return view('tasks.edit', ['task' => $task]);
    }

    public function update(EditTaskRequest $request, $id)
    {
        // $title = $request->title;
        // $description = $request->description;
        // $status = $request->status;
        // $name = $request->name;

        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:10', 'max:500'],
            'status' => ['required', 'string', 'max:50'],
            'name' => ['required', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        ]);

        $validatedData = $request->validated();

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
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'status' => $validatedData['status'],
            'name' => $validatedData['name'],
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
