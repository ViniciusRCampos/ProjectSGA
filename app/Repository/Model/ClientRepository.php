<?php

namespace App\Repository\Model;

use App\Models\Client;

class ClientRepository extends ModelRepository
{
    public function __construct(Client $client)
    {
        parent::__construct($client);
    }

    public function findByCpf($cpf): Client
    {
        return $this->model->where("cpf", $cpf)->firstOrFail();
    }
    
}