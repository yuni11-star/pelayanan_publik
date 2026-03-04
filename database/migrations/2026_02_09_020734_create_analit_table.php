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
        Schema::create('analit', function (Blueprint $table) {
            $table->id();
            $table->string('nama_analit');
            $table->unsignedBigInteger('kategori_indikasi_id');
            $table->foreign('kategori_indikasi_id')->references('id')->on('kategori_indikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analit');
    }
};
