<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysInCadastroFisicaRacaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cadastro.fisica_raca', function (Blueprint $table) {
            $table->foreign('ref_idpes')
                ->references('idpes')
                ->on('cadastro.fisica')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->foreign('ref_cod_raca')
                ->references('cod_raca')
                ->on('cadastro.raca')
                ->onUpdate('restrict')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cadastro.fisica_raca', function (Blueprint $table) {
            $table->dropForeign(['ref_idpes']);
            $table->dropForeign(['ref_cod_raca']);
        });
    }
}
