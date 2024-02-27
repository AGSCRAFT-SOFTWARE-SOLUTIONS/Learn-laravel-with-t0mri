<?php

use App\Events\PusherBroadcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider and all of them will
 * | be assigned to the "web" middleware group. Make something great!
 * |
 */

Route::get('/', function () {
    return view('index');
})->name('index');

Route::post('/send', function (Request $request) {
    $message = $request->get('message');
    broadcast(new PusherBroadcast($message))->toOthers();
    return view('send', ['message' => $message]);
})->name('send');

Route::post('/receive', function (Request $request) {
    return view('receive', ['message' => $request->get('message')]);
})->name('receive');
