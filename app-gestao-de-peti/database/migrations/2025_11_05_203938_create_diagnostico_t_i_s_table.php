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
            $table->text('forcas')->nullable();
            $table->text('fraquezas')->nullable();
            $table->text('oportunidades')->nullable();
            $table->text('ameacas')->nullable();
            $table->string('nivel_maturidade')->nullable();
            $table->text('recursos_ti')->nullable();
            $table->text('riscos')->nullable();
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
