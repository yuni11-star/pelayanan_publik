<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Obat - Admin</title>
    
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
                <h1 class="text-3xl font-bold text-blue-900">Kelola Obat</h1>
                <p class="text-slate-500 mt-1">Kelola data obat dan parameter uji laboratorium</p>
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

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Form Tambah Obat -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100 sticky top-8">
                    <div class="bg-blue-900 px-6 py-5 text-white">
                        <h2 class="text-xl font-bold">Tambah Obat Baru</h2>
                        <p class="text-blue-200 text-sm mt-1">Masukkan data obat</p>
                    </div>

                    <div class="p-6">
                        <form action="{{ route('admin.obat.store') }}" method="POST" class="space-y-4">
                            @csrf
                            
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Zat Aktif</label>
                                <input type="text" name="zat_aktif" required 
                                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-900 focus:border-transparent outline-none"
                                    placeholder="Contoh: Paracetamol">
                            </div>

                            <div><!--  -->
                                <label class="block text-sm font-semibold text-slate-700 mb-1">Jenis Sediaan</label>
                                <input type="text" name="jenis_sediaan" required 
                                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-900 focus:border-transparent outline-none"
                                    placeholder="Contoh: Sirup, Tablet, Kapsul">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1">Bentuk Sediaan</label>
                                <input type="text" name="bentuk_sediaan" required 
                                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-900 focus:border-transparent outline-none"
                                    placeholder="Contoh: Cair, Padat">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1">Harga Total (Rp)</label>
                                <input type="number" name="harga_total" required min="0" step="0.01"
                                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-900 focus:border-transparent outline-none"
                                    placeholder="Contoh: 150000">
                            </div>

                            <button type="submit" class="w-full bg-blue-900 text-white px-6 py-3 rounded-xl font-bold hover:bg-blue-800 transition flex items-center justify-center">
                                <i class="fas fa-plus mr-2"></i>
                                Simpan Obat
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tabel Data Obat -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100">
                    <div class="bg-blue-900 px-6 py-5 text-white flex justify-between items-center">
                        <div>
                            <h2 class="text-xl font-bold">Data Obat</h2>
                            <p class="text-blue-200 text-sm mt-1">Daftar obat yang tersimpan</p>
                        </div>
                        <span class="bg-blue-800 px-3 py-1 rounded-full text-sm font-semibold">{{ $obats->count() }} items</span>
                    </div>

                    <div class="p-6">
                        @if($obats->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-slate-200">
                                    <thead class="bg-slate-50">
                                        <tr>
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase">No</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase">Zat Aktif</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase">Jenis Sediaan</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase">Bentuk</th>
                                            <th class="px-4 py-3 text-right text-xs font-semibold text-slate-600 uppercase">Harga Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-200">
                                        @foreach($obats as $index => $obat)
                                        <tr class="hover:bg-slate-50 transition cursor-pointer" onclick="toggleParameter({{ $obat->id_obat }})">
                                            <td class="px-4 py-3 text-sm text-slate-600">{{ $index + 1 }}</td>
                                            <td class="px-4 py-3">
                                                <div class="font-semibold text-slate-800">{{ $obat->zat_aktif }}</div>
                                                <span class="text-xs text-blue-600 font-medium">
                                                    <i class="fas fa-chevron-down ml-1" id="icon-{{ $obat->id_obat }}"></i>
                                                    {{ $obat->parameters->count() }} parameter
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 text-sm text-slate-600">{{ $obat->jenis_sediaan }}</td>
                                            <td class="px-4 py-3 text-sm text-slate-600">{{ $obat->bentuk_sediaan }}</td>
                                            <td class="px-4 py-3 text-right">
                                                <span class="font-semibold text-blue-900">
                                                    Rp {{ number_format($obat->harga_total ?? 0, 0, ',', '.') }}
                                                </span>
                                            </td>
                                        </tr>
                                        <!-- Detail & Parameter Uji Row (Hidden by default) -->
                                        <tr id="parameter-row-{{ $obat->id_obat }}" class="hidden bg-slate-50">
                                            <td colspan="5" class="px-4 py-4">
                                                <div class="space-y-4">

                                                    <!-- Detail Obat Card -->
                                                    <div class="bg-blue-50 p-4 rounded-xl border border-blue-200">
                                                        <div class="flex justify-between items-start">
                                                            <div class="flex-1">
                                                                <h4 class="font-bold text-blue-900 text-sm mb-3 flex items-center">
                                                                    <i class="fas fa-pills mr-2"></i>Detail Obat
                                                                </h4>
                                                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                                                                    <div>
                                                                        <span class="text-slate-500 text-xs uppercase font-semibold">Zat Aktif</span>
                                                                        <p class="font-semibold text-slate-800 mt-0.5">{{ $obat->zat_aktif }}</p>
                                                                    </div>
                                                                    <div>
                                                                        <span class="text-slate-500 text-xs uppercase font-semibold">Jenis Sediaan</span>
                                                                        <p class="font-semibold text-slate-800 mt-0.5">{{ $obat->jenis_sediaan }}</p>
                                                                    </div>
                                                                    <div>
                                                                        <span class="text-slate-500 text-xs uppercase font-semibold">Bentuk Sediaan</span>
                                                                        <p class="font-semibold text-slate-800 mt-0.5">{{ $obat->bentuk_sediaan }}</p>
                                                                    </div>
                                                                    <div>
                                                                        <span class="text-slate-500 text-xs uppercase font-semibold">Harga Total</span>
                                                                        <p class="font-bold text-blue-900 mt-0.5">Rp {{ number_format($obat->harga_total ?? 0, 0, ',', '.') }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="flex space-x-2 ml-4 flex-shrink-0">
                                                                <button onclick="openEditModal({{ $obat->id_obat }}, '{{ addslashes($obat->zat_aktif) }}', '{{ addslashes($obat->jenis_sediaan) }}', '{{ addslashes($obat->bentuk_sediaan) }}', {{ $obat->harga_total ?? 0 }})" 
                                                                    class="px-3 py-1.5 bg-blue-600 text-white rounded-lg text-xs font-semibold hover:bg-blue-700 transition flex items-center">
                                                                    <i class="fas fa-edit mr-1"></i>Edit
                                                                </button>
                                                                <button onclick="openDeleteModal({{ $obat->id_obat }}, '{{ addslashes($obat->zat_aktif) }}')" 
                                                                    class="px-3 py-1.5 bg-red-600 text-white rounded-lg text-xs font-semibold hover:bg-red-700 transition flex items-center">
                                                                    <i class="fas fa-trash mr-1"></i>Hapus
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Form Tambah Parameter Uji -->
                                                    <form action="{{ route('admin.parameter-uji.store') }}" method="POST" class="bg-white p-4 rounded-xl border border-emerald-200">
                                                        @csrf
                                                        <input type="hidden" name="id_obat" value="{{ $obat->id_obat }}">
                                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-3">
                                                            <div>
                                                                <input type="text" name="parameter_uji" required placeholder="Parameter Uji" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                                                            </div>
                                                            <div>
                                                                <input type="text" name="metode_uji" required placeholder="Metode Uji" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                                                            </div>
                                                        </div>
                                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-3">
                                                            <div>
                                                                <input type="number" name="jumlah_minimal" min="0" step="0.01" placeholder="Jumlah Minimal" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                                                            </div>
                                                            <div>
                                                                <input type="text" name="satuan" required placeholder="Satuan" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                                                            </div>
                                                            <div>
                                                                <input type="number" name="harga" required min="0" step="0.01" placeholder="Harga (Rp)" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="w-full bg-emerald-600 text-white py-2 px-4 rounded-lg font-semibold hover:bg-emerald-700 transition text-sm">
                                                            <i class="fas fa-plus mr-1"></i> Tambah Parameter
                                                        </button>
                                                    </form>

                                                    <!-- Tabel Parameter Uji -->
                                                    @if($obat->parameters->count() > 0)
                                                    <div class="overflow-hidden rounded-xl border border-emerald-200">
                                                        <table class="min-w-full divide-y divide-emerald-200 bg-white">
                                                            <thead class="bg-emerald-100">
                                                                <tr>
                                                                    <th class="px-3 py-2 text-left text-xs font-semibold text-emerald-800">Parameter</th>
                                                                    <th class="px-3 py-2 text-left text-xs font-semibold text-emerald-800">Metode Uji</th>
                                                                    <th class="px-3 py-2 text-center text-xs font-semibold text-emerald-800">Jumlah Min.</th>
                                                                    <th class="px-3 py-2 text-center text-xs font-semibold text-emerald-800">Satuan</th>
                                                                    <th class="px-3 py-2 text-right text-xs font-semibold text-emerald-800">Harga</th>
                                                                    <th class="px-3 py-2 text-center text-xs font-semibold text-emerald-800">Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="divide-y divide-emerald-100">
                                                                @foreach($obat->parameters as $param)
                                                                <tr>
                                                                    <td class="px-3 py-2 text-sm text-slate-700">{{ $param->parameter_uji }}</td>
                                                                    <td class="px-3 py-2 text-sm text-slate-700">{{ $param->metode_uji }}</td>
                                                                    <td class="px-3 py-2 text-sm text-center text-slate-700">{{ $param->jumlah_minimal }}</td>
                                                                    <td class="px-3 py-2 text-sm text-center text-slate-700">{{ $param->satuan }}</td>
                                                                    <td class="px-3 py-2 text-sm text-right font-semibold text-blue-900">Rp {{ number_format($param->harga, 0, ',', '.') }}</td>
                                                                    <td class="px-3 py-2 text-center">
                                                                        <button onclick="openEditParamModal({{ $param->id_parameter }}, '{{ $param->parameter_uji }}', '{{ $param->metode_uji }}', {{ $param->jumlah_minimal ?? 0 }}, '{{ $param->satuan }}', {{ $param->harga }})" class="text-blue-600 hover:text-blue-800 mr-2" title="Edit">
                                                                            <i class="fas fa-edit"></i>
                                                                        </button>
                                                                        <button onclick="openDeleteParamModal({{ $param->id_parameter }}, '{{ $param->parameter_uji }}')" class="text-red-600 hover:text-red-800" title="Hapus">
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
                                    <i class="fas fa-pills text-2xl text-slate-400"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-slate-700 mb-2">Belum ada data obat</h3>
                                <p class="text-slate-500 text-sm">Tambahkan obat pertama Anda menggunakan form di samping.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal Edit Obat -->
<div id="editModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center">
    <div class="relative mx-auto p-6 border w-full max-w-md shadow-2xl rounded-3xl bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-blue-900">Edit Obat</h3>
            <button onclick="closeEditModal()" class="text-slate-400 hover:text-slate-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" id="edit_id_obat" name="id_obat">
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Zat Aktif</label>
                    <input type="text" id="edit_zat_aktif" name="zat_aktif" required 
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-900 focus:border-transparent outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Jenis Sediaan</label>
                    <input type="text" id="edit_jenis_sediaan" name="jenis_sediaan" required 
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-900 focus:border-transparent outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Bentuk Sediaan</label>
                    <input type="text" id="edit_bentuk_sediaan" name="bentuk_sediaan" required 
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-900 focus:border-transparent outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Harga Total (Rp)</label>
                    <input type="number" id="edit_harga_total" name="harga_total" required min="0" step="0.01"
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-900 focus:border-transparent outline-none">
                </div>
            </div>

            <div class="flex space-x-3 mt-6">
                <button type="button" onclick="closeEditModal()" class="flex-1 px-4 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold hover:bg-slate-200 transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-3 bg-blue-900 text-white rounded-xl font-bold hover:bg-blue-800 transition">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Delete Obat -->
<div id="deleteModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center">
    <div class="relative mx-auto p-6 border w-full max-w-sm shadow-2xl rounded-3xl bg-white">
        <div class="text-center">
            <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-trash-alt text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-800">Hapus Obat?</h3>
            <p class="text-slate-500 text-sm mt-2 mb-6">
                Obat <span id="delete_obat_name" class="font-bold text-slate-800"></span> akan dihapus permanen.
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

<!-- Modal Edit Parameter Uji -->
<div id="editParamModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center">
    <div class="relative mx-auto p-6 border w-full max-w-md shadow-2xl rounded-3xl bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-blue-900">Edit Parameter Uji</h3>
            <button onclick="closeEditParamModal()" class="text-slate-400 hover:text-slate-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <form id="editParamForm" method="POST">
            @csrf
            @method('PUT')
            
            <div class="space-y-3">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Parameter Uji</label>
                    <input type="text" id="edit_param_parameter" name="parameter_uji" required 
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-900 focus:border-transparent outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Metode Uji</label>
                    <input type="text" id="edit_param_metode" name="metode_uji" required 
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-900 focus:border-transparent outline-none">
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Jumlah Minimal</label>
                        <input type="number" id="edit_param_jumlah" name="jumlah_minimal" min="0" step="0.01"
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-900 focus:border-transparent outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Satuan</label>
                        <input type="text" id="edit_param_satuan" name="satuan" required 
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-900 focus:border-transparent outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Harga (Rp)</label>
                    <input type="number" id="edit_param_harga" name="harga" required min="0" step="0.01"
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-900 focus:border-transparent outline-none">
                </div>
            </div>

            <div class="flex space-x-3 mt-6">
                <button type="button" onclick="closeEditParamModal()" class="flex-1 px-4 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold hover:bg-slate-200 transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-3 bg-blue-900 text-white rounded-xl font-bold hover:bg-blue-800 transition">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Delete Parameter Uji -->
<div id="deleteParamModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center">
    <div class="relative mx-auto p-6 border w-full max-w-sm shadow-2xl rounded-3xl bg-white">
        <div class="text-center">
            <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-trash-alt text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-800">Hapus Parameter Uji?</h3>
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
    // Toggle Parameter Row
    function toggleParameter(id) {
        const row = document.getElementById('parameter-row-' + id);
        const icon = document.getElementById('icon-' + id);
        
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

    // Modal Functions
    function openEditModal(id, zatAktif, jenisSediaan, bentukSediaan, hargaTotal) {
        document.getElementById('edit_id_obat').value = id;
        document.getElementById('edit_zat_aktif').value = zatAktif;
        document.getElementById('edit_jenis_sediaan').value = jenisSediaan;
        document.getElementById('edit_bentuk_sediaan').value = bentukSediaan;
        document.getElementById('edit_harga_total').value = hargaTotal;
        
        document.getElementById('editForm').action = '/admin/obat/' + id;
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    function openDeleteModal(id, nama) {
        document.getElementById('delete_obat_name').textContent = nama;
        document.getElementById('deleteForm').action = '/admin/obat/' + id;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    // Parameter Uji Modal Functions
    function openEditParamModal(id, parameter, metode, jumlah, satuan, harga) {
        document.getElementById('edit_param_parameter').value = parameter;
        document.getElementById('edit_param_metode').value = metode;
        document.getElementById('edit_param_jumlah').value = jumlah;
        document.getElementById('edit_param_satuan').value = satuan;
        document.getElementById('edit_param_harga').value = harga;
        
        document.getElementById('editParamForm').action = '/admin/parameter-uji/' + id;
        document.getElementById('editParamModal').classList.remove('hidden');
    }

    function closeEditParamModal() {
        document.getElementById('editParamModal').classList.add('hidden');
    }

    function openDeleteParamModal(id, nama) {
        document.getElementById('delete_param_name').textContent = nama;
        document.getElementById('deleteParamForm').action = '/admin/parameter-uji/' + id;
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

    document.getElementById('editParamModal').addEventListener('click', function(e) {
        if (e.target === this) closeEditParamModal();
    });

    document.getElementById('deleteParamModal').addEventListener('click', function(e) {
        if (e.target === this) closeDeleteParamModal();
    });
</script>

</body>
</html>
