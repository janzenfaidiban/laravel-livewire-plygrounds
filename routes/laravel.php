<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::prefix('laravel')->group(function () {

    // require_once('laravel/country.php');
    // require_once('laravel/city.php');
    // require_once('laravel/shop.php');

    Route::controller(CountryController::class)->group(function(){

        Route::get('countries','index')->name('countries');
        Route::get('countries/create','create')->name('countries.create');
        Route::get('countries/{id}/show','show')->name('countries.show');
        Route::get('countries/{id}/edit','edit')->name('countries.edit');
        
        Route::post('countries/store','store')->name('countries.store');
        Route::put('countries/{id}/update','update')->name('countries.update');
        Route::delete('countries/{id}/delete','delete')->name('countries.delete');
        
    });

    Route::controller(CityController::class)->group(function(){

        Route::get('cities','index')->name('cities');
        Route::get('cities/create','create')->name('cities.create');
        Route::get('cities/{id}/show','show')->name('cities.show');
        Route::get('cities/{id}/edit','edit')->name('cities.edit');
        
        Route::post('cities/store','store')->name('cities.store');
        Route::put('cities/{id}/update','update')->name('cities.update');
        Route::delete('cities/{id}/delete','delete')->name('cities.delete');
    
    });


    Route::controller(ShopController::class)->group(function(){

        Route::get('shops','index')->name('shops');
        Route::get('shops/create','create')->name('shops.create');
        Route::get('shops/{id}/show','show')->name('shops.show');
        Route::get('shops/{id}/edit','edit')->name('shops.edit');
        
        Route::post('shops/store','store')->name('shops.store');
        Route::put('shops/{id}/update','update')->name('shops.update');
        Route::delete('shops/{id}/delete','delete')->name('shops.delete');

    });


});