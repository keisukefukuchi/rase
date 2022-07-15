<?php

use App\Http\Controllers\ShopController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RepresentativeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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



Route::middleware('auth', 'verified')->group(function () {
    Route::get('/reply/like/{id}', [LikeController::class, 'store'])->name('shop.like');
    Route::get('/reply/unlike/{id}', [LikeController::class, 'destroy'])->name('shop.unlike');
    Route::post('/reservation', [ReservationController::class, 'store']);
    Route::get('/mypage', [UserController::class, 'index']);
    Route::get('/mypage/reservation/destroy/{id}', [ReservationController::class, 'destroy'])->name('reservation.destory');
    Route::get('/mypage/reservation/update/{id}', [ReservationController::class, 'edit'])->name('reservation.update');
    Route::post('/mypage/reservation/update/{id}', [ReservationController::class, 'update'])->name('reservation.update');
    Route::get('/review/{id}', [ReviewController::class, 'index'])->name('review.index');
    Route::post('/review', [ReviewController::class, 'store']);
    Route::get('/mypage/review', [UserController::class, 'review']);
});

Route::get('/', [ShopController::class, 'index']);
Route::get('/detail/{shop_id}', [ShopController::class, 'detail'])->name('shop.detail');


Route::prefix('admin')->middleware(['auth', 'can:isAdmin'])->group(function () {
    Route::get('/', [AdminController::class, 'index']);
});
Route::prefix('representative')->middleware(['auth', 'can:isRepresentative'])->group(function () {
    Route::get('/', [RepresentativeController::class, 'index']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
