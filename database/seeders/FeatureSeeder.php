<?php

namespace Database\Seeders;

use App\Models\FeatureMdl;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FeatureMdl::create([
            'name_en'=>'1- Company Page',
            'name_ar'=>'1- صفحة الشركة',
            'status'=>1,
        ]);
        FeatureMdl::create([
            'name_en'=>'2- Receive Booking',
            'name_ar'=>'2- استقبال حجوزات',
            'status'=>1,
        ]);
        FeatureMdl::create([
            'name_en'=>'3- Automatic Schedule',
            'name_ar'=>'3- جدول العمل اليومي',
            'status'=>1,
        ]);
        FeatureMdl::create([
            'name_en'=>'4- Making Invoices',
            'name_ar'=>'4- اعداد فواتير',
            'status'=>1,
        ]);
        FeatureMdl::create([
            'name_en'=>'5- Social Media Posts',
            'name_ar'=>'5- حملات اعلانية ممولة',
            'status'=>1,
        ]);
        FeatureMdl::create([
            'name_en'=>'6- Jobs',
            'name_ar'=>'6- وظائف',
            'status'=>1,
        ]);
        FeatureMdl::create([
            'name_en'=>'7- Looking For Work',
            'name_ar'=>'7- الباحثين عن عمل',
            'status'=>1,
        ]);
    }
}