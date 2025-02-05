<?php

namespace App\Http\Controllers;

use App\Service\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }
    public function addNewClient(Request $request) {

        $response = $this->clientService->addNewClient($request->only(["name", "email", "cpf", "genderId", "active"]));
        return $response;
    }
}
