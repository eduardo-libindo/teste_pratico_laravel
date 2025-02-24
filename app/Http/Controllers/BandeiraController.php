<?php

namespace App\Http\Controllers;

use App\Models\Bandeira;
use Illuminate\Http\Request;

class BandeiraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Bandeira::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
        ]);

        return Bandeira::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Bandeira $bandeira)
    {
        return $bandeira;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bandeira $bandeira)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
        ]);

        $bandeira->update($request->all());

        return $bandeira;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bandeira $bandeira)
    {
        $grupoEconomico->delete();

        return response()->noContent();
    }
}
