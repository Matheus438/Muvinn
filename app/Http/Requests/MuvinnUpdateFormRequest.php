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
            'tipos_imoveis' => 'max:100|min:5',
            'preco' => 'decimal 10,2',
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
    'profissional_Id.required' => 'Campo profissional é obrigatório',
    'cliente_Id.required' => 'Campo cliente é obrigatório',
    'servico_Id.required' => 'Campo serviço é obrigatório',
    'dataHora.required' => 'Campo data é obrigatório',
    'dataHora.date' => 'Formato Inválido',
    'pagamento.required' => 'Campo pagamento é obrigatório',
    'pagamento.max' => 'Campo pagamento deve conter no maximo 20 caracteres',
    'pagamento.min' => 'Campo pagamento deve conter no minimo 3 caracteres',
    'valor.required' => 'Campo valor é obrigatório',
    'valor.decimal' => 'Este campo so aceita numero decimal'
    ];
}
}