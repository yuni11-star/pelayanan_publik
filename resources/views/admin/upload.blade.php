  <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unggah Dokumen - Admin</title>
    
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
    <div class="w-[96%] max-w-[1700px] mx-auto px-4">
        
        <div class="flex justify-between items-center mb-8">
            <div class="flex items-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-900 rounded-3xl shadow-lg mr-4 transform -rotate-6">
                    <i class="fas fa-upload text-white text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-blue-900">Upload Dokumen</h2>
                    <p class="text-slate-500 text-sm">Kelola dokumen standar pelayanan</p>
                </div>
            </div>
            <div class="flex">
                <a href="{{ route('admin.obat') }}" class="px-4 py-2 bg-emerald-600 text-white rounded-xl font-semibold hover:bg-emerald-700 transition flex items-center">
                    <i class="fas fa-pills mr-2"></i>
                    Kelola Obat
                </a>
                <a href="{{ route('admin.otsk') }}" class="px-4 py-2 bg-purple-600 text-white rounded-xl font-semibold hover:bg-purple-700 transition flex items-center ml-2">
                    <i class="fas fa-capsules mr-2"></i>
                    Kelola OT-SK
                </a>
                <a href="{{ route('admin.kosmetik') }}" class="px-4 py-2 bg-orange-600 text-white rounded-xl font-semibold hover:bg-purple-700 transition flex items-center ml-2">
                    <i class="fas fa-paint-brush mr-2"></i>
                    Kelola Kosmetik
                </a>
                <a href="{{ route('admin.pangan') }}" class="px-4 py-2 bg-sky-600 text-white rounded-xl font-semibold hover:bg-sky-700 transition flex items-center ml-2">
                    <i class="fas fa-utensils mr-2"></i>
                    Kelola Pangan
                </a>
                <form action="{{ route('admin.logout') }}" method="POST" class="ml-2">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-slate-700 text-white rounded-xl font-semibold hover:bg-slate-800 transition flex items-center">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-2xl shadow-blue-100 overflow-hidden border border-slate-100">
            <div class="bg-blue-900 px-8 py-8 text-white relative overflow-hidden">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-white/10 rounded-full blur-3xl"></div>
                <h2 class="text-2xl font-bold relative z-10">Upload Dokumen Baru</h2>
                <p class="text-blue-200 text-sm relative z-10">Dokumen standar pelayanan publik BBPOM Pontianak yang dapat diunduh untuk referensi dan informasi..</p>
                <div class="relative z-10 mt-4">
                    <a href="https://docs.google.com/spreadsheets/d/1HaB_QgfOjBzOy-Xe39YZWMA30VtE3ZDS/edit?usp=sharing&ouid=106224472982296200942&rtpof=true&sd=true"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white text-sm font-semibold px-4 py-2 rounded-xl border border-white/20 transition">
                        <i class="fas fa-link"></i>
                        Ruang Lingkup Pengujian
                    </a>
                </div>
            </div>

            <div class="p-8">
                @if(session('success'))
                    <div class="flex items-center bg-emerald-50 text-emerald-700 p-4 rounded-2xl mb-6 border border-emerald-100">
                        <i class="fas fa-check-circle mr-3 text-xl"></i>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                @endif

                <form action="{{ route('admin.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div class="relative">
                        <label for="document" class="block text-sm font-semibold text-slate-700 mb-2 ml-1">File Dokumen</label>
                        <div id="dropzone" class="relative group border-2 border-dashed border-slate-200 rounded-2xl p-10 transition-all hover:border-blue-500 hover:bg-blue-50/50 text-center cursor-pointer">
                            <input id="document" name="document" type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept=".pdf,.doc,.docx" required>
                            
                            <div id="upload-placeholder">
                                <div class="mx-auto w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-file-upload text-2xl text-slate-400 group-hover:text-blue-600"></i>
                                </div>
                                <p class="text-slate-600 font-medium">Klik untuk pilih file atau seret ke sini</p>
                                <p class="text-slate-400 text-xs mt-2">PDF, DOC, DOCX (Maks. 10MB)</p>
                            </div>

                            <div id="file-preview" class="hidden">
                                <div class="flex items-center justify-center space-x-4">
                                    <div class="p-4 bg-blue-100 rounded-2xl text-blue-600">
                                        <i class="fas fa-file-pdf text-3xl"></i>
                                    </div>
                                    <div class="text-left">
                                        <p id="file-name-display" class="text-slate-800 font-bold truncate max-w-xs"></p>
                                        <p id="file-size-display" class="text-slate-500 text-sm"></p>
                                    </div>
                                    <button type="button" id="remove-file" class="p-2 hover:bg-red-50 text-red-400 hover:text-red-600 rounded-full transition-colors">
                                        <i class="fas fa-times-circle text-xl"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <button type="submit" class="flex-1 bg-blue-900 text-white px-8 py-4 rounded-2xl font-bold hover:bg-blue-800 transition-all hover:shadow-lg active:scale-95 flex items-center justify-center">
                            <i class="fas fa-cloud-upload-alt mr-2"></i>
                            Mulai Upload
                        </button>
                        <a href="/" class="px-8 py-4 rounded-2xl font-semibold text-slate-600 hover:bg-slate-100 transition-all text-center">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-12 bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-100">
            <div class="bg-blue-900 text-white px-8 py-6">
                <h2 class="text-2xl font-bold">Kelola Dokumen</h2>
                <p class="text-blue-200 mt-1">Kelola dokumen yang telah diupload</p>
            </div>

            <div class="p-8">
                @if(isset($documents) && $documents->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Dokumen</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tipe</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ukuran</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($documents as $document)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <i class="{{ $document['icon_class'] ?? 'fas fa-file' }} text-blue-600 mr-3"></i>
                                            <span class="text-sm font-medium text-gray-900">{{ $document['original_name'] }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $document['badge_class'] ?? 'bg-gray-100' }}">
                                            {{ $document['type'] }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $document['size_formatted'] }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $document['uploaded_at'] }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                        <a href="{{ route('admin.document.preview', $document['name']) }}" target="_blank" class="text-blue-600 hover:text-blue-900"><i class="fas fa-eye"></i></a>
                                        <button onclick="openRenameModal('{{ $document['name'] }}', '{{ $document['original_name'] }}')" class="text-yellow-600 hover:text-yellow-900"><i class="fas fa-edit"></i></button>
                                        <button onclick="openDeleteModal('{{ $document['name'] }}', '{{ $document['original_name'] }}')" class="text-red-600 hover:text-red-900"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-12">
                        <i class="fas fa-folder-open text-gray-300 text-5xl mb-4"></i>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada dokumen</h3>
                        <p class="text-gray-500">Upload dokumen pertama Anda menggunakan form di atas.</p>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>

