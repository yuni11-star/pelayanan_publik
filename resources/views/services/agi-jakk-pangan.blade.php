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
                        <span class="ml-1 md:ml-2 font-medium text-gray-700">Pangan (CPPOB)</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="bg-[#003366] text-white rounded-2xl shadow-xl p-10 mb-8 relative overflow-hidden">
            <div class="relative z-10">
                <h1 class="text-4xl font-extrabold mb-4">Informasi Pangan (CPPOB)</h1>
                <p class="text-emerald-100 text-lg max-w-3xl">
                    Panduan dan informasi CPPOB untuk pelaku usaha pangan.
                </p>
            </div>
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-emerald-500 opacity-10 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            <section class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Informasi Dasar Registrasi</h2>
                <ul class="text-gray-700 text-sm space-y-2">
                    <li>
                        📄
                        <a href="https://drive.google.com/file/d/17dY03T_7AtVaQ8VtxFzzvVdWSLgMgSw9/view?usp=drive_link" data-modal-link class="text-[#003366] hover:text-[#10b981] hover:underline">
                            booklet 1 Informasi Umum Registrasi
                        </a>
                    </li>
                    <li>
                        📄
                        <a href="https://drive.google.com/file/d/18Tjsq3dJ5yPVXcbe9iqIjv8NFCTjXHnb/view?usp=drive_link" data-modal-link class="text-[#003366] hover:text-[#10b981] hover:underline">
                            booklet 2 Registrasi Akun Perusahaan
                        </a>
                    </li>
                    <li>
                        📄
                        <a href="https://drive.google.com/file/d/1s63NaLSg9U0LhIg7k8R6b53mGK3b6WZz/view?usp=drive_link" data-modal-link class="text-[#003366] hover:text-[#10b981] hover:underline">
                            booklet 3 Registrasi Pangan
                        </a>
                    </li>
                </ul>
            </section>

            <section class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Label Pangan</h2>
                <ul class="text-gray-700 text-sm space-y-2">
                    <li>📄
                        <a href="https://drive.google.com/file/d/1BNiQl0PjIC0CssJuJuzhoCFL7tin9vro/view?usp=drive_link" data-modal-link class="text-[#003366] hover:text-[#10b981] hover:underline">
                            booklet 4 Label Pangan Olahan
                        </a>
                    </li>
                </ul>
            </section>

            <section class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Alur Registrasi</h2>
                <ul class="text-gray-700 text-sm space-y-2">
                    <li>📄
                        <a href="https://drive.google.com/file/d/1f2r0sZJ7Xoua6DExk8MuWs2nkqdLNMqS/view?usp=drive_link" data-modal-link class="text-[#003366] hover:text-[#10b981] hover:underline">
                            Alur Registrasi Pangan Olahan BPOM
                        </a>
                    </li>
                </ul>
            </section>

            <section class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Regulasi</h2>
                <ul class="text-gray-700 text-sm space-y-2">
                    <li>📄 
                        <a href="https://drive.google.com/file/d/1DClEazpyizGgugaeUegcCfzhxFSd7rCI/view?usp=drive_link" data-modal-link class="text-[#003366] hover:text-[#10b981] hover:underline">
                            Per BPOM No.13 Tahun 2023
                        </a>
                    </li>
                </ul>
            </section>

            <section class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Materi Pembinaan</h2>
                <ul class="text-gray-700 text-sm space-y-2">
                    <li>📄
                        <a href="https://docs.google.com/presentation/d/1lGpTb8x_-YEZ9Ny0pkIRhpUTdeYYrG6j/edit?usp=drive_link&ouid=106224472982296200942&rtpof=true&sd=true" data-modal-link class="text-[#003366] hover:text-[#10b981] hover:underline">
                            Materi UMKM Hebat
                        </a>
                    </li>
                </ul>
            </section>

            <section class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Standar & Pengawasan</h2>
                <ul class="text-gray-700 text-sm space-y-2">
                    <li>📄 
                        <a href="https://drive.google.com/file/d/1tU2OcYkHf_Qk0uFuNtauECbc70C_oI_t/view?usp=drive_link" data-modal-link class="text-[#003366] hover:text-[#10b981] hover:underline">
                            Pengawasan Pre Market
                        </a>
                    </li>
                    <li>📄
                        <a href="https://drive.google.com/file/d/1AxJkLPGV5PCRoHNDx2fGw_haZWx7Um-1/view?usp=drive_link" data-modal-link class="text-[#003366] hover:text-[#10b981] hover:underline">
                            Tata Cara Pengisian CPPB
                        </a>
                    </li>
                </ul>
            </section>

            <section class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Dokumen Persyaratan IP CPPOB</h2>
                <ul class="text-gray-700 text-sm space-y-2">
                    <li>📄
                        <a href="https://drive.google.com/file/d/1GjkeM4BTt01A09DBaPL-8_dqYl5HiQ4F/view?usp=drive_link" data-modal-link class="text-[#003366] hover:text-[#10b981] hover:underline">
                            Alur Produksi dan Denah
                        </a>
                    </li>

                    <li>📄
                        <a href="https://docs.google.com/document/d/1TdicxVpmUT3OUrVLWXCySbMu5AtCxoOZ/edit?usp=drive_link&ouid=106224472982296200942&rtpof=true&sd=true" data-modal-link class="text-[#003366] hover:text-[#10b981] hover:underline">
                            SOP
                        </a>
                    </li>

                    <li>📄
                        <a href="https://docs.google.com/document/d/194JOXEFfvkQHtgxrBZUZFLY4tSDfzjzE/edit?usp=drive_link&ouid=106224472982296200942&rtpof=true&sd=true" data-modal-link class="text-[#003366] hover:text-[#10b981] hover:underline">
                            Data Dukung Penilaian Mandiri
                        </a>
                    </li>

                    <li>📄
                        <a href="https://drive.google.com/file/d/1xrQDAmiEDUH9PnAr5qtNLu8W2ciXMDfk/view?usp=drive_link" data-modal-link class="text-[#003366] hover:text-[#10b981] hover:underline">
                            Formulir Penilaian Mandiri (Untuk UMK Risiko Menengah Tinggi)
                        </a>
                    </li>

                    <li>📄
                        <a href="https://docs.google.com/document/d/1vpxPsfgKxI_1vU1PFrGUOsMZl4UBTzAy/edit?usp=drive_link&ouid=106224472982296200942&rtpof=true&sd=true" data-modal-link class="text-[#003366] hover:text-[#10b981] hover:underline">
                            Surat Pemenuhan Komitmen (Risiko Rendah)
                        </a>
                    </li>

                    <li>📄
                        <a href="https://docs.google.com/document/d/1VGRQwBjuif5M-bUyVke6wc95boI6BlZe/edit?usp=drive_link&ouid=106224472982296200942&rtpof=true&sd=true" data-modal-link class="text-[#003366] hover:text-[#10b981] hover:underline">
                            Surat Pemenuhan Standar Penerapan CPPOB (Risiko Menengah Tinggi)
                        </a>
                    </li>
                </ul>
            </section>
        </div>
    </div>
