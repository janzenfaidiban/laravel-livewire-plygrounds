<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;

Route::controller(CountryController::class)->group(function(){

    Route::get('country','index')->name('country');
    Route::get('country/create','create')->name('country.create');
    Route::get('country/{id}/show','show')->name('country.show');
    Route::get('country/{id}/edit','edit')->name('country.edit');
    
    Route::post('country/store','store')->name('country.store');
    Route::put('country/{id}/update','update')->name('country.update');
    Route::delete('country/{id}/delete','delete')->name('country.delete');
    
});