<?php

namespace Database\Seeders;

use App\Models\NationalityMdl;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NationalityMdl::create([
            'name_en'=>'Bangladesh',
            'name_ar'=>'بنجلاديش',
        ]);
        NationalityMdl::create([
            'name_en'=>'',
            'name_ar'=>'',
        ]);
        NationalityMdl::create([
            'name_en'=>'Malaysia',
            'name_ar'=>'مالزيا',
        ]);
        NationalityMdl::create([
            'name_en'=>'Mauritania',
            'name_ar'=>'مروتنيا',
        ]);
        NationalityMdl::create([
            'name_en'=>'Morocco',
            'name_ar'=>'المغرب',
        ]);
        NationalityMdl::create([
            'name_en'=>'Nepal',
            'name_ar'=>'نيبال',
        ]);
        NationalityMdl::create([
            'name_en'=>'Nigeria',
            'name_ar'=>'نيجريا',
        ]);
        NationalityMdl::create([
            'name_en'=>'Pakistan',
            'name_ar'=>'باكستان',
        ]);
        NationalityMdl::create([
        'name_en'=>'Philippines',
        'name_ar'=>'الفلبين',
        ]);
        NationalityMdl::create([
            'name_en'=>'Egypt',
            'name_ar'=>'مصر',
        ]);
        NationalityMdl::create([
            'name_en'=>'Sri Lanka',
            'name_ar'=>'سيرلانكا',
        ]);
        NationalityMdl::create([
            'name_en'=>'Estonia',
            'name_ar'=>'اثيوبيا',
        ]);
        NationalityMdl::create([
            'name_en'=>'Sudan',
            'name_ar'=>'السودان',
        ]);
        NationalityMdl::create([
            'name_en'=>'Ghana',
            'name_ar'=>'غانا',
        ]);
        NationalityMdl::create([
            'name_en'=>'India',
            'name_ar'=>'الهند',
        ]);
        NationalityMdl::create([
            'name_en'=>'Indonesia',
            'name_ar'=>'اندونيسيا',
        ]);
        NationalityMdl::create([
            'name_en'=>'Jordan',
            'name_ar'=>'الاردن',
        ]);

    }
}