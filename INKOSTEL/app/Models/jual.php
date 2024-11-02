<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jual extends Model
{
    use HasFactory;

    protected $table = 'validation';
    protected $fillable = [

        'nama_kos',
        'harga_kos_perbulan', 
        'harga_kos_pertahun', 
        'jarak_kos', 
        'gambar_kos1', 
        'gambar_kos2', 
        'gambar_kos3', 
        'gambar_kos4', 
        'gambar_kos5', 
        'alamat', 
        'Deskripsi', 
        'Fasilitas', 
        'ContactPerson',
    ];


    // protected $primaryKey = 'id_kos';
    
}
