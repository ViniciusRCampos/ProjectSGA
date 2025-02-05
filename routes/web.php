<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleOperationController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\StoreController;
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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [SaleController::class, "index"])->name('home');

Route::get('/relatorio', [SaleController::class, "showReport"])->name('getReport');

Route::get('/store/sellers/{storeId}', [SellerController::class, 'getSellers'])->name('getSellers');

Route::post('/store/seller/add', [SellerController::class, 'addNewSeller'])->name('addNewSeller');

Route::post('/client/add', [ClientController::class, 'addNewClient'])->name('addClient');

Route::post('/store/add', [StoreController::class, 'addNewStore'])->name('addStore');

Route::post('/product/add', [ProductController::class, 'addNewProduct'])->name('addProduct');

Route::post('/sale/register', [SaleOperationController::class, 'registerSale'])->name('registerSale');


