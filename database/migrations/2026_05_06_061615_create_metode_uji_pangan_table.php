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
        if (Schema::hasTable('metode_uji_pangan')) {
            return;
        }

        Schema::create('metode_uji_pangan', function (Blueprint $table) {
            $table->id('id_metode');
            $table->unsignedBigInteger('id_uji');
            $table->string('metode');
            $table->decimal('sampel_minimal', 10, 2)->nullable();
            $table->string('satuan', 50)->nullable();
            $table->decimal('harga', 15, 2);
            $table->timestamps();

            $table->foreign('id_uji')->references('id_uji')->on('parameter_uji_pangan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metode_uji_pangan');
    }
};
