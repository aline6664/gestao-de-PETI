<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projetos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao')->nullable();

            $table->enum('status', [
                'Pendente',
                'Planejado',
                'Em andamento',
                'Cancelado',
                'Concluído',
            ])->default('Planejado');

            $table->date('data_inicio')->nullable();
            $table->date('data_fim_prevista')->nullable();
            $table->date('data_fim_real')->nullable();

            $table->unsignedTinyInteger('percentual_concluido')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projetos');
    }
};