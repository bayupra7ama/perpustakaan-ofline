<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayananPerpustakaanController extends Controller
{
   
    // ======================
    // MENU BARU (sesuai contoh dropdown)
    // ======================
    public function bacaDiTempat()
    {
        return view('user.layanan.baca_di_tempat');
    }

    public function sirkulasi()
    {
        return view('user.layanan.sirkulasi');
    }

    public function referensi()
    {
        return view('user.layanan.referensi');
    }

    public function penelusuranInformasi()
    {
        return view('user.layanan.penelusuran_informasi');
    }

}
