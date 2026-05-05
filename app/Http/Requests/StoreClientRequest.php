<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome'        => 'required|string|max:255',
            'cpf_cnpj'    => 'required|string|max:18|unique:cliente,cpf_cnpj',
            'email'       => 'nullable|email|max:255',
            'endereco'    => 'nullable|string|max:255',
            'telefone'    => 'nullable|string|max:20',
            'aniversario' => 'nullable|date',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'cpf_cnpj.required' => 'CPF ou CNPJ é obrigatório.',
            'cpf_cnpj.unique' => 'Já existe um cliente com esse CPF/CNPJ.',
        ];
    }
}