<?php

use Illuminate\Support\Facades\Route;

Route::prefix('laravel')->group(function () {

    require_once('country.php');
    require_once('city.php');
    require_once('shop.php');

});