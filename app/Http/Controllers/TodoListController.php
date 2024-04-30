<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class TodoListController extends Controller
{
    public function index()
    {
        $response = Http::get('https://dummyjson.com/todos?limit=3');
        $data = $response->json();
        return response()->json($data, $response->status());
    }

    public function store(Request $request)
    {
        $response = Http::post('https://dummyjson.com/todos/add', [
            'todo' => $request->todo,
            'completed' => $request->completed,
            'userId' => $request->userId,
        ]);
        $data = $response->json();
        return response()->json($data, $response->status());
    }
}
