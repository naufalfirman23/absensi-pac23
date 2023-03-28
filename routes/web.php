<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\CekDataAnggota;
use App\Http\Controllers\ControllerPengurus;
use App\Http\Controllers\DashboardAdmin;
use App\Http\Controllers\DashboardUser;
use App\Http\Controllers\GenerateCode;
use App\Http\Controllers\InputAnggota;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LihatKehadiran;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Pengurus;
use App\Http\Controllers\RekapAbsensi;
use App\Http\Controllers\ScanPresensi;
use App\Http\Controllers\UpdateController;
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


Route::controller(LoginController::class)->group(function(){
    Route::get('login',  'index');
    Route::post('login', 'login')->name('login');
    Route::get('logout','logout');
});

Route::group(['middleware'=>['auth']], function(){
    Route::group(['middleware'=>['cekUserLogin:1']],function(){

        // crud data pengurus
        Route::get('data-pengurus', [ControllerPengurus::class, 'index']);
        Route::post('input/data', [ControllerPengurus::class, 'input']);
        Route::post('hapus/data/{id}', [ControllerPengurus::class, 'hapus']);
        Route::post('update/data/{id}', [ControllerPengurus::class, 'update']);
        Route::get('cetak-data', [ControllerPengurus::class, 'cetakdata']);
        
        // Absensi -event
        Route::get('master-absen',[AbsensiController::class, 'index']);
        Route::get('absenin-rekan',[AbsensiController::class, 'absenin']);
        Route::post('cetak/absen/{id}',[AbsensiController::class, 'cetakabsen']);
        Route::post('tambah-event',[AbsensiController::class, 'tambahevent']);
        Route::post('hapus/event/{id}',[AbsensiController::class, 'hapusevent']);
        Route::post('scan-code',[AbsensiController::class, 'validasi'])->name('absenin');
    });
    Route::group(['middleware'=>['cekUserLogin:2']],function(){
        Route::resource('cek-hadir', LihatKehadiran::class);
    });
});

Route::get('/',[LayoutController::class,'index'])->middleware('auth');
Route::get('/home',[LayoutController::class,'index'])->middleware('auth');