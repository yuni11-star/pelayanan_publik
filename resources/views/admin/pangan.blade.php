<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pangan - Admin</title>
    
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
                <h1 class="text-3xl font-bold text-sky-700">Kelola Komoditi Pangan</h1>
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

        @if(session('error'))
            <div class="flex items-center bg-red-50 text-red-700 p-4 rounded-2xl mb-6 border border-red-100">
                <i class="fas fa-exclamation-circle mr-3 text-xl"></i>
                <span class="font-medium">{{ session('error') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1">
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100 sticky top-8">
                    <div class="bg-sky-700 px-6 py-5 text-white">
                        <h2 class="text-xl font-bold">Tambah Bahan Produk Pangan</h2>
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

                        <button type="submit" class="w-full bg-sky-900 text-white px-6 py-3 rounded-xl font-bold hover:bg-sky-800 transition flex items-center justify-center">
                            <i class="fas fa-plus mr-2"></i>
                            Simpan Bahan Produk
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="lg:col-span-2">
            <!-- Tabel Data Pangan -->
            <div>
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100">
                    <div class="bg-sky-700 px-6 py-5 text-white flex justify-between items-center">
                        <div>
                            <h2 class="text-xl font-bold">Data Komoditi Pangan</h2>
                        </div>
                        <div class="flex items-center gap-3">
                            <form action="{{ route('admin.pangan') }}" method="GET" class="flex items-center gap-2">
                                <label for="sort-pangan" class="text-sm font-semibold text-white/90">Sort</label>
                                <select id="sort-pangan" name="sort" onchange="this.form.submit()"
                                    class="bg-white border border-white/50 text-slate-800 text-sm rounded-xl px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-white/60">
                                    <option value="new" {{ request()->query('sort', 'new') === 'new' ? 'selected' : '' }}>Terbaru</option>
                                    <option value="az" {{ request()->query('sort', 'new') === 'az' ? 'selected' : '' }}>A-Z</option>
                                </select>
                            </form>
                            <span class="bg-sky-800 px-3 py-1 rounded-full text-sm font-semibold">{{ $pangans->count() }} items</span>
                        </div>
                    </div>

                    <div class="p-6">
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
                                                    {{ $pangan->parameterUjiPangan->count() }} parameter <i class="fas fa-chevron-down ml-1" id="icon-{{ $pangan->id_pangan }}"></i>
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
                                        <!-- Parameter Row (dibuka lagi via sessionStorage setelah aksi simpan) -->
                                        <tr id="parameter-row-{{ $pangan->id_pangan }}" class="hidden bg-emerald-50">
                                            <td colspan="4" class="px-4 py-4">
                                                <div class="space-y-4">
                                                    <!-- Form Tambah Parameter -->
                                                    <form action="{{ route('admin.parameter-uji-pangan.store') }}" method="POST" class="bg-white p-4 rounded-xl border border-emerald-200">
                                                        @csrf
                                                        <input type="hidden" name="id_pangan" value="{{ $pangan->id_pangan }}">
                                                        <div class="grid grid-cols-1 gap-3 mb-3">
                                                            <input type="text" name="parameter_uji" required placeholder="Parameter Uji" class="px-3 py-2 border border-slate-200 rounded-lg text-sm">
                                                        </div>
                                                        <label class="inline-flex items-center gap-2 mb-3 text-sm text-slate-700">
                                                            <input type="checkbox" name="has_multiple_harga_total" value="1" onchange="toggleMultipleHargaTotal(this, 'harga-total-container-{{ $pangan->id_pangan }}', 'harga-total-add-btn-{{ $pangan->id_pangan }}')" class="w-4 h-4 rounded border-slate-300 text-sky-600 focus:ring-sky-500">
                                                            <span>Harga total lebih dari satu</span>
                                                        </label>
                                                        <div id="harga-total-container-{{ $pangan->id_pangan }}" class="mb-3 space-y-3">
                                                            <div class="harga-total-item grid grid-cols-1 md:grid-cols-[220px_minmax(0,1fr)_40px_40px] gap-3 items-center">
                                                                <input type="number" name="harga_total[]" required min="0" step="0.01" placeholder="Harga Total" class="px-3 py-2 border border-slate-200 rounded-lg text-sm">
                                                                <input type="text" name="harga_total_keterangan[]" placeholder="Keterangan Harga Total" class="px-3 py-2 border border-slate-200 rounded-lg text-sm">
                                                                <button type="button" id="harga-total-add-btn-{{ $pangan->id_pangan }}" onclick="addHargaTotal({{ $pangan->id_pangan }})" class="w-10 h-10 bg-sky-600 text-white rounded-lg hover:bg-sky-700 transition inline-flex items-center justify-center hidden" title="Tambah harga total" aria-label="Tambah harga total">
                                                                    <i class="fas fa-plus"></i>
                                                                </button>
                                                                <span class="w-10 h-10"></span>
                                                            </div>
                                                        </div>
                                                        <div id="metode-container-{{ $pangan->id_pangan }}">
                                                            <div class="metode-item grid grid-cols-1 md:grid-cols-[minmax(0,1.6fr)_140px_120px_minmax(0,1fr)_120px_40px] gap-3 mb-3 items-start">
                                                                <textarea name="metode[]" required rows="2" placeholder="Metode" class="px-3 py-2 border border-slate-200 rounded-lg text-sm resize-y min-h-[44px]"></textarea>
                                                                <input type="number" name="metode_sampel_minimal[]" required min="0" step="0.01" placeholder="Min Sampel" class="px-3 py-2 border border-slate-200 rounded-lg text-sm">
                                                                <input type="text" name="metode_satuan[]" required placeholder="Satuan" class="px-3 py-2 border border-slate-200 rounded-lg text-sm">
                                                                <input type="text" name="metode_keterangan[]" placeholder="Keterangan" class="px-3 py-2 border border-slate-200 rounded-lg text-sm">
                                                                <input type="number" name="metode_harga[]" required min="0" step="0.01" placeholder="Harga" class="px-3 py-2 border border-slate-200 rounded-lg text-sm">
                                                                <span class="w-10 h-10"></span>
                                                            </div>
                                                        </div>
                                                        <div class="flex justify-start mb-3">
                                                            <button type="button" onclick="addMetode({{ $pangan->id_pangan }})" class="w-10 h-10 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition inline-flex items-center justify-center" title="Tambah baris metode" aria-label="Tambah baris metode">
                                                                <i class="fas fa-plus"></i>
                                                            </button>
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
                                                                    <th class="px-3 py-2 text-center text-xs font-semibold text-slate-600">List Metode</th>
                                                                    <th class="px-3 py-2 text-right text-xs font-semibold text-slate-600">Harga Total</th>
                                                                    <th class="px-3 py-2 text-center text-xs font-semibold text-slate-600">Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="divide-y divide-slate-100">
                                                                @foreach($pangan->parameterUjiPangan as $param)
                                                                    @php
                                                                        $metodeEditRows = $param->metodeUjiPangan && $param->metodeUjiPangan->count() > 0
                                                                            ? $param->metodeUjiPangan->values()
                                                                            : collect([[
                                                                                'metode' => $param->metode,
                                                                                'sampel_minimal' => $param->minimal_sampel,
                                                                                'satuan' => $param->satuan,
                                                                                'keterangan' => $param->keterangan,
                                                                                'harga' => $param->harga,
                                                                            ]]);
                                                                        $paramPayload = [
                                                                            'id' => $param->id_uji,
                                                                            'parameter_uji' => $param->parameter_uji,
                                                                            'minimal_sampel' => $param->minimal_sampel,
                                                                            'satuan' => $param->satuan,
                                                                            'keterangan' => $param->keterangan,
                                                                            'harga_totals' => $param->hargaTotalPangan->values(),
                                                                            'metodes' => $metodeEditRows,
                                                                        ];
                                                                        $methodsPayload = [
                                                                            'parameter_uji' => $param->parameter_uji,
                                                                            'metodes' => $metodeEditRows,
                                                                        ];
                                                                    @endphp
                                                                        <tr>
                                                                            <td class="px-3 py-2 text-sm text-slate-700">
                                                                                <button type="button" class="w-full text-left text-slate-700 hover:text-sky-800 cursor-pointer group" onclick="openMethodsListModalFromData(this)" title="Klik untuk lihat list metode" data-param='@json($methodsPayload)'>
                                                                                    <span class="font-medium group-hover:underline">{{ $param->parameter_uji }}</span>
                                                                                    <span class="block text-xs text-slate-400 mt-0.5">Klik untuk lihat metode</span>
                                                                                </button>
                                                                            </td>
                                                                            <td class="px-3 py-2 text-center">
                                                                                <button type="button" onclick="openMethodsListModalFromData(this)" class="inline-flex items-center px-3 py-1.5 bg-blue-50 text-blue-700 rounded-lg text-xs font-semibold hover:bg-blue-100" data-param='@json($methodsPayload)'>
                                                                                    <i class="fas fa-list-ul mr-1"></i>Lihat Metode
                                                                                </button>
                                                                            </td>
                                                                            <td class="px-3 py-2 text-right text-sm font-bold text-sky-900">
                                                                                @forelse($param->hargaTotalPangan as $hargaTotal)
                                                                                    <div>
                                                                                        Rp {{ number_format((float) $hargaTotal->harga_total, 0, ',', '.') }}
                                                                                        <div class="text-xs font-normal text-slate-500">{{ $hargaTotal->keterangan ?: '-' }}</div>
                                                                                    </div>
                                                                                @empty
                                                                                    <div>Rp {{ number_format((float) ($param->harga_total ?? 0), 0, ',', '.') }}</div>
                                                                                @endforelse
                                                                            </td>
                                                                            <td class="px-3 py-2 text-center">
                                                                                <button type="button" onclick="openEditParamModalFromData(this)" class="text-blue-600 hover:text-blue-800 text-sm mr-2" data-param='@json($paramPayload)'>
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
            <div class="grid grid-cols-1 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Parameter Uji</label>
                    <input type="text" id="edit_param_parameter_uji" name="parameter_uji" required class="w-full px-4 py-3 border border-slate-200 rounded-xl">
                </div>
            </div>
            <div class="mb-4">
                <div class="mb-2">
                    <label class="block text-sm font-semibold text-slate-700">Daftar Harga Total</label>
                </div>
                <label class="inline-flex items-center gap-2 mb-3 text-sm text-slate-700">
                    <input type="checkbox" id="edit_has_multiple_harga_total" name="has_multiple_harga_total" value="1" onchange="toggleMultipleHargaTotal(this, 'edit-harga-total-container', 'edit-harga-total-add-btn')" class="w-4 h-4 rounded border-slate-300 text-sky-600 focus:ring-sky-500">
                    <span>Harga total lebih dari satu</span>
                </label>
                <div id="edit-harga-total-container" class="space-y-3"></div>
                <div class="flex justify-start mt-3">
                    <button type="button" id="edit-harga-total-add-btn" onclick="addEditHargaTotal()" class="w-10 h-10 bg-sky-600 text-white rounded-lg hover:bg-sky-700 inline-flex items-center justify-center hidden" title="Tambah harga total" aria-label="Tambah harga total">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="mb-4">
                <div class="mb-2">
                    <label class="block text-sm font-semibold text-slate-700">Daftar Metode Uji</label>
                </div>
                <div class="hidden md:grid grid-cols-[minmax(0,1.6fr)_140px_120px_minmax(0,1fr)_120px_40px] gap-3 mb-2 px-1 text-xs font-semibold text-slate-500">
                    <span>Metode</span>
                    <span>Minimal Sampel</span>
                    <span>Satuan</span>
                    <span>Keterangan</span>
                    <span>Harga</span>
                    <span></span>
                </div>
                <div id="edit-metode-container" class="space-y-3"></div>
                <div class="flex justify-start mt-3">
                    <button type="button" onclick="addEditMetode()" class="w-10 h-10 bg-blue-600 text-white rounded-lg hover:bg-blue-700 inline-flex items-center justify-center" title="Tambah baris metode" aria-label="Tambah baris metode">
                        <i class="fas fa-plus"></i>
                    </button>
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
<div id="methodsListModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 items-center justify-center">
    <div class="relative mx-auto p-6 border w-full max-w-4xl max-h-[90vh] overflow-y-auto shadow-2xl rounded-3xl bg-white">
        <div class="flex justify-between items-center mb-4">
            <div>
                <h3 class="text-xl font-bold text-sky-900">List Metode Uji</h3>
                <p id="methods_list_parameter_name" class="text-sm text-slate-500 mt-1"></p>
            </div>
            <button type="button" onclick="closeMethodsListModal()" class="text-slate-400 hover:text-slate-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <div class="overflow-hidden rounded-xl border border-slate-200">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-100">
                    <tr>
                        <th class="px-3 py-2 text-left text-xs font-semibold text-slate-600">Metode</th>
                        <th class="px-3 py-2 text-left text-xs font-semibold text-slate-600">Minimal Sampel</th>
                        <th class="px-3 py-2 text-left text-xs font-semibold text-slate-600">Satuan</th>
                        <th class="px-3 py-2 text-left text-xs font-semibold text-slate-600">Keterangan</th>
                        <th class="px-3 py-2 text-right text-xs font-semibold text-slate-600">Harga</th>
                    </tr>
                </thead>
                <tbody id="methods_list_tbody" class="divide-y divide-slate-100 bg-white"></tbody>
            </table>
        </div>
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

        if (row.classList.contains('hidden')) {
            forgetOpenPanganId(id);
        } else {
            rememberOpenPanganId(id);
        }
    }

    function getOpenPanganIdFromElement(element) {
        var parameterRow = element ? element.closest('[id^="parameter-row-"]') : null;
        return parameterRow ? parameterRow.id.replace('parameter-row-', '') : '';
    }

    function rememberOpenPanganId(id) {
        if (id) {
            sessionStorage.setItem('adminPanganOpenId', id);
        }
    }

    function forgetOpenPanganId(id) {
        if (sessionStorage.getItem('adminPanganOpenId') === String(id)) {
            sessionStorage.removeItem('adminPanganOpenId');
        }
    }

    function rememberOpenPanganFromElement(element) {
        rememberOpenPanganId(getOpenPanganIdFromElement(element));
    }

    function rememberOpenPanganFromActiveElement(fallbackId) {
        rememberOpenPanganId(getOpenPanganIdFromElement(document.activeElement) || fallbackId || '');
    }

    function restoreOpenPanganId() {
        var openPanganId = sessionStorage.getItem('adminPanganOpenId');
        var row = document.getElementById('parameter-row-' + openPanganId);
        if (!openPanganId || !row) return;

        sessionStorage.removeItem('adminPanganOpenId');

        if (row.classList.contains('hidden')) {
            toggleParameters(openPanganId);
        }

        window.setTimeout(function() {
            var target = row.previousElementSibling || row;
            target.scrollIntoView({ behavior: 'auto', block: 'center' });
        }, 250);
    }

    function openEditModal(id, bahan_produk, waktu) {
        rememberOpenPanganId(id);
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

    function renderMetodeRow(container, metode = {}) {
        const newItem = document.createElement('div');
        newItem.className = 'metode-item grid grid-cols-1 md:grid-cols-[minmax(0,1.6fr)_140px_120px_minmax(0,1fr)_120px_40px] gap-3 items-start';
        newItem.innerHTML = `
            <textarea name="metode[]" required rows="2" placeholder="Metode" class="px-3 py-2 border border-slate-200 rounded-lg text-sm resize-y min-h-[44px]"></textarea>
            <input type="number" name="metode_sampel_minimal[]" required min="0" step="0.01" placeholder="Min Sampel" class="px-3 py-2 border border-slate-200 rounded-lg text-sm">
            <input type="text" name="metode_satuan[]" required placeholder="Satuan" class="px-3 py-2 border border-slate-200 rounded-lg text-sm">
            <input type="text" name="metode_keterangan[]" placeholder="Keterangan" class="px-3 py-2 border border-slate-200 rounded-lg text-sm">
            <input type="number" name="metode_harga[]" required min="0" step="0.01" placeholder="Harga" class="px-3 py-2 border border-slate-200 rounded-lg text-sm">
            <button type="button" onclick="removeMetode(this)" class="w-10 h-10 bg-red-500 text-white rounded-lg hover:bg-red-600 inline-flex items-center justify-center" title="Hapus baris metode" aria-label="Hapus baris metode"><i class="fas fa-trash"></i></button>
        `;
        newItem.querySelector('[name="metode[]"]').value = metode.metode || '';
        newItem.querySelector('[name="metode_sampel_minimal[]"]').value = metode.sampel_minimal || '';
        newItem.querySelector('[name="metode_satuan[]"]').value = metode.satuan || '';
        newItem.querySelector('[name="metode_keterangan[]"]').value = metode.keterangan || '';
        newItem.querySelector('[name="metode_harga[]"]').value = metode.harga || '';
        container.appendChild(newItem);
    }

    function renderHargaTotalRow(container, hargaTotal = {}) {
        const newItem = document.createElement('div');
        const addHandler = container.id === 'edit-harga-total-container'
            ? 'addEditHargaTotal()'
            : `addHargaTotal(${container.id.replace('harga-total-container-', '')})`;
        newItem.className = 'harga-total-item grid grid-cols-1 md:grid-cols-[220px_minmax(0,1fr)_40px_40px] gap-3 items-center';
        newItem.innerHTML = `
            <input type="number" name="harga_total[]" required min="0" step="0.01" placeholder="Harga Total" class="px-3 py-2 border border-slate-200 rounded-lg text-sm">
            <input type="text" name="harga_total_keterangan[]" placeholder="Keterangan Harga Total" class="px-3 py-2 border border-slate-200 rounded-lg text-sm">
            <button type="button" onclick="${addHandler}" class="w-10 h-10 bg-sky-600 text-white rounded-lg hover:bg-sky-700 transition inline-flex items-center justify-center" title="Tambah harga total" aria-label="Tambah harga total"><i class="fas fa-plus"></i></button>
            <button type="button" onclick="removeHargaTotal(this)" class="w-10 h-10 bg-red-500 text-white rounded-lg hover:bg-red-600 inline-flex items-center justify-center" title="Hapus harga total" aria-label="Hapus harga total"><i class="fas fa-trash"></i></button>
        `;
        newItem.querySelector('[name="harga_total[]"]').value = hargaTotal.harga_total || '';
        newItem.querySelector('[name="harga_total_keterangan[]"]').value = hargaTotal.keterangan || '';
        container.appendChild(newItem);
    }

    function toggleMultipleHargaTotal(checkbox, containerId, addButtonId) {
        const container = document.getElementById(containerId);
        const addButton = document.getElementById(addButtonId);
        if (!container || !addButton) {
            return;
        }

        const isMultiple = checkbox.checked;
        addButton.classList.toggle('hidden', !isMultiple);

        if (!isMultiple) {
            const rows = Array.from(container.querySelectorAll('.harga-total-item'));
            if (rows.length > 1) {
                rows.slice(1).forEach(function(row) {
                    row.remove();
                });
            }
        }
    }

    function openEditParamModalFromData(element) {
        if (!element || !element.dataset || !element.dataset.param) {
            return;
        }
        rememberOpenPanganFromElement(element);
        const data = JSON.parse(element.dataset.param);
        openEditParamModal(data.id, data.parameter_uji, data.minimal_sampel, data.satuan, data.harga_totals, data.keterangan, data.metodes);
    }

    function openMethodsListModalFromData(element) {
        if (!element || !element.dataset || !element.dataset.param) {
            return;
        }

        const data = JSON.parse(element.dataset.param);
        const tbody = document.getElementById('methods_list_tbody');
        const title = document.getElementById('methods_list_parameter_name');
        title.textContent = data.parameter_uji || '';
        tbody.innerHTML = '';

        const metodeRows = Array.isArray(data.metodes) && data.metodes.length ? data.metodes : [];
        if (!metodeRows.length) {
            tbody.innerHTML = '<tr><td colspan="5" class="px-3 py-4 text-sm text-center text-slate-500">Belum ada metode.</td></tr>';
        } else {
            metodeRows.forEach(function(metode) {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="px-3 py-2 text-sm text-slate-700">${metode.metode || '-'}</td>
                    <td class="px-3 py-2 text-sm text-slate-700">${metode.sampel_minimal || '-'}</td>
                    <td class="px-3 py-2 text-sm text-slate-700">${metode.satuan || '-'}</td>
                    <td class="px-3 py-2 text-sm text-slate-700">${metode.keterangan || '-'}</td>
                    <td class="px-3 py-2 text-sm text-right font-semibold text-sky-700">${metode.harga ? 'Rp ' + Number(metode.harga).toLocaleString('id-ID') : '-'}</td>
                `;
                tbody.appendChild(row);
            });
        }

        document.getElementById('methodsListModal').classList.remove('hidden');
        document.getElementById('methodsListModal').classList.add('flex');
    }

    function closeMethodsListModal() {
        document.getElementById('methodsListModal').classList.add('hidden');
        document.getElementById('methodsListModal').classList.remove('flex');
    }

    function openEditParamModal(id, parameter_uji, minimal_sampel, satuan, hargaTotals, keterangan, metodes) {
        document.getElementById('editParamForm').action = '/admin/parameter-uji-pangan/' + id;
        document.getElementById('edit_param_parameter_uji').value = parameter_uji;
        const hargaTotalContainer = document.getElementById('edit-harga-total-container');
        hargaTotalContainer.innerHTML = '';
        const hargaRows = Array.isArray(hargaTotals) && hargaTotals.length ? hargaTotals : [{}];
        hargaRows.forEach(function(hargaTotal) {
            renderHargaTotalRow(hargaTotalContainer, hargaTotal);
        });
        const hasMultipleHargaTotalCheckbox = document.getElementById('edit_has_multiple_harga_total');
        hasMultipleHargaTotalCheckbox.checked = hargaRows.length > 1;
        toggleMultipleHargaTotal(hasMultipleHargaTotalCheckbox, 'edit-harga-total-container', 'edit-harga-total-add-btn');
        const container = document.getElementById('edit-metode-container');
        container.innerHTML = '';
        const metodeRows = Array.isArray(metodes) && metodes.length ? metodes : [{}];
        metodeRows.forEach(function(metode) {
            renderMetodeRow(container, metode);
        });
        document.getElementById('editParamModal').classList.remove('hidden');
        document.getElementById('editParamModal').classList.add('flex');
    }

    function closeEditParamModal() {
        document.getElementById('editParamModal').classList.add('hidden');
        document.getElementById('editParamModal').classList.remove('flex');
    }

    function openDeleteParamModal(id, nama) {
        rememberOpenPanganFromActiveElement();
        document.getElementById('delete_param_name').textContent = nama;
        document.getElementById('deleteParamForm').action = '/admin/parameter-uji-pangan/' + id;
        document.getElementById('deleteParamModal').classList.remove('hidden');
        document.getElementById('deleteParamModal').classList.add('flex');
    }

    function closeDeleteParamModal() {
        document.getElementById('deleteParamModal').classList.add('hidden');
        document.getElementById('deleteParamModal').classList.remove('flex');
    }

    function addMetode(panganId) {
        const container = document.getElementById('metode-container-' + panganId);
        renderMetodeRow(container);
    }

    function addHargaTotal(panganId) {
        const checkbox = document.querySelector(`input[name="has_multiple_harga_total"][onchange*="harga-total-container-${panganId}"]`);
        if (checkbox) {
            checkbox.checked = true;
            toggleMultipleHargaTotal(checkbox, `harga-total-container-${panganId}`, `harga-total-add-btn-${panganId}`);
        }
        const container = document.getElementById('harga-total-container-' + panganId);
        renderHargaTotalRow(container);
    }

    function addEditHargaTotal() {
        const checkbox = document.getElementById('edit_has_multiple_harga_total');
        if (checkbox) {
            checkbox.checked = true;
            toggleMultipleHargaTotal(checkbox, 'edit-harga-total-container', 'edit-harga-total-add-btn');
        }
        const container = document.getElementById('edit-harga-total-container');
        renderHargaTotalRow(container);
    }

    function addEditMetode() {
        const container = document.getElementById('edit-metode-container');
        renderMetodeRow(container);
    }

    function removeMetode(button) {
        const item = button.closest('.metode-item');
        const container = item.parentElement;
        if (container.querySelectorAll('.metode-item').length > 1) {
            item.remove();
        } else {
            alert('Minimal harus ada satu metode!');
        }
    }

    function removeHargaTotal(button) {
        const item = button.closest('.harga-total-item');
        const container = item.parentElement;
        if (container.querySelectorAll('.harga-total-item').length > 1) {
            item.remove();
        } else {
            alert('Minimal harus ada satu harga total!');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        restoreOpenPanganId();
    });

    document.addEventListener('submit', function(e) {
        const form = e.target;
        if (!form || !form.closest('[id^="parameter-row-"]')) return;
        rememberOpenPanganFromElement(form);
    });

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

    document.getElementById('methodsListModal').addEventListener('click', function(e) {
        if (e.target === this) closeMethodsListModal();
    });
</script>

</body>
</html>
