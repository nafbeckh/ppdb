<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaRequest;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Session::get('siswa');

        return view('siswa.form-siswa')->with([
            'title' => 'Pendaftaran Siswa Baru',
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
