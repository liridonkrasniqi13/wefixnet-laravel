<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [\App\Http\Controllers\AuthController::class, 'user']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('change-password/{id}', [\App\Http\Controllers\AuthController::class, 'changePassword']);
    Route::delete('delete-user/{id}', [\App\Http\Controllers\AuthController::class,'deleteUser']);
    Route::get('/users', [App\Http\Controllers\UserController::class, 'getAllUsers']);
    Route::get('/users/{id}', [App\Http\Controllers\UserController::class, 'showUser']);
    Route::post('/usersupdate/{id}', [App\Http\Controllers\UserController::class, 'updateUser']);
    Route::get('posts', [App\Http\Controllers\PostController::class, 'getPosts']);
    Route::get('posts/{id}', [App\Http\Controllers\PostController::class, 'getPostById']);
    Route::post('/posts', [App\Http\Controllers\PostController::class, 'store']);
    Route::put('/posts/{post_id}', [App\Http\Controllers\PostController::class, 'update']);
    Route::get('/author/{post_author}', [App\Http\Controllers\PostController::class, 'getPostsByAuthor']);
    Route::delete('delete-post/{id}', [\App\Http\Controllers\PostController::class,'deletePost']);
    Route::get('/categories', [CategoryController::class, 'index']);
});
