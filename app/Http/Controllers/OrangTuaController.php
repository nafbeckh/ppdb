<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrangTuaRequest;
use Illuminate\Support\Facades\Session;

class OrangTuaController extends Controller
{
    public function index()
    {
        $orangTua = Session::get('orangTua');

        return view('siswa.form-orangtua')->with([
            'title' => 'Pendaftaran Siswa Baru',
            'orangTua' => $orangTua
        ]);
    }

    public function store(OrangTuaRequest $request)
    {
        $data = $request->validated();

        $request->session()->put('orangTua', $data);

        return redirect()->route('form-asalsekolah');
    }
}
