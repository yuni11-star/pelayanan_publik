<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola OT-SK - Admin</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="{{ asset('images/logo-bpom.png') }}" type="image/png">
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
                <h1 class="text-3xl font-bold text-purple-900">Kelola OT-SK</h1>
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
        </div>

        @if(session('success'))
            <div class="flex items-center bg-emerald-50 text-emerald-700 p-4 rounded-2xl mb-6 border border-emerald-100">
                <i class="fas fa-check-circle mr-3 text-xl"></i>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Form Tambah Tipe Produk -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100 sticky top-8">
                    <div class="bg-purple-700 px-6 py-5 text-white">
                        <h2 class="text-xl font-bold">Tambah Tipe Produk</h2>
                    </div>

                    <div class="p-6">
                        <form action="{{ route('admin.tipe-produk.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Tipe Produk</label>
                                <input
                                    type="text"
                                    name="nama_tipe"
                                    required
                                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-purple-900 focus:border-transparent outline-none"
                                    placeholder="Contoh: Obat Tradisional, Suplemen Kesehatan"
                                >
                            </div>
                            <button type="submit" class="w-full bg-purple-900 text-white px-6 py-3 rounded-xl font-bold hover:bg-purple-800 transition flex items-center justify-center">
                                <i class="fas fa-plus mr-2"></i>
                                Simpan Tipe Produk
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Data OT-SK -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100">
                    <div class="bg-purple-700 px-6 py-5 text-white flex justify-between items-center">
                        <div>
                            <h2 class="text-xl font-bold">Data OT-SK</h2>
                        </div>
                        <div class="flex items-center gap-3">
                            <form action="{{ route('admin.otsk') }}" method="GET" class="flex items-center gap-2">
                                <label for="sort-otsk" class="text-sm font-semibold text-white/90">Sort</label>
                                <select id="sort-otsk" name="sort" onchange="this.form.submit()"
                                    class="bg-white border border-white/50 text-slate-800 text-sm rounded-xl px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-white/60">
                                    <option value="new" {{ request()->query('sort', 'new') === 'new' ? 'selected' : '' }}>Terbaru</option>
                                    <option value="az" {{ request()->query('sort', 'new') === 'az' ? 'selected' : '' }}>A-Z</option>
                                </select>
                            </form>
                            <span class="bg-purple-800 px-3 py-1 rounded-full text-sm font-semibold">{{ $tipeProduks->count() }} items</span>
                        </div>
                    </div>

                    <div class="p-6">
                        @if($tipeProduks->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-slate-200">
                                    <thead class="bg-slate-50">
                                        <tr>
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase">No</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase">Tipe Produk</th>
                                            <th class="px-4 py-3 text-center text-xs font-semibold text-slate-600 uppercase">Aksi</th>
                                        </tr>
                                    </thead>
                                    @foreach($tipeProduks as $index => $tipe)
                                    <tbody class="divide-y divide-slate-200">
                                        <tr onclick="toggleTipe({{ $tipe->id_produk }})" class="hover:bg-slate-50 transition cursor-pointer">
                                            <td class="px-4 py-3 text-sm text-slate-600">{{ $index + 1 }}</td>
                                            <td class="px-4 py-3">
                                                <div class="font-semibold text-slate-800">{{ $tipe->nama_tipe }}</div>
                                                <button type="button" onclick="event.stopPropagation(); toggleTipe({{ $tipe->id_produk }})" class="text-xs text-emerald-600 font-medium hover:underline">
                                                    {{ $tipe->produkKlaims->count() }} klaim <i class="fas fa-chevron-down ml-1" id="icon-tipe-{{ $tipe->id_produk }}"></i>
                                                </button>
                                            </td>
                                            <td class="px-4 py-3 text-center">
                                                <div class="flex items-center justify-center space-x-2">
                                                    <button onclick="event.stopPropagation(); openEditTipeModal({{ $tipe->id_produk }}, '{{ $tipe->nama_tipe }}')" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button onclick="event.stopPropagation(); openDeleteTipeModal({{ $tipe->id_produk }}, '{{ $tipe->nama_tipe }}')" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr id="tipe-row-{{ $tipe->id_produk }}" class="hidden bg-purple-50">
                                            <td colspan="3" class="px-4 py-4">
                                                <div class="space-y-4">
                                                    <!-- Form Tambah Klaim -->
                                                    <form action="{{ route('admin.produk-klaim.store') }}" method="POST" class="bg-white p-4 rounded-xl border border-purple-200">
                                                        @csrf
                                                        <input type="hidden" name="tipe_produk_id" value="{{ $tipe->id_produk }}">
                                                        <div class="flex flex-col md:flex-row gap-3">
                                                            <input type="text" name="nama_klaim" required 
                                                                class="flex-1 px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-purple-900 focus:border-transparent outline-none"
                                                                placeholder="Nama Klaim/Khasiat">
                                                            <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded-lg font-semibold hover:bg-purple-700 transition text-sm">
                                                                <i class="fas fa-plus mr-1"></i>Tambah Klaim
                                                            </button>
                                                        </div>
                                                    </form>

                                                    <!-- Klaim List -->
                                                    @foreach($tipe->produkKlaims as $klaim)
                                                    <div class="bg-white p-4 rounded-xl border border-purple-200">
                                                        <div class="flex justify-between items-center mb-3">
                                                            <h3 class="font-semibold text-purple-900">{{ $klaim->nama_klaim }}</h3>
                                                            <div class="flex items-center space-x-2">
                                                                <button onclick="toggleKlaim({{ $klaim->id_klaim }})" class="px-2 py-1 bg-purple-100 rounded text-xs text-purple-800 hover:bg-purple-200 transition">
                                                                    <i class="fas fa-chevron-down" id="icon-klaim-{{ $klaim->id_klaim }}"></i> Parameter
                                                                </button>
                                                                <button onclick="openEditKlaimModal({{ $klaim->id_klaim }}, '{{ $klaim->nama_klaim }}')" class="text-blue-600 hover:text-blue-800 text-sm" title="Edit">
                                                                    <i class="fas fa-edit"></i>
                                                                </button>
                                                                <button onclick="openDeleteKlaimModal({{ $klaim->id_klaim }}, '{{ $klaim->nama_klaim }}')" class="text-red-600 hover:text-red-800 text-sm" title="Hapus">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <!-- Hidden Parameter Content -->
                                                        <div id="klaim-content-{{ $klaim->id_klaim }}" class="p-3 bg-slate-50 rounded-lg hidden">
                                                            <!-- Form Tambah Parameter -->
                                                            <form action="{{ route('admin.parameter-uji-otsk.store') }}" method="POST" class="mb-4">
                                                                @csrf
                                                                <input type="hidden" name="id_klaim" value="{{ $klaim->id_klaim }}">
                                                                <input type="text" name="parameter_uji" required 
                                                                    class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm mb-2"
                                                                    placeholder="Nama Parameter Uji">
                                                                <button type="submit" class="w-full bg-emerald-600 text-white py-2 rounded-lg font-semibold hover:bg-emerald-700 transition text-sm">
                                                                    <i class="fas fa-plus mr-1"></i> Tambah Parameter
                                                                </button>
                                                            </form>

                                                            <!-- Parameter List -->
                                                            @foreach($klaim->parameterUjiOtsk as $param)
                                                            <div class="border border-emerald-200 rounded-lg mb-3 overflow-hidden bg-white">
                                                                <div onclick="toggleMetode({{ $param->id_uji }})" class="bg-emerald-50 px-3 py-2 flex justify-between items-center cursor-pointer hover:bg-emerald-100 transition">
                                                                    <span class="font-medium text-emerald-800">{{ $param->parameter_uji }}</span>
                                                                    <div class="flex items-center space-x-2">
                                                                        <button onclick="event.stopPropagation(); openEditParamModal({{ $param->id_uji }}, '{{ $param->parameter_uji }}')" class="text-blue-600 hover:text-blue-800">
                                                                            <i class="fas fa-edit"></i>
                                                                        </button>
                                                                        <button onclick="event.stopPropagation(); openDeleteParamModal({{ $param->id_uji }}, '{{ $param->parameter_uji }}')" class="text-red-500 hover:text-red-700">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>

                                                                <!-- Hidden Metode Content -->
                                                                <div id="metode-content-{{ $param->id_uji }}" class="p-3 hidden">
                                                                    <!-- Form Tambah Metode -->
                                                                    <form action="{{ route('admin.metode-uji-otsk.store') }}" method="POST" class="mb-3 p-2 bg-white rounded border">
                                                                        @csrf
                                                                        <input type="hidden" name="id_uji" value="{{ $param->id_uji }}">
                                                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mb-2">
                                                                            <select name="sediaan" required class="px-2 py-1 border rounded text-sm">
                                                                                <option value="">-- Sediaan --</option>
                                                                                <option value="Padat">Padat</option>
                                                                                <option value="Cair">Cair</option>
                                                                                <option value="Padat dan Cair">Padat dan Cair</option>
                                                                                <option value="Kapsul Lunak">Kapsul Lunak</option>
                                                                            </select>
                                                                            <input type="text" name="pustaka" required placeholder="Pustaka" class="px-2 py-1 border rounded text-sm">
                                                                            <select name="teknik_analisis" required class="px-2 py-1 border rounded text-sm">
                                                                                <option value="">-- Teknik Analisis --</option>
                                                                                <option value="KLT-Spektrofotodensitometri-KCKT">KLT-Spektrofotodensitometri-KCKT</option>
                                                                                <option value="KCKT">KCKT</option>
                                                                                <option value="KLT-Densitometri">KLT-Densitometri</option>
                                                                                <option value="KG">KG</option>
                                                                                <option value="KLT-KCKT">KLT-KCKT</option>
                                                                                <option value="SPE-KCKT">SPE-KCKT</option>
                                                                                <option value="KLT-Spektrofotodensitometri">KLT-Spektrofotodensitometri</option>
                                                                                <option value="GC">GC</option>
                                                                                <option value="AAS-HVG">AAS-HVG</option>
                                                                                <option value="AAS-GF">AAS-GF</option>
                                                                                <option value="GC-MS">GC-MS</option>
                                                                            </select>
                                                                            <input type="text" name="metode_uji" required placeholder="Metode Uji" class="px-2 py-1 border rounded text-sm">
                                                                        </div>
                                                                        <div class="flex gap-2">
                                                                            <input type="number" name="jumlah_sampel" required placeholder="Jml Sampel" min="1" class="flex-1 px-2 py-1 border rounded text-sm">
                                                                            <select name="satuan_sampel" required class="flex-1 px-2 py-1 border rounded text-sm">
                                                                                <option value="">-- Satuan --</option>
                                                                                <option value="gram">gram</option>
                                                                                <option value="mL">mL</option>
                                                                                <option value="dosis">dosis</option>
                                                                                <option value="mg">mg</option>
                                                                                <option value="mg"> Kapsul/Tablet</option>
                                                                            </select>
                                                                            <button type="submit" class="px-3 bg-emerald-600 text-white rounded text-sm hover:bg-emerald-700">+</button>
                                                                        </div>
                                                                    </form>

                                                                    <!-- Metode List -->
                                                                    @foreach($param->metodeUjiOtsk as $metode)
                                                                    <div class="flex justify-between items-center p-2 bg-slate-50 rounded mb-1 text-sm">
                                                                        <div>
                                                                            <span class="font-medium text-purple-700">{{ $metode->sediaan }}</span>
                                                                            <span class="text-slate-500">| {{ $metode->pustaka }}</span>
                                                                            <span class="text-slate-500">| {{ $metode->teknik_analisis }}</span>
                                                                            <span class="text-slate-500">| {{ $metode->metode_uji }}</span>
                                                                            <span class="text-slate-500">| {{ $metode->jumlah_sampel }} {{ $metode->satuan_sampel }}</span>
                                                                        </div>
                                                                        <div class="flex space-x-2">
                                                                            <button onclick="openEditMetodeModal({{ $metode->id_sediaan }}, '{{ $metode->sediaan }}', '{{ $metode->pustaka }}', '{{ $metode->teknik_analisis }}', '{{ $metode->metode_uji }}', {{ $metode->jumlah_sampel }}, '{{ $metode->satuan_sampel }}')" class="text-blue-600 hover:text-blue-800">
                                                                                <i class="fas fa-edit"></i>
                                                                            </button>
                                                                            <form action="{{ route('admin.metode-uji-otsk.delete', $metode->id_sediaan) }}" method="POST" class="inline">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Hapus metode ini?')">
                                                                                    <i class="fas fa-trash"></i>
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        @else
                            <div class="text-center py-12">
                                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-leaf text-2xl text-purple-400"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-slate-700 mb-2">Belum ada data OT-SK</h3>
                                <p class="text-slate-500 text-sm">Tambahkan tipe produk pertama Anda menggunakan form di samping.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>    </div>
</div>

<!-- Modal Edit Tipe Produk -->
<div id="editTipeModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center">
    <div class="relative mx-auto p-6 border w-full max-w-md shadow-2xl rounded-3xl bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-purple-900">Edit Tipe Produk</h3>
            <button onclick="closeEditTipeModal()" class="text-slate-400 hover:text-slate-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <form id="editTipeForm" method="POST">
            @csrf
            @method('PUT')
            <input type="text" id="edit_tipe_nama" name="nama_tipe" required class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-purple-900 outline-none">
            <div class="flex space-x-3 mt-6">
                <button type="button" onclick="closeEditTipeModal()" class="flex-1 px-4 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold">Batal</button>
                <button type="submit" class="flex-1 px-4 py-3 bg-purple-900 text-white rounded-xl font-bold">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Delete Tipe Produk -->
<div id="deleteTipeModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center">
    <div class="relative mx-auto p-6 border w-full max-w-sm shadow-2xl rounded-3xl bg-white">
        <div class="text-center">
            <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-trash-alt text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-800">Hapus Tipe Produk?</h3>
            <p class="text-slate-500 text-sm mt-2 mb-6">
                <span id="delete_tipe_name" class="font-bold text-slate-800"></span> akan dihapus permanen.
            </p>
        </div>
        <form id="deleteTipeForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex space-x-3">
                <button type="button" onclick="closeDeleteTipeModal()" class="flex-1 px-4 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold">Batal</button>
                <button type="submit" class="flex-1 px-4 py-3 bg-red-600 text-white rounded-xl font-bold">Hapus</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Klaim -->
<div id="editKlaimModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center">
    <div class="relative mx-auto p-6 border w-full max-w-md shadow-2xl rounded-3xl bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-purple-900">Edit Klaim</h3>
            <button onclick="closeEditKlaimModal()" class="text-slate-400 hover:text-slate-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <form id="editKlaimForm" method="POST">
            @csrf
            @method('PUT')
            <input type="text" id="edit_klaim_nama" name="nama_klaim" required class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-purple-900 outline-none">
            <div class="flex space-x-3 mt-6">
                <button type="button" onclick="closeEditKlaimModal()" class="flex-1 px-4 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold">Batal</button>
                <button type="submit" class="flex-1 px-4 py-3 bg-purple-900 text-white rounded-xl font-bold">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Delete Klaim -->
<div id="deleteKlaimModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center">
    <div class="relative mx-auto p-6 border w-full max-w-sm shadow-2xl rounded-3xl bg-white">
        <div class="text-center">
            <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-trash-alt text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-800">Hapus Klaim?</h3>
            <p class="text-slate-500 text-sm mt-2 mb-6">
                <span id="delete_klaim_name" class="font-bold text-slate-800"></span> akan dihapus permanen.
            </p>
        </div>
        <form id="deleteKlaimForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex space-x-3">
                <button type="button" onclick="closeDeleteKlaimModal()" class="flex-1 px-4 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold">Batal</button>
                <button type="submit" class="flex-1 px-4 py-3 bg-red-600 text-white rounded-xl font-bold">Hapus</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Parameter -->
<div id="editParamModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center">
    <div class="relative mx-auto p-6 border w-full max-w-md shadow-2xl rounded-3xl bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-emerald-900">Edit Parameter Uji</h3>
            <button onclick="closeEditParamModal()" class="text-slate-400 hover:text-slate-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <form id="editParamForm" method="POST">
            @csrf
            @method('PUT')
            <input type="text" id="edit_param_nama" name="parameter_uji" required class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-emerald-900 outline-none">
            <div class="flex space-x-3 mt-6">
                <button type="button" onclick="closeEditParamModal()" class="flex-1 px-4 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold">Batal</button>
                <button type="submit" class="flex-1 px-4 py-3 bg-emerald-600 text-white rounded-xl font-bold">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Delete Parameter -->
<div id="deleteParamModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center">
    <div class="relative mx-auto p-6 border w-full max-w-sm shadow-2xl rounded-3xl bg-white">
        <div class="text-center">
            <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-trash-alt text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-800">Hapus Parameter Uji?</h3>
            <p class="text-slate-500 text-sm mt-2 mb-6">
                <span id="delete_param_name" class="font-bold text-slate-800"></span> akan dihapus permanen.
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

<!-- Modal Edit Metode -->
<div id="editMetodeModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center">
    <div class="relative mx-auto p-6 border w-full max-w-md shadow-2xl rounded-3xl bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-blue-900">Edit Metode Uji</h3>
            <button onclick="closeEditMetodeModal()" class="text-slate-400 hover:text-slate-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <form id="editMetodeForm" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-3">
                <select id="edit_metode_sediaan" name="sediaan" required class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-900 outline-none">
                    <option value="">-- Sediaan --</option>
                    <option value="Padat">Padat</option>
                    <option value="Cair">Cair</option>
                    <option value="Padat dan Cair">Padat dan Cair</option>
                    <option value="Kapsul Lunak">Kapsul Lunak</option>
                </select>
                <input type="text" id="edit_metode_pustaka" name="pustaka" required placeholder="Pustaka" class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-900 outline-none">
                <select id="edit_metode_teknik" name="teknik_analisis" required class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-900 outline-none">
                    <option value="">-- Teknik Analisis --</option>
                    <option value="KLT-Spektrofotodensitometri-KCKT">KLT-Spektrofotodensitometri-KCKT</option>
                    <option value="KCKT">KCKT</option>
                    <option value="KLT-Densitometri">KLT-Densitometri</option>
                    <option value="KG">KG</option>
                    <option value="KLT-KCKT">KLT-KCKT</option>
                    <option value="SPE-KCKT">SPE-KCKT</option>
                    <option value="KLT-Spektrofotodensitometri">KLT-Spektrofotodensitometri</option>
                    <option value="GC">GC</option>
                    <option value="AAS-HVG">AAS-HVG</option>
                    <option value="AAS-GF">AAS-GF</option>
                    <option value="GC-MS">GC-MS</option>
                </select>
                <input type="text" id="edit_metode_nama" name="metode_uji" required placeholder="Metode Uji" class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-900 outline-none">
                <div class="flex gap-3">
                    <input type="number" id="edit_metode_jumlah" name="jumlah_sampel" required min="1" placeholder="Jumlah Sampel" class="w-1/2 px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-900 outline-none">
                    <select id="edit_metode_satuan" name="satuan_sampel" required class="w-1/2 px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-900 outline-none">
                        <option value="">-- Satuan --</option>
                        <option value="gram">gram</option>
                        <option value="mL">mL</option>
                        <option value="dosis">dosis</option>
                        <option value="mg">mg</option>
                        <option value="mg">Kapsul/Tablet</option>
                    </select>
                </div>
            </div>
            <div class="flex space-x-3 mt-6">
                <button type="button" onclick="closeEditMetodeModal()" class="flex-1 px-4 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold">Batal</button>
                <button type="submit" class="flex-1 px-4 py-3 bg-blue-900 text-white rounded-xl font-bold">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Toggle Functions
    function toggleTipe(id) {
        const content = document.getElementById('tipe-row-' + id);
        const icon = document.getElementById('icon-tipe-' + id);
        content.classList.toggle('hidden');
        icon.classList.toggle('fa-chevron-down');
        icon.classList.toggle('fa-chevron-up');
    }

    function toggleKlaim(id) {
        const content = document.getElementById('klaim-content-' + id);
        const icon = document.getElementById('icon-klaim-' + id);
        content.classList.toggle('hidden');
        icon.classList.toggle('fa-chevron-down');
        icon.classList.toggle('fa-chevron-up');
    }

    function toggleMetode(id) {
        const content = document.getElementById('metode-content-' + id);
        const icon = document.getElementById('icon-metode-' + id);
        content.classList.toggle('hidden');
        if (icon) {
            icon.classList.toggle('fa-chevron-down');
            icon.classList.toggle('fa-chevron-up');
        }
    }

    function getIdFromElementId(element, prefix) {
        return element && element.id ? element.id.replace(prefix, '') : '';
    }

    function getOpenOtskStateFromElement(element) {
        const tipeRow = element ? element.closest('[id^="tipe-row-"]') : null;
        const klaimContent = element ? element.closest('[id^="klaim-content-"]') : null;
        const metodeContent = element ? element.closest('[id^="metode-content-"]') : null;

        return {
            tipeId: getIdFromElementId(tipeRow, 'tipe-row-'),
            klaimId: getIdFromElementId(klaimContent, 'klaim-content-'),
            metodeId: getIdFromElementId(metodeContent, 'metode-content-')
        };
    }

    function rememberOpenOtskState(state) {
        if (!state || (!state.tipeId && !state.klaimId && !state.metodeId)) return;
        sessionStorage.setItem('adminOtskOpenState', JSON.stringify(state));
    }

    function rememberOpenOtskFromElement(element) {
        rememberOpenOtskState(getOpenOtskStateFromElement(element));
    }

    function rememberOpenOtskFromActiveElement(fallbackState) {
        const activeState = getOpenOtskStateFromElement(document.activeElement);
        rememberOpenOtskState({
            tipeId: activeState.tipeId || (fallbackState ? fallbackState.tipeId : ''),
            klaimId: activeState.klaimId || (fallbackState ? fallbackState.klaimId : ''),
            metodeId: activeState.metodeId || (fallbackState ? fallbackState.metodeId : '')
        });
    }

    function openHiddenOtskDropdown(id, rowPrefix, toggleCallback) {
        const element = document.getElementById(rowPrefix + id);
        if (!id || !element) return null;

        if (element.classList.contains('hidden')) {
            toggleCallback(id);
        }

        return element;
    }

    function getOtskScrollTarget(state, tipeRow, klaimContent, metodeContent) {
        if (state.metodeId && metodeContent) return metodeContent.previousElementSibling || metodeContent;
        if (state.klaimId && klaimContent) return klaimContent.previousElementSibling || klaimContent;
        if (state.tipeId && tipeRow) return tipeRow.previousElementSibling || tipeRow;

        return tipeRow || klaimContent || metodeContent;
    }

    function restoreOpenOtskState() {
        const storedState = sessionStorage.getItem('adminOtskOpenState');
        if (!storedState) return;

        sessionStorage.removeItem('adminOtskOpenState');

        let state = {};
        try {
            state = JSON.parse(storedState);
        } catch (error) {
            return;
        }

        const tipeRow = openHiddenOtskDropdown(state.tipeId, 'tipe-row-', toggleTipe);
        const klaimContent = openHiddenOtskDropdown(state.klaimId, 'klaim-content-', toggleKlaim);
        const metodeContent = openHiddenOtskDropdown(state.metodeId, 'metode-content-', toggleMetode);

        window.setTimeout(function() {
            const target = getOtskScrollTarget(state, tipeRow, klaimContent, metodeContent);
            if (target) {
                target.scrollIntoView({ behavior: 'auto', block: 'center' });
            }
        }, 250);
    }

    // Modal Functions - Tipe Produk
    function openEditTipeModal(id, nama) {
        rememberOpenOtskState({ tipeId: id });
        document.getElementById('edit_tipe_nama').value = nama;
        document.getElementById('editTipeForm').action = '/admin/tipe-produk/' + id;
        document.getElementById('editTipeModal').classList.remove('hidden');
    }
    function closeEditTipeModal() { document.getElementById('editTipeModal').classList.add('hidden'); }

    function openDeleteTipeModal(id, nama) {
        document.getElementById('delete_tipe_name').textContent = nama;
        document.getElementById('deleteTipeForm').action = '/admin/tipe-produk/' + id;
        document.getElementById('deleteTipeModal').classList.remove('hidden');
    }
    function closeDeleteTipeModal() { document.getElementById('deleteTipeModal').classList.add('hidden'); }

    // Modal Functions - Klaim
    function openEditKlaimModal(id, nama) {
        rememberOpenOtskFromActiveElement();
        document.getElementById('edit_klaim_nama').value = nama;
        document.getElementById('editKlaimForm').action = '/admin/produk-klaim/' + id;
        document.getElementById('editKlaimModal').classList.remove('hidden');
    }
    function closeEditKlaimModal() { document.getElementById('editKlaimModal').classList.add('hidden'); }

    function openDeleteKlaimModal(id, nama) {
        rememberOpenOtskFromActiveElement();
        document.getElementById('delete_klaim_name').textContent = nama;
        document.getElementById('deleteKlaimForm').action = '/admin/produk-klaim/' + id;
        document.getElementById('deleteKlaimModal').classList.remove('hidden');
    }
    function closeDeleteKlaimModal() { document.getElementById('deleteKlaimModal').classList.add('hidden'); }

    // Modal Functions - Parameter
    function openEditParamModal(id, nama) {
        rememberOpenOtskFromActiveElement();
        document.getElementById('edit_param_nama').value = nama;
        document.getElementById('editParamForm').action = '/admin/parameter-uji-otsk/' + id;
        document.getElementById('editParamModal').classList.remove('hidden');
    }
    function closeEditParamModal() { document.getElementById('editParamModal').classList.add('hidden'); }

    function openDeleteParamModal(id, nama) {
        rememberOpenOtskFromActiveElement();
        document.getElementById('delete_param_name').textContent = nama;
        document.getElementById('deleteParamForm').action = '/admin/parameter-uji-otsk/' + id;
        document.getElementById('deleteParamModal').classList.remove('hidden');
    }
    function closeDeleteParamModal() { document.getElementById('deleteParamModal').classList.add('hidden'); }

    // Modal Functions - Metode
    function openEditMetodeModal(id, sediaan, pustaka, teknik, nama, jumlah, satuan) {
        rememberOpenOtskFromActiveElement();
        document.getElementById('edit_metode_sediaan').value = sediaan;
        document.getElementById('edit_metode_pustaka').value = pustaka;
        document.getElementById('edit_metode_teknik').value = teknik;
        document.getElementById('edit_metode_nama').value = nama;
        document.getElementById('edit_metode_jumlah').value = jumlah;
        document.getElementById('edit_metode_satuan').value = satuan;
        document.getElementById('editMetodeForm').action = '/admin/metode-uji-otsk/' + id;
        document.getElementById('editMetodeModal').classList.remove('hidden');
    }
    function closeEditMetodeModal() { document.getElementById('editMetodeModal').classList.add('hidden'); }

    document.addEventListener('DOMContentLoaded', function() {
        restoreOpenOtskState();
    });

    document.addEventListener('submit', function(e) {
        const form = e.target;
        if (!form || !form.closest('[id^="tipe-row-"]')) return;
        rememberOpenOtskFromElement(form);
    });

    // Close modals when clicking outside
    document.querySelectorAll('.fixed').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
            }
        });
    });
</script>

</body>
</html>