</div>

<div id="doc-modal" class="fixed inset-0 hidden items-center justify-center bg-black/60 backdrop-blur-sm z-50 p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-5xl h-[90vh] overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h3 id="doc-modal-title" class="text-lg font-semibold text-[#003366]">Dokumen</h3>
            <button type="button" id="doc-modal-close" class="text-gray-500 hover:text-gray-700 text-2xl leading-none">&times;</button>
        </div>
        <div class="w-full h-[calc(90vh-64px)] overflow-hidden">
            <iframe id="doc-modal-iframe" src="" class="w-full h-full" allow="autoplay" scrolling="yes"></iframe>
        </div>
    </div>
</div>

<script>
    (function () {
        const modal = document.getElementById('doc-modal');
        const iframe = document.getElementById('doc-modal-iframe');
        const closeBtn = document.getElementById('doc-modal-close');
        const titleEl = document.getElementById('doc-modal-title');
        const openLinks = document.querySelectorAll('[data-modal-link]');

        function toDrivePreview(url) {
            if (!url) return url;
            if (url.includes('/preview')) return url;
            const match = url.match(/\/d\/([^/]+)\//);
            if (match && match[1]) {
                return `https://drive.google.com/file/d/${match[1]}/preview`;
            }
            return url;
        }

        function openModal(url, title) {
            titleEl.textContent = title || 'Dokumen';
            iframe.src = toDrivePreview(url);
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        }

        function closeModal() {
            iframe.src = '';
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }

        openLinks.forEach((link) => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                openModal(link.getAttribute('href'), link.textContent.trim());
            });
        });

        closeBtn.addEventListener('click', closeModal);
        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeModal();
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });
    })();
</script>
@endsection
