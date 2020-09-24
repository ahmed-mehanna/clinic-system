<?php

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
    return view('index');
})->name('index');

Route::get('/sign-in', function () {
    return view('sign-in');
})->name('sign-in');

Route::get('sign-up', function () {
    return view('sign-up');
})->name('sign-up');

Route::get('reset-password', function () {
    return view('forget-password');
})->name('forget-password');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
