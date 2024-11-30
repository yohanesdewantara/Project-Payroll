<?php

namespace App\Http\Controllers;

use App\Models\UserPerusahaan;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function user_perusahaan()
    {
        $user_perusahaan = UserPerusahaan::get();

        return view('user_perusahaan.userb', compact('user_perusahaan'));

    }

    public function create()
    {
        return view('user_perusahaan.create');

    }
    public function daftar_user(Request $request)
    {
        $request->validate([
            'nama_user' => 'required|max:255|string',
            'jabatan' => 'required|max:255|string',
            'alamat' => 'required|max:255|string',
            'gaji' => 'required|max:255|string',
            'norek_user' => 'required|max:255|string'
        ]);

        $existingUser = UserPerusahaan::where('alamat', $request->alamat)
            ->where('norek_user', $request->norek_user)
            ->first();

        if ($existingUser) {
            return redirect()->back()->withInput()->withErrors([
                'error' => 'Bank dan Nomor Rekening sudah digunakan!'
            ]);
        }

        UserPerusahaan::create([
            'nama_user' => $request->nama_user,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'gaji' => $request->gaji,
            'norek_user' => $request->norek_user
        ]);

        return redirect('user_perusahaan/create')->with('status', 'User berhasil dibuat');
    }

    public function edit(int $id_user)
    {
        $user_perusahaan = UserPerusahaan::findOrFail($id_user);

        // return $user_perusahaan;
        return view('user_perusahaan.edit', compact('user_perusahaan'));

    }

    public function update(Request $request, int $id_user)
    {
        // Validasi input
        $request->validate([
            'nama_user' => 'required|max:255|string',
            'jabatan' => 'required|max:255|string',
            'alamat' => 'required|max:255|string',
            'gaji' => 'required|max:255|string',
            'norek_user' => 'required|max:255|string'
        ]);

        // Mengambil data user yang sedang diupdate
        $existingUser = UserPerusahaan::where('alamat', $request->alamat)
            ->where('norek_user', $request->norek_user)
            // Mengecualikan pengecekan untuk user yang sedang diupdate
            ->where('id_user', '<>', $id_user)
            ->first();

        // Jika ada user lain dengan bank dan nomor rekening yang sama
        if ($existingUser) {
            return redirect()->back()->withErrors([
                'error' => 'Bank dan Nomor Rekening sudah digunakan oleh pengguna lain!'
            ]);
        }

        // Melakukan update data user
        UserPerusahaan::findOrFail($id_user)->update([
            'nama_user' => $request->nama_user,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'gaji' => $request->gaji,
            'norek_user' => $request->norek_user
        ]);

        return redirect()->back()->with('status', 'User berhasil diupdate');
    }

    public function destroy(int $id_user)
    {
        $user_perusahaan = UserPerusahaan::findOrFail($id_user);
        $user_perusahaan->delete();

        return redirect()->back()->with('status', 'user berhasil di dihapus');

    }
}
