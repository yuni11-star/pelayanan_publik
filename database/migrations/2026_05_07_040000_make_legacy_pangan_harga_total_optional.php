<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('parameter_uji_pangan', 'harga_total')) {
            DB::statement('ALTER TABLE parameter_uji_pangan MODIFY harga_total DECIMAL(15,2) NULL DEFAULT 0');
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('parameter_uji_pangan', 'harga_total')) {
            DB::statement('ALTER TABLE parameter_uji_pangan MODIFY harga_total DECIMAL(15,2) NOT NULL');
        }
    }
};
