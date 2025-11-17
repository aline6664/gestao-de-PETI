<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projeto_metas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('projeto_id') // pertence a um projeto
                  ->constrained('projetos')
                  ->cascadeOnDelete();

            $table->string('descricao');
            $table->string('criterio_sucesso')->nullable();

            $table->enum('status', [
                'Em andamento',
                'Atingida',
                'Não atingida'
            ])->default('Em andamento');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projeto_metas');
    }
};