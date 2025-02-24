<?php

namespace App\Exports;

use App\Models\Colaborador;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ColaboradoresExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Colaborador::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nome',
            'Email',
            'CPF',
            'UnidadeId',
            'Nome Fantasia da Unidade',
            'Data de Criação',
            'Ultima Atualizacao',
        ];
    }

    /**
     * @var Customer $customer
     * @return array
     */
    public function map($colaborador): array
    {
        return [
            $colaborador->id,
            $colaborador->nome,
            $colaborador->email,
            $colaborador->cpf,
            $colaborador->unidade->id,
            $colaborador->unidade->nome_fantasia,
            $colaborador->created_at->format('d/m/Y H:i:s'),
            $colaborador->updated_at->format('d/m/Y H:i:s'),
        ];
    }
}
