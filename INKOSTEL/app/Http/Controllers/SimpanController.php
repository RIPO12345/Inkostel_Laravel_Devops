<?php

namespace App\Http\Controllers;

use App\Models\Simpan;
use App\Models\CariKos; 
use Illuminate\Http\Request;

class SimpanController extends Controller
{
    public function tampilkanHalamanSimpan()
    {
        // Ambil data dari database
        $dataKos = Simpan::paginate(8);

        // Kirimkan data ke view
        return view('simpan', compact('dataKos'));
    }

    public function detailkos($id)
    {
       
        $dataKos = Simpan::find($id);

        return view('detailKos', compact('dataKos'));
    }


    public function simpanKost($id, Request $request)
    {
        $user = auth()->user();

        // Ambil data kos yang akan disimpan
        $carikos = CariKos::find($id);

        // Cek apakah sudah disimpan sebelumnya
        $bookmark = Simpan::where('user_id', $user->id)->where('id_kos', $id)->first();

   

        // Simpan data ke tabel BookmarkKos
        Simpan::updateOrCreate(
            [
                'user_id' => $user->id,
                'id_kos' => $id,
            ],
            [
                'user_id' => $user->id,
                'id_kos' => $id,
                'nama_kos' => $carikos->nama_kos,
                'harga_kos_pertahun' => $carikos->harga_kos_pertahun,
                'jarak_kos' => $carikos->jarak_kos,
                'gambar_kos1' => $carikos->gambar_kos1,
                // Tambahkan kolom lain yang diperlukan
            ]
        );

       
    }


    public function hapusSimpan($id)
    {
        // Cari dan hapus data bookmark berdasarkan ID
        $bookmark = Simpan::find($id);
        if ($bookmark) {
            $bookmark->delete();
            return redirect()->route('simpan.halaman')->with('success', 'Data berhasil dihapus.');
        }

        // Jika data tidak ditemukan
        return redirect()->route('simpan.halaman')->with('error', 'Data tidak ditemukan.');
    }
    
}
