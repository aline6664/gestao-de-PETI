<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Projeto;
use App\Models\ProjetoAtividade;

class ProjetoAtividadesSeeder extends Seeder
{
    public function run(): void
    {
        $projetos = Projeto::all();

        foreach ($projetos as $projeto) {
            ProjetoAtividade::insert([
                [
                    'projeto_id' => $projeto->id,
                    'titulo' => 'Planejamento Inicial',
                    'descricao' => 'Definição do escopo e requisitos.',
                    'status' => 'Concluída',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'projeto_id' => $projeto->id,
                    'titulo' => 'Execução Técnica',
                    'descricao' => 'Desenvolvimento e testes.',
                    'status' => 'Em andamento',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'projeto_id' => $projeto->id,
                    'titulo' => 'Entrega e Validação',
                    'descricao' => 'Entrega ao cliente final.',
                    'status' => 'Pendente',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}