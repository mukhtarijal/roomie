<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'kos_id',
        'stars',
        'review',
    ];

    public function kos()
    {
        return $this->belongsTo(Kos::class);
    }
}
