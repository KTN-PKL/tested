<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\c_login;
use App\Http\Controllers\c_loginadmin;
use App\Http\Controllers\c_fasdes;
use App\Http\Controllers\c_kecamatan;
use App\Http\Controllers\c_desa;
use App\Http\Controllers\c_poktan;
use App\Http\Controllers\c_lokasi;
use App\Http\Controllers\c_absenkegiatan;
use App\Http\Controllers\c_absenharian;
use App\Http\Controllers\c_profil;


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
Route::view('/test', 'webgis');
Route::get('path/to/kml', function() {
    return response()->file(public_path('templateUser/test4.kml'));
});


Route::get('/fasdes', [App\Http\Controllers\c_login::class, 'index'])->name('loginfasdes');
Route::get('/fasdes/dashboard', [App\Http\Controllers\c_login::class, 'dashboard'] )->name('fasdes.dashboard')->middleware('auth');
Route::get('/fasdes/check', [App\Http\Controllers\c_login::class, 'check'])->name('login.check');
Route::post('/fasdes', [App\Http\Controllers\c_login::class, 'logout'])->name('user.logout');
Route::get('/fasdes/register', [App\Http\Controllers\c_login::class, 'register'])->name('fasdes.register');
Route::post('/fasdes/postregister', [App\Http\Controllers\c_login::class, 'postRegister'])->name('fasdes.postregister');
Route::get('register/desa/{id_kecamatan}', [App\Http\Controllers\c_login::class, 'desa'])->name('register.desa');

Route::get('/', [App\Http\Controllers\c_loginadmin::class, 'index'])->name('loginadmin');
Route::get('/dashboard', [App\Http\Controllers\c_loginadmin::class, 'dashboard'] )->name('faskab.dashboard')->middleware('auth');
Route::get('/check', [App\Http\Controllers\c_loginadmin::class, 'check'])->name('loginadmin.check');
Route::post('/', [App\Http\Controllers\c_loginadmin::class, 'logout'])->name('faskab.logout');




Route::controller(c_fasdes::class)->middleware('auth')->group(function () {
    Route::get('fasdess', 'index')->name('faskab.fasdes.index');
    Route::post('fasdess/store', 'store')->name('faskab.fasdes.store');
    Route::get('fasdess/create', 'create')->name('fasdes.create');
    Route::get('fasdess/edit/{id}', 'edit')->name('fasdes.edit');
    Route::get('fasdess/detail/{id}', 'detail')->name('fasdes.detail');
    Route::post('fasdess/update/{id}', 'update')->name('faskab.fasdes.update');
    Route::get('fasdess/verifikasi/{id}', 'verifikasi')->name('faskab.fasdes.verifikasi');
    Route::get('fasdess/destroy/{id}', 'destroy')->name('faskab.fasdes.destroy');
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
    Route::get('faskab/chartpanen', 'chartPanen')->name('faskab.poktan.chartpanen');
    Route::get('faskab/chartlahan', 'chartLahan')->name('faskab.poktan.chartlahan');
    // datamaster
    Route::get('dmpoktan', 'tampilPoktan')->name('dmpoktan.index');
    Route::get('dmpoktan/create', 'tampilCreate')->name('dmpoktan.create');
    Route::post('dmpoktan/store', 'storePoktan')->name('dmpoktan.store');
    Route::get('dmpoktan/edit/{id}', 'tampilEdit')->name('dmpoktan.edit');
    Route::get('dmpoktan/detail/{id}', 'tampilDetail')->name('dmpoktan.detail');
    Route::post('dmpoktan/update/{id}', 'updatePoktan')->name('dmpoktan.update');
    Route::get('dmpoktan/destroy/{id}', 'destroyPoktan')->name('dmpoktan.destroy');
    // end datamaster
});

