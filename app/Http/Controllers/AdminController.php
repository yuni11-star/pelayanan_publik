<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\MasterObat;
use App\Models\ParameterUji;
use App\Models\TipeProduk;
use App\Models\ProdukKlaim;
use App\Models\ParameterUjiOtsk;
use App\Models\MetodeUjiOtsk;
use App\Models\Kosmetiks;
use App\Models\KategoriKos;
use App\Models\ParameterKos;
use App\Models\Pangan;
use App\Models\ParameterUjiPangan;

class AdminController extends Controller
{
    /**
     * Menampilkan halaman upload dokumen
     */
    public function showUploadForm()
    {
        $documents = collect([]);
        $documentPath = public_path('documents');

        if (is_dir($documentPath)) {
            $files = scandir($documentPath);
            foreach ($files as $file) {
                if ($file !== '.' && $file !== '..' && is_file($documentPath . '/' . $file)) {
                    $filePath = $documentPath . '/' . $file;
                    $fileInfo = pathinfo($filePath);
                    $extension = strtolower($fileInfo['extension']);
                    $size = filesize($filePath);
                    $uploadedAt = date('Y-m-d H:i:s', filemtime($filePath));

                    switch ($extension) {
                        case 'pdf':
                            $iconClass = 'fas fa-file-pdf text-red-500';
                            $badgeClass = 'bg-red-100 text-red-800';
                            $type = 'PDF';
                            break;
                        case 'doc':
                            $iconClass = 'fas fa-file-word text-blue-500';
                            $badgeClass = 'bg-blue-100 text-blue-800';
                            $type = 'DOC';
                            break;
                        case 'docx':
                            $iconClass = 'fas fa-file-word text-blue-500';
                            $badgeClass = 'bg-blue-100 text-blue-800';
                            $type = 'DOCX';
                            break;
                        default:
                            $iconClass = 'fas fa-file text-gray-500';
                            $badgeClass = 'bg-gray-100 text-gray-800';
                            $type = strtoupper($extension);
                    }

                    if ($size >= 1048576) {
                        $sizeFormatted = round($size / 1048576, 2) . ' MB';
                    } elseif ($size >= 1024) {
                        $sizeFormatted = round($size / 1024, 2) . ' KB';
                    } else {
                        $sizeFormatted = $size . ' bytes';
                    }

                    $documents[] = [
                        'name' => $file,
                        'original_name' => $fileInfo['filename'] . '.' . $extension,
                        'icon_class' => $iconClass,
                        'badge_class' => $badgeClass,
                        'type' => $type,
                        'size_formatted' => $sizeFormatted,
                        'uploaded_at' => $uploadedAt,
                    ];
                }
            }
        }

        return view('admin.upload', compact('documents'));
    }

