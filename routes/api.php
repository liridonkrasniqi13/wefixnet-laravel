<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepoController;
use App\Http\Controllers\VeturatController;
use App\Models\Depo;

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
	Route::delete('delete-user/{id}', [\App\Http\Controllers\AuthController::class, 'deleteUser']);
	Route::get('/users', [App\Http\Controllers\UserController::class, 'getAllUsers']);
	Route::get('/users-veturat', [App\Http\Controllers\UserController::class, 'getAllUsersVeturat']);
	Route::get('/users/{id}', [App\Http\Controllers\UserController::class, 'showUser']);
	Route::post('/usersupdate/{id}', [App\Http\Controllers\UserController::class, 'updateUser']);
	Route::get('posts', [App\Http\Controllers\PostController::class, 'getPosts']);
	Route::get('posts/{id}', [App\Http\Controllers\PostController::class, 'getPostById']);
	Route::get('date/posts-by-date', [App\Http\Controllers\PostController::class, 'getDataByDate']);
	Route::get('date/posts-by-date-author', [App\Http\Controllers\PostController::class, 'getDataByDateAndUser']);
	Route::get('date/posts-by-date-ticked', [App\Http\Controllers\PostController::class, 'getDataByDateAndTicked']);
	Route::get('date/posts-by-date-author-ticked', [App\Http\Controllers\PostController::class, 'getDataByDateAndUserAndTicked']);
	Route::post('/posts', [App\Http\Controllers\PostController::class, 'store']);
	Route::put('/posts/{post_id}', [App\Http\Controllers\PostController::class, 'update']);
	Route::get('/author/{post_author}', [App\Http\Controllers\PostController::class, 'getPostsByAuthor']);
	Route::delete('delete-post/{id}', [\App\Http\Controllers\PostController::class, 'deletePost']);
	Route::get('date-all-sum', [\App\Http\Controllers\PostController::class, 'getAllSumTicked']);
	
	// Dashboard 
	Route::get('ticked-all-dashboard', [\App\Http\Controllers\PostController::class, 'getAllTickedNumber']);
	Route::get('ticked-author-dashboard', [\App\Http\Controllers\PostController::class, 'getAllTickedNumberAuthor']);

	// Category api call here
	Route::get('/categories', [CategoryController::class, 'index']);

	// Depo api call here 
	Route::get('depo', [DepoController::class, 'index']);
	Route::post('depo-add', [DepoController::class, 'store']);
	Route::delete('depo-delete/{id}', [DepoController::class, 'deleteDepo']);
	Route::get('depo-id/{id}', [DepoController::class, 'getDepoId']);
	Route::put('depo-update/{id}', [DepoController::class, 'updateDepo']);
	Route::get('depo-all-sum', [DepoController::class, 'getAllSumDepo']);
	Route::get('depo-all-sum-date', [DepoController::class, 'getAllSumDepoData']);

	// Vatura  api call here
	Route::get('veturat', [VeturatController::class, 'getAllData']);
	Route::post('veturat-add', [VeturatController::class, 'store']);
	Route::put('veturat-update/{id}', [VeturatController::class, 'updateVeturat']);
	Route::get('veturat-id/{id}', [VeturatController::class, 'getVeturatId']);
	Route::delete('veturat-delete/{id}', [VeturatController::class, 'deleteVeturat']);
	Route::get('veturat/posts-by-date', [VeturatController::class, 'getDataByDateVeturat']);
	Route::get('veturat/posts-by-date-author', [VeturatController::class, 'getDataByDateAndUserVeturat']);
	Route::get('veturat-all-sum', [VeturatController::class, 'getAllSumVeturat']);
	Route::get('veturat-all-sum-date', [VeturatController::class, 'getAllSumDateVeturat']);
});
