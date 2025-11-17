<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projeto_indicadores', function (Blueprint $table) {
            $table->id();

            $table->foreignId('projeto_id') // pertence a um projeto
                  ->constrained('projetos')
                  ->cascadeOnDelete();

            $table->string('nome');
            $table->decimal('valor_atual', 10, 2)->default(0);
            $table->decimal('valor_meta', 10, 2)->nullable();

            $table->string('unidade')->nullable(); // %, R$, Dias, Nº…

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projeto_indicadores');
    }
};