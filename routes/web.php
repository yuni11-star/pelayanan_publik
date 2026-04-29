<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengujianController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\SearchController;

// 1. Route untuk Landing Page
Route::get('/', function () {
    $landingSearchTargets = [
        [
            'title' => 'Pengujian Obat dan Makanan',
            'type' => 'section',
            'sectionId' => 'service-pengujian',
            'keywords' => [
                'pengujian',
                'pengujian obat dan makanan',
                'uji obat',
                'uji makanan',
                'parameter pengujian',
                'layanan pengujian',
            ],
        ],
        [
            'title' => 'Rekomendasi Notifikasi Kosmetika',
            'type' => 'section',
            'sectionId' => 'service-notifikasi-kosmetika',
            'keywords' => [
                'notifikasi kosmetika',
                'rekomendasi notifikasi kosmetika',
                'kosmetika',
                'notifikasi produk kosmetika',
            ],
        ],
        [
            'title' => 'Surat Keterangan Ekspor & Impor (SKE/SKI)',
            'type' => 'section',
            'sectionId' => 'service-ske-ski',
            'keywords' => [
                'ske',
                'ski',
                'surat keterangan ekspor',
                'surat keterangan impor',
                'surat keterangan ekspor impor',
                'faq ske ski',
            ],
        ],
        [
            'title' => 'Rekomendasi Importir Obat Alam & Suplemen',
            'type' => 'section',
            'sectionId' => 'service-importir-obat-alam',
            'keywords' => [
                'importir obat alam',
                'importir suplemen',
                'obat alam',
                'suplemen kesehatan',
                'rekomendasi importir',
            ],
        ],
        [
            'title' => 'Pelayanan Lainnya',
            'type' => 'section',
            'sectionId' => 'service-lainnya',
            'keywords' => [
                'pelayanan lainnya',
                'daili',
                'update informasi publik',
                'registrasi oba',
                'spp-irt',
                'registrasi produk pangan olahan',
                'faq',
            ],
        ],
        [
            'title' => 'AGI JAKK',
            'type' => 'section',
            'sectionId' => 'agi-jakk',
            'keywords' => [
                'agi jakk',
                'aksi dampingi dan jangkau umkm kalbar',
                'umkm',
            ],
        ],
        [
            'title' => 'Form AGI JAKK',
            'type' => 'section',
            'sectionId' => 'agi-form-card',
            'keywords' => [
                'form agi jakk',
                'pendaftaran agi jakk',
                'pendampingan umkm',
            ],
        ],
        [
            'title' => 'Informasi Pangan (CPPOB)',
            'type' => 'page',
            'url' => route('layanan.agi-jakk.pangan'),
            'keywords' => [
                'pangan',
                'cppob',
                'informasi pangan',
                'informasi dasar registrasi',
                'booklet 1 informasi umum registrasi',
                'booklet 2 registrasi akun perusahaan',
                'booklet 3 registrasi pangan',
                'label pangan',
                'booklet 4 label pangan olahan',
                'alur registrasi',
                'alur registrasi pangan olahan bpom',
                'regulasi pangan',
                'per bpom no 13 tahun 2023',
                'materi pembinaan',
                'materi umkm hebat',
                'standar pengawasan',
                'pengawasan pre market',
                'tata cara pengisian cppb',
                'dokumen persyaratan ip cppob',
                'alur produksi dan denah',
                'sop pangan',
                'data dukung penilaian mandiri',
                'formulir penilaian mandiri',
                'surat pemenuhan komitmen',
                'surat pemenuhan standar penerapan cppob',
            ],
        ],
        [
            'title' => 'Informasi Kosmetik (CPKB)',
            'type' => 'page',
            'url' => route('layanan.agi-jakk.kosmetik'),
            'keywords' => [
                'kosmetik',
                'cpkb',
                'informasi kosmetik',
                'persyaratan cpkb',
                'bangunan dan fasilitas',
                'higiene dan sanitasi',
                'produksi kosmetik',
                'pengawasan mutu',
                'dokumentasi kosmetik',
                'panduan pendaftaran',
                'alur pendaftaran badan usaha',
                'alur proses notifikasi',
                'tata cara pendaftaran baru nie multi pabrik',
                'tata cara pendaftaran produk baru melalui oss',
                'tata cara pendaftaran produk kit',
                'tata cara pendaftaran produk konfirmasi',
                'tata cara pendaftaran variasi nie multi pabrik',
                'tata cara pengajuan notifikasi',
                'dokumen persyaratan kosmetik',
                'kelengkapan dokumen',
                'dokumen informasi produk',
                'denah bangunan industri',
                'contoh surat',
                'regulasi bahan kosmetik',
                'tarif pnbp kosmetik',
                'faq notifikasi',
                'a-z notifikasi kosmetik',
                'faq dokumen informasi dip',
            ],
        ],
        [
            'title' => 'Informasi Obat (CDOB)',
            'type' => 'page',
            'url' => route('layanan.agi-jakk.obat'),
            'keywords' => [
                'obat',
                'cdob',
                'informasi obat',
                'alur cdob',
                'self assesment',
                'pedoman cdob 2020',
                'faq perizinan dan sertifikasi cdob',
                'sistem mekanisme cdob',
                'alur sertifikasi cdob',
                'distribusi obat',
            ],
        ],
        [
            'title' => 'Informasi Obat Tradisional (CPOTB)',
            'type' => 'page',
            'url' => route('layanan.agi-jakk.obat-tradisional'),
            'keywords' => [
                'obat tradisional',
                'cpotb',
                'otsk',
                'otsk',
                'obat bahan alam',
                'informasi obat tradisional',
                'alur pendaftaran obat bahan alam',
                'materi registrasi akun asrot',
                'update informasi registrasi obat bahan alam dan kosmetik',
                'alur perizinan obat bahan alam',
                'alur sertifikasi cpotb',
                'biaya pengurusan perizinan obat bahan alam',
                'dokumen cpotb',
                'registrasi oba',
                'asrot',
            ],
        ],
        [
            'title' => 'Kalkulator Tarif',
            'type' => 'section',
            'sectionId' => 'tariff',
            'keywords' => [
                'kalkulator',
                'kalkulator tarif',
                'tarif',
                'hitung tarif',
                'pnbp',
                'jenis penerimaan',
            ],
        ],
        [
            'title' => 'Standar Pelayanan',
            'type' => 'section',
            'sectionId' => 'standards',
            'keywords' => [
                'standar pelayanan',
                'dokumen standar pelayanan',
                'unduh dokumen',
            ],
        ],
        [
            'title' => 'Kontak',
            'type' => 'section',
            'sectionId' => 'contact',
            'keywords' => [
                'kontak',
                'hubungi kami',
                'alamat',
                'telepon',
                'email',
                'jam buka',
            ],
        ],
    ];

    $documents = collect([]);
    $documentPath = config('documents.path', public_path('documents'));

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
                    'path' => route('documents.public', ['filename' => $file]),
                ];
            }
        }
    }

    return view('landing', compact('documents', 'landingSearchTargets'));
});

