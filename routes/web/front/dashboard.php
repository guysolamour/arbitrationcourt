<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Dashboard\RequestController;
use App\Http\Controllers\Front\Dashboard\DashboardController;



Route::prefix('dashboard')->middleware(['verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware(['auth'])->group(function () {
        Route::name(Str::lower(config('administrable.front_namespace')) . '.dashboard.')->prefix('requests')->group(function () {

            Route::get('', [RequestController::class, 'index'])->name('request.index');
            Route::get('create', [RequestController::class, 'create'])->name('request.create');
            Route::post('', [RequestController::class, 'store'])->name('request.store');
            Route::get('{request}', [RequestController::class, 'show'])->name('request.show');
            Route::get('{request}/edit', [RequestController::class, 'edit'])->name('request.edit');
            Route::put('{request}', [RequestController::class, 'update'])->name('request.update');
            Route::delete('{request}', [RequestController::class, 'destroy'])->name('request.delete');
            Route::get('defenses/list', [RequestController::class, 'defense'])->name('request.defense');
            Route::get('referes/list', [RequestController::class, 'refere'])->name('request.refere');
        });

    });
});


