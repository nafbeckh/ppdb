<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nisn', 'nama', 'tempat_lahir', 'tgl_lahir', 'jenis_kelamin', 'alamat', 'no_telp',
        'pasfoto', 'user_id', 'status'
    ];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function orang_tua(): HasOne
    {
        return $this->HasOne(OrangTua::class, "siswa_id", "id");
    }

    public function asal_sekolah(): HasOne
    {
        return $this->HasOne(AsalSekolah::class, "siswa_id", "id");
    }

    public function pembayarans(): HasMany
    {
        return $this->HasMany(Pembayaran::class, "siswa_id", "id");
    }
}
