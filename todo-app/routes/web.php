<?php

use App\Http\Controllers\TodoController;
use App\Models\Test;
use App\Models\Todo;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    return view('index', ["todoList" => Todo::all()]);
});

Route::post("/createTodo", [TodoController::class, "createTodo"]);
Route::post("/toggleTodo", [TodoController::class, "toggleTodo"]);
