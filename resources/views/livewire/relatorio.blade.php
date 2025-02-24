<div class="container mx-auto p-4">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">Relatório de Colaboradores</h1>

        <!-- Filtros -->
        <form wire:submit.prevent="filtrar" class="mb-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Filtro por Unidade -->
                <div>
                    <label for="unidade_id" class="block text-sm font-medium text-gray-700">Unidade:</label>
                    <select id="unidade_id" wire:model="unidade_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="">Todas</option>
                        @foreach ($unidades as $unidade)
                        <option value="{{ $unidade->id }}">{{ $unidade->nome_fantasia }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Filtro por Data Início -->
                <div>
                    <label for="data_inicio" class="block text-sm font-medium text-gray-700">Data Início:</label>
                    <input type="date" id="data_inicio" wire:model="data_inicio" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <!-- Filtro por Data Fim -->
                <div>
                    <label for="data_fim" class="block text-sm font-medium text-gray-700">Data Fim:</label>
                    <input type="date" id="data_fim" wire:model="data_fim" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
            </div>

            <!-- Botão de Filtrar -->
            <div class="mt-4 text-center py-2">
                <button type="submit" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 shadow-xs ring-gray-300 ring-inset hover:bg-gray-50">
                    Filtrar
                </button>
            </div>
        </form>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 grey:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="border px-4 py-3">ID</th>
                        <th scope="col" class="border px-4 py-3">Nome</th>
                        <th scope="col" class="border px-4 py-3">Email</th>
                        <th scope="col" class="border px-4 py-3">CPF</th>
                        <th scope="col" class="border px-4 py-3">Unidade</th>
                        <th scope="col" class="border px-4 py-3">Data de Criação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($colaboradores as $colaborador)
                    <tr class="border-b grey:border-gray-700">
                        <td class="border px-4 py-3">{{ $colaborador->id }}</td>
                        <td class="border px-4 py-3">{{ $colaborador->nome }}</td>
                        <td class="border px-4 py-3">{{ $colaborador->email }}</td>
                        <td class="border px-4 py-3">{{ $colaborador->cpf }}</td>
                        <td class="border px-4 py-3">{{ $colaborador->unidade->nome_fantasia }}</td>
                        <td class="border px-4 py-3">{{ $colaborador->created_at->format('d/m/Y H:i:s') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Paginação -->
        <div class="mt-4">
            {{ $colaboradores->links() }}
        </div>

        <!-- Botão de Exportação -->
        <div class="mt-4">
            <button wire:click="exportar()" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 shadow-xs ring-gray-300 ring-inset hover:bg-gray-50">
                Exportar para Excel
            </button>
        </div>
    </div>
</div>
