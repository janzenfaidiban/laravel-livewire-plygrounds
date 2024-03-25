<?php
use Illuminate\Support\Facades\Route;
use App\Livewire\Country\Index as Country;
use App\Livewire\Shop\Index as Shop;

Route::prefix('livewire')->name('livewire.')->group(function () {
    Route::get('/country', Country::class)->name('country');
    Route::get('/shop', Shop::class)->name('shop');
});
