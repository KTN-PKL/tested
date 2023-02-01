<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\c_login;
use App\Http\Controllers\c_fasdes;

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
    return view('fasdes.create');
});

Route::get('/', [App\Http\Controllers\c_login::class, 'index'])->name('login');
Route::get('/dashboard', [App\Http\Controllers\c_login::class, 'dashboard'] )->name('dashboard')->middleware('auth');
Route::get('/check', [App\Http\Controllers\c_login::class, 'check'])->name('login.check');
Route::post('/', [App\Http\Controllers\c_login::class, 'logout'])->name('user.logout');


Route::controller(c_fasdes::class)->middleware('auth')->group(function () {
    Route::get('fasdes', 'index')->name('fasdes');
    Route::post('fasdes/store', 'store')->name('fasdes.store');
    Route::get('fasdes/create', 'create')->name('fasdes.create');
    Route::get('fasdes/edit/{id}', 'edit')->name('fasdes.edit');
    Route::post('fasdes/update/{id}', 'update')->name('fasdes.update');
    Route::get('fasdes/destroy/{id}', 'destroy')->name('fasdes.destroy');
});