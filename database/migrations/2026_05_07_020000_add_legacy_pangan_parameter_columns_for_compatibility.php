<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('parameter_uji_pangan', function (Blueprint $table) {
            if (!Schema::hasColumn('parameter_uji_pangan', 'metode')) {
                $table->string('metode', 512)->nullable()->after('parameter_uji');
            }

            if (!Schema::hasColumn('parameter_uji_pangan', 'harga')) {
                $table->decimal('harga', 15, 2)->nullable()->after('harga_total');
            }
        });
    }

    public function down(): void
    {
        Schema::table('parameter_uji_pangan', function (Blueprint $table) {
            if (Schema::hasColumn('parameter_uji_pangan', 'metode')) {
                $table->dropColumn('metode');
            }

            if (Schema::hasColumn('parameter_uji_pangan', 'harga')) {
                $table->dropColumn('harga');
            }
        });
    }
};
