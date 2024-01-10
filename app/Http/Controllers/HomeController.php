<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $ppdb = Setting::first();

        $ppdb->tgl_buka = Carbon::parse($ppdb->tgl_buka)->formatLocalized('%d %B %Y');
        $ppdb->tgl_tutup = Carbon::parse($ppdb->tgl_tutup)->formatLocalized('%d %B %Y');
        $ppdb->tgl_pengumuman = Carbon::parse($ppdb->tgl_pengumuman)->formatLocalized('%d %B %Y');

        $siswa = Siswa::where('user_id', Auth::user()->id)
                    ->with('orang_tua')
                    ->with('asal_sekolah')
                    ->first();

        if ($siswa) {
            $diterima = null;

            if (strtotime($ppdb->tgl_pengumuman) <= strtotime('now')) {
                if ($siswa->status == 'Diterima') {
                    $diterima = true;
                }
    
                if ($siswa->status == 'Ditolak') {
                    $diterima = false;
                }
            }

            $siswa->tgl_lahir = Carbon::parse($siswa->tgl_lahir)->format('d M Y');
            return view('home.data', compact(['ppdb', 'siswa', 'diterima']))->with('title', 'Beranda');
        }

        return view('home.index', compact('ppdb'))->with('title', 'Beranda');
    }
}
