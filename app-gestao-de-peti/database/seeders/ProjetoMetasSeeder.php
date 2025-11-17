<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Projeto;
use App\Models\ProjetoMeta;

class ProjetoMetasSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Projeto::all() as $projeto) {
            ProjetoMeta::insert([
                [
                    'projeto_id' => $projeto->id,
                    'meta' => 'Reduzir tempo de processamento em 50%.',
                    'status' => 'Em andamento',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'projeto_id' => $projeto->id,
                    'meta' => 'Automatizar 80% dos relatórios internos.',
                    'status' => 'Pendente',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}