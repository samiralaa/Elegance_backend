<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasImage;

class Country extends Model
{
    use HasImage;

    protected $fillable = [
        'name_ar',
        'name_en',
        'is_deleted',
        'image_path'
    ];

    public function cities()
    {
        return $this->hasMany(City::class)->where('is_deleted', false);
    }

    protected $casts = [
        'is_deleted' => 'boolean'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function adriss()
    {
        return $this->hasMany(Address::class);
    }
}
