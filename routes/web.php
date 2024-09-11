<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminDishController;

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

Route::get('/dishes', [AdminDishController::class, 'index'])->name('dishes.index');

Route::get('/dishes/create', [AdminDishController::class, 'create'])->name('dishes.create');

Route::post('/dishes', [AdminDishController::class, 'store'])->name('dishes.store');

Route::get('/dishes/{id}/edit', [AdminDishController::class, 'edit'])->name('dishes.edit');

Route::put('/dishes/{id}', [AdminDishController::class, 'update'])->name('dishes.update');

Route::delete('/dishes/{id}', [AdminDishController::class, 'destroy'])->name('dishes.destroy');