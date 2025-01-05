<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpekKos extends Model
{
    use HasFactory;

    protected $fillable = [
        'kos_id',
        'room_size',
        'electricity',
        'ac',
        'bed',
        'wardrobe',
        'bathroom_inside',
        'wifi',
    ];

    public function kos()
    {
        return $this->belongsTo(Kos::class);
    }
}
