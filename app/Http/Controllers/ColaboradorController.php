<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;

use App\Models\Colaborador;
use Illuminate\Http\Request;

class ColaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Colaborador::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Colaborador::class],
            'cpf' => ['required', 'string', 'cpf', 'max:11', 'unique:'.Colaborador::class],
        ]);

        return Colaborador::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Colaborador $colaborador)
    {
        return $colaborador;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Colaborador $colaborador)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Colaborador::class],
            'cpf' => ['required', 'string', 'cpf', 'max:11', 'unique:'.Colaborador::class],
        ]);

        $colaborador->update($request->all());

        return $colaborador;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Colaborador $colaborador)
    {
        $colaborador->delete();

        return response()->noContent();
    }

    /**
     * Display a listing of the relatorio.
     */
    public function relatorio(Request $request)
    {
        $query = Colaborador::query();

        if ($request->has('unidade_id')) {
            $query->where('unidade_id', $request->unidade_id);
        }

        return $query->get();
    }
}
