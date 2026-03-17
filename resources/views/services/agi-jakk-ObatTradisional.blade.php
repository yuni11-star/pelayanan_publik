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
                        <span class="ml-1 md:ml-2 font-medium text-gray-700">Obat Tradisional (CPOTB)</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="bg-[#003366] text-white rounded-2xl shadow-xl p-10 mb-8 relative overflow-hidden">
            <div class="relative z-10">
                <h1 class="text-4xl font-extrabold mb-4">Informasi Obat Tradisional (CPOTB)</h1>
                <p class="text-emerald-100 text-lg max-w-3xl">
                    Informasi CPOTB untuk produksi obat tradisional yang bermutu, aman, dan sesuai ketentuan.
                </p>
            </div>
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-emerald-500 opacity-10 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <div class="flex items-center justify-between mb-3">
                    <h2 class="text-xl font-bold text-[#003366]">Alur CPOTB</h2>
                    <span class="text-xs font-semibold text-amber-700 bg-amber-100 px-2 py-1 rounded-full">Segera tersedia</span>
                </div>
                <p class="text-gray-700 text-sm">
                    Ringkasan alur penerapan CPOTB dari persiapan hingga evaluasi.
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <div class="flex items-center justify-between mb-3">
                    <h2 class="text-xl font-bold text-[#003366]">Self Assessment</h2>
                    <span class="text-xs font-semibold text-amber-700 bg-amber-100 px-2 py-1 rounded-full">Segera tersedia</span>
                </div>
                <p class="text-gray-700 text-sm">
                    Form penilaian mandiri kesiapan penerapan CPOTB di fasilitas produksi.
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <div class="flex items-center justify-between mb-3">
                    <h2 class="text-xl font-bold text-[#003366]">Pedoman CPOTB</h2>
                    <span class="text-xs font-semibold text-amber-700 bg-amber-100 px-2 py-1 rounded-full">Segera tersedia</span>
                </div>
                <p class="text-gray-700 text-sm">
                    Pedoman resmi penerapan CPOTB untuk industri obat tradisional.
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <div class="flex items-center justify-between mb-3">
                    <h2 class="text-xl font-bold text-[#003366]">FAQ Perizinan</h2>
                    <span class="text-xs font-semibold text-amber-700 bg-amber-100 px-2 py-1 rounded-full">Segera tersedia</span>
                </div>
                <p class="text-gray-700 text-sm">
                    Pertanyaan umum seputar perizinan, sertifikasi, dan kewajiban CPOTB.
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <div class="flex items-center justify-between mb-3">
                    <h2 class="text-xl font-bold text-[#003366]">Regulasi</h2>
                    <span class="text-xs font-semibold text-amber-700 bg-amber-100 px-2 py-1 rounded-full">Segera tersedia</span>
                </div>
                <p class="text-gray-700 text-sm">
                    Regulasi dan ketentuan terbaru terkait obat tradisional dan CPOTB.
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <div class="flex items-center justify-between mb-3">
                    <h2 class="text-xl font-bold text-[#003366]">Formulir & Template</h2>
                    <span class="text-xs font-semibold text-amber-700 bg-amber-100 px-2 py-1 rounded-full">Segera tersedia</span>
                </div>
                <p class="text-gray-700 text-sm">
                    Kumpulan formulir dan template dokumen untuk pelaku usaha.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
