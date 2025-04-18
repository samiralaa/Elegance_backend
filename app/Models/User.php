<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use HasFactory, Notifiable,HasApiTokens;


    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
        'country_id',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function adriss()
    {
        return $this->hasMany(Address::class);
    }

    public function favorites()
{
    return $this->hasMany(Favorite::class);
}

}
