<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;

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

Route::get('/', [ShopController::class, 'index'])->name('index');
Route::get('/detail/{id}', [ShopController::class, 'detail'])->name('detail');
Route::middleware('auth')->group(function () {
    Route::post('/detail/{id}', [ShopController::class, 'reservation'])->name('reservation');
    Route::get('/mypage', [ShopController::class, 'mypage'])->name('mypage');
});
Route::get('/done', [ShopController::class, 'done'])->name('done');
