<?php

namespace Database\Seeders;

use App\Models\PackageMdl;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PackageMdl::create([
            'name_en'=>'Star',
            'name_ar'=>'النجمة',
            'price'=>'0',
            'status'=>'1',
        ]);
        PackageMdl::create([
            'name_en'=>'Business',
            'name_ar'=>'الأعمال',
            'price'=>'1500',
            'status'=>'1',
        ]);
        PackageMdl::create([
            'name_en'=>'3-Starts',
            'name_ar'=>'3نجوم',
            'price'=>'2000',
            'status'=>'1',
        ]);
        PackageMdl::create([
            'name_en'=>'5-Starts',
            'name_ar'=>'5نجوم',
            'price'=>'2500',
            'status'=>'0',
        ]);
    }
}