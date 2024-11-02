<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Validasi;

class AccceptController extends Controller
{
    public function acceptkos($id)
    {
        // Menggunakan findOrFail untuk mencari detail kos berdasarkan ID
        $carikos = Validasi::find($id);

        return view('acc', compact('validation'));
    }
}
