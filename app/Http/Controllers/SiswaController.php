<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaRequest;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    public function index()
    {
        $siswaNotEmpty = Siswa::select('status')->where('user_id', Auth::user()->id)->first();
        
        if ($siswaNotEmpty) {
            return redirect()->route('home');
        }
        
        $siswa = Session::get('siswa');

        return view('siswa.form')->with([
            'title' => 'Data Siswa',
            'siswa' => $siswa
        ]);
    }

    public function store(SiswaRequest $request)
    {
        $data = $request->validated();

        $request->session()->put('siswa', $data);

        return redirect()->route('form-orangtua');
    }
}
