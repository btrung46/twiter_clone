<?php
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'store'])->name('register');

Route::get('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'authenticate'])->name('login');

Route::get('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
