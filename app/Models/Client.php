<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'uuid',
        'nome',
        'documento',
        'documento_tipo',
        'email',
        'telefone',
        'endereco',
        'data_nascimento',
    ];

    const CREATED_AT = 'data_inclusao';

    const UPDATED_AT = null;

    // Busca automatica pelo uuid na rota
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    // Gera uuid ao criar um cliente
    protected static function booted()
    {
        static::creating(function ($client) {
            $client->uuid = (string) Str::uuid();
        });
    }

    protected $casts = [
        'data_nascimento' => 'date',
        'data_inclusao' => 'datetime',
    ];

    // Formatar data (formato brasileiro)
    protected function dataNascimento(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? Carbon::parse($value)->format('d/m/Y') : null,
            set: fn ($value) => $value ? Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d') : null,
        );
    }
}
