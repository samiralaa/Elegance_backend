<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasImage;

class Brand extends Model
{
    use SoftDeletes, HasImage;

    protected $fillable = [
        'name_en',
        'name_ar',
        'description_en',
        'description_ar',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    
}
