<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run()
    {
        $countries = [
            ['name_ar' => 'أفغانستان', 'name_en' => 'Afghanistan', 'is_deleted' => false],
            ['name_ar' => 'ألبانيا', 'name_en' => 'Albania', 'is_deleted' => false],
            ['name_ar' => 'الجزائر', 'name_en' => 'Algeria', 'is_deleted' => false],
            ['name_ar' => 'أندورا', 'name_en' => 'Andorra', 'is_deleted' => false],
            ['name_ar' => 'أنغولا', 'name_en' => 'Angola', 'is_deleted' => false],
            ['name_ar' => 'البحرين', 'name_en' => 'Bahrain', 'is_deleted' => false],
            ['name_ar' => 'بنغلاديش', 'name_en' => 'Bangladesh', 'is_deleted' => false],
            ['name_ar' => 'بلجيكا', 'name_en' => 'Belgium', 'is_deleted' => false],
            ['name_ar' => 'البرازيل', 'name_en' => 'Brazil', 'is_deleted' => false],
            ['name_ar' => 'كندا', 'name_en' => 'Canada', 'is_deleted' => false],
            ['name_ar' => 'الصين', 'name_en' => 'China', 'is_deleted' => false],
            ['name_ar' => 'مصر', 'name_en' => 'Egypt', 'is_deleted' => false],
            ['name_ar' => 'فرنسا', 'name_en' => 'France', 'is_deleted' => false],
            ['name_ar' => 'ألمانيا', 'name_en' => 'Germany', 'is_deleted' => false],
            ['name_ar' => 'اليونان', 'name_en' => 'Greece', 'is_deleted' => false],
            ['name_ar' => 'الهند', 'name_en' => 'India', 'is_deleted' => false],
            ['name_ar' => 'إندونيسيا', 'name_en' => 'Indonesia', 'is_deleted' => false],
            ['name_ar' => 'إيران', 'name_en' => 'Iran', 'is_deleted' => false],
            ['name_ar' => 'العراق', 'name_en' => 'Iraq', 'is_deleted' => false],
            ['name_ar' => 'إيرلندا', 'name_en' => 'Ireland', 'is_deleted' => false],
            ['name_ar' => 'إيطاليا', 'name_en' => 'Italy', 'is_deleted' => false],
            ['name_ar' => 'اليابان', 'name_en' => 'Japan', 'is_deleted' => false],
            ['name_ar' => 'الأردن', 'name_en' => 'Jordan', 'is_deleted' => false],
            ['name_ar' => 'كازاخستان', 'name_en' => 'Kazakhstan', 'is_deleted' => false],
            ['name_ar' => 'كينيا', 'name_en' => 'Kenya', 'is_deleted' => false],
            ['name_ar' => 'الكويت', 'name_en' => 'Kuwait', 'is_deleted' => false],
            ['name_ar' => 'لبنان', 'name_en' => 'Lebanon', 'is_deleted' => false],
            ['name_ar' => 'ليبيا', 'name_en' => 'Libya', 'is_deleted' => false],
            ['name_ar' => 'ماليزيا', 'name_en' => 'Malaysia', 'is_deleted' => false],
            ['name_ar' => 'المكسيك', 'name_en' => 'Mexico', 'is_deleted' => false],
            ['name_ar' => 'المغرب', 'name_en' => 'Morocco', 'is_deleted' => false],
            ['name_ar' => 'نيبال', 'name_en' => 'Nepal', 'is_deleted' => false],
            ['name_ar' => 'هولندا', 'name_en' => 'Netherlands', 'is_deleted' => false],
            ['name_ar' => 'نيوزيلندا', 'name_en' => 'New Zealand', 'is_deleted' => false],
            ['name_ar' => 'نيجيريا', 'name_en' => 'Nigeria', 'is_deleted' => false],
            ['name_ar' => 'عمان', 'name_en' => 'Oman', 'is_deleted' => false],
            ['name_ar' => 'باكستان', 'name_en' => 'Pakistan', 'is_deleted' => false],
            ['name_ar' => 'فلسطين', 'name_en' => 'Palestine', 'is_deleted' => false],
            ['name_ar' => 'قطر', 'name_en' => 'Qatar', 'is_deleted' => false],
            ['name_ar' => 'روسيا', 'name_en' => 'Russia', 'is_deleted' => false],
            ['name_ar' => 'المملكة العربية السعودية', 'name_en' => 'Saudi Arabia', 'is_deleted' => false],
            ['name_ar' => 'سنغافورة', 'name_en' => 'Singapore', 'is_deleted' => false],
            ['name_ar' => 'جنوب أفريقيا', 'name_en' => 'South Africa', 'is_deleted' => false],
            ['name_ar' => 'كوريا الجنوبية', 'name_en' => 'South Korea', 'is_deleted' => false],
            ['name_ar' => 'إسبانيا', 'name_en' => 'Spain', 'is_deleted' => false],
            ['name_ar' => 'السودان', 'name_en' => 'Sudan', 'is_deleted' => false],
            ['name_ar' => 'السويد', 'name_en' => 'Sweden', 'is_deleted' => false],
            ['name_ar' => 'سويسرا', 'name_en' => 'Switzerland', 'is_deleted' => false],
            ['name_ar' => 'سوريا', 'name_en' => 'Syria', 'is_deleted' => false],
            ['name_ar' => 'تايوان', 'name_en' => 'Taiwan', 'is_deleted' => false],
            ['name_ar' => 'تنزانيا', 'name_en' => 'Tanzania', 'is_deleted' => false],
            ['name_ar' => 'تايلاند', 'name_en' => 'Thailand', 'is_deleted' => false],
            ['name_ar' => 'تونس', 'name_en' => 'Tunisia', 'is_deleted' => false],
            ['name_ar' => 'تركيا', 'name_en' => 'Turkey', 'is_deleted' => false],
            ['name_ar' => 'أوغندا', 'name_en' => 'Uganda', 'is_deleted' => false],
            ['name_ar' => 'أوكرانيا', 'name_en' => 'Ukraine', 'is_deleted' => false],
            ['name_ar' => 'الإمارات العربية المتحدة', 'name_en' => 'United Arab Emirates', 'is_deleted' => false],
            ['name_ar' => 'المملكة المتحدة', 'name_en' => 'United Kingdom', 'is_deleted' => false],
            ['name_ar' => 'الولايات المتحدة الأمريكية', 'name_en' => 'United States', 'is_deleted' => false],
            ['name_ar' => 'أوزبكستان', 'name_en' => 'Uzbekistan', 'is_deleted' => false],
            ['name_ar' => 'فيتنام', 'name_en' => 'Vietnam', 'is_deleted' => false],
            ['name_ar' => 'اليمن', 'name_en' => 'Yemen', 'is_deleted' => false],
            ['name_ar' => 'زيمبابوي', 'name_en' => 'Zimbabwe', 'is_deleted' => false],
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}