<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CalonSiswaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Siswa::query())->toJson();
        }
        
        return view('admin.siswa.index')->with('title', 'Calon Siswa');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

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
                $siswa->delete();
            }

            return response()->json(['status' => true, 'message' => 'Berhasil menghapus data siswa']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal menghapus data siswa']);
        }
    }
}
