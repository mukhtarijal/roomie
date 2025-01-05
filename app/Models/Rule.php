<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    protected $fillable = [
        'kos_id',
        'rule',
    ];

    public function kos()
    {
        return $this->belongsTo(Kos::class);
    }
}
