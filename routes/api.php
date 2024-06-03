<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DailyTransactionController;
use App\Http\Controllers\MonthlyTransactionController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AccessRightController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Routes Barang
Route::get('/barang', [BarangController::class, 'index']);
Route::post('/barang', [BarangController::class, 'store']);
Route::put('/barang/{id}', [BarangController::class, 'update']);
Route::delete('/barang/{id}', [BarangController::class, 'destroy']);
Route::put('/barang/{id}/stock', [BarangController::class, 'updateStock']);

// Routes Kategori
Route::get('/kategori', [KategoriController::class, 'index']);
Route::post('/kategori', [KategoriController::class, 'store']);
Route::put('/kategori/{id}', [KategoriController::class, 'update']);
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']);

// Routes Daily Transaction
Route::get('/daily-transactions', [DailyTransactionController::class, 'index']);
Route::post('/daily-transactions', [DailyTransactionController::class, 'store']);
Route::get('/daily-transactions/{id}', [DailyTransactionController::class, 'show']);
Route::put('/daily-transactions/{id}', [DailyTransactionController::class, 'update']);
Route::delete('/daily-transactions/{id}', [DailyTransactionController::class, 'destroy']);

// Routes Monthly Transaction
Route::get('/monthly-transactions', [MonthlyTransactionController::class, 'index']);
Route::post('/monthly-transactions', [MonthlyTransactionController::class, 'store']);
Route::get('/monthly-transactions/{id}', [MonthlyTransactionController::class, 'show']);
Route::put('/monthly-transactions/{id}', [MonthlyTransactionController::class, 'update']);
Route::delete('/monthly-transactions/{id}', [MonthlyTransactionController::class, 'destroy']);

// Routes Akun
Route::get('/akun', [AkunController::class, 'index']);
Route::post('/akun', [AkunController::class, 'store']);
Route::get('/akun/{id}', [AkunController::class, 'show']);
Route::put('/akun/{id}', [AkunController::class, 'update']);
Route::delete('/akun/{id}', [AkunController::class, 'destroy']);
Route::post('login', [AkunController::class, 'login']);

// Routes Access
Route::get('access-rights', [AccessRightController::class, 'index']);
Route::get('/access-rights/{username}', [AccessRightController::class, 'getByUsername']);
Route::put('access-rights/{username}', [AccessRightController::class, 'update']);
Route::post('access-rights', [AccessRightController::class, 'store']);

// Routes Transaction
Route::get('transactions', [TransactionController::class, 'index']);
Route::post('transactions', [TransactionController::class, 'store']);
Route::get('transactions/{id}', [TransactionController::class, 'show']);
Route::put('transactions/{id}', [TransactionController::class, 'update']);
Route::delete('transactions/{id}', [TransactionController::class, 'destroy']);