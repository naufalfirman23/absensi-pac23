<?php

use App\Http\Controllers\DashboardAdmin;
use App\Http\Controllers\DashboardUser;
use App\Http\Controllers\GenerateCode;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LihatKehadiran;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RekapAbsensi;
use App\Http\Controllers\ScanPresensi;
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

Route::get('/tes', function () {
    return view('welcome');
});

Route::controller(LoginController::class)->group(function(){
    Route::get('login',  'index');
    Route::post('login', 'login')->name('login');
    Route::get('logout','logout');
});

Route::group(['middleware'=>['auth']], function(){
    Route::group(['middleware'=>['cekUserLogin:1']],function(){
        Route::resource('rekap-absen', RekapAbsensi::class);
        Route::resource('buat-code', GenerateCode::class);
    });
    Route::group(['middleware'=>['cekUserLogin:2']],function(){
        Route::resource('cek-hadir', LihatKehadiran::class);
        Route::resource('scan-code', ScanPresensi::class);
    });
});

Route::get('/',[LayoutController::class,'index'])->middleware('auth');
Route::get('/home',[LayoutController::class,'index'])->middleware('auth');