<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home'); //menampilkan halaman home
    }

    // public function dashboard()
    // {
    //     return view('dashboard'); //menampilkan halaman dashboard
    // }
    public function user_perusahaan()
    {
        return view('user_perusahaan.userb'); //menampilkan halaman user_perusahaan
    }
    public function perusahaan()
    {
        return view('perusahaan.perusahaanb'); //menampilkan halaman perusahaan
    }

    public function jadwal_gaji()
    {
        return view('jadwal_gaji.jadwal_gaji'); //menampilkan halaman perusahaan
    }




}
