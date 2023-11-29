<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pembayaran extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'siswa_id', 'status'
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Pembayaran::class);
    }
}
