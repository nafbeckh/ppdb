<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AsalSekolah extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id', 'nama_sekolah', 'tahun_lulus', 'no_ijazah', 'nilai'
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }
}
