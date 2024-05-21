<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class MuvinnUpdateFormRequest extends FormRequest
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
            'estado' => 'max:2|min:2',
            'cidade' => 'max:100|min:5',
            'endereco' => 'max:100|min:5',
            'tipos_imoveis' => 'max:100|min:2',
            'preco' => 'decimal: 2',
            'banheiros' => 'integer',
            'quartos'=> 'integer',
            'vagas'=> 'integer',
            'area_do_imovel'=> 'max:100|min:1'
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
    return[
        
        'estado.max' => 'O campo estado deve conter no máximo 2 caracteres.',
        'estado.min' => 'O campo estado deve conter no míninmo 2 caracteres.',
       
        'cidade.max' => 'O campo cidade deve conter no máximo 100 caracteres',
        'cidade.min' => 'O campo cidade deve conter no mínimo 100 caracteres',
       
        'endereco.max' => 'O campo endereço deve conter no máximo 100 caracteres.',
        'endereco.min' => 'O campo endereço deve conter no mínimo 5 caracteres.',
       
        'tipos_imoveis.max' => 'O campo tipos de imóveis deve conter no máximo 100 caracteres.',
        'tipos_imoveis.min' => 'O campo tipos de imóveis deve conter no mínimo 2 caracteres.',
        
        'preco.decimal' => 'O campo de preço tem que ser em decimal. Exemplo: 1000.00.',
       
        'quartos.required' => 'O campo quartos é obrigatório.',
       
        'area_do_imovel.max' => 'O campo área de imóvel deve conter no máximo 100 caracteres.',
        'area_do_imovel.min' => 'O campo área de imóvel deve conter no mínimo 5 caracteres.'
    ];
}
}