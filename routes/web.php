<?php

use App\Livewire\Home;
use App\Livewire\ManageApplications;
use App\Livewire\ModifyCandadacy;
use App\Livewire\Test;
use Illuminate\Support\Facades\Route;

// Route::get('/', Test::class)->name('home');

// Route::name('inscription.')->group(function () {
//     Route::get('gerer-les-candidatures', ManageApplications::class)->name('manage');
// });

Route::get('/', Home::class)->name('home');

Route::name('inscription.')->group(function () {
    Route::prefix('gerer-les-candidatures')->name('manage.')->group(function () {
        Route::get('/', ManageApplications::class)->name('all');
        Route::get('/candidature', ModifyCandadacy::class)->name('show');
    });
});
