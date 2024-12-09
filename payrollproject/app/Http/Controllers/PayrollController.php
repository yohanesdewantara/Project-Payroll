<?php

// app/Http/Controllers/PayrollController.php

// app/Http/Controllers/PayrollController.php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\UserPerusahaan;
use App\Models\LogPayroll;
use Illuminate\Http\Request;
use App\Models\JadwalGaji; // Tambahkan ini di controller
use Carbon\Carbon;


class PayrollController extends Controller
{
    public function processPayroll(Request $request)
    {
        // Mendapatkan ID perusahaan dan daftar karyawan yang dipilih
        $perusahaan = Perusahaan::find($request->perusahaan_id);
        $selectedUserIds = $request->user_ids;

        // Validasi apakah perusahaan dan karyawan yang dipilih ada
        if (!$perusahaan || !$selectedUserIds) {
            return redirect()->back()->with('error', 'Perusahaan atau karyawan tidak ditemukan.');
        }

        // Mendapatkan karyawan yang dipilih
        $users = UserPerusahaan::whereIn('id_user', $selectedUserIds)->get();

        // Cek apakah ada karyawan yang sudah dibayar
        $alreadyPaid = $users->where('status', 'PAID');
        if ($alreadyPaid->isNotEmpty()) {
            $paidUsernames = $alreadyPaid->pluck('nama_user')->join(', ');
            return redirect()->back()->with('error', "Karyawan sudah dibayar");
        }

        // Cek apakah saldo perusahaan cukup untuk membayar gaji
        $totalGaji = $users->sum('gaji');
        if ($perusahaan->saldo < $totalGaji) {
            return redirect()->back()->with('error', 'Saldo perusahaan tidak cukup untuk membayar gaji karyawan.');
        }

        // Proses penggajian: potong saldo perusahaan dan ubah status karyawan
        foreach ($users as $user) {
            $user->status = 'PAID';  // Ubah status menjadi PAID jika dibayar
            $user->save();

            // Log penggajian
            LogPayroll::create([
                'id_user' => $user->id_user,
                'id_perusahaan' => $perusahaan->id_perusahaan,
                'amount' => $user->gaji,
                'status' => 'SUCCESS',
            ]);
        }

        // Potong saldo perusahaan
        $perusahaan->saldo -= $totalGaji;
        $perusahaan->save();

        return redirect()->route('jadwal_gaji')->with('success', 'Penggajian berhasil diproses.');
    }


    public function setJadwalGaji(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'jadwal_gaji_tanggal' => 'required|date',
            'jadwal_gaji_jam' => 'required|date_format:H:i',
            'user_ids' => 'required|array',
        ]);

        // Menyimpan data jadwal gaji untuk setiap karyawan yang dipilih
        foreach ($request->user_ids as $userId) {
            $user = UserPerusahaan::find($userId);
            if ($user) {
                // Update kolom jadwal gaji untuk karyawan
                $user->jadwal_gaji_tanggal = $request->jadwal_gaji_tanggal;
                $user->jadwal_gaji_jam = $request->jadwal_gaji_jam;
                $user->save();
            }
        }

        // Redirect dengan pesan sukses
        return redirect()->route('jadwal_gaji.tambahjadwal')->with('success', 'Jadwal Gaji berhasil diset.');
    }

    public function logPayroll(Request $request)
    {
        $banks = UserPerusahaan::pluck('alamat')->unique();
        $perusahaan = Perusahaan::find(6); // Ambil data perusahaan dengan ID 6


        // Ambil bulan dari request
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $user_perusahaan = UserPerusahaan::query();

        // Tambahkan filter bank jika ada


        // Tambahkan filter bulan jika ada
        if ($bulan) {
            $user_perusahaan->whereMonth('jadwal_gaji_tanggal', '=', $bulan);
        }

        if ($tahun) {
            $user_perusahaan->whereYear('jadwal_gaji_tanggal', '=', $tahun);
        }

        // Urutkan berdasarkan status
        $user_perusahaan->orderByRaw("CASE
            WHEN status = 'active' THEN 1
            WHEN status = 'paid' THEN 2
            ELSE 3
        END");

        // Ambil data
        $user_perusahaan = $user_perusahaan->get();

        // Kirim data ke view
        return view('jadwal_gaji.log_payroll', compact('user_perusahaan', 'banks', 'perusahaan', 'bulan', 'tahun'));
    }



}
