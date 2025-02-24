<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Não Encontrada - 404</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col justify-center items-center">
        <div class="bg-white shadow-md rounded-lg p-8 text-center">
            <!-- Ícone ou Imagem -->
            <svg class="w-20 h-20 mx-auto text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>

            <!-- Título -->
            <h1 class="text-4xl font-bold text-gray-800 mt-4">404</h1>
            <h2 class="text-2xl font-semibold text-gray-700 mt-2">Página Não Encontrada</h2>

            <!-- Mensagem -->
            <p class="text-gray-600 mt-4">
                A página que você está procurando não existe ou foi movida.
            </p>

            <!-- Botão para Voltar à Página Inicial -->
            <div class="mt-6">
                <a href="{{ url('/') }}" class="inline-block bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition duration-300">
                    Voltar à Página Inicial
                </a>
            </div>
        </div>
    </div>
</body>
</html>
