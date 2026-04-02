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

<!-- Halaman utama layanan pengujian -->
<div class="min-h-screen bg-slate-50 py-12">
    <div class="max-w-[95%] mx-auto px-4 sm:px-6 lg:px-8">
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Breadcrumb navigasi -->
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

        <!-- Hero/penjelasan singkat layanan -->
        <div class="bg-[#003366] text-white rounded-2xl shadow-xl p-10 mb-8 relative overflow-hidden">
            <div class="relative z-10">
                <h1 class="text-4xl font-extrabold mb-4">Pengujian Obat dan Makanan</h1>
                <p class="text-emerald-100 text-lg max-w-2xl">Layanan pengujian laboratorium yang akurat dan terpercaya untuk memastikan keamanan produk di wilayah Kalimantan Barat.</p>
            </div>
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-emerald-500 opacity-10 rounded-full"></div>
        </div>

        <!-- Layout utama: konten kiri + panel bantuan kanan -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 mb-8">
            <div class="lg:col-span-4 space-y-8">
                <!-- Deskripsi layanan -->
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

                <!-- Kategori komoditi -->
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

                <!-- Area pencarian & hasil parameter -->
                <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                    <h2 class="text-2xl font-bold text-[#003366] mb-6 flex items-center">
                        <span class="w-2 h-8 bg-[#10b981] rounded-full mr-3"></span>
                        <span id="search-section-title">Pencarian Obat dan Parameter Uji</span>
                    </h2>

                    <div class="space-y-6">
                        <div class="relative">
                            <!-- Searchbox for OT-SK -->
                            <!-- Searchbox OT-SK -->
                            <div id="otsk-search-container" class="hidden">
                                <div class="relative">
                                    <input type="text" id="otsk-search-input" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#10b981] focus:border-transparent bg-white" placeholder="Ketik tipe, klaim, parameter uji, metode uji, atau pustaka..." autocomplete="off">
                                    <div id="otsk-search-suggestions" class="absolute z-50 w-full mt-2 max-h-48 overflow-y-auto bg-white border border-gray-300 rounded-lg shadow-lg hidden"></div>
                                </div>
                            </div>
                            
                            <!-- Original medicine search input -->
                            <!-- Searchbox Obat/Kosmetik/Pangan -->
                            <div id="medicine-search-container" class="relative">
                                <div class="flex items-center relative">
                                    <input type="text" id="medicine-search-input" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#10b981] focus:border-transparent" placeholder="Ketik nama zat aktif..." autocomplete="off">
                                </div>
                                <div id="medicine-search-suggestions" class="absolute z-50 w-full mt-2 max-h-40 overflow-y-auto bg-white border border-gray-300 rounded-lg shadow-lg hidden"></div>
                            </div>
                        </div>

                        <!-- Panel info detail item terpilih -->
                        <div id="medicine-info-container" class="bg-gray-50 rounded-lg p-6 border border-gray-200 hidden">
                            <h3 id="info-panel-title" class="text-lg font-bold text-[#003366] mb-4">Detail Informasi Obat</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 text-sm">
                                <div><strong id="info-label-1" class="block text-gray-500 uppercase text-xs">Zat Aktif</strong> <span id="zat-aktif" class="text-base font-medium"></span></div>
                                <div><strong id="info-label-2" class="block text-gray-500 uppercase text-xs">Jenis Sediaan</strong> <span id="jenis-sediaan" class="text-base font-medium"></span></div>
                                <div><strong id="info-label-3" class="block text-gray-500 uppercase text-xs">Bentuk Sediaan</strong> <span id="bentuk-sediaan" class="text-base font-medium"></span></div>
                                <div><strong id="info-label-4" class="block text-gray-500 uppercase text-xs">Harga Estimasi</strong> <span id="harga-total" class="text-base font-bold text-blue-700"></span></div>
                            </div>
                        </div>

                        <!-- Tabel parameter uji -->
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

            <!-- Panel kanan: persyaratan & bantuan layanan -->
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
    // --- LOGIKA UTAMA PENCARIAN KOMODITI ---

    let activeCategory = 'obat'; // Kategori aktif saat halaman pertama kali dibuka

    function formatCurrency(amount) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        }).format(Number(amount) || 0);
    }

    // Referensi elemen HTML yang dipakai berulang
    const medSearchInput = document.getElementById('medicine-search-input');
    const medSuggestions = document.getElementById('medicine-search-suggestions');
    const medSearchContainer = document.getElementById('medicine-search-container');
    
    const otskSearchContainer = document.getElementById('otsk-search-container');
    const otskSearchInput = document.getElementById('otsk-search-input');
    const otskSuggestions = document.getElementById('otsk-search-suggestions');

    function setInfoPanel(title, label1, label2, label3, label4) {
        document.getElementById('info-panel-title').textContent = title;
        document.getElementById('info-label-1').textContent = label1;
        document.getElementById('info-label-2').textContent = label2;
        document.getElementById('info-label-3').textContent = label3;
        document.getElementById('info-label-4').textContent = label4;
    }

    // Autocomplete untuk input tunggal (Obat, Kosmetik, Pangan)
    medSearchInput.addEventListener('input', function() {
        const query = this.value.trim();
        if (query.length < 1) {
            medSuggestions.classList.add('hidden');
            return;
        }

        let apiUrl = '/api/search-obat';
        if (activeCategory === 'kosmetik') {
            apiUrl = '/api/search-kosmetik';
        } else if (activeCategory === 'pangan') {
            apiUrl = '/api/search-pangan';
        }

        fetch(`${apiUrl}?q=${encodeURIComponent(query)}`)
            .then(res => res.json())
            .then(data => {
                medSuggestions.innerHTML = '';
                data.forEach(item => {
                    const div = document.createElement('div');
                    div.className = 'px-4 py-2 hover:bg-gray-100 cursor-pointer';
                    let displayName = item.zat_aktif;
                    if (activeCategory === 'pangan') {
                        displayName = item.bahan_produk;
                    }
                    div.textContent = displayName;
                    
                    div.addEventListener('click', () => {
                        medSearchInput.value = displayName;
                        medSuggestions.classList.add('hidden');
                        if (activeCategory === 'kosmetik') {
                            loadKosmetikDetails(item.id);
                        } else if (activeCategory === 'pangan') {
                            loadPanganDetails(item.id);
                        } else {
                            loadMedicineDetails(item.id);
                        }
                    });
                    medSuggestions.appendChild(div);
                });
                medSuggestions.classList.toggle('hidden', data.length === 0);
            });
    });

    function escapeHtml(value) {
        return String(value)
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;');
    }

    function formatPriceOrDash(amount) {
        return Number(amount) > 0 ? formatCurrency(amount) : '-';
    }

    function formatPanganTextOrDash(value) {
        if (value === null || value === undefined) {
            return '-';
        }

        const text = String(value).trim();
        if (!text) {
            return '-';
        }

        return escapeHtml(text).replace(/\r?\n/g, '<br>');
    }

    // Jika user menekan Enter pada input utama, jangan submit form
    medSearchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault(); 
            // This can be enhanced to auto-select the first suggestion
        }
    });

    // Autocomplete OT-SK: bisa mencari Tipe, Klaim, Parameter, Metode, Pustaka
    if (otskSearchInput) {
        otskSearchInput.addEventListener('input', function() {
            const query = this.value.trim();
            if (query.length < 1) {
                otskSuggestions.classList.add('hidden');
                return;
            }

            fetch(`/api/search-otsk?q=${encodeURIComponent(query)}`)
                .then(res => res.json())
                .then(data => {
                    otskSuggestions.innerHTML = '';
                    data.forEach(item => {
                        const row = document.createElement('div');
                        row.className = 'flex items-center justify-between gap-3 px-4 py-2 hover:bg-gray-100 cursor-pointer';

                        const labelWrap = document.createElement('div');
                        labelWrap.className = 'min-w-0';

                        const label = document.createElement('div');
                        label.className = 'text-sm font-medium text-gray-800 truncate';
                        label.textContent = item.name || '-';

                        const context = document.createElement('div');
                        context.className = 'text-xs text-gray-500 truncate';
                        if (item.context) {
                            context.textContent = `Klaim: ${item.context}`;
                        }

                        labelWrap.appendChild(label);
                        if (item.context) labelWrap.appendChild(context);

                        const badge = document.createElement('span');
                        badge.className = 'text-[10px] uppercase tracking-wide px-2 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-100 shrink-0';
                        const typeLabels = {
                            tipe: 'Tipe',
                            klaim: 'Klaim',
                            parameter: 'Parameter',
                            metode: 'Metode',
                            pustaka: 'Pustaka'
                        };
                        badge.textContent = typeLabels[item.type] || 'Hasil';

                        row.appendChild(labelWrap);
                        row.appendChild(badge);

                        row.addEventListener('click', () => {
                            otskSearchInput.value = item.name || '';
                            otskSuggestions.classList.add('hidden');
                            if (item.type === 'tipe') {
                                loadTipeProdukDetails(item.id);
                            } else {
                                loadOtskDetails(item.id);
                            }
                        });

                        otskSuggestions.appendChild(row);
                    });

                    otskSuggestions.classList.toggle('hidden', data.length === 0);
                });
        });

        otskSearchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
            }
        });
    }

    // --- FUNGSI AMBIL DATA & RENDER (detail obat/kosmetik/pangan/otsk) ---
    function loadMedicineDetails(medicineId) {
        fetch(`/api/obat/${medicineId}`)
            .then(res => {
                if (!res.ok) throw new Error('Gagal memuat detail obat');
                return res.json();
            })
            .then(data => {
                setInfoPanel('Detail Informasi Obat', 'Zat Aktif', 'Jenis Sediaan', 'Bentuk Sediaan', 'Harga Estimasi');
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
            })
            .catch(error => {
                console.error('Error fetching medicine detail:', error);
                document.getElementById('medicine-info-container').classList.add('hidden');
                document.getElementById('parameters-section').classList.remove('hidden');
                document.getElementById('parameters-header-row').innerHTML = `
                    <th class="px-6 py-4 text-left font-bold text-gray-700">Status</th>
                `;
                document.getElementById('parameters-tbody').innerHTML = `
                    <tr><td class="px-6 py-4 text-red-600">Terjadi kesalahan saat mengambil detail obat.</td></tr>
                `;
            });
    }

    function loadKosmetikDetails(kosmetikId) {
        fetch(`/api/kosmetik/${kosmetikId}`)
            .then(res => res.json())
            .then(data => {
                setInfoPanel('Detail Informasi Kosmetik', 'Kategori Kosmetik', 'Tipe Produk', 'Keterangan', 'Harga Estimasi');
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
                setInfoPanel('Detail Informasi Pangan', 'Bahan Produk', 'Waktu Layanan', 'Jenis Komoditi', 'Keterangan');
                document.getElementById('zat-aktif').textContent = data.bahan_produk || '-';
                document.getElementById('jenis-sediaan').textContent = data.waktu ? data.waktu + ' Hari' : '-';
                document.getElementById('bentuk-sediaan').textContent = 'Komoditi Pangan';
                document.getElementById('harga-total').textContent = '-';
                document.getElementById('medicine-info-container').classList.remove('hidden');

                const theadRow = document.getElementById('parameters-header-row');
                theadRow.innerHTML = `
                    <th class="px-6 py-4 text-left font-bold text-gray-700">Parameter Uji</th>
                    <th class="px-6 py-4 text-left font-bold text-gray-700">Metode Uji</th>
                    <th class="px-6 py-4 text-center font-bold text-gray-700">Jumlah Sampel Min</th>
                    <th class="px-6 py-4 text-left font-bold text-gray-700">Satuan</th>
                    <th class="px-6 py-4 text-right font-bold text-gray-700">Harga</th>
                    <th class="px-6 py-4 text-right font-bold text-gray-700">Total</th>
                `;

                const tbody = document.getElementById('parameters-tbody');
                tbody.innerHTML = '';
                if (data.parameters && data.parameters.length > 0) {
                    data.parameters.forEach(param => {
                        tbody.innerHTML += `
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">${param.parameter_uji || '-'}</td>
                                <td class="px-6 py-4 whitespace-pre-line">${formatPanganTextOrDash(param.metode)}</td>
                                <td class="px-6 py-4 text-center font-semibold">${param.minimal_sampel || 0}</td>
                                <td class="px-6 py-4">${param.satuan || '-'}</td>
                                <td class="px-6 py-4 text-right font-semibold whitespace-pre-line">${formatPanganTextOrDash(param.harga)}</td>
                                <td class="px-6 py-4 text-right font-semibold whitespace-pre-line">${formatPanganTextOrDash(param.total)}</td>
                            </tr>`;
                    });
                } else {
                    tbody.innerHTML = '<tr><td colspan="6" class="text-center py-4">Tidak ada parameter uji.</td></tr>';
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
                                tbody.innerHTML += `<tr class="hover:bg-white border-b border-gray-100"><td class="px-6 py-3 pl-12 text-gray-400 text-sm"><i class="fas fa-level-up-alt rotate-90 mr-2"></i> Metode</td><td class="px-6 py-3 text-sm"><div class="font-medium text-gray-800">${metode.metode_uji || '-'}</div><div class="text-xs text-gray-500 mt-1">Sediaan: ${metode.sediaan || '-'} | Pustaka: ${metode.pustaka || '-'} | Teknik: ${metode.teknik || '-'}</div></td><td class="px-6 py-3 text-center text-sm">${metode.jumlah_sampel || '-'} ${metode.satuan || ''}</td></tr>`;
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
                                    metodeHtml += `<div class="mb-2 pb-2 border-b border-gray-100 last:border-0 last:mb-0 last:pb-0"><div class="font-medium">${metode.metode_uji}</div><div class="text-xs text-gray-500">Sediaan: ${metode.sediaan || '-'} | Pustaka: ${metode.pustaka || '-'} | Teknik: ${metode.teknik || '-'} | Sampel: ${metode.jumlah_sampel || '-'} ${metode.satuan || ''}</div></div>`;
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

    // Klik di luar input: sembunyikan daftar suggestion
    document.addEventListener('click', (e) => {
        if (medSearchContainer && !medSearchContainer.contains(e.target)) {
            medSuggestions.classList.add('hidden');
        }

        if (otskSearchContainer && otskSuggestions && !otskSearchContainer.contains(e.target)) {
            otskSuggestions.classList.add('hidden');
        }
    });

    // Saat kategori komoditi dipilih (Obat/OT-SK/Kosmetik/Pangan)
    window.selectCategory = function(category, element) {
        activeCategory = category;

        // --- Update style kartu kategori yang aktif ---
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

        // --- Update judul & area pencarian sesuai kategori ---
        const titles = {'obat': 'Obat', 'otsk': 'OT-SK', 'kosmetik': 'Kosmetik', 'pangan': 'Pangan'};
        document.getElementById('search-section-title').textContent = `Pencarian ${titles[category]} dan Parameter Uji`;

        // Sembunyikan semua area pencarian terlebih dahulu
        otskSearchContainer.classList.add('hidden');
        medSearchContainer.classList.add('hidden');

        // Tampilkan area pencarian yang sesuai kategori
        if (category === 'otsk') {
            otskSearchContainer.classList.remove('hidden');
        } else { // kategori: obat, kosmetik, atau pangan
            medSearchContainer.classList.remove('hidden');
            const placeholders = {
                obat: 'Ketik nama zat aktif...',
                kosmetik: 'Ketik nama kosmetik...',
                pangan: 'Ketik nama komoditi atau parameter pangan...'
            };
            medSearchInput.placeholder = placeholders[category] || 'Ketik nama...';
        }

        // --- Reset tampilan & data lama saat ganti kategori ---
        medSearchInput.value = '';
        medSuggestions.classList.add('hidden');
        document.getElementById('medicine-info-container').classList.add('hidden');
        document.getElementById('parameters-section').classList.add('hidden');
        if (otskSearchInput) otskSearchInput.value = '';
        if (otskSuggestions) otskSuggestions.classList.add('hidden');
    };

    // --- Inisialisasi awal halaman ---
});
</script>
@endsection
