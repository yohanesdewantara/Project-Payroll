<?php

namespace App\Http\Controllers;
use App\Models\JadwalGaji;
use App\Models\UserPerusahaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Perusahaan;


class JadwalGajiController extends Controller
{

    //
    public function jadwal_gaji(Request $request)
    {
        $banks = UserPerusahaan::pluck('alamat')->unique();
        $perusahaan = Perusahaan::find(6);



        if ($request->has('bank') && $request->bank != '') {
            $user_perusahaan = UserPerusahaan::where('alamat', $request->bank)
                ->orderByRaw("CASE
                WHEN status = 'active' THEN 1
                WHEN status = 'paid' THEN 2
                ELSE 3
            END")
                ->get();
        } else {
            // Ambil semua data jika tidak ada filter
            $user_perusahaan = UserPerusahaan::orderByRaw("CASE
            WHEN status = 'active' THEN 1
            WHEN status = 'paid' THEN 2
            ELSE 3
        END")
                ->get();

        }



        // Kirim data ke view
        return view('jadwal_gaji.Jadwal_gaji', compact('user_perusahaan', 'banks', 'perusahaan'));
    }







    public function tambahjadwal()
    {

        $user_perusahaan = UserPerusahaan::all();


        return view('jadwal_gaji.tambahjadwal', compact('user_perusahaan'));


    }
    public function userPerusahaan()
    {
        return $this->belongsTo(UserPerusahaan::class, 'id_user');
    }
    public function create()
    {

        $user_perusahaan = UserPerusahaan::all();

        return view('jadwal_gaji.tambahjadwal', compact('user_perusahaan'));
    }


    public function downloadPdf(Request $request)
    {
        $banks = UserPerusahaan::pluck('alamat')->unique();
        $perusahaan = Perusahaan::find(6);

        $bulan = $request->bulan;
        $tahun = $request->tahun;


        $user_perusahaan = UserPerusahaan::query();

        if ($tahun) {
            $user_perusahaan->whereYear('jadwal_gaji_tanggal', $tahun);
        }


        if ($bulan) {
            $user_perusahaan->whereMonth('jadwal_gaji_tanggal', $bulan);
        }


        $user_perusahaan = $user_perusahaan->get();

        // Ambil tahun dari data yang sudah difilter, jika tidak ada, gunakan tahun saat ini
        $tahun = $user_perusahaan->isNotEmpty() ? \Carbon\Carbon::parse($user_perusahaan->first()->jadwal_gaji_tanggal)->year : now()->year;

        // Hitung total gaji setelah filter
        $total_gaji = $user_perusahaan->sum('gaji');
        $currentMonth = now()->format('F'); // Nama bulan saat ini
        $currentYear = now()->year; // Tahun saat ini

        // Buat PDF dari view dengan data yang sudah difilter
        $pdf = Pdf::loadView('jadwal_gaji.jadwal_gaji_pdf', compact('user_perusahaan', 'banks', 'perusahaan', 'total_gaji', 'currentMonth', 'currentYear', 'bulan', 'tahun'));


        return $pdf->download('Laporan Gaji.pdf');
    }


}
