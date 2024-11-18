<?php

use App\Http\Controllers\anmeldungController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostLikesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserPostsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/sign_up', [anmeldungController::class, 'index'])->name('sign_up');
Route::post('/sign_up', [anmeldungController::class, 'store']);

Route::get('/post', [PostsController::class, 'index'])->name('post');
Route::get('/post/{post}', [PostsController::class, 'show'])->name('post.show');
Route::post('/post', [PostsController::class, 'store']);
Route::delete('/post/{post}', [PostsController::class, 'destroy'])->name('post.destroy');

Route::post('/post/{post}/like', [PostLikesController::class, 'store'])->name('posts.likes');
Route::delete('/post/{post}/like', [PostLikesController::class, 'destroy'])->name('posts.likes');

Route::get('/users/{user:username}', [UserPostsController::class, 'index'])->name('user.posts');

Route::get('/', function () {
    return view('index');
})->name('home');
