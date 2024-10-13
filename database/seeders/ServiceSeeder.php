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
    }
}