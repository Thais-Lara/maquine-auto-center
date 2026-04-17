<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    // Verificação de campos não permitidos
    protected function prepareForValidation()
    {
        $enviados = array_keys($this->all());
        $permitidos = ['nome', 'documento', 'documento_tipo', 'email', 'data_nascimento', 'telefone', 'endereco'];
        $intrusos = array_diff($enviados, $permitidos);

        if (! empty($intrusos)) {
            abort(response()->json([
                'message' => 'Erro de validação: Campos não permitidos detectados.',
                'campos_invalidos' => array_values($intrusos),
            ], 422));
        }
    }

    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
            'email' => 'required|email|unique:clientes,email',
            'documento' => ['required', 'string', 'max:14', 'unique:clientes,documento'],
            'documento_tipo' => ['required', 'in:CPF,CNPJ'],
            'data_nascimento' => ['required', 'date_format:d/m/Y'],
            'telefone' => ['nullable', 'string'],
            'endereco' => ['nullable', 'string'],
        ];
    }

    // Padronização de mensagens
    public function messages(): array
    {
        return [
            'nome.required' => 'O nome do cliente é obrigatório para o cadastro.',

            'email.required' => 'Precisamos de um e-mail para enviar as atualizações da OS.',
            'email.email' => 'O formato do e-mail informado não é válido.',
            'email.unique' => 'Este e-mail já pertence a outro cliente em nosso sistema.',

            'documento.required' => 'O número do documento (CPF ou CNPJ) é indispensável.',
            'documento.unique' => 'Já existe um cliente cadastrado com este CPF/CNPJ.',
            'documento.max' => 'O documento não pode ter mais que 14 dígitos.',

            'documento_tipo.in' => 'Por favor, selecione apenas entre as opções: CPF ou CNPJ.',

            'data_nascimento.date' => 'A data de nascimento deve estar em um formato de data válido.',
        ];
    }
}
