<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

class TestController extends Controller
{
    public function getTask()
    {
        // $tasks = DB::table('tasks')->get();
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function orderItem()
    {
        // $tasks = OrderItem::all();
        // $tasks = OrderItem::all()->sortByDesc('price');
        // $tasks = OrderItem::find(3);
        // $tasks = OrderItem::select('product_name', 'quantity', "price")->get();
        // $tasks = OrderItem::where('price', '>', 100)
        // ->where('price', '<', 500)->get();
        $tasks = OrderItem::whereBetween('price', [50, 100])->get(); // another way of where between


        return response()->json($tasks);
    }
}
