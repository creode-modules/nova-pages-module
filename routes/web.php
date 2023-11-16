<?php

use Illuminate\Support\Facades\Route;
use Modules\Pages\app\Http\Controllers\PagesController;

Route::group(
    [],
    function () {
        Route::get('/', [PagesController::class, 'home']);
        Route::get('/{page:permalink}', [PagesController::class, 'show']);
    }
);
