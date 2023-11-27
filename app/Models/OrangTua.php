<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrangTua extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id', 'nama', 'pekerjaan', 'alamat', 'no_telp'
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }
}
