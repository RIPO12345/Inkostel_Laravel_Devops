<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jual;



class JualController extends Controller
{
    // public function update(Request $request, $id)
    // {
        

    //     $img = $request->file("file");
    //     $img->move("img/profile", $img->getClientOriginalName());
       
        
    // }
    // public function tampilregisjual()
    // {
    //     return view("jualkos");
    // }

    // public function store(Request $request)
    // {

    //     $request->validate([
    //         "nama_kos" => 'required|string|max:255',
    //         "alamat" => 'required|string|max:255',

    //         "jarak_kos" => 'required|in:0-100_meter,100-500_meter,500-1000_meter',
    //         "ContactPerson" => 'required|string',
    //         "Fasilitas" => 'required|array',
    //         "harga_kos_pertahun" => 'required|string',
    //         'harga_kos_perbulan'=> 'string',

    //         "gambar_kos" => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         "Deskripsi" => 'required|string',
    //     ]);


        // $jual = new jual();

        // $jual->nama_kos = $request->input('nama_kos'); 
        // $jual->alamat = $request->input('alamat');
        // $jual->jarak = $request->input('jarak_kos');
        // $jual->nomor_telepon = $request->input('ContactPerson');

        // $jual->nama_kos = $request->input('nama_kos'); 
        // $jual->alamat = $request->input('alamat');
        // $jual->jarak_kos = $request->input('jarak_kos');
        // $jual->ContactPerson = $request->input('ContactPerson');
        // $jual->fasilitas = implode(',', $request->input('Fasilitas'));

        // $jual->harga_kos_pertahun = $request->input('harga_kos_pertahun');
        // $jual->harga_kos_perbulan = $request->input('harga_kos_perbulan');


        // $imagePath = $request->file('gambar_kos')->store('jual_image', 'public');
        // $jual->gambar_kos = $imagePath;

        // $jual->description = $request->input('Deskripsi');
        // $jual->save();


    //     return redirect()->back()->with('success', 'Data berhasil diunggah');
    // }



    

}
