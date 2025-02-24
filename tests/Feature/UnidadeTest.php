<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Bandeira;
use App\Models\Unidade;
use Tests\TestCase;

class UnidadeTest extends TestCase
{
    use RefreshDatabase;

    public function test_criar_unidade()
    {
        $bandeira = Bandeira::factory()->create();

        $response = $this->postJson('/api/unidade', [
            'nome_fantasia' => 'Unidade Teste',
            'razao_social' => 'Unidade Teste',
            'cnpj' => '01234567891011',
            'bandeira_id' => $bandeira->id,
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'nome_fantasia' => 'Unidade Teste',
                'razao_social' => 'Unidade Teste',
                'cnpj' => '01234567891011',
        ]);
    }

    public function test_atualizar_unidade()
    {
        $bandeira = Bandeira::factory()->create();
        $unidade = Unidade::factory()->create(['bandeira_id' => $bandeira->id]);

        $response = $this->putJson("/api/unidade/{$unidade->id}", [
            'nome_fantasia' => 'Unidade Atualizada',
            'razao_social' => 'Unidade Atualizada',
            'cnpj' => '11019876543210',
            'bandeira_id' => $bandeira->id,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'nome_fantasia' => 'Unidade Atualizada',
                'razao_social' => 'Unidade Atualizada',
                'cnpj' => '11019876543210',
            ]);
    }

    public function test_deletar_unidade()
    {
        $bandeira = Bandeira::factory()->create();
        $unidade = Unidade::factory()->create(['bandeira_id' => $bandeira->id]);

        $response = $this->deleteJson("/api/unidade/{$unidade->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('unidade', ['id' => $unidade->id]);
    }
}