Route::controller(c_absenharian::class)->middleware('auth')->group(function () {
    Route::get('faskab/harian', 'index')->name('faskab.harian.index');
    Route::get('harian/absenharian/{id}', 'absen')->name('faskab.harian.absen');
    Route::get('harian/pulang/{id}', 'pulang')->name('faskab.harian.pulang');
    Route::get('harian/detail/{id}', 'detail')->name('faskab.harian.detail');
    Route::get('harian/absen', 'create')->name('absen.harian');
    Route::post('harian/store', 'store')->name('absen.harian.store');
    Route::post('harian/storepulang', 'storepulang')->name('absen.harian.storepulang');
    Route::get('harian/jarak/{data}', 'jarak')->name('absen.harian.jarak');
    Route::get('harian/read', 'read')->name('harian.read');
    Route::post('harian/update/{id}', 'update')->name('faskab.harian.update');
    Route::get('harian/edit/{id}', 'edit')->name('faskab.harian.edit');
    Route::get('harian/hari/{id}', 'hari')->name('faskab.harian.hari');
    Route::get('harian/chart', 'chart')->name('faskab.chartan.chart');
    Route::get('harian/chart2', 'chart2')->name('faskab.chart2an.chart2');
    Route::get('harian/export', 'export')->name('faskab.harian.export');
    Route::get('harian/absenharian/verified/{id}', 'verifiedAbsen')->name('absen.harian.verified');
    Route::get('harian/absenharian/decline/{id}', 'declineAbsen')->name('absen.harian.decline');
    
});
Route::controller(c_absenkegiatan::class)->middleware('auth')->group(function () {
    Route::get('absenkegiatan', 'index')->name('absenkegiatan.index');
    Route::get('absen/absenkegiatan', 'index')->name('absen.absenkegiatan.index');
    Route::post('absenkegiatan/store', 'store')->name('absenkegiatan.store');

    // Admin
    Route::get('kegiatan', 'index2')->name('kegiatan.index');
    Route::get('kegiatan/kegiatan/{id}', 'kegiatan')->name('kegiatan.kegiatan');
    Route::get('kegiatan/detail/{id}', 'detailAbsen')->name('kegiatan.detail');
    Route::get('kegiatan/edit/{id}', 'editAbsen')->name('kegiatan.edit');
    Route::get('kegiatan/export/{id}', 'export')->name('kegiatan.export');
    Route::get('kegiatan/export2', 'export2')->name('kegiatan.export2');
    Route::post('kegiatan/update/{id}', 'updateAbsen')->name('kegiatan.updateAbsen');
    Route::post('kegiatan/kegiatan/filter/{id}', 'filterKegiatan')->name('kegiatan.kegiatan.filter');
    Route::get('kegiatan/kegiatan/verified/{id}', 'verifiedAbsen')->name('kegiatan.kegiatan.verified');
    Route::get('kegiatan/kegiatan/decline/{id}', 'declineAbsen')->name('kegiatan.kegiatan.decline');

});

Route::controller(c_profil::class)->middleware('auth')->group(function () {
    Route::get('fasdes/profil', 'viewProfil')->name('fasdes.profil');
    Route::get('fasdes/history', 'viewHistory')->name('fasdes.history');
    Route::get('fasdes/historiharian', 'historiharian')->name('fasdes.historiharian');
    Route::get('fasdes/historikegiatan', 'historikegiatan')->name('fasdes.historikegiatan');
    Route::get('fasdes/exportharian', 'exportharian')->name('fasdes.exportharian');
    Route::get('fasdes/exportkegiatan', 'exportkegiatan')->name('fasdes.exportkegiatan');
    Route::get('fasdes/detail/{id}', 'viewDetailpoktan')->name('fasdes.detailpoktan');
    Route::get('fasdes/create/{id}', 'viewCreatepoktan')->name('fasdes.createpoktan');
    Route::post('fasdes/store/{id}', 'storePoktan')->name('fasdes.storepoktan');
    Route::get('fasdes/edit/{id}', 'viewEditpoktan')->name('fasdes.editpoktan');
    Route::get('fasdes/destroy/{id}', 'destroyPoktan')->name('fasdes.destroypoktan');
    Route::get('fasdes/editprofil', 'viewEditprofil')->name('fasdes.editprofil');
    Route::get('fasdes/profil/{id_kecamatan}', 'desa')->name('fasdes.profildesa');
    Route::post('fasdes/updateprofil/{id}', 'updateProfil')->name('fasdes.updateprofil');
    Route::post('fasdes/updatepoktan/{id}', 'updatepoktan')->name('fasdes.updatepoktan');
    Route::get('profil/chartpanen', 'chartPanen')->name('profil.chartpanen');
    Route::get('profil/chartlahan', 'chartLahan')->name('profil.chartlahan');
    Route::get('fasdes/kegiatan/{id}', 'detailAbsenKegiatan')->name('fasdes.detailabsenkegiatan');
    Route::get('fasdes/harian/{id}', 'detailAbsenHarian')->name('fasdes.detailabsenharian');
    Route::get('profil/editpw', 'editpw')->name('profil.editpw');



  
});