Route::get('/documents/{filename}', [AdminController::class, 'publicDocument'])->name('documents.public');

// 2. Route untuk Menampilkan Halaman Layanan Pengujian
// Digabung menjadi satu agar tidak duplikat, dan diberi nama 'layanan.pengujian'
Route::get('/layanan/pengujian', function () {
    return view('services.pengujian');
})->name('layanan.pengujian');

// 2b. Route untuk Layanan Pengaduan Masyarakat & Informasi
Route::get('/layanan/pengaduan-informasi', function () {
    return view('services.pengaduan-informasi');
})->name('layanan.pengaduan-informasi');

// 2c. Route untuk Layanan AGI JAKK
Route::get('/layanan/agi-jakk', function () {
    return view('services.agi-jakk');
})->name('layanan.agi-jakk');

// 2d. Route untuk Layanan AGI JAKK - Pangan
Route::get('/layanan/agi-jakk/pangan', function () {
    return view('services.agi-jakk-pangan');
})->name('layanan.agi-jakk.pangan');

// 2e. Route untuk Layanan AGI JAKK - Kosmetik
Route::get('/layanan/agi-jakk/kosmetik', function () {
    return view('services.agi-jakk-kosmetik');
})->name('layanan.agi-jakk.kosmetik');

// 2f. Route untuk Layanan AGI JAKK - CDOB
Route::get('/layanan/agi-jakk/obat', function () {
    return view('services.agi-jakk-obat');
})->name('layanan.agi-jakk.obat');

Route::get('/layanan/agi-jakk/obat-tradisional', function () {
    return view('services.agi-jakk-ObatTradisional');
})->name('layanan.agi-jakk.obat-tradisional');

// 3. Route untuk API Autocomplete (Pencarian Real-time)
// Ini adalah route yang dipanggil oleh fetch('/api/search-tarif?q=...') di JavaScript Anda
Route::get('/api/search-tarif', [PengujianController::class, 'search'])->name('tarif.search');

// 4. Route untuk Pencarian Product Tests
Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');

Route::middleware('admin.auth')->group(function () {
    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('admin.super')->group(function () {
        Route::get('/admin/upload', [AdminController::class, 'showUploadForm'])->name('admin.upload');
        Route::post('/admin/upload', [AdminController::class, 'uploadDocument'])->name('admin.upload');
        Route::get('/admin/documents/{filename}/preview', [AdminController::class, 'previewDocument'])->name('admin.document.preview');
        Route::post('/admin/documents/{filename}/rename', [AdminController::class, 'renameDocument'])->name('admin.document.rename');
        Route::delete('/admin/documents/{filename}', [AdminController::class, 'deleteDocument'])->name('admin.document.delete');
    });

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
});
