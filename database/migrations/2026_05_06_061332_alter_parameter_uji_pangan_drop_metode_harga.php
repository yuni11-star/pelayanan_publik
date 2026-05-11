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
        Schema::table('parameter_uji_pangan', function (Blueprint $table) {
            $table->dropColumn(['metode', 'harga']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parameter_uji_pangan', function (Blueprint $table) {
            $table->string('metode')->nullable();
            $table->decimal('harga', 15, 2)->nullable();
        });
    }
};
