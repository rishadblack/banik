<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Accounting\LedgerAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LedgerAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $LedgerAccountList = [
            ['id' => 1, 'ledger_code' => 001, 'name' => 'Chart 1','chart_of_account_id' => '1','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 2, 'ledger_code' => 002, 'name' => 'Chart 2','chart_of_account_id' => '2','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 3, 'ledger_code' => 003, 'name' => 'Chart 3','chart_of_account_id' => '3','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 4, 'ledger_code' => 004, 'name' => 'Chart 4','chart_of_account_id' => '4','created_at' => now(), 'status' => 1, 'updated_at' => now()],
        ];

        LedgerAccount::insertOrIgnore($LedgerAccountList);
    }
}
