<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            ['name_ar' => 'فحم', 'name_en'=>'Coal', 'description_ar'=>'وصف الفحم', 'description_en'=>'Coal description', 'show_on_home_page'=>1, 'currency_id' => 1, 'category_id' => 1, 'country_id' => 1, 'price' => 37, 'image' => 'path/to/image1.jpg'], ['name_ar' => 'لبان حوجري متوسط', 'name_en'=>'Medium Hojari Frankincense', 'description_ar'=>'وصف لبان حوجري متوسط', 'description_en'=>'Medium Hojari Frankincense description', 'show_on_home_page'=>1, 'currency_id' => 1, 'category_id' => 2, 'country_id' => 1, 'price' => 520, 'image' => 'path/to/image2.jpg'], ['name_ar' => 'لبان حوجري عالي', 'name_en'=>'High Hojari Frankincense', 'description_ar'=>'وصف لبان حوجري عالي', 'description_en'=>'High Hojari Frankincense description', 'show_on_home_page'=>1, 'currency_id' => 1, 'category_id' => 2, 'country_id' => 1, 'price' => 630, 'image' => 'path/to/image3.jpg'], ['name_ar' => 'لبان حوجري سوبر', 'name_en'=>'Super Hojari Frankincense', 'description_ar'=>'وصف لبان حوجري سوبر', 'description_en'=>'Super Hojari Frankincense description', 'show_on_home_page'=>1, 'currency_id' => 1, 'category_id' => 2, 'country_id' => 1, 'price' => 240, 'image' => 'path/to/image4.jpg'], ['name_ar' => 'زعفران', 'name_en'=>'Saffron', 'description_ar'=>'وصف الزعفران', 'description_en'=>'Saffron description', 'show_on_home_page'=>1, 'currency_id' => 1, 'category_id' => 3, 'country_id' => 1, 'price' => 315, 'image' => 'path/to/image5.jpg'], ['name_ar' => 'بخور سويت عنبر', 'name_en'=>'Sweet Amber Incense', 'description_ar'=>'وصف بخور سويت عنبر', 'description_en'=>'Sweet Amber Incense description', 'show_on_home_page'=>1, 'currency_id' => 1, 'category_id' => 4, 'country_id' => 1, 'price' => 250, 'image' => 'path/to/image6.jpg'], ['name_ar' => 'بخور بريمافيرا', 'name_en'=>'Primavera Incense', 'description_ar'=>'وصف بخور بريمافيرا', 'description_en'=>'Primavera Incense description', 'show_on_home_page'=>1, 'currency_id' => 1, 'category_id' => 4, 'country_id' => 1, 'price' => 250, 'image' => 'path/to/image7.jpg']
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}