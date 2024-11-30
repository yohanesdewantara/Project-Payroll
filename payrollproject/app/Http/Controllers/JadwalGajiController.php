<?php

namespace App\Http\Controllers;
use App\Models\JadwalGaji;
use App\Models\UserPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Perusahaan;


class JadwalGajiController extends Controller
{
    //
    public function jadwal_gaji(Request $request)
    {
        $banks = UserPerusahaan::pluck('alamat')->unique();
        $perusahaan = Perusahaan::find(6);


        // Filter berdasarkan bank yang dipilih
        if ($request->has('bank') && $request->bank != '') {
            $user_perusahaan = UserPerusahaan::where('alamat', $request->bank)->get();

        } else {
            // Ambil semua data jika tidak ada filter
            $user_perusahaan = UserPerusahaan::all();

        }

        // Kirim data ke view
        return view('jadwal_gaji.Jadwal_gaji', compact('user_perusahaan', 'banks', 'perusahaan'));
    }







    public function tambahjadwal()
    {
        // return view('jadwal_gaji.tambahjadwal');

        // Mengambil data user_perusahaan dari model UserPerusahaan
        $user_perusahaan = UserPerusahaan::all(); // Ambil semua karyawan

        // Mengirim data ke view
        return view('jadwal_gaji.tambahjadwal', compact('user_perusahaan'));


    }
    public function userPerusahaan()
    {
        return $this->belongsTo(UserPerusahaan::class, 'id_user');
    }
    public function create()
    {
        // Ambil data dari tabel yang dibutuhkan
        $user_perusahaan = UserPerusahaan::all(); // Sesuaikan dengan kebutuhan
        // $banks = UserPerusahaan::all(); // Hanya jika relevan

        // Kirim data ke view
        return view('jadwal_gaji.tambahjadwal', compact('user_perusahaan'));
    }



}
