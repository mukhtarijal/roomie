<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',             // Menambahkan 'role' ke dalam fillable
        'phone_number',     // Menambahkan 'phone_number' ke dalam fillable
        'alamat',           // Menambahkan 'alamat' ke dalam fillable
        'jenis_kelamin',    // Menambahkan 'jenis_kelamin' ke dalam fillable
        'tanggal_lahir',    // Menambahkan 'tanggal_lahir' ke dalam fillable
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'tanggal_lahir' => 'date', // Menambahkan cast untuk 'tanggal_lahir' menjadi 'date'
        ];
    }
}
