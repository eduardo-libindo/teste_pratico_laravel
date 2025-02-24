<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Unidade;
use App\Models\Bandeira;

class UnidadeForm extends Component
{

    public $nome_fantasia;
    public $razao_social;
    public $cnpj;
    public $unidadeId;
    public $bandeiraId;

    #[Url]
    public $id = null;

    protected $rules = [
        'nome_fantasia' => 'required|string|max:255',
        'razao_social' => 'required|string|max:255',
        'cnpj' => 'required|string|max:14',
        'bandeiraId' => 'required|exists:bandeiras,id',
    ];

    public function save()
    {
        $this->validate([
            'nome_fantasia' => 'required',
            'razao_social' => 'required',
            'cnpj' => 'required',
            'bandeiraId' => 'required',
        ]);

        if ($this->id != null) {
            // Atualizar
            $unidade = Unidade::find($this->id);
            $unidade->update([
                'nome_fantasia' => $this->nome_fantasia,
                'razao_social' => $this->razao_social,
                'cnpj' => $this->cnpj,
                'bandeira_id' => $this->bandeiraId,
            ]);
        } else {
            // Criar
            Unidade::create([
                'nome_fantasia' => $this->nome_fantasia,
                'razao_social' => $this->razao_social,
                'cnpj' => $this->cnpj,
                'bandeira_id' => $this->bandeiraId,
            ]);
        }

        $this->reset(['nome_fantasia', 'razao_social', 'cnpj', 'unidadeId', 'bandeiraId']);
        session()->flash('message', $this->id != null ? 'Unidade atualizada com sucesso!' : 'Unidade criada com sucesso!');

        return redirect()->route('unidade.index');
    }

    public function render()
    {
        // Busca a unidade apenas se o ID estiver presente
        $unidade = $this->id ? Unidade::find($this->id) : null;

        // Se a unidade for encontrado, atualiza as propriedades
        if ($unidade) {
            $this->unidadeId = $unidade->id;
            $this->nome_fantasia = $unidade->nome_fantasia;
            $this->razao_social = $unidade->razao_social;
            $this->cnpj = $unidade->cnpj;
            $this->bandeiraId = $unidade->bandeira_id;
        }

        $bandeiras = Bandeira::all();
        return view('livewire.unidade-form', [
            'unidadeId' => $this->unidadeId ?? null,
            'nome_fantasia' => $this->nome_fantasia ?? null,
            'razao_social' => $this->razao_social ?? null,
            'cnpj' => $this->cnpj ?? null,
            'bandeiraId' => $this->bandeira_id ?? null,
            'bandeiras' => $bandeiras,
        ]);
    }
}
