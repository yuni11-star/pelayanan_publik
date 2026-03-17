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
                        <span class="ml-1 md:ml-2 font-medium text-gray-700">Kosmetik (CPKB)</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="bg-[#003366] text-white rounded-2xl shadow-xl p-10 mb-8 relative overflow-hidden">
            <div class="relative z-10">
                <h1 class="text-4xl font-extrabold mb-4">Informasi Kosmetik (CPKB)</h1>
                <p class="text-emerald-100 text-lg max-w-3xl">
                    Informasi CPKB untuk produksi dan peredaran kosmetik.
                </p>
            </div>
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-emerald-500 opacity-10 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-1 xl:grid-cols-3 gap-6">
            <section class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Persyaratan CPKB</h2>
                <ul class="text-gray-700 text-sm space-y-2">
                    <li><a href="https://drive.google.com/file/d/1SoZ0-qx6xfa0nCno0riJlrUAR22run2L/view?usp=drive_link" class="hover:text-emerald-600 js-drive-preview">Bangunan dan Fasilitas</a></li>
                    <li><a href="https://drive.google.com/file/d/1a-iTZbSgKCjE9-V2toimscjnNOKT-vJJ/view?usp=drive_link" class="hover:text-emerald-600 js-drive-preview">Higiene dan Sanitasi</a></li>
                    <li><a href="https://drive.google.com/file/d/1A8Fj87NMS8H6q_1bV52Xojp4oAI1mGIG/view?usp=drive_link" class="hover:text-emerald-600 js-drive-preview">Produksi</a></li>
                    <li><a href="https://drive.google.com/file/d/1xJvX4nwAmEhv55l6ggQ7EEhMaEhCxHfU/view?usp=drive_link" class="hover:text-emerald-600 js-drive-preview">Pengawasan Mutu</a></li>
                    <li><a href="https://drive.google.com/file/d/1mMevSvs5XTF23QBJJpSYIHAKnGEAb5jK/view?usp=drive_link" class="hover:text-emerald-600 js-drive-preview">Dokumentasi</a></li>
                </ul>
            </section>

            <section class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Panduan Pendaftaran</h2>
                <ul class="text-gray-700 text-sm space-y-2">
                    <li><a href="https://drive.google.com/file/d/1JOd0jwxEwHOSI2HGgFWzFzlgZ0_TmzUl/view?usp=drive_link" class="hover:text-emerald-600 js-drive-preview">Alur Pendaftaran Badan Usaha</a></li>
                    <li><a href="https://drive.google.com/file/d/1QGtqTeJsAlJLFk0dOK5O2ySbc3wPhYoD/view?usp=drive_link" class="hover:text-emerald-600 js-drive-preview">Alur Proses Notifikasi</a></li>
                    <li><a href="https://drive.google.com/file/d/1YuIKaGGLay5eg5JamAz6xs3KakIK4fPS/view?usp=drive_link" class="hover:text-emerald-600 js-drive-preview">Tata Cara Pendaftaran Baru NIE Multi Pabrik</a></li>
                    <li><a href="https://drive.google.com/file/d/16pC5xGJADdT3gQM8XV5I93eLzD2j4_Mo/view?usp=drive_link" class="hover:text-emerald-600 js-drive-preview">Tata Cara Pendaftaran Produk Baru Melalui OSS</a></li>
                    <li><a href="https://drive.google.com/file/d/1AU1Pd8aAho-KZWoELOQfCDKicnVD1U7G/view?usp=drive_link" class="hover:text-emerald-600 js-drive-preview">Tata Cara Pendaftaran Produk KIT</a></li>
                    <li><a href="https://drive.google.com/file/d/18yJH3t1f62UpKWbqs7nI5GWZ0_Svzlfz/view?usp=drive_link" class="hover:text-emerald-600 js-drive-preview">Tata Cara Pendaftaran Produk Konfirmasi</a></li>
                    <li><a href="https://drive.google.com/file/d/1HV0C08aV2w04AJ5byrTb5ZCLFz3o9eVR/view?usp=drive_link" class="hover:text-emerald-600 js-drive-preview">Tata Cara Pendaftaran Variasi NIE Multi Pabrik</a></li>
                    <li><a href="https://drive.google.com/file/d/1DJR_lz6D-7ONnW6JeUOL8A-CfC-dFJcb/view?usp=drive_link" class="hover:text-emerald-600 js-drive-preview">Tata Cara Pengajuan Notifikasi</a></li>
                </ul>
            </section>

            <section class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Dokumen Persyaratan</h2>
                <ul class="text-gray-700 text-sm space-y-2">
                    <li><a href="https://drive.google.com/file/d/1GKSx94WEKBxPE-LxXsu_wNug2l1FBMgF/view?usp=drive_link" class="hover:text-emerald-600 js-drive-preview">Kelengkapan Dokumen</a></li>
                    <li><a href="https://drive.google.com/file/d/1Leb2cU_1XVqz9ifTH0SotIp3EQf4EpL9/view?usp=drive_link" class="hover:text-emerald-600 js-drive-preview">Dokumen Informasi Produk</a></li>
                    <li><a href="https://drive.google.com/file/d/1IinHudJAFlE-27_WkI6H6fbVLvltm5tz/view?usp=drive_link" class="hover:text-emerald-600 js-drive-preview">Denah Bangunan Industri</a></li>
                    <li><a href="https://drive.google.com/file/d/1O6KIMaKkg1DCiYtoiBXCbCnDg5Y6qQ7O/view?usp=drive_link" class="hover:text-emerald-600 js-drive-preview">Contoh Surat</a></li>
                </ul>
            </section>

            <section class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-[#003366] mb-3">Regulasi</h2>
                <ul class="text-gray-700 text-sm space-y-2">
                    <li><a href="https://drive.google.com/file/d/1rtaFScRi7xu3mzUPQug2tqSAWVbddUKc/view?usp=drive_link" class="hover:text-emerald-600 js-drive-preview">Regulasi Bahan Kosmetik</a></li>
                    <li><a href="https://drive.google.com/file/d/1NV1Z_zQLhvYB1yNxfwB_c1G-7DQ3ct2l/view?usp=drive_link" class="hover:text-emerald-600 js-drive-preview">Tarif PNBP</a></li>
                </ul>
            </section>

            <section class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-[#003366] mb-3">FAQ</h2>
                <ul class="text-gray-700 text-sm space-y-2">
                    <li><a href="https://drive.google.com/file/d/1EYOYQCqiudZ1BzpfI8MYbFCwkv-Jux29/view?usp=drive_link" class="hover:text-emerald-600 js-drive-preview">A-Z Notifikasi Kosmetik Jilid 1</a></li>
                    <li><a href="https://drive.google.com/file/d/1bo7s-A5u3VOyZFhHCYVwdEyJBZnIlJn0/view?usp=drive_link" class="hover:text-emerald-600 js-drive-preview">A-Z Notifikasi Kosmetik Jilid 2</a></li>
                    <li><a href="https://drive.google.com/file/d/1NEaocFBZ637gsUKZmlAOtez5CKnmnBPn/view?usp=drive_link" class="hover:text-emerald-600 js-drive-preview">FAQ Notifikasi Jilid 1</a></li>
                    <li><a href="https://drive.google.com/file/d/1yG1NkDJg304lHdgLcFI9hqu0A36ZqQMD/view?usp=drive_link" class="hover:text-emerald-600 js-drive-preview">FAQ Notifikasi Jilid 2</a></li>
                    <li><a href="https://drive.google.com/file/d/17UHcQ1urxrw7n-OXnyzCErkWeZ0pQ-BP/view?usp=drive_link" class="hover:text-emerald-600 js-drive-preview">FAQ Dokumen Informasi (DIP)</a></li>
                </ul>
            </section>
            
        </div>
    </div>
</div>

<div id="drivePreviewModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 p-4">
    <div class="bg-white w-full max-w-5xl rounded-2xl shadow-2xl overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
            <h3 class="text-lg font-semibold text-[#003366]" id="drivePreviewTitle">Pratinjau Dokumen</h3>
            <button type="button" class="text-gray-500 hover:text-gray-700" id="drivePreviewClose" aria-label="Tutup">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="relative w-full bg-gray-50" style="height: 75vh;">
            <iframe id="drivePreviewFrame" class="absolute inset-0 w-full h-full" src="" allow="autoplay" loading="lazy"></iframe>
        </div>
    </div>
</div>

<script>
    (function () {
        const modal = document.getElementById('drivePreviewModal');
        const frame = document.getElementById('drivePreviewFrame');
        const title = document.getElementById('drivePreviewTitle');
        const closeBtn = document.getElementById('drivePreviewClose');

        function toPreviewUrl(url) {
            try {
                const parsed = new URL(url);
                if (parsed.hostname.includes('drive.google.com')) {
                    const fileMatch = parsed.pathname.match(/\/file\/d\/([^/]+)/);
                    if (fileMatch && fileMatch[1]) {
                        return `https://drive.google.com/file/d/${fileMatch[1]}/preview`;
                    }
                }
            } catch (e) {
                return url;
            }
            return url;
        }

        function openModal(linkEl) {
            const href = linkEl.getAttribute('href');
            const previewUrl = toPreviewUrl(href);
            title.textContent = linkEl.textContent.trim() || 'Pratinjau Dokumen';
            frame.src = previewUrl;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        }

        function closeModal() {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            frame.src = '';
            document.body.classList.remove('overflow-hidden');
        }

        document.querySelectorAll('a.js-drive-preview').forEach((link) => {
            link.addEventListener('click', (event) => {
                event.preventDefault();
                openModal(link);
            });
        });

        closeBtn.addEventListener('click', closeModal);
        modal.addEventListener('click', (event) => {
            if (event.target === modal) {
                closeModal();
            }
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });
    })();
</script>
@endsection

