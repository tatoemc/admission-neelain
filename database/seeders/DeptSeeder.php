<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dept;

class DeptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $depts = [
           
            ['name' => 'تقانة معلومات','college_id'=>'1'],
            ['name' => 'علوم حاسوب','college_id'=>'1'],
            ['name' => 'هندسة برمجيات','college_id'=>'1'],
            ['name' => 'مكتبات','college_id'=>'1'],
            ['name' => 'نظم معلومات محاسبية','college_id'=>'1'],
            ['name' => 'نظم معلومات ادارية','college_id'=>'1'],
            ['name' => 'نظم معلومات','college_id'=>'1'],
            ['name' => 'دبلوم','college_id'=>'1'],
            ['name' => 'قانون','college_id'=>'3'],
          
            ];
    
            foreach ($depts as $key => $value) {
    
                Dept::create($value);
    
            }

    }






}