<script>
    // Paste your existing script here...
    const fileInput = document.getElementById('document');
    const preview = document.getElementById('file-preview');
    const placeholder = document.getElementById('upload-placeholder');
    const fileName = document.getElementById('file-name-display');
    const fileSize = document.getElementById('file-size-display');
    const removeBtn = document.getElementById('remove-file');

    fileInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const file = this.files[0];
            fileName.textContent = file.name;
            fileSize.textContent = (file.size / (1024 * 1024)).toFixed(2) + ' MB';
            placeholder.classList.add('hidden');
            preview.classList.remove('hidden');
        }
    });

    removeBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        fileInput.value = '';
        placeholder.classList.remove('hidden');
        preview.classList.add('hidden');
    });

    function openRenameModal(filename, originalName) {
        document.getElementById('renameModal').classList.remove('hidden');
        document.getElementById('renameForm').action = `/admin/documents/${filename}/rename`;
        document.getElementById('new_name').value = originalName.replace(/\.[^/.]+$/, "");
    }

    function closeRenameModal() { document.getElementById('renameModal').classList.add('hidden'); }

    function openDeleteModal(filename, originalName) {
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteForm').action = `/admin/documents/${filename}`;
        document.getElementById('deleteFileName').textContent = originalName;
    }

    function closeDeleteModal() { document.getElementById('deleteModal').classList.add('hidden'); }
</script>

<div id="renameModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center">
    <div class="relative mx-auto p-6 border w-96 shadow-2xl rounded-3xl bg-white">
        <h3 class="text-xl font-bold text-blue-900 mb-4">Rename Dokumen</h3>
        <form id="renameForm" method="POST">
            @csrf
            <input type="text" id="new_name" name="new_name" required class="w-full px-4 py-3 border border-slate-200 rounded-xl mb-4 focus:ring-2 focus:ring-blue-900 outline-none">
            <div class="flex justify-end space-x-3">
                <button type="button" onclick="closeRenameModal()" class="px-4 py-2 text-slate-500 font-semibold">Batal</button>
                <button type="submit" class="px-6 py-2 bg-blue-900 text-white rounded-xl font-bold">Simpan</button>
            </div>
        </form>
    </div>
</div>

<div id="deleteModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center">
    <div class="relative mx-auto p-6 border w-96 shadow-2xl rounded-3xl bg-white">
        <div class="text-center">
            <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-trash-alt text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-800">Hapus Dokumen?</h3>
            <p class="text-slate-500 text-sm mt-2 mb-6">Dokumen <span id="deleteFileName" class="font-bold"></span> akan dihapus permanen.</p>
        </div>
        <div class="flex space-x-3">
            <button onclick="closeDeleteModal()" class="flex-1 px-4 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold">Batal</button>
            <form id="deleteForm" method="POST" class="flex-1">
                @method('DELETE')
                @csrf
                <button type="submit" class="w-full px-4 py-3 bg-red-600 text-white rounded-xl font-bold">Hapus</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
