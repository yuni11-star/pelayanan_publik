<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Buat tabel master Tipe Produk
        Schema::create('tipe_produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tipe');
            $table->timestamps();
        });

        // 2. Tambahkan kolom relasi di tabel produk_klaim
        // Pastikan tabel 'produk_klaim' sudah ada (dari recovery sebelumnya)
        if (Schema::hasTable('produk_klaim')) {
            Schema::table('produk_klaim', function (Blueprint $table) {
                $table->foreignId('tipe_produk_id')->nullable()->constrained('tipe_produks')->onDelete('set null');
            });
        }

        // 3. Seed Data Tipe Produk sesuai permintaan
        $types = [
            'Serbuk / Kapsul/ Tablet/ Pil/ COD/ Rajangan',
            'Obat Tradisional',
            'OT dan Suplemen Kesehatan',
            'OT dan Suplemen Kesehatan mengandung madu',
            'Suplemen Kesehatan'
        ];

        foreach ($types as $type) {
            DB::table('tipe_produks')->insert([
                'nama_tipe' => $type,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        Schema::table('produk_klaim', function (Blueprint $table) {
            $table->dropForeign(['tipe_produk_id']);
            $table->dropColumn('tipe_produk_id');
        });
        Schema::dropIfExists('tipe_produks');
    }
};