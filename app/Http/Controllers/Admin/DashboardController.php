<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index()
    {
        $siswa = Siswa::count();
        $terdaftar = Siswa::where('status', 'Terdaftar')->count();
        $diterima = Siswa::where('status', 'Diterima')->count();
        $ditolak = Siswa::where('status', 'Ditolak')->count();
        
        return view('admin.dashboard.index', compact(['siswa', 'terdaftar', 'diterima', 'ditolak']))
            ->with(['title' => 'Dashboard']);
    }
}
