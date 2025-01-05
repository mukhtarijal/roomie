<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    use HasFactory;

    protected $fillable = [
        'kos_id',
        'foto_kost',
        'foto_kamar',
        'foto_kamar_mandi',
        'foto_fasilitas_bersama',
    ];

    public function kos()
    {
        return $this->belongsTo(Kos::class);
    }
}
