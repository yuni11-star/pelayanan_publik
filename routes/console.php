

<?php
use App\Models\MasterObat;
use App\Models\ParameterObat;

Artisan::command('import:obat', function () {
    $path = storage_path('app/dataobat.csv');
    $file = fopen($path, 'r');
    
    $currentObatId = null;
    $row = 0;

    while (($data = fgetcsv($file, 2000, ",")) !== FALSE) {
        $row++;
        if ($row < 6) continue; // Skip header tabel

        // Jika kolom NO (index 0) berisi angka, artinya ini BARIS OBAT BARU
        if (!empty($data[0]) && is_numeric($data[0])) {
            $obat = MasterObat::updateOrCreate(
                ['zat_aktif' => trim($data[1])],
                [
                    'jenis_sediaan'  => $data[2],
                    'bentuk_sediaan' => $data[3],
                    'harga_total'    => $data[9]
                ]
            );
            $currentObatId = $obat->id;
        }

        // Jika ada nama Parameter (index 4), masukkan ke tabel Parameter
        if ($currentObatId && !empty($data[4])) {
            ParameterObat::create([
                'obat_id'               => $currentObatId,
                'parameter_uji'         => $data[4],
                'metode_uji'            => $data[5],
                'jumlah_sampel_minimal' => (int) preg_replace('/[^0-9]/', '', $data[6]),
                'satuan_sampel'         => $data[7],
                'harga_per_parameter'   => $data[8]
            ]);
        }
    }
    $this->info("Import Berhasil!");
});