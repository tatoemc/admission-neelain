<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            'استيراد ملف',
            'طباعة',
            'print',
    
            'عرض مستخدم',
            'اضافة مستخدم',
            'تعديل مستخدم',
            'حذف مستخدم',
    
            'عرض صلاحية',
            'اضافة صلاحية',
            'تعديل صلاحية',
            'حذف صلاحية',
    
            'عرض طالب',
            'اضافة طالب',
            'تعديل طالب',
            'حذف طالب',
    
            'عرض كلية',
            'اضافة كلية',
            'تعديل كلية',
            'حذف كلية',

            'عرض قسم',
            'اضافة قسم',
            'تعديل قسم',
            'حذف قسم',
    
    ];
    
    
    
    foreach ($permissions as $permission) {
    
    Permission::create(['name' => $permission]);
    }
    }





}
