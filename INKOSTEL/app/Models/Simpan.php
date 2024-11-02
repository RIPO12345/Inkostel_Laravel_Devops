<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Simpan extends Model
{
    protected $table = 'bookmark_kos';

    protected $fillable =[

       'id', 'user_id', 'id_kos', 'nama_kos', 'harga_kos_pertahun', 'jarak_kos', 'gambar_kos1' 
    ];
    protected $primaryKey = 'id';
   
}

