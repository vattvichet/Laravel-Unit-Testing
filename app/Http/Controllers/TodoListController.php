<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class TodoListController extends Controller
{
    public function getTodoList()
    {
        $response = Http::get('https://dummyjson.com/products?limit=3');
        $data = $response->json();
        return response()->json($data, $response->status());
    }
}