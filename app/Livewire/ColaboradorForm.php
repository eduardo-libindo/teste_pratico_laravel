<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Colaborador;
use App\Models\Unidade;

class ColaboradorForm extends Component
{

    public $nome;
    public $email;
    public $cpf;
    public $colaboradorId;
    public $unidadeId;

    #[Url]
    public $id = null;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'cpf' => 'required|string|max:11',
        'unidadeId' => 'required|exists:unidades,id',
    ];

    public function save()
    {
        $this->validate([
            'nome' => 'required',
            'email' => 'required',
            'cpf' => 'required',
            'unidadeId' => 'required',
        ]);

        if ($this->id != null) {
            // Atualizar
            $colaborador = Colaborador::find($this->id);
            $colaborador->update([
                'nome' => $this->nome,
                'email' => $this->email,
                'cpf' => $this->cpf,
                'unidade_id' => $this->unidadeId,
            ]);
        } else {
            // Criar
            Colaborador::create([
                'nome' => $this->nome,
                'email' => $this->email,
                'cpf' => $this->cpf,
                'unidade_id' => $this->unidadeId,
            ]);
        }

        $this->reset(['nome', 'email', 'cpf', 'colaboradorId', 'unidadeId']);
        session()->flash('message', $this->id != null ? 'Colaborador atualizado com sucesso!' : 'Colaborador criado com sucesso!');

        return redirect()->route('colaborador.index');
    }

    public function render()
    {
        // Busca o colaborador apenas se o ID estiver presente
        $colaborador = $this->id ? Colaborador::find($this->id) : null;

        // Se o colaborador for encontrado, atualiza as propriedades
        if ($colaborador) {
            $this->colaboradorId = $colaborador->id;
            $this->nome = $colaborador->nome;
            $this->email = $colaborador->email;
            $this->cpf = $colaborador->cpf;
            $this->unidadeId = $colaborador->unidade_id;
        }

        $unidades = Unidade::all();
        return view('livewire.colaborador-form', [
            'colaboradorId' => $this->colaboradorId ?? null,
            'nome' => $this->nome ?? null,
            'email' => $this->email ?? null,
            'cpf' => $this->cpf ?? null,
            'unidadeId' => $this->unidade_id ?? null,
            'unidades' => $unidades,
        ]);
    }
}
