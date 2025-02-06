<?php

namespace App\Repository\Model;

use App\Models\Client;

class ClientRepository extends ModelRepository
{
    public function __construct(Client $client)
    {
        parent::__construct($client);
    }

    /**
     * Search for a client by the CPF provided
     * @param int $cpf
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findByCpf(int $cpf): Client
    {
        return $this->model->where("cpf", $cpf)->firstOrFail();
    }
}
