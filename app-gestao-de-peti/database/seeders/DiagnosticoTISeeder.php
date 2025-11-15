<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DiagnosticoTI;

class DiagnosticoTISeeder extends Seeder
{
    public function run(): void
    {
        DiagnosticoTI::create([
            // SWOT
            'forcas' => [
                "Equipe de TI qualificada",
                "Boa infraestrutura de servidores",
                "Cultura interna aberta à inovação",
                "Processos de TI alinhados ao negócio"
            ],

            'fraquezas' => [
                "Processos pouco documentados",
                "Baixa automação de rotinas",
                "Dependência de sistemas antigos"
            ],

            'oportunidades' => [
                "Adoção de computação em nuvem",
                "Crescimento da empresa exige mais tecnologia",
                "Possibilidade de parcerias com fornecedores de TI"
            ],

            'ameacas' => [
                "Ataques cibernéticos cada vez mais sofisticados",
                "Concorrência investindo forte em tecnologia",
                "Risco de indisponibilidade por infraestrutura antiga"
            ],

            'nivel_maturidade' => 'Inicial',

            'recursos_ti' => [
                "12 computadores",
                "2 servidores físicos",
                "Sistema interno próprio",
                "Internet dedicada de 300 Mbps",
                "Firewall corporativo",
                "Antivírus empresarial"
            ],

            'riscos' => [
                "Falta de monitoramento contínuo",
                "Backup insuficiente",
                "Dependência de ferramentas sem contrato de suporte"
            ]
        ]);
    }
}