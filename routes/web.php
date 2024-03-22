<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return redirect('laravel/country');
    return view('welcome');
});

// Laravel Routes
require_once('laravel.php');