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
                <h2 class="text-xl font-bold text-[#003366] mb-3">Alur Pendaftaran Obat Bahan Alam</h2>
                <a href="https://drive.google.com/file/d/1dfWuXW_I9QtkcBfjRBEvnyBH6AjOKFcG/view?usp=drive_link" class="inline-flex items-center text-emerald-700 font-semibold text-sm hover:text-emerald-800">
                    Lihat dokumen
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Materi Registrasi Akun Asrot</h2>
                <a href="https://drive.google.com/file/d/1mvw-H2zvR3bJ1kRJPxahVrcORouJDBlY/view?usp=drive_link" class="inline-flex items-center text-emerald-700 font-semibold text-sm hover:text-emerald-800">
                    Lihat dokumen
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Update Informasi Registrasi Obat Bahan Alam dan Kosmetik</h2>
                <a href="https://drive.google.com/file/d/1aEBVmBNjBUyXJesoHVa3NVNuYAQ3fKSW/view?usp=drive_link" class="inline-flex items-center text-emerald-700 font-semibold text-sm hover:text-emerald-800">
                    Lihat dokumen
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Alur Perizinan Obat Bahan Alam</h2>
                <div class="flex flex-col gap-2">
                    <a href="https://drive.google.com/file/d/1s1fKZYc-DB8XGjQFQy6PDf_jVAi4r7Tu/view?usp=drive_link" class="inline-flex items-center text-emerald-700 font-semibold text-sm hover:text-emerald-800">
                        jpeg
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="https://drive.google.com/file/d/1SkzaxihV93wCxpxKQcJvN4XlxVYvyZQf/view?usp=drive_link" class="inline-flex items-center text-emerald-700 font-semibold text-sm hover:text-emerald-800">
                        pdf
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Alur Sertifikasi CPOTB</h2>
                <a href="https://drive.google.com/file/d/1jpGhF4YY6cNnVwWg2K16Ct8foU2hb0Wy/view?usp=drive_link" class="inline-flex items-center text-emerald-700 font-semibold text-sm hover:text-emerald-800">
                    Lihat dokumen
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Biaya Pengurusan Perizinan Obat Bahan Alam</h2>
                <a href="https://drive.google.com/file/d/1YqMs9RHjptb0yTidS7AeliztcySQBuPy/view?usp=drive_link" class="inline-flex items-center text-emerald-700 font-semibold text-sm hover:text-emerald-800">
                    Lihat dokumen
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Dokumen CPOTB</h2>
                <div class="flex flex-col gap-2">
                    <a href="https://drive.google.com/file/d/169QZyXMn4IriJBY6Yvcg4E2KzlXclTNm/view?usp=drive_link" class="inline-flex items-center text-emerald-700 font-semibold text-sm hover:text-emerald-800">
                        Lihat dokumen 1
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="https://drive.google.com/file/d/14pyg0SatCWDXaHbsF17Qid51_GXOf70a/view?usp=drive_link" class="inline-flex items-center text-emerald-700 font-semibold text-sm hover:text-emerald-800">
                        Lihat dokumen 2
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="https://docs.google.com/document/d/1MQtk9UhBh3gNrhJA7xfobc0p4UdAYMBW/edit?usp=drive_link&ouid=108811571061090465317&rtpof=true&sd=true" class="inline-flex items-center text-emerald-700 font-semibold text-sm hover:text-emerald-800">
                        Lihat dokumen 3
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="https://drive.google.com/file/d/1-HrXjavh1fm5qylrcs8rx0tZpGhSeebB/view?usp=drive_link" class="inline-flex items-center text-emerald-700 font-semibold text-sm hover:text-emerald-800">
                        Lihat dokumen 4
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="https://docs.google.com/document/d/1eVWJW3bUT3ryFOBYiMdQZV-jt8x27Zh4/edit?usp=drive_link&ouid=108811571061090465317&rtpof=true&sd=true" class="inline-flex items-center text-emerald-700 font-semibold text-sm hover:text-emerald-800">
                        Lihat dokumen 5
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
