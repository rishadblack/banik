<?php

namespace Database\Seeders;

use App\Models\Product\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $BrandList = [
            ['id' => 1, 'code' => 001, 'name' => 'Burberry','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 2, 'code' => 002, 'name' => 'Prada','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 3, 'code' => 003, 'name' => 'Levis','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 4, 'code' => 004, 'name' => 'CHRISTIAN DIOR','created_at' => now(), 'status' => 1, 'updated_at' => now()],
        ];

        Brand::insertOrIgnore($BrandList);
    }
}
