<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseHistoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/catalogs', [ItemsController::class, 'index'])->name('catalogs');

Route::get('/item/{id}', [ItemsController::class, 'show'])->name('detailBarang');

Route::get('/purchase/{id}', [PurchaseController::class, 'show'])->name('purchaseItem')->middleware('auth');

Route::post('/purchase', [PurchaseController::class, 'handlePurchase'])->middleware('auth');

Route::get('/history', [PurchaseHistoryController::class, 'show'])->name('purchaseHistory')->middleware('auth');

// Register & Login

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('login');

// Login
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

// Logout
Route::post('/logout', [AuthController::class, 'logout']);
