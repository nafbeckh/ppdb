<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $setting = new Setting();
        $setting->nama_sekolah = 'PPDB';
        $setting->tgl_buka = Carbon::now()->format('Y-m-d');
        $setting->tgl_tutup = $setting->tgl_buka;
        $setting->tgl_pengumuman = $setting->tgl_buka;
        $setting->logo = 'logo_ppdb.png';
        $setting->save();

        $user = new User();
        $user->name = 'Administrator';
        $user->username = 'admin';
        $user->password = Hash::make('admin');
        $user->role = 'admin';
        $user->save();
    }
}
