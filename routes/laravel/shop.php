<?php

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::controller(ShopController::class)->group(function(){

    Route::get('shop','index')->name('shop');
    Route::get('shop/create','create')->name('shop.create');
    Route::get('shop/{id}/show','show')->name('shop.show');
    Route::get('shop/{id}/edit','edit')->name('shop.edit');
    
    Route::post('shop/store','store')->name('shop.store');
    Route::put('shop/{id}/update','update')->name('shop.update');
    Route::delete('shop/{id}/delete','delete')->name('shop.delete');

});