<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get(
    '/', function () {
        $posts = Post::with("user:id,name,organization")
            ->orderBy("created_at", "DESC")->get();
        return Inertia::render(
            'Home', [
            "posts"=>$posts
            ]
        );
    }
);


Route::resource("profile", ProfileController::class);
Route::resource("posts", PostController::class);



require __DIR__ . '/auth.php';
