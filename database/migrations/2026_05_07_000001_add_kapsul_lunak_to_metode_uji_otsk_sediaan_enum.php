<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasTable('metode_uji_otsk') || ! Schema::hasColumn('metode_uji_otsk', 'sediaan')) {
            return;
        }

        DB::statement("ALTER TABLE metode_uji_otsk MODIFY sediaan ENUM('Padat','Cair','Padat dan Cair','Kapsul Lunak') NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasTable('metode_uji_otsk') || ! Schema::hasColumn('metode_uji_otsk', 'sediaan')) {
            return;
        }

        DB::statement("ALTER TABLE metode_uji_otsk MODIFY sediaan ENUM('Padat','Cair','Padat dan Cair') NOT NULL");
    }
};
