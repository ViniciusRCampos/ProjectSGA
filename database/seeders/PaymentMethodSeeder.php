<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::create([
            "name"=> "Pix",
        ]);
        PaymentMethod::create([
            "name"=> "Cartão Débito",
        ]);
        PaymentMethod::create([
            "name"=> "Cartão Crédito",
        ]);
        PaymentMethod::create([
            "name"=> "Dinheiro",
        ]);
    }
}
