<?php

use iEducar\Legacy\Model;

class clsModulesComponenteMinistradoConteudoAee extends Model
{
    public $id;
    public $conteudo_ministrado_aee_id;
    public $planejamento_aula_conteudo_aee_id;

    public function __construct(
        $id = null,
        $conteudo_ministrado_aee_id = null,
        $planejamento_aula_conteudo_aee_id = null
    ) {
        $this->_schema = 'modules.';
        $this->_tabela = "{$this->_schema}conteudo_ministrado_conteudo_aee";

        $this->_from = '
            modules.conteudo_ministrado_conteudo_aee as cmc
        ';

        $this->_campos_lista = $this->_todos_campos = '
            *
        ';

        if (is_numeric($id)) {
            $this->id = $id;
        }

        if (is_numeric($conteudo_ministrado_aee_id)) {
            $this->conteudo_ministrado_aee_id = $conteudo_ministrado_aee_id;
        }

        if (is_numeric($planejamento_aula_conteudo_aee_id)) {
            $this->planejamento_aula_conteudo_aee_id = $planejamento_aula_conteudo_aee_id;
        }
    }

    /**
     * Cria um novo registro.
     *
     * @return bool
     */
    public function cadastra()
    {
        if (is_numeric($this->conteudo_ministrado_aee_id) && is_numeric($this->planejamento_aula_conteudo_aee_id)) {
            $db = new clsBanco();
            $campos = '';
            $valores = '';
            $gruda = '';

            $campos .= "{$gruda}conteudo_ministrado_aee_id";
            $valores .= "{$gruda}'{$this->conteudo_ministrado_aee_id}'";
            $gruda = ', ';

            $campos .= "{$gruda}planejamento_aula_conteudo_aee_id";
            $valores .= "{$gruda}'{$this->planejamento_aula_conteudo_aee_id}'";
            $gruda = ', ';

            $campos .= "{$gruda}updated_at";
            $valores .= "{$gruda}(NOW() - INTERVAL '3 HOURS')";
            $gruda = ', ';

            $db->Consulta("
                INSERT INTO
                    {$this->_tabela} ( $campos )
                    VALUES ( $valores )
            ");

            return true;
        }

        return false;
    }

    /**
     * Lista relacionamentos entre os conteudos e o plano de aula.
     *
     * @return array
     */
    public function lista($conteudo_ministrado_aee_id)
    {
        if (is_numeric($conteudo_ministrado_aee_id)) {
            $db = new clsBanco();
            $db->Consulta("
                SELECT
                    *
                FROM
                    modules.conteudo_ministrado_conteudo_aee as cmc
                WHERE
                    cmc.conteudo_ministrado_aee_id = '{$conteudo_ministrado_aee_id}'
            ");

            while ($db->ProximoRegistro()) {
                $cmc = $db->Tupla();

                $obj = new clsModulesPlanejamentoAulaConteudoAee($cmc['planejamento_aula_conteudo_aee_id']);
                $cmc['planejamento_aula_conteudo_aee'] = $obj->detalhe();

                $conteudos[] = $cmc;
            }

            return $conteudos;
        }

        return false;
    }

    /**
     * Lista relacionamentos entre os conteudos e o plano de aula.
     *
     * @return array
     */
    public function lista_conteudos($conteudo_ministrado_aee_id)
    {
        if (is_numeric($conteudo_ministrado_aee_id)) {
            $db = new clsBanco();

            $db->Consulta("
            SELECT
            pac.id,
            pac.conteudo
        FROM
            modules.conteudo_ministrado_aee as cm
        JOIN modules.conteudo_ministrado_conteudo_aee as cmc
            ON (cmc.conteudo_ministrado_aee_id = cm.id)
        JOIN modules.planejamento_aula_conteudo_aee as pac
            ON (pac.id = cmc.planejamento_aula_conteudo_aee_id)
        JOIN modules.planejamento_aula_aee as pa
            ON (pa.id = pac.planejamento_aula_aee_id)
        WHERE
            cm.id = '{$conteudo_ministrado_aee_id}'
                ORDER BY cmc.id ASC
            ");

            while ($db->ProximoRegistro()) {
                $conteudos[] = $db->Tupla();
            }

            return $conteudos;
        }

        return false;
    }

    /**
     * Retorna um array com os dados de um registro.
     *
     * @return array
     */
    public function detalhe()
    {
        $data = [];

        if (is_numeric($this->id)) {
            $db = new clsBanco();
            $db->Consulta("
                SELECT
                    {$this->_todos_campos}
                FROM
                    {$this->_from}
                WHERE
                    cmc.id = {$this->id}
            ");

            $db->ProximoRegistro();
            $data = $db->Tupla();

            return $data;
        }

        return false;
    }

    /**
     * Retorna um array com os dados de um registro.
     *
     * @return array
     */
    public function existe()
    {
        return false;
    }

    /**
     * Exclui um registro.
     *
     * @return bool
     */
    public function excluir()
    {
        if (is_numeric($this->conteudo_ministrado_aee_id)) {
            $db = new clsBanco();

            $db->Consulta("
                DELETE FROM
                    {$this->_tabela}
                WHERE
                conteudo_ministrado_aee_id = '{$this->conteudo_ministrado_aee_id}' 
            ");

            return true;
        }

        return false;
    }

    /**
     * Retorna array com duas arrays, uma com os conteúdos a serem cadastrados e a outra com os que devem ser removidos.
     *
     * @return array
     */
    public function retornaDiferencaEntreConjuntosConteudos($atuaisConteudos, $novosConteudos)
    {
        $resultado = [];
        $resultado['adicionar'] = $novosConteudos;

        for ($i = 0; $i < count($atuaisConteudos); ++$i) {
            $resultado['remover'][] = $atuaisConteudos[$i]['planejamento_aula_conteudo_aee_id'];
        }
        $atuaisConteudos = $resultado['remover'];

        for ($i = 0; $i < count($novosConteudos); ++$i) {
            $novo = $novosConteudos[$i];

            for ($j = 0; $j < count($atuaisConteudos); ++$j) {
                $atual = $atuaisConteudos[$j];

                if ($novo == $atual) {
                    unset($resultado['adicionar'][$i]);
                    unset($resultado['remover'][$j]);
                }
            }
        }

        return $resultado;
    }

    /**
     * Retorna array com registro(s) de aula com ligação com o conteúdo informado, no caso de ausência, vazio.
     *
     * @return array
     */
    public function existeLigacaoRegistroAula($planejamento_aula_conteudos_ids)
    {
        if (is_array($planejamento_aula_conteudos_ids) && count($planejamento_aula_conteudos_ids) > 0) {
            $data = [];

            $db = new clsBanco();

            $sql = '
                SELECT DISTINCT
                    conteudo_ministrado_aee_id as id,
                    cm.ref_cod_matricula
                FROM
                    modules.conteudo_ministrado_conteudo_aee as cmc
                INNER JOIN modules.conteudo_ministrado_aee cm
                    ON cm.id = cmc.conteudo_ministrado_aee_id
            ';

            $whereAnd = ' WHERE';

            foreach ($planejamento_aula_conteudos_ids as $key => $planejamento_aula_conteudo_aee_id) {
                if (empty($planejamento_aula_conteudo_aee_id)) {
                    continue;
                }
                $sql .= "{$whereAnd} cmc.planejamento_aula_conteudo_aee_id = {$planejamento_aula_conteudo_aee_id}";
                $whereAnd = ' OR';
            }

            $db->Consulta($sql);

            while ($db->ProximoRegistro()) {
                $data[] = [
                    'id' => $db->Campo('id'),
                    'ref_cod_matricula' => $db->Campo('ref_cod_matricula'),
                ];
            }

            return $data;
        }

        return [];
    }
}
