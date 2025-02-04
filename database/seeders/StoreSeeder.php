<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store::create([
            "name"=>"Store Test",
            "CNPJ" => "91648587000103",
            "CEP" => "31130760",
            "address" => "Rua Japurá, 300, Galpão",
            "district" => "Renascença",
            "city" => "Belo Horizonte",
            "state" => "Minas Gerais"
        ]);

        Store::create([
            "name"=>"Cloth Example",
            "CNPJ" => "38890186000174",
            "CEP" => "31998440",
            "address" => "Rua Bambolês, 150, 20º Andar",
            "district" => "Capitão Eduardo",
            "city" => "Belo Horizonte",
            "state" => "Minas Gerais"
        ]);
    }
}
