<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrangTuaRequest;
use App\Models\Setting;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrangTuaController extends Controller
{
    public function index()
    {
        $ppdb = Setting::first();

        $siswaNotEmpty = Siswa::select('status')->where('user_id', Auth::user()->id)->first();
        
        if ($siswaNotEmpty) {
            return redirect()->route('home');
        }

        $orangTua = Session::get('orangTua');

        return view('orangtua.form', compact('ppdb'))->with([
            'title' => 'Data Orang Tua',
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
