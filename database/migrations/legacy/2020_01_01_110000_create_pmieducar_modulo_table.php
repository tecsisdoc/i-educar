<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePmieducarModuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
            '
                CREATE SEQUENCE pmieducar.modulo_cod_modulo_seq
                    START WITH 0
                    INCREMENT BY 1
                    MINVALUE 0
                    NO MAXVALUE
                    CACHE 1;

                CREATE TABLE pmieducar.modulo (
                    cod_modulo integer DEFAULT nextval(\'pmieducar.modulo_cod_modulo_seq\'::regclass) NOT NULL,
                    ref_usuario_exc integer,
                    ref_usuario_cad integer NOT NULL,
                    nm_tipo character varying(255) NOT NULL,
                    descricao text,
                    num_meses numeric(2,0) DEFAULT NULL::numeric,
                    num_semanas integer,
                    data_cadastro timestamp without time zone NOT NULL,
                    data_exclusao timestamp without time zone,
                    ativo smallint DEFAULT (1)::smallint NOT NULL,
                    ref_cod_instituicao integer NOT NULL,
                    num_etapas numeric(2,0) DEFAULT 0 NOT NULL
                );

                ALTER TABLE ONLY pmieducar.modulo
                    ADD CONSTRAINT modulo_pkey PRIMARY KEY (cod_modulo);

                SELECT pg_catalog.setval(\'pmieducar.modulo_cod_modulo_seq\', 1, true);
            '
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pmieducar.modulo');

        DB::unprepared('DROP SEQUENCE pmieducar.modulo_cod_modulo_seq;');
    }
}
