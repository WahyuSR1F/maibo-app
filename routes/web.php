<?php

use App\Http\Controllers\eventController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('page.login');
});

Route::get('/dasboard', function () {
    return view('dasboard');
})->name('home');

Route::post('/login-auth', []);

Route::get('/created event', function () {
    return view('page.created_event');
})->name('create');