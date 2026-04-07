<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TarifPengujianBbpom;
use App\Models\ZatAktif;
use App\Models\ProdukKlaim;
use App\Models\TipeProduk;
use App\Models\MasterObat;
use App\Models\ParameterUji;
use App\Models\ParameterUjiOtsk;
use App\Models\MetodeUjiOtsk;
use App\Models\Kosmetiks;
use App\Models\KategoriKos;
use App\Models\ParameterKos;
use App\Models\Pangan;
use App\Models\ParameterUjiPangan;

class PengujianController extends Controller
{
    /**
     * Mencari jenis penerimaan secara real-time (Autocomplete)
     * Endpoint: /api/search-tarif?q=...
     */
    public function search(Request $request)
    {
        // Mengambil input 'q' dari request AJAX
        $query = $request->input('q');

        // Jika input kosong, segera kembalikan array kosong
        if (empty($query)) {
            return response()->json([]);
        }

        // Cari data berdasarkan jenis_penerimaan yang mengandung string query
        $results = TarifPengujianBbpom::where('jenis_penerimaan', 'LIKE', '%' . $query . '%')
            ->select('id', 'jenis_penerimaan', 'tarif') // Hanya ambil kolom yang dibutuhkan
            ->limit(10) // Batasi 10 hasil agar performa tetap cepat
            ->get();

        return response()->json($results);
    }

    /**
     * Mencari obat secara real-time (Autocomplete)
     * Endpoint: /api/search-obat?q=...
     */
    public function searchObat(Request $request)
    {
        $query = $request->input('q');

        if (empty($query)) {
            return response()->json([]);
        }

        // Sertakan harga_total dari kolom DB agar sinkron dengan halaman admin
        $results = MasterObat::where('zat_aktif', 'LIKE', '%' . $query . '%')
            ->select('id_obat', 'zat_aktif', 'jenis_sediaan', 'bentuk_sediaan', 'harga_total')
            ->distinct()
            ->limit(10)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id_obat,
                    'zat_aktif' => $item->zat_aktif,
                    'jenis_sediaan' => $item->jenis_sediaan,
                    'bentuk_sediaan' => $item->bentuk_sediaan,
                    'harga_total' => $item->harga_total ?? 0,
                ];
            });

        return response()->json($results);
    }

    /**
     * Mendapatkan detail obat beserta parameter uji
     * Endpoint: /api/obat/{id}
     */
    public function getObatDetail($id)
    {
        $obat = MasterObat::with('parameters')->find($id);

        if (!$obat) {
            return response()->json(['error' => 'Obat not found'], 404);
        }

        // Gunakan harga_total dari kolom DB agar sinkron dengan data yang dikelola admin
        $data = [
            'id' => $obat->id_obat,
            'zat_aktif' => $obat->zat_aktif,
            'jenis_sediaan' => $obat->jenis_sediaan,
            'bentuk_sediaan' => $obat->bentuk_sediaan,
            'harga_total' => $obat->harga_total ?? 0,
            'parameters' => $obat->parameters->map(function ($param) {
                return [
                    'parameter_uji' => $param->parameter_uji,
                    'metode_uji' => $param->metode_uji,
                    'jumlah_minimal' => $param->jumlah_minimal,
                    'satuan' => $param->satuan,
                    'harga' => $param->harga,
                ];
            }),
        ];

        return response()->json($data);
    }

    /**
     * Mencari OT-SK (Produk Klaim dan Tipe Produk) secara real-time
     * Endpoint: /api/search-otsk?q=...
     */
    public function searchOtsk(Request $request)
    {
        $query = $request->input('q');

        if (empty($query)) {
            return response()->json([]);
        }

        // Search in ProdukKlaim (Klaim)
        $klaimResults = ProdukKlaim::where('nama_klaim', 'LIKE', '%' . $query . '%')
            ->select('id_klaim as id', 'nama_klaim as name', \DB::raw("'klaim' as type"), \DB::raw("'' as context"))
            ->orderBy('nama_klaim', 'asc')
            ->limit(10)
            ->get();

        // Search in TipeProduk
        $tipeResults = TipeProduk::where('nama_tipe', 'LIKE', '%' . $query . '%')
            ->select('id_produk as id', 'nama_tipe as name', \DB::raw("'tipe' as type"), \DB::raw("'' as context"))
            ->orderBy('nama_tipe', 'asc')
            ->limit(10)
            ->get();

        // Search in Parameter Uji OT-SK (return klaim id for detail view)
        $parameterResults = ParameterUjiOtsk::query()
            ->join('produk_klaim', 'parameter_uji_otsk.id_klaim', '=', 'produk_klaim.id_klaim')
            ->where('parameter_uji_otsk.parameter_uji', 'LIKE', '%' . $query . '%')
            ->select(
                'produk_klaim.id_klaim as id',
                'parameter_uji_otsk.parameter_uji as name',
                \DB::raw("'parameter' as type"),
                'produk_klaim.nama_klaim as context'
            )
            ->distinct()
            ->orderBy('parameter_uji_otsk.parameter_uji', 'asc')
            ->limit(10)
            ->get();

        // Search in Metode Uji OT-SK
        $metodeResults = MetodeUjiOtsk::query()
            ->join('parameter_uji_otsk', 'metode_uji_otsk.id_uji', '=', 'parameter_uji_otsk.id_uji')
            ->join('produk_klaim', 'parameter_uji_otsk.id_klaim', '=', 'produk_klaim.id_klaim')
            ->where('metode_uji_otsk.metode_uji', 'LIKE', '%' . $query . '%')
            ->select(
                'produk_klaim.id_klaim as id',
                'metode_uji_otsk.metode_uji as name',
                \DB::raw("'metode' as type"),
                'produk_klaim.nama_klaim as context'
            )
            ->distinct()
            ->orderBy('metode_uji_otsk.metode_uji', 'asc')
            ->limit(10)
            ->get();

        // Search in Pustaka (Metode Uji OT-SK)
        $pustakaResults = MetodeUjiOtsk::query()
            ->join('parameter_uji_otsk', 'metode_uji_otsk.id_uji', '=', 'parameter_uji_otsk.id_uji')
            ->join('produk_klaim', 'parameter_uji_otsk.id_klaim', '=', 'produk_klaim.id_klaim')
            ->where('metode_uji_otsk.pustaka', 'LIKE', '%' . $query . '%')
            ->select(
                'produk_klaim.id_klaim as id',
                'metode_uji_otsk.pustaka as name',
                \DB::raw("'pustaka' as type"),
                'produk_klaim.nama_klaim as context'
            )
            ->distinct()
            ->orderBy('metode_uji_otsk.pustaka', 'asc')
            ->limit(10)
            ->get();

        $results = $klaimResults
            ->merge($tipeResults)
            ->merge($parameterResults)
            ->merge($metodeResults)
            ->merge($pustakaResults)
            ->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)
            ->values()
            ->take(10);

        return response()->json($results);
    }

    /**
     * Mendapatkan detail OT-SK beserta parameter uji
     * Endpoint: /api/otsk/{id}
     */
    public function getOtskDetail($id)
    {
        $klaim = ProdukKlaim::with(['parameterUjiOtsk.metodeUjiOtsk', 'tipeProduk'])
            ->where('id_klaim', $id)
            ->first();

        if (!$klaim) {
            return response()->json(['error' => 'Klaim not found'], 404);
        }

        $data = [
            'id' => $klaim->id_klaim,
            'nama_klaim' => $klaim->nama_klaim,
            'tipe_produk' => $klaim->tipeProduk->nama_tipe ?? '-',
            'parameters' => $klaim->parameterUjiOtsk->map(function ($param) {
                return [
                    'id_uji' => $param->id_uji,
                    'parameter_uji' => $param->parameter_uji,
                    'metodes' => $param->metodeUjiOtsk->map(function ($metode) {
                        return [
                            'metode_uji' => $metode->metode_uji,
                            'teknik' => $metode->teknik_analisis,
                            'sediaan' => $metode->sediaan,
                            'pustaka' => $metode->pustaka,
                            'jumlah_sampel' => $metode->jumlah_sampel,
                            'satuan' => $metode->satuan_sampel,
                        ];
                    }),
                ];
            }),
        ];

        return response()->json($data);
    }

    /**
     * Mendapatkan detail Tipe Produk beserta semua klaim dan parameter uji
     * Endpoint: /api/tipe-produk/{id}
     */
    public function getTipeProdukDetail($id)
    {
        $tipe = TipeProduk::with(['produkKlaims.parameterUjiOtsk.metodeUjiOtsk'])
            ->where('id_produk', $id)
            ->first();

        if (!$tipe) {
            return response()->json(['error' => 'Tipe Produk not found'], 404);
        }

        $data = [
            'id_produk' => $tipe->id_produk,
            'nama_tipe' => $tipe->nama_tipe,
            'klaims' => $tipe->produkKlaims->map(function ($klaim) {
                return [
                    'id' => $klaim->id_klaim,
                    'nama_klaim' => $klaim->nama_klaim,
                    'parameters' => $klaim->parameterUjiOtsk->map(function ($param) {
                        return [
                            'id_uji' => $param->id_uji,
                            'parameter_uji' => $param->parameter_uji,
                            'metodes' => $param->metodeUjiOtsk->map(function ($metode) {
                                return [
                                    'metode_uji' => $metode->metode_uji,
                                    'teknik' => $metode->teknik_analisis,
                                    'sediaan' => $metode->sediaan,
                                    'pustaka' => $metode->pustaka,
                                    'jumlah_sampel' => $metode->jumlah_sampel,
                                    'satuan' => $metode->satuan_sampel,
                                ];
                            }),
                        ];
                    }),
                ];
            }),
        ];

        return response()->json($data);
    }

    /**
     * Mendapatkan daftar tipe produk untuk dropdown OT-SK
     * Endpoint: /api/tipe-produk
     */
    public function getTipeProduk()
    {
        return response()->json(TipeProduk::all());
    }

    /**
     * Mencari tipe produk secara real-time (Autocomplete)
     * Endpoint: /api/search-tipe-produk?q=...
     */
    public function searchTipeProduk(Request $request)
    {
        $query = $request->input('q');

        if (empty($query)) {
            return response()->json([]);
        }

        $results = TipeProduk::where('nama_tipe', 'LIKE', '%' . $query . '%')
            ->select('id_produk', 'nama_tipe')
            ->limit(10)
            ->get();

        return response()->json($results);
    }

    /**
     * Mendapatkan metode analisis berdasarkan kategori indikasi
     * Endpoint: /api/metode-by-kategori/{kategoriId}
     */
    public function getMetodeByKategori($kategoriId)
    {
        $results = \DB::table('metode_analisis')
            ->join('analit', 'metode_analisis.analit_id', '=', 'analit.id')
            ->join('kategori_indikasi', 'analit.kategori_indikasi_id', '=', 'kategori_indikasi.id')
            ->where('kategori_indikasi.id', $kategoriId)
            ->select('analit.nama_analit', 'metode_analisis.sediaan', 'metode_analisis.teknik_analisis', 'metode_analisis.jumlah_sampel')
            ->get();

        return response()->json($results);
    }

    /**
     * Mendapatkan daftar kategori indikasi
     * Endpoint: /api/kategori-indikasi
     */
    public function getKategoriIndikasi()
    {
        return response()->json(\App\Models\KategoriIndikasi::all());
    }

    /**
     * Mendapatkan klaim berdasarkan tipe produk
     * Endpoint: /api/klaim-by-tipe/{tipeId}
     */
    public function getKlaimByTipe($tipeId)
    {
        $linson = ProdukKlaim::where('id_produk', $tipeId)->get();
        return response()->json($linson);
    }

    /**
     * Mencari kosmetik secara real-time (Autocomplete)
     * Endpoint: /api/search-kosmetik?q=...
     * Search focus on kategori_kos table
     */
    public function searchKosmetik(Request $request)
    {
        $query = $request->input('q');

        if (empty($query)) {
            return response()->json([]);
        }

        // Search in kategori_kos table - this is the focus of search
        $results = KategoriKos::with('kosmetiks')
            ->where('kategori_kos', 'LIKE', '%' . $query . '%')
            ->limit(10)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id_kategori,
                    'id_kos' => $item->id_kos,
                    'zat_aktif' => $item->kategori_kos,
                    'tipe_produk' => $item->kosmetiks ? $item->kosmetiks->tipe_produk : '',
                ];
            });

        return response()->json($results);
    }

    /**
     * Mendapatkan detail kosmetik beserta parameter uji
     * Endpoint: /api/kosmetik/{id}
     */
    public function getKosmetikDetail($id)
    {
        // Get kategori with its parent kosmetiks and parameters
        $kategori = KategoriKos::with(['kosmetiks', 'parameterKos'])
            ->where('id_kategori', $id)
            ->first();

        if (!$kategori) {
            return response()->json(['error' => 'Kosmetik not found'], 404);
        }

        // Get total harga from all parameters
        $hargaTotal = $kategori->parameterKos->sum('harga');

        // Map the data to match the expected format
        $data = [
            'id' => $kategori->id_kategori,
            'id_kos' => $kategori->id_kos,
            'zat_aktif' => $kategori->kategori_kos,
            'jenis_sediaan' => $kategori->kosmetiks ? $kategori->kosmetiks->tipe_produk : '',
            'bentuk_sediaan' => '',
            'harga_total' => $hargaTotal,
            'parameters' => $kategori->parameterKos->map(function ($param) {
                return [
                    'parameter_uji' => $param->puk,
                    'metode_uji' => $param->metode,
                    'jumlah_minimal' => $param->sampel_min,
                    'satuan' => $param->satuan,
                    'harga' => $param->harga,
                    'teknik_analisis' => $param->teknik_analisis,
                    'pustaka' => $param->pustaka,
                    'waktu' => $param->waktu,
                ];
            }),
        ];

        return response()->json($data);
    }

    /**
     * Mencari pangan secara real-time (Autocomplete)
     * Endpoint: /api/search-pangan?q=...
     * Mengembalikan daftar komoditi pangan unik untuk autocomplete,
     * dengan pencarian pada bahan produk maupun parameter uji.
     */
    public function searchPangan(Request $request)
    {
        $query = $request->input('q');

        if (empty($query)) {
            return response()->json([]);
        }

        $results = \DB::table('pangan')
            ->leftJoin('parameter_uji_pangan', 'pangan.id_pangan', '=', 'parameter_uji_pangan.id_pangan')
            ->where(function ($builder) use ($query) {
                $builder->where('pangan.bahan_produk', 'LIKE', '%' . $query . '%')
                    ->orWhere('parameter_uji_pangan.parameter_uji', 'LIKE', '%' . $query . '%');
            })
            ->select(
                'pangan.id_pangan',
                'pangan.bahan_produk',
                'pangan.waktu'
            )
            ->groupBy('pangan.id_pangan', 'pangan.bahan_produk', 'pangan.waktu')
            ->orderBy('pangan.bahan_produk')
            ->limit(20)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id_pangan,
                    'bahan_produk' => $item->bahan_produk,
                    'waktu' => $item->waktu,
                ];
            });

        return response()->json($results);
    }

    /**
     * Mendapatkan detail pangan beserta parameter uji
     * Endpoint: /api/pangan/{id}
     * Now uses parameter_uji_pangan table with joins to harga_pangan and metode_uji_pangan
     */
    public function getPanganDetail($id)
    {
        $parameters = \DB::table('parameter_uji_pangan')
            ->join('pangan', 'parameter_uji_pangan.id_pangan', '=', 'pangan.id_pangan')
            ->leftJoin('metode_uji_pangan', 'parameter_uji_pangan.id_uji', '=', 'metode_uji_pangan.id_uji')
            ->leftJoin('harga_pangan', function ($join) {
                $join->on('parameter_uji_pangan.id_uji', '=', 'harga_pangan.id_metode')
                     ->on('parameter_uji_pangan.id_pangan', '=', 'harga_pangan.id');
            })
            ->where('parameter_uji_pangan.id_pangan', $id)
            ->select(
                'parameter_uji_pangan.id_pangan',
                'parameter_uji_pangan.id_uji',
                'parameter_uji_pangan.parameter_uji',
                'parameter_uji_pangan.metode as parameter_metode',
                'parameter_uji_pangan.minimal_sampel as parameter_minimal_sampel',
                'parameter_uji_pangan.satuan as parameter_satuan',
                'parameter_uji_pangan.keterangan as parameter_keterangan',
                'parameter_uji_pangan.harga as parameter_harga',
                'parameter_uji_pangan.total',
                'pangan.bahan_produk',
                'pangan.waktu',
                'metode_uji_pangan.metode as metode_uji_metode',
                'metode_uji_pangan.sampel_minimal as metode_uji_sampel_minimal',
                'metode_uji_pangan.satuan as metode_satuan',
                'metode_uji_pangan.keterangan as metode_keterangan',
                'harga_pangan.harga as joined_harga'
            )
            ->get();

        if ($parameters->isEmpty()) {
            return response()->json(['error' => 'Pangan not found'], 404);
        }

        // Get the first item to get pangan info
        $firstParam = $parameters->first();

        $data = [
            'id' => $firstParam->id_pangan,
            'bahan_produk' => $firstParam->bahan_produk,
            'waktu' => $firstParam->waktu,
            'parameters' => $parameters->map(function ($param) {
                return [
                    'id_uji' => $param->id_uji,
                    'parameter_uji' => $param->parameter_uji,
                    'metode' => $param->parameter_metode ?? $param->metode_uji_metode,
                    'minimal_sampel' => $param->parameter_minimal_sampel ?? $param->metode_uji_sampel_minimal,
                    'satuan' => $param->parameter_satuan ?? $param->metode_satuan,
                    'keterangan' => $param->parameter_keterangan ?? $param->metode_keterangan,
                    'harga' => $param->parameter_harga ?? $param->joined_harga,
                    'total' => $param->total,
                ];
            }),
        ];

        return response()->json($data);
    }

    /**
     * Mendapatkan detail item pangan spesifik dari hasil pencarian
     * Endpoint: /api/pangan/{id}/item/{idUji}
     * Sumber utama data: tabel parameter_uji_pangan
     */
    public function getPanganItemDetail($id, $idUji)
    {
        $item = \DB::table('parameter_uji_pangan')
            ->join('pangan', 'parameter_uji_pangan.id_pangan', '=', 'pangan.id_pangan')
            ->leftJoin('metode_uji_pangan', 'parameter_uji_pangan.id_uji', '=', 'metode_uji_pangan.id_uji')
            ->leftJoin('harga_pangan', function ($join) {
                $join->on('parameter_uji_pangan.id_uji', '=', 'harga_pangan.id_metode')
                     ->on('parameter_uji_pangan.id_pangan', '=', 'harga_pangan.id');
            })
            ->where('parameter_uji_pangan.id_pangan', $id)
            ->where('parameter_uji_pangan.id_uji', $idUji)
            ->select(
                'parameter_uji_pangan.id_pangan',
                'parameter_uji_pangan.id_uji',
                'parameter_uji_pangan.parameter_uji',
                'parameter_uji_pangan.metode as parameter_metode',
                'parameter_uji_pangan.minimal_sampel as parameter_minimal_sampel',
                'parameter_uji_pangan.satuan as parameter_satuan',
                'parameter_uji_pangan.keterangan as parameter_keterangan',
                'parameter_uji_pangan.harga as parameter_harga',
                'parameter_uji_pangan.total',
                'pangan.bahan_produk',
                'pangan.waktu',
                'metode_uji_pangan.metode as metode_uji_metode',
                'metode_uji_pangan.sampel_minimal as metode_uji_sampel_minimal',
                'metode_uji_pangan.satuan as metode_satuan',
                'metode_uji_pangan.keterangan as metode_keterangan',
                'harga_pangan.harga as joined_harga'
            )
            ->first();

        if (!$item) {
            return response()->json(['error' => 'Detail pangan tidak ditemukan'], 404);
        }

        return response()->json([
            'id' => $item->id_pangan,
            'id_uji' => $item->id_uji,
            'bahan_produk' => $item->bahan_produk,
            'waktu' => $item->waktu,
            'parameter_uji' => $item->parameter_uji,
            'metode' => $item->parameter_metode ?? $item->metode_uji_metode,
            'minimal_sampel' => $item->parameter_minimal_sampel ?? $item->metode_uji_sampel_minimal,
            'satuan' => $item->parameter_satuan ?? $item->metode_satuan,
            'keterangan' => $item->parameter_keterangan ?? $item->metode_keterangan,
            'harga' => $item->parameter_harga ?? $item->joined_harga,
            'total' => $item->total,
        ]);
    }
}
