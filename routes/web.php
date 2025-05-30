<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListProdukController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/listproduk', [ListProdukController::class, 'show']);
Route::post('/listproduk', [ListProdukController::class, 'simpan'])->name('produk.simpan');