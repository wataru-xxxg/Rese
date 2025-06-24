<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/mypage', function () {
    return view('mypage');
})->name('mypage')->middleware('auth');
Route::get('/detail/{id}', [ShopController::class, 'detail'])->name('detail');
