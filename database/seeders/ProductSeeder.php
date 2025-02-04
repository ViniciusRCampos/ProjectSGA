<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Product::create([
            "name" => "Camiseta Vermelha",
            "description" => "Camiseta simples de algodão",
            "color" => "Vermelha",
            "price" => 23.50
        ]);

        Product::create([
            "name" => "Camiseta Verde",
            "description" => "Camiseta simples de algodão",
            "color" => "Verde",
            "price" => 23.50
        ]);

        Product::create([
            "name" => "Camiseta Azul",
            "description" => "Camiseta simples de algodão",
            "color" => "Azul",
            "price" => 23.50
        ]);

        Product::create([
            "name" => "Regata",
            "description" => "Regata simples de algodão",
            "color" => "Vermelha",
            "price" => 20.00
        ]);

        Product::create([
            "name" => "Regata",
            "description" => "Regata simples de algodão",
            "color" => "Verde",
            "price" => 20.00
        ]);

        Product::create([
            "name" => "Regata",
            "description" => "Regata simples de algodão",
            "color" => "Azul",
            "price" => 20.00
        ]);
    }
}
