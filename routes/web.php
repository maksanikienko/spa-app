<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CaptchaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [CommentController::class, 'show'])->name('comments.show');

Route::get('/reload-captcha', [CaptchaController::class, 'reloadCaptcha']);

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
