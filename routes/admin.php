<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    })->name('admin.dashboard');
    Route::get('/login', function () {
        return view('admin.auth.login');
    });

    Route::get('/properties', function () {
        return view('admin.dashboard.properties');
    })->name('admin.properties');

    Route::get('/ownsers', function () {
        return view('admin.dashboard.owners');
    })->name('admin.owners');

    Route::get('/earnings', function () {
        return view('admin.dashboard.earnings');
    })->name('admin.earnings');
    Route::get('/clients', function () {
        return view('admin.dashboard.clients');
    })->name('admin.clients');
    Route::get('/orders', function () {
        return view('admin.dashboard.orders');
    })->name('admin.orders');
});
