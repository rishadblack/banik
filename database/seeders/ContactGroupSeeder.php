<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact\ContactGroup;

class ContactGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ContactGroupList = [
            ['id' => 1,'name' => 'Admin','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 2,'name' => 'Manager','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 3,'name' => 'Assistant','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 4,'name' => 'Seller','created_at' => now(), 'status' => 1, 'updated_at' => now()],
        ];

        ContactGroup::insertOrIgnore($ContactGroupList);
    }
}
