<?php

use Illuminate\Support\Facades\Route;
use Modules\Pages\app\Http\Controllers\PagesController;
use Modules\Pages\app\Contracts\BeforePageRenderMiddleware;

Route::group(
    [],
    function () {
        Route::get('/', [PagesController::class, 'home'])->name('pages.home');
        Route::fallback([PagesController::class, 'show'])->middleware(BeforePageRenderMiddleware::class)->name('pages.show');
    }
);
