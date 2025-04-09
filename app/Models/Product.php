<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'price',
        'is_available',
        'require_other_products',
        'show_on_home_page',
        'priority',
        'category_id',
        'currency_id',
        'product_class_id',
        'country_id',
    ];
}
