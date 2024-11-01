<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
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

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

Route::group(['prefix' => 'ideas/', 'as' => 'idea.','middleware' => 'auth'],function () {
    Route::post('/', [IdeaController::class, 'create_idea'])
        ->name('store');

    Route::delete('/{idea}', [IdeaController::class, 'delete_idea'])
        ->name('destroy');

    Route::get('/{idea}', [IdeaController::class, 'show_idea'])
        ->name('show');

    Route::get('/{idea}/edit', [IdeaController::class, 'edit_idea'])
        ->name('edit');

    Route::put('/{idea}', [IdeaController::class, 'update_idea'])
        ->name('update');

    Route::post('/{idea}', [CommentController::class, 'create_commment'])
        ->name('comments.store');
});

Route::resource('user', ProfileController::class)->only('show','edit','update')->middleware('auth');
