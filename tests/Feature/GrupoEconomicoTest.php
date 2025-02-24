<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\GrupoEconomico;
use Tests\TestCase;

class GrupoEconomicoTest extends TestCase
{
    use RefreshDatabase;

    public function test_criar_grupo_economico()
    {
        $response = $this->postJson('/api/grupo-economico', [
            'nome' => 'Grupo Teste',
        ]);

        $response->assertStatus(201)
            ->assertJson(['nome' => 'Grupo Teste']);
    }

    public function test_atualizar_grupo_economico()
    {
        $grupo = GrupoEconomico::factory()->create();

        $response = $this->putJson("/api/grupo-economico/{$grupo->id}", [
            'nome' => 'Grupo Atualizado',
        ]);

        $response->assertStatus(200)
            ->assertJson(['nome' => 'Grupo Atualizado']);
    }

    public function test_deletar_grupo_economico()
    {
        $grupo = GrupoEconomico::factory()->create();

        $response = $this->deleteJson("/api/grupo-economico/{$grupo->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('grupo_economico', ['id' => $grupo->id]);
    }
}
