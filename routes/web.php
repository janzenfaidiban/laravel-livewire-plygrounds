<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('country');
});

// Laravel Routes
require_once('laravel/country.php');
require_once('laravel/city.php');
require_once('laravel/shop.php');