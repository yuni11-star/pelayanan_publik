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
        Schema::create('product_tests', function (Blueprint $table) {
            $table->id();
            $table->string('zat_aktif');
            $table->string('jenis_sediaan');
            $table->string('bentuk_sediaan');
            $table->string('parameter_uji');
            $table->string('metode_uji');
            $table->integer('jumlah_minimal');
            $table->string('satuan');
            $table->decimal('harga', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_tests');
    }
};
