<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CariKos;
use App\Helpers\Helpers;

class CariKosController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');
        $carikos = CariKos::when($searchTerm, function ($query, $searchTerm) {
            return $query->where('nama_kos', 'LIKE', '%' . $searchTerm . '%');
        })->paginate(8);;

        return view('carikost', compact('carikos', 'searchTerm'));
    }

    public function detailkos($id)
    {
       
        $carikos = CariKos::find($id);

        return view('detailKos', compact('carikos'));
    }
    
    
}
