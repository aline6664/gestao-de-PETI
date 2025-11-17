<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Projeto;

class ProjetosSeeder extends Seeder
{
    public function run(): void
    {        
        Projeto::insert([
            [
                'nome' => 'Implementação do Novo Sistema de Vendas',
                'descricao' => 'Projeto para substituir o sistema atual por uma solução moderna integrada.',
                'status' => 'Em andamento',
                'percentual_concluido' => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Modernização da Infraestrutura de TI',
                'descricao' => 'Atualização dos servidores e migração para ambiente virtualizado.',
                'status' => 'Pendente',
                'percentual_concluido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Criação do Novo Website Institucional',
                'descricao' => 'Novo portal institucional com SEO e área de login.',
                'status' => 'Concluído',
                'percentual_concluido' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}