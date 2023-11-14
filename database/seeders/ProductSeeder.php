<?php

namespace Database\Seeders;

use App\Models\Product\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ProductList = [
            ['id' => 1, 'code' => 001, 'name' => 'Full Sleeve Shirt','net_purchase_price'=>'500','net_sale_price'=>'800','profit_margin'=>'300','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 2, 'code' => 002, 'name' => 'Black Pant','net_purchase_price'=>'500','net_sale_price'=>'800','profit_margin'=>'300','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 3, 'code' => 003, 'name' => 'Silk Saree','net_purchase_price'=>'500','net_sale_price'=>'800','profit_margin'=>'300','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 4, 'code' => 004, 'name' => 'Three Piece','net_purchase_price'=>'500','net_sale_price'=>'800','profit_margin'=>'300','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 5, 'code' => 005, 'name' => 'Four Piece','net_purchase_price'=>'500','net_sale_price'=>'800','profit_margin'=>'300','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 6, 'code' => 006, 'name' => 'Bag','net_purchase_price'=>'500','net_sale_price'=>'800','profit_margin'=>'300','created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 7, 'code' => 007, 'name' => 'Watch','net_purchase_price'=>'500','net_sale_price'=>'800','profit_margin'=>'300','created_at' => now(), 'status' => 1, 'updated_at' => now()],

        ];

        Product::insertOrIgnore($ProductList);
    }
}
