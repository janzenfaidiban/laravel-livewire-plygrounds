<?php

use Illuminate\Support\Facades\Route;

Route::prefix('laravel')->group(function () {

    require_once('laravel/country.php');
    require_once('laravel/city.php');
    require_once('laravel/shop.php');

});