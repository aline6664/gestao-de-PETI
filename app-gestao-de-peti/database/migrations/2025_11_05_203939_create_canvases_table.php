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
            $table->text('proposta_valor')->nullable();
            $table->text('segmentos_clientes')->nullable();
            $table->text('canais_distribuicao')->nullable();
            $table->text('relacionamento_clientes')->nullable();
            $table->text('fontes_receita')->nullable();
            $table->text('recursos_chave')->nullable();
            $table->text('atividades_chave')->nullable();
            $table->text('parcerias_chave')->nullable();
            $table->text('estrutura_custos')->nullable();
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
