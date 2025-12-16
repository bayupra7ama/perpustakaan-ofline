<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayananReferensiController extends Controller
{
    public function mejaInformasi()
    {
        return view('user.referensi.meja_informasi');
    }

    public function konsultasi()
    {
        return view('user.referensi.konsultasi');
    }

    public function kesiagaanInformasi()
    {
        return view('user.referensi.kesiagaan_informasi');
    }
}
