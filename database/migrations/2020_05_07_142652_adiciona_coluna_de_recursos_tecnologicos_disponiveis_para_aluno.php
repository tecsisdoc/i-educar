<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdicionaColunaDeRecursosTecnologicosDisponiveisParaAluno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('modules.moradia_aluno', function (Blueprint $table) {
            $table->json('recursos_tecnologicos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('modules.moradia_aluno', function (Blueprint $table) {
            $table->dropColumn('recursos_tecnologicos');
        });
    }
}
