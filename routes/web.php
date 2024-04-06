<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
<<<<<<< HEAD
    return redirect('login');
=======
    // return redirect('laravel/country');
    return view('welcome');
>>>>>>> b165015f56bd591b85752fdd4818a567cd841005
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
