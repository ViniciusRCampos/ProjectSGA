<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'cnpj' => 'nullable|string|unique:stores,cnpj|regex:/^\d{14}$/',
            'cep' => 'required|string|regex:/^\d{8}$/',
            'address' => 'required|string',
            'district' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'active' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome da loja é obrigatório.',
            'cnpj.unique' => 'O CNPJ informado já está em uso.',
            'cnpj.regex' => 'O CNPJ deve conter apenas 14 dígitos numéricos.',
            'cep.required' => 'O CEP é obrigatório.',
            'cep.regex' => 'O CEP deve conter apenas 8 dígitos numéricos.',
            'address.required' => 'O endereço é obrigatório.',
            'district.required' => 'O bairro é obrigatório.',
            'city.required' => 'A cidade é obrigatória.',
            'state.required' => 'O estado é obrigatório.',
            'active.required' => 'O status da loja é obrigatório.',
            'active.boolean' => 'O status da loja deve ser verdadeiro ou falso.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => $validator->errors()->first(), 
        ], 422));
    }
}
