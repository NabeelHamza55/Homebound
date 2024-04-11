<?php

use App\Http\Controllers\Admin\EarningController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PropertyController;

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/login', function () {
        return view('admin.auth.login');
    });

    Route::get('/properties', [PropertyController::class, 'index'])->name('admin.properties');
    Route::get('/property/detele/{id}', [PropertyController::class, 'destroy'])->name('admin.property.delete');

    Route::get('/earnings', [EarningController::class, 'index'])->name('admin.earnings');
    Route::get('/clients', [UserController::class, 'clients'])->name('admin.clients');
    Route::get('/owners', [UserController::class, 'owners'])->name('admin.owners');
    Route::get('/user/create/{role}', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('/user/save/{role}', [UserController::class, 'store'])->name('admin.user.save');
    Route::get('/user/detele/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders');
    Route::get('/orders/detele/{id}', [OrderController::class, 'destroy'])->name('admin.orders.delete');

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class,'index'])->name('admin.profile');
        Route::get('/setting', [ProfileController::class,'setting'])->name('admin.profile.setting');
        Route::post('/update', [ProfileController::class,'update_profile'])->name('admin.update.profile');
    });
});
