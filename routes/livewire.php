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
    Route::prefix('livewire')->group(function () {
        Route::get('/', Country::class)->name('livewire');
        Route::get('/countries', Country::class)->name('livewire.countries');
        Route::get('/cities', City::class)->name('livewire.cities');
        Route::get('/shops', Shop::class)->name('livewire.shops');
    });
});
