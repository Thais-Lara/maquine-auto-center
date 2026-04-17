<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->id();
            $table->string('nome');
            $table->string('documento', 14)->unique();
            $table->string('documento_tipo', 4);
            $table->string('email')->nullable();
            $table->string('telefone', 20)->nullable();
            $table->text('endereco')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->timestamp('data_inclusao')->useCurrent();
        });

        DB::statement(
            "ALTER TABLE clientes
            ADD CONSTRAINT check_documento_tipo
            CHECK (documento_tipo IN ('CPF', 'CNPJ'));
        ");
    }

    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
