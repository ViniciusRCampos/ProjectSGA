<?php

namespace Database\Seeders;

use App\Models\Seller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seller::create([
            "name"=> "Seller Jhon",
            "CPF" => "02731776056",
            "store_id" => 1,
        ]);

        Seller::create([
            "name"=> "Seller Joanna",
            "CPF" => "61077726007",
            "store_id" => 1,
            ]);
    }
}
