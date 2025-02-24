<div class="container mx-auto p-4">
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex items-start justify-start">
            <a type="button" href="{{ route('home') }}" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 shadow-xs ring-gray-300 ring-inset hover:bg-gray-50">
                <svg class="mr-1.5 -ml-0.5 size-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                Voltar
            </a>
        </div>

        <h1 class="text-2xl text-gray-700 font-bold py-4">Lista de Bandeiras</h1>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 grey:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="border px-4 py-3">ID</th>
                        <th scope="col" class="border px-4 py-3">Nome</th>
                        <th scope="col" class="border px-4 py-3">Grupo Econômico</th>
                        <th scope="col" class="border px-4 py-3">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bandeiras as $bandeira)
                    <tr class="border-b grey:border-gray-700">
                        <td class="border px-4 py-3">{{ $bandeira->id }}</td>
                        <td class="border px-4 py-3">{{ $bandeira->nome }}</td>
                        <td class="border px-4 py-3">{{ $bandeira->grupoEconomico->nome }}</td>
                        <td class="border px-4 py-3">
                            <!-- <a href="{{ route('bandeira.edit', $bandeira->id) }}" class="text-blue-500 hover:text-blue-700">Editar</a>
                        <button wire:click="delete({{ $bandeira->id }})" class="text-red-500 hover:text-red-700 ml-2">Deletar</button> -->

                            <a type="button" href="{{ route('bandeira.edit', $bandeira->id) }}" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 shadow-xs ring-gray-300 ring-inset hover:bg-gray-50">
                                <svg class="mr-1.5 -ml-0.5 size-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                </svg>
                                Editar
                            </a>

                            <button wire:click="delete({{ $bandeira->id }})" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 shadow-xs ring-gray-300 ring-inset hover:bg-gray-50">
                                <svg class="mr-1.5 -ml-0.5 size-5 text-red-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                Deletar
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            <a type="button" href="{{ route('bandeira.create') }}" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-700 ring-1 shadow-xs ring-gray-300 ring-inset hover:bg-gray-50">
                <svg class="mr-1.5 -ml-0.5 size-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
                Adicionar Bandeira
            </a>
        </div>
    </div>
</div>
