<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[DashboardController::class , 'index'])->name("dashboard");

Route::post('/ideas',[IdeaController::class , 'create_idea']) ->name('idea.store');

Route::delete('/ideas/{id}',[IdeaController::class , 'delete_idea']) ->name('idea.destroy');

Route::get('/ideas/{idea}',[IdeaController::class , 'show_idea'])->name('idea.show');

Route::get('/ideas/{idea}/edit',[IdeaController::class , 'edit_idea'])->name('idea.edit');

Route::put('/ideas/{idea}',[IdeaController::class , 'update_idea'])->name('idea.update');

Route::get('/profile',[ProfileController::class , 'index']);
