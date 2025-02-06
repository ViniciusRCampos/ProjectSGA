<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductRequest extends FormRequest
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
            'description' => 'nullable|string',
            'color' => 'required|string',
            'active' => 'required|boolean',
            'price' => 'required|numeric|min:0.01|max:999999999.99',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome do produto é obrigatório.',
            'color.required' => 'A cor do produto é obrigatória.',
            'active.required' => 'O status do produto é obrigatório.',
            'active.boolean' => 'O status do produto deve ser verdadeiro ou falso.',
            'price.required' => 'O preço do produto é obrigatório.',
            'price.numeric' => 'O preço do produto deve ser um número.',
            'price.min' => 'O preço do produto deve ser no mínimo 0.01',
            'price.max' => 'O preço do produto deve ser no máximo 999999999.99.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => $validator->errors()->first(),
        ], 422));
    }
}
