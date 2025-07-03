<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 一般公開ルート
Route::get('/', [ShopController::class, 'index'])->name('index');
Route::get('/detail/{id}', [ShopController::class, 'detail'])->name('detail');
Route::get('/done/{message?}', [ShopController::class, 'done'])->name('done');

// 認証が必要なルート（一般ユーザー）
Route::middleware('auth')->group(function () {
    Route::post('/detail/{id}', [ShopController::class, 'reservation'])->name('reservation');
    Route::get('/reservation-change/{id}', [ShopController::class, 'reservationChangePage'])->name('reservation-change-page');
    Route::post('/reservation-change/{id}', [ShopController::class, 'reservationChange'])->name('reservation-change');
    Route::get('/review/{id}', [ShopController::class, 'reviewPage'])->name('review-page');
    Route::post('/review/{id}', [ShopController::class, 'review'])->name('review');
    Route::get('/mypage', [ShopController::class, 'mypage'])->name('mypage');
});

// 管理者専用ルート
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/register/owner', [AdminController::class, 'createOwner'])->name('register.owner');
    Route::post('/register/owner', [AdminController::class, 'storeOwner'])->name('register.owner.store');
});

// 店舗オーナー専用ルート
Route::middleware(['auth', 'role:owner'])->prefix('owner')->name('owner.')->group(function () {
    Route::get('/owner/mypage', [OwnerController::class, 'mypage'])->name('mypage');

    // 自分の店舗管理
    Route::get('/shops', [OwnerController::class, 'myShops'])->name('shops');
    Route::get('/shops/create', [OwnerController::class, 'createShop'])->name('shops.create');
    Route::post('/shops/create', [OwnerController::class, 'storeShop'])->name('shops.store');
    Route::get('/shops/{id}', [OwnerController::class, 'shopDetail'])->name('shops.detail');
    Route::get('/shops/{id}/edit', [OwnerController::class, 'editShop'])->name('shops.edit');
    Route::put('/shops/{id}', [OwnerController::class, 'updateShop'])->name('shops.update');

    // 予約管理
    Route::get('/reservations', [OwnerController::class, 'reservations'])->name('reservations');
    Route::get('/reservations/{id}', [OwnerController::class, 'reservationDetail'])->name('reservations.detail');

    // レビュー管理
    Route::get('/reviews', [OwnerController::class, 'reviews'])->name('reviews');
    Route::get('/reviews/{id}', [OwnerController::class, 'reviewDetail'])->name('reviews.detail');
});

// 複数ロールでアクセス可能なルート
Route::middleware(['auth', 'role:admin,owner'])->prefix('management')->name('management.')->group(function () {
    // 管理者とオーナーの両方がアクセス可能な機能
    Route::get('/analytics', function () {
        return view('management.analytics');
    })->name('analytics');
});
