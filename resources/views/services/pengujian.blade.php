@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: { 
                colors: {
                    navy: '#003366',
                    gold: '#D4AF37'
                },
                fontFamily: {
                    sans: ['Inter', 'ui-sans-serif', 'system-ui']
                }
            }
        }
    }
</script>

<div class="min-h-screen bg-slate-50 py-12">
    <div class="max-w-[95%] mx-auto px-4 sm:px-6 lg:px-8">
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">

        <nav class="flex mb-5 text-gray-500 text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/" class="hover:text-[#10b981]">Beranda</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-xs mx-2"></i>
                        <span class="ml-1 md:ml-2 font-medium text-gray-700">Layanan Pengujian</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="bg-[#003366] text-white rounded-2xl shadow-xl p-10 mb-8 relative overflow-hidden">
            <div class="relative z-10">
                <h1 class="text-4xl font-extrabold mb-4">Pengujian Obat dan Makanan</h1>
                <p class="text-emerald-100 text-lg max-w-2xl">Layanan pengujian laboratorium yang akurat dan terpercaya untuk memastikan keamanan produk di wilayah Kalimantan Barat.</p>
            </div>
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-emerald-500 opacity-10 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 mb-8">
            <div class="lg:col-span-4 space-y-8">
                <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                    <h2 class="text-2xl font-bold text-[#003366] mb-6 flex items-center">
                        <span class="w-2 h-8 bg-[#10b981] rounded-full mr-3"></span>
                        Deskripsi Layanan
                    </h2>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        Kami menyediakan pengujian laboratorium secara komprehensif terhadap berbagai jenis komoditi untuk memastikan kepatuhan terhadap standar mutu dan keamanan nasional (SNI/BPOM).
                    </p>

                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Cakupan Pengujian:</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach(['UJI MIKROBIOLOGI', 'UJI KIMIA'] as $item)
                        <div class="flex items-center p-3 bg-emerald-50 rounded-lg">
                            <i class="fas fa-check-circle text-[#10b981] mr-3"></i>
                            <span class="text-gray-700 font-medium">{{ $item }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                    <h2 class="text-2xl font-bold text-[#003366] mb-6 flex items-center">
                        <span class="w-2 h-8 bg-[#10b981] rounded-full mr-3"></span>
                        Kategori Komoditi
                    </h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <!-- Obat -->
                        <div class="category-card cursor-pointer bg-emerald-50 border-2 border-emerald-500 rounded-xl p-4 text-center transition-all duration-300 group shadow-lg -translate-y-1" onclick="selectCategory('obat', this)">
                            <div class="w-12 h-12 mx-auto bg-white rounded-full flex items-center justify-center shadow-sm mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-pills text-2xl text-[#10b981]"></i>
                            </div>
                            <h3 class="font-semibold text-[#003366]">Obat</h3>
                        </div>
                        <!-- OT-SK -->
                        <div class="category-card cursor-pointer bg-white hover:bg-emerald-50 border-2 border-transparent hover:border-emerald-200 rounded-xl p-4 text-center transition-all duration-300 group shadow-md hover:shadow-xl hover:-translate-y-1" onclick="selectCategory('otsk', this)">
                            <div class="w-12 h-12 mx-auto bg-white rounded-full flex items-center justify-center shadow-sm mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-leaf text-2xl text-[#003366] group-hover:text-[#10b981]"></i>
                            </div>
                            <h3 class="font-semibold text-gray-700 group-hover:text-[#003366]">OT-SK</h3>
                        </div>
                        <!-- Kosmetik -->
                        <div class="category-card cursor-pointer bg-white hover:bg-emerald-50 border-2 border-transparent hover:border-emerald-200 rounded-xl p-4 text-center transition-all duration-300 group shadow-md hover:shadow-xl hover:-translate-y-1" onclick="selectCategory('kosmetik', this)">
                            <div class="w-12 h-12 mx-auto bg-white rounded-full flex items-center justify-center shadow-sm mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-pump-soap text-2xl text-[#003366] group-hover:text-[#10b981]"></i>
                            </div>
                            <h3 class="font-semibold text-gray-700 group-hover:text-[#003366]">Kosmetik</h3>
                        </div>
                        <!-- Pangan -->
                        <div class="category-card cursor-pointer bg-white hover:bg-emerald-50 border-2 border-transparent hover:border-emerald-200 rounded-xl p-4 text-center transition-all duration-300 group shadow-md hover:shadow-xl hover:-translate-y-1" onclick="selectCategory('pangan', this)">
                            <div class="w-12 h-12 mx-auto bg-white rounded-full flex items-center justify-center shadow-sm mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-utensils text-2xl text-[#003366] group-hover:text-[#10b981]"></i>
                            </div>
                            <h3 class="font-semibold text-gray-700 group-hover:text-[#003366]">Pangan</h3>
                        </div>
                    </div>

                <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                    <h2 class="text-2xl font-bold text-[#003366] mb-6 flex items-center">
                        <span class="w-2 h-8 bg-[#10b981] rounded-full mr-3"></span>
                        <span id="search-section-title">Pencarian Obat dan Parameter Uji</span>
                    </h2>

                    <div class="space-y-6">
                        <div class="relative">
                            <!-- Searchbox for OT-SK -->
                            <div id="otsk-search-container" class="hidden space-y-4 mb-6 bg-emerald-50 p-6 rounded-xl border border-emerald-100">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="otsk-type-select" class="block text-sm font-medium text-gray-700 mb-2">Tipe Produk</label>
                                        <select id="otsk-type-select" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#10b981] focus:border-transparent bg-white">
                                            <option value="">-- Pilih Tipe Produk --</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="otsk-claim-select" class="block text-sm font-medium text-gray-700 mb-2">Klaim/Khasiat</label>
                                        <select id="otsk-claim-select" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#10b981] focus:border-transparent bg-white" disabled>
                                            <option value="">-- Pilih Klaim --</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Pangan Search Form (New and separated) -->
                            <div id="pangan-search-container" class="hidden">
                                <form id="pangan-search-form" class="flex items-center relative">
                                    <input type="text" name="q" id="pangan-search-input" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#10b981] focus:border-transparent" placeholder="Ketik nama parameter uji pangan..." autocomplete="off">
                                    <button type="submit" class="absolute right-3 bg-[#003366] text-white rounded-lg px-3 py-1.5 text-sm hover:bg-[#002244] transition-all">
                                        <i class="fas fa-search mr-1"></i> Cari
                                    </button>
                                </form>
                                <div id="pangan-search-results" class="mt-4"></div>
                            </div>

                            <!-- Pangan Detail Modal -->
                            <div id="pangan-detail-modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden z-[100] items-center justify-center p-4">
                                <div class="bg-white w-full max-w-3xl rounded-2xl shadow-2xl overflow-hidden">
                                    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200 bg-slate-50">
                                        <h3 class="text-lg font-bold text-[#003366]">Detail Item Pangan</h3>
                                        <button type="button" id="close-pangan-modal-btn" class="text-gray-500 hover:text-gray-700 text-xl leading-none">&times;</button>
                                    </div>
                                    <div id="pangan-modal-body" class="p-6 space-y-5">
                                        <div class="text-center text-gray-500">Memuat detail...</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Original medicine search input -->
                            <div id="medicine-search-container" class="relative">
                                <div class="flex items-center relative">
                                    <input type="text" id="medicine-search-input" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#10b981] focus:border-transparent" placeholder="Ketik nama zat aktif..." autocomplete="off">
                                </div>
                                <div id="medicine-search-suggestions" class="absolute z-50 w-full mt-2 max-h-40 overflow-y-auto bg-white border border-gray-300 rounded-lg shadow-lg hidden"></div>
                            </div>
                        </div>

                        <div id="medicine-info-container" class="bg-gray-50 rounded-lg p-6 border border-gray-200 hidden">
                            <h3 class="text-lg font-bold text-[#003366] mb-4">Detail Informasi Obat</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 text-sm">
                                <div><strong class="block text-gray-500 uppercase text-xs">Zat Aktif</strong> <span id="zat-aktif" class="text-base font-medium"></span></div>
                                <div><strong class="block text-gray-500 uppercase text-xs">Jenis Sediaan</strong> <span id="jenis-sediaan" class="text-base font-medium"></span></div>
                                <div><strong class="block text-gray-500 uppercase text-xs">Bentuk Sediaan</strong> <span id="bentuk-sediaan" class="text-base font-medium"></span></div>
                                <div><strong class="block text-gray-500 uppercase text-xs">Harga Estimasi</strong> <span id="harga-total" class="text-base font-bold text-blue-700"></span></div>
                            </div>
                        </div>

                        <div id="parameters-section" class="hidden mt-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Parameter Uji Laboratorium</h3>
                            <div class="overflow-x-auto border border-gray-200 rounded-lg">
                                <table class="w-full text-sm border-collapse">
                                    <thead>
                                        <tr id="parameters-header-row" class="bg-gray-100 border-b border-gray-300">
                                            <!-- Header tabel akan diisi via JS -->
                                        </tr>
                                    </thead>
                                    <tbody id="parameters-tbody" class="divide-y divide-gray-200 bg-white">
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1 space-y-8">
                <div class="bg-[#003366] text-white rounded-2xl p-8 shadow-lg">
                    <h3 class="text-xl font-bold mb-6 flex items-center">
                        <i class="fas fa-file-invoice mr-3 text-emerald-400"></i> Persyaratan
                    </h3>
                    <ul class="space-y-4 text-sm text-emerald-50">
                        <li class="flex items-start">
                            <span class="bg-emerald-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs mr-3 mt-0.5 shrink-0">1</span>
                            Surat Permohonan Resmi
                        </li>
                        <li class="flex items-start">
                            <span class="bg-emerald-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs mr-3 mt-0.5 shrink-0">2</span>
                            Sampel Produk (Jumlah mencukupi)
                        </li>
                        <li class="flex items-start">
                            <span class="bg-emerald-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs mr-3 mt-0.5 shrink-0">3</span>
                            Label & Komposisi Produk
                        </li>
                    </ul>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
                    <h3 class="text-lg font-bold text-[#003366] mb-4">Bantuan Layanan</h3>
                    <div class="space-y-4">
                        <div class="flex items-center text-gray-600">
                            <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center mr-3 text-[#10b981]">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <span class="text-sm">(0561) 123-4567</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center mr-3 text-[#10b981]">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <span class="text-sm italic">info@bbpom-ptk.id</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // --- LOGIC PENCARIAN KOMODITI ---

    let activeCategory = 'obat'; // Default category

    // Element References
    const medSearchInput = document.getElementById('medicine-search-input');
    const medSuggestions = document.getElementById('medicine-search-suggestions');
    const medSearchContainer = document.getElementById('medicine-search-container');
    
    const otskSearchContainer = document.getElementById('otsk-search-container');
    const otskTypeSelect = document.getElementById('otsk-type-select');
    const otskClaimSelect = document.getElementById('otsk-claim-select');
    
    const panganSearchContainer = document.getElementById('pangan-search-container');
    const panganSearchForm = document.getElementById('pangan-search-form');
    const panganSearchInput = document.getElementById('pangan-search-input');
    const panganSearchResults = document.getElementById('pangan-search-results');
    const panganDetailModal = document.getElementById('pangan-detail-modal');
    const panganModalBody = document.getElementById('pangan-modal-body');
    const closePanganModalBtn = document.getElementById('close-pangan-modal-btn');

    // Autocomplete for Obat & Kosmetik (Original Logic)
    medSearchInput.addEventListener('input', function() {
        const query = this.value.trim();
        if (query.length < 1) {
            medSuggestions.classList.add('hidden');
            return;
        }

        let apiUrl = activeCategory === 'obat' ? '/api/search-obat' : '/api/search-kosmetik';

        fetch(`${apiUrl}?q=${encodeURIComponent(query)}`)
            .then(res => res.json())
            .then(data => {
                medSuggestions.innerHTML = '';
                data.forEach(item => {
                    const div = document.createElement('div');
                    div.className = 'px-4 py-2 hover:bg-gray-100 cursor-pointer';
                    let displayName = item.zat_aktif; // This covers both obat and kosmetik
                    div.textContent = displayName;
                    
                    div.onclick = () => {
                        medSearchInput.value = displayName;
                        medSuggestions.classList.add('hidden');
                        if (activeCategory === 'kosmetik') {
                            loadKosmetikDetails(item.id);
                        } else {
                            loadMedicineDetails(item.id);
                        }
                    };
                    medSuggestions.appendChild(div);
                });
                medSuggestions.classList.remove('hidden');
            });
    });

    // Form-based search for Pangan (New Logic)
    panganSearchForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const query = panganSearchInput.value.trim();
        if (query.length < 2) {
            panganSearchResults.innerHTML = `<div class="text-center p-4 bg-yellow-50 text-yellow-700 rounded-lg">Masukkan minimal 2 karakter untuk mencari.</div>`;
            return;
        }

        panganSearchResults.innerHTML = `<div class="text-center p-4"><i class="fas fa-spinner fa-spin text-2xl text-[#003366]"></i></div>`;
        
        fetch(`/api/search-pangan?q=${encodeURIComponent(query)}`)
            .then(res => res.json())
            .then(data => {
                if (data.length === 0) {
                    panganSearchResults.innerHTML = `<div class="text-center p-4 bg-gray-50 text-gray-600 rounded-lg">Data tidak ditemukan untuk parameter uji <strong>"${query}"</strong>.</div>`;
                    return;
                }
                
                let tableHTML = `
                    <div class="overflow-x-auto border border-gray-200 rounded-lg">
                        <table class="w-full text-sm border-collapse">
                            <thead class="bg-gray-100">
                                <tr class="border-b border-gray-300">
                                    <th class="px-4 py-3 text-left font-bold text-gray-700">Bahan Produk</th>
                                    <th class="px-4 py-3 text-left font-bold text-gray-700">Parameter Uji</th>
                                    <th class="px-4 py-3 text-left font-bold text-gray-700">Metode</th>
                                    <th class="px-4 py-3 text-center font-bold text-gray-700">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">`;

                data.forEach(item => {
                    tableHTML += `
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">${item.bahan_produk || '-'}</td>
                            <td class="px-4 py-3 font-semibold">${item.parameter_uji || '-'}</td>
                            <td class="px-4 py-3">${item.metode || '-'}</td>
                            <td class="px-4 py-3 text-center">
                                <button class="view-pangan-details-btn bg-[#10b981] text-white px-3 py-1 rounded-md text-xs hover:bg-emerald-600" data-pangan-id="${item.id}" data-pangan-uji-id="${item.id_uji}">
                                    Lihat Detail
                                </button>
                            </td>
                        </tr>`;
                });

                tableHTML += `</tbody></table></div>`;
                panganSearchResults.innerHTML = tableHTML;
            })
            .catch(error => {
                console.error('Error fetching pangan search:', error);
                panganSearchResults.innerHTML = `<div class="text-center p-4 bg-red-50 text-red-700 rounded-lg">Terjadi kesalahan saat mengambil data.</div>`;
            });
    });

    // Detail button listener for Pangan search results
    panganSearchResults.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('view-pangan-details-btn')) {
            const panganId = e.target.getAttribute('data-pangan-id');
            const panganUjiId = e.target.getAttribute('data-pangan-uji-id');
            if (panganId && panganUjiId) {
                openPanganDetailModal(panganId, panganUjiId);
            }
        }
    });

    function escapeHtml(value) {
        return String(value)
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;');
    }

    function closePanganDetailModal() {
        panganDetailModal.classList.add('hidden');
        panganDetailModal.classList.remove('flex');
    }

    function openPanganDetailModal(panganId, idUji) {
        panganDetailModal.classList.remove('hidden');
        panganDetailModal.classList.add('flex');
        panganModalBody.innerHTML = '<div class="text-center text-gray-500">Memuat detail...</div>';

        fetch(`/api/pangan/${panganId}/item/${idUji}`)
            .then(res => {
                if (!res.ok) throw new Error('Gagal memuat detail item pangan');
                return res.json();
            })
            .then(data => {
                panganModalBody.innerHTML = `
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <div><span class="block text-xs text-gray-500 uppercase">Bahan Produk</span><span class="font-semibold text-gray-800">${escapeHtml(data.bahan_produk)}</span></div>
                        <div><span class="block text-xs text-gray-500 uppercase">Waktu Layanan</span><span class="font-semibold text-gray-800">${data.waktu ? `${escapeHtml(data.waktu)} Hari` : '-'}</span></div>
                        <div><span class="block text-xs text-gray-500 uppercase">Parameter Uji</span><span class="font-semibold text-gray-800">${escapeHtml(data.parameter_uji)}</span></div>
                        <div><span class="block text-xs text-gray-500 uppercase">Metode Uji</span><span class="font-semibold text-gray-800">${escapeHtml(data.metode)}</span></div>
                        <div><span class="block text-xs text-gray-500 uppercase">Sampel Minimal</span><span class="font-semibold text-gray-800">${escapeHtml(data.minimal_sampel)} ${escapeHtml(data.satuan)}</span></div>
                        <div><span class="block text-xs text-gray-500 uppercase">Harga</span><span class="font-bold text-[#003366]">${formatCurrency(data.harga || 0)}</span></div>
                    </div>
                    <div class="pt-4 border-t border-gray-200">
                        <span class="block text-xs text-gray-500 uppercase mb-2">Keterangan</span>
                        <p class="text-sm text-gray-700 leading-relaxed">${escapeHtml(data.keterangan || '-')}</p>
                    </div>
                `;
            })
            .catch(error => {
                console.error('Error fetching pangan item detail:', error);
                panganModalBody.innerHTML = '<div class="text-center p-4 bg-red-50 text-red-700 rounded-lg">Terjadi kesalahan saat mengambil detail item.</div>';
            });
    }

    if (closePanganModalBtn) {
        closePanganModalBtn.addEventListener('click', closePanganDetailModal);
    }

    if (panganDetailModal) {
        panganDetailModal.addEventListener('click', function(e) {
            if (e.target === panganDetailModal) {
                closePanganDetailModal();
            }
        });
    }

    // Enter key handler for the original search input (Obat/Kosmetik)
    medSearchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault(); 
            // This can be enhanced to auto-select the first suggestion
        }
    });

    // Logic untuk Dropdown OT-SK
    if (otskTypeSelect) {
        otskTypeSelect.addEventListener('change', function() {
            const tipeId = this.value;
            otskClaimSelect.innerHTML = '<option value="">-- Pilih Klaim --</option>';
            otskClaimSelect.disabled = true;

            if (tipeId) {
                loadTipeProdukDetails(tipeId);
                fetch(`/api/klaim-by-tipe/${tipeId}`)
                    .then(res => res.json())
                    .then(data => {
                        data.forEach(klaim => {
                            const option = document.createElement('option');
                            option.value = klaim.id_klaim;
                            option.textContent = klaim.nama_klaim;
                            otskClaimSelect.appendChild(option);
                        });
                        otskClaimSelect.disabled = false;
                    });
            } else {
                document.getElementById('parameters-section').classList.add('hidden');
            }
        });

        otskClaimSelect.addEventListener('change', function() {
            const klaimId = this.value;
            if (klaimId) {
                loadOtskDetails(klaimId);
            } else {
                const tipeId = otskTypeSelect.value;
                if (tipeId) loadTipeProdukDetails(tipeId);
            }
        });
    }

    // --- DATA LOADING FUNCTIONS (loadMedicineDetails, loadKosmetikDetails, etc.) ---
    // These functions remain the same as your original, correct versions.
    function loadMedicineDetails(medicineId) {
        fetch(`/api/obat/${medicineId}`)
            .then(res => res.json())
            .then(data => {
                document.getElementById('zat-aktif').textContent = data.zat_aktif || '-';
                document.getElementById('jenis-sediaan').textContent = data.jenis_sediaan || '-';
                document.getElementById('bentuk-sediaan').textContent = data.bentuk_sediaan || '-';
                document.getElementById('harga-total').textContent = data.harga_total ? formatCurrency(data.harga_total) : 'Rp 0';
                document.getElementById('medicine-info-container').classList.remove('hidden');

                const theadRow = document.getElementById('parameters-header-row');
                theadRow.innerHTML = `
                    <th class="px-6 py-4 text-left font-bold text-gray-700">Parameter Uji</th>
                    <th class="px-6 py-4 text-left font-bold text-gray-700">Metode Uji</th>
                    <th class="px-6 py-4 text-center font-bold text-gray-700">Jumlah Sampel Min</th>
                    <th class="px-6 py-4 text-left font-bold text-gray-700">Satuan</th>
                    <th class="px-6 py-4 text-right font-bold text-gray-700">Harga</th>
                `;

                const tbody = document.getElementById('parameters-tbody');
                tbody.innerHTML = '';
                if (data.parameters && data.parameters.length > 0) {
                    data.parameters.forEach(param => {
                        tbody.innerHTML += `
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">${param.parameter_uji || '-'}</td>
                                <td class="px-6 py-4">${param.metode_uji || '-'}</td>
                                <td class="px-6 py-4 text-center font-semibold">${param.jumlah_minimal || 0}</td>
                                <td class="px-6 py-4">${param.satuan || '-'}</td>
                                <td class="px-6 py-4 text-right font-semibold">${param.harga ? formatCurrency(param.harga) : '-'}</td>
                            </tr>`;
                    });
                } else {
                    tbody.innerHTML = '<tr><td colspan="5" class="text-center py-4">Tidak ada parameter uji.</td></tr>';
                }
                document.getElementById('parameters-section').classList.remove('hidden');
            });
    }

    function loadKosmetikDetails(kosmetikId) {
        fetch(`/api/kosmetik/${kosmetikId}`)
            .then(res => res.json())
            .then(data => {
                document.getElementById('zat-aktif').textContent = data.zat_aktif || '-';
                document.getElementById('jenis-sediaan').textContent = data.jenis_sediaan || '-';
                document.getElementById('bentuk-sediaan').textContent = data.bentuk_sediaan || '-';
                document.getElementById('harga-total').textContent = data.harga_total ? formatCurrency(data.harga_total) : 'Rp 0';
                document.getElementById('medicine-info-container').classList.remove('hidden');

                const theadRow = document.getElementById('parameters-header-row');
                theadRow.innerHTML = `
                    <th class="px-2 py-3 text-left font-bold text-gray-700 text-xs">PUK</th>
                    <th class="px-2 py-3 text-left font-bold text-gray-700 text-xs">Teknik Analisis</th>
                    <th class="px-2 py-3 text-left font-bold text-gray-700 text-xs">Metode Uji</th>
                    <th class="px-2 py-3 text-left font-bold text-gray-700 text-xs">Pustaka</th>
                    <th class="px-2 py-3 text-center font-bold text-gray-700 text-xs">Sampel Min</th>
                    <th class="px-2 py-3 text-left font-bold text-gray-700 text-xs">Satuan</th>
                    <th class="px-2 py-3 text-right font-bold text-gray-700 text-xs">Harga</th>
                `;

                const tbody = document.getElementById('parameters-tbody');
                tbody.innerHTML = '';
                if (data.parameters && data.parameters.length > 0) {
                    data.parameters.forEach(param => {
                        tbody.innerHTML += `
                            <tr class="hover:bg-gray-50">
                                <td class="px-2 py-3 text-sm font-medium">${param.parameter_uji || '-'}</td>
                                <td class="px-2 py-3 text-xs">${param.teknik_analisis || '-'}</td>
                                <td class="px-2 py-3 text-xs">${param.metode_uji || '-'}</td>
                                <td class="px-2 py-3 text-xs">${param.pustaka || '-'}</td>
                                <td class="px-2 py-3 text-center font-semibold text-sm">${param.jumlah_minimal || 0}</td>
                                <td class="px-2 py-3 text-sm">${param.satuan || '-'}</td>
                                <td class="px-2 py-3 text-right font-semibold text-sm">${param.harga ? formatCurrency(param.harga) : '-'}</td>
                            </tr>`;
                    });
                } else {
                    tbody.innerHTML = '<tr><td colspan="7" class="text-center py-4">Tidak ada parameter uji.</td></tr>';
                }
                document.getElementById('parameters-section').classList.remove('hidden');
            });
    }

    function loadPanganDetails(panganId) {
        fetch(`/api/pangan/${panganId}`)
            .then(res => res.json())
            .then(data => {
                document.getElementById('zat-aktif').textContent = data.bahan_produk || '-';
                document.getElementById('jenis-sediaan').textContent = data.waktu ? data.waktu + ' Hari' : '-';
                document.getElementById('bentuk-sediaan').textContent = '-'; // Pangan doesn't have this
                document.getElementById('harga-total').textContent = data.harga_total ? formatCurrency(data.harga_total) : 'Rp 0';
                document.getElementById('medicine-info-container').classList.remove('hidden');

                const theadRow = document.getElementById('parameters-header-row');
                theadRow.innerHTML = `
                    <th class="px-6 py-4 text-left font-bold text-gray-700">Parameter Uji</th>
                    <th class="px-6 py-4 text-left font-bold text-gray-700">Metode Uji</th>
                    <th class="px-6 py-4 text-center font-bold text-gray-700">Jumlah Sampel Min</th>
                    <th class="px-6 py-4 text-left font-bold text-gray-700">Satuan</th>
                    <th class="px-6 py-4 text-right font-bold text-gray-700">Harga</th>
                `;

                const tbody = document.getElementById('parameters-tbody');
                tbody.innerHTML = '';
                if (data.parameters && data.parameters.length > 0) {
                    data.parameters.forEach(param => {
                        tbody.innerHTML += `
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">${param.parameter_uji || '-'}</td>
                                <td class="px-6 py-4">${param.metode || '-'}</td>
                                <td class="px-6 py-4 text-center font-semibold">${param.minimal_sampel || 0}</td>
                                <td class="px-6 py-4">${param.satuan || '-'}</td>
                                <td class="px-6 py-4 text-right font-semibold">${param.harga ? formatCurrency(param.harga) : '-'}</td>
                            </tr>`;
                    });
                } else {
                    tbody.innerHTML = '<tr><td colspan="5" class="text-center py-4">Tidak ada parameter uji.</td></tr>';
                }
                document.getElementById('parameters-section').classList.remove('hidden');
            });
    }

    function loadOtskDetails(klaimId) {
        fetch(`/api/otsk/${klaimId}`)
            .then(res => res.json())
            .then(data => {
                document.getElementById('medicine-info-container').classList.add('hidden');

                const theadRow = document.getElementById('parameters-header-row');
                theadRow.innerHTML = `
                    <th class="px-6 py-4 text-left font-bold text-gray-700 w-1/3">Parameter Uji</th>
                    <th class="px-6 py-4 text-left font-bold text-gray-700">Metode Uji & Detail</th>
                    <th class="px-6 py-4 text-center font-bold text-gray-700 w-1/6">Jumlah Sampel</th>
                `;

                const tbody = document.getElementById('parameters-tbody');
                tbody.innerHTML = '';
                if (data.parameters && data.parameters.length > 0) {
                    data.parameters.forEach(param => {
                        tbody.innerHTML += `<tr class="bg-gray-50 border-b border-gray-200"><td class="px-6 py-4 font-semibold text-[#003366]" colspan="3">${param.parameter_uji || '-'}</td></tr>`;
                        if (param.metodes && param.metodes.length > 0) {
                            param.metodes.forEach(metode => {
                                tbody.innerHTML += `<tr class="hover:bg-white border-b border-gray-100"><td class="px-6 py-3 pl-12 text-gray-400 text-sm"><i class="fas fa-level-up-alt rotate-90 mr-2"></i> Metode</td><td class="px-6 py-3 text-sm"><div class="font-medium text-gray-800">${metode.metode_uji || '-'}</div><div class="text-xs text-gray-500 mt-1">Teknik: ${metode.teknik || '-'}</div></td><td class="px-6 py-3 text-center text-sm">${metode.jumlah_sampel || '-'} ${metode.satuan || ''}</td></tr>`;
                            });
                        } else {
                            tbody.innerHTML += `<tr><td class="px-6 py-2 pl-12 text-gray-400 italic text-sm" colspan="3">Belum ada data metode uji</td></tr>`;
                        }
                    });
                } else {
                    tbody.innerHTML = '<tr><td colspan="3" class="text-center py-4">Tidak ada parameter uji.</td></tr>';
                }
                document.getElementById('parameters-section').classList.remove('hidden');
            });
    }

    function loadTipeProdukDetails(tipeId) {
        fetch(`/api/tipe-produk/${tipeId}`)
            .then(res => res.json())
            .then(data => {
                document.getElementById('medicine-info-container').classList.add('hidden');
                const theadRow = document.getElementById('parameters-header-row');
                theadRow.innerHTML = `<th class="px-6 py-4 text-left font-bold text-gray-700 w-1/4">Klaim</th><th class="px-6 py-4 text-left font-bold text-gray-700 w-1/4">Parameter Uji</th><th class="px-6 py-4 text-left font-bold text-gray-700">Metode Uji</th><th class="px-6 py-4 text-center font-bold text-gray-700 w-1/6">Sampel</th>`;
                const tbody = document.getElementById('parameters-tbody');
                tbody.innerHTML = '';
                let hasData = false;
                if (data.klaims && data.klaims.length > 0) {
                    data.klaims.forEach(klaim => {
                        if (klaim.parameters && klaim.parameters.length > 0) {
                            hasData = true;
                            klaim.parameters.forEach(param => {
                                let metodeHtml = param.metodes && param.metodes.length > 0 ? '' : '<span class="text-gray-400 italic">-</span>';
                                if (param.metodes) param.metodes.forEach(metode => {
                                    metodeHtml += `<div class="mb-2 pb-2 border-b border-gray-100 last:border-0 last:mb-0 last:pb-0"><div class="font-medium">${metode.metode_uji}</div><div class="text-xs text-gray-500">Teknik: ${metode.teknik} | Sampel: ${metode.jumlah_sampel} ${metode.satuan}</div></div>`;
                                });
                                tbody.innerHTML += `<tr class="hover:bg-gray-50 border-b border-gray-200"><td class="px-6 py-4 align-top">${klaim.nama_klaim || '-'}</td><td class="px-6 py-4 align-top font-medium text-[#003366]">${param.parameter_uji || '-'}</td><td class="px-6 py-4 align-top" colspan="2">${metodeHtml}</td></tr>`;
                            });
                        }
                    });
                }
                if (!hasData) tbody.innerHTML = '<tr><td colspan="4" class="text-center py-4">Tidak ada data klaim dan parameter uji.</td></tr>';
                document.getElementById('parameters-section').classList.remove('hidden');
            });
    }

    // Global click listener to hide suggestions
    document.addEventListener('click', (e) => {
        if (!searchInput.contains(e.target)) searchSuggestions.classList.add('hidden');
        if (!medSearchContainer.contains(e.target)) medSuggestions.classList.add('hidden');
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && panganDetailModal && !panganDetailModal.classList.contains('hidden')) {
            closePanganDetailModal();
        }
    });

    // Main category selection logic
    window.selectCategory = function(category, element) {
        activeCategory = category;

        // --- Update Card Styles ---
        document.querySelectorAll('.category-card').forEach(card => {
            card.classList.remove('bg-emerald-50', 'border-emerald-500', 'shadow-lg', '-translate-y-1');
            card.classList.add('bg-white', 'border-transparent', 'hover:border-emerald-200', 'shadow-md', 'hover:shadow-xl', 'hover:-translate-y-1');

            const icon = card.querySelector('i');
            if (icon) {
                icon.classList.remove('text-[#10b981]');
                icon.classList.add('text-[#003366]', 'group-hover:text-[#10b981]');
            }

            const title = card.querySelector('h3');
            if (title) {
                title.classList.remove('text-[#003366]');
                title.classList.add('text-gray-700', 'group-hover:text-[#003366]');
            }
        });

        element.classList.remove('bg-white', 'border-transparent', 'hover:border-emerald-200', 'shadow-md', 'hover:shadow-xl', 'hover:-translate-y-1');
        element.classList.add('bg-emerald-50', 'border-emerald-500', 'shadow-lg', '-translate-y-1');

        const activeIcon = element.querySelector('i');
        if (activeIcon) {
            activeIcon.classList.remove('text-[#003366]', 'group-hover:text-[#10b981]');
            activeIcon.classList.add('text-[#10b981]');
        }

        const activeTitle = element.querySelector('h3');
        if (activeTitle) {
            activeTitle.classList.remove('text-gray-700', 'group-hover:text-[#003366]');
            activeTitle.classList.add('text-[#003366]');
        }

        // --- Update Search UI ---
        const titles = {'obat': 'Obat', 'otsk': 'Obat Tradisional & Suplemen Kesehatan', 'kosmetik': 'Kosmetik', 'pangan': 'Pangan'};
        document.getElementById('search-section-title').textContent = `Pencarian ${titles[category]} dan Parameter Uji`;

        // Hide all search containers first
        otskSearchContainer.classList.add('hidden');
        medSearchContainer.classList.add('hidden');
        panganSearchContainer.classList.add('hidden');

        // Show the correct container based on category
        if (category === 'otsk') {
            otskSearchContainer.classList.remove('hidden');
        } else if (category === 'pangan') {
            panganSearchContainer.classList.remove('hidden');
        } else { // 'obat' or 'kosmetik'
            medSearchContainer.classList.remove('hidden');
            medSearchInput.placeholder = `Ketik nama ${category.toLowerCase()}...`;
        }

        // --- Reset states ---
        medSearchInput.value = '';
        medSuggestions.classList.add('hidden');
        panganSearchInput.value = '';
        panganSearchResults.innerHTML = '';
        closePanganDetailModal();
        document.getElementById('medicine-info-container').classList.add('hidden');
        document.getElementById('parameters-section').classList.add('hidden');
        if (otskTypeSelect) otskTypeSelect.value = '';
        if (otskClaimSelect) { otskClaimSelect.value = ''; otskClaimSelect.disabled = true; }
    };

    // --- Initial Setup ---
    fetch('/api/tipe-produk')
        .then(res => res.json())
        .then(data => {
            data.forEach(tipe => {
                const option = document.createElement('option');
                option.value = tipe.id_produk;
                option.textContent = tipe.nama_tipe;
                otskTypeSelect.appendChild(option);
            });
        });
});
</script>
@endsection
