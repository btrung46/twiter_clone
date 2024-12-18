<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\LikeIdeaController;
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
use App\Http\Controllers\Admin\DashboardController as AdminDashBoardController;
use App\Http\Controllers\Admin\IdeaController as AdminIdeaController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
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

Route::group(['prefix' => 'ideas/', 'as' => 'idea.', 'middleware' => 'auth'], function () {
    Route::post('/', [IdeaController::class, 'create_idea'])->name('store');

    Route::delete('/{idea}', [IdeaController::class, 'delete_idea'])->name('destroy');

    Route::get('/{idea}', [IdeaController::class, 'show_idea'])->name('show');

    Route::get('/{idea}/edit', [IdeaController::class, 'edit_idea'])->name('edit');

    Route::put('/{idea}', [IdeaController::class, 'update_idea'])->name('update');

    Route::post('/{idea}', [CommentController::class, 'create_commment'])->name('comments.store');

    Route::delete('/{idea}/{comment}', [CommentController::class, 'delete'])->name('comment.destroy');
});
Route::post('/user/{user}/follow', [FollowController::class, 'follow'])
    ->name('user.follow')
    ->Middleware('auth');
Route::post('/user/{user}/unfollow', [FollowController::class, 'unfollow'])
    ->name('user.unfollow')
    ->Middleware('auth');

Route::post('/ideas/{idea}/toggle-like', [LikeIdeaController::class, 'toggleLike'])->name('ideas.toggleLike');

Route::get('/feed', FeedController::class)
    ->middleware('auth')
    ->name('feed');
Route::resource('user', ProfileController::class)
    ->only('show', 'edit', 'update')
    ->middleware('auth');

//admin
Route::middleware(['auth', 'can:admin'])
    ->prefix('/admin')
    ->as('admin.')
    ->group(function () {
        Route::get('/', [AdminDashBoardController::class, 'index'])->name('dashboard');
        Route::delete('users/{user}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::get('/ideas', [AdminIdeaController::class, 'index'])->name('ideas');
        Route::resource('/comments', AdminCommentController::class)
    ->only('index', 'destroy');
    });
