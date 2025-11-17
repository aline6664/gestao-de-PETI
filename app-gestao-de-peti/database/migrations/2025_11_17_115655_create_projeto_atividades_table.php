<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projeto_atividades', function (Blueprint $table) {
            $table->id();

            $table->foreignId('projeto_id') // pertence a um projeto
                  ->constrained('projetos')
                  ->cascadeOnDelete(); // deletado junto com o projeto

            $table->string('titulo');
            $table->text('descricao')->nullable();

            $table->enum('status', [
                'Pendente',
                'Em andamento',
                'Concluída',
                'Cancelada'
            ])->default('Pendente');

            $table->string('responsavel')->nullable();

            $table->date('data_inicio')->nullable();
            $table->date('data_fim_prevista')->nullable();
            $table->date('data_fim_real')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projeto_atividades');
    }
};