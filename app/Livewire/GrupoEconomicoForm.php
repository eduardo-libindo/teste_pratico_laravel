<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GrupoEconomico;

class GrupoEconomicoForm extends Component
{
    public $nome;
    public $grupoEconomicoId;

    #[Url]
    public $id = null;

    protected $rules = [
        'nome' => 'required|string|max:255',
    ];

    public function save()
    {
        $this->validate([
            'nome' => 'required',
        ]);

        if ($this->id != null) {
            // Atualizar
            $grupoEconomico = GrupoEconomico::find($this->id);
            $grupoEconomico->update(['nome' => $this->nome]);
        } else {
            // Criar
            GrupoEconomico::create(['nome' => $this->nome]);
        }

        $this->reset(['nome', 'grupoEconomicoId']);
        session()->flash('message', $this->id != null ? 'Grupo Econômico atualizado com sucesso!' : 'Grupo Econômico criado com sucesso!');

        return redirect()->route('grupo-economico.index');
    }

    public function render()
    {
        // Busca o grupo econômico apenas se o ID estiver presente
        $grupoEconomico = $this->id ? GrupoEconomico::find($this->id) : null;

        // Se o grupo econômico for encontrado, atualiza as propriedades
        if ($grupoEconomico) {
            $this->grupoEconomicoId = $grupoEconomico->id;
            $this->nome = $grupoEconomico->nome;
        }

        // Retorna a view com os dados atualizados
        return view('livewire.grupo-economico-form', [
            'grupoEconomicoId' => $this->grupoEconomicoId ?? null,
            'nome' => $this->nome ?? null,
        ]);
    }
}
