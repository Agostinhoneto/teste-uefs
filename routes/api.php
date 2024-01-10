<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Users.
Route::get('api/users', [UserController::class, 'index'])->name('users.index');
Route::post('api/users/store', [UserController::class, 'store'])->name('users.store');
Route::get('api/users/show/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('api/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('api/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('api/users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');

//Posts.
Route::get('api/posts', [PostController::class, 'index'])->name('posts.index');
Route::post('api/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('api/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('api/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('api/posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('api/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

//Tags.
Route::get('api/tags/index',[TagController::class,'index'])->name('tags.index');
Route::post('api/tags/store',[TagController::class,'store'])->name('tags.store');
Route::get('api/tags/{id}', [TagController::class, 'show'])->name('tags.show');
Route::get('api/tags/{id}/edit', [TagController::class, 'edit'])->name('tags.edit');
Route::put('api/tags/{id}', [TagController::class, 'update'])->name('tags.update');
Route::delete('api/tags/{id}', [TagController::class, 'destroy'])->name('tags.destroy');
