<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = DB::table('tasks')->get();
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

        DB::table('tasks')->insert([
            'title' => $title,
            'description' => $description,
            'status' => $status,
            'name' => $name,
        ]);

        return redirect()->route('tasks.createtask')->with('success', 'Task created successfully.');
    }
}
