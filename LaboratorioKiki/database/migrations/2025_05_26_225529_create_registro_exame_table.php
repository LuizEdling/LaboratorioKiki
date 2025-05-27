<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a migration.
     */
    public function up(): void
    {
        Schema::create('registro_exame', function (Blueprint $tabela) {
            $tabela->id('exame_id');
            $tabela->string('paciente', 100);
            $tabela->enum('tipo', ['Sequenciamento', 'PCR', 'Microarray']);
            $tabela->date('data_coleta');
            $tabela->string('laudo', 500)->nullable();
            $tabela->timestamps();
        });
    }

    /**
     * Reverte a migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('exame');
    }
};
