<?php

namespace App\Http\Controllers;

use App\Http\Requests\AsalSekolahRequest;
use Illuminate\Support\Facades\Session;

class AsalSekolahController extends Controller
{
    public function index()
    {
        $asalSekolah = Session::get('asalSekolah');

        return view('siswa.form-asalsekolah')->with([
            'title' => 'Pendaftaran Siswa Baru',
            'asalSekolah' => $asalSekolah
        ]);
    }

    public function store(AsalSekolahRequest $request)
    {
        $data = $request->validated();

        $request->session()->put('asalSekolah', $data);

        return redirect()->route('form-asalsekolah');
    }
}