    public function uploadDocument(Request $request)
    {
        $request->validate([
            'document' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);

        if ($request->file('document')->isValid()) {
            $fileName = time() . '_' . $request->file('document')->getClientOriginalName();
            $request->file('document')->move(public_path('documents'), $fileName);
            return redirect()->back()->with('success', 'Document uploaded successfully: ' . $fileName);
        }

        return redirect()->back()->with('error', 'Failed to upload document.');
    }

    public function previewDocument($filename)
    {
        $filePath = public_path('documents/' . $filename);
        if (file_exists($filePath)) {
            return response()->file($filePath);
        }
        abort(404, 'Document not found.');
    }

    public function renameDocument(Request $request, $filename)
    {
        $request->validate([
            'new_name' => 'required|string|max:255',
        ]);

        $oldPath = public_path('documents/' . $filename);
        $fileInfo = pathinfo($filename);
        $extension = $fileInfo['extension'];
        $newName = $request->input('new_name') . '.' . $extension;
        $newPath = public_path('documents/' . $newName);

        if (file_exists($oldPath) && !file_exists($newPath)) {
            rename($oldPath, $newPath);
            return redirect()->back()->with('success', 'Document renamed successfully.');
        }

        return redirect()->back()->with('error', 'Failed to rename document.');
    }

    public function deleteDocument($filename)
    {
        $filePath = public_path('documents/' . $filename);
        if (file_exists($filePath)) {
            unlink($filePath);
            return redirect()->back()->with('success', 'Document deleted successfully.');
        }
        return redirect()->back()->with('error', 'Document not found.');
    }

    // ==================== CRUD OBAT ====================

    public function showObat()
    {
        $obats = MasterObat::with('parameters')->orderBy('id_obat', 'desc')->get();
        return view('admin.obat', compact('obats'));
    }

    public function storeObat(Request $request)
    {
        $request->validate([
            'zat_aktif' => 'required|string|max:255',
            'jenis_sediaan' => 'required|string|max:255',
            'bentuk_sediaan' => 'required|string|max:255',
            'harga_total' => 'required|numeric|min:0',
        ]);

        MasterObat::create([
            'zat_aktif' => $request->zat_aktif,
            'jenis_sediaan' => $request->jenis_sediaan,
            'bentuk_sediaan' => $request->bentuk_sediaan,
            'harga_total' => $request->harga_total,
        ]);

        return redirect()->back()->with('success', 'Data obat berhasil ditambahkan!');
    }

    public function updateObat(Request $request, $id)
    {
        $request->validate([
            'zat_aktif' => 'required|string|max:255',
            'jenis_sediaan' => 'required|string|max:255',
            'bentuk_sediaan' => 'required|string|max:255',
            'harga_total' => 'required|numeric|min:0',
        ]);

        $obat = MasterObat::findOrFail($id);
        $obat->update([
            'zat_aktif' => $request->zat_aktif,
            'jenis_sediaan' => $request->jenis_sediaan,
            'bentuk_sediaan' => $request->bentuk_sediaan,
            'harga_total' => $request->harga_total,
        ]);

        return redirect()->back()->with('success', 'Data obat berhasil diperbarui!');
    }

    public function deleteObat($id)
    {
        $obat = MasterObat::findOrFail($id);
        $obat->delete();
        return redirect()->back()->with('success', 'Data obat berhasil dihapus!');
    }

    // ==================== CRUD PARAMETER UJI ====================

    public function storeParameterUji(Request $request)
    {
        $request->validate([
            'id_obat' => 'required|exists:obat,id_obat',
            'parameter_uji' => 'required|string|max:255',
            'metode_uji' => 'required|string|max:255',
            'jumlah_minimal' => 'nullable|numeric|min:0',
            'satuan' => 'required|string|max:50',
            'harga' => 'required|numeric|min:0',
        ]);

        ParameterUji::create([
            'id_obat' => $request->id_obat,
            'parameter_uji' => $request->parameter_uji,
            'metode_uji' => $request->metode_uji,
            'jumlah_minimal' => $request->jumlah_minimal,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'nama_parameter' => $request->parameter_uji, // Set nama_parameter to the same value as parameter_uji
        ]);

        // Sinkronkan harga_total di tabel obat
        $this->recalculateObatHargaTotal($request->id_obat);

        return redirect()->back()->with('success', 'Parameter uji berhasil ditambahkan!');
    }

    public function updateParameterUji(Request $request, $id)
    {
        $request->validate([
            'parameter_uji' => 'required|string|max:255',
            'metode_uji' => 'required|string|max:255',
            'jumlah_minimal' => 'nullable|numeric|min:0',
            'satuan' => 'required|string|max:50',
            'harga' => 'required|numeric|min:0',
        ]);

        $parameter = ParameterUji::findOrFail($id);
        $id_obat = $parameter->id_obat;

        $parameter->update([
            'parameter_uji' => $request->parameter_uji,
            'metode_uji' => $request->metode_uji,
            'jumlah_minimal' => $request->jumlah_minimal,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'nama_parameter' => $request->parameter_uji, // Update nama_parameter to the same value as parameter_uji
        ]);

        // Sinkronkan harga_total di tabel obat
        $this->recalculateObatHargaTotal($id_obat);

        return redirect()->back()->with('success', 'Parameter uji berhasil diperbarui!');
    }

    public function deleteParameterUji($id)
    {
        $parameter = ParameterUji::findOrFail($id);
        $id_obat = $parameter->id_obat;
        $parameter->delete();

        // Sinkronkan harga_total di tabel obat
        $this->recalculateObatHargaTotal($id_obat);

        return redirect()->back()->with('success', 'Parameter uji berhasil dihapus!');
    }

    /**
     * Menghitung ulang dan menyimpan harga_total pada tabel obat
     * berdasarkan jumlah semua harga di tabel parameter_uji.
     * Dipanggil setiap kali parameter ditambah, diubah, atau dihapus.
     */
    private function recalculateObatHargaTotal(int $id_obat): void
    {
        $total = ParameterUji::where('id_obat', $id_obat)->sum('harga');
        MasterObat::where('id_obat', $id_obat)->update(['harga_total' => $total]);
    }

    public function getObat($id)
    {
        $obat = MasterObat::with('parameters')->findOrFail($id);
        return response()->json($obat);
    }

    // ==================== CRUD OT-SK ====================

    public function showOtsk()
    {
        $tipeProduks = TipeProduk::with(['produkKlaims.parameterUjiOtsk.metodeUjiOtsk'])->orderBy('id_produk', 'desc')->get();
        return view('admin.otsk', compact('tipeProduks'));
    }

    public function storeTipeProduk(Request $request)
    {
        $request->validate([
            'nama_tipe' => 'required|string|max:255',
        ]);

        TipeProduk::create([
            'nama_tipe' => $request->nama_tipe,
        ]);

        return redirect()->back()->with('success', 'Tipe produk berhasil ditambahkan!');
    }

    public function updateTipeProduk(Request $request, $id)
    {
        $request->validate([
            'nama_tipe' => 'required|string|max:255',
        ]);

        $tipe = TipeProduk::findOrFail($id);
        $tipe->update([
            'nama_tipe' => $request->nama_tipe,
        ]);

        return redirect()->back()->with('success', 'Tipe produk berhasil diperbarui!');
    }

    public function deleteTipeProduk($id)
    {
        $tipe = TipeProduk::findOrFail($id);
        $tipe->delete();
        return redirect()->back()->with('success', 'Tipe produk berhasil dihapus!');
    }

    public function storeProdukKlaim(Request $request)
    {
        $request->validate([
            'tipe_produk_id' => 'required|exists:tipe_produk,id_produk',
            'nama_klaim' => 'required|string|max:255',
        ]);

        ProdukKlaim::create([
            'id_produk' => $request->tipe_produk_id,
            'nama_klaim' => $request->nama_klaim,
        ]);

        return redirect()->back()->with('success', 'Klaim berhasil ditambahkan!');
    }

    public function updateProdukKlaim(Request $request, $id)
    {
        $request->validate([
            'nama_klaim' => 'required|string|max:255',
        ]);

        $klaim = ProdukKlaim::findOrFail($id);
        $klaim->update([
            'nama_klaim' => $request->nama_klaim,
        ]);

        return redirect()->back()->with('success', 'Klaim berhasil diperbarui!');
    }

    public function deleteProdukKlaim($id)
    {
        $klaim = ProdukKlaim::findOrFail($id);
        $klaim->delete();
        return redirect()->back()->with('success', 'Klaim berhasil dihapus!');
    }

    public function storeParameterUjiOtsk(Request $request)
    {
        $request->validate([
            'id_klaim' => 'required|exists:produk_klaim,id_klaim',
            'parameter_uji' => 'required|string|max:255',
        ]);

        ParameterUjiOtsk::create([
            'id_klaim' => $request->id_klaim,
            'parameter_uji' => $request->parameter_uji,
        ]);

        return redirect()->back()->with('success', 'Parameter uji berhasil ditambahkan!');
    }

    public function updateParameterUjiOtsk(Request $request, $id)
    {
        $request->validate([
            'parameter_uji' => 'required|string|max:255',
        ]);

        $param = ParameterUjiOtsk::findOrFail($id);
        $param->update([
            'parameter_uji' => $request->parameter_uji,
        ]);

        return redirect()->back()->with('success', 'Parameter uji berhasil diperbarui!');
    }

    public function deleteParameterUjiOtsk($id)
    {
        $param = ParameterUjiOtsk::findOrFail($id);
        $param->delete();
        return redirect()->back()->with('success', 'Parameter uji berhasil dihapus!');
    }

    public function storeMetodeUjiOtsk(Request $request)
    {
        $request->validate([
            'id_uji' => 'required|exists:parameter_uji_otsk,id_uji',
            'metode_uji' => 'required|string|max:255',
            'teknik_analisis' => 'required|in:KLT-Spektrofotodensitometri-KCKT,KCKT,KLT-Densitometri,KG,KLT-KCKT,SPE-KCKT,KLT-Spektrofotodensitometri,GC,AAS-HVG,AAS-GF,GC-MS',
            'jumlah_sampel' => 'required|numeric|min:1',
            'satuan_sampel' => 'required|in:gram,mL,dosis,mg',
            'pustaka' => 'required|string|max:255',
            'sediaan' => 'required|in:Padat,Cair,Padat dan Cair',
        ]);

        MetodeUjiOtsk::create([
            'id_uji' => $request->id_uji,
            'metode_uji' => $request->metode_uji,
            'teknik_analisis' => $request->teknik_analisis,
            'jumlah_sampel' => $request->jumlah_sampel,
            'satuan_sampel' => $request->satuan_sampel,
            'pustaka' => $request->pustaka,
            'sediaan' => $request->sediaan,
        ]);

        return redirect()->back()->with('success', 'Metode uji berhasil ditambahkan!');
    }

    public function updateMetodeUjiOtsk(Request $request, $id)
    {
        $request->validate([
            'metode_uji' => 'required|string|max:255',
            'teknik_analisis' => 'required|in:KLT-Spektrofotodensitometri-KCKT,KCKT,KLT-Densitometri,KG,KLT-KCKT,SPE-KCKT,KLT-Spektrofotodensitometri,GC,AAS-HVG,AAS-GF,GC-MS',
            'jumlah_sampel' => 'required|numeric|min:1',
            'satuan_sampel' => 'required|in:gram,mL,dosis,mg',
            'pustaka' => 'required|string|max:255',
            'sediaan' => 'required|in:Padat,Cair,Padat dan Cair',
        ]);

        $metode = MetodeUjiOtsk::findOrFail($id);
        $metode->update([
            'metode_uji' => $request->metode_uji,
            'teknik_analisis' => $request->teknik_analisis,
            'jumlah_sampel' => $request->jumlah_sampel,
            'satuan_sampel' => $request->satuan_sampel,
            'pustaka' => $request->pustaka,
            'sediaan' => $request->sediaan,
        ]);

        return redirect()->back()->with('success', 'Metode uji berhasil diperbarui!');
    }

    public function deleteMetodeUjiOtsk($id)
    {
        $metode = MetodeUjiOtsk::findOrFail($id);
        $metode->delete();
        return redirect()->back()->with('success', 'Metode uji berhasil dihapus!');
    }

    // ==================== CRUD KOSMETIK ====================

    public function showKosmetik()
    {
        $kosmetiks = Kosmetiks::with('kategoriKos.parameterKos')->orderBy('id_kos', 'desc')->get();
        return view('admin.kosmetik', compact('kosmetiks'));
    }

    public function storeKosmetik(Request $request)
    {
        $request->validate([
            'tipe_produk' => 'required|string|max:255',
        ]);

        Kosmetiks::create([
            'tipe_produk' => $request->tipe_produk,
        ]);

        return redirect()->back()->with('success', 'Data kosmetik berhasil ditambahkan!');
    }

    public function updateKosmetik(Request $request, $id)
    {
        $request->validate([
            'tipe_produk' => 'required|string|max:255',
        ]);

        $kosmetik = Kosmetiks::findOrFail($id);
        $kosmetik->update([
            'tipe_produk' => $request->tipe_produk,
        ]);

        return redirect()->back()->with('success', 'Data kosmetik berhasil diperbarui!');
    }

    public function deleteKosmetik($id)
    {
        $kosmetik = Kosmetiks::findOrFail($id);
        $kosmetik->delete();
        return redirect()->back()->with('success', 'Data kosmetik berhasil dihapus!');
    }

public function getKosmetik($id)
    {
        $kosmetik = Kosmetiks::with('kategoriKos.parameterKos')->findOrFail($id);
        return response()->json($kosmetik);
    }

    public function getKosmetikDetails($id)
    {
        $kosmetik = Kosmetiks::with(['kategoriKos.parameterKos'])->findOrFail($id);
        
        $data = [
            'id_kos' => $kosmetik->id_kos,
            'tipe_produk' => $kosmetik->tipe_produk,
            'kategori' => $kosmetik->kategoriKos->map(function($kategori) {
                return [
                    'id_kategori' => $kategori->id_kategori,
                    'kategori_kos' => $kategori->kategori_kos,
                    'parameters' => $kategori->parameterKos->map(function($param) {
                        return [
                            'id_parameter' => $param->id_parameter,
                            'puk' => $param->puk,
                            'pustaka' => $param->pustaka,
                            'teknik_analisis' => $param->teknik_analisis,
                            'metode' => $param->metode,
                            'sampel_min' => $param->sampel_min,
                            'satuan' => $param->satuan,
                            'harga' => $param->harga,
                            'waktu' => $param->waktu,
                        ];
                    })->toArray()
                ];
            })->toArray()
        ];
        
        return response()->json($data);
    }

    // ==================== CRUD KATEGORI KOSMETIK ====================

    public function storeKategoriKosmetik(Request $request)
    {
        $request->validate([
            'id_kosmetik' => 'required|exists:kosmetiks,id_kos',
            'kategori_kos' => 'required|string|max:255',
        ]);

        KategoriKos::create([
            'id_kos' => $request->id_kosmetik,
            'kategori_kos' => $request->kategori_kos,
        ]);

        return redirect()->back()->with('success', 'Kategori kosmetik berhasil ditambahkan!');
    }

    public function updateKategoriKosmetik(Request $request, $id)
    {
        $request->validate([
            'kategori_kos' => 'required|string|max:255',
        ]);

        $kategori = KategoriKos::findOrFail($id);
        $kategori->update([
            'kategori_kos' => $request->kategori_kos,
        ]);

        return redirect()->back()->with('success', 'Kategori kosmetik berhasil diperbarui!');
    }

    public function deleteKategoriKosmetik($id)
    {
        $kategori = KategoriKos::findOrFail($id);
        $kategori->delete();
        return redirect()->back()->with('success', 'Kategori kosmetik berhasil dihapus!');
    }

    // ==================== CRUD PARAMETER KOSMETIK ====================

    public function storeParameterKosmetik(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required|exists:kategori_kos,id_kategori',
            'puk' => 'required|string|max:255',
            'pustaka' => 'required|string|max:255',
            'teknik_analisis' => 'required|string|max:255',
            'metode' => 'required|string|max:255',
            'sampel_min' => 'nullable|numeric|min:0',
            'satuan' => 'required|string|max:50',
            'harga' => 'required|numeric|min:0',
            'waktu' => 'required|integer|min:0',
        ]);

