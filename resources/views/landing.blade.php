<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBPOM Pontianak - Badan Pengawas Obat dan Makanan</title>
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
</head>
<body class="font-sans bg-gray-50">

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="bg-[#003366] text-white py-2 px-4 md:px-12 flex justify-between items-center text-sm">
    <div id="current-date">
        </div>
    <div class="flex gap-4">
        <a href="#" class="hover:text-blue-400"><i class="fab fa-facebook"></i></a>
        <a href="#" class="hover:text-pink-400"><i class="fab fa-instagram"></i></a>
        <a href="#" class="hover:text-red-500"><i class="fab fa-youtube"></i></a>
    </div>
</div>

<script>
    // Script Sederhana untuk Tanggal Indonesia
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const today  = new Date();
    document.getElementById('current-date').innerHTML = today.toLocaleDateString('id-ID', options);
</script>

    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="/" class="text-gray-900 hover:text-navy px-3 py-2 rounded-md text-sm font-medium transition duration-150">Beranda</a>
                        <a href="#services" class="text-gray-900 hover:text-navy px-3 py-2 rounded-md text-sm font-medium transition duration-150">Layanan</a>
                        <a href="#contact" class="text-gray-900 hover:text-navy px-3 py-2 rounded-md text-sm font-medium transition duration-150">Kontak</a>
                    </div>
                </div>
                <div class="md:hidden">
                    <button type="button" class="bg-navy inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
            <div class="md:hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <a href="/" class="text-gray-900 hover:text-navy block px-3 py-2 rounded-md text-base font-medium">Beranda</a>
                    <a href="#services" class="text-gray-900 hover:text-navy block px-3 py-2 rounded-md text-base font-medium">Layanan</a>
                    <a href="#contact" class="text-gray-900 hover:text-navy block px-3 py-2 rounded-md text-base font-medium">Kontak</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative bg-cover bg-center bg-no-repeat text-white py-20" style="background-image: url('/images/bbpom.jpg');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">
                    Badan Pengawas Obat dan Makanan
                    <span class="block text-3xl md:text-4xl text-gold mt-2">Pontianak</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
                    Memastikan keamanan obat dan makanan untuk kesehatan dan kehidupan dll.... bisa tambahkan
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#services" class="bg-gold text-navy px-8 py-4 rounded-lg font-semibold text-lg hover:bg-yellow-400 transition duration-300">
                        Layanan Publik
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
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-navy mb-4">Layanan Kami</h2>
                <div class="w-24 h-1 bg-gold mx-auto mb-6"></div>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Standar Pelayanan Publik BBPOM Pontianak
                </p>
            </div>

            <!-- Sertifikasi & Perizinan Section -->
            <div class="mb-16">
                <h3 class="text-3xl font-bold text-navy mb-8 text-center">Sertifikasi & Perizinan</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    <!-- Service 3 -->
                    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition duration-300">
                        <div class="flex flex-col items-start mb-4">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-file-alt text-navy text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-navy mb-3">Izin Penerapan CPPOB</h3>
                            <p class="text-gray-600 text-xs line-clamp-2 mb-4">
                                Izin penerapan Cara Produksi Pangan Olahan yang Baik untuk industri pangan.
                            </p>
                            <a href="#" class="inline-block bg-navy text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-blue-800 transition duration-300">
                                Selengkapnya
                            </a>
                        </div>
                    </div>

                    <!-- Service 4 -->
                    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition duration-300">
                        <div class="flex flex-col items-start mb-4">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-bell text-navy text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-navy mb-3">Rekomendasi Notifikasi Kosmetika</h3>
                            <p class="text-gray-600 text-xs line-clamp-2 mb-4">
                                Rekomendasi untuk notifikasi produk kosmetika sesuai regulasi yang berlaku.
                            </p>
                            <a href="#" class="inline-block bg-navy text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-blue-800 transition duration-300">
                                Selengkapnya
                            </a>
                        </div>
                    </div>

                    <!-- Service 5 -->
                    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition duration-300">
                        <div class="flex flex-col items-start mb-4">
                            <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-certificate text-navy text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-navy mb-3">Sertifikasi CPKB</h3>
                            <p class="text-gray-600 text-xs line-clamp-2 mb-4">
                                Sertifikasi Cara Pengolahan Keamanan Bahan untuk industri pangan.
                            </p>
                            <a href="#" class="inline-block bg-navy text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-blue-800 transition duration-300">
                                Selengkapnya
                            </a>
                        </div>
                    </div>

                    <!-- Service 6 -->
                    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition duration-300">
                        <div class="flex flex-col items-start mb-4">
                            <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-shield-alt text-navy text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-navy mb-3">Sertifikasi CPOTB</h3>
                            <p class="text-gray-600 text-xs line-clamp-2 mb-4">
                                Sertifikasi Cara Pengolahan Obat Tradisional yang Baik.
                            </p>
                            <a href="#" class="inline-block bg-navy text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-blue-800 transition duration-300">
                                Selengkapnya
                            </a>
                        </div>
                    </div>

                    <!-- Service 7 -->
                    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition duration-300">
                        <div class="flex flex-col items-start mb-4">
                            <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-check-circle text-navy text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-navy mb-3">Sertifikasi CDOB</h3>
                            <p class="text-gray-600 text-xs line-clamp-2 mb-4">
                                Sertifikasi Cara Distribusi Obat yang Baik untuk distribusi obat.
                            </p>
                            <a href="#" class="inline-block bg-navy text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-blue-800 transition duration-300">
                                Selengkapnya
                            </a>
                        </div>
                    </div>

                    <!-- Service 10 -->
                    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition duration-300">
                        <div class="flex flex-col items-start mb-4">
                            <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-leaf text-navy text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-navy mb-3">Rekomendasi Importir Obat Alam & Suplemen</h3>
                            <p class="text-gray-600 text-xs line-clamp-2 mb-4">
                                Rekomendasi untuk importir obat alami dan suplemen kesehatan.
                            </p>
                            <a href="#" class="inline-block bg-navy text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-blue-800 transition duration-300">
                                Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Layanan Informasi & Logistik Section -->
            <div>
                <h3 class="text-3xl font-bold text-navy mb-8 text-center">Layanan Informasi & Logistik</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                    <!-- Service 1 -->
                    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition duration-300">
                        <div class="flex flex-col items-start mb-4">
                            <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-exclamation-triangle text-navy text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-navy mb-3">Pengaduan Masyarakat & Informasi</h3>
                            <p class="text-gray-600 text-xs line-clamp-2 mb-4">
                                Layanan pengaduan masyarakat dan informasi obat serta makanan.
                            </p>
                            <a href="{{ route('layanan.pengaduan-informasi') }}" class="inline-block bg-navy text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-blue-800 transition duration-300">
                                Selengkapnya
                            </a>
                        </div>
                    </div>

                    <!-- Service 2 -->
                    <a href="{{ route('layanan.pengujian') }}" class="block bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition duration-300">
                        <div class="flex flex-col items-start mb-4">
                            <div class="w-10 h-10 bg-emerald-50 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-flask text-navy text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-navy mb-3">Pengujian Obat dan Makanan</h3>
                            <p class="text-gray-600 text-xs line-clamp-2 mb-4">
                                Layanan pengujian laboratorium sesuai standar keamanan.
                            </p>
                            <span class="inline-block bg-navy text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-emerald-500 transition duration-300">
                                Selengkapnya
                            </span>
                        </div>
                    </a>

                    <!-- Service 8 -->
                    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition duration-300">
                        <div class="flex flex-col items-start mb-4">
                            <div class="w-10 h-10 bg-pink-100 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-plane text-navy text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-navy mb-3">Surat Keterangan Ekspor (SKE)</h3>
                            <p class="text-gray-600 text-xs line-clamp-2 mb-4">
                                Surat Keterangan Ekspor untuk produk obat dan makanan.
                            </p>
                            <a href="#" class="inline-block bg-navy text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-blue-800 transition duration-300">
                                Selengkapnya
                            </a>
                        </div>
                    </div>

                    <!-- Service 9 -->
                    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition duration-300">
                        <div class="flex flex-col items-start mb-4">
                            <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-ship text-navy text-sm"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-navy mb-3">Surat Keterangan Impor (SKI)</h3>
                            <p class="text-gray-600 text-xs line-clamp-2 mb-4">
                                Surat Keterangan Impor untuk produk obat dan makanan.
                            </p>
                            <a href="#" class="inline-block bg-navy text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-blue-800 transition duration-300">
                                Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Standar Pelayanan Section -->
    <section id="standards" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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
                                    Nama Dokumen
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-navy mb-4">Hubungi Kami </h2>
                <div class="w-24 h-1 bg-gold mx-auto mb-6"></div>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Isi nya sesuai rikues kak fitri
                    Tetap Terhubung bersama tim kami untuk bimbingan? pencerahan? asistensi? tentang makanan dan obat 
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div>
                    <h3 class="text-2xl font-semibold text-navy mb-6">Tetap terhubung lebih dekat</h3>
                    <div class="space-y-6">
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
                        <a href="#" class="text-white hover:text-gold transition duration-150">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                        <a href="#" class="text-white hover:text-gold transition duration-150">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-white hover:text-gold transition duration-150">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-white hover:text-gold transition duration-150">
                            <i class="fab fa-youtube text-xl"></i>
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
    </script>
</body>
</html>
