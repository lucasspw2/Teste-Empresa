<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'precounitario' => 'required',
            'descricao' => 'required',
            'estoque' => 'required|integer'

        ];
    }

    public function messages()
    {
        return [
            'required' => 'o campo :attribute é obrigatorio',
            'numeric' => 'o campo :attribute é númerico',
            'integer' => 'o campo :attribute é inteiro'
        ];
    }
}
