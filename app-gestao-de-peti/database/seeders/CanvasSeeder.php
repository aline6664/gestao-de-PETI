<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Canvas;

class CanvasSeeder extends Seeder
{
    public function run()
    {
        Canvas::create([
            'proposta_valor' => [
                "Soluções rápidas",
                "Atendimento especializado"
            ],
            'segmentos_clientes' => [
                "Empresas de pequeno porte",
                "Lojas online"
            ],
            'canais_distribuicao' => [
                "Website",
                "Consultoria presencial"
            ],
            'relacionamento_clientes' => [
                "Suporte 24h",
                "Consultoria agendada"
            ],
            'fontes_receita' => [
                "Assinatura de serviços",
                "Projetos específicos"
            ],
            'recursos_chave' => [
                "Equipe de TI",
                "Sistema de automação"
            ],
            'atividades_chave' => [
                "Manutenção",
                "Suporte"
            ],
            'parcerias_chave' => [
                "Fornecedores de hardware"
            ],
            'estrutura_custos' => [
                "Licenças",
                "Infraestrutura"
            ],
        ]);
    }
}