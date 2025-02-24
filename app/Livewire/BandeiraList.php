<?php

namespace App\Livewire;

use App\Models\Bandeira;
use Livewire\Component;

class BandeiraList extends Component
{

    public function delete($id)
    {
        Bandeira::find($id)->delete();
        session()->flash('message', 'Bandeira deletada com sucesso!');
    }

    public function render()
    {
        $bandeiras = Bandeira::all();
        return view('livewire.bandeira-list', compact('bandeiras'));
    }
}
