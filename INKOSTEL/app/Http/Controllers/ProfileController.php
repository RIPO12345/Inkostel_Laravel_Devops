<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();

        if ($user) {
            $profileData = Profile::find($user->id);
            return view('profile', compact('profileData'));
        } else {
            return redirect()->route('login');
        }
    }
    
    public function update(Request $request, $id)
    {
        $profileData = Profile::where('id', $id)->first();
        if ($request->hasFile("file")) {
            $img = $request->file("file");
            $img->move("img/profile", $img->getClientOriginalName());
            $profileData->foto_profil = $img->getClientOriginalName();
        }
        $profileData->username = $request->username;
        $profileData->email = $request->email;
        $profileData->nama_panjang = $request->nama_panjang;
        $profileData->nomor_telpon = $request->nomor_telpon;
        $profileData->save();
        return redirect('profile')->with('success', 'Data Berhasil Diperbarui');
    }
}
