<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminDishController;
use App\Http\Controllers\AdminSupplierController;
use App\Http\Controllers\DashboardSummaryController;
use App\Http\Controllers\AdminInformationController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/profile', [UsersController::class, 'profile'])->name('admin.profile');

    Route::get('/factures/ordering', [AdminDishController::class, 'order'])->name('factures.ordering');

    Route::get('/factures/order', [AdminDishController::class, 'showOrderInKitchen'])->name('factures.order');

    Route::post('/order/store', [AdminDishController::class, 'storeOrder'])->name('store.order');

    Route::get('/factures/history', [AdminDishController::class, 'history'])->name('factures.history');

    Route::post('/mark-order-as-ready', [AdminDishController::class, 'markOrderAsReady'])->name('markOrderAsReady');

    Route::get('/dishes/inventory', [AdminDishController::class, 'inventory'])->name('dishes.inventory');

    Route::get('/dashboard/principal', [DashboardSummaryController::class, 'index'])->name('dashboard.principal');

    Route::get('/dashboard/searchByMonth', [DashboardSummaryController::class, 'searchByMonth'])->name('dashboard.searchByMonth');

    Route::post('/dashboard/principal', [DashboardSummaryController::class, 'showStatistics'])->name('principal.show');

    Route::get('/factures/{id}', [AdminDishController::class, 'showInvoices'])->name('factures.show');

    Route::post('/factures/invoice', [AdminDishController::class, 'storeOrder'])->name('factures.invoice');

    Route::get('/events', [EventController::class, 'show'])->name('events.index');

    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');

    Route::post('/events/store', [EventController::class, 'store'])->name('events.store');

    Route::get('events/show/{id}', [EventController::class, 'showEventDetail'])->name('events.show');

    Route::get('/events/edit/{event}', [EventController::class, 'edit'])->name('events.edit');

    Route::put('/events/update{event}', [EventController::class, 'update'])->name('events.update');

    Route::delete('/events/destroy/{event}', [EventController::class, 'destroy'])->name('events.destroy');
});

Route::middleware(['auth', 'checkJobTitle:1'])->group(function () {
    Route::resource('admin/users', UsersController::class);

    Route::get('/admin/users', [UsersController::class, 'users'])->name('admin.users');

    Route::get('/admin/create', [UsersController::class, 'create'])->name('admin.create');

    Route::post('/admin/store', [UsersController::class, 'store'])->name('admin.store');

    Route::get('/admin/{id}/edit', [UsersController::class, 'edit'])->name('admin.edit');

    Route::put('/admin/users/{id}', [UsersController::class, 'update'])->name('admin.update');

    Route::delete('/admin/{id}', [UsersController::class, 'destroy'])->name('admin.destroy');

    Route::get('/admin/users/{id}', [UsersController::class, 'show'])->name('admin.show');

    /* Admin/Dishes */
    Route::get('dishes/index', [AdminDishController::class, 'index'])->name('dishes.index');

    Route::get('/dishes/create', [AdminDishController::class, 'create'])->name('dishes.create');

    Route::resource('dishes', AdminDishController::class);

    Route::post('/dishes', [AdminDishController::class, 'store'])->name('dishes.store');

    Route::get('/dishes/{id}/edit', [AdminDishController::class, 'edit'])->name('dishes.edit');

    Route::put('/dishes/{id}', [AdminDishController::class, 'update'])->name('dishes.update');

    Route::delete('/dishes/{id}', [AdminDishController::class, 'destroy'])->name('dishes.destroy');

    /* Suppliers */
    Route::get('/suppliers/create', [AdminSupplierController::class, 'create'])->name('suppliers.create');

    Route::get('/suppliers/index', [AdminSupplierController::class, 'index'])->name('suppliers.index');

    Route::post('/suppliers', [AdminSupplierController::class, 'store'])->name('suppliers.store');

    Route::delete('suppliers/{supplier}', [AdminSupplierController::class, 'destroy'])->name('suppliers.destroy');

    Route::resource('suppliers', AdminSupplierController::class);

    

    /* Information */

    Route::resource('information', AdminInformationController::class);
    Route::get('information/{id}', [AdminInformationController::class, 'show'])->name('information.show'); 
    
});

// Ruta de inicio de sesión
Route::get('', [UsersController::class, 'index'])->name('admin.login');
Route::post('/login', [UsersController::class, 'login'])->name('admin.login.submit');

// Ruta de cierre de sesión
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('admin.login'); })->name('admin.logout');
