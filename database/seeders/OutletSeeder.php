<?php

namespace Database\Seeders;

use App\Models\Setting\Outlet;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $OutletList = [
            ['id' => 1, 'code' => 001, 'name' => 'Bongomata','address' => 'Puran paltan, Dhaka','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 2, 'code' => 002, 'name' => 'Nure Alam','address' => 'Uttara, Dhaka','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 3, 'code' => 003, 'name' => 'Al Aksa','address' => 'Narayangonj','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 4, 'code' => 004, 'name' => 'Banganur','address' => 'Ashuliya','created_at' => now(), 'status' => 1, 'updated_at' => now()],
        ];

        Outlet::insertOrIgnore($OutletList);
    }
}
