<?php

use Illuminate\Support\Facades\Route;
use Modules\Pages\app\Http\Controllers\PagesController;

Route::group(
    [],
    function () {
        Route::get('/', [PagesController::class, 'home'])->name('pages.home');
        Route::fallback([PagesController::class, 'show'])->name('pages.show');
    }
);
