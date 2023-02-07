<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\c_login;
use App\Http\Controllers\c_fasdes;
use App\Http\Controllers\c_kecamatan;
use App\Http\Controllers\c_desa;
use App\Http\Controllers\c_poktan;
use App\Http\Controllers\c_lokasi;
use App\Http\Controllers\c_absenkegiatan;
use App\Http\Controllers\c_absenharian;


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

Route::get('/test', function () {
    return view('user.absen.harian');
});
Route::get('/test2', function () {
    return view('user.absen.kegiatan');
});

Route::get('/', [App\Http\Controllers\c_login::class, 'index'])->name('login');
Route::get('/dashboard', [App\Http\Controllers\c_login::class, 'dashboard'] )->name('dashboard')->middleware('auth');
Route::get('/check', [App\Http\Controllers\c_login::class, 'check'])->name('login.check');
Route::post('/', [App\Http\Controllers\c_login::class, 'logout'])->name('user.logout');


Route::controller(c_fasdes::class)->middleware('auth')->group(function () {
    Route::get('fasdes', 'index')->name('faskab.fasdes.index');
    Route::post('fasdes/store', 'store')->name('faskab.fasdes.store');
    Route::get('fasdes/create', 'create')->name('fasdes.create');
    Route::get('fasdes/edit/{id}', 'edit')->name('fasdes.edit');
    Route::get('fasdes/detail/{id}', 'detail')->name('fasdes.detail');
    Route::post('fasdes/update/{id}', 'update')->name('faskab.fasdes.update');
    Route::get('fasdes/destroy/{id}', 'destroy')->name('faskab.fasdes.destroy');
});


Route::controller(c_kecamatan::class)->middleware('auth')->group(function () {
    Route::get('kecamatan', 'index')->name('faskab.kecamatan.index');
    Route::post('kecamatan/store', 'store')->name('faskab.kecamatan.store');
    Route::get('kecamatan/create', 'create')->name('kecamatan.create');
    Route::get('kecamatan/edit/{id}', 'edit')->name('kecamatan.edit');
    Route::post('kecamatan/update/{id}', 'update')->name('faskab.kecamatan.update');
    Route::get('kecamatan/destroy/{id}', 'destroy')->name('faskab.kecamatan.destroy');
});

Route::controller(c_desa::class)->middleware('auth')->group(function () {
    Route::get('desa', 'index')->name('faskab.desa.index');
    Route::post('desa/store', 'store')->name('faskab.desa.store');
    Route::get('desa/create', 'create')->name('desa.create');
    Route::get('desa/edit/{id}', 'edit')->name('desa.edit');
    Route::post('desa/update/{id}', 'update')->name('faskab.desa.update');
    Route::get('desa/destroy/{id}', 'destroy')->name('faskab.desa.destroy');
});

Route::controller(c_lokasi::class)->middleware('auth')->group(function () {
    Route::get('lokasi', 'index')->name('faskab.lokasi.index');
    Route::post('lokasi/store', 'store')->name('faskab.lokasi.store');
    Route::get('lokasi/desa/{id}/{id_kecamatan}', 'desa')->name('lokasi.desa');
    Route::get('lokasi/edit/{id}', 'edit')->name('lokasi.edit');
    Route::post('lokasi/update/{id}', 'update')->name('faskab.lokasi.update');
    Route::get('lokasi/destroy/{id}', 'destroy')->name('faskab.lokasi.destroy');
});

Route::controller(c_poktan::class)->middleware('auth')->group(function () {
    Route::get('poktan', 'index')->name('faskab.poktan.index');
    Route::get('poktan/poktan/{id}', 'poktan')->name('poktan');
    Route::get('poktan/create/{id}', 'create')->name('poktan.create');
    Route::post('poktan/store/{id}', 'store')->name('faskab.poktan.store');
    Route::get('poktan/edit/{id}', 'edit')->name('poktan.edit');
    Route::get('poktan/detail/{id}', 'detail')->name('poktan.detail');
    Route::post('poktan/update/{id}', 'update')->name('faskab.poktan.update');
    Route::get('poktan/destroy/{id}', 'destroy')->name('faskab.poktan.destroy');
});

Route::controller(c_absenharian::class)->middleware('auth')->group(function () {
    Route::get('faskab/harian', 'index')->name('faskab.harian.index');
    // Route::get('harian/harian/{id}', 'harian')->name('harian');
    Route::get('harian/absen', 'create')->name('absen.harian');
    Route::post('harian/store', 'store')->name('absen.harian.store');
    Route::post('harian/storepulang', 'storepulang')->name('absen.harian.storepulang');
    Route::get('harian/jarak/{data}', 'jarak')->name('absen.harian.jarak');
    // Route::get('harian/detail/{id}', 'detail')->name('harian.detail');
    // Route::post('harian/update/{id}', 'update')->name('faskab.harian.update');
    // Route::get('harian/destroy/{id}', 'destroy')->name('faskab.harian.destroy');
});
Route::controller(c_absenkegiatan::class)->middleware('auth')->group(function () {
    Route::get('absenkegiatan', 'index')->name('absenkegiatan.index');
    Route::post('absenkegiatan/store', 'store')->name('absenkegiatan.store');

    // Admin
    Route::get('kegiatan', 'index2')->name('kegiatan.index');
    Route::get('kegiatan/kegiatan/{id}', 'kegiatan')->name('kegiatan.kegiatan');

});
