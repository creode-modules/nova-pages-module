<?php

use Modules\Pages\app\Models\Page;
use Illuminate\Support\Facades\Route;
use Modules\Pages\app\Http\Controllers\PagesController;

Route::group(
    [],
    function () {
        Route::get('/', [PagesController::class, 'home']);
        Route::fallback([PagesController::class, 'show']);
    }
);