        ParameterKos::create([
            'id_kategori' => $request->id_kategori,
            'puk' => $request->puk,
            'pustaka' => $request->pustaka,
            'teknik_analisis' => $request->teknik_analisis,
            'metode' => $request->metode,
            'sampel_min' => $request->sampel_min,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'waktu' => $request->waktu,
        ]);

        return redirect()->back()->with('success', 'Parameter kosmetik berhasil ditambahkan!');
    }

    public function updateParameterKosmetik(Request $request, $id)
    {
        $request->validate([
            'puk' => 'required|string|max:255',
            'pustaka' => 'required|string|max:255',
            'teknik_analisis' => 'required|string|max:255',
            'metode' => 'required|string|max:255',
            'sampel_min' => 'nullable|numeric|min:0',
            'satuan' => 'required|string|max:50',
            'harga' => 'required|numeric|min:0',
            'waktu' => 'required|integer|min:0',
        ]);

        $parameter = ParameterKos::findOrFail($id);
        $parameter->update([
            'puk' => $request->puk,
            'pustaka' => $request->pustaka,
            'teknik_analisis' => $request->teknik_analisis,
            'metode' => $request->metode,
            'sampel_min' => $request->sampel_min,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'waktu' => $request->waktu,
        ]);

        return redirect()->back()->with('success', 'Parameter kosmetik berhasil diperbarui!');
    }

    public function deleteParameterKosmetik($id)
    {
        $parameter = ParameterKos::findOrFail($id);
        $parameter->delete();
        return redirect()->back()->with('success', 'Parameter kosmetik berhasil dihapus!');
    }

    // ==================== CRUD PANGAN ====================

    public function showPangan()
    {
        $pangans = Pangan::with('parameterUjiPangan')->orderBy('id_pangan', 'desc')->get();
        return view('admin.pangan', compact('pangans'));
    }

    public function storePangan(Request $request)
    {
        $request->validate([
            'bahan_produk' => 'required|string|max:255',
            'waktu' => 'required|integer|min:0',
        ]);

        Pangan::create([
            'bahan_produk' => $request->bahan_produk,
            'waktu' => $request->waktu,
        ]);

        return redirect()->back()->with('success', 'Data pangan berhasil ditambahkan!');
    }

    public function updatePangan(Request $request, $id)
    {
        $request->validate([
            'bahan_produk' => 'required|string|max:255',
            'waktu' => 'required|integer|min:0',
        ]);

        $pangan = Pangan::findOrFail($id);
        $pangan->update([
            'bahan_produk' => $request->bahan_produk,
            'waktu' => $request->waktu,
        ]);

        return redirect()->back()->with('success', 'Data pangan berhasil diperbarui!');
    }

    public function deletePangan($id)
    {
        $pangan = Pangan::findOrFail($id);
        $pangan->delete();
        return redirect()->back()->with('success', 'Data pangan berhasil dihapus!');
    }

    public function getPangan($id)
    {
        $pangan = Pangan::with('parameterUjiPangan')->findOrFail($id);
        return response()->json($pangan);
    }

    public function getPanganDetails($id)
    {
        $pangan = Pangan::with('parameterUjiPangan')->findOrFail($id);
        return response()->json($pangan);
    }

    // ==================== CRUD PARAMETER UJI PANGAN ====================

    public function storeParameterUjiPangan(Request $request)
    {
        $validated = $request->validate([
            'id_pangan' => 'required|exists:pangan,id_pangan',
            'parameter_uji' => 'required|string|max:255',
            'metode' => 'required|string|max:255',
            'minimal_sampel' => 'nullable|numeric|min:0',
            'satuan' => 'required|string|max:50',
            'keterangan' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
        ]);

        // Normalize numeric fields to avoid unexpected string values in DB/output
        $validated['harga'] = (float) $validated['harga'];
        if (array_key_exists('minimal_sampel', $validated) && $validated['minimal_sampel'] !== null) {
            $validated['minimal_sampel'] = (float) $validated['minimal_sampel'];
        }

        ParameterUjiPangan::create($validated);

        return redirect()->back()->with('success', 'Parameter uji pangan berhasil ditambahkan!');
    }

    public function updateParameterUjiPangan(Request $request, $id)
    {
        $validated = $request->validate([
            'parameter_uji' => 'required|string|max:255',
            'metode' => 'required|string|max:255',
            'minimal_sampel' => 'nullable|numeric|min:0',
            'satuan' => 'required|string|max:50',
            'keterangan' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
        ]);

        // Normalize numeric fields to avoid unexpected string values in DB/output
        $validated['harga'] = (float) $validated['harga'];
        if (array_key_exists('minimal_sampel', $validated) && $validated['minimal_sampel'] !== null) {
            $validated['minimal_sampel'] = (float) $validated['minimal_sampel'];
        }

        $parameter = ParameterUjiPangan::findOrFail($id);
        $parameter->update($validated);

        return redirect()->back()->with('success', 'Parameter uji pangan berhasil diperbarui!');
    }

    public function deleteParameterUjiPangan($id)
    {
        $parameter = ParameterUjiPangan::findOrFail($id);

        // also remove any metode_uji_pangan entries tied to this parameter to satisfy FK
        \DB::table('metode_uji_pangan')->where('id_uji', $id)->delete();

        $parameter->delete();

        return redirect()->back()->with('success', 'Parameter uji pangan berhasil dihapus!');
    }
}
