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
        ]);

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
        $parameter->update([
            'parameter_uji' => $request->parameter_uji,
            'metode_uji' => $request->metode_uji,
            'jumlah_minimal' => $request->jumlah_minimal,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
        ]);

        return redirect()->back()->with('success', 'Parameter uji berhasil diperbarui!');
    }

    public function deleteParameterUji($id)
    {
        $parameter = ParameterUji::findOrFail($id);
        $parameter->delete();
        return redirect()->back()->with('success', 'Parameter uji berhasil dihapus!');
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
            'id_produk' => 'required|exists:tipe_produk,id_produk',
            'nama_klaim' => 'required|string|max:255',
        ]);

        ProdukKlaim::create([
            'id_produk' => $request->id_produk,
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
            'sediaan' => 'required|string|max:255',
            'metode_uji' => 'required|string|max:255',
            'teknik_analisis' => 'required|string|max:255',
            'jumlah_sampel' => 'required|numeric|min:1',
            'satuan_sampel' => 'required|string|max:50',
        ]);

        MetodeUjiOtsk::create([
            'id_uji' => $request->id_uji,
            'sediaan' => $request->sediaan,
            'metode_uji' => $request->metode_uji,
            'teknik_analisis' => $request->teknik_analisis,
            'jumlah_sampel' => $request->jumlah_sampel,
            'satuan_sampel' => $request->satuan_sampel,
        ]);

        return redirect()->back()->with('success', 'Metode uji berhasil ditambahkan!');
    }

    public function updateMetodeUjiOtsk(Request $request, $id)
    {
        $request->validate([
            'sediaan' => 'required|string|max:255',
            'metode_uji' => 'required|string|max:255',
            'teknik_analisis' => 'required|string|max:255',
            'jumlah_sampel' => 'required|numeric|min:1',
            'satuan_sampel' => 'required|string|max:50',
        ]);

        $metode = MetodeUjiOtsk::findOrFail($id);
        $metode->update([
            'sediaan' => $request->sediaan,
            'metode_uji' => $request->metode_uji,
            'teknik_analisis' => $request->teknik_analisis,
            'jumlah_sampel' => $request->jumlah_sampel,
            'satuan_sampel' => $request->satuan_sampel,
        ]);

        return redirect()->back()->with('success', 'Metode uji berhasil diperbarui!');
    }

    public function deleteMetodeUjiOtsk($id)
    {
        $metode = MetodeUjiOtsk::findOrFail($id);
        $metode->delete();
        return redirect()->back()->with('success', 'Metode uji berhasil dihapus!');
    }
}
