<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\QuestionController;

Route::middleware(['admin.auth'])->group(function () {
    Route::resource('questions', QuestionController::class)->names([
        'index'      => 'back.question.index',
        'create'     => 'back.question.create',
        'show'       => 'back.question.show',
        'store'      => 'back.question.store',
        'edit'       => 'back.question.edit',
        'update'     => 'back.question.update',
        'destroy'    => 'back.question.delete',
    ]);
});
