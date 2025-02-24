<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="bg-gray-100">
        <div class="container mx-auto p-4">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">{{ $titulo }}</h1>
                <p class="text-gray-700">{{ $mensagem }}</p>

                <div class="mt-6">
                    <h2 class="text-xl font-semibold mb-2">Menu de Navegação</h2>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('grupo-economico.index') }}" class="text-blue-500 hover:text-blue-700">
                                Gerenciar Grupos Econômicos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('bandeira.index') }}" class="text-blue-500 hover:text-blue-700">
                                Gerenciar Bandeiras
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('unidade.index') }}" class="text-blue-500 hover:text-blue-700">
                                Gerenciar Unidades
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('colaborador.index') }}" class="text-blue-500 hover:text-blue-700">
                                Gerenciar Colaboradores
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
