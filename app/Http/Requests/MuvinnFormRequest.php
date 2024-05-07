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
            'estado' => 'required|max:100|min:5',
            'cidade' => 'required|max:100|min:5',
            'endereco' => 'required|max:100|min:5',
            'tipos_imoveis' => 'required|max:100|min:5',
            'preco' => 'required|decimal2,4',
            'banheiros' => 'integer',
            'quartos'=> 'integer',
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
