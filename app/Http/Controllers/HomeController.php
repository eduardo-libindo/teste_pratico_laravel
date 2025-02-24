<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Mostra a página inicial do sistema.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Dados que podem ser passados para a view (opcional)
        $dados = [
            'titulo' => 'Bem-vindo ao Sistema de Gestão',
            'mensagem' => 'Gerencie seus grupos econômicos, bandeiras, unidades e colaboradores de forma eficiente.',
        ];

        // Renderiza a view 'home' e passa os dados
        return view('home', $dados);
    }

    public function notfound()
    {
        return view('errors.404');
    }
}
