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
        Schema::create('parameter_uji', function (Blueprint $table) {
            $table->id('id_parameter');
            $table->foreignId('id_obat')->constrained('obat', 'id_obat')->onDelete('cascade');
            $table->string('parameter_uji');
            $table->string('metode_uji');
            $table->decimal('jumlah_minimal', 10, 2)->nullable();
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
        Schema::dropIfExists('parameter_uji');
    }
};
