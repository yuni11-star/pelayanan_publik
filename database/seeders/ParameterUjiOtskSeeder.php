<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ParameterUjiOtsk;
use App\Models\ProdukKlaim;

class ParameterUjiOtskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parameters = [
            'Stamina pria / sehat pria / seks' => [
                ['parameter_uji' => 'Identifikasi bahan aktif', 'metode_uji' => 'Kromatografi', 'harga' => 50000],
                ['parameter_uji' => 'Uji kadar bahan aktif', 'metode_uji' => 'Spektrofotometri', 'harga' => 75000],
            ],
            'Pelangsing / penurun kadar lemak / singset / diet' => [
                ['parameter_uji' => 'Uji kadar lemak', 'metode_uji' => 'Gravimetri', 'harga' => 60000],
                ['parameter_uji' => 'Identifikasi bahan aktif', 'metode_uji' => 'Kromatografi', 'harga' => 50000],
            ],
            'Pegal linu/encok/rematik /sakit pinggang/asam urat' => [
                ['parameter_uji' => 'Uji kadar bahan aktif', 'metode_uji' => 'Spektrofotometri', 'harga' => 75000],
                ['parameter_uji' => 'Uji mikrobiologi', 'metode_uji' => 'Plate Count', 'harga' => 80000],
            ],
            'Nafsu makan / gemuk' => [
                ['parameter_uji' => 'Uji kadar bahan aktif', 'metode_uji' => 'Titrasi', 'harga' => 55000],
            ],
            'Demam/Sakit Kepala' => [
                ['parameter_uji' => 'Uji kadar parasetamol', 'metode_uji' => 'Kromatografi', 'harga' => 65000],
            ],
            'Flu/pilek/masuk angin' => [
                ['parameter_uji' => 'Uji kadar vitamin C', 'metode_uji' => 'Titrasi', 'harga' => 50000],
            ],
            'Sehat wanita' => [
                ['parameter_uji' => 'Uji kadar hormon', 'metode_uji' => 'Imunoassay', 'harga' => 90000],
            ],
            'Kencing manis' => [
                ['parameter_uji' => 'Uji kadar glukosa', 'metode_uji' => 'Enzimatis', 'harga' => 70000],
            ],
            'Batuk' => [
                ['parameter_uji' => 'Uji kadar dekstrometorfan', 'metode_uji' => 'Kromatografi', 'harga' => 60000],
            ],
            'Anti asma/sesak nafas' => [
                ['parameter_uji' => 'Uji kadar salbutamol', 'metode_uji' => 'Spektrofotometri', 'harga' => 75000],
            ],
            'Gangguan Tidur/ penenang' => [
                ['parameter_uji' => 'Uji kadar bahan aktif', 'metode_uji' => 'Kromatografi', 'harga' => 50000],
            ],
            'Gangguan saluran pencernaan/ maag' => [
                ['parameter_uji' => 'Uji kadar antasida', 'metode_uji' => 'Titrasi', 'harga' => 55000],
            ],
            'Cacingan' => [
                ['parameter_uji' => 'Uji kadar mebendazol', 'metode_uji' => 'Kromatografi', 'harga' => 65000],
            ],
            'Jerawat/ bersih darah/ gatal-gatal' => [
                ['parameter_uji' => 'Uji kadar bahan aktif', 'metode_uji' => 'Spektrofotometri', 'harga' => 75000],
            ],
            'Penambah daya tahan tubuh' => [
                ['parameter_uji' => 'Uji kadar vitamin', 'metode_uji' => 'Kromatografi', 'harga' => 60000],
            ],
            'Batu Ginjal' => [
                ['parameter_uji' => 'Uji kadar bahan aktif', 'metode_uji' => 'Spektrofotometri', 'harga' => 75000],
            ],
            'Tekanan Darah Tinggi' => [
                ['parameter_uji' => 'Uji kadar bahan aktif', 'metode_uji' => 'Titrasi', 'harga' => 55000],
            ],
            'Lemak Darah' => [
                ['parameter_uji' => 'Uji kadar kolesterol', 'metode_uji' => 'Enzimatis', 'harga' => 70000],
            ],
            'Sediaan berisi tanaman sumber kofein alami' => [
                ['parameter_uji' => 'Uji kadar kofein', 'metode_uji' => 'Kromatografi', 'harga' => 60000],
            ],
            'Bahan Pengawet' => [
                ['parameter_uji' => 'Uji kadar pengawet', 'metode_uji' => 'Kromatografi', 'harga' => 65000],
            ],
            'Logam Berat' => [
                ['parameter_uji' => 'Uji logam berat', 'metode_uji' => 'AAS', 'harga' => 100000],
            ],
            'Pelarut Sisa /Residual Solvent' => [
                ['parameter_uji' => 'Uji pelarut sisa', 'metode_uji' => 'GC-MS', 'harga' => 120000],
            ],
            'Bahan Pemanis' => [
                ['parameter_uji' => 'Uji kadar pemanis', 'metode_uji' => 'Kromatografi', 'harga' => 55000],
            ],
        ];

        foreach ($parameters as $klaimName => $params) {
            $klaim = ProdukKlaim::where('nama_klaim', $klaimName)->first();
            if ($klaim) {
                foreach ($params as $param) {
                    ParameterUjiOtsk::create([
                        'produk_klaim_id' => $klaim->id,
                        'parameter_uji' => $param['parameter_uji'],
                        'metode_uji' => $param['metode_uji'],
                        'harga' => $param['harga'],
                    ]);
                }
            }
        }
    }
}
