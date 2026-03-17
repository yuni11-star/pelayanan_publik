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
                        <span class="ml-1 md:ml-2 font-medium text-gray-700">AGI JAKK</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="bg-[#003366] text-white rounded-2xl shadow-xl p-10 mb-8 relative overflow-hidden">
            <div class="relative z-10">
                <h1 class="text-4xl font-extrabold mb-4">AKSI DAMPINGI & JANGKAU UMKM KALBAR</h1>
                <p class="text-emerald-100 text-lg max-w-3xl">
                    Aksi Dampingi dan Jangkau UMKM Kalbar.
                </p>
            </div>
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-emerald-500 opacity-10 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            <section class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Form AGI JAKK</h2>
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
            <section class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Informasi Pangan (CPPOB)</h2>
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
            <section class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Informasi Kosmetik (CPKB)</h2>
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
            <section class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Informasi Obat (CDOB)</h2>
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
            <section class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Informasi Obat Tradisional (CPOTB)</h2>
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
</div>
@endsection
