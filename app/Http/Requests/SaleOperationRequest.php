<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class SaleOperationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [
            'clientId' => 'required|exists:clients,id',
            'storeId' => 'required|exists:stores,id',
            'sellerId' => 'required|exists:sellers,id',
            'paymentId' => 'nullable|exists:payment_methods,id',
            'totalItens' => 'required|integer|min:1',
            'totalPrice' => 'required|numeric|min:0.01',
            'observation' => 'nullable|string',
            'summary' => 'required|array|min:1',
        ];
    }

    public function messages()
    {
        return [
            'clientId.required' => 'O cliente é obrigatório.',
            'clientId.exists' => 'O cliente informado não existe.',
            'storeId.required' => 'A loja é obrigatória.',
            'storeId.exists' => 'A loja informada não existe.',
            'sellerId.required' => 'O vendedor é obrigatório.',
            'sellerId.exists' => 'O vendedor informado não existe.',
            'paymentId.exists' => 'O método de pagamento informado não existe.',
            'totalItens.required' => 'O total de itens é obrigatório.',
            'totalItens.integer' => 'O total de itens deve ser um número inteiro.',
            'totalItens.min' => 'O total de itens deve ser pelo menos 1.',
            'totalPrice.required' => 'O preço total é obrigatório.',
            'totalPrice.numeric' => 'O preço total deve ser um número.',
            'totalPrice.min' => 'O preço total deve ser maior que 0.01.',
            'summary.required' => 'O resumo da venda é obrigatório.',
            'summary.array' => 'O resumo da venda deve ser um array.',
            'summary.min' => 'O resumo da venda deve conter pelo menos um item.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => $validator->errors()->first(), 
        ], 422));
    }
}
