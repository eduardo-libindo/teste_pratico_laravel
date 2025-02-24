<div class="container mx-auto p-4">
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex items-start justify-start">
            <a type="button" href="{{ route('grupo-economico.index') }}" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 shadow-xs ring-gray-300 ring-inset hover:bg-gray-50">
                <svg class="mr-1.5 -ml-0.5 size-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                Voltar
            </a>
        </div>

        <h1 class="text-2xl font-bold py-4">Gerenciar Grupo Econômico</h1>

        <h3 class="text-2xl text-center font-bold py-4">
            {{ $id ? 'Editar Produto' : 'Novo Produto' }}
        </h3>

        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <label for="nome" class="block text-sm font-medium text-gray-700">Nome:</label>
                <input type="text" id="nome" wire:model="nome" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @error('nome') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-primary-button>
                    {{ $id ? 'Atualizar' : 'Salvar' }}
                </x-primary-button>
            </div>
        </form>

        @if (session()->has('message'))
        <div class="mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-md">
            {{ session('message') }}
        </div>
        @endif
    </div>
</div>
