<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        $ppdb = Setting::first();
        return view('admin.setting.ppdb', compact(['ppdb']))->with('title', 'Setting PPDB');
    }

    public function update(SettingRequest $request)
    {
        $data = $request->validated();

        $ppdb = Setting::first();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = 'logo-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            File::delete(public_path($ppdb->logo));
            $file->move(public_path(), $fileName);

            $data['logo'] = $fileName;
        }

        if (!$ppdb->update($data)) {
            return back()>with(['error' => 'Setting gagal diubah!']);
        }

        return back()->with(['success' => 'Setting berhasil diubah']);
    }
}
