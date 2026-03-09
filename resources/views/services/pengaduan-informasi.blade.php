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
        <nav class="flex mb-5 text-gray-500 text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/" class="hover:text-[#10b981]">Beranda</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-xs mx-2"></i>
                        <span class="ml-1 md:ml-2 font-medium text-gray-700">Pengaduan Masyarakat & Informasi</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="bg-[#003366] text-white rounded-2xl shadow-xl p-10 mb-8 relative overflow-hidden">
            <div class="relative z-10">
                <h1 class="text-4xl font-extrabold mb-4">Pengaduan Masyarakat & Informasi</h1>
                <p class="text-emerald-100 text-lg max-w-3xl">
                    Layanan untuk menerima pengaduan masyarakat serta memberikan informasi terkait obat dan makanan secara cepat, tepat, dan akuntabel.
                </p>
            </div>
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-emerald-500 opacity-10 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-2xl font-bold text-[#003366] mb-6 flex items-center">
                    <span class="w-2 h-8 bg-[#10b981] rounded-full mr-3"></span>
                    Kanal Pengaduan
                </h2>
                <div class="space-y-4 text-gray-700">
                    <div class="flex items-start">
                        <i class="fas fa-phone-alt text-[#10b981] mt-1 mr-3"></i>
                        <p>Telepon: <span class="font-semibold">(0561) 737720 / (0561) 572417</span></p>
                    </div>
                    <div class="flex items-start">
                        <i class="fab fa-whatsapp text-[#10b981] mt-1 mr-3"></i>
                        <p>WhatsApp:
                            <a href="https://wa.me/6282255470600" target="_blank" rel="noopener noreferrer" class="font-semibold text-[#003366] hover:underline">
                                +62 822-5547-0600
                            </a>
                        </p>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-envelope text-[#10b981] mt-1 mr-3"></i>
                        <p>Email: <span class="font-semibold">bpom_pontianak@pom.go.id</span></p>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-map-marker-alt text-[#10b981] mt-1 mr-3"></i>
                        <p>Datang langsung ke kantor BBPOM Pontianak pada jam layanan: Senin - Kamis 07.30 - 16.00, Jumat 07.30 - 16.30.</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-2xl font-bold text-[#003366] mb-6 flex items-center">
                    <span class="w-2 h-8 bg-[#10b981] rounded-full mr-3"></span>
                    Informasi Layanan
                </h2>
                <ul class="space-y-3 text-gray-700 list-disc list-inside">
                    <li>Informasi keamanan, mutu, dan manfaat obat serta makanan.</li>
                    <li>Panduan pelaporan dugaan produk tidak memenuhi ketentuan.</li>
                    <li>Konsultasi awal terkait tindak lanjut pengaduan.</li>
                    <li>Penyampaian perkembangan penanganan pengaduan.</li>
                </ul>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100 mt-8">
            <h2 class="text-2xl font-bold text-[#003366] mb-6 flex items-center">
                <span class="w-2 h-8 bg-[#10b981] rounded-full mr-3"></span>
                Alur Singkat Pengaduan
            </h2>
            <ol class="grid grid-cols-1 md:grid-cols-4 gap-4 text-sm text-gray-700">
                <li class="bg-emerald-50 rounded-xl p-4"><span class="font-semibold text-[#003366]">1.</span> Sampaikan pengaduan melalui kanal layanan.</li>
                <li class="bg-emerald-50 rounded-xl p-4"><span class="font-semibold text-[#003366]">2.</span> Verifikasi data pelapor dan informasi produk.</li>
                <li class="bg-emerald-50 rounded-xl p-4"><span class="font-semibold text-[#003366]">3.</span> Tindak lanjut oleh petugas sesuai kewenangan.</li>
                <li class="bg-emerald-50 rounded-xl p-4"><span class="font-semibold text-[#003366]">4.</span> Penyampaian hasil/umpan balik ke pelapor.</li>
            </ol>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100 mt-8">
            <h2 class="text-2xl font-bold text-[#003366] mb-6 flex items-center">
                <span class="w-2 h-8 bg-[#10b981] rounded-full mr-3"></span>
                Pelayanan Lainnya
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                <div class="border border-gray-200 rounded-xl p-5 hover:shadow-md transition duration-300">
                    <h3 class="text-lg font-semibold text-[#003366] mb-2">Update Informasi Publik Setiap Hari (DAILI)</h3>
                    <p class="text-sm text-gray-600 mb-4">Akses informasi publik harian melalui kanal resmi.</p>
                    <a href="https://linktr.ee/infokompnk" target="_blank" rel="noopener noreferrer" class="inline-flex items-center text-sm font-semibold text-[#10b981] hover:underline">
                        Kunjungi Layanan <i class="fas fa-arrow-up-right-from-square ml-2 text-xs"></i>
                    </a>
                </div>

                <div class="border border-gray-200 rounded-xl p-5 hover:shadow-md transition duration-300">
                    <h3 class="text-lg font-semibold text-[#003366] mb-2">Registrasi OBA</h3>
                    <p class="text-sm text-gray-600 mb-4">Portal registrasi OBA untuk pelaku usaha terkait.</p>
                    <a href="https://asrot.pom.go.id/asrot/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center text-sm font-semibold text-[#10b981] hover:underline">
                        Kunjungi Layanan <i class="fas fa-arrow-up-right-from-square ml-2 text-xs"></i>
                    </a>
                </div>

                <div class="border border-gray-200 rounded-xl p-5 hover:shadow-md transition duration-300">
                    <h3 class="text-lg font-semibold text-[#003366] mb-2">SPP-IRT</h3>
                    <p class="text-sm text-gray-600 mb-4">Panduan registrasi SPP-IRT untuk kebutuhan perizinan.</p>
                    <a href="https://sppirt.pom.go.id/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center text-sm font-semibold text-[#10b981] hover:underline">
                        Kunjungi Layanan <i class="fas fa-arrow-up-right-from-square ml-2 text-xs"></i>
                    </a>
                </div>

                <div class="border border-gray-200 rounded-xl p-5 hover:shadow-md transition duration-300">
                    <h3 class="text-lg font-semibold text-[#003366] mb-2">Registrasi Produk Pangan Olahan</h3>
                    <p class="text-sm text-gray-600 mb-4">Persyaratan mendapatkan nomor izin edar produk pangan olahan.</p>
                    <a href="https://rumahsiripo.pom.go.id/informasi/infografis" target="_blank" rel="noopener noreferrer" class="inline-flex items-center text-sm font-semibold text-[#10b981] hover:underline">
                        Kunjungi Layanan <i class="fas fa-arrow-up-right-from-square ml-2 text-xs"></i>
                    </a>
                </div>

                <div class="border border-gray-200 rounded-xl p-5 hover:shadow-md transition duration-300">
                    <h3 class="text-lg font-semibold text-[#003366] mb-2">AGI JAKK</h3>
                    <p class="text-sm text-gray-600 mb-4">Pendampingan UMKM melalui program AGI JAKK.</p>
                    <a href="https://sites.google.com/view/agi-jakk/home" target="_blank" rel="noopener noreferrer" class="inline-flex items-center text-sm font-semibold text-[#10b981] hover:underline">
                        Kunjungi Layanan <i class="fas fa-arrow-up-right-from-square ml-2 text-xs"></i>
                    </a>
                </div>

                <div class="border border-gray-200 rounded-xl p-5 hover:shadow-md transition duration-300">
                    <h3 class="text-lg font-semibold text-[#003366] mb-2">FAQ</h3>
                    <p class="text-sm text-gray-600 mb-4">Frequency Ask Question.</p>
                    <a href="https://sites.google.com/view/faqpomponti/home?authuser=0" target="_blank" rel="noopener noreferrer" class="inline-flex items-center text-sm font-semibold text-[#10b981] hover:underline">
                        Kunjungi Layanan <i class="fas fa-arrow-up-right-from-square ml-2 text-xs"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
