<?php

namespace App\Livewire;

use App\Models\Colaborador;
use Livewire\Component;

class ColaboradorList extends Component
{
    public function delete($id)
    {
        Colaborador::find($id)->delete();
        session()->flash('message', 'Colaborador deletado com sucesso!');
    }

    public function render()
    {
        $colaboradores = Colaborador::all();
        return view('livewire.colaborador-list', compact('colaboradores'));
    }
}
