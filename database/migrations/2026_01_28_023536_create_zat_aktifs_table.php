<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('zat_aktifs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_zat');
            $table->string('jenis_sediaan');
            $table->string('bentuk_sediaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zat_aktifs');
    }
};
