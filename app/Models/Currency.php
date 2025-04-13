<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasImage;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
        'exchange_rate',
        'is_deleted'
    ];

    protected $casts = [
        'exchange_rate' => 'decimal:2',
        'is_deleted' => 'boolean'
    ];

    protected $hidden = ['created_at', 'updated_at'];
}