<?php

namespace App\Http\Controllers;

use App\Http\Requests\AsalSekolahRequest;
use App\Models\AsalSekolah;
use App\Models\OrangTua;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AsalSekolahController extends Controller
{
    public function index()
    {
        $siswaNotEmpty = Siswa::select('status')->where('user_id', Auth::user()->id)->first();
        
        if ($siswaNotEmpty) {
            return redirect()->route('home');
        }

        $asalSekolah = Session::get('asalSekolah');

        return view('asalsekolah.form')->with([
            'title' => 'Data Asal Sekolah',
            'asalSekolah' => $asalSekolah
        ]);
    }

    public function store(AsalSekolahRequest $request)
    {
        $data = $request->validated();

        $request->session()->put('asalSekolah', $data);

        $siswa = new Siswa(Session::get('siswa'));
        $siswa->user_id = Auth::user()->id;
        $siswa->save();

        $orangTua = new OrangTua(Session::get('orangTua'));
        $orangTua->siswa_id = $siswa->id;
        $orangTua->save();

        $asalSekolah = new AsalSekolah($request->input());
        $asalSekolah->siswa_id = $siswa->id;
        $asalSekolah->nilai = $asalSekolah->nilai ?: 0;
        $asalSekolah->save();

        Session::forget(['siswa', 'orangTua', 'asalSekolah']);

        return redirect()->route('home')->with(['statusSave'=> true]);
    }
}
