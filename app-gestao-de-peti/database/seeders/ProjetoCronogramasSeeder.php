<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Projeto;
use App\Models\ProjetoCronograma;

class ProjetoCronogramasSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Projeto::all() as $projeto) {
            ProjetoCronograma::insert([
                [
                    'projeto_id' => $projeto->id,
                    'etapa' => 'Levantamento de requisitos',
                    'data_inicio' => now()->subDays(20),
                    'data_fim' => now()->subDays(10),
                    'status' => 'Concluído',
                ],
                [
                    'projeto_id' => $projeto->id,
                    'etapa' => 'Implementação',
                    'data_inicio' => now()->subDays(9),
                    'data_fim' => now()->addDays(20),
                    'status' => 'Em andamento',
                ],
                [
                    'projeto_id' => $projeto->id,
                    'etapa' => 'Validação final',
                    'data_inicio' => now()->addDays(21),
                    'data_fim' => now()->addDays(40),
                    'status' => 'Pendente',
                ],
            ]);
        }
    }
}