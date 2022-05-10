<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\PeminjamanController;
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
//     return view('welcome');
// })->name('login');

Route::get('/',[LoginController::class, 'index']);
Route::post('login',[LoginController::class, 'authenticate'])->middleware('guest');
Route::post('logout',[LoginController::class, 'logout']) -> name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard',[DashboardController::class, 'index']);


    // kendaraan
    Route::get('/dataKendaraan',[KendaraanController::class, 'index']) -> name('dataKendaraan');
    Route::get('/tambahKendaraan',[KendaraanController::class, 'tambah'])-> name('tambahKendaraan');
    Route::post('/addKendaraan',[KendaraanController::class, 'create'])-> name('addKendaraan');
    Route::get('/{id}/editKendaraan',[KendaraanController::class, 'edit'])-> name('editKendaraan');
    Route::post('/updateKendaraan',[KendaraanController::class, 'update'])->name('updateKendaraan');
    Route::get('/{id}/hapusKendaraan',[KendaraanController::class, 'hapus'])->name('hapusKendaraan');

     // Driver
     Route::get('/dataDriver',[DriverController::class, 'index']) -> name('dataDriver');
     Route::get('/tambahDriver',[DriverController::class, 'tambah'])-> name('tambahDriver');
     Route::post('/addDriver',[DriverController::class, 'create'])-> name('addDriver');
     Route::get('/{id}/editDriver',[DriverController::class, 'edit'])-> name('editDriver');
     Route::post('/updateDriver',[DriverController::class, 'update'])->name('updateDriver');
     Route::get('/{id}/hapusDriver',[DriverController::class, 'hapus'])->name('hapusDriver');

     
     // Peminjaman
    Route::get('/dataPeminjaman',[PeminjamanController::class, 'index']) -> name('dataPeminjaman');
    Route::get('/tambahPeminjaman',[PeminjamanController::class, 'tambah'])-> name('tambahPeminjaman');
    Route::post('/addPeminjaman',[PeminjamanController::class, 'create'])-> name('addPeminjaman');
    Route::get('/{id}/editPeminjaman',[PeminjamanController::class, 'edit'])-> name('editPeminjaman');
    Route::post('/updatePeminjaman',[PeminjamanController::class, 'update'])->name('updatePeminjaman');
    Route::get('/{id}/hapusPeminjaman',[PeminjamanController::class, 'hapus'])->name('hapusPeminjaman');
});
