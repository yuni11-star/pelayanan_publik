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
        // Add new column
        Schema::table('tipe_produk', function (Blueprint $table) {
            $table->unsignedBigInteger('id_produk')->after('id');
        });

        // Copy data
        DB::statement('UPDATE tipe_produk SET id_produk = id');

        // Drop old primary key and add new one
        Schema::table('tipe_produk', function (Blueprint $table) {
            $table->dropColumn('id');
            $table->primary('id_produk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Add back old column
        Schema::table('tipe_produks', function (Blueprint $table) {
            $table->dropPrimary('id_produk');
            $table->unsignedBigInteger('id')->first();
        });

        // Copy data back
        DB::statement('UPDATE tipe_produks SET id = id_produk');

        // Drop new column
        Schema::table('tipe_produks', function (Blueprint $table) {
            $table->dropColumn('id_produk');
            $table->primary('id');
        });
    }
};
