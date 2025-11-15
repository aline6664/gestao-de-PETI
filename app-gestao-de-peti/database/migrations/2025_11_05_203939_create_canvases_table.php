<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('canvases', function (Blueprint $table) {
            $table->id();
            $table->json('proposta_valor')->nullable();
            $table->json('segmentos_clientes')->nullable();
            $table->json('canais_distribuicao')->nullable();
            $table->json('relacionamento_clientes')->nullable();
            $table->json('fontes_receita')->nullable();
            $table->json('recursos_chave')->nullable();
            $table->json('atividades_chave')->nullable();
            $table->json('parcerias_chave')->nullable();
            $table->json('estrutura_custos')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('canvases');
    }
};
