<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('metode_uji_pangan', function (Blueprint $table) {
            if (!Schema::hasColumn('metode_uji_pangan', 'keterangan')) {
                $table->string('keterangan', 512)->nullable()->after('satuan');
            }
        });

        Schema::table('harga_total_pangan', function (Blueprint $table) {
            if (!Schema::hasColumn('harga_total_pangan', 'keterangan')) {
                $table->string('keterangan', 512)->nullable()->after('harga_total');
            }
        });
    }

    public function down(): void
    {
        Schema::table('harga_total_pangan', function (Blueprint $table) {
            if (Schema::hasColumn('harga_total_pangan', 'keterangan')) {
                $table->dropColumn('keterangan');
            }
        });

        Schema::table('metode_uji_pangan', function (Blueprint $table) {
            if (Schema::hasColumn('metode_uji_pangan', 'keterangan')) {
                $table->dropColumn('keterangan');
            }
        });
    }
};
