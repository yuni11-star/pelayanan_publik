<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pangan - Admin</title>
    
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
                <h1 class="text-3xl font-bold text-sky-700">Kelola Komoditi Pangan</h1>
                <p class="text-slate-500 mt-1">Kelola data pangan dan parameter uji laboratorium</p>
            </div>
            @if(session('admin_role') === 'warna')
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-slate-700 text-white rounded-xl font-semibold hover:bg-slate-800 transition">
                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                    </button>
                </form>
            @else
                <a href="{{ route('admin.upload') }}" class="px-4 py-2 bg-slate-200 text-slate-700 rounded-xl font-semibold hover:bg-slate-300 transition">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
            @endif
        </div>

        <div class="flex flex-wrap gap-2 mb-6">
            <a href="{{ route('admin.obat') }}" class="px-4 py-2 bg-emerald-600 text-white rounded-xl font-semibold hover:bg-emerald-700 transition">Kelola Obat</a>
            <a href="{{ route('admin.otsk') }}" class="px-4 py-2 bg-purple-600 text-white rounded-xl font-semibold hover:bg-purple-700 transition">Kelola OT-SK</a>
            <a href="{{ route('admin.kosmetik') }}" class="px-4 py-2 bg-orange-600 text-white rounded-xl font-semibold hover:bg-orange-700 transition">Kelola Kosmetik</a>
            <a href="{{ route('admin.pangan') }}" class="px-4 py-2 bg-sky-600 text-white rounded-xl font-semibold hover:bg-sky-700 transition">Kelola Pangan</a>
            @if(session('admin_role') === 'utama')
                <a href="{{ route('admin.upload') }}" class="px-4 py-2 bg-blue-900 text-white rounded-xl font-semibold hover:bg-blue-800 transition">Upload Dokumen</a>
            @endif
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
            <!-- Form Tambah Pangan -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100 sticky top-8">
                    <div class="bg-sky-700 px-6 py-5 text-white">
                        <h2 class="text-xl font-bold">Tambah Bahan Produk Pangan</h2>
                        <p class="text-sky-200 text-sm mt-1">Masukkan bahan produk pangan baru</p>
                    </div>

                    <div class="p-6">
                        <form action="{{ route('admin.pangan.store') }}" method="POST" class="space-y-4">
                            @csrf
                            
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1">Bahan Produk</label>
                                <input type="text" name="bahan_produk" required 
                                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-sky-900 focus:border-transparent outline-none"
                                    placeholder="Contoh: Daging Sapi">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1">Waktu Uji (Hari)</label>
                                <input type="number" name="waktu" required 
                                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-sky-900 focus:border-transparent outline-none"
                                    placeholder="Contoh: 5">
                            </div>

                            <button type="submit" class="w-full bg-sky-900 text-white px-6 py-3 rounded-xl font-bold hover:bg-sky-800 transition flex items-center justify-center">
                                <i class="fas fa-plus mr-2"></i>
                                Simpan Bahan Produk
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tabel Data Pangan -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100">
                    <div class="bg-sky-700 px-6 py-5 text-white flex justify-between items-center">
                        <div>
                            <h2 class="text-xl font-bold">Data Komoditi Pangan</h2>
                            <p class="text-sky-200 text-sm mt-1">Daftar pangan yang tersimpan</p>
                        </div>
                        <span class="bg-sky-800 px-3 py-1 rounded-full text-sm font-semibold">{{ $pangans->count() }} items</span>
                    </div>

                    <div class="p-6">
                        <form action="{{ route('admin.pangan') }}" method="GET" class="mb-5">
                            <div class="flex flex-col sm:flex-row gap-3">
                                <div class="relative flex-1">
                                    <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                                    <input
                                        type="text"
                                        name="q"
                                        value="{{ $search ?? '' }}"
                                        placeholder="Cari bahan produk, waktu, parameter, metode, atau keterangan..."
                                        class="w-full pl-9 pr-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-sky-900 focus:border-transparent outline-none text-sm"
                                    >
                                </div>
                                <div class="flex gap-2">
                                    <button type="submit" class="px-4 py-2.5 bg-sky-900 text-white rounded-xl font-semibold hover:bg-sky-800 transition text-sm">
                                        Cari
                                    </button>
                                    @if(!empty($search))
                                        <a href="{{ route('admin.pangan') }}" class="px-4 py-2.5 bg-slate-200 text-slate-700 rounded-xl font-semibold hover:bg-slate-300 transition text-sm">
                                            Reset
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>

                        @if(!empty($search))
                            <p class="text-sm text-slate-600 mb-4">
                                Hasil pencarian untuk: <span class="font-semibold text-slate-800">{{ $search }}</span>
                            </p>
                        @endif

                        @if($pangans->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-slate-200">
                                    <thead class="bg-slate-50">
                                        <tr>
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase">No</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase">Bahan Produk</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase">Waktu Uji</th>
                                            <th class="px-4 py-3 text-center text-xs font-semibold text-slate-600 uppercase">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-200">
                                        @foreach($pangans as $index => $pangan)
                                        <tr class="hover:bg-slate-50 transition">
                                            <td class="px-4 py-3 text-sm text-slate-600">{{ $index + 1 }}</td>
                                            <td class="px-4 py-3">
                                                <div class="font-semibold text-slate-800">{{ $pangan->bahan_produk }}</div>
                                                <!-- always provide toggle so admin can add new parameters even when none exist -->
                                                <button type="button" onclick="toggleParameters({{ $pangan->id_pangan }})" class="text-xs text-emerald-600 font-medium hover:underline">
                                                    {{ $pangan->parameterUjiPangan->count() }} parameter <i class="fas {{ $pangan->parameterUjiPangan->count() ? 'fa-chevron-up' : 'fa-chevron-down' }} ml-1" id="icon-{{ $pangan->id_pangan }}"></i>
                                                </button>
                                            </td>
                                            <td class="px-4 py-3 text-sm text-slate-600">{{ $pangan->waktu }} Hari</td>
                                            <td class="px-4 py-3 text-center">
                                                <div class="flex items-center justify-center space-x-2">
                                                    <button type="button" onclick="openEditModal({{ $pangan->id_pangan }}, {{ \Illuminate\Support\Js::from($pangan->bahan_produk) }}, {{ \Illuminate\Support\Js::from($pangan->waktu) }})" 
                                                        class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button type="button" onclick="openDeleteModal({{ $pangan->id_pangan }}, {{ \Illuminate\Support\Js::from($pangan->bahan_produk) }})" 
                                                        class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Parameter Row (hidden only if no parameters) -->
                                        <tr id="parameter-row-{{ $pangan->id_pangan }}" class="{{ $pangan->parameterUjiPangan && $pangan->parameterUjiPangan->count() ? '' : 'hidden' }} bg-emerald-50">
                                            <td colspan="4" class="px-4 py-4">
                                                <div class="space-y-4">
                                                    <!-- Form Tambah Parameter -->
                                                    <form action="{{ route('admin.parameter-uji-pangan.store') }}" method="POST" class="bg-white p-4 rounded-xl border border-emerald-200">
                                                        @csrf
                                                        <input type="hidden" name="id_pangan" value="{{ $pangan->id_pangan }}">
                                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-3">
                                                            <input type="text" name="parameter_uji" required placeholder="Parameter Uji" class="px-3 py-2 border border-slate-200 rounded-lg text-sm">
                                                            <input type="text" name="metode" required placeholder="Metode" class="px-3 py-2 border border-slate-200 rounded-lg text-sm">
                                                        </div>
                                                        <div class="grid grid-cols-1 md:grid-cols-4 gap-3 mb-3">
                                                            <input type="number" name="minimal_sampel" placeholder="Minimal Sampel" class="px-3 py-2 border border-slate-200 rounded-lg text-sm">
                                                            <input type="text" name="satuan" placeholder="Satuan" class="px-3 py-2 border border-slate-200 rounded-lg text-sm">
                                                            <input type="text" name="keterangan" placeholder="Keterangan" class="px-3 py-2 border border-slate-200 rounded-lg text-sm">
                                                            <input type="number" name="harga" required placeholder="Harga" class="px-3 py-2 border border-slate-200 rounded-lg text-sm">
                                                        </div>
                                                        <button type="submit" class="bg-emerald-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-emerald-700 transition text-sm">
                                                            <i class="fas fa-plus mr-1"></i> Tambah Parameter
                                                        </button>
                                                    </form>

                                                    <!-- Parameter List -->
                                                    @if($pangan->parameterUjiPangan && $pangan->parameterUjiPangan->count() > 0)
                                                    <div class="overflow-hidden rounded border border-slate-200">
                                                        <table class="min-w-full divide-y divide-slate-200">
                                                            <thead class="bg-slate-100">
                                                                <tr>
                                                                    <th class="px-3 py-2 text-left text-xs font-semibold text-slate-600">Parameter Uji</th>
                                                                    <th class="px-3 py-2 text-left text-xs font-semibold text-slate-600">Metode</th>
                                                                    <th class="px-3 py-2 text-left text-xs font-semibold text-slate-600">Minimal Sampel</th>
                                                                    <th class="px-3 py-2 text-left text-xs font-semibold text-slate-600">Satuan</th>
                                                                    <th class="px-3 py-2 text-left text-xs font-semibold text-slate-600">Keterangan</th>
                                                                    <th class="px-3 py-2 text-right text-xs font-semibold text-slate-600">Harga</th>
                                                                    <th class="px-3 py-2 text-center text-xs font-semibold text-slate-600">Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="divide-y divide-slate-100">
                                                                @foreach($pangan->parameterUjiPangan as $param)
                                                                <tr>
                                                                    <td class="px-3 py-2 text-sm text-slate-700">{{ $param->parameter_uji }}</td>
                                                                    <td class="px-3 py-2 text-sm text-slate-700">{{ $param->metode }}</td>
                                                                    <td class="px-3 py-2 text-sm text-slate-700">{{ $param->minimal_sampel ?? '-' }}</td>
                                                                    <td class="px-3 py-2 text-sm text-slate-700">{{ $param->satuan ?? '-' }}</td>
                                                                    <td class="px-3 py-2 text-sm text-slate-700">{{ $param->keterangan ?? '-' }}</td>
                                                                    <td class="px-3 py-2 text-right text-sm font-medium text-sky-700">
                                                                        Rp {{ is_numeric($param->harga) ? number_format((float) $param->harga, 0, ',', '.') : 0 }}
                                                                    </td>
                                                                    <td class="px-3 py-2 text-center">
                                                                        <button type="button" onclick="openEditParamModal({{ $param->id_uji }}, {{ \Illuminate\Support\Js::from($param->parameter_uji) }}, {{ \Illuminate\Support\Js::from($param->metode) }}, {{ \Illuminate\Support\Js::from($param->minimal_sampel) }}, {{ \Illuminate\Support\Js::from($param->satuan) }}, {{ \Illuminate\Support\Js::from($param->keterangan) }}, {{ \Illuminate\Support\Js::from($param->harga) }})" class="text-blue-600 hover:text-blue-800 text-sm mr-2">
                                                                            <i class="fas fa-edit"></i>
                                                                        </button>
                                                                        <button type="button" onclick="openDeleteParamModal({{ $param->id_uji }}, {{ \Illuminate\Support\Js::from($param->parameter_uji) }})" class="text-red-600 hover:text-red-800 text-sm">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
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
                                    <i class="fas fa-utensils text-2xl text-slate-400"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-slate-700 mb-2">Belum ada data pangan</h3>
                                <p class="text-slate-500 text-sm">Tambahkan pangan pertama Anda menggunakan form di samping.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Pangan -->
<div id="editModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 items-center justify-center">
    <div class="relative mx-auto p-6 border w-full max-w-md shadow-2xl rounded-3xl bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-sky-900">Edit Bahan Produk Pangan</h3>
            <button type="button" onclick="closeEditModal()" class="text-slate-400 hover:text-slate-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Bahan Produk</label>
                    <input type="text" id="edit_bahan_produk" name="bahan_produk" required 
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-sky-900 focus:border-transparent outline-none">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Waktu Uji (Hari)</label>
                    <input type="number" id="edit_waktu" name="waktu" required 
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-sky-900 focus:border-transparent outline-none">
                </div>
            </div>
            <div class="flex space-x-3 mt-6">
                <button type="button" onclick="closeEditModal()" class="flex-1 px-4 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold hover:bg-slate-200 transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-3 bg-sky-900 text-white rounded-xl font-bold hover:bg-sky-800 transition">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Delete Pangan -->
<div id="deleteModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 items-center justify-center">
    <div class="relative mx-auto p-6 border w-full max-w-sm shadow-2xl rounded-3xl bg-white">
        <div class="text-center">
            <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-trash-alt text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-800">Hapus Pangan?</h3>
            <p class="text-slate-500 text-sm mt-2 mb-6">
                Pangan <span id="delete_pangan_name" class="font-bold text-slate-800"></span> akan dihapus permanen.
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

<!-- Modal Edit Parameter -->
<div id="editParamModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 items-center justify-center">
    <div class="relative mx-auto p-6 border w-full max-w-5xl max-h-[90vh] overflow-y-auto shadow-2xl rounded-3xl bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-sky-900">Edit Parameter Uji Pangan</h3>
            <button type="button" onclick="closeEditParamModal()" class="text-slate-400 hover:text-slate-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <form id="editParamForm" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Parameter Uji</label>
                    <input type="text" id="edit_param_parameter_uji" name="parameter_uji" required class="w-full px-4 py-3 border border-slate-200 rounded-xl">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Metode</label>
                    <textarea id="edit_param_metode" name="metode" rows="3" required class="w-full px-4 py-3 border border-slate-200 rounded-xl resize-y"></textarea>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Minimal Sampel</label>
                    <input type="number" id="edit_param_minimal_sampel" name="minimal_sampel" class="w-full px-4 py-3 border border-slate-200 rounded-xl">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Satuan</label>
                    <input type="text" id="edit_param_satuan" name="satuan" class="w-full px-4 py-3 border border-slate-200 rounded-xl">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Keterangan</label>
                    <input type="text" id="edit_param_keterangan" name="keterangan" class="w-full px-4 py-3 border border-slate-200 rounded-xl">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Harga</label>
                    <input type="number" id="edit_param_harga" name="harga" required class="w-full px-4 py-3 border border-slate-200 rounded-xl">
                </div>
            </div>
            <div class="flex space-x-3 mt-6">
                <button type="button" onclick="closeEditParamModal()" class="flex-1 px-4 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold">Batal</button>
                <button type="submit" class="flex-1 px-4 py-3 bg-sky-900 text-white rounded-xl font-bold">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Delete Parameter -->
<div id="deleteParamModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 items-center justify-center">
    <div class="relative mx-auto p-6 border w-full max-w-sm shadow-2xl rounded-3xl bg-white">
        <div class="text-center">
            <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-trash-alt text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-800">Hapus Parameter?</h3>
            <p class="text-slate-500 text-sm mt-2 mb-6">
                Parameter <span id="delete_param_name" class="font-bold text-slate-800"></span> akan dihapus permanen.
            </p>
        </div>
        <form id="deleteParamForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex space-x-3">
                <button type="button" onclick="closeDeleteParamModal()" class="flex-1 px-4 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold">Batal</button>
                <button type="submit" class="flex-1 px-4 py-3 bg-red-600 text-white rounded-xl font-bold">Hapus</button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleParameters(id) {
        var row = document.getElementById('parameter-row-' + id);
        var icon = document.getElementById('icon-' + id);
        row.classList.toggle('hidden');
        icon.classList.toggle('fa-chevron-down');
        icon.classList.toggle('fa-chevron-up');
    }

    function openEditModal(id, bahan_produk, waktu) {
        document.getElementById('edit_bahan_produk').value = bahan_produk;
        document.getElementById('edit_waktu').value = waktu;
        document.getElementById('editForm').action = '/admin/pangan/' + id;
        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('editModal').classList.add('flex');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
        document.getElementById('editModal').classList.remove('flex');
    }

    function openDeleteModal(id, nama) {
        document.getElementById('delete_pangan_name').textContent = nama;
        document.getElementById('deleteForm').action = '/admin/pangan/' + id;
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteModal').classList.add('flex');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
        document.getElementById('deleteModal').classList.remove('flex');
    }

    function openEditParamModal(id, parameter_uji, metode, minimal_sampel, satuan, keterangan, harga) {
        document.getElementById('editParamForm').action = '/admin/parameter-uji-pangan/' + id;
        document.getElementById('edit_param_parameter_uji').value = parameter_uji;
        document.getElementById('edit_param_metode').value = metode;
        document.getElementById('edit_param_minimal_sampel').value = minimal_sampel;
        document.getElementById('edit_param_satuan').value = satuan;
        document.getElementById('edit_param_keterangan').value = keterangan;
        document.getElementById('edit_param_harga').value = harga;
        document.getElementById('editParamModal').classList.remove('hidden');
        document.getElementById('editParamModal').classList.add('flex');
    }

    function closeEditParamModal() {
        document.getElementById('editParamModal').classList.add('hidden');
        document.getElementById('editParamModal').classList.remove('flex');
    }

    function openDeleteParamModal(id, nama) {
        document.getElementById('delete_param_name').textContent = nama;
        document.getElementById('deleteParamForm').action = '/admin/parameter-uji-pangan/' + id;
        document.getElementById('deleteParamModal').classList.remove('hidden');
        document.getElementById('deleteParamModal').classList.add('flex');
    }

    function closeDeleteParamModal() {
        document.getElementById('deleteParamModal').classList.add('hidden');
        document.getElementById('deleteParamModal').classList.remove('flex');
    }

    document.getElementById('editModal').addEventListener('click', function(e) {
        if (e.target === this) closeEditModal();
    });

    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) closeDeleteModal();
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
