<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|min:3',
            'razaosocial' => 'required|min:3',
            'cnpj' => 'min:14|required',
            'rua' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cep' => 'min:8',
            'email' => 'required|email',
            'telefone' => 'min:12|max:13'


        ];
    }


    public function messages()
    {
        return [
            'required' => 'o campo :attribute é obrigatorio ',
            'min' => 'o campo :attribute nao conteve o numero de caracteres minimos',
            'numeric' => 'o campo :attribute precisa ser numerico',
            'max' => 'o campo :attribute excedeu o limite de caracteres'

        ];
    }
}
