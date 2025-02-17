<?php

return new class extends clsCadastro {
    /**
     * Referencia pega da session para o idpes do usuario atual
     *
     * @var int
     */
    public $pessoa_logada;

    public $cod_escola_rede_ensino;
    public $ref_usuario_exc;
    public $ref_usuario_cad;
    public $nm_rede;
    public $data_cadastro;
    public $data_exclusao;
    public $ativo;
    public $ref_cod_instituicao;

    public function Inicializar()
    {
        $retorno = 'Novo';

        $this->cod_escola_rede_ensino=$_GET['cod_escola_rede_ensino'];

        $obj_permissoes = new clsPermissoes();
        $obj_permissoes->permissao_cadastra(647, $this->pessoa_logada, 3, 'educar_escola_rede_ensino_lst.php');
        $this->nome_url_cancelar = 'Cancelar';
        $this->script_cancelar = 'window.parent.fechaExpansivel("div_dinamico_"+(parent.DOM_divs.length-1));';

        return $retorno;
    }

    public function Gerar()
    {
        $this->campoOculto('cod_escola_rede_ensino', $this->cod_escola_rede_ensino);
        $this->campoOculto('ref_cod_instituicao', $this->ref_cod_instituicao);
        $this->campoTexto('nm_rede', 'Rede Ensino', $this->nm_rede, 30, 255, true);
    }

    public function Novo()
    {
        $obj_permissoes = new clsPermissoes();
        $obj_permissoes->permissao_cadastra(647, $this->pessoa_logada, 3, 'educar_escola_rede_ensino_lst.php');

        $obj = new clsPmieducarEscolaRedeEnsino(null, null, $this->pessoa_logada, $this->nm_rede, null, null, 1, $this->ref_cod_instituicao);
        $cadastrou = $obj->cadastra();
        if ($cadastrou) {
            echo "<script>
                        parent.document.getElementById('ref_cod_escola_rede_ensino').options[parent.document.getElementById('ref_cod_escola_rede_ensino').options.length] = new Option('$this->nm_rede', '$cadastrou', false, false);
                        parent.document.getElementById('ref_cod_escola_rede_ensino').value = '$cadastrou';
                        parent.document.getElementById('ref_cod_escola_rede_ensino').disabled = false;
                        window.parent.fechaExpansivel('div_dinamico_'+(parent.DOM_divs.length-1));
                    </script>";

            die();

            return true;
        }

        $this->mensagem = 'Cadastro não realizado.<br>';

        return false;
    }

    public function Editar()
    {
    }

    public function Excluir()
    {
    }

    public function makeExtra()
    {
        return file_get_contents(__DIR__ . '/scripts/extra/educar-escola-localizacao-cad-pop.js');
    }

    public function Formular()
    {
        $this->title = 'Escola Rede Ensino';
        $this->processoAp = '647';
        $this->renderMenu = false;
        $this->renderMenuSuspenso = false;
    }
};
