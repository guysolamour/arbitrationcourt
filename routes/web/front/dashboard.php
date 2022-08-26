<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Dashboard\QuizController;
use App\Http\Controllers\Front\Dashboard\DashboardController;



Route::prefix('dashboard')->middleware(['verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware(['auth'])->group(function () {
        Route::get('/quiz', [QuizController::class, 'index'])->name('front.auth.quiz.index');
    });
});


