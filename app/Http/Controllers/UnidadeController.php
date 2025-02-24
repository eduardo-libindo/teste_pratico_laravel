<?php

namespace App\Http\Controllers;

use App\Models\Unidade;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Unidade::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome_fantasia' => ['required', 'string', 'max:255'],
            'razao_social' => ['required', 'string', 'max:255'],
            'cnpj' => ['required', 'string', 'cnpj', 'max:14', 'unique:'.Unidade::class],
        ]);

        return Unidade::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Unidade $unidade)
    {
        return $unidade;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unidade $unidade)
    {
        $request->validate([
            'nome_fantasia' => ['required', 'string', 'max:255'],
            'razao_social' => ['required', 'string', 'max:255'],
            'cnpj' => ['required', 'string', 'cnpj', 'max:14', 'unique:'.Unidade::class],
        ]);

        $unidade->update($request->all());

        return $unidade;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unidade $unidade)
    {
        $unidade->delete();

        return response()->noContent();
    }
}
