<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisteredDishController;
use App\Http\Controllers\CategoriesDishController;
use App\Http\Controllers\EventController;

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

Route::post('/dishes', [RegisteredDishController::class, 'store']);
Route::get('/dishes/all', [RegisteredDishController::class, 'index']);
Route::get('/dishes/test', [RegisteredDishController::class, 'test']);
Route::get('/dishes/dish/{id}', [RegisteredDishController::class, 'show']);

Route::get('/categories/{categoryId}', [CategoriesDishController::class, 'index']);
Route::get('/categories', [CategoriesDishController::class, 'show']);
Route::get('/events', [EventController::class, 'index']);








