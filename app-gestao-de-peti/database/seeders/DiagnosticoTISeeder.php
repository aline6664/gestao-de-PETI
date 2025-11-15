<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DiagnosticoTI;
use App\Models\Empresa;

class DiagnosticoTISeeder extends Seeder
{
    public function run(): void
    {
        DiagnosticoTI::create([
            // SWOT
            'forcas' => "• Equipe de TI qualificada  
            • Boa infraestrutura de servidores  
            • Cultura interna aberta a inovação",

            'fraquezas' => "• Processos pouco documentados  
            • Baixa automação de rotinas  
            • Falta de padronização nas ferramentas utilizadas",

            'oportunidades' => "• Adoção de computação em nuvem  
            • Crescimento da empresa exige mais tecnologia  
            • Possibilidade de parcerias com fornecedores",

            'ameacas' => "• Ataques cibernéticos cada vez mais sofisticados  
            • Concorrentes investindo pesado em TI  
            • Dependência de sistemas legados",

            // Maturidade
            'nivel_maturidade' => 'Inicial / Baixa',

            // Recursos de TI
            'recursos_ti' => "• 12 computadores  
            • 2 servidores físicos  
            • Sistemas internos próprios  
            • Internet dedicada de 300 Mbps  
            • Firewall básico e antivírus corporativo",

            // Riscos identificados
            'riscos' => "• Falha de segurança por falta de monitoramento  
            • Risco de indisponibilidade por infraestrutura antiga  
            • Processos sem backup adequado",
        ]);
    }
}
