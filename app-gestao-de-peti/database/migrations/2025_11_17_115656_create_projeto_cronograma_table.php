<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projeto_cronograma', function (Blueprint $table) {
            $table->id();

            $table->foreignId('projeto_id') // pertence a um projeto
                  ->constrained('projetos')
                  ->cascadeOnDelete();

            $table->string('titulo');
            $table->date('data_inicio');
            $table->date('data_fim');


            $table->enum('status', [
                'Previsto',
                'Em andamento',
                'Concluído',
                'Atrasado'
            ])->default('Previsto');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projeto_cronograma');
    }
};