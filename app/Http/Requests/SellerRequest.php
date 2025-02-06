<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SellerRequest extends FormRequest
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
            'cpf' => 'required|string|unique:sellers,cpf|regex:/^\d{11}$/',
            'active' => 'required|boolean',
            'storeId' => 'required|exists:stores,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome do vendedor é obrigatório.',
            'cpf.required' => 'O CPF do vendedor é obrigatório.',
            'cpf.unique' => 'O CPF informado já está em uso.',
            'cpf.regex' => 'O CPF deve conter apenas 11 dígitos numéricos.',
            'active.required' => 'O status do vendedor é obrigatório.',
            'active.boolean' => 'O status do vendedor deve ser verdadeiro ou falso.',
            'storeId.required' => 'A loja é obrigatória.',
            'storeId.exists' => 'A loja informada não existe.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => $validator->errors()->first(),
        ], 422));
    }
}
