<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;

Route::controller(CityController::class)->group(function(){

    Route::get('city','index')->name('city');
    Route::get('city/create','create')->name('city.create');
    Route::get('city/{id}/show','show')->name('city.show');
    Route::get('city/{id}/edit','edit')->name('city.edit');
    Route::get('city/{id}/delete','show')->name('city.delete');

});
