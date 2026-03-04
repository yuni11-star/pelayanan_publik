<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengujianController;

// Route untuk pencarian tarif (sudah ada sebelumnya)
Route::get('/search-tarif', [PengujianController::class, 'search']);

// Route untuk pencarian obat - JANGAN gunakan /api lagi di sini
Route::get('/search-obat', [PengujianController::class, 'searchObat']);
Route::get('/obat/{id}', [PengujianController::class, 'getObatDetail']);

// Route untuk pencarian OT-SK
Route::get('/search-otsk', [PengujianController::class, 'searchOtsk']);
Route::get('/otsk/{id}', [PengujianController::class, 'getOtskDetail']);
Route::get('/tipe-produk/{id}', [PengujianController::class, 'getTipeProdukDetail']);
Route::get('/tipe-produk', [PengujianController::class, 'getTipeProduk']);
Route::get('/search-tipe-produk', [PengujianController::class, 'searchTipeProduk']);
Route::get('/klaim-by-tipe/{tipeId}', [PengujianController::class, 'getKlaimByTipe']);
Route::get('/kategori-indikasi', [PengujianController::class, 'getKategoriIndikasi']);
Route::get('/metode-by-kategori/{kategoriId}', [PengujianController::class, 'getMetodeByKategori']);

// Route untuk pencarian product tests
Route::get('/search-product-tests', [PengujianController::class, 'searchProductTests']);

// Route untuk Kosmetik
Route::get('/search-kosmetik', [PengujianController::class, 'searchKosmetik']);
Route::get('/kosmetik/{id}', [PengujianController::class, 'getKosmetikDetail']);

// Route untuk Pangan
Route::get('/search-pangan', [PengujianController::class, 'searchPangan']);
Route::get('/pangan/{id}', [PengujianController::class, 'getPanganDetail']);
Route::get('/pangan/{id}/item/{idUji}', [PengujianController::class, 'getPanganItemDetail']);
