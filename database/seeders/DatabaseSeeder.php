<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SettingSeeder::class,
            UserTableSeeder::class,
            CountrySeeder::class,
            DivisionSeeder::class,
            DistrictSeeder::class,
            UpazilaSeeder::class,
            BrandSeeder::class,
            UnitSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            ContactGroupSeeder::class,
            PaymentMethodSeeder::class,
            OutletSeeder::class,
            WarehouseSeeder::class,
            ChartOfAccountSeeder::class,
            LedgerAccountSeeder::class,
        ]);
    }
}
