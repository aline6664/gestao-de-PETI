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
        Schema::create('diagnosticos_ti', function (Blueprint $table) {
            $table->id();

            // SWOT agora em JSON
            $table->json('forcas')->nullable();
            $table->json('fraquezas')->nullable();
            $table->json('oportunidades')->nullable();
            $table->json('ameacas')->nullable();

            // Maturidade
            $table->string('nivel_maturidade')->nullable();

            // Recursos e riscos também em JSON
            $table->json('recursos_ti')->nullable();
            $table->json('riscos')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnosticos_ti');
    }
};
