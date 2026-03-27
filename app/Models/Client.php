<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'documento',
        'documento_tipo',
        'email',
        'telefone',
        'endereco',
        'data_nascimento',
    ];

    const CREATED_AT = 'data_inclusao';
}
