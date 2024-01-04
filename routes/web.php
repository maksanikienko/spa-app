<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CaptchaController;


Auth::routes();

Route::get('/', [CommentController::class, 'show'])->name('comments.show');

Route::get('/reload-captcha', [CaptchaController::class, 'reloadCaptcha']);

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::patch('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');

