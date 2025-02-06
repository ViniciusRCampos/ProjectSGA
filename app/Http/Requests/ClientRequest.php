<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClientRequest extends FormRequest
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
            'email' => 'required|email|unique:clients,email',
            'cpf' => 'required|string|unique:clients,cpf|regex:/^\d{11}$/',
            'genderId' => 'required|exists:genders,id',
            'active' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome do cliente é obrigatório.',
            'email.required' => 'O e-mail do cliente é obrigatório.',
            'email.email' => 'O e-mail informado não é válido.',
            'email.unique' => 'O e-mail informado já está em uso.',
            'cpf.required' => 'O CPF do cliente é obrigatório.',
            'cpf.unique' => 'O CPF informado já está em uso.',
            'cpf.regex' => 'O CPF deve conter apenas 11 dígitos numéricos.',
            'genderId.required' => 'O gênero do cliente é obrigatório.',
            'genderId.exists' => 'O gênero informado não existe.',
            'active.required' => 'O status do cliente é obrigatório.',
            'active.boolean' => 'O status do cliente deve ser verdadeiro ou falso.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => $validator->errors()->first(), 
        ], 422));
    }
}
