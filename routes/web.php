<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
    return view('welcome');
});

// Laravel Routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('laravel/country');
        require_once('laravel.php');

});
