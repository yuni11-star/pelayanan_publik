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
        if (Schema::hasTable('kosmetiks') && Schema::hasColumn('kosmetiks', 'id_kos')) {
            DB::statement('ALTER TABLE kosmetiks MODIFY id_kos INT(11) NOT NULL AUTO_INCREMENT');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('kosmetiks') && Schema::hasColumn('kosmetiks', 'id_kos')) {
            DB::statement('ALTER TABLE kosmetiks MODIFY id_kos INT(11) NOT NULL');
        }
    }
};
