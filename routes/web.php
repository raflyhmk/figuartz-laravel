<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\authController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\userController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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
    $daftarProduct = Product::take(4)->get();
    return view('welcome', compact('daftarProduct'));
});
Route::get('/login', [authController::class, 'login']);
Route::post('/login', [authController::class, 'login_process']);
Route::get('/register', [authController::class, 'register']);
Route::post('/register', [authController::class, 'register_process']);
Route::get('/logout', [authController::class, 'logout']);

// admmin side
Route::get('/admin/dashboard', [adminController::class, 'Dashboard'])->middleware('auth:admin');
Route::get('/admin/daftarProduk', [adminController::class, 'daftarProduk'])->middleware('auth:admin');
Route::get('/admin/tambahProduk', [adminController::class, 'tambahProduk'])->middleware('auth:admin');
Route::post('/admin/tambahProduk', [adminController::class, 'insertProduct'])->middleware('auth:admin');
Route::get('/admin/editProduk/{id}', [adminController::class, 'editProduk'])->middleware('auth:admin');
Route::put('/admin/editProduk/{id}', [adminController::class, 'updateProduct'])->middleware('auth:admin');
Route::delete('/admin/deleteProduk/{id}', [adminController::class, 'deleteProduct'])->middleware('auth:admin');
Route::get('/admin/daftarTransaksi', [adminController::class, 'daftarTransaksi'])->middleware('auth:admin');
Route::get('/admin/konfirmasi-pesanan/{id}', [adminController::class, 'konfirmasiPesanan'])->middleware('auth:admin');
Route::put('/admin/konfirmasi-pesanan/{id}', [adminController::class, 'updateStatus'])->middleware('auth:admin');
Route::get('/admin/listAdmin', [adminController::class, 'listAdmin'])->middleware('auth:admin');
Route::get('/admin/tambah-admin', [adminController::class, 'tambahAdmin'])->middleware('auth:admin');
Route::post('/admin/tambah-admin', [adminController::class, 'insertAdmin'])->middleware('auth:admin');
Route::get('/admin/edit-admin/{id}', [adminController::class, 'editAdmin'])->middleware('auth:admin');
Route::put('/admin/edit-admin/{id}', [adminController::class, 'updateAdmin'])->middleware('auth:admin');
Route::delete('/admin/hapus-admin/{id}', [adminController::class, 'deleteAdmin'])->middleware('auth:admin');
Route::get('/admin/listUser', [adminController::class, 'listUser'])->middleware('auth:admin');
Route::get('/admin/edit-user/{id}', [adminController::class, 'editUser'])->middleware('auth:admin');
Route::put('/admin/edit-user/{id}', [adminController::class, 'updateUser'])->middleware('auth:admin');
Route::delete('/admin/hapus-user/{id}', [adminController::class, 'deleteUser'])->middleware('auth:admin');

Route::get('/admin/cetak-pesanan', [adminController::class, 'cetakPesanan'])->middleware('auth:admin');

Route::get('/products', [userController::class, 'products']);
Route::get('/products/{id}', [userController::class, 'detailProducts']);
Route::post('/products/{id}', [userController::class, 'orderProducts'])->middleware('auth:web');
Route::get('/history', [userController::class, 'history'])->middleware('auth:web');
