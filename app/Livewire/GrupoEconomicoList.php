<?php

namespace App\Livewire;

use App\Models\GrupoEconomico;
use Livewire\Component;

class GrupoEconomicoList extends Component
{

    public function delete($id)
    {
        GrupoEconomico::find($id)->delete();
        session()->flash('message', 'Grupo Economico deletado com sucesso!');
    }

    public function render()
    {
        $gruposEconomicos = GrupoEconomico::all();
        return view('livewire.grupo-economico-list', compact('gruposEconomicos'));
    }
}
