<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Remove duplicates, keeping the one with the smallest ID
        DB::statement('
            DELETE t1 FROM tipe_produks t1
            INNER JOIN tipe_produks t2
            WHERE t1.id > t2.id AND t1.nama_tipe = t2.nama_tipe
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No rollback needed as this is a cleanup
    }
};
