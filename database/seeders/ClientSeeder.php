<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            "name" => "Jhon Dee",
            "email" => "jhon@dee.com",
            "CPF" => "04534426097",
            "gender_id" => "1",
        ]);

        Client::create([
            "name" => "Joanna Dee",
            "email" => "joanna@dee.com",
            "CPF" => "99374887029",
            "gender_id" => "2",
        ]);
    }
}
