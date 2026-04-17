<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {

        $clientId = $this->route('clientes');

        return [
            'nome' => ['sometimes', 'string', 'max:255'],
            'documento' => ['sometimes', 'string', 'max:14', 'unique:clientes,documento,'.($client->id ?? 0)],
            'documento_tipo' => ['sometimes', 'in:CPF,CNPJ'],
            'email' => ['nullable', 'email'],
            'telefone' => ['nullable', 'string'],
            'endereco' => ['nullable', 'string'],
            'data_nascimento' => ['nullable', 'date_format:d/m/Y'],
        ];
    }

    // Verificação de campos não permitidos
    protected function prepareForValidation()
    {
        $enviados = array_keys($this->all());

        $permitidos = ['nome', 'documento', 'documento_tipo', 'email', 'data_nascimento', 'telefone', 'endereco'];

        $intrusos = array_diff($enviados, $permitidos);

        if (! empty($intrusos)) {
            abort(response()->json([
                'message' => 'Erro de segurança: Campos não permitidos detectados.',
                'campos_invalidos' => array_values($intrusos),
                'status' => 'error',
            ], 422));
        }
    }
}
