<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
    // return redirect('laravel/country');
    return view('welcome');
});

// Laravel Routes
require_once('laravel.php');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
