<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run()
    {
        $cities = [
            // Middle East Cities
            // Saudi Arabia
            ['name_ar' => 'الرياض', 'name_en' => 'Riyadh', 'country_id' => 41, 'is_deleted' => false],
            ['name_ar' => 'جدة', 'name_en' => 'Jeddah', 'country_id' => 41, 'is_deleted' => false],
            ['name_ar' => 'مكة المكرمة', 'name_en' => 'Mecca', 'country_id' => 41, 'is_deleted' => false],
            ['name_ar' => 'المدينة المنورة', 'name_en' => 'Medina', 'country_id' => 41, 'is_deleted' => false],
            ['name_ar' => 'الدمام', 'name_en' => 'Dammam', 'country_id' => 41, 'is_deleted' => false],
            ['name_ar' => 'الطائف', 'name_en' => 'Taif', 'country_id' => 41, 'is_deleted' => false],
            ['name_ar' => 'تبوك', 'name_en' => 'Tabuk', 'country_id' => 41, 'is_deleted' => false],
            ['name_ar' => 'القصيم', 'name_en' => 'Qassim', 'country_id' => 41, 'is_deleted' => false],
            
            // UAE
            ['name_ar' => 'دبي', 'name_en' => 'Dubai', 'country_id' => 57, 'is_deleted' => false],
            ['name_ar' => 'أبو ظبي', 'name_en' => 'Abu Dhabi', 'country_id' => 57, 'is_deleted' => false],
            ['name_ar' => 'الشارقة', 'name_en' => 'Sharjah', 'country_id' => 57, 'is_deleted' => false],
            ['name_ar' => 'العين', 'name_en' => 'Al Ain', 'country_id' => 57, 'is_deleted' => false],
            ['name_ar' => 'رأس الخيمة', 'name_en' => 'Ras Al Khaimah', 'country_id' => 57, 'is_deleted' => false],
            ['name_ar' => 'عجمان', 'name_en' => 'Ajman', 'country_id' => 57, 'is_deleted' => false],
            ['name_ar' => 'أم القيوين', 'name_en' => 'Umm Al Quwain', 'country_id' => 57, 'is_deleted' => false],
            ['name_ar' => 'الفجيرة', 'name_en' => 'Fujairah', 'country_id' => 57, 'is_deleted' => false],
            
            // Kuwait
            ['name_ar' => 'مدينة الكويت', 'name_en' => 'Kuwait City', 'country_id' => 26, 'is_deleted' => false],
            ['name_ar' => 'الجهراء', 'name_en' => 'Al Jahra', 'country_id' => 26, 'is_deleted' => false],
            ['name_ar' => 'حولي', 'name_en' => 'Hawalli', 'country_id' => 26, 'is_deleted' => false],
            ['name_ar' => 'الفروانية', 'name_en' => 'Al Farwaniyah', 'country_id' => 26, 'is_deleted' => false],
            ['name_ar' => 'الأحمدي', 'name_en' => 'Al Ahmadi', 'country_id' => 26, 'is_deleted' => false],
            
            // Qatar
            ['name_ar' => 'الدوحة', 'name_en' => 'Doha', 'country_id' => 39, 'is_deleted' => false],
            ['name_ar' => 'الوكرة', 'name_en' => 'Al Wakrah', 'country_id' => 39, 'is_deleted' => false],
            ['name_ar' => 'الخور', 'name_en' => 'Al Khor', 'country_id' => 39, 'is_deleted' => false],
            ['name_ar' => 'الريان', 'name_en' => 'Al Rayyan', 'country_id' => 39, 'is_deleted' => false],
            ['name_ar' => 'أم صلال', 'name_en' => 'Umm Salal', 'country_id' => 39, 'is_deleted' => false],
            
            // Bahrain
            ['name_ar' => 'المنامة', 'name_en' => 'Manama', 'country_id' => 6, 'is_deleted' => false],
            ['name_ar' => 'المحرق', 'name_en' => 'Muharraq', 'country_id' => 6, 'is_deleted' => false],
            ['name_ar' => 'الرفاع', 'name_en' => 'Riffa', 'country_id' => 6, 'is_deleted' => false],
            ['name_ar' => 'مدينة عيسى', 'name_en' => 'Isa Town', 'country_id' => 6, 'is_deleted' => false],
            ['name_ar' => 'مدينة حمد', 'name_en' => 'Hamad Town', 'country_id' => 6, 'is_deleted' => false],
            
            // Oman
            ['name_ar' => 'مسقط', 'name_en' => 'Muscat', 'country_id' => 36, 'is_deleted' => false],
            ['name_ar' => 'صلالة', 'name_en' => 'Salalah', 'country_id' => 36, 'is_deleted' => false],
            ['name_ar' => 'صحار', 'name_en' => 'Sohar', 'country_id' => 36, 'is_deleted' => false],
            ['name_ar' => 'نزوى', 'name_en' => 'Nizwa', 'country_id' => 36, 'is_deleted' => false],
            
            // Jordan
            ['name_ar' => 'عمان', 'name_en' => 'Amman', 'country_id' => 23, 'is_deleted' => false],
            ['name_ar' => 'الزرقاء', 'name_en' => 'Zarqa', 'country_id' => 23, 'is_deleted' => false],
            ['name_ar' => 'إربد', 'name_en' => 'Irbid', 'country_id' => 23, 'is_deleted' => false],
            ['name_ar' => 'العقبة', 'name_en' => 'Aqaba', 'country_id' => 23, 'is_deleted' => false],
            
            // Lebanon
            ['name_ar' => 'بيروت', 'name_en' => 'Beirut', 'country_id' => 27, 'is_deleted' => false],
            ['name_ar' => 'طرابلس', 'name_en' => 'Tripoli', 'country_id' => 27, 'is_deleted' => false],
            ['name_ar' => 'صيدا', 'name_en' => 'Sidon', 'country_id' => 27, 'is_deleted' => false],
            ['name_ar' => 'جونية', 'name_en' => 'Jounieh', 'country_id' => 27, 'is_deleted' => false],
            
            // North Africa
            // Egypt
            ['name_ar' => 'القاهرة', 'name_en' => 'Cairo', 'country_id' => 12, 'is_deleted' => false],
            ['name_ar' => 'الإسكندرية', 'name_en' => 'Alexandria', 'country_id' => 12, 'is_deleted' => false],
            ['name_ar' => 'الجيزة', 'name_en' => 'Giza', 'country_id' => 12, 'is_deleted' => false],
            ['name_ar' => 'شرم الشيخ', 'name_en' => 'Sharm El Sheikh', 'country_id' => 12, 'is_deleted' => false],
            ['name_ar' => 'الأقصر', 'name_en' => 'Luxor', 'country_id' => 12, 'is_deleted' => false],
            ['name_ar' => 'أسوان', 'name_en' => 'Aswan', 'country_id' => 12, 'is_deleted' => false],
            ['name_ar' => 'المنصورة', 'name_en' => 'Mansoura', 'country_id' => 12, 'is_deleted' => false],
            ['name_ar' => 'طنطا', 'name_en' => 'Tanta', 'country_id' => 12, 'is_deleted' => false],
            
            // Morocco
            ['name_ar' => 'الرباط', 'name_en' => 'Rabat', 'country_id' => 31, 'is_deleted' => false],
            ['name_ar' => 'الدار البيضاء', 'name_en' => 'Casablanca', 'country_id' => 31, 'is_deleted' => false],
            ['name_ar' => 'مراكش', 'name_en' => 'Marrakech', 'country_id' => 31, 'is_deleted' => false],
            ['name_ar' => 'فاس', 'name_en' => 'Fes', 'country_id' => 31, 'is_deleted' => false],
            ['name_ar' => 'طنجة', 'name_en' => 'Tangier', 'country_id' => 31, 'is_deleted' => false],
            ['name_ar' => 'أغادير', 'name_en' => 'Agadir', 'country_id' => 31, 'is_deleted' => false],
            
            // Tunisia
            ['name_ar' => 'تونس', 'name_en' => 'Tunis', 'country_id' => 52, 'is_deleted' => false],
            ['name_ar' => 'صفاقس', 'name_en' => 'Sfax', 'country_id' => 52, 'is_deleted' => false],
            ['name_ar' => 'سوسة', 'name_en' => 'Sousse', 'country_id' => 52, 'is_deleted' => false],
            ['name_ar' => 'القيروان', 'name_en' => 'Kairouan', 'country_id' => 52, 'is_deleted' => false],
            
            // Algeria
            ['name_ar' => 'الجزائر', 'name_en' => 'Algiers', 'country_id' => 3, 'is_deleted' => false],
            ['name_ar' => 'وهران', 'name_en' => 'Oran', 'country_id' => 3, 'is_deleted' => false],
            ['name_ar' => 'قسنطينة', 'name_en' => 'Constantine', 'country_id' => 3, 'is_deleted' => false],
            ['name_ar' => 'عنابة', 'name_en' => 'Annaba', 'country_id' => 3, 'is_deleted' => false],
            
            // Libya
            ['name_ar' => 'طرابلس', 'name_en' => 'Tripoli', 'country_id' => 28, 'is_deleted' => false],
            ['name_ar' => 'بنغازي', 'name_en' => 'Benghazi', 'country_id' => 28, 'is_deleted' => false],
            ['name_ar' => 'مصراتة', 'name_en' => 'Misrata', 'country_id' => 28, 'is_deleted' => false],
            
            // Sudan
            ['name_ar' => 'الخرطوم', 'name_en' => 'Khartoum', 'country_id' => 46, 'is_deleted' => false],
            ['name_ar' => 'أم درمان', 'name_en' => 'Omdurman', 'country_id' => 46, 'is_deleted' => false],
            ['name_ar' => 'بورتسودان', 'name_en' => 'Port Sudan', 'country_id' => 46, 'is_deleted' => false],
            
            // Asia
            // China
            ['name_ar' => 'بكين', 'name_en' => 'Beijing', 'country_id' => 11, 'is_deleted' => false],
            ['name_ar' => 'شنغهاي', 'name_en' => 'Shanghai', 'country_id' => 11, 'is_deleted' => false],
            ['name_ar' => 'قوانزو', 'name_en' => 'Guangzhou', 'country_id' => 11, 'is_deleted' => false],
            ['name_ar' => 'شنتشن', 'name_en' => 'Shenzhen', 'country_id' => 11, 'is_deleted' => false],
            ['name_ar' => 'تشنغدو', 'name_en' => 'Chengdu', 'country_id' => 11, 'is_deleted' => false],
            ['name_ar' => 'ووهان', 'name_en' => 'Wuhan', 'country_id' => 11, 'is_deleted' => false],
            ['name_ar' => 'تيانجين', 'name_en' => 'Tianjin', 'country_id' => 11, 'is_deleted' => false],
            
            // Japan
            ['name_ar' => 'طوكيو', 'name_en' => 'Tokyo', 'country_id' => 22, 'is_deleted' => false],
            ['name_ar' => 'أوساكا', 'name_en' => 'Osaka', 'country_id' => 22, 'is_deleted' => false],
            ['name_ar' => 'كيوتو', 'name_en' => 'Kyoto', 'country_id' => 22, 'is_deleted' => false],
            ['name_ar' => 'يوكوهاما', 'name_en' => 'Yokohama', 'country_id' => 22, 'is_deleted' => false],
            ['name_ar' => 'ناغويا', 'name_en' => 'Nagoya', 'country_id' => 22, 'is_deleted' => false],
            ['name_ar' => 'سابورو', 'name_en' => 'Sapporo', 'country_id' => 22, 'is_deleted' => false],
            ['name_ar' => 'فوكوكا', 'name_en' => 'Fukuoka', 'country_id' => 22, 'is_deleted' => false],
            
            // South Korea
            ['name_ar' => 'سيول', 'name_en' => 'Seoul', 'country_id' => 44, 'is_deleted' => false],
            ['name_ar' => 'بوسان', 'name_en' => 'Busan', 'country_id' => 44, 'is_deleted' => false],
            ['name_ar' => 'إنتشون', 'name_en' => 'Incheon', 'country_id' => 44, 'is_deleted' => false],
            ['name_ar' => 'دايجو', 'name_en' => 'Daegu', 'country_id' => 44, 'is_deleted' => false],
            
            // India
            ['name_ar' => 'نيودلهي', 'name_en' => 'New Delhi', 'country_id' => 16, 'is_deleted' => false],
            ['name_ar' => 'مومباي', 'name_en' => 'Mumbai', 'country_id' => 16, 'is_deleted' => false],
            ['name_ar' => 'بنغالور', 'name_en' => 'Bangalore', 'country_id' => 16, 'is_deleted' => false],
            ['name_ar' => 'حيدر أباد', 'name_en' => 'Hyderabad', 'country_id' => 16, 'is_deleted' => false],
            ['name_ar' => 'كولكاتا', 'name_en' => 'Kolkata', 'country_id' => 16, 'is_deleted' => false],
            ['name_ar' => 'تشيناي', 'name_en' => 'Chennai', 'country_id' => 16, 'is_deleted' => false],
            ['name_ar' => 'أحمد آباد', 'name_en' => 'Ahmedabad', 'country_id' => 16, 'is_deleted' => false],
            
            // Pakistan
            ['name_ar' => 'إسلام آباد', 'name_en' => 'Islamabad', 'country_id' => 37, 'is_deleted' => false],
            ['name_ar' => 'كراتشي', 'name_en' => 'Karachi', 'country_id' => 37, 'is_deleted' => false],
            ['name_ar' => 'لاهور', 'name_en' => 'Lahore', 'country_id' => 37, 'is_deleted' => false],
            ['name_ar' => 'فيصل آباد', 'name_en' => 'Faisalabad', 'country_id' => 37, 'is_deleted' => false],
            
            // Europe
            // United Kingdom
            ['name_ar' => 'لندن', 'name_en' => 'London', 'country_id' => 58, 'is_deleted' => false],
            ['name_ar' => 'مانشستر', 'name_en' => 'Manchester', 'country_id' => 58, 'is_deleted' => false],
            ['name_ar' => 'برمنغهام', 'name_en' => 'Birmingham', 'country_id' => 58, 'is_deleted' => false],
            ['name_ar' => 'ليفربول', 'name_en' => 'Liverpool', 'country_id' => 58, 'is_deleted' => false],
            ['name_ar' => 'غلاسكو', 'name_en' => 'Glasgow', 'country_id' => 58, 'is_deleted' => false],
            ['name_ar' => 'إدنبرة', 'name_en' => 'Edinburgh', 'country_id' => 58, 'is_deleted' => false],
            ['name_ar' => 'بريستول', 'name_en' => 'Bristol', 'country_id' => 58, 'is_deleted' => false],
            
            // France
            ['name_ar' => 'باريس', 'name_en' => 'Paris', 'country_id' => 13, 'is_deleted' => false],
            ['name_ar' => 'مرسيليا', 'name_en' => 'Marseille', 'country_id' => 13, 'is_deleted' => false],
            ['name_ar' => 'ليون', 'name_en' => 'Lyon', 'country_id' => 13, 'is_deleted' => false],
            ['name_ar' => 'تولوز', 'name_en' => 'Toulouse', 'country_id' => 13, 'is_deleted' => false],
            ['name_ar' => 'نيس', 'name_en' => 'Nice', 'country_id' => 13, 'is_deleted' => false],
            ['name_ar' => 'نانت', 'name_en' => 'Nantes', 'country_id' => 13, 'is_deleted' => false],
            ['name_ar' => 'ستراسبورغ', 'name_en' => 'Strasbourg', 'country_id' => 13, 'is_deleted' => false],
            
            // Germany
            ['name_ar' => 'برلين', 'name_en' => 'Berlin', 'country_id' => 14, 'is_deleted' => false],
            ['name_ar' => 'ميونخ', 'name_en' => 'Munich', 'country_id' => 14, 'is_deleted' => false],
            ['name_ar' => 'هامبورغ', 'name_en' => 'Hamburg', 'country_id' => 14, 'is_deleted' => false],
            ['name_ar' => 'فرانكفورت', 'name_en' => 'Frankfurt', 'country_id' => 14, 'is_deleted' => false],
            ['name_ar' => 'كولونيا', 'name_en' => 'Cologne', 'country_id' => 14, 'is_deleted' => false],
            ['name_ar' => 'شتوتغارت', 'name_en' => 'Stuttgart', 'country_id' => 14, 'is_deleted' => false],
            ['name_ar' => 'دوسلدورف', 'name_en' => 'Düsseldorf', 'country_id' => 14, 'is_deleted' => false],
            
            // Italy
            ['name_ar' => 'روما', 'name_en' => 'Rome', 'country_id' => 21, 'is_deleted' => false],
            ['name_ar' => 'ميلانو', 'name_en' => 'Milan', 'country_id' => 21, 'is_deleted' => false],
            ['name_ar' => 'نابولي', 'name_en' => 'Naples', 'country_id' => 21, 'is_deleted' => false],
            ['name_ar' => 'تورينو', 'name_en' => 'Turin', 'country_id' => 21, 'is_deleted' => false],
            
            // Spain
            ['name_ar' => 'مدريد', 'name_en' => 'Madrid', 'country_id' => 45, 'is_deleted' => false],
            ['name_ar' => 'برشلونة', 'name_en' => 'Barcelona', 'country_id' => 45, 'is_deleted' => false],
            ['name_ar' => 'فالنسيا', 'name_en' => 'Valencia', 'country_id' => 45, 'is_deleted' => false],
            ['name_ar' => 'إشبيلية', 'name_en' => 'Seville', 'country_id' => 45, 'is_deleted' => false],
            
            // Russia
            ['name_ar' => 'موسكو', 'name_en' => 'Moscow', 'country_id' => 40, 'is_deleted' => false],
            ['name_ar' => 'سانت بطرسبرغ', 'name_en' => 'Saint Petersburg', 'country_id' => 40, 'is_deleted' => false],
            ['name_ar' => 'نوفوسيبيرسك', 'name_en' => 'Novosibirsk', 'country_id' => 40, 'is_deleted' => false],
            ['name_ar' => 'يكاترينبورغ', 'name_en' => 'Yekaterinburg', 'country_id' => 40, 'is_deleted' => false],
            
            // Americas
            // United States
            ['name_ar' => 'نيويورك', 'name_en' => 'New York', 'country_id' => 59, 'is_deleted' => false],
            ['name_ar' => 'لوس أنجلوس', 'name_en' => 'Los Angeles', 'country_id' => 59, 'is_deleted' => false],
            ['name_ar' => 'شيكاغو', 'name_en' => 'Chicago', 'country_id' => 59, 'is_deleted' => false],
            ['name_ar' => 'هيوستن', 'name_en' => 'Houston', 'country_id' => 59, 'is_deleted' => false],
            ['name_ar' => 'ميامي', 'name_en' => 'Miami', 'country_id' => 59, 'is_deleted' => false],
            ['name_ar' => 'سان فرانسيسكو', 'name_en' => 'San Francisco', 'country_id' => 59, 'is_deleted' => false],
            ['name_ar' => 'بوسطن', 'name_en' => 'Boston', 'country_id' => 59, 'is_deleted' => false],
            ['name_ar' => 'سياتل', 'name_en' => 'Seattle', 'country_id' => 59, 'is_deleted' => false],
            ['name_ar' => 'لاس فيغاس', 'name_en' => 'Las Vegas', 'country_id' => 59, 'is_deleted' => false],
            
            // Canada
            ['name_ar' => 'تورونتو', 'name_en' => 'Toronto', 'country_id' => 10, 'is_deleted' => false],
            ['name_ar' => 'فانكوفر', 'name_en' => 'Vancouver', 'country_id' => 10, 'is_deleted' => false],
            ['name_ar' => 'مونتريال', 'name_en' => 'Montreal', 'country_id' => 10, 'is_deleted' => false],
            ['name_ar' => 'كالغاري', 'name_en' => 'Calgary', 'country_id' => 10, 'is_deleted' => false],
            ['name_ar' => 'أوتاوا', 'name_en' => 'Ottawa', 'country_id' => 10, 'is_deleted' => false],
            ['name_ar' => 'إدمنتون', 'name_en' => 'Edmonton', 'country_id' => 10, 'is_deleted' => false],
            
            // Brazil
            ['name_ar' => 'ساو باولو', 'name_en' => 'São Paulo', 'country_id' => 9, 'is_deleted' => false],
            ['name_ar' => 'ريو دي جانيرو', 'name_en' => 'Rio de Janeiro', 'country_id' => 9, 'is_deleted' => false],
            ['name_ar' => 'برازيليا', 'name_en' => 'Brasília', 'country_id' => 9, 'is_deleted' => false],
            ['name_ar' => 'سلفادور', 'name_en' => 'Salvador', 'country_id' => 9, 'is_deleted' => false],
            ['name_ar' => 'فورتاليزا', 'name_en' => 'Fortaleza', 'country_id' => 9, 'is_deleted' => false],
            ['name_ar' => 'بيلو هوريزونتي', 'name_en' => 'Belo Horizonte', 'country_id' => 9, 'is_deleted' => false],
            
            // Mexico
            ['name_ar' => 'مكسيكو سيتي', 'name_en' => 'Mexico City', 'country_id' => 30, 'is_deleted' => false],
            ['name_ar' => 'غوادالاخارا', 'name_en' => 'Guadalajara', 'country_id' => 30, 'is_deleted' => false],
            ['name_ar' => 'مونتيري', 'name_en' => 'Monterrey', 'country_id' => 30, 'is_deleted' => false],
            ['name_ar' => 'كانكون', 'name_en' => 'Cancún', 'country_id' => 30, 'is_deleted' => false],
            
            // Other Major Asian Cities
            // Singapore
            ['name_ar' => 'سنغافورة', 'name_en' => 'Singapore', 'country_id' => 42, 'is_deleted' => false],
            
            //
            // Middle East Cities
            // Saudi Arabia
            ['name_ar' => 'الرياض', 'name_en' => 'Riyadh', 'country_id' => 41, 'is_deleted' => false],
            ['name_ar' => 'جدة', 'name_en' => 'Jeddah', 'country_id' => 41, 'is_deleted' => false],
            ['name_ar' => 'مكة المكرمة', 'name_en' => 'Mecca', 'country_id' => 41, 'is_deleted' => false],
            ['name_ar' => 'المدينة المنورة', 'name_en' => 'Medina', 'country_id' => 41, 'is_deleted' => false],
            ['name_ar' => 'الدمام', 'name_en' => 'Dammam', 'country_id' => 41, 'is_deleted' => false],
            ['name_ar' => 'الطائف', 'name_en' => 'Taif', 'country_id' => 41, 'is_deleted' => false],
            
            // UAE
            ['name_ar' => 'دبي', 'name_en' => 'Dubai', 'country_id' => 57, 'is_deleted' => false],
            ['name_ar' => 'أبو ظبي', 'name_en' => 'Abu Dhabi', 'country_id' => 57, 'is_deleted' => false],
            ['name_ar' => 'الشارقة', 'name_en' => 'Sharjah', 'country_id' => 57, 'is_deleted' => false],
            ['name_ar' => 'العين', 'name_en' => 'Al Ain', 'country_id' => 57, 'is_deleted' => false],
            ['name_ar' => 'رأس الخيمة', 'name_en' => 'Ras Al Khaimah', 'country_id' => 57, 'is_deleted' => false],
            
            // Kuwait
            ['name_ar' => 'مدينة الكويت', 'name_en' => 'Kuwait City', 'country_id' => 26, 'is_deleted' => false],
            ['name_ar' => 'الجهراء', 'name_en' => 'Al Jahra', 'country_id' => 26, 'is_deleted' => false],
            ['name_ar' => 'حولي', 'name_en' => 'Hawalli', 'country_id' => 26, 'is_deleted' => false],
            
            // Qatar
            ['name_ar' => 'الدوحة', 'name_en' => 'Doha', 'country_id' => 39, 'is_deleted' => false],
            ['name_ar' => 'الوكرة', 'name_en' => 'Al Wakrah', 'country_id' => 39, 'is_deleted' => false],
            ['name_ar' => 'الخور', 'name_en' => 'Al Khor', 'country_id' => 39, 'is_deleted' => false],
            
            // Bahrain
            ['name_ar' => 'المنامة', 'name_en' => 'Manama', 'country_id' => 6, 'is_deleted' => false],
            ['name_ar' => 'المحرق', 'name_en' => 'Muharraq', 'country_id' => 6, 'is_deleted' => false],
            ['name_ar' => 'الرفاع', 'name_en' => 'Riffa', 'country_id' => 6, 'is_deleted' => false],
            
            // North Africa
            // Egypt
            ['name_ar' => 'القاهرة', 'name_en' => 'Cairo', 'country_id' => 12, 'is_deleted' => false],
            ['name_ar' => 'الإسكندرية', 'name_en' => 'Alexandria', 'country_id' => 12, 'is_deleted' => false],
            ['name_ar' => 'الجيزة', 'name_en' => 'Giza', 'country_id' => 12, 'is_deleted' => false],
            ['name_ar' => 'شرم الشيخ', 'name_en' => 'Sharm El Sheikh', 'country_id' => 12, 'is_deleted' => false],
            ['name_ar' => 'الأقصر', 'name_en' => 'Luxor', 'country_id' => 12, 'is_deleted' => false],
            
            // Morocco
            ['name_ar' => 'الرباط', 'name_en' => 'Rabat', 'country_id' => 31, 'is_deleted' => false],
            ['name_ar' => 'الدار البيضاء', 'name_en' => 'Casablanca', 'country_id' => 31, 'is_deleted' => false],
            ['name_ar' => 'مراكش', 'name_en' => 'Marrakech', 'country_id' => 31, 'is_deleted' => false],
            ['name_ar' => 'فاس', 'name_en' => 'Fes', 'country_id' => 31, 'is_deleted' => false],
            
            // Asia
            // China
            ['name_ar' => 'بكين', 'name_en' => 'Beijing', 'country_id' => 11, 'is_deleted' => false],
            ['name_ar' => 'شنغهاي', 'name_en' => 'Shanghai', 'country_id' => 11, 'is_deleted' => false],
            ['name_ar' => 'قوانزو', 'name_en' => 'Guangzhou', 'country_id' => 11, 'is_deleted' => false],
            ['name_ar' => 'شنتشن', 'name_en' => 'Shenzhen', 'country_id' => 11, 'is_deleted' => false],
            
            // Japan
            ['name_ar' => 'طوكيو', 'name_en' => 'Tokyo', 'country_id' => 22, 'is_deleted' => false],
            ['name_ar' => 'أوساكا', 'name_en' => 'Osaka', 'country_id' => 22, 'is_deleted' => false],
            ['name_ar' => 'كيوتو', 'name_en' => 'Kyoto', 'country_id' => 22, 'is_deleted' => false],
            ['name_ar' => 'يوكوهاما', 'name_en' => 'Yokohama', 'country_id' => 22, 'is_deleted' => false],
            
            // India
            ['name_ar' => 'نيودلهي', 'name_en' => 'New Delhi', 'country_id' => 16, 'is_deleted' => false],
            ['name_ar' => 'مومباي', 'name_en' => 'Mumbai', 'country_id' => 16, 'is_deleted' => false],
            ['name_ar' => 'بنغالور', 'name_en' => 'Bangalore', 'country_id' => 16, 'is_deleted' => false],
            ['name_ar' => 'حيدر أباد', 'name_en' => 'Hyderabad', 'country_id' => 16, 'is_deleted' => false],
            
            // Europe
            // United Kingdom
            ['name_ar' => 'لندن', 'name_en' => 'London', 'country_id' => 58, 'is_deleted' => false],
            ['name_ar' => 'مانشستر', 'name_en' => 'Manchester', 'country_id' => 58, 'is_deleted' => false],
            ['name_ar' => 'برمنغهام', 'name_en' => 'Birmingham', 'country_id' => 58, 'is_deleted' => false],
            ['name_ar' => 'ليفربول', 'name_en' => 'Liverpool', 'country_id' => 58, 'is_deleted' => false],
            
            // France
            ['name_ar' => 'باريس', 'name_en' => 'Paris', 'country_id' => 13, 'is_deleted' => false],
            ['name_ar' => 'مرسيليا', 'name_en' => 'Marseille', 'country_id' => 13, 'is_deleted' => false],
            ['name_ar' => 'ليون', 'name_en' => 'Lyon', 'country_id' => 13, 'is_deleted' => false],
            ['name_ar' => 'تولوز', 'name_en' => 'Toulouse', 'country_id' => 13, 'is_deleted' => false],
            
            // Germany
            ['name_ar' => 'برلين', 'name_en' => 'Berlin', 'country_id' => 14, 'is_deleted' => false],
            ['name_ar' => 'ميونخ', 'name_en' => 'Munich', 'country_id' => 14, 'is_deleted' => false],
            ['name_ar' => 'هامبورغ', 'name_en' => 'Hamburg', 'country_id' => 14, 'is_deleted' => false],
            ['name_ar' => 'فرانكفورت', 'name_en' => 'Frankfurt', 'country_id' => 14, 'is_deleted' => false],
            
            // Americas
            // United States
            ['name_ar' => 'نيويورك', 'name_en' => 'New York', 'country_id' => 59, 'is_deleted' => false],
            ['name_ar' => 'لوس أنجلوس', 'name_en' => 'Los Angeles', 'country_id' => 59, 'is_deleted' => false],
            ['name_ar' => 'شيكاغو', 'name_en' => 'Chicago', 'country_id' => 59, 'is_deleted' => false],
            ['name_ar' => 'هيوستن', 'name_en' => 'Houston', 'country_id' => 59, 'is_deleted' => false],
            ['name_ar' => 'ميامي', 'name_en' => 'Miami', 'country_id' => 59, 'is_deleted' => false],
            
            // Canada
            ['name_ar' => 'تورونتو', 'name_en' => 'Toronto', 'country_id' => 10, 'is_deleted' => false],
            ['name_ar' => 'فانكوفر', 'name_en' => 'Vancouver', 'country_id' => 10, 'is_deleted' => false],
            ['name_ar' => 'مونتريال', 'name_en' => 'Montreal', 'country_id' => 10, 'is_deleted' => false],
            ['name_ar' => 'كالغاري', 'name_en' => 'Calgary', 'country_id' => 10, 'is_deleted' => false],
            
            // Brazil
            ['name_ar' => 'ساو باولو', 'name_en' => 'São Paulo', 'country_id' => 9, 'is_deleted' => false],
            ['name_ar' => 'ريو دي جانيرو', 'name_en' => 'Rio de Janeiro', 'country_id' => 9, 'is_deleted' => false],
            ['name_ar' => 'برازيليا', 'name_en' => 'Brasília', 'country_id' => 9, 'is_deleted' => false],
            ['name_ar' => 'سلفادور', 'name_en' => 'Salvador', 'country_id' => 9, 'is_deleted' => false],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}