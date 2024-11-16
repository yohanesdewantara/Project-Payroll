<?php

namespace App\Http\Controllers;

use App\Models\UserPerusahaan;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function user_perusahaan(){
        $user_perusahaan = UserPerusahaan::get();

        return view('user_perusahaan.userb', compact('user_perusahaan'));

    }

    public function create(){
        return view('user_perusahaan.create');

    }
    public function daftar_user(request $request){
        $request->validate([
            'nama_user' => 'required|max : 255|string',
            'jabatan' =>'required|max : 255|string',
            'alamat' =>'required|max : 255|string',
            'gaji' =>'required|max : 255|string',
            'norek_user' =>'required|max : 255|string'

        ]);
        UserPerusahaan::create([
            'nama_user' => $request->nama_user,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'gaji' => $request->gaji,
            'norek_user' => $request->norek_user
        ]);
        return redirect('user_perusahaan/create')->with('status','user berhasil dibuat');


    }

    public function edit(int $id_user){
        $user_perusahaan = UserPerusahaan::findOrFail($id_user);
        // return $user_perusahaan;
        return view('user_perusahaan.edit', compact('user_perusahaan'));

    }

    public function update(Request $request, int $id_user){
        $id_user = (int) $id_user;
        $request->validate([
            'nama_user' => 'required|max : 255|string',
            'jabatan' =>'required|max : 255|string',
            'alamat' =>'required|max : 255|string',
            'gaji' =>'required|max : 255|string',
            'norek_user' =>'required|max : 255|string'

        ]);
        UserPerusahaan::findOrFail($id_user)->update([
            'nama_user' => $request->nama_user,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'gaji' => $request->gaji,
            'norek_user' => $request->norek_user
        ]);
        return redirect()->back()->with('status','user berhasil di update');

    }
    public function destroy(int $id_user){
        $user_perusahaan = UserPerusahaan::findOrFail($id_user);
        $user_perusahaan->delete();

        return redirect()->back()->with('status','user berhasil di dihapus');

    }
}
