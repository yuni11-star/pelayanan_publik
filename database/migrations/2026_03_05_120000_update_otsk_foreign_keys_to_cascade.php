<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $this->dropForeignByColumn('produk_klaim', 'id_produk');
        $this->dropForeignByColumn('parameter_uji_otsk', 'id_klaim');
        $this->dropForeignByColumn('metode_uji_otsk', 'id_uji');

        Schema::table('produk_klaim', function (Blueprint $table) {
            $table->foreign('id_produk', 'fk_produk_klaim_tipe_produk')
                ->references('id_produk')
                ->on('tipe_produk')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });

        Schema::table('parameter_uji_otsk', function (Blueprint $table) {
            $table->foreign('id_klaim', 'fk_parameter_uji_otsk_produk_klaim')
                ->references('id_klaim')
                ->on('produk_klaim')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });

        Schema::table('metode_uji_otsk', function (Blueprint $table) {
            $table->foreign('id_uji', 'fk_metode_uji_otsk_parameter_uji_otsk')
                ->references('id_uji')
                ->on('parameter_uji_otsk')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        $this->dropForeignByColumn('produk_klaim', 'id_produk');
        $this->dropForeignByColumn('parameter_uji_otsk', 'id_klaim');
        $this->dropForeignByColumn('metode_uji_otsk', 'id_uji');

        Schema::table('produk_klaim', function (Blueprint $table) {
            $table->foreign('id_produk', 'fk_produk_klaim_tipe_produk')
                ->references('id_produk')
                ->on('tipe_produk');
        });

        Schema::table('parameter_uji_otsk', function (Blueprint $table) {
            $table->foreign('id_klaim', 'fk_parameter_uji_otsk_produk_klaim')
                ->references('id_klaim')
                ->on('produk_klaim');
        });

        Schema::table('metode_uji_otsk', function (Blueprint $table) {
            $table->foreign('id_uji', 'fk_metode_uji_otsk_parameter_uji_otsk')
                ->references('id_uji')
                ->on('parameter_uji_otsk');
        });
    }

    private function dropForeignByColumn(string $table, string $column): void
    {
        $database = DB::getDatabaseName();
        $result = DB::selectOne(
            'SELECT CONSTRAINT_NAME
             FROM information_schema.KEY_COLUMN_USAGE
             WHERE TABLE_SCHEMA = ?
               AND TABLE_NAME = ?
               AND COLUMN_NAME = ?
               AND REFERENCED_TABLE_NAME IS NOT NULL
             LIMIT 1',
            [$database, $table, $column]
        );

        if ($result && isset($result->CONSTRAINT_NAME)) {
            DB::statement("ALTER TABLE `$table` DROP FOREIGN KEY `{$result->CONSTRAINT_NAME}`");
        }
    }
};

