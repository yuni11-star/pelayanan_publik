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
                        <span class="ml-1 md:ml-2 font-medium text-gray-700">Obat (CDOB)</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="bg-[#003366] text-white rounded-2xl shadow-xl p-10 mb-8 relative overflow-hidden">
            <div class="relative z-10">
                <h1 class="text-4xl font-extrabold mb-4">Informasi Obat (CDOB)</h1>
                <p class="text-emerald-100 text-lg max-w-3xl">
                    Informasi CDOB untuk distribusi obat yang aman, tertelusur, dan sesuai ketentuan.
                </p>
            </div>
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-emerald-500 opacity-10 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            <a href="https://drive.google.com/file/d/1DCi3AR0EFzZW7_miQ1SwnVldwG31W0WM/view?usp=drive_link"
               data-modal-link
               class="block bg-white rounded-2xl shadow-sm p-8 border border-gray-100 hover:border-emerald-200 hover:shadow-md transition">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Alur CDOB</h2>
                <p class="text-gray-700 text-sm">
                    Alur proses CDOB untuk panduan distribusi obat yang tertib dan sesuai ketentuan.
                </p>
            </a>

            <a href="https://docs.google.com/spreadsheets/d/1DVRMq5eN_MMniKHV5EIjqeAkzDLfCmBx/edit?usp=drive_link&ouid=108811571061090465317&rtpof=true&sd=true"
               data-modal-link
               class="block bg-white rounded-2xl shadow-sm p-8 border border-gray-100 hover:border-emerald-200 hover:shadow-md transition">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Self Assesment</h2>
                <p class="text-gray-700 text-sm">
                    Form penilaian mandiri untuk memastikan kesiapan penerapan CDOB.
                </p>
            </a>

            <a href="https://drive.google.com/file/d/1DQmpI5tgtkqU33pIMxDLhfkznGuhc2f3/view?usp=drive_link"
               data-modal-link
               class="block bg-white rounded-2xl shadow-sm p-8 border border-gray-100 hover:border-emerald-200 hover:shadow-md transition">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Pedoman CDOB 2020</h2>
                <p class="text-gray-700 text-sm">
                    Pedoman resmi penerapan CDOB edisi 2020.
                </p>
            </a>

            <a href="https://drive.google.com/file/d/1DLWE9EQHg2m52d5Yr3CpYkK3NG5KoTRX/view?usp=drive_link"
               data-modal-link
               class="block bg-white rounded-2xl shadow-sm p-8 border border-gray-100 hover:border-emerald-200 hover:shadow-md transition">
                <h2 class="text-xl font-bold text-[#003366] mb-3">FAQ Perizinan dan Sertifikasi CDOB</h2>
                <p class="text-gray-700 text-sm">
                    Pertanyaan umum terkait perizinan dan sertifikasi CDOB.
                </p>
            </a>

            <a href="https://drive.google.com/file/d/1DJswEGv9FdTNnFItPYO3cpAO1QYJEzFZ/view?usp=drive_link"
               data-modal-link
               class="block bg-white rounded-2xl shadow-sm p-8 border border-gray-100 hover:border-emerald-200 hover:shadow-md transition">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Sistem Mekanisme CDOB</h2>
                <p class="text-gray-700 text-sm">
                    Sistem dan mekanisme pelaksanaan CDOB.
                </p>
            </a>

            <a href="https://drive.google.com/file/d/1Y_nqBLHq9retkB4KmEJUF6lhMYCfumJL/view?usp=drive_link"
               data-modal-link
               class="block bg-white rounded-2xl shadow-sm p-8 border border-gray-100 hover:border-emerald-200 hover:shadow-md transition">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Alur Sertifikasi CDOB</h2>
                <p class="text-gray-700 text-sm">
                    Alur sertifikasi CDOB dari pengajuan hingga penerbitan.
                </p>
            </a>
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

        function openModal(linkEl) {
            const title = linkEl.querySelector('h2')?.textContent?.trim() || 'Dokumen';
            const href = linkEl.getAttribute('href');
            titleEl.textContent = title;
            iframe.src = toDrivePreview(href);
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
                openModal(link);
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
