<?php

namespace App\Http\Requests\Indication;

use App\Rules\ValidateCpf;
use App\Http\Requests\ApiBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends ApiBaseRequest
{
    /**
     * Determine se o usuário está autorizado a fazer essa solicitação.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Adicionar regras de validação para requisição
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'cpf' => ['required', new ValidateCpf(), 'unique:indications'],
            'phone' => 'required|min:16',
            'email' => 'required|email',
        ];
    }

    /**
     * Retornar mensagem caso aplicação gere algum erro de validação
     *
     * @return string[]
     */
    public function messages()
    {
        return [
            'name.required' => 'Campo nome é obrigatorio',
            'cpf.required' => 'Campo CPF é obrigatório',
            'cpf.unique' => 'CPF ja está cadastrado',
            'phone.required' => 'Campo telefone é obrigatorio',
            'phone.min' => 'Telefone inválido',
            'email.required' => 'Campo email é obrigatorio',
            'email.email' => 'Por favor, coloque um email válido',
        ];
    }
}
