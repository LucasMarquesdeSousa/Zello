<?php

namespace App\Http\Requests;
use LaravelLegends\PtBrValidator\ValidatorProvider;

// use LaravelLegends\PtBrValidator\Rules\FormatoCpf;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
        //REGRAS DE VALIDAÇÃO
        return [
            'name' => 'required|string|min:3',
            'cpf' =>  'required|min:11|max:11|cpf',
            'rg' => 'required|min:9|max:9',
            'senha' => 'required|min:8',
            'confSenha' => 'required|min:8|same:senha',
            'data_nascimento'=>'required|date',
        ];
    }
    public function messages()
    {
        //MENSAGENS DE ERRO
        return [
            'required' => 'Campo obrigatório',
            'name.min' => 'Número minimo de caracteres é de 3',
            'cpf.cpf' => 'CPF invalido',
            'cpf.max'=>'Campo com no maximo 11 caracteres',
            'cpf.min'=>'Campo com no minimo 11 caracteres',
            'rg.min' => 'Campo com 7 algarismos',
            'senha.min' => 'O campo senha com no minimo 8 algarismos',
            'same' => 'As senha não são iguais',
            'confSenha.min' => 'Minimo de 8 algarismos',
            'data_nascimento.date'=>'Digite a data corretamente',
        ];
    }
}
