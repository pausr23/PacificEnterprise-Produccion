<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminDishController;
use App\Http\Controllers\AdminSupplierController;

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

/* Admin/Users */

Route::resource('admin/users', UsersController::class);

Route::get('', [UsersController::class, 'index'])->name('admin.login');

Route::get('/admin/profile', [UsersController::class, 'profile'])->name('admin.profile');

Route::get('/admin/users', [UsersController::class, 'users'])->name('admin.users');

Route::get('/admin/create', [UsersController::class, 'create'])->name('admin.create');

Route::post('/admin/store', [UsersController::class, 'store'])->name('admin.store');

Route::get('/admin/{id}/edit', [UsersController::class, 'edit'])->name('admin.edit');

Route::put('/admin/users/{id}', [UsersController::class, 'update'])->name('admin.update');

Route::delete('/admin/{id}', [UsersController::class, 'destroy'])->name('admin.destroy');

Route::get('/admin/users/{id}', [UsersController::class, 'show'])->name('admin.show');


Route::get('dishes/index', [AdminDishController::class, 'index'])->name('dishes.index');

Route::get('/dishes/create', [AdminDishController::class, 'create'])->name('dishes.create');

Route::get('/dishes/inventory', [AdminDishController::class, 'inventory'])->name('dishes.inventory');

Route::post('/dishes', [AdminDishController::class, 'store'])->name('dishes.store');

Route::get('/dishes/{id}/edit', [AdminDishController::class, 'edit'])->name('dishes.edit');

Route::put('/dishes/{id}', [AdminDishController::class, 'update'])->name('dishes.update');

Route::delete('/dishes/{id}', [AdminDishController::class, 'destroy'])->name('dishes.destroy');

/* Supliers */

Route::get('/suppliers/create', [AdminSupplierController::class, 'create'])->name('suppliers.create');

Route::get('/suppliers/index', [AdminSupplierController::class, 'index'])->name('suppliers.index');

Route::post('/suppliers', [AdminSupplierController::class, 'store'])->name('suppliers.store');

Route::delete('suppliers/{supplier}', [AdminSupplierController::class, 'destroy'])->name('suppliers.destroy');

Route::resource('suppliers', AdminSupplierController::class);

/* Factures */

Route::get('/factures/ordering', [AdminDishController::class, 'order'])->name('factures.ordering');

Route::post('/order/store', [AdminDishController::class, 'storeOrder'])->name('store.order');

Route::get('/factures/history', [AdminDishController::class, 'history'])->name('factures.history');

