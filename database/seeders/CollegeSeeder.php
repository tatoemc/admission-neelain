<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\College;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colleges = [
           
            ['name' => 'كلية علوم الحاسوب و تقانة المعلومات'],
            ['name' => 'كلية الاٌداب'],
            ['name' => 'كلية القانون'],
            ['name' => 'كلية الصيدلة'],
            ['name' => 'كلية الطب'],
            ['name' => 'كلية الهندسة'],
            ['name' => 'كلية التربية'],
            ['name' => 'كلية علوم البصريات'],
            ['name' => 'كلية علوم المختبرات'],
            ['name' => 'كلية التجارة'],
            ['name' => 'كلية العلوم و التقانة'],
            ['name' => 'كلية العلوم الرياضية و الاِحصاء'],
            ['name' => 'كلية التقانة و العلوم الزراعية'],
            ['name' => 'كلية الطب'],
            ['name' => 'كلية النفط و المعادن'],
            ['name' => 'كلية الدراسات العليا'],
            ['name' => 'كلية تنمية المجتمع'],
            ['name' => 'كلية الدراسات الاقتصادية و الأجتماعية'],
            ['name' => 'كلية طب الاسنان'],
            ['name' => 'كلية علوم التمريض'],
            ['name' => 'كلية العلاج الطبيعي'],
            ['name' => 'كلية الفنون الجميلة'],
            ['name' => 'كلية الدراسات الاسلامية'],
          
          
            ];
    
            foreach ($colleges as $key => $value) {
    
                College::create($value);
    
            }

    }

    





}
