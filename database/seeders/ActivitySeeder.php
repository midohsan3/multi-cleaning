<?php

namespace Database\Seeders;

use App\Models\ActivityMdl;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ActivityMdl::create([
            'name_en'=>'Home/Office Cleaning',
            'name_ar'=>'تنظيف منازل / مكاتب',
            'status' =>'1',
        ]);
        ActivityMdl::create([
            'name_en'=>'Building Cleaning',
            'name_ar'=>'تنظيف مباني',
            'status' =>'1',
        ]);
        ActivityMdl::create([
            'name_en'=>'Maintenance',
            'name_ar'=>'أعمال صيانة',
            'status' =>'1',
        ]);
    }
}