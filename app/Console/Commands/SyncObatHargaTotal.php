<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\MasterObat;
use App\Models\ParameterUji;

class SyncObatHargaTotal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'obat:sync-harga-total';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronkan kolom harga_total di tabel obat berdasarkan SUM(parameter_uji.harga)';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $obats = MasterObat::all();

        if ($obats->isEmpty()) {
            $this->warn('Tidak ada data obat ditemukan.');
            return self::SUCCESS;
        }

        $this->info("Memulai sinkronisasi {$obats->count()} data obat...");
        $bar = $this->output->createProgressBar($obats->count());
        $bar->start();

        $synced   = 0;
        $changed  = 0;

        foreach ($obats as $obat) {
            $sum = ParameterUji::where('id_obat', $obat->id_obat)->sum('harga');

            if ((float) $obat->harga_total !== (float) $sum) {
                MasterObat::where('id_obat', $obat->id_obat)
                    ->update(['harga_total' => $sum]);
                $changed++;
            }

            $synced++;
            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info("Selesai! Total: {$synced} obat diproses, {$changed} diperbarui.");

        return self::SUCCESS;
    }
}
