<?php

use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    })->name('admin.dashboard');
    Route::get('/login', function () {
        return view('admin.auth.login');
    });

    Route::get('/properties', [PropertyController::class, 'index'])->name('admin.properties');

    Route::get('/earnings', function () {
        return view('admin.dashboard.earnings');
    })->name('admin.earnings');
    Route::get('/clients', [UserController::class, 'clients'])->name('admin.clients');
    Route::get('/owners', [UserController::class, 'owners'])->name('admin.owners');
    Route::get('/orders', function () {
        return view('admin.dashboard.orders');
    })->name('admin.orders');
});
