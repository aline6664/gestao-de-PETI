<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome_empresa' => $this->faker->company(),
            'cnpj' => $this->faker->numerify('##.###.###/####-##'),
            'endereco' => $this->faker->streetAddress(),
            'cidade' => $this->faker->city(),
            'estado' => $this->faker->stateAbbr(),
            'telefone' => $this->faker->phoneNumber(),
            'email_contato' => $this->faker->companyEmail(),
            'missao' => $this->faker->sentence(8),
            'visao' => $this->faker->sentence(10),
            'valores' => $this->faker->words(3, true),
        ];
    }
}
