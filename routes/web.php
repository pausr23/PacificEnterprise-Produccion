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

Route::get('/dishes', function () {
    return view('dishes.index');
});

Route::get('/create', function () {
    return view('dishes.create');
});

Route::get('/dishes/create', [AdminDishController::class, 'create'])->name('dishes.create');
Route::get('/dishes/edit', [AdminDishController::class, 'edit'])->name('dishes.edit');

Route::post('/dishes', [AdminDishController::class, 'store'])->name('dishes.store');


Route::post('/dishes', [DishController::class, 'store'])->name('dishes.store');


Route::resource('dishes', AdminDishController::class);


Route::delete('/dishes/{id}', [AdminDishController::class, 'destroy'])->name('dishes.destroy');








