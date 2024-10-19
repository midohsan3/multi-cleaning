<?php

namespace Database\Seeders;

use App\Models\ServiceMdl;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceMdl::create([
            'name_en'=>'Deep Cleaning',
            'name_ar'=>'تنظيف عميق',
            'status'=>1,
        ]);
        ServiceMdl::create([
            'name_en'=>'Window Cleaning',
            'name_ar'=>'تنظيف نوافذ',
            'status'=>1,
        ]);
        ServiceMdl::create([
            'name_en'=>'Carpet Cleaning',
            'name_ar'=>'تنظيف السجاد',
            'status'=>1,
        ]);
        ServiceMdl::create([
            'name_en'=>'Apartment Cleaning',
            'name_ar'=>'تنظيف منازل',
            'status'=>1,
        ]);
        ServiceMdl::create([
            'name_en'=>'Villa Cleaning',
            'name_ar'=>'تنظيف فلل',
            'status'=>1,
        ]);
        ServiceMdl::create([
            'name_en'=>'Office Cleaning',
            'name_ar'=>'تنظيف مكاتب',
            'status'=>1,
        ]);
        ServiceMdl::create([
            'name_en'=>'Kitchen Cleaning',
            'name_ar'=>'تنظيف مطابخ',
            'status'=>1,
        ]);
        ServiceMdl::create([
            'name_en'=>'Laundry',
            'name_ar'=>'عناية الملابس',
            'status'=>1,
        ]);
        ServiceMdl::create([
            'name_en'=>'Electrical Maintenance',
            'name_ar'=>'صيانة كهرباء',
            'status'=>1,
        ]);
        ServiceMdl::create([
            'name_en'=>'A/C Maintenance',
            'name_ar'=>'صيانة تكييف',
            'status'=>1,
        ]);
        ServiceMdl::create([
            'name_en'=>'Plumbing Maintenance',
            'name_ar'=>'صيانة السباكة',
            'status'=>1,
        ]);
        ServiceMdl::create([
            'name_en'=>'Maintenance of walls, ceilings and floors',
            'name_ar'=>'صيانة الجدران والأسقف والأرضيات',
            'status'=>1,
        ]);
        ServiceMdl::create([
            'name_en'=>'',
            'name_ar'=>'',
            'status'=>1,
        ]);
        ServiceMdl::create([
            'name_en'=>'Pest Control',
            'name_ar'=>'مكافحة الحشرات',
            'status'=>1,
        ]);
        ServiceMdl::create([
            'name_en'=>'Water Tank Cleaning',
            'name_ar'=>'تنظيف خزانات المياه',
            'status'=>1,
        ]);
        ServiceMdl::create([
            'name_en'=>'Sofa Cleaning',
            'name_ar'=>'تنظيف الكنب',
            'status'=>1,
        ]);
        ServiceMdl::create([
            'name_en'=>'Pigeon Control',
            'name_ar'=>'مكافحة الحمام',
            'status'=>1,
        ]);
        ServiceMdl::create([
            'name_en'=>'Glass Cleaning',
            'name_ar'=>'تنظيف الزجاج',
            'status'=>1,
        ]);
        ServiceMdl::create([
            'name_en'=>'Facade Cleaning',
            'name_ar'=>'تنظيف الوجهات',
            'status'=>1,
        ]);
        ServiceMdl::create([
            'name_en'=>'Industrial Cleaning',
            'name_ar'=>'تنظيف مستودعات',
            'status'=>1,
        ]);
        ServiceMdl::create([
            'name_en'=>'Solar Panels',
            'name_ar'=>'الألواح الشمسية',
            'status'=>1,
        ]);
    }
}