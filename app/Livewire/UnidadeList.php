<?php

namespace App\Livewire;

use App\Models\Unidade;
use Livewire\Component;

class UnidadeList extends Component
{

    public function delete($id)
    {
        Unidade::find($id)->delete();
        session()->flash('message', 'Unidade deletada com sucesso!');
    }

    public function render()
    {
        $unidades = Unidade::all();
        return view('livewire.unidade-list', compact('unidades'));
    }
}
