@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="h-[calc(100vh-4rem)] bg-gradient-to-br from-gray-900 via-black to-gray-950 flex   p-4 border border-white/10 rounded-2xl shadow-2xl">

    <div class=" max-w-5xl bg-black/75 backdrop-blur-xl p-5 rounded-2xl shadow-2xl border border-white/10">

        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-lg font-semibold text-white">
                Clientes
            </h1>

            <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded-md text-xs transition">
                + Novo
            </button>
        </div>

        <!-- Tabela -->
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left text-gray-300">

                <thead class="uppercase bg-white/5 text-gray-400 border-b border-white/10">
                    <tr>
                        <th class="px-2 py-2">Nome</th>
                        <th class="px-2 py-2">CPF/CNPJ</th>
                        <th class="px-2 py-2">Email</th>
                        <th class="px-2 py-2">Telefone</th>
                        <th class="px-2 py-2 text-center">Ações</th>
                    </tr>
                </thead>
            
                <tbody>
    @forelse ($clientes as $cliente)
        <tr class="border-b border-white/10 hover:bg-white/5 transition">
            <td class="px-2 py-2 text-white">
                {{ $cliente->nome }}
            </td>

            <td class="px-2 py-2">
                {{ $cliente->cpf_cnpj }}
            </td>

            <td class="px-2 py-2">
                {{ $cliente->email }}
            </td>

            <td class="px-2 py-2">
                {{ $cliente->telefone }}
            </td>

            <td class="px-2 py-2">
                <div class="flex justify-center gap-1">
                    <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded text-[10px] transition">
                        Editar
                    </button>

                    <button class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded text-[10px] transition">
                        Excluir
                    </button>
                </div>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="text-center py-4 text-gray-400">
                Nenhum cliente cadastrado.
            </td>
        </tr>
    @endforelse
</tbody>
             


            </table>
            <div class="mt-4 text-white">
                {{ $clientes->links('pagination::tailwind') }}
            </div>
        </div>

    </div>

</div>



@endsection