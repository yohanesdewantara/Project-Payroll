<?php

namespace App\Http\Controllers;
use App\Models\LogPayroll;
use Illuminate\Http\Request;

class LogPayrollController extends Controller
{
    //
    public function index()
    {
        $payrollLogs = LogPayroll::all();  // Mengambil semua data log payroll
        return view('payroll-report', compact('payrollLogs'));
    }

    // Menyimpan log penggajian setelah proses penggajian
    public function store($userId, $perusahaanId, $amount, $status)
    {
        LogPayroll::create([
            'id_user' => $userId,
            'id_perusahaan' => $perusahaanId,
            'amount' => $amount,
            'status' => $status,
        ]);
    }
}
