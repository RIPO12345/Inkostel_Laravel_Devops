<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Validasi;
use App\Models\CariKos;


class ValidationController extends Controller
{
    public function index(){
        $validation = Validasi::all();
        return view("validasi",compact(['validation']));
    }

    public function acceptkos($id)
    {
        // Menggunakan findOrFail untuk mencari detail kos berdasarkan ID
        $validation = Validasi::find($id);

        return view('accept', compact('validation'));
    }

    public function terima($id)
    {
        // Mengambil data validasi berdasarkan ID
        $validation = Validasi::find($id);

        // Membuat entri baru di tabel Carikos dengan menggunakan data dari tabel Validasi
        $carikos = new Carikos();
        $carikos->user_id= $validation->user_id;
        $carikos->nama_kos = $validation->nama_kos; 
        $carikos->harga_kos_pertahun = $validation->harga_kos_pertahun;
        $carikos->harga_kos_perbulan = $validation->harga_kos_perbulan;
        $carikos->jarak_kos = $validation->jarak_kos;
        $carikos->gambar_kos1 = $validation->gambar_kos1;
        $carikos->gambar_kos2 = $validation->gambar_kos2;
        $carikos->gambar_kos3 = $validation->gambar_kos3;
        $carikos->gambar_kos4 = $validation->gambar_kos4;
        $carikos->gambar_kos5 = $validation->gambar_kos5;
        $carikos->alamat = $validation->alamat;
        $carikos->Deskripsi = $validation->Deskripsi;
        $carikos->ContactPerson= $validation->ContactPerson;

        // Simpan entri baru ke tabel Carikos
        $carikos->save();

        // Menghapus data dari tabel Validasi berdasarkan ID setelah disalin ke Carikos
        $validation->delete();

        // Redirect ke halaman tertentu atau tampilkan pesan sukses jika diperlukan
        return redirect()->route('val');
    }
        
    public function tolak($id)
    {
        // Menghapus data dari tabel Validasi berdasarkan ID
        Validasi::find($id)->delete();

        // Redirect ke halaman tertentu atau tampilkan pesan sukses jika diperlukan
        return redirect()->route('val');
    }

    public function store(Request $request)
    {
        $imageNames = [];

        foreach ($request->file('gambar_kos1') as $key => $file) {
            $imageName = $file->getClientOriginalName();
            $file->move(public_path('img'), $imageName);
            $imageNames[] = $imageName;
        }

        $validasi = new Validasi();
        $validasi->nama_kos = $request->input('nama_kos');
        $validasi->harga_kos_perbulan = $request->input('harga_kos_perbulan');
        $validasi->harga_kos_pertahun = $request->input('harga_kos_pertahun');
        $validasi->jarak_kos = $request->input('jarak_kos');
        // Mengambil gambar dari array dan menyimpannya ke kolom yang sesuai
        for ($i = 1; $i <= count($imageNames); $i++) {
            $validasi->{"gambar_kos" . $i} = $imageNames[$i - 1] ?? null;
        }
        $validasi->alamat = $request->input('alamat');
        $validasi->Deskripsi = $request->input('Deskripsi');
        $validasi->ContactPerson = $request->input('ContactPerson');
        // Set field-field lainnya jika ada

        $validasi->save();

        return redirect('/jualkos')->with('success', 'Data berhasil disimpan.');
    }
}
