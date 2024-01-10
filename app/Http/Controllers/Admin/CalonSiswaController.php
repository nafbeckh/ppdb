<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AsalSekolah;
use App\Models\OrangTua;
use App\Models\Setting;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CalonSiswaController extends Controller
{
    public function index(Request $request)
    {
        $ppdb = Setting::first();

        if ($request->ajax()) {
            return DataTables::of(Siswa::query())->toJson();
        }
        
        return view('admin.siswa.index', compact('ppdb'))->with('title', 'Calon Siswa');
    }

    public function terverifikasi(Request $request)
    {
        $ppdb = Setting::first();

        if ($request->ajax()) {
            return DataTables::of(Siswa::where('status', 'Terdaftar')->get())->toJson();
        }
        
        return view('admin.siswa.terverifikasi', compact('ppdb'))->with('title', 'Siswa Terverifikasi');
    }

    public function diterima(Request $request)
    {
        $ppdb = Setting::first();

        if ($request->ajax()) {
            return DataTables::of(Siswa::where('status', 'Diterima')->get())->toJson();
        }
        
        return view('admin.siswa.diterima', compact('ppdb'))->with('title', 'Siswa Diterima');
    }

    public function terima($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->status = 'Diterima';
        $siswa->save();

        if ($siswa) {
            return response()->json(['status' => true, 'message' => 'Berhasil menerima siswa']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal menerima siswa']);
        }
    }

    public function ditolak(Request $request)
    {
        $ppdb = Setting::first();

        if ($request->ajax()) {
            return DataTables::of(Siswa::where('status', 'Ditolak')->get())->toJson();
        }
        
        return view('admin.siswa.ditolak', compact('ppdb'))->with('title', 'Siswa Ditolak');
    }

    public function tolak($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->status = 'Ditolak';
        $siswa->save();

        if ($siswa) {
            return response()->json(['status' => true, 'message' => 'Berhasil menolak siswa']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal menolak siswa']);
        }
    }

    public function destroy($id)
    {
        AsalSekolah::where('siswa_id', $id)->delete();
        OrangTua::where('siswa_id', $id)->delete();
        $siswa = Siswa::findOrFail($id)->delete();

        if ($siswa) {
            return response()->json(['status' => true, 'message' => 'Berhasil menghapus data siswa']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal menghapus data siswa']);
        }
    }

    public function destroyBatch(Request $request)
    {
        if ($request->id) {
            foreach ($request->id as $id) {
                $siswa = Siswa::findOrFail($id);
                AsalSekolah::where('siswa_id', $id)->delete();
                OrangTua::where('siswa_id', $id)->delete();
                $siswa->delete();
            }

            return response()->json(['status' => true, 'message' => 'Berhasil menghapus data siswa']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal menghapus data siswa']);
        }
    }
}
