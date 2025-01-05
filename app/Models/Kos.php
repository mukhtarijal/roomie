<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kos extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'available_rooms',
        'gender_kos',
        'stars',
        'price',
        'status',
        'phone_number',
    ];

    public function spesifikasi()
    {
        return $this->hasOne(SpekKos::class);
    }

    public function rules()
    {
        return $this->hasMany(Rule::class);
    }

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function gambar()
    {
        return $this->hasOne(Gambar::class);
    }
}
