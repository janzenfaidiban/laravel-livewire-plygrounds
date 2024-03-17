<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// countries


Route::controller(CountryController::class)->group(function(){

    Route::get('country','index')->name('country');
    Route::get('country/create','create')->name('country.create');
    Route::get('country/{id}/show','show')->name('country.show');
    Route::get('country/{id}/edit','edit')->name('country.edit');
    Route::get('country/{id}/delete','show')->name('country.delete');

});

// cities
Route::controller(CcityController::class)->group(function(){

    Route::get('city','index')->name('city');
    Route::get('city/create','create')->name('city.create');
    Route::get('city/{id}/show','show')->name('city.show');
    Route::get('city/{id}/edit','edit')->name('city.edit');
    Route::get('city/{id}/delete','show')->name('city.delete');

});




// shops
Route::controller(ShopController::class)->group(function(){

    Route::get('shop','index')->name('shop');
    Route::get('shop/create','create')->name('shop.create');
    Route::get('shop/{id}/show','show')->name('shop.show');
    Route::get('shop/{id}/edit','edit')->name('shop.edit');
    Route::get('shop/{id}/delete','show')->name('shop.delete');

});
