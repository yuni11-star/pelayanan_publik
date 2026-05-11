<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('parameter_uji_pangan', function (Blueprint $table) {
            if (!Schema::hasColumn('parameter_uji_pangan', 'minimal_sampel')) {
                $table->decimal('minimal_sampel', 10, 2)->nullable()->after('parameter_uji');
            }

            if (!Schema::hasColumn('parameter_uji_pangan', 'satuan')) {
                $table->string('satuan', 50)->nullable()->after('minimal_sampel');
            }

            if (!Schema::hasColumn('parameter_uji_pangan', 'harga_total')) {
                $table->decimal('harga_total', 15, 2)->nullable()->after('satuan');
            }

            if (!Schema::hasColumn('parameter_uji_pangan', 'keterangan')) {
                $table->text('keterangan')->nullable()->after('harga_total');
            }
        });

        Schema::table('metode_uji_pangan', function (Blueprint $table) {
            if (!Schema::hasColumn('metode_uji_pangan', 'sampel_minimal')) {
                $table->decimal('sampel_minimal', 10, 2)->nullable()->after('metode');
            }

            if (!Schema::hasColumn('metode_uji_pangan', 'satuan')) {
                $table->string('satuan', 50)->nullable()->after('sampel_minimal');
            }

            if (!Schema::hasColumn('metode_uji_pangan', 'harga')) {
                $table->decimal('harga', 15, 2)->nullable()->after('satuan');
            }
        });
    }

    public function down(): void
    {
        // This migration is intentionally additive and keeps columns on rollback
        // because some existing imports already define the same structure.
    }
};
