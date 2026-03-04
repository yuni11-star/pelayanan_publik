<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengujianController;
use App\Http\Controllers\AdminController;

// 1. Route untuk Landing Page
Route::get('/', function () {
    $documents = collect([]);
    $documentPath = public_path('documents');

    if (is_dir($documentPath)) {
        $files = scandir($documentPath);
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..' && is_file($documentPath . '/' . $file)) {
                $filePath = $documentPath . '/' . $file;
                $fileInfo = pathinfo($filePath);
                $extension = strtolower($fileInfo['extension']);
                $size = filesize($filePath);
                $uploadedAt = date('Y-m-d H:i:s', filemtime($filePath));

                // Determine icon and badge classes based on file type
                switch ($extension) {
                    case 'pdf':
                        $iconClass = 'fas fa-file-pdf text-red-500';
                        $badgeClass = 'bg-red-100 text-red-800';
                        $type = 'PDF';
                        break;
                    case 'doc':
                        $iconClass = 'fas fa-file-word text-blue-500';
                        $badgeClass = 'bg-blue-100 text-blue-800';
                        $type = 'DOC';
                        break;
                    case 'docx':
                        $iconClass = 'fas fa-file-word text-blue-500';
                        $badgeClass = 'bg-blue-100 text-blue-800';
                        $type = 'DOCX';
                        break;
                    default:
                        $iconClass = 'fas fa-file text-gray-500';
                        $badgeClass = 'bg-gray-100 text-gray-800';
                        $type = strtoupper($extension);
                }

                // Format file size
                if ($size >= 1048576) {
                    $sizeFormatted = round($size / 1048576, 2) . ' MB';
                } elseif ($size >= 1024) {
                    $sizeFormatted = round($size / 1024, 2) . ' KB';
                } else {
                    $sizeFormatted = $size . ' bytes';
                }

                $documents[] = [
                    'name' => $file,
                    'original_name' => $fileInfo['filename'] . '.' . $extension,
                    'icon_class' => $iconClass,
                    'badge_class' => $badgeClass,
                    'type' => $type,
                    'size_formatted' => $sizeFormatted,
                    'uploaded_at' => $uploadedAt,
                    'path' => 'documents/' . $file,
                ];
            }
        }
    }

    return view('landing', compact('documents'));
});

// 2. Route untuk Menampilkan Halaman Layanan Pengujian
// Digabung menjadi satu agar tidak duplikat, dan diberi nama 'layanan.pengujian'
Route::get('/layanan/pengujian', function () {
    return view('services.pengujian');
})->name('layanan.pengujian');

// 2b. Route untuk Layanan Pengaduan Masyarakat & Informasi
Route::get('/layanan/pengaduan-informasi', function () {
    return view('services.pengaduan-informasi');
})->name('layanan.pengaduan-informasi');

// 3. Route untuk API Autocomplete (Pencarian Real-time)
// Ini adalah route yang dipanggil oleh fetch('/api/search-tarif?q=...') di JavaScript Anda
Route::get('/api/search-tarif', [PengujianController::class, 'search'])->name('tarif.search');

// 4. Route untuk Pencarian Product Tests
use App\Http\Controllers\SearchController;
Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/admin/upload', [AdminController::class, 'showUploadForm'])->name('admin.upload');
Route::post('/admin/upload', [AdminController::class, 'uploadDocument'])->name('admin.upload');
Route::get('/admin/documents/{filename}/preview', [AdminController::class, 'previewDocument'])->name('admin.document.preview');
Route::post('/admin/documents/{filename}/rename', [AdminController::class, 'renameDocument'])->name('admin.document.rename');
Route::delete('/admin/documents/{filename}', [AdminController::class, 'deleteDocument'])->name('admin.document.delete');

// Routes untuk Kelola Obat (CRUD)
Route::get('/admin/obat', [AdminController::class, 'showObat'])->name('admin.obat');
Route::post('/admin/obat', [AdminController::class, 'storeObat'])->name('admin.obat.store');
Route::put('/admin/obat/{id}', [AdminController::class, 'updateObat'])->name('admin.obat.update');
Route::delete('/admin/obat/{id}', [AdminController::class, 'deleteObat'])->name('admin.obat.delete');
Route::get('/admin/obat/{id}', [AdminController::class, 'getObat'])->name('admin.obat.get');

// Routes untuk Kelola Parameter Uji (CRUD)
Route::post('/admin/parameter-uji', [AdminController::class, 'storeParameterUji'])->name('admin.parameter-uji.store');
Route::put('/admin/parameter-uji/{id}', [AdminController::class, 'updateParameterUji'])->name('admin.parameter-uji.update');
Route::delete('/admin/parameter-uji/{id}', [AdminController::class, 'deleteParameterUji'])->name('admin.parameter-uji.delete');

