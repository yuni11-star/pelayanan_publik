<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriIndikasi;
use App\Models\Analit;
use App\Models\MetodeAnalisis;

class KategoriIndikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Kategori Indikasi
        $kategori1 = KategoriIndikasi::create(['nama_kategori' => 'Stamina Pria']);
        $kategori2 = KategoriIndikasi::create(['nama_kategori' => 'Pelangsing']);
        $kategori3 = KategoriIndikasi::create(['nama_kategori' => 'Pegal Linu']);

        // Seed Analit for each kategori
        $analit1 = Analit::create(['nama_analit' => 'Kofein', 'kategori_indikasi_id' => $kategori1->id]);
        $analit2 = Analit::create(['nama_analit' => 'Sibutramin HCl', 'kategori_indikasi_id' => $kategori2->id]);
        $analit3 = Analit::create(['nama_analit' => 'Fenilbutazon', 'kategori_indikasi_id' => $kategori3->id]);

        // Seed Metode Analisis
        MetodeAnalisis::create([
            'analit_id' => $analit1->id,
            'sediaan' => 'Padat',
            'teknik_analisis' => 'KLT-Spektrofotodensitometri',
            'jumlah_sampel' => 12
        ]);

        MetodeAnalisis::create([
            'analit_id' => $analit2->id,
            'sediaan' => 'Padat',
            'teknik_analisis' => 'KLT-Spektrofotodensitometri',
            'jumlah_sampel' => 6
        ]);

        MetodeAnalisis::create([
            'analit_id' => $analit3->id,
            'sediaan' => 'Semua Bentuk',
            'teknik_analisis' => 'Identifikasi',
            'jumlah_sampel' => 0
        ]);
    }
}
