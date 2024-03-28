<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepoController;
use App\Http\Controllers\VeturatController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OpticalKamenicController;
use App\Http\Controllers\OpticalVitiController;
use App\Http\Controllers\OpticalProjectController;
use App\Http\Controllers\OpticalDepoController;
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

	// Shop Api Call here 
	Route::get('/shops', [ShopController::class,  'getAllShop']);
	Route::post('shop-add', [ShopController::class, 'postShop']);
	Route::delete('shop-delete/{id}', [ShopController::class, 'deleteShop']);
	Route::get('shop-id/{id}', [ShopController::class, 'getShopId']);
	Route::put('shop-update/{id}', [ShopController::class, 'updateShop']);
	Route::post('shop-update-image/{id}', [ShopController::class, 'updateShopImage']);
	Route::get('shop-author/{post_author}', [ShopController::class,  'getShopByAuthor']);

	// Optical Kamenic Api Call here 
	Route::get('optical-kamenic', [OpticalKamenicController::class, 'getOpticalKamenic']);
	Route::post('optical-kamenic-add', [OpticalKamenicController::class, 'postOpticalKamenic']);
	Route::delete('optical-kamenic-delete/{id}', [OpticalKamenicController::class, 'deleteOpticalKamenic']);
	Route::get('optical-kamenic-id/{id}', [OpticalKamenicController::class, 'getKamenicId']);
	Route::put('kamenic-update/{id}', [OpticalKamenicController::class, 'updateByIdKamenci']);


	// Optical Viti Api Call here 
	Route::get('optical-viti', [OpticalVitiController::class, 'getOpticalViti']);
	Route::post('optical-viti-add', [OpticalVitiController::class, 'postOpticalViti']);
	Route::delete('optical-viti-delete/{id}', [OpticalVitiController::class, 'deleteOpticalViti']);
	Route::get('optical-viti-id/{id}', [OpticalVitiController::class, 'getVitiId']);
	Route::put('viti-update/{id}', [OpticalVitiController::class, 'updateByIdViti']);
	
	// Optical Project Api Call here 
	Route::get('optical-project', [OpticalProjectController::class, 'getOpticalProject']);
	Route::post('optical-project-add', [OpticalProjectController::class, 'postOpticalProject']);
	Route::delete('optical-project-delete/{id}', [OpticalProjectController::class, 'deleteOpticalProject']);
	Route::get('optical-project-id/{id}', [OpticalProjectController::class, 'getProjectId']);
	Route::put('project-update/{id}', [OpticalProjectController::class, 'updateByIdProject']);

	// Optical Depo Api Call here 
	Route::get('optical-depo', [OpticalDepoController::class, 'getOpticalDepo']);
	Route::post('optical-depo-add', [OpticalDepoController::class, 'postOpticalDepo']);
	Route::delete('optical-depo-delete/{id}', [OpticalDepoController::class, 'deleteOpticalDepo']);
	Route::get('optical-depo-id/{id}', [OpticalDepoController::class, 'getDepoId']);
	Route::put('optical-depo-update/{id}', [OpticalDepoController::class, 'updateByIdDepo']);

});
