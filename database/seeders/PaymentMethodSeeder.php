<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting\PaymentMethod;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $PaymentMethodList = [
            ['id' => 1,'name' => 'Bkash','code' => '001','branch'=>'Dhaka','opening_balance'=>'500','account_no'=>'543265626','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 2,'name' => 'Rocket','code' => '002','branch'=>'Dhaka','opening_balance'=>'500','account_no'=>'543265626','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 3,'name' => 'Nagad','code' => '003','branch'=>'Dhaka','opening_balance'=>'500','account_no'=>'543265626','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 4,'name' => 'Upay','code' => '004','branch'=>'Dhaka','opening_balance'=>'500','account_no'=>'543265626','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 5,'name' => 'Bank','code' => '005','branch'=>'Dhaka','opening_balance'=>'500','account_no'=>'543265626','created_at' => now(), 'status' => 1, 'updated_at' => now()],
        ];

        PaymentMethod::insertOrIgnore($PaymentMethodList);
    }
}
