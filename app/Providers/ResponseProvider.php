<?php

namespace App\Providers;

class ResponseProvider
{
    public function success($data, $message = "Success", $statusCode = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }

    public function error($statusCode = 400)
    {
        $allowedStatusCodes = [400, 404, 422, 500];

        $errorMessages = [
            400 => 'Requisição inválida. Revise os campos e tente novamente',
            404 => 'Recurso não encontrado.',
            422 => 'Erro na validação dos dados, verifique os campos e tente novamente!',
            500 => 'Erro interno do servidor. Tente novamente ou contate o suporte!',
        ];

        if (!in_array($statusCode, $allowedStatusCodes)) {
            $statusCode = 500;
        }

        return response()->json([
            'status' => 'error',
            'message' => $ $errorMessages[$statusCode],
            'data' => null
        ], $statusCode);
    }
}