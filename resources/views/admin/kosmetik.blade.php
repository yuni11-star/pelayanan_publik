<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kosmetik - Admin</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50">

<div class="min-h-screen py-12">
    <div class="max-w-6xl mx-auto px-4">
        
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-orange-700">Kelola Komoditi Kosmetik</h1>
                <p class="text-slate-500 mt-1">Kelola data kosmetik, kategori, dan parameter uji laboratorium</p>
            </div>
            <a href="{{ route('admin.upload') }}" class="px-4 py-2 bg-slate-200 text-slate-700 rounded-xl font-semibold hover:bg-slate-300 transition">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>

        @if(session('success'))
            <div class="flex items-center bg-emerald-50 text-emerald-700 p-4 rounded-2xl mb-6 border border-emerald-100">
                <i class="fas fa-check-circle mr-3 text-xl"></i>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="flex items-center bg-red-50 text-red-700 p-4 rounded-2xl mb-6 border border-red-100">
                <i class="fas fa-exclamation-circle mr-3 text-xl"></i>
                <span class="font-medium">{{ session('error') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Form Tambah Kosmetik -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100 sticky top-8">
                    <div class="bg-orange-700 px-6 py-5 text-white">
                        <h2 class="text-xl font-bold">Tambah Tipe Kosmetik</h2>
                        <p class="text-orange-200 text-sm mt-1">Masukkan tipe produk kosmetik</p>
                    </div>

                    <div class="p-6">
                        <form action="{{ route('admin.kosmetik.store') }}" method="POST" class="space-y-4">
                            @csrf
                            
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1">Tipe Produk</label>
                                <input type="text" name="tipe_produk" required 
                                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-900 focus:border-transparent outline-none"
                                    placeholder="Contoh: Kosmetika Dekoratif">
                            </div>

                            <button type="submit" class="w-full bg-orange-900 text-white px-6 py-3 rounded-xl font-bold hover:bg-orange-800 transition flex items-center justify-center">
                                <i class="fas fa-plus mr-2"></i>
                                Simpan Tipe Kosmetik
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tabel Data Kosmetik -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100">
                    <div class="bg-orange-700 px-6 py-5 text-white flex justify-between items-center">
                        <div>
                            <h2 class="text-xl font-bold">Data Komoditi Kosmetik</h2>
                            <p class="text-orange-200 text-sm mt-1">Daftar kosmetik yang tersimpan</p>
                        </div>
                        <span class="bg-orange-800 px-3 py-1 rounded-full text-sm font-semibold">{{ $kosmetiks->count() }} items</span>
                    </div>

                    <div class="p-6">
                        @if($kosmetiks->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-slate-200">
                                    <thead class="bg-slate-50">
                                        <tr>
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase">No</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase">Tipe Produk</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase">Kategori</th>
                                            <th class="px-4 py-3 text-center text-xs font-semibold text-slate-600 uppercase">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-200">
                                        @foreach($kosmetiks as $index => $kosmetik)
                                        <tr class="hover:bg-slate-50 transition">
                                            <td class="px-4 py-3 text-sm text-slate-600">{{ $index + 1 }}</td>
                                            <td class="px-4 py-3">
                                                <div class="font-semibold text-slate-800">{{ $kosmetik->tipe_produk }}</div>
                                                @if($kosmetik->kategoriKos && $kosmetik->kategoriKos->count() > 0)
                                                    <button type="button" onclick="toggleKategori({{ $kosmetik->id_kos }})" class="text-xs text-emerald-600 font-medium hover:underline">
                                                        {{ $kosmetik->kategoriKos->count() }} kategori <i class="fas fa-chevron-down ml-1" id="icon-{{ $kosmetik->id_kos }}"></i>
                                                    </button>
                                                @endif
                                            </td>
                                            <td class="px-4 py-3 text-sm text-slate-600">
                                                @if($kosmetik->kategoriKos)
                                                    @foreach($kosmetik->kategoriKos as $kategori)
                                                        <span class="inline-block bg-orange-100 text-orange-800 text-xs px-2 py-1 rounded-full mr-1 mb-1">{{ $kategori->kategori_kos }}</span>
                                                    @endforeach
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="px-4 py-3 text-center">
                                                <div class="flex items-center justify-center space-x-2">
                                                    <button onclick="openEditModal({{ $kosmetik->id_kos }}, '{{ $kosmetik->tipe_produk }}')" 
                                                        class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button onclick="openDeleteModal({{ $kosmetik->id_kos }}, '{{ $kosmetik->tipe_produk }}')" 
                                                        class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Kategori Row (Hidden by default) -->
                                        <tr id="kategori-row-{{ $kosmetik->id_kos }}" class="hidden bg-emerald-50">
                                            <td colspan="4" class="px-4 py-4">
                                                <div class="space-y-4">
                                                    <!-- Form Tambah Kategori -->
                                                    <form action="{{ route('admin.kategori-kosmetik.store') }}" method="POST" class="bg-white p-4 rounded-xl border border-emerald-200">
                                                        @csrf
                                                        <input type="hidden" name="id_kosmetik" value="{{ $kosmetik->id_kos }}">
                                                        <div class="flex gap-3">
                                                            <input type="text" name="kategori_kos" required placeholder="Nama Kategori (contoh: Lipstik)" class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                                                            <button type="submit" class="bg-emerald-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-emerald-700 transition text-sm">
                                                                <i class="fas fa-plus mr-1"></i> Tambah Kategori
                                                            </button>
                                                        </div>
                                                    </form>

                                                    <!-- Kategori List with Parameters -->
                                                    @if($kosmetik->kategoriKos && $kosmetik->kategoriKos->count() > 0)
                                                        @foreach($kosmetik->kategoriKos as $kategori)
                                                        <div class="bg-white p-4 rounded-xl border border-orange-200">
                                                            <div class="flex justify-between items-center mb-3">
                                                                <h4 class="font-bold text-orange-900">{{ $kategori->kategori_kos }}</h4>
                                                                <div class="flex space-x-2">
                                                                    <button onclick="openEditKategoriModal({{ $kategori->id_kategori }}, '{{ addslashes($kategori->kategori_kos) }}')" class="text-blue-600 hover:text-blue-800 text-sm" title="Edit">
                                                                        <i class="fas fa-edit"></i>
                                                                    </button>
                                                                    <button onclick="openDeleteKategoriModal({{ $kategori->id_kategori }}, '{{ addslashes($kategori->kategori_kos) }}')" class="text-red-600 hover:text-red-800 text-sm" title="Hapus">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            
                                                            @if(!$kategori->parameterKos || $kategori->parameterKos->count() === 0)
                                                                <!-- Form Tambah Parameter -->
                                                                <form action="{{ route('admin.parameter-kosmetik.store') }}" method="POST" class="mb-3 bg-slate-50 p-3 rounded-lg">
                                                                    @csrf
                                                                    <input type="hidden" name="id_kategori" value="{{ $kategori->id_kategori }}">
                                                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mb-2">
                                                                        <input type="text" name="puk" required placeholder="PUK" class="px-2 py-1 border border-slate-200 rounded text-sm">
                                                                        <input type="text" name="pustaka" required placeholder="Pustaka" class="px-2 py-1 border border-slate-200 rounded text-sm">
                                                                    </div>
                                                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mb-2">
                                                                        <input type="text" name="teknik_analisis" required placeholder="Teknik Analisis" class="px-2 py-1 border border-slate-200 rounded text-sm">
                                                                        <input type="text" name="metode" required placeholder="Metode" class="px-2 py-1 border border-slate-200 rounded text-sm">
                                                                    </div>
                                                                    <div class="grid grid-cols-1 md:grid-cols-4 gap-2 mb-2">
                                                                        <input type="number" name="sampel_min" placeholder="Sampel Min" min="0" class="px-2 py-1 border border-slate-200 rounded text-sm">
                                                                        <input type="text" name="satuan" required placeholder="Satuan" class="px-2 py-1 border border-slate-200 rounded text-sm">
                                                                        <input type="number" name="harga" required placeholder="Harga (Rp)" min="0" class="px-2 py-1 border border-slate-200 rounded text-sm">
                                                                        <input type="number" name="waktu" required placeholder="Waktu (Hari)" min="0" class="px-2 py-1 border border-slate-200 rounded text-sm">
                                                                    </div>
                                                                    <button type="submit" class="w-full bg-blue-600 text-white py-1 px-3 rounded text-sm font-semibold hover:bg-blue-700 transition">
                                                                        <i class="fas fa-plus mr-1"></i> Tambah Parameter
                                                                    </button>
                                                                </form>
                                                            @endif

                                                            <!-- Parameter Table -->
                                                            @if($kategori->parameterKos && $kategori->parameterKos->count() > 0)
                                                            <div class="overflow-hidden rounded border border-slate-200">
                                                                <table class="min-w-full divide-y divide-slate-200">
                                                                    <thead class="bg-slate-100">
                                                                        <tr>
                                                                            <th class="px-2 py-1 text-left text-xs font-semibold text-slate-600">PUK</th>
                                                                            <th class="px-2 py-1 text-left text-xs font-semibold text-slate-600">Teknik</th>
                                                                            <th class="px-2 py-1 text-left text-xs font-semibold text-slate-600">Metode</th>
                                                                            <th class="px-2 py-1 text-right text-xs font-semibold text-slate-600">Harga</th>
                                                                            <th class="px-2 py-1 text-center text-xs font-semibold text-slate-600">Aksi</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="divide-y divide-slate-100">
                                                                        @foreach($kategori->parameterKos as $param)
                                                                        <tr>
                                                                            <td class="px-2 py-1 text-xs text-slate-700">{{ $param->puk }}</td>
                                                                            <td class="px-2 py-1 text-xs text-slate-700">{{ $param->teknik_analisis }}</td>
                                                                            <td class="px-2 py-1 text-xs text-slate-700">{{ $param->metode }}</td>
                                                                            <td class="px-2 py-1 text-right text-xs font-medium text-orange-700">Rp {{ number_format($param->harga, 0, ',', '.') }}</td>
                                                                            <td class="px-2 py-1 text-center">
                                                                                <button onclick="openEditParamModal({{ $param->id_parameter }}, '{{ addslashes($param->puk) }}', '{{ addslashes($param->pustaka) }}', '{{ addslashes($param->teknik_analisis) }}', '{{ addslashes($param->metode) }}', '{{ $param->sampel_min ?? '' }}', '{{ addslashes($param->satuan) }}', {{ $param->harga }}, {{ $param->waktu }})" class="text-blue-600 hover:text-blue-800 text-xs">
                                                                                    <i class="fas fa-edit"></i>
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            @endif
                                                        </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-12">
                                <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-paint-brush text-2xl text-slate-400"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-slate-700 mb-2">Belum ada data kosmetik</h3>
                                <p class="text-slate-500 text-sm">Tambahkan kosmetik pertama Anda menggunakan form di samping.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal Edit Kosmetik - Comprehensive Edit Modal with Search -->
<div id="editModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center">
    <div class="relative mx-auto p-6 border w-full max-w-4xl shadow-2xl rounded-3xl bg-white my-8">
        <div class="flex justify-between items-center mb-6 border-b pb-4">
            <div>
                <h3 class="text-xl font-bold text-orange-900">Edit Tipe Produk Kosmetik</h3>
                <p class="text-sm text-slate-500 mt-1">Kelola semua detail tipe produk termasuk kategori dan parameter</p>
            </div>
            <button onclick="closeEditModal()" class="text-slate-400 hover:text-slate-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" id="edit_id_kos" name="id_kos">
            
            <!-- Tipe Produk Field -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-slate-700 mb-2">Tipe Produk</label>
                <input type="text" id="edit_tipe_produk" name="tipe_produk" required 
                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-900 focus:border-transparent outline-none">
            </div>

            <!-- Kategori Section -->
            <div class="mb-6">
                <div class="flex justify-between items-center mb-3">
                    <h4 class="font-bold text-slate-800">Kategori</h4>
                    <button type="button" onclick="toggleAddKategoriForm()" class="text-sm text-emerald-600 font-semibold hover:text-emerald-800">
                        <i class="fas fa-plus mr-1"></i> Tambah Kategori
                    </button>
                </div>

                <!-- Search Box for Kategori -->
                <div class="mb-3">
                    <div class="relative">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400"></i>
                        <input type="text" id="searchKategori" onkeyup="filterKategori()" placeholder="Cari kategori..." 
                            class="w-full pl-10 pr-4 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-orange-900 focus:border-transparent outline-none">
                    </div>
                </div>
                
                <!-- Form Tambah Kategori (Hidden by default) -->
                <div id="addKategoriForm" class="hidden mb-4 bg-emerald-50 p-4 rounded-xl border border-emerald-200">
                    <div id="addKategoriFormInline">
                        @csrf
                        <input type="hidden" name="id_kosmetik" id="add_kategori_id_kosmetik">
                        <div class="flex gap-3">
                            <input type="text" id="add_kategori_name" name="kategori_kos" required placeholder="Nama Kategori" class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                            <button type="button" id="addKategoriSubmitBtn" onclick="submitKategori(event)" class="bg-emerald-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-emerald-700 transition text-sm">
                                <i class="fas fa-check mr-1"></i> Simpan
                            </button>
                            <button type="button" onclick="toggleAddKategoriForm()" class="bg-slate-200 text-slate-600 px-4 py-2 rounded-lg font-semibold hover:bg-slate-300 transition text-sm">
                                Batal
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Kategori List Container - Table Format -->
                <div id="kategoriList" class="space-y-4 max-h-96 overflow-y-auto pr-2">
                    <!-- Dynamic content will be loaded here -->
                </div>
            </div>

            <div class="flex space-x-3 pt-4 border-t">
                <button type="button" onclick="closeEditModal()" class="flex-1 px-4 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold hover:bg-slate-200 transition">Tutup</button>
                <button type="submit" class="flex-1 px-4 py-3 bg-orange-900 text-white rounded-xl font-bold hover:bg-orange-800 transition">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Delete Kosmetik -->
<div id="deleteModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center">
    <div class="relative mx-auto p-6 border w-full max-w-sm shadow-2xl rounded-3xl bg-white">
        <div class="text-center">
            <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-trash-alt text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-800">Hapus Kosmetik?</h3>
            <p class="text-slate-500 text-sm mt-2 mb-6">
                Kosmetik <span id="delete_kosmetik_name" class="font-bold text-slate-800"></span> akan dihapus permanen.
            </p>
        </div>
        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex space-x-3">
                <button type="button" onclick="closeDeleteModal()" class="flex-1 px-4 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold hover:bg-slate-200 transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-3 bg-red-600 text-white rounded-xl font-bold hover:bg-red-700 transition">Hapus</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Kategori -->
<div id="editKategoriModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center">
    <div class="relative mx-auto p-6 border w-full max-w-md shadow-2xl rounded-3xl bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-orange-900">Edit Kategori</h3>
            <button onclick="closeEditKategoriModal()" class="text-slate-400 hover:text-slate-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <form id="editKategoriForm" method="POST">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Kategori</label>
                <input type="text" id="edit_kategori_kos" name="kategori_kos" required 
                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-900 focus:border-transparent outline-none">
            </div>

            <div class="flex space-x-3 mt-6">
                <button type="button" onclick="closeEditKategoriModal()" class="flex-1 px-4 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold hover:bg-slate-200 transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-3 bg-orange-900 text-white rounded-xl font-bold hover:bg-orange-800 transition">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Delete Kategori -->
<div id="deleteKategoriModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center">
    <div class="relative mx-auto p-6 border w-full max-w-sm shadow-2xl rounded-3xl bg-white">
        <div class="text-center">
            <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-trash-alt text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-800">Hapus Kategori?</h3>
            <p class="text-slate-500 text-sm mt-2 mb-6">
                Kategori <span id="delete_kategori_name" class="font-bold text-slate-800"></span> akan dihapus permanen.
            </p>
        </div>
        <form id="deleteKategoriForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex space-x-3">
                <button type="button" onclick="closeDeleteKategoriModal()" class="flex-1 px-4 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold hover:bg-slate-200 transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-3 bg-red-600 text-white rounded-xl font-bold hover:bg-red-700 transition">Hapus</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Parameter Kosmetik -->
<div id="editParamModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center">
    <div class="relative mx-auto p-6 border w-full max-w-2xl shadow-2xl rounded-3xl bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-orange-900">Edit Parameter Kosmetik</h3>
            <button onclick="closeEditParamModal()" class="text-slate-400 hover:text-slate-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <form id="editParamForm" method="POST">
            @csrf
            @method('PUT')
            
            <div class="space-y-3">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">PUK</label>
                        <input type="text" id="edit_param_puk" name="puk" required 
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-900 focus:border-transparent outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Pustaka</label>
                        <input type="text" id="edit_param_pustaka" name="pustaka" required 
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-900 focus:border-transparent outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Teknik Analisis</label>
                        <input type="text" id="edit_param_teknik" name="teknik_analisis" required 
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-900 focus:border-transparent outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Metode</label>
                        <input type="text" id="edit_param_metode" name="metode" required 
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-900 focus:border-transparent outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Sampel Min</label>
                        <input type="number" id="edit_param_sampel" name="sampel_min" min="0"
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-900 focus:border-transparent outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Satuan</label>
                        <input type="text" id="edit_param_satuan" name="satuan" required 
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-900 focus:border-transparent outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Harga (Rp)</label>
                        <input type="number" id="edit_param_harga" name="harga" required min="0" step="0.01"
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-900 focus:border-transparent outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Waktu (Hari)</label>
                        <input type="number" id="edit_param_waktu" name="waktu" required min="0"
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-900 focus:border-transparent outline-none">
                    </div>
                </div>
            </div>

            <div class="flex space-x-3 mt-6">
                <button type="button" onclick="closeEditParamModal()" class="flex-1 px-4 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold hover:bg-slate-200 transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-3 bg-orange-900 text-white rounded-xl font-bold hover:bg-orange-800 transition">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Delete Parameter Kosmetik -->
<div id="deleteParamModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center">
    <div class="relative mx-auto p-6 border w-full max-w-sm shadow-2xl rounded-3xl bg-white">
        <div class="text-center">
            <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-trash-alt text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-800">Hapus Parameter Kosmetik?</h3>
            <p class="text-slate-500 text-sm mt-2 mb-6">
                Parameter <span id="delete_param_name" class="font-bold text-slate-800"></span> akan dihapus permanen.
            </p>
        </div>
        <form id="deleteParamForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex space-x-3">
                <button type="button" onclick="closeDeleteParamModal()" class="flex-1 px-4 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold hover:bg-slate-200 transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-3 bg-red-600 text-white rounded-xl font-bold hover:bg-red-700 transition">Hapus</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Toggle Kategori Row
    function toggleKategori(id) {
        var row = document.getElementById('kategori-row-' + id);
        var icon = document.getElementById('icon-' + id);
        
        if (row.classList.contains('hidden')) {
            row.classList.remove('hidden');
            icon.classList.remove('fa-chevron-down');
            icon.classList.add('fa-chevron-up');
        } else {
            row.classList.add('hidden');
            icon.classList.remove('fa-chevron-up');
            icon.classList.add('fa-chevron-down');
        }
    }

    // Filter Kategori in Modal
    function filterKategori() {
        var input = document.getElementById('searchKategori');
        var filter = input.value.toLowerCase();
        var container = document.getElementById('kategoriList');
        var cards = container.getElementsByClassName('kategori-card');
        
        for (var i = 0; i < cards.length; i++) {
            var title = cards[i].getAttribute('data-kategori-name');
            if (title.toLowerCase().indexOf(filter) > -1) {
                cards[i].style.display = '';
            } else {
                cards[i].style.display = 'none';
            }
        }
    }

    // Kosmetik Modal Functions - Load all details when opening edit modal
    async function openEditModal(id, tipeProduk) {
        document.getElementById('edit_id_kos').value = id;
        document.getElementById('edit_tipe_produk').value = tipeProduk;
        document.getElementById('editForm').action = '/admin/kosmetik/' + id;
        document.getElementById('searchKategori').value = '';
        
        var kategoriList = document.getElementById('kategoriList');
        kategoriList.innerHTML = '<div class="text-center py-4"><i class="fas fa-spinner fa-spin text-orange-600"></i> Memuat data...</div>';
        
        try {
            var response = await fetch('/api/kosmetik/' + id + '/details');
            var data = await response.json();
            
            if (data.kategori && data.kategori.length > 0) {
                var html = '';
                for (var i = 0; i < data.kategori.length; i++) {
                    var kategori = data.kategori[i];
                    var paramsHtml = '';
                    
                    // Build parameters table
                    var hasParameters = kategori.parameters && kategori.parameters.length > 0;
                    if (hasParameters) {
                        paramsHtml = '<div class="overflow-hidden rounded border border-slate-200 mb-3">' +
                            '<table class="min-w-full divide-y divide-slate-200">' +
                            '<thead class="bg-slate-100">' +
                            '<tr>' +
                            '<th class="px-2 py-1 text-left text-xs font-semibold text-slate-600">PUK</th>' +
                            '<th class="px-2 py-1 text-left text-xs font-semibold text-slate-600">Teknik</th>' +
                            '<th class="px-2 py-1 text-left text-xs font-semibold text-slate-600">Metode</th>' +
                            '<th class="px-2 py-1 text-right text-xs font-semibold text-slate-600">Harga</th>' +
                            '<th class="px-2 py-1 text-center text-xs font-semibold text-slate-600">Aksi</th>' +
                            '</tr></thead><tbody class="divide-y divide-slate-100">';
                        
                        for (var j = 0; j < kategori.parameters.length; j++) {
                            var param = kategori.parameters[j];
                            var hargaFormatted = new Intl.NumberFormat('id-ID').format(param.harga);
                            var pukEsc = param.puk.replace(/'/g, "\\'");
                            var pustakaEsc = param.pustaka.replace(/'/g, "\\'");
                            var teknikEsc = param.teknik_analisis.replace(/'/g, "\\'");
                            var metodeEsc = param.metode.replace(/'/g, "\\'");
                            var satuanEsc = param.satuan.replace(/'/g, "\\'");
                            var sampelMin = param.sampel_min || '';
                            
                            paramsHtml += '<tr>' +
                                '<td class="px-2 py-1 text-xs text-slate-700">' + param.puk + '</td>' +
                                '<td class="px-2 py-1 text-xs text-slate-700">' + param.teknik_analisis + '</td>' +
                                '<td class="px-2 py-1 text-xs text-slate-700">' + param.metode + '</td>' +
                                '<td class="px-2 py-1 text-right text-xs font-medium text-orange-700">Rp ' + hargaFormatted + '</td>' +
                                '<td class="px-2 py-1 text-center">' +
                                '<button onclick="openEditParamModal(' + param.id_parameter + ', \'' + pukEsc + '\', \'' + pustakaEsc + '\', \'' + teknikEsc + '\', \'' + metodeEsc + '\', \'' + sampelMin + '\', \'' + satuanEsc + '\', ' + param.harga + ', ' + param.waktu + ')" class="text-blue-600 hover:text-blue-800 text-xs"><i class="fas fa-edit"></i></button>' +
                                '</td></tr>';
                        }
                        paramsHtml += '</tbody></table></div>';
                    } else {
                        paramsHtml = '<p class="text-sm text-slate-500 mb-3">Belum ada parameter</p>';
                    }
                    
                    // Build kategori card with table - added data-kategori-name for search
                    var kategoriEsc = kategori.kategori_kos.replace(/'/g, "\\'");
                    var addParameterFormHtml = '';
                    if (!hasParameters) {
                        addParameterFormHtml = '<div class="bg-slate-50 p-3 rounded-lg add-parameter-kosmetik-form">' +
                            '<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
                            '<div class="grid grid-cols-1 md:grid-cols-2 gap-2 mb-2">' +
                            '<input type="text" name="puk" required placeholder="PUK" class="px-2 py-1 border border-slate-200 rounded text-sm">' +
                            '<input type="text" name="pustaka" required placeholder="Pustaka" class="px-2 py-1 border border-slate-200 rounded text-sm">' +
                            '</div>' +
                            '<div class="grid grid-cols-1 md:grid-cols-2 gap-2 mb-2">' +
                            '<input type="text" name="teknik_analisis" required placeholder="Teknik Analisis" class="px-2 py-1 border border-slate-200 rounded text-sm">' +
                            '<input type="text" name="metode" required placeholder="Metode" class="px-2 py-1 border border-slate-200 rounded text-sm">' +
                            '</div>' +
                            '<div class="grid grid-cols-1 md:grid-cols-4 gap-2 mb-2">' +
                            '<input type="number" name="sampel_min" placeholder="Sampel Min" min="0" class="px-2 py-1 border border-slate-200 rounded text-sm">' +
                            '<input type="text" name="satuan" required placeholder="Satuan" class="px-2 py-1 border border-slate-200 rounded text-sm">' +
                            '<input type="number" name="harga" required placeholder="Harga (Rp)" min="0" class="px-2 py-1 border border-slate-200 rounded text-sm">' +
                            '<input type="number" name="waktu" required placeholder="Waktu (Hari)" min="0" class="px-2 py-1 border border-slate-200 rounded text-sm">' +
                            '</div>' +
                            '<button type="button" onclick="submitParameterKosmetik(this, ' + kategori.id_kategori + ')" class="w-full bg-blue-600 text-white py-1 px-3 rounded text-sm font-semibold hover:bg-blue-700 transition"><i class="fas fa-plus mr-1"></i> Tambah Parameter</button>' +
                            '</div>';
                    }

                    html += '<div class="bg-orange-50 p-4 rounded-xl border border-orange-200 mb-4 kategori-card" data-kategori-name="' + kategori.kategori_kos + '">' +
                        '<div class="flex justify-between items-center mb-3">' +
                        '<h5 class="font-bold text-orange-900">' + kategori.kategori_kos + '</h5>' +
                        '<div class="flex space-x-2">' +
                        '<button onclick="openEditKategoriModal(' + kategori.id_kategori + ', \'' + kategoriEsc + '\')" class="text-blue-600 hover:text-blue-800 text-sm" title="Edit"><i class="fas fa-edit"></i></button>' +
                        '<button onclick="openDeleteKategoriModal(' + kategori.id_kategori + ', \'' + kategoriEsc + '\')" class="text-red-600 hover:text-red-800 text-sm" title="Hapus"><i class="fas fa-trash"></i></button>' +
                        '</div></div>' +
                        paramsHtml +
                        addParameterFormHtml +
                        '</div>';
                }
                kategoriList.innerHTML = html;
            } else {
                kategoriList.innerHTML = '<div class="text-center py-4 text-slate-500">Belum ada kategori</div>';
            }
            
            document.getElementById('add_kategori_id_kosmetik').value = id;
            
        } catch (error) {
            console.error('Error:', error);
            kategoriList.innerHTML = '<div class="text-center py-4 text-red-500">Gagal memuat data</div>';
        }
        
        document.getElementById('editModal').classList.remove('hidden');
    }

    function toggleAddKategoriForm() {
        document.getElementById('addKategoriForm').classList.toggle('hidden');
    }

    async function submitKategori(event) {
        if (event) {
            event.preventDefault();
        }

        var tokenInput = document.querySelector('#addKategoriFormInline input[name=\"_token\"]');
        var kategoriInput = document.getElementById('add_kategori_name');
        var idKosmetik = document.getElementById('add_kategori_id_kosmetik').value;
        var tipeProduk = document.getElementById('edit_tipe_produk').value;
        var submitButton = document.getElementById('addKategoriSubmitBtn');
        var originalButtonHtml = submitButton.innerHTML;
        var formData = new FormData();
        var kategoriValue = kategoriInput ? kategoriInput.value.trim() : '';

        if (!kategoriValue) {
            alert('Nama kategori wajib diisi.');
            return false;
        }

        formData.append('_token', tokenInput ? tokenInput.value : '');
        formData.append('id_kosmetik', idKosmetik);
        formData.append('kategori_kos', kategoriValue);

        try {
            submitButton.disabled = true;
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i> Menyimpan...';

            var response = await fetch('/admin/kategori-kosmetik', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            if (!response.ok) {
                throw new Error('Gagal menyimpan kategori');
            }

            if (kategoriInput) kategoriInput.value = '';
            document.getElementById('add_kategori_id_kosmetik').value = idKosmetik;
            document.getElementById('addKategoriForm').classList.add('hidden');
            await openEditModal(idKosmetik, tipeProduk);
        } catch (error) {
            console.error('Error:', error);
            alert('Gagal menyimpan kategori. Silakan cek input dan coba lagi.');
        } finally {
            submitButton.disabled = false;
            submitButton.innerHTML = originalButtonHtml;
        }

        return false;
    }

    async function submitParameterKosmetik(button, idKategori) {
        var formContainer = button.closest('.add-parameter-kosmetik-form');
        if (!formContainer) return false;

        function getValue(name) {
            var input = formContainer.querySelector('[name="' + name + '"]');
            return input ? input.value.trim() : '';
        }

        var tokenInput = formContainer.querySelector('[name="_token"]');
        var payload = new FormData();
        var originalButtonHtml = button.innerHTML;
        var puk = getValue('puk');
        var pustaka = getValue('pustaka');
        var teknikAnalisis = getValue('teknik_analisis');
        var metode = getValue('metode');
        var satuan = getValue('satuan');
        var harga = getValue('harga');
        var waktu = getValue('waktu');
        var sampelMinInput = formContainer.querySelector('[name="sampel_min"]');

        if (!puk || !pustaka || !teknikAnalisis || !metode || !satuan || !harga || !waktu) {
            alert('Semua field wajib (kecuali Sampel Min) harus diisi.');
            return false;
        }

        payload.append('_token', tokenInput ? tokenInput.value : '');
        payload.append('id_kategori', idKategori);
        payload.append('puk', puk);
        payload.append('pustaka', pustaka);
        payload.append('teknik_analisis', teknikAnalisis);
        payload.append('metode', metode);
        payload.append('sampel_min', sampelMinInput ? sampelMinInput.value : '');
        payload.append('satuan', satuan);
        payload.append('harga', harga);
        payload.append('waktu', waktu);

        try {
            button.disabled = true;
            button.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i> Menyimpan...';

            var response = await fetch('/admin/parameter-kosmetik', {
                method: 'POST',
                body: payload,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            if (!response.ok) {
                throw new Error('Gagal menyimpan parameter kosmetik');
            }

            var idKosmetik = document.getElementById('edit_id_kos').value;
            var tipeProduk = document.getElementById('edit_tipe_produk').value;
            await openEditModal(idKosmetik, tipeProduk);
        } catch (error) {
            console.error('Error:', error);
            alert('Gagal menyimpan parameter. Silakan cek input dan coba lagi.');
        } finally {
            button.disabled = false;
            button.innerHTML = originalButtonHtml;
        }

        return false;
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    function openDeleteModal(id, nama) {
        document.getElementById('delete_kosmetik_name').textContent = nama;
        document.getElementById('deleteForm').action = '/admin/kosmetik/' + id;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    // Kategori Modal Functions
    function openEditKategoriModal(id, kategori) {
        document.getElementById('edit_kategori_kos').value = kategori;
        document.getElementById('editKategoriForm').action = '/admin/kategori-kosmetik/' + id;
        document.getElementById('editKategoriModal').classList.remove('hidden');
    }

    function closeEditKategoriModal() {
        document.getElementById('editKategoriModal').classList.add('hidden');
    }

    function openDeleteKategoriModal(id, nama) {
        document.getElementById('delete_kategori_name').textContent = nama;
        document.getElementById('deleteKategoriForm').action = '/admin/kategori-kosmetik/' + id;
        document.getElementById('deleteKategoriModal').classList.remove('hidden');
    }

    function closeDeleteKategoriModal() {
        document.getElementById('deleteKategoriModal').classList.add('hidden');
    }

    // Parameter Modal Functions
    function openEditParamModal(id, puk, pustaka, teknikAnalisis, metode, sampel, satuan, harga, waktu) {
        document.getElementById('edit_param_puk').value = puk;
        document.getElementById('edit_param_pustaka').value = pustaka;
        document.getElementById('edit_param_teknik').value = teknikAnalisis;
        document.getElementById('edit_param_metode').value = metode;
        document.getElementById('edit_param_sampel').value = sampel;
        document.getElementById('edit_param_satuan').value = satuan;
        document.getElementById('edit_param_harga').value = harga;
        document.getElementById('edit_param_waktu').value = waktu;
        
        document.getElementById('editParamForm').action = '/admin/parameter-kosmetik/' + id;
        document.getElementById('editParamModal').classList.remove('hidden');
    }

    function closeEditParamModal() {
        document.getElementById('editParamModal').classList.add('hidden');
    }

    function openDeleteParamModal(id, nama) {
        document.getElementById('delete_param_name').textContent = nama;
        document.getElementById('deleteParamForm').action = '/admin/parameter-kosmetik/' + id;
        document.getElementById('deleteParamModal').classList.remove('hidden');
    }

    function closeDeleteParamModal() {
        document.getElementById('deleteParamModal').classList.add('hidden');
    }

    // Close modal when clicking outside
    document.getElementById('editModal').addEventListener('click', function(e) {
        if (e.target === this) closeEditModal();
    });

    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) closeDeleteModal();
    });

    document.getElementById('editKategoriModal').addEventListener('click', function(e) {
        if (e.target === this) closeEditKategoriModal();
    });

    document.getElementById('deleteKategoriModal').addEventListener('click', function(e) {
        if (e.target === this) closeDeleteKategoriModal();
    });

    document.getElementById('editParamModal').addEventListener('click', function(e) {
        if (e.target === this) closeEditParamModal();
    });

    document.getElementById('deleteParamModal').addEventListener('click', function(e) {
        if (e.target === this) closeDeleteParamModal();
    });
</script>

</body>
</html>
