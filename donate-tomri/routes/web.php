<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Stripe\Checkout\Session;
use Stripe\Stripe;

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

Route::get(
    '/', function () {
        return view('index');
    }
)->name('index');

Route::post(
    '/pay', function (Request $request) {
        $amount = (int) $request->validate(['amount' => 'required | numeric']);

        Stripe::setApiKey(config('stripe.sk'));

        $session = Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'inr',
                        'product_data' => [
                            'name' => 'Donate t0mri'
                        ],
                        'unit_amount' => $amount
                    ],
                    'quantity' => 1
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('thanks'),
            'cancel_url' => route('index')
        ]);

        return redirect()->away($session->url);
    }
)->name('pay');

Route::view('/thanks', 'thanks')->name('thanks');
