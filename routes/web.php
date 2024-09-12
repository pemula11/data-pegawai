<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\GolonganController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return redirect('/dashboard');
});


Route::get('/dashboard', [dashboardController::class, 'index']);


Route::resource('/dashboard/golongan', GolonganController::class);
Route::resource('/dashboard/pegawai', PegawaiController::class);
Route::resource('/dashboard/cuti', CutiController::class);
