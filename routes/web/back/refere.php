<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\RefereController;

Route::middleware(['admin.auth'])->group(function () {
    Route::resource('referes', RefereController::class)->names([
        'index'      => 'back.refere.index',
        'create'     => 'back.refere.create',
        'show'       => 'back.refere.show',
        'store'      => 'back.refere.store',
        'edit'       => 'back.refere.edit',
        'update'     => 'back.refere.update',
        'destroy'    => 'back.refere.delete',
    ]);
});
