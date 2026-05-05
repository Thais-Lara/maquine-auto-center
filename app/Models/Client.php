<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /*
    |---------------------------------------
    | Tabela real do banco
    |---------------------------------------
    */
    protected $table = 'cliente';

    /*
    |---------------------------------------
    | Primary key padrão (id)
    |---------------------------------------
    */
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    /*
    |---------------------------------------
    | Campos permitidos
    |---------------------------------------
    */
    protected $fillable = [
        'nome',
        'cpf_cnpj',
        'email',
        'endereco',
        'telefone',
        'aniversario',
        'data_inclusao',
    ];

    /*
    |---------------------------------------
    | Timestamps customizados
    |---------------------------------------
    */
    const CREATED_AT = 'data_inclusao';
    const UPDATED_AT = null;

    /*
    |---------------------------------------
    | Casts corretos (sem quebrar Carbon)
    |---------------------------------------
    */
    protected $casts = [
        'aniversario' => 'date',
        'data_inclusao' => 'datetime',
    ];
}