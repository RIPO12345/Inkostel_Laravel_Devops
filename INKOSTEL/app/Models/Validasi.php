<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validasi extends Model
{
    use HasFactory;
    protected $table = 'validation';

    protected $fillable =[

        'nama_kos', 'harga_kos_pertahun','harga_kos_perbulan', 'jarak_kos', 'gambar_kos1', 'gambar_kos2', 'gambar_kos3', 'gambar_kos4', 'gambar_kos5',
        'alamat', 'jarak_kos', 'Deskripsi', 'Fasilitas', 'ContactPerson', 'KamarKosong'
    ];
    protected $primaryKey = 'id_kos';
}