// Routes untuk Kelola OT-SK
Route::get('/admin/otsk', [AdminController::class, 'showOtsk'])->name('admin.otsk');
Route::post('/admin/tipe-produk', [AdminController::class, 'storeTipeProduk'])->name('admin.tipe-produk.store');
Route::put('/admin/tipe-produk/{id}', [AdminController::class, 'updateTipeProduk'])->name('admin.tipe-produk.update');
Route::delete('/admin/tipe-produk/{id}', [AdminController::class, 'deleteTipeProduk'])->name('admin.tipe-produk.delete');

Route::post('/admin/produk-klaim', [AdminController::class, 'storeProdukKlaim'])->name('admin.produk-klaim.store');
Route::put('/admin/produk-klaim/{id}', [AdminController::class, 'updateProdukKlaim'])->name('admin.produk-klaim.update');
Route::delete('/admin/produk-klaim/{id}', [AdminController::class, 'deleteProdukKlaim'])->name('admin.produk-klaim.delete');

Route::post('/admin/parameter-uji-otsk', [AdminController::class, 'storeParameterUjiOtsk'])->name('admin.parameter-uji-otsk.store');
Route::put('/admin/parameter-uji-otsk/{id}', [AdminController::class, 'updateParameterUjiOtsk'])->name('admin.parameter-uji-otsk.update');
Route::delete('/admin/parameter-uji-otsk/{id}', [AdminController::class, 'deleteParameterUjiOtsk'])->name('admin.parameter-uji-otsk.delete');

Route::post('/admin/metode-uji-otsk', [AdminController::class, 'storeMetodeUjiOtsk'])->name('admin.metode-uji-otsk.store');
Route::put('/admin/metode-uji-otsk/{id}', [AdminController::class, 'updateMetodeUjiOtsk'])->name('admin.metode-uji-otsk.update');
Route::delete('/admin/metode-uji-otsk/{id}', [AdminController::class, 'deleteMetodeUjiOtsk'])->name('admin.metode-uji-otsk.delete');

// Routes untuk Kelola Kosmetik (CRUD)
Route::get('/admin/kosmetik', [AdminController::class, 'showKosmetik'])->name('admin.kosmetik');
Route::post('/admin/kosmetik', [AdminController::class, 'storeKosmetik'])->name('admin.kosmetik.store');
Route::put('/admin/kosmetik/{id}', [AdminController::class, 'updateKosmetik'])->name('admin.kosmetik.update');
Route::delete('/admin/kosmetik/{id}', [AdminController::class, 'deleteKosmetik'])->name('admin.kosmetik.delete');
Route::get('/admin/kosmetik/{id}', [AdminController::class, 'getKosmetik'])->name('admin.kosmetik.get');
Route::get('/api/kosmetik/{id}/details', [AdminController::class, 'getKosmetikDetails'])->name('api.kosmetik.details');

// Routes untuk Kelola Kategori Kosmetik (CRUD)
Route::post('/admin/kategori-kosmetik', [AdminController::class, 'storeKategoriKosmetik'])->name('admin.kategori-kosmetik.store');
Route::put('/admin/kategori-kosmetik/{id}', [AdminController::class, 'updateKategoriKosmetik'])->name('admin.kategori-kosmetik.update');
Route::delete('/admin/kategori-kosmetik/{id}', [AdminController::class, 'deleteKategoriKosmetik'])->name('admin.kategori-kosmetik.delete');

// Routes untuk Kelola Parameter Kosmetik (CRUD)
Route::post('/admin/parameter-kosmetik', [AdminController::class, 'storeParameterKosmetik'])->name('admin.parameter-kosmetik.store');
Route::put('/admin/parameter-kosmetik/{id}', [AdminController::class, 'updateParameterKosmetik'])->name('admin.parameter-kosmetik.update');
Route::delete('/admin/parameter-kosmetik/{id}', [AdminController::class, 'deleteParameterKosmetik'])->name('admin.parameter-kosmetik.delete');

// Routes untuk Kelola Pangan (CRUD)
Route::get('/admin/pangan', [AdminController::class, 'showPangan'])->name('admin.pangan');
Route::post('/admin/pangan', [AdminController::class, 'storePangan'])->name('admin.pangan.store');
Route::put('/admin/pangan/{id}', [AdminController::class, 'updatePangan'])->name('admin.pangan.update');
Route::delete('/admin/pangan/{id}', [AdminController::class, 'deletePangan'])->name('admin.pangan.delete');
Route::get('/admin/pangan/{id}', [AdminController::class, 'getPangan'])->name('admin.pangan.get');
Route::get('/api/pangan/{id}/details', [AdminController::class, 'getPanganDetails'])->name('api.pangan.details');

// Routes untuk Kelola Parameter Uji Pangan (CRUD)
Route::post('/admin/parameter-uji-pangan', [AdminController::class, 'storeParameterUjiPangan'])->name('admin.parameter-uji-pangan.store');
Route::put('/admin/parameter-uji-pangan/{id}', [AdminController::class, 'updateParameterUjiPangan'])->name('admin.parameter-uji-pangan.update');
Route::delete('/admin/parameter-uji-pangan/{id}', [AdminController::class, 'deleteParameterUjiPangan'])->name('admin.parameter-uji-pangan.delete');
