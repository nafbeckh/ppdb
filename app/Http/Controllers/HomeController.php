<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $siswa = Siswa::where('user_id', Auth::user()->id)
                    ->with('orang_tua')
                    ->with('asal_sekolah')
                    ->first();

        if ($siswa) {
            $siswa->tgl_lahir = Carbon::parse($siswa->tgl_lahir)->format('d M Y');
            return view('home.data', compact(['siswa']))->with('title', 'Beranda');
        }

        return view('home.index')->with('title', 'Beranda');
    }
}
