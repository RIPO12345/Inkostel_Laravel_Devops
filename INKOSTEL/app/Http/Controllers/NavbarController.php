<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CariKos;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class NavbarController extends Controller
{
    public function getNavbarData()
    {
        $navbarData = [];

        if (Auth::check()) {
            $navbarData['username'] = Auth::user()->username;
            $navbarData['picture_profile'] = Auth::user()->profile_image;
        }

        return $navbarData;
    }
}
