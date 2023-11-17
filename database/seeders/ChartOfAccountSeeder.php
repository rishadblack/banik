<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Accounting\ChartOfAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChartOfAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ChartOfAccountList = [
            ['id' => 1, 'code' => 001, 'name' => 'Chart 1','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 2, 'code' => 002, 'name' => 'Chart 2','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 3, 'code' => 003, 'name' => 'Chart 3','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 4, 'code' => 004, 'name' => 'Chart 4','created_at' => now(), 'status' => 1, 'updated_at' => now()],
        ];

        ChartOfAccount::insertOrIgnore($ChartOfAccountList);
    }
}
