<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\RequestController;

Route::middleware(['admin.auth'])->group(function () {
    Route::resource('requests', RequestController::class)->names([
        'index'      => 'back.request.index',
        'create'     => 'back.request.create',
        'show'       => 'back.request.show',
        'store'      => 'back.request.store',
        'edit'       => 'back.request.edit',
        'update'     => 'back.request.update',
        'destroy'    => 'back.request.delete',
    ]);

    Route::post('requests/{request}/confirm', [RequestController::class, 'confirm'])->name('back.request.confirm');
    Route::post('requests/{request}/reject', [RequestController::class, 'reject'])->name('back.request.reject');
    Route::get('requests/{request}/refere', [RequestController::class, 'refere'])->name('back.request.refere');
    Route::post('requests/{request}/refere', [RequestController::class, 'storeRefere'])->name('back.request.refere.store');

});
