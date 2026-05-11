<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('harga_total_pangan')) {
            Schema::create('harga_total_pangan', function (Blueprint $table) {
                $table->id('id_harga');
                $table->integer('id_uji');
                $table->decimal('harga_total', 15, 2);

                $table->foreign('id_uji')
                    ->references('id_uji')
                    ->on('parameter_uji_pangan')
                    ->onDelete('cascade');
            });
        }

        if (Schema::hasColumn('parameter_uji_pangan', 'harga_total')) {
            $existingRows = DB::table('harga_total_pangan')->count();

            if ($existingRows === 0) {
                DB::table('parameter_uji_pangan')
                    ->whereNotNull('harga_total')
                    ->orderBy('id_uji')
                    ->select('id_uji', 'harga_total')
                    ->chunk(100, function ($parameters) {
                        foreach ($parameters as $parameter) {
                            DB::table('harga_total_pangan')->insert([
                                'id_uji' => $parameter->id_uji,
                                'harga_total' => $parameter->harga_total,
                            ]);
                        }
                    });
            }
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('harga_total_pangan');
    }
};
