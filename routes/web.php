<?php

use App\Http\Controllers\DonorController;
use App\Http\Controllers\PenerimaanController;
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

Route::get('/', function () {
    return view('landing');
});

Route::get('/login', function() {
    return view('login');
})->name('login');

Route::post('/store', [DonorController::class, 'store'])->name('store');
Route::post('/auth', [DonorController::class, 'auth'])->name('auth');

Route::middleware(['terLogin', 'terCek:admin,dukes'])->group(function(){
    Route::get('/logout', [DonorController::class, 'logout'])->name('logout');
});

Route::middleware(['terLogin', 'terCek:admin'])->group(function() {
    Route::get('/admin-page', [DonorController::class, 'admin'])->name('admin');
    Route::delete('/destroy/{id}', [DonorController::class, 'destroy'])->name('destroy');
    Route::get('/download/pdf', [DonorController::class, 'downPDF'])->name('export-pdf');
    Route::get('/download/excel', [DonorController::class, 'downExcel'])->name('export-excel');
});

Route::middleware(['terLogin', 'terCek:dukes'])->group(function(){
    Route::get('/dukes-only', [DonorController::class, 'dukes'])->name('dukes');
    Route::get('/dukes/edit/{id}', [PenerimaanController::class, 'edit'])->name('edit.data');
    Route::patch('/status/update/{id}', [PenerimaanController::class, 'update'])->name('update');
    Route::get('/dukes-only/filter', [PenerimaanController::class, 'filter'])->name('filter-data');
});