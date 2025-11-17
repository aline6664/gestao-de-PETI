<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Projeto;
use App\Models\ProjetoIndicador;

class ProjetoIndicadoresSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Projeto::all() as $projeto) {
            ProjetoIndicador::insert([
                [
                    'projeto_id' => $projeto->id,
                    'nome' => 'Satisfação do usuário',
                    'valor_atual' => 75,
                    'meta' => 90,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'projeto_id' => $projeto->id,
                    'nome' => 'Tempo médio por tarefa',
                    'valor_atual' => 30,
                    'meta' => 20,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}