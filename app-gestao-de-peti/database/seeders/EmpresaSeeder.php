<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empresa;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Empresa::create([
            'nome_empresa' => 'MBATEC Tecnologia LTDA',
            'cnpj' => '00.000.000/0001-00',
            'endereco' => 'Rua Exemplo, 123',
            'cidade' => 'São Paulo',
            'estado' => 'SP',
            'telefone' => '(11) 99999-9999',
            'email_contato' => 'contato@mbatec.com.br',
            'missao' => 'Oferecer soluções de TI inovadoras.',
            'visao' => 'Ser referência em tecnologia e gestão de TI.',
            'valores' => 'Inovação, Ética, Excelência',
        ]);
    }    
}
