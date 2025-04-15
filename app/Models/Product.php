<?php

namespace App\Models;
use App\Traits\HasImage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   use SoftDeletes, HasImage;
    protected $fillable = [
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'price',
        'is_available',
        'show_on_home_page',
        'category_id',
        'parent_id',
        'currency_id',
        'country_id',
    ];
    public function parent()
    {
        return $this->belongsTo(Product::class, 'parent_id');
    }
    
    // Child products
    public function children()
    {
        return $this->hasMany(Product::class, 'parent_id');
    }
    // Relationships (optional)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    
    public function addImages(array $files, string $collection = 'default')
    {
        foreach ($files as $file) {
            $this->addImage($file, $collection);
        }
    }
}
