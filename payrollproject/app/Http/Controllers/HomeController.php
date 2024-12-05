<?php

namespace App\Http\Controllers;
use App\Models\UserPerusahaan;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua data user perusahaan
    $user_perusahaan = UserPerusahaan::get();

    // Hitung jumlah user perusahaan
    $jumlah_user = UserPerusahaan::count();
    $jumlah_jabatan = UserPerusahaan::distinct('jabatan')->count();

    // Ambil 5 karyawan dengan gaji tertinggi
    $karyawanGajiTertinggi = UserPerusahaan::orderBy('gaji', 'desc')->take(5)->get();
    return view('home', compact('jumlah_user', 'jumlah_jabatan', 'karyawanGajiTertinggi', 'user_perusahaan'));



    }


    public function user_perusahaan()
    {

        return view('user_perusahaan.userb');
    }
    public function perusahaan()
    {
        return view('perusahaan.perusahaanb');
    }

    public function jadwal_gaji()
    {
        return view('jadwal_gaji.jadwal_gaji');
    }
    public function gajiTertinggi()
    {
        $karyawanGajiTertinggi = UserPerusahaan::orderBy('gaji', 'desc')->take(5)->get();

        return view('home', compact('karyawanGajiTertinggi'));

    }






}
