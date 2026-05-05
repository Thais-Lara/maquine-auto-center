@extends('layouts.app')

@section('title', 'Maquine - Clientes')

@section('content')
    <div
        class="bg-gradient-to-br from-gray-900 via-black to-gray-950 flex items-start p-4 border border-white/10 rounded-2xl shadow-2xl">
        <div class=" max-w-5xl bg-black/75 backdrop-blur-xl p-5 rounded-2xl shadow-2xl border border-white/10">

            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-lg font-semibold text-white">
                    Clientes
                </h1>
               
                <div class="flex justify-between items-center mb-4">

                    <!-- Barra de Busca -->
                    <div class="relative w-72">

                        <!-- Ícone -->
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-4.35-4.35m1.6-5.65a7.25 7.25 0 11-14.5 0 7.25 7.25 0 0114.5 0z" />
                            </svg>
                        </div>

                        <input id="searchCliente" type="text" placeholder="Buscar cliente..." class="w-full bg-white/5 border border-white/10 text-white text-xs rounded-md pl-9 pr-3 py-2 
                                               focus:outline-none focus:ring-1 focus:ring-red-600 focus:border-red-600 
                                               placeholder-gray-500 transition">
                    </div>

                    <!-- Botão Novo -->
                    <button onclick="openModal()"
                        class="m-2 bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-xs font-medium transition shadow-lg shadow-red-600/20">
                        + Novo Cliente
                    </button>
                </div>




            </div>

            <!-- Tabela -->
            <div class="overflow-x-auto min-h-[450px]">
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

                    <tbody id="clientesTable">
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
                                        <button
                                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded text-[10px] transition">
                                            Editar
                                        </button>

                                        <button
                                            class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded text-[10px] transition">
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
                <div id="clienteModal"
                    class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden items-center justify-center z-50">

                    <div class="bg-black/90 border border-white/10 rounded-xl w-full max-w-md p-6 shadow-2xl relative">

                        <h2 class="text-white text-sm font-semibold mb-4">
                            Novo Cliente
                        </h2>

                        <form class="space-y-3" id="formCliente" action="{{ route('clientes.store') }}">
                                @csrf
                                <div class="space-y-3">

                            <!-- Nome -->
                            <input type="text" name="nome" placeholder="Nome *" required maxlength="255" class="w-full bg-white/5 border border-white/10 text-white text-xs 
                       rounded-md px-3 py-2
                       placeholder-gray-500
                       focus:outline-none focus:ring-1 focus:ring-red-600 focus:border-red-600
                       transition duration-200">

                            <!-- CPF/CNPJ -->
                            <input type="text" name="cpf_cnpj" placeholder="CPF ou CNPJ *" required maxlength="18" class="w-full bg-white/5 border border-white/10 text-white text-xs 
                       rounded-md px-3 py-2
                       placeholder-gray-500
                       focus:outline-none focus:ring-1 focus:ring-red-600 focus:border-red-600
                       transition duration-200">

                            <!-- Email -->
                            <input type="email" name="email" placeholder="Email" class="w-full bg-white/5 border border-white/10 text-white text-xs 
                       rounded-md px-3 py-2
                       placeholder-gray-500
                       focus:outline-none focus:ring-1 focus:ring-red-600 focus:border-red-600
                       transition duration-200">

                            <!-- Telefone -->
                            <input type="text" name="telefone" placeholder="Telefone" class="w-full bg-white/5 border border-white/10 text-white text-xs 
                       rounded-md px-3 py-2
                       placeholder-gray-500
                       focus:outline-none focus:ring-1 focus:ring-red-600 focus:border-red-600
                       transition duration-200">

                            <!-- Endereço -->
                            <input type="text" name="endereco" placeholder="Endereço" class="w-full bg-white/5 border border-white/10 text-white text-xs 
                       rounded-md px-3 py-2
                       placeholder-gray-500
                       focus:outline-none focus:ring-1 focus:ring-red-600 focus:border-red-600
                       transition duration-200">

                            <!-- Aniversário -->
                            <input type="date" name="aniversario" class="w-full bg-white/5 border border-white/10 text-white text-xs 
                       rounded-md px-3 py-2
                       focus:outline-none focus:ring-1 focus:ring-red-600 focus:border-red-600
                       transition duration-200">

                    </div>

                    <div class="flex justify-end gap-2 pt-4">

                        <button type="button" onclick="closeModal()" class="text-gray-400 text-xs px-4 py-2 border border-white/10 rounded-md 
                       hover:bg-white/5 transition">
                            Cancelar
                        </button>

                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 
                       rounded-md text-xs font-medium transition 
                       shadow-lg shadow-red-600/20">
                            Salvar
                        </button>

                    </div>

                    </form>

                </div>
            </div>

            <div class="mt-4 text-white">
                {{ $clientes->links('pagination::tailwind') }}
            </div>
        </div>

    </div>

    </div>
    <script>
        document.getElementById('searchCliente').addEventListener('keyup', function () {

            let filtro = this.value.toLowerCase();
            let linhas = document.querySelectorAll('#clientesTable tr');

            linhas.forEach(function (linha) {

                let textoLinha = linha.innerText.toLowerCase();

                if (textoLinha.includes(filtro)) {
                    linha.style.display = '';
                } else {
                    linha.style.display = 'none';
                }

            });

        });
    </script>
    <script>
        function openModal() {
            document.getElementById('clienteModal').classList.remove('hidden');
            document.getElementById('clienteModal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('clienteModal').classList.add('hidden');
            document.getElementById('clienteModal').classList.remove('flex');
        }
    </script>
    <script>
        document.getElementById('formCliente').addEventListener('submit', async function (e) {
            e.preventDefault();

            let form = this;
            let formData = new FormData(form);
              let aniversario = formData.get('aniversario');
               if (aniversario) {
        formData.set('aniversario', aniversario);
    }

            try {
                let response = await fetch(form.action, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Accept": "application/json"
                    },
                    body: formData
                });

                let data = await response.json();

                if (!response.ok) {
                    throw data;
                }

              
                alert(data.message);
                form.reset();
                closeModal();

                location.reload(); 

            } catch (error) {

                if (error.errors) {
                    let erros = Object.values(error.errors).flat().join("\n");
                    alert(erros);
                } else {
                    alert("Erro ao cadastrar cliente.");
                }
            }
        });
    </script>



@endsection