<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasImage;

class City extends Model
{
    use HasImage;

    protected $fillable = [
        'name_ar',
        'name_en',
        'is_deleted',
        'country_id'
    ];

    protected $casts = [
        'is_deleted' => 'boolean'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_deleted', false);
    }
}