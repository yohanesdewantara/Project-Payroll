<?php

namespace App\Http\Controllers;
use App\Models\JadwalGaji;
use Illuminate\Http\Request;

class JadwalGajiController extends Controller
{
    //
    public function jadwal_gaji(){
        $jadwal_gaji = JadwalGaji::get();

        return view('jadwal_gaji.jadwal_gaji', compact('jadwal_gaji'));

    }
    public function tambahjadwal(){
        return view('jadwal_gaji.tambahjadwal');

    }
}
