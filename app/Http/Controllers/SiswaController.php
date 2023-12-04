<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaRequest;
use App\Models\Setting;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    public function index()
    {
        $ppdb = Setting::first();
        
        $siswaNotEmpty = Siswa::select('status')->where('user_id', Auth::user()->id)->first();
        
        if ($siswaNotEmpty) {
            return redirect()->route('home');
        }
        
        $siswa = Session::get('siswa');

        return view('siswa.form', compact('ppdb'))->with([
            'title' => 'Data Siswa',
            'siswa' => $siswa
        ]);
    }

    public function store(SiswaRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('pasfoto')) {
            $file = $request->file('pasfoto');
            $fileName = $request->nisn . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('pasfoto'), $fileName);

            $data['pasfoto'] = $fileName;
        }

        $request->session()->put('siswa', $data);

        return redirect()->route('form-orangtua');
    }
}
