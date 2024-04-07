<?php
use Illuminate\Support\Facades\Route;
use App\Livewire\Country\Index as Country;
use App\Livewire\City\Index as City;
use App\Livewire\Shop\Index as Shop;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('livewire')->name('livewire.')->group(function () {
        Route::get('/countries', Country::class)->name('countries');
        Route::get('/cities', City::class)->name('cities');
        Route::get('/shops', Shop::class)->name('shops');
    });
});
