<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gender::create([
            "name"=> "Masculino",
            "active" => true,
        ]);

        Gender::create([
            "name"=> "Feminino",
            "active" => true,
        ]);
    }
}
