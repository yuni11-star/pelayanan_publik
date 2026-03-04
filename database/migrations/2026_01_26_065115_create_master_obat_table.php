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
        Schema::create('obat', function (Blueprint $table) {
            $table->id('id_obat');
            $table->string('zat_aktif');
            $table->string('jenis_sediaan');
            $table->string('bentuk_sediaan');
            $table->decimal('harga_total', 15, 2)->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat');
    }
};
