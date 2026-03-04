<?php

namespace App\Imports;

use App\Models\ZatAktif;
use App\Models\ParameterUji;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ZatAktifImport implements ToCollection
{
    private $lastZatAktifId = null;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Assuming columns: 0=Zat Aktif, 1=Jenis Sediaan, 2=Bentuk Sediaan, 3=Nama Parameter, 4=Metode Uji, 5=Jumlah Minimal, 6=Satuan, 7=Harga
            $zatAktifName = $row[0];
            $jenisSediaan = $row[1];
            $bentukSediaan = $row[2];
            $namaParameter = $row[3];
            $metodeUji = $row[4];
            $jumlahMinimal = $row[5];
            $satuan = $row[6];
            $harga = $row[7];

            if (!empty($zatAktifName)) {
                // Create new ZatAktif
                $zatAktif = ZatAktif::create([
                    'nama_zat' => $zatAktifName,
                    'jenis_sediaan' => $jenisSediaan,
                    'bentuk_sediaan' => $bentukSediaan,
                ]);
                $this->lastZatAktifId = $zatAktif->id;
            }

            // Create ParameterUji linked to the last ZatAktif
            if ($this->lastZatAktifId) {
                ParameterUji::create([
                    'zat_aktif_id' => $this->lastZatAktifId,
                    'nama_parameter' => $namaParameter,
                    'metode_uji' => $metodeUji,
                    'jumlah_minimal' => $jumlahMinimal,
                    'satuan' => $satuan,
                    'harga' => $harga,
                ]);
            }
        }
    }
}
