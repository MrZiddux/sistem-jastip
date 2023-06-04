<?php

use App\Http\Controllers\JastipController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\PricingOptionController;
use App\Http\Controllers\StatusController;
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
    return view('welcome');
});

Route::controller(PricingOptionController::class)->group(function() {
  Route::get('jenis-harga', 'index')->name('jenis-harga.index');
  Route::post('jenis-harga', 'store')->name('jenis-harga.store');
  Route::get('jenis-harga/get-data', 'getPricingOptions')->name('jenis-harga.getData');
  Route::post('jenis-harga/update/{pricing_option}', 'update')->name('jenis-harga.update');
  Route::delete('jenis-harga/destroy/{pricing_option}', 'destroy')->name('jenis-harga.destroy');
});

Route::controller(StatusController::class)->group(function() {
  Route::get('status', 'index')->name('status.index');
  Route::post('status', 'store')->name('status.store');
  Route::get('status/get-data', 'getStatuses')->name('status.getData');
  Route::post('status/update/{status}', 'update')->name('status.update');
  Route::delete('status/destroy/{status}', 'destroy')->name('status.destroy');
});

Route::get('jastip/get-data', [JastipController::class, 'getJastip'])->name('jastip.getData');
Route::get('jastip/get-data/{id}', [JastipController::class, 'getJastipById'])->name('jastip.getDataById');
Route::resource('jastip', JastipController::class);

Route::controller(PackagesController::class)->group(function() {
  Route::get('laporan-jastip', 'index')->name('laporan-jastip.index');
});

