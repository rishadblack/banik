<?php

namespace Database\Seeders;

use App\Models\Product\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $UnitList = [
            ['id' => 1, 'code' => 001, 'name' => 'Fabrics','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 2, 'code' => 002, 'name' => 'Colors','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 3, 'code' => 003, 'name' => 'Floor','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 4, 'code' => 004, 'name' => 'Piece','created_at' => now(), 'status' => 1, 'updated_at' => now()],
        ];

        Unit::insertOrIgnore($UnitList);
    }
}
