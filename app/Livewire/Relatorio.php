<?php

namespace App\Livewire;

use App\Exports\ColaboradoresExport;
use Livewire\Component;
use App\Models\Colaborador;
use App\Models\Unidade;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Relatorio extends Component
{
    use WithPagination;

    public $unidade_id;
    public $data_inicio;
    public $data_fim;

    protected $queryString = [
        'unidade_id' => ['except' => ''],
        'data_inicio' => ['except' => ''],
        'data_fim' => ['except' => ''],
    ];

    public function filtrar()
    {
        $this->resetPage();
    }

    public function exportar()
    {
        return Excel::download(new ColaboradoresExport, 'colaboradores.xlsx');
    }

    public function render()
    {
        $colaboradores = Colaborador::query()
            ->when($this->unidade_id, fn($query) => $query->where('unidade_id', $this->unidade_id))
            ->when($this->data_inicio, fn($query) => $query->where('created_at', '>=', $this->data_inicio))
            ->when($this->data_fim, fn($query) => $query->where('created_at', '<=', $this->data_fim))
            ->paginate(10);

        $unidades = Unidade::all();

        return view('livewire.relatorio', compact('colaboradores', 'unidades'));
    }
}
