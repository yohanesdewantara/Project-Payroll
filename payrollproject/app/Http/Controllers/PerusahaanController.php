<?php

namespace App\Http\Controllers;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    //
    public function perusahaan(){
        $perusahaan = Perusahaan::get();

        return view('perusahaan.perusahaanb', compact('perusahaan'));

    }

    public function createp(){
        return view('perusahaan.createp');

    }
    public function daftar_perusahaan(request $request){
        $request->validate([
            'nama_perusahaan' => 'required|max : 255|string',
            'alamat' =>'required|max : 125|string',
            'nohp_perusahaan' =>'required|max : 20|string',
            'norek_perusahaan' =>'required|max : 50|string'


        ]);
        Perusahaan::create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat' => $request->alamat,
            'nohp_perusahaan' => $request->nohp_perusahaan,
            'norek_perusahaan' => $request->norek_perusahaan

        ]);
        return redirect('perusahaan/createp')->with('status','Perusahaan berhasil dibuat');


    }

    public function edit(int $id_perusahaan){
        $perusahaan = Perusahaan::findOrFail($id_perusahaan);

        return view('perusahaan.editp', compact('perusahaan'));

    }

    public function update(Request $request, int $id_perusahaan){
        $id_perusahaan = (int) $id_perusahaan;
        $request->validate([
            'nama_perusahaan' => 'required|max : 255|string',
            'alamat' =>'required|max : 125|string',
            'nohp_perusahaan' =>'required|max : 20|string',
            'norek_perusahaan' =>'required|max : 50|string'

        ]);
        Perusahaan::findOrFail($id_perusahaan)->update([
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat' => $request->alamat,
            'nohp_perusahaan' => $request->nohp_perusahaan,
            'norek_perusahaan' => $request->norek_perusahaan
        ]);
        return redirect()->back()->with('status','Perusahaan berhasil di update');

    }
    public function destroy(int $perusahaan){
        $perusahaan = Perusahaan::findOrFail($perusahaan);
        $perusahaan->delete();

        return redirect()->back()->with('status','Perusahaan berhasil di dihapus');

    }
}
