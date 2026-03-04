<?php

namespace Database\Seeders;

use App\Models\ZatAktif;
use App\Models\ParameterUji;
use App\Models\MasterObat;
use Illuminate\Database\Seeder;

class ZatAktifSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = storage_path('app/dataobat.csv');

        if (!file_exists($filePath)) {
            $this->command->error('CSV file not found: ' . $filePath);
            return;
        }

        $handle = fopen($filePath, 'r');
        $lastObatId = null;

        // Skip header row if exists
        fgetcsv($handle, 0, ';');

        while (($data = fgetcsv($handle, 0, ';')) !== false) {
            // Assuming columns based on data: 6=Zat Aktif, 7=Jenis Sediaan, 8=Bentuk Sediaan, 9=Nama Parameter, 10=Metode Uji, 11=Jumlah Minimal, 12=Satuan, 13=Harga
            $zatAktifName = trim($data[6] ?? '');
            $jenisSediaan = trim($data[7] ?? '');
            $bentukSediaan = trim($data[8] ?? '');
            $namaParameter = trim($data[9] ?? '');
            $metodeUji = trim($data[10] ?? '');
            $jumlahMinimal = trim($data[11] ?? '');
            $satuan = trim($data[12] ?? '');
            $harga = trim(str_replace(['Rp', '.', ','], '', $data[13] ?? ''));

            if (!empty($zatAktifName)) {
                // Create new MasterObat
                $obat = MasterObat::create([
                    'zat_aktif' => $zatAktifName,
                    'jenis_sediaan' => $jenisSediaan,
                    'bentuk_sediaan' => $bentukSediaan,
                    'harga_total' => 0, // Will be calculated later
                ]);
                $lastObatId = $obat->id_obat;
            }

            // Create ParameterUji linked to the last MasterObat
            if ($lastObatId && !empty($namaParameter)) {
                ParameterUji::create([
                    'id_obat' => $lastObatId,
                    'parameter_uji' => $namaParameter,
                    'metode_uji' => $metodeUji,
                    'jumlah_minimal' => is_numeric($jumlahMinimal) ? $jumlahMinimal : null,
                    'satuan' => $satuan,
                    'harga' => is_numeric($harga) ? $harga : 0,
                ]);
            }
        }

        fclose($handle);
        $this->command->info('ZatAktifSeeder completed successfully.');
    }
}
