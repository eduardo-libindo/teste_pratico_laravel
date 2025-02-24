<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Unidade;
use App\Models\Colaborador;
use Tests\TestCase;

class ColaboradorTest extends TestCase
{
    use RefreshDatabase;

    public function test_criar_colaborador()
    {
        $unidade = Unidade::factory()->create();

        $response = $this->postJson('/api/colaborador', [
            'nome' => 'Colaborador Teste',
            'email' => 'colaborador@teste.com',
            'cpf' => '01234567890',
            'unidade_id' => $unidade->id,
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'nome' => 'Colaborador Teste',
                'email' => 'colaborador@teste.com',
                'cpf' => '01234567890',
            ]);
    }

    public function test_atualizar_colaborador()
    {
        $unidade = Unidade::factory()->create();
        $colaborador = Unidade::factory()->create(['unidade_id' => $unidade->id]);

        $response = $this->putJson("/api/colaborador/{$colaborador->id}", [
            'nome' => 'Colaborador Atualizado',
            'email' => 'colaborador@atualizado.com',
            'cpf' => '09876543210',
            'unidade_id' => $unidade->id,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'nome' => 'Colaborador Atualizado',
                'email' => 'colaborador@atualizado.com',
                'cpf' => '09876543210',
            ]);
    }

    public function test_deletar_colaborador()
    {
        $unidade = Unidade::factory()->create();
        $colaborador = Unidade::factory()->create(['unidade_id' => $unidade->id]);

        $response = $this->deleteJson("/api/colaborador/{$colaborador->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('colaborador', ['id' => $colaborador->id]);
    }
}
