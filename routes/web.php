<?php

use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;



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

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class,'getLogout']);
    Route::get('/', [ShopController::class,'index']);
    Route::get('/detail/{shop_id}', [ShopController::class,'detail'])->name('shop.detail');
    Route::get('/reply/like/{id}', [LikeController::class, 'store'])->name('shop.like');
    Route::get('/reply/unlike/{id}', [LikeController::class, 'destroy'])->name('shop.unlike');
    Route::post('/reservation', [ReservationController::class,'store']);
    Route::get('/mypage', [UserController::class,'index']);
    Route::get('/mypage/reservation/destroy/{id}', [ReservationController::class, 'destroy'])->name('reservation.destory');
    Route::get('/mypage/reservation/update/{id}', [ReservationController::class, 'edit'])->name('reservation.update');
    Route::post('/mypage/reservation/update/{id}', [ReservationController::class, 'update'])->name('reservation.update');
    Route::get('/review/{id}', [ReviewController::class, 'index'])->name('review.index');
    Route::post('/review', [ReviewController::class, 'store']);
    Route::get('/mypage/review', [UserController::class,'review']);
});

Route::get('/register', [AuthController::class,'getRegister']);
Route::post('/register', [AuthController::class,'postRegister']);

Route::get('/login', [AuthController::class,'getLogin'])->name('login');
Route::post('/login', [AuthController::class,'postLogin']);


Auth::routes();

