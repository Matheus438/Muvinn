<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class MuvinnFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'estado' => 'required|max:2|min:2',
            'cidade' => 'required|max:100|min:5',
            'endereco' => 'required|max:100|min:5',
            'tipos_imoveis' => 'required|max:100|min:5',
            'preco' => 'required|decimal 10,2',
            'banheiros' => 'required|integer',
            'quartos'=> 'required|integer',
            'vagas'=> 'integer',
            'area_do_imovel'=> 'required|max:100|min:5'
        ];
    }
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
}

public function messages()
{
    return [
        'estado.required' => 'O campo estado é obrigatório.',
        'estado.max' => 'O campo estado deve conter no máximo 2 caracteres.',
        'estado.min' => 'O campo estado deve conter no míninmo 2 caracteres.',
        'cidade.required' => 'O campo cidade é obrigatório.',
        'cidade.max' => 'O campo cidade deve conter no máximo 100 caracteres',
        'cidade.min' => 'O campo cidade deve conter no mínimo 100 caracteres',
        'endereco.required' => 'O campo endereço é obrigatório.',
        'endereco.max' => 'O campo endereço deve conter no máximo 100 caracteres.',
        'endereco.min' => 'O campo endereço deve conter no mínimo 5 caracteres.',
        'tipos_imoveis.required' => 'O campo dos tipos de imóveis é obrigatório.',
        'tipos_imoveis.max' => 'O campo tipos de imóveis deve conter no máximo 100 caracteres.',
        'tipos_imoveis.min' => 'O campo tipos de imóveis deve conter no mínimo 5 caracteres.',
        'preco.required' => 'O campo preço é obrigatório.',
        'preco.decimal' => 'O campo de preço tem que ser em decimal. Exemplo: 1000,00.',
        'banheiros.required' => 'O campo banheiros é obrigatório.',
        'quartos.required' => 'O campo quartos é obrigatório.',
        'area_do_imovel' => 'O campo de área de imóvel é obrigatório.',
        'area_do_imovel' => 'O campo área de imóvel deve conter no máximo 100 caracteres.',
        'area_do_imovel' => 'O campo área de imóvel deve conter no mínimo 5 caracteres.'
    ];
}
}