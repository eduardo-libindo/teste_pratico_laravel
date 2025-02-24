<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\GrupoEconomico;
use App\Models\Bandeira;
use Tests\TestCase;

class BandeiraTest extends TestCase
{
    use RefreshDatabase;

    public function test_criar_bandeira()
    {
        $grupo = GrupoEconomico::factory()->create();

        $response = $this->postJson('/api/bandeira', [
            'nome' => 'Bandeira Teste',
            'grupo_economico_id' => $grupo->id,
        ]);

        $response->assertStatus(201)
            ->assertJson(['nome' => 'Bandeira Teste']);
    }

    public function test_atualizar_bandeira()
    {
        $grupo = GrupoEconomico::factory()->create();
        $bandeira = Bandeira::factory()->create(['grupo_economico_id' => $grupo->id]);

        $response = $this->putJson("/api/bandeira/{$bandeira->id}", [
            'nome' => 'Bandeira Atualizada',
            'grupo_economico_id' => $grupo->id,
        ]);

        $response->assertStatus(200)
            ->assertJson(['nome' => 'Bandeira Atualizada']);
    }

    public function test_deletar_bandeira()
    {
        $grupo = GrupoEconomico::factory()->create();
        $bandeira = Bandeira::factory()->create(['grupo_economico_id' => $grupo->id]);

        $response = $this->deleteJson("/api/bandeira/{$bandeira->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('bandeira', ['id' => $bandeira->id]);
    }
}
