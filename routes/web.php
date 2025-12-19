<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\EventController as AdminEventController;
use App\Http\Controllers\admin\TicketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;



Route::get('/', action: [HomeController::class, 'index'])->name('home');

Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

// Orders
Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{order}', [\App\Http\Controllers\OrderController::class, 'show'])->name('orders.show');
Route::post('/orders', [\App\Http\Controllers\OrderController::class, 'store'])->name('orders.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->middleware('admin')->group(function () {
        Route::get('/', function () {
            return view('pages.admin.dashboard');
        })->name('dashboard');
        Route::resource('categories', CategoryController::class);
        Route::resource('events', AdminEventController::class);
        Route::resource('tickets', TicketController::class);
    });
});






require __DIR__ . '/auth.php';
