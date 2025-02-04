<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            GenderSeeder::class,
            ClientSeeder::class,
            StoreSeeder::class,
            SellerSeeder::class,
            ProductSeeder::class,
            PaymentMethodSeeder::class,
            SaleSeeder::class,
        ]);
    }
}
