<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        // Debug untuk memeriksa data yang diterima
        // // dd($data);
        // $data = $request->only('username', 'password');
        // if (Auth::guard('super_admin')->attempt($data)) {
        //     return redirect()->route('admin.home')->with('success', 'Selamat datang, Super Admin!');
        // } elseif (Auth::guard('admin')->attempt($data)) {
        //     return redirect()->route('home')->with('success', 'Login berhasil sebagai Admin.');
        // } else {
        //     return redirect()->route('login')->with('failed', 'Username atau Password salah.');
        // }

        // if (Auth::guard('admin')->attempt($data)) {
        //     return redirect()->route('home');
        // } else {
        //     return redirect()->route('login')->with('failed', 'Username atau Password salah');
        // }

        // if (Auth::guard('super_admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
        //     return redirect()->route('home')->with('success', 'Selamat datang, Super Admin!');
        // } elseif (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
        //     return redirect()->route('home')->with('success', 'Login berhasil sebagai Admin.');
        // } else {
        //     return redirect()->route('login')->with('failed', 'Username atau Password salah');
        // }

        if (Auth::guard('super_admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('home')->with('success', 'Selamat datang, Super Admin!');
        } elseif (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('home')->with('success', 'Login berhasil sebagai Admin.');
        } elseif (Auth::guard('admin_payroll')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('home')->with('success', 'Login berhasil sebagai Admin Payroll.');
        } else {
            return redirect()->route('login')->with('failed', 'Username atau Password salah');
        }





    }

    public function logout(){
       Auth::logout();
       return redirect()->route('login')->with('succcess','Kamu berhasil logout');
    }
}
