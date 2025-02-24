<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Activitylog\Models\Activity;

class Auditoria extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    /**
     * Atualiza a quantidade de itens por página.
     */
    public function updatedPerPage()
    {
        $this->resetPage();
    }

    /**
     * Renderiza a view do componente.
     */
    public function render()
    {
        $logs = Activity::query()
            ->when($this->search, function ($query) {
                $query->where('description', 'like', '%' . $this->search . '%')
                    ->orWhere('properties', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.auditoria', [
            'logs' => $logs,
        ]);
    }
}
