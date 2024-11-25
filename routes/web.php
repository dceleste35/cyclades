<?php

use App\Livewire\Home;
use App\Livewire\ManageApplications;
use App\Livewire\ModifyCandadacy;
use App\Livewire\ShowCandidates;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::name('inscription.')->group(function () {
    Route::prefix('gerer-les-candidatures')->name('manage.')->group(function () {
        Route::get('/', ManageApplications::class)->name('all');
        Route::get('/filtres', ModifyCandadacy::class)->name('filter');
        Route::get('/candidatures', ShowCandidates::class)->name('candidature');
    });
});
