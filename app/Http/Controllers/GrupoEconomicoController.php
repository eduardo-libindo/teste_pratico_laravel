<?php

namespace App\Http\Controllers;

use App\Models\GrupoEconomico;
use Illuminate\Http\Request;

class GrupoEconomicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return GrupoEconomico::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, GrupoEconomico $grupoEconomico)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
        ]);

        return $grupoEconomico::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(GrupoEconomico $grupoEconomico)
    {
        return $grupoEconomico;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GrupoEconomico $grupoEconomico)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
        ]);

        $grupoEconomico->update($request->all());

        return $grupoEconomico;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GrupoEconomico $grupoEconomico)
    {
        $grupoEconomico->delete();

        return response()->noContent();
    }
}
