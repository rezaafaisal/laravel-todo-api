<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DoneController;
use App\Http\Controllers\Api\StarredController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TodoController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// todo controller
Route::get('/', [TodoController::class, 'index']);
Route::post('/', [TodoController::class, 'store']);
Route::put('/{id}', [TodoController::class, 'update']);
Route::delete('/{id}', [TodoController::class, 'destroy']);

// cari todo berdasarkan title
Route::post('search', [TodoController::class, 'search']);
Route::get('category/{sllug}', [TodoController::class, 'category']);

// starred
Route::get('starred', [StarredController::class, 'index']); //tampilkan yang stared
Route::put('starred/{id}', [StarredController::class, 'set']);

// done
Route::get('done', [DoneController::class, 'index']); //tampilkan yang selesai
Route::put('done/{id}', [DoneController::class, 'set']);

// category
Route::resource('category', CategoryController::class);