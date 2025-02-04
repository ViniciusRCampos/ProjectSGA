<?php

namespace Database\Seeders;

use App\Models\Sale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sale::create([
            "client_id" => 1,
            "store_id" => 1,
            "seller_id" => 1,
            "payment_id" => 1,
            "total_itens" => 4,
            "total_price" => 87.00,
            "observation" => null
        ]);

        $sale = Sale::find(1);
        $sale->products()->attach([
            1 => ['quantity' => 2],
            5 => ['quantity'=> 2],
        ]);
    }
}
