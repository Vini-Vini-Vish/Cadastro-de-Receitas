<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceitaRequest extends FormRequest
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
            // add os campos do banco que deseja que sejam verificados
                //required fala que o campo é obrigatorio
                //string sendo o tipo de dado
                //o maximo de dados setados na criação do banco

            'nome_receita'=>'required|string|max:50', 
            'descricao'=>'required|string|max:250',
            'tempo_preparo'=>'required|integer',
            'rendimento'=>'required|string|max:20',
            'lista_ingredientes'=>'required|string|max:250',
            'metodo_preparo'=>'required|string|max:250',
        ];
    }
}
