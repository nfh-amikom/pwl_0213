<?php

namespace App\Http\Controllers\Latihan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function coba() {
        $nama = 'Nurul';
        $data = ['namaOrang' => $nama];
        return view('coba.profil', $data);
    }
}
