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

//testando api
Route::get('/', function () {
    return response()->json([
        'sucess' => true
    ]);
});

//Users.
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::get('/users/show/{id}', [UserController::class, 'show'])->name('users.show');
Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');

//Posts.
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/show/{id}', [PostController::class, 'show'])->name('posts.show');
Route::put('/posts/update/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/destroy/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

//Tags.
Route::get('/tags',[TagController::class,'index'])->name('tags.index');
Route::post('/tags/store',[TagController::class,'store'])->name('tags.store');
Route::get('/tags/show/{id}', [TagController::class, 'show'])->name('tags.show');
Route::put('/tags/update/{id}', [TagController::class, 'update'])->name('tags.update');
Route::delete('/tags/destroy/{id}', [TagController::class, 'destroy'])->name('tags.destroy');
