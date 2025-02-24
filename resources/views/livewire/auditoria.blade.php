<div class="container mx-auto p-4">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">Auditoria </h1>

        <!-- Campo de Busca -->
        <div class="mb-4">
            <input type="text" wire:model.live.debounce.500ms="search" placeholder="Buscar log..." class="w-full border px-4 py-2 border rounded-md">
        </div>

        <!-- Tabela de Logs -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-black-500 grey:text-black-400">
                <thead class="border grey:border-black-700" text-xs text-black-700 uppercase bg-black-50 dark:bg-black-700 dark:text-black-400">
                    <tr>
                        <th scope="col" class="border px-4 py-3">ID</th>
                        <th scope="col" class="border px-4 py-3">Descrição</th>
                        <th scope="col" class="border px-4 py-3">Responsável</th>
                        <th scope="col" class="border px-4 py-3">Data</th>
                        <th scope="col" class="border px-4 py-3">Detalhes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $log)
                    <tr class="border grey:border-black-700">
                        <td class="border px-4 py-3">{{ $log->id }}</td>
                        <td class="border px-4 py-3">{{ $log->description }}</td>
                        <td class="border px-4 py-3">{{ $log->causer->name ?? 'Sistema' }}</td>
                        <td class="border px-4 py-3">{{ $log->created_at->format('d/m/Y H:i:s') }}</td>
                        <td class="border px-4 py-3">
                            <pre class="text-sm">{{ json_encode($log->properties, JSON_PRETTY_PRINT) }}</pre>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Paginação -->
        <div class="mt-4">
            {{ $logs->links() }}
        </div>

        <!-- Itens por Página -->
        <div class="mt-4">
            <select wire:model.live="perPage" class="px-4 py-2 border rounded-md">
                <option value="10">10 por página</option>
                <option value="25">25 por página</option>
                <option value="50">50 por página</option>
                <option value="100">100 por página</option>
            </select>
        </div>
    </div>
</div>
