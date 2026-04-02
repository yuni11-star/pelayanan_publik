<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBPOM Pontianak - Layanan Publik</title>
    <link rel="icon" href="{{ asset('images/logo-bpom.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        #tariff-card,
        #other-services-card {
            width: 100%;
        }
    </style>
</head>
<body class="font-sans bg-gray-50">

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="bg-[#003366] text-white py-2">
    <div class="max-w-7xl mx-auto px-4 md:px-6 flex justify-between items-center text-sm">
        <div id="current-date">
            </div>
        <!-- <div class="flex gap-4">
            <a href="https://www.facebook.com/people/Balai-Besar-POM-di-Pontianak/100063553017207/" class="hover:text-blue-400"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/bpom.pontianak/" class="hover:text-pink-400"><i class="fab fa-instagram"></i></a>
            <a href="https://www.youtube.com/@balaibesarpomdipontianak583" class="hover:text-red-500"><i class="fab fa-youtube"></i></a>
        </div> -->
    </div>
</div>

<script>
    // Script Sederhana untuk Tanggal Indonesia
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const today  = new Date();
    document.getElementById('current-date').innerHTML = today.toLocaleDateString('id-ID', options);
</script>

    <!-- Hero Section -->
    <section id="home" class="relative bg-cover bg-center bg-no-repeat text-white py-20" style="background-image: url('/images/bbpom.jpg');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">
                    Pelayanan Publik
                    <span class="block text-3xl md:text-4xl text-gold mt-2">BBPOM Pontianak</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
                    Memastikan keamanan obat dan makanan untuk kesehatan dan kehidupan dll.... bisa tambahkan
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#services" class="bg-gold text-navy px-8 py-4 rounded-lg font-semibold text-lg hover:bg-yellow-400 transition duration-300">
                        Layanan Publik
                    </a>
                    <a href="#agi-jakk" class="bg-white text-navy px-8 py-4 rounded-lg font-semibold text-lg hover:bg-slate-100 transition duration-300">
                        AGI JAKK
                    </a>
                    <a href="#contact" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-white hover:text-navy transition duration-300">
                        Kontak
                    </a>
                </div>
            </div>
        </div>
    </section>



    <!-- Services Section -->
    <section id="services" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-12">
                <div>
                    <div class="flex justify-end mb-6">
                        <div class="w-full max-w-sm">
                            <label for="service-search" class="sr-only">Cari layanan</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                    <i class="fas fa-search"></i>
                                </span>
                                <input
                                    id="service-search"
                                    type="text"
                                    placeholder="Cari layanan "
                                    class="w-full rounded-xl border border-gray-300 bg-white py-3 pl-11 pr-4 text-sm text-gray-700 shadow-sm focus:border-navy focus:outline-none focus:ring-2 focus:ring-blue-100"
                                >
                            </div>
                        </div>
                    </div>

                    <div class="text-left mb-10">
                        <h2 class="text-4xl font-bold text-navy mb-4">Layanan Kami</h2>
                        <div class="w-24 h-1 bg-gold mb-6"></div>
                    </div>

                    <div class="mb-16">
                        <div id="services-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

                    <!-- Service 2 -->
                    <a href="{{ route('layanan.pengujian') }}" class="block md:h-[320px] lg:h-[340px] bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition duration-300">
                        <div class="flex h-full flex-col items-start">
                            <div class="w-10 h-10 bg-emerald-50 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-flask text-navy text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-navy mb-3">Pengujian Obat dan Makanan</h3>
                            <p class="text-gray-600 text-xs line-clamp-2 mb-4">
                                Melihat parameter pengujian dari setiap kategori komoditi untuk memastikannya transparasi masyarakat.
                            </p>
                            <span class="inline-block mt-auto bg-navy text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-emerald-500 transition duration-300">
                                Selengkapnya
                            </span>
                        </div>
                    </a>                              

                    <!-- Service 4 -->
                    <div class="md:h-[320px] lg:h-[340px] bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition duration-300">
                        <div class="flex h-full flex-col items-start">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-bell text-navy text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-navy mb-3">Rekomendasi Notifikasi Kosmetika</h3>
                            <p class="text-gray-600 text-xs line-clamp-2 mb-4">
                                Rekomendasi untuk notifikasi produk kosmetika sesuai regulasi yang berlaku.
                            </p>
                            <a href="https://notifkos.pom.go.id" class="inline-block mt-auto bg-navy text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-blue-800 transition duration-300">
                                Selengkapnya
                            </a>
                        </div>
                    </div>


                    <!-- Service 8 -->
                    <div class="md:h-[320px] lg:h-[340px] bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition duration-300">
                        <div class="flex h-full flex-col items-start">
                            <div class="w-10 h-10 bg-pink-100 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-plane text-navy text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-navy mb-3">Surat Keterangan Ekspor (SKE)</h3>
                            <p class="text-gray-600 text-xs line-clamp-2 mb-4">
                                Surat Keterangan Ekspor untuk produk obat dan makanan.
                            </p>
                            <a href="#" class="inline-block mt-auto bg-navy text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-blue-800 transition duration-300">
                                Selengkapnya
                            </a>
                        </div>
                    </div>

                    <!-- Service 9 -->
                    <div class="md:h-[320px] lg:h-[340px] bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition duration-300">
                        <div class="flex h-full flex-col items-start">
                            <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-ship text-navy text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-navy mb-3">Surat Keterangan Impor (SKI)</h3>
                            <p class="text-gray-600 text-xs line-clamp-2 mb-4">
                                Surat Keterangan Impor untuk produk obat dan makanan.
                            </p>
                            <a href="#" class="inline-block mt-auto bg-navy text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-blue-800 transition duration-300">
                                Selengkapnya
                            </a>
                        </div>
                    </div>

                    <!-- Service 10 -->
                    <div class="md:h-[320px] lg:h-[340px] bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition duration-300">
                        <div class="flex h-full flex-col items-start">
                            <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-leaf text-navy text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-navy mb-3">Rekomendasi Importir Obat Alam & Suplemen</h3>
                            <p class="text-gray-600 text-xs line-clamp-2 mb-4">
                                Rekomendasi untuk importir obat alami dan suplemen kesehatan.
                            </p>
                            <a href="#" class="inline-block mt-auto bg-navy text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-blue-800 transition duration-300">
                                Selengkapnya
                            </a>
                        </div>
                    </div>

                    <div class="md:h-[320px] lg:h-[340px] bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition duration-300">
                        <div class="flex h-full w-full flex-col items-start">
                            <div class="w-10 h-10 bg-teal-100 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-list-check text-navy text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-navy mb-3">Pelayanan Lainnya</h3>
                            <ul class="w-full space-y-2 text-sm text-gray-600 mt-auto">
                                <li>
                                    <a href="https://linktr.ee/infokompnk" class="flex items-center justify-between rounded-lg bg-slate-50 px-4 py-2.5 hover:bg-emerald-50 hover:text-navy transition duration-300">
                                        <span>Update Informasi Publik Setiap Hari (DAILI)</span>
                                        <i class="fas fa-arrow-right text-xs"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://asrot.pom.go.id/asrot/" class="flex items-center justify-between rounded-lg bg-slate-50 px-4 py-2.5 hover:bg-emerald-50 hover:text-navy transition duration-300">
                                        <span>Registrasi OBA</span>
                                        <i class="fas fa-arrow-right text-xs"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://sppirt.pom.go.id/" class="flex items-center justify-between rounded-lg bg-slate-50 px-4 py-2.5 hover:bg-emerald-50 hover:text-navy transition duration-300">
                                        <span>SPP-IRT</span>
                                        <i class="fas fa-arrow-right text-xs"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://rumahsiripo.pom.go.id/informasi/infografis" class="flex items-center justify-between rounded-lg bg-slate-50 px-4 py-2.5 hover:bg-emerald-50 hover:text-navy transition duration-300">
                                        <span>Registrasi Produk Pangan Olahan</span>
                                        <i class="fas fa-arrow-right text-xs"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://sites.google.com/view/faqpomponti/home?authuser=0" class="flex items-center justify-between rounded-lg bg-slate-50 px-4 py-2.5 hover:bg-emerald-50 hover:text-navy transition duration-300">
                                        <span>FAQ</span>
                                        <i class="fas fa-arrow-right text-xs"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                        </div>
                        <p id="services-empty-state" class="hidden text-center text-gray-500 mt-8">
                            Layanan tidak ditemukan. Coba kata kunci lain.
                        </p>
                    </div>
                </div>

                <div id="section-tariff-card-container" class="w-full">
                        <div id="tariff-card" class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                            <h2 class="text-2xl font-bold text-[#003366] mb-6 flex items-center">
                                <span class="w-2 h-8 bg-[#10b981] rounded-full mr-3"></span>
                                Kalkulator Tarif
                            </h2>
                            
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <div class="space-y-4">
                                        <div class="relative">
                                            <label for="search-input" class="block text-sm font-medium text-gray-700 mb-2">JENIS PENERIMAAN NEGARA BUKAN PAJAK</label>
                                            <input type="text" id="search-input" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#10b981] focus:border-transparent" placeholder="Cari jenis penerimaan..." autocomplete="off">
                                            <div id="search-suggestions" class="absolute z-50 w-full mt-2 max-h-40 overflow-y-auto bg-white border border-gray-300 rounded-lg shadow-lg hidden"></div>
                                        </div>
                                        <button id="add-btn" class="w-full bg-[#003366] text-white py-3 px-6 rounded-lg hover:bg-[#002244] transition duration-300 disabled:opacity-50 disabled:cursor-not-allowed">
                                            <i class="fas fa-plus mr-2"></i>Tambah ke list
                                        </button>
                                    </div>
                                </div>

                                <div>
                                    <div class="bg-gray-50 rounded-lg p-4 min-h-[200px]">
                                        <table id="selected-table" class="w-full text-sm">
                                            <thead>
                                                <tr class="border-b border-gray-300">
                                                    <th class="text-left py-2 font-medium text-gray-700 uppercase text-xs">Jenis PNBP</th>
                                                    <th class="text-right py-2 font-medium text-gray-700 uppercase text-xs">(IDR)</th>
                                                    <th class="text-center py-2 font-medium text-gray-700 uppercase text-xs">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="selected-tbody"></tbody>
                                        </table>
                                        <div id="empty-message" class="text-center text-gray-500 py-8">No services selected yet.</div>
                                    </div>
                                    <div class="mt-4 pt-4 border-t border-gray-300">
                                        <div class="flex justify-between items-center text-lg font-semibold">
                                            <span>Total Tarif:</span>
                                            <span id="grand-total" class="text-[#003366]">Rp 0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>

    <!-- AGI JAKK Section -->
    <section id="agi-jakk" class="py-12 bg-slate-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-4xl font-bold text-navy mb-4">AGI JAKK</h2>
                <div class="w-24 h-1 bg-gold mx-auto mb-6"></div>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Aksi Dampingi dan Jangkau UMKM Kalbar.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 justify-items-center">
                <section class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100 w-full">
                    <h3 class="text-xl font-bold text-[#003366] mb-3">Form AGI JAKK</h3>
                    <p class="text-gray-700 text-sm">
                        Form pendaftaran dan pendampingan UMKM melalui program AGI JAKK.
                    </p>
                    <a
                        href="https://docs.google.com/forms/d/e/1FAIpQLSfXDQb-PhAHkjJYw0SBXoUSoGKZXB7UK4dWLNO1wwMKdLIodw/viewform"
                        target="_blank"
                        rel="noopener"
                        class="inline-flex items-center mt-4 px-4 py-2 text-sm font-semibold text-white bg-emerald-600 rounded-lg shadow-sm hover:bg-emerald-700 transition"
                    >
                        Buka Form AGI JAKK
                    </a>
                </section>

                <section class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100 w-full">
                    <h3 class="text-xl font-bold text-[#003366] mb-3">Informasi Pangan (CPPOB)</h3>
                    <p class="text-gray-700 text-sm">
                        Panduan dan informasi CPPOB untuk pelaku usaha pangan.
                    </p>
                    <a
                        href="{{ route('layanan.agi-jakk.pangan') }}"
                        class="inline-flex items-center mt-4 px-4 py-2 text-sm font-semibold text-white bg-[#003366] rounded-lg shadow-sm hover:bg-[#00284d] transition"
                    >
                        Lihat Informasi
                        <i class="fas fa-arrow-right ml-2 text-xs"></i>
                    </a>
                </section>

                <section class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100 w-full">
                    <h3 class="text-xl font-bold text-[#003366] mb-3">Informasi Kosmetik (CPKB)</h3>
                    <p class="text-gray-700 text-sm">
                        Informasi CPKB untuk produksi dan peredaran kosmetik.
                    </p>
                    <a
                        href="{{ route('layanan.agi-jakk.kosmetik') }}"
                        class="inline-flex items-center mt-4 px-4 py-2 text-sm font-semibold text-white bg-[#003366] rounded-lg shadow-sm hover:bg-[#00284d] transition"
                    >
                        Lihat Informasi
                        <i class="fas fa-arrow-right ml-2 text-xs"></i>
                    </a>
                </section>

                <section class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100 w-full">
                    <h3 class="text-xl font-bold text-[#003366] mb-3">Informasi Obat (CDOB)</h3>
                    <p class="text-gray-700 text-sm">
                        Informasi CDOB untuk distribusi obat yang aman dan sesuai.
                    </p>
                    <a
                        href="{{ route('layanan.agi-jakk.obat') }}"
                        class="inline-flex items-center mt-4 px-4 py-2 text-sm font-semibold text-white bg-[#003366] rounded-lg shadow-sm hover:bg-[#00284d] transition"
                    >
                        Lihat Informasi
                        <i class="fas fa-arrow-right ml-2 text-xs"></i>
                    </a>
                </section>

                <section class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100 w-full">
                    <h3 class="text-xl font-bold text-[#003366] mb-3">Informasi Obat Tradisional (CPOTB)</h3>
                    <p class="text-gray-700 text-sm">
                        Informasi CPOTB untuk produksi obat tradisional yang baik.
                    </p>
                    <a
                        href="{{ route('layanan.agi-jakk.obat-tradisional') }}"
                        class="inline-flex items-center mt-4 px-4 py-2 text-sm font-semibold text-white bg-[#003366] rounded-lg shadow-sm hover:bg-[#00284d] transition"
                    >
                        Lihat Informasi
                        <i class="fas fa-arrow-right ml-2 text-xs"></i>
                    </a>
                </section>
            </div>
        </div>
    </section>

    <!-- Standar Pelayanan Section -->
    <section id="standards" class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-navy mb-4">Standar Pelayanan</h2>
                <div class="w-24 h-1 bg-emerald mx-auto mb-6"></div>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Dokumen standar pelayanan publik BBPOM Pontianak yang dapat diunduh untuk referensi dan informasi.
                </p>
            </div>

            <div class="bg-gray-50 rounded-lg shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-navy">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Dokumen
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Kategori
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($documents as $document)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <i class="{{ $document['icon_class'] }} text-lg"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $document['original_name'] }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $document['type'] }} - {{ $document['size_formatted'] }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $document['badge_class'] }}">
                                        {{ $document['type'] }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ asset($document['path']) }}" target="_blank" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-navy hover:bg-blue-800 transition duration-300">
                                        <i class="fas fa-download mr-2"></i>
                                        Unduh
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="px-6 py-8 text-center text-gray-500">
                                    <i class="fas fa-folder-open text-3xl mb-2"></i>
                                    <p>Belum ada dokumen yang diupload.</p>
                                    <p class="text-sm">Dokumen akan muncul di sini setelah diupload oleh admin.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-navy mb-4">Hubungi Kami </h2>
                <div class="w-24 h-1 bg-gold mx-auto mb-6"></div>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Isi nya sesuai rikues kak fitri
                    Tetap Terhubung bersama tim kami untuk bimbingan? pencerahan? asistensi? tentang makanan dan obat 
                </p>
            </div>

            <div class="grid grid-cols-1 gap-12 max-w-4xl mx-auto">
                <div>
                    <h3 class="text-2xl font-semibold text-navy mb-6">Tetap terhubung lebih dekat</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-gold rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-navy"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-navy mb-1">Alamat</h4>
                                <p class="text-gray-600">
                                    Jl. Dokter Sudarso<br>
                                    Pontianak, Kalimantan Barat<br>
                                    Indonesia 78124
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-gold rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-phone text-navy"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-navy mb-1">Telepon</h4>
                                <p class="text-gray-600">0561 737720 </p>
                                <p class="text-gray-600">0561 572417 </p>
                                <p class="text-gray-600">082255470600 (Whatsapp)</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-gold rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-envelope text-navy"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-navy mb-1">Email</h4>
                                <p class="text-gray-600">bpom_pontianak@pom.go.id</p>
                                <p class="text-gray-600">balaipom_pontianak@yahoo.com</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-gold rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-clock text-navy"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-navy mb-1">Jam Buka</h4>
                                <p class="text-gray-600">
                                    Senin - Kamis: 07.30 - 16.00<br>
                                    Jumat: 07.30 - 16.30<br>
                                    Sabtu - Minggu: Libur
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-navy text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">BBPOM Pontianak</h3>
                    <p class="text-sm text-gray-300">
                        Mengawasi keamanan dan kualitas produk obat dan makanan di wilayah Kalimantan Barat.
                    </p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#home" class="hover:text-gold transition duration-150">Home</a></li>
                        <li><a href="#about" class="hover:text-gold transition duration-150">About</a></li>
                        <li><a href="#services" class="hover:text-gold transition duration-150">Services</a></li>
                        <li><a href="#contact" class="hover:text-gold transition duration-150">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Layanan</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-gold transition duration-150">Sertifikasi Produk</a></li>
                        <li><a href="http://127.0.0.1:8000/layanan/pengujian" class="hover:text-gold transition duration-150">Pengujian Laboratorium</a></li>
                        <li><a href="#" class="hover:text-gold transition duration-150">Regulatory Compliance/Belum tau mau ngisi apa</a></li>
                        <li><a href="#" class="hover:text-gold transition duration-150">Quality Assurance/ya bisa lah diganti apa</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="https://www.facebook.com/people/Balai-Besar-POM-di-Pontianak/100063553017207/" class="text-white hover:text-gold transition duration-150">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                        <a href="https://x.com/BPOMPontianak" class="text-white hover:text-gold transition duration-150">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="https://www.instagram.com/bpom.pontianak/" class="text-white hover:text-gold transition duration-150">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="http://www.youtube.com/@balaibesarpomdipontianak583" class="text-white hover:text-gold transition duration-150">
                            <i class="fab fa-youtube text-xl"></i>
                        </a>
                        <a href="https://www.tiktok.com/@bpom.pontianak" class="text-white hover:text-gold transition duration-150">
                            <i class="fab fa-tiktok text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-8 border-t border-gray-700 text-center text-sm text-gray-300">
                <p>&copy; 2026 BBPOM Pontianak. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Kalkulator tarif (dipindahkan dari halaman pengujian)
        document.addEventListener('DOMContentLoaded', () => {
            const tariffSearchInput = document.getElementById('search-input');
            const tariffSearchSuggestions = document.getElementById('search-suggestions');
            const tariffAddBtn = document.getElementById('add-btn');
            const tariffSelectedTbody = document.getElementById('selected-tbody');
            const tariffEmptyMessage = document.getElementById('empty-message');
            const tariffGrandTotal = document.getElementById('grand-total');

            if (!tariffSearchInput || !tariffSearchSuggestions || !tariffAddBtn || !tariffSelectedTbody || !tariffEmptyMessage || !tariffGrandTotal) {
                return;
            }

            let selectedItems = [];
            let currentSelection = null;

            const formatCurrency = (amount) => new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(amount);

            const renderSelectedItems = () => {
                tariffSelectedTbody.innerHTML = '';
                if (selectedItems.length === 0) {
                    tariffEmptyMessage.style.display = 'block';
                } else {
                    tariffEmptyMessage.style.display = 'none';
                    selectedItems.forEach((item, index) => {
                        const row = document.createElement('tr');
                        row.className = 'border-b border-gray-200';
                        row.innerHTML = `<td class="py-3 px-2">${item.jenis_penerimaan}</td><td class="py-3 text-right">${formatCurrency(item.tarif)}</td><td class="py-3 text-center"><button class="text-red-500 delete-btn" data-index="${index}"><i class="fas fa-trash"></i></button></td>`;
                        tariffSelectedTbody.appendChild(row);
                    });
                }
                const total = selectedItems.reduce((sum, item) => sum + parseFloat(item.tarif), 0);
                tariffGrandTotal.textContent = formatCurrency(total);
            };

            const hideSuggestions = () => tariffSearchSuggestions.classList.add('hidden');

            tariffSearchInput.addEventListener('input', function() {
                const query = this.value.trim();
                if (query.length < 1) {
                    tariffSearchSuggestions.innerHTML = '';
                    hideSuggestions();
                    currentSelection = null;
                    return;
                }

                fetch(`/api/search-tarif?q=${encodeURIComponent(query)}`)
                    .then(res => res.json())
                    .then(data => {
                        tariffSearchSuggestions.innerHTML = '';
                        if (!data || data.length === 0) {
                            const emptyRow = document.createElement('div');
                            emptyRow.className = 'px-4 py-2 text-sm text-gray-500';
                            emptyRow.textContent = 'Data tidak ditemukan.';
                            tariffSearchSuggestions.appendChild(emptyRow);
                        } else {
                            data.forEach(item => {
                                const div = document.createElement('div');
                                div.className = 'px-4 py-2 hover:bg-gray-100 cursor-pointer text-sm';
                                div.textContent = `${item.jenis_penerimaan} - ${formatCurrency(item.tarif)}`;
                                div.onclick = () => {
                                    tariffSearchInput.value = item.jenis_penerimaan;
                                    currentSelection = item;
                                    hideSuggestions();
                                };
                                tariffSearchSuggestions.appendChild(div);
                            });
                        }
                        tariffSearchSuggestions.classList.remove('hidden');
                    })
                    .catch(() => {
                        tariffSearchSuggestions.innerHTML = '<div class="px-4 py-2 text-sm text-red-600">Gagal memuat data.</div>';
                        tariffSearchSuggestions.classList.remove('hidden');
                    });
            });

            tariffSearchInput.addEventListener('focus', function() {
                if (tariffSearchSuggestions.innerHTML.trim().length > 0) {
                    tariffSearchSuggestions.classList.remove('hidden');
                }
            });

            document.addEventListener('click', (e) => {
                if (!tariffSearchInput.contains(e.target) && !tariffSearchSuggestions.contains(e.target)) {
                    hideSuggestions();
                }
            });

            tariffAddBtn.addEventListener('click', () => {
                if (!currentSelection) return;
                selectedItems.push(currentSelection);
                renderSelectedItems();
                tariffSearchInput.value = '';
                currentSelection = null;
                hideSuggestions();
            });

            tariffSelectedTbody.addEventListener('click', (e) => {
                const btn = e.target.closest('.delete-btn');
                if (btn) {
                    selectedItems.splice(btn.dataset.index, 1);
                    renderSelectedItems();
                }
            });
        });

        // Mobile menu toggle
        const mobileMenuButton = document.querySelector('[aria-controls="mobile-menu"]');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';
                mobileMenuButton.setAttribute('aria-expanded', !isExpanded);
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Services search filter
        const serviceSearchInput = document.getElementById('service-search');
        const servicesGrid = document.getElementById('services-grid');
        const servicesEmptyState = document.getElementById('services-empty-state');

        if (serviceSearchInput && servicesGrid && servicesEmptyState) {
            const serviceCards = Array.from(servicesGrid.children);

            const filterServices = () => {
                const query = serviceSearchInput.value.trim().toLowerCase();
                let visibleCount = 0;

                serviceCards.forEach((card) => {
                    const cardText = card.textContent.toLowerCase();
                    const isMatch = !query || cardText.includes(query);

                    card.classList.toggle('hidden', !isMatch);
                    if (isMatch) {
                        visibleCount += 1;
                    }
                });

                servicesEmptyState.classList.toggle('hidden', visibleCount > 0);
            };

            serviceSearchInput.addEventListener('input', filterServices);
        }


    </script>
</body>
</html>
