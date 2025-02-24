<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Bandeira;
use App\Models\GrupoEconomico;

class BandeiraForm extends Component
{
    public $nome;
    public $bandeiraId;
    public $grupoEconomicoId;

    #[Url]
    public $id = null;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'grupoEconomicoId' => 'required|exists:grupo_economicos,id',
    ];

    public function save()
    {
        $this->validate([
            'nome' => 'required',
            'grupoEconomicoId' => 'required',
        ]);

        if ($this->id != null) {
            // Atualizar
            $bandeira = Bandeira::find($this->id);
            $bandeira->update([
                'nome' => $this->nome,
                'grupo_economico_id' => $this->grupoEconomicoId,
            ]);
        } else {
            // Criar
            Bandeira::create([
                'nome' => $this->nome,
                'grupo_economico_id' => $this->grupoEconomicoId,
            ]);
        }

        $this->reset(['nome', 'bandeiraId', 'grupoEconomicoId']);
        session()->flash('message', $this->id != null ? 'Bandeira atualizada com sucesso!' : 'Bandeira criada com sucesso!');

        return redirect()->route('bandeira.index');
    }

    public function render()
    {
        // Busca o bandeira apenas se o ID estiver presente
        $bandeira = $this->id ? Bandeira::find($this->id) : null;

        // Se o bandeira for encontrado, atualiza as propriedades
        if ($bandeira) {
            $this->bandeiraId = $bandeira->id;
            $this->nome = $bandeira->nome;
            $this->grupoEconomicoId = $bandeira->grupo_economico_id;
        }

        $gruposEconomicos = GrupoEconomico::all();
        return view('livewire.bandeira-form', [
            'bandeiraId' => $this->bandeiraId ?? null,
            'nome' => $this->nome ?? null,
            'grupoEconomicoId' => $this->grupo_economico_id ?? null,
            'gruposEconomicos' => $gruposEconomicos,
        ]);
    }
}
