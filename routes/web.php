<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ZillowApiFolder\ZillowApiController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentGateway\StripeController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\BillingController;

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
Route::get('/', [AuthController::class,'view'])->name('/');
Route::get('/login', [AuthController::class,'view_login'])->name('login');
Route::post('/loginProcess', [AuthController::class,'Login'])->name('login.process');
Route::get('/Registration', [AuthController::class,'createRegistration'])->name('create.registration');
Route::post('/RegistrationProcess', [AuthController::class,'Registration'])->name('registration.process');

Route::middleware('auth', 'RevalidateBackHistory')->group(function () {
    Route::get('/dashboard', [HomeController::class,'index'])->name('user.dashboard');

    Route::group(['prefix' => 'property'], function () {
        Route::get('/view', [PropertyController::class,'index'])->name('save.property');
        Route::get('/add', [PropertyController::class,'add_property'])->name('add.property');
        Route::post('/get-data', [PropertyController::class,'create'])->name('add.process.property');
        Route::get('/search', [PropertyController::class,'search_property'])->name('search.property');
        Route::get('/edit/{id}', [PropertyController::class,'edit_property'])->name('edit.property');
        Route::get('/delete/{id}', [PropertyController::class,'delete_property'])->name('delete.property');
        Route::post('/update/', [PropertyController::class,'update_property'])->name('update.property');
        Route::post('/save-search/', [PropertyController::class,'create'])->name('save.property.data');

    });
    Route::group(['prefix' => 'card'], function () {
        Route::get('/store', [PropertyController::class,'store'])->name('save.card');
    });

    Route::group(['prefix' => 'items'], function () {
        Route::any('/to-card/{id?}', [CardController::class, 'add_to_cart'])->name('add.to.cart.item');
        Route::any('/delete-card/{id?}', [CardController::class, 'delete_to_cart'])->name('delete.cart.item');

    });

    Route::group(['prefix' => 'book'], function () {
        Route::get('/view', [BookController::class, 'index'])->name('view.book');
        Route::get('/preview/{id}', [BookController::class, 'preview'])->name('preview.book');
        Route::get('/create/{id?}', [BookController::class, 'create'])->name('create.book');
        Route::post('/save', [BookController::class, 'save'])->name('save.book');
        Route::get('/edit/{id}', [BookController::class, 'edit'])->name('edit.book');
        Route::post('/update', [BookController::class, 'update'])->name('update.book');
        Route::get('/delete/{id}', [BookController::class, 'delete'])->name('delete.book');
        Route::get('/list', [BookController::class, 'list'])->name('book.list');
    });

    Route::group(['prefix' => 'orders'], function () {
        Route::any('/request', [OrderController::class, 'cart'])->name('add.to.cart');
        Route::get('/', [OrderController::class,'order'])->name('user.order');
        Route::get('/saveOrder', [OrderController::class,'save_order'])->name('save.order');
        Route::get('/existingOrder', [OrderController::class,'existing_order'])->name('existing.order');
        Route::get('/totalOrder', [OrderController::class,'total_order'])->name('total.order');
    });

    Route::group(['prefix' => 'stripe'], function () {
        Route::post('/checkout', [StripeController::class, 'stripeCheckout'])->name('checkout.cart');
        Route::get('/checkout/success', [StripeController::class, 'stripeCheckoutSuccess'])->name('checkout.success');
    });

    Route::get('/setting', [ProfileController::class,'setting'])->name('profile.setting');
    Route::get('/billing', [BillingController::class,'index'])->name('billing');
    Route::post('/billing/store', [BillingController::class,'store'])->name('billing.store');
    Route::get('/profile', [ProfileController::class,'index'])->name('user.profile');
    Route::post('/update', [ProfileController::class,'update_profile'])->name('update.profile');
    Route::get('/logout', [AuthController::class,'destroy'])->name('logout');



});
Route::prefix('zillow')->group(function () {
    Route::get('/search-property', [ZillowApiController::class, 'SearchProperty'])->name('zillow.search.property');
});


include __DIR__ . './admin.php';
