<?php

namespace Database\Seeders;

use App\Models\CountryMdl;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CountryMdl::create([
        'name_en'=>'UAE',
        'name_ar'=>'الامارات العربية المتحدة',
        'country_code'=>'AE',
        'phone_code'=>'971',
        'currency_code'=>'AED',
        'flag'=>'uae.jpg',
        'status'=>'1',
        ]);
        CountryMdl::create([
        'name_en'=>'KSA',
        'name_ar'=>'المملكة العربية السعودية',
        'country_code'=>'SA',
        'phone_code'=>'966',
        'currency_code'=>'RS',
        'flag'=>'ksa.jpg',
        'status'=>'1',
        ]);
        CountryMdl::create([
        'name_en'=>'KUWAIT',
        'name_ar'=>'الكويت',
        'country_code'=>'KW',
        'phone_code'=>'965',
        'currency_code'=>'KWD',
        'flag'=>'kuwait.jpg',
        'status'=>'1',
        ]);
    }
}