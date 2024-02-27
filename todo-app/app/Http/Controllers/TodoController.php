<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class TodoController extends Controller
{
    public function createTodo(Request $request)
    {
        $body = $request->validate(["todo" => "required"]);
        $body["todo"] = strip_tags($body["todo"]);
        Todo::create($body);
        return view("components/combined-todo-completed", ["todoList" => todo::all()]);
    }

    public function toggleTodo(request $request)
    {
        $data = $request->except(['_token', 'from']);
        $from = $request->input("from");

        if ($from == "todo")
            Todo::whereIn("id", array_keys($data))->update(["status" => 1]);
        else
            Todo::whereNotIn("id", array_keys($data))->update(["status" => 0]);

        return view("components/combined-todo-completed", ["todoList" => todo::all()]);
    }
}
