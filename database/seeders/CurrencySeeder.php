<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    public function run()
    {
        $currencies = [
            ['name_ar' => 'دولار أمريكي', 'name_en' => 'US Dollar', 'exchange_rate' => 1.00, 'is_deleted' => false],
            ['name_ar' => 'يورو', 'name_en' => 'Euro', 'exchange_rate' => 0.92, 'is_deleted' => false],
            ['name_ar' => 'جنيه إسترليني', 'name_en' => 'British Pound', 'exchange_rate' => 0.79, 'is_deleted' => false],
            ['name_ar' => 'ين ياباني', 'name_en' => 'Japanese Yen', 'exchange_rate' => 151.50, 'is_deleted' => false],
            ['name_ar' => 'ريال سعودي', 'name_en' => 'Saudi Riyal', 'exchange_rate' => 3.75, 'is_deleted' => false],
            ['name_ar' => 'درهم إماراتي', 'name_en' => 'UAE Dirham', 'exchange_rate' => 3.67, 'is_deleted' => false],
            ['name_ar' => 'دينار كويتي', 'name_en' => 'Kuwaiti Dinar', 'exchange_rate' => 0.31, 'is_deleted' => false],
            ['name_ar' => 'ريال قطري', 'name_en' => 'Qatari Riyal', 'exchange_rate' => 3.64, 'is_deleted' => false],
            ['name_ar' => 'دينار بحريني', 'name_en' => 'Bahraini Dinar', 'exchange_rate' => 0.38, 'is_deleted' => false],
            ['name_ar' => 'ريال عماني', 'name_en' => 'Omani Rial', 'exchange_rate' => 0.38, 'is_deleted' => false]
        ];

        foreach ($currencies as $currency) {
            Currency::create($currency);
        }
    }
}