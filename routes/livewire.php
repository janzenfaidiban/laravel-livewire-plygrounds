<?php
use Illuminate\Support\Facades\Route;
use App\Livewire\Country\Index as Country;

Route::prefix('livewire')->name('livewire.')->group(function () {
    Route::get('/country', Country::class)->name('country');
});
