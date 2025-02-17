<?php

return new class extends clsListagem {
    /**
     * Referencia pega da session para o idpes do usuario atual
     *
     * @var int
     */
    public $pessoa_logada;

    /**
     * Titulo no topo da pagina
     *
     * @var int
     */
    public $titulo;

    /**
     * Quantidade de registros a ser apresentada em cada pagina
     *
     * @var int
     */
    public $limite;

    /**
     * Inicio dos registros a serem exibidos (limit)
     *
     * @var int
     */
    public $offset;

    public $data_inicial;
    public $data_final;

    public $etapa;
    public $fase_etapa;

    public function Gerar()
    {
        $this->titulo = 'Validação de Plano de aula - Listagem';

        foreach ($_GET as $var => $val) { // passa todos os valores obtidos no GET para atributos do objeto
            $this->$var = ($val === '') ? null: $val;
        }

        $lista_busca = [
            "<input type='checkbox' id='aulas_checkbox[]' style='margin-left: 0px;'></input>",
            'Data inicial',
            'Data final',
            'Turma',
            'S&eacute;rie',
            'Escola',
            'Etapa',
            'Componente Curricular',
            'Professor',
            'Ação'
        ];

        $this->addCabecalhos($lista_busca);

        if (!isset($_GET['busca'])) {
            $this->ano = date('Y');
        }

        $this->inputsHelper()->dynamic(['ano'], ['required' => false]);
        $this->inputsHelper()->dynamic(['instituicao', 'escola', 'curso', 'serie', 'turma'], ['required' => false]);
        $this->inputsHelper()->turmaTurno(['required' => false, 'label' => 'Turno']);
        $this->inputsHelper()->dynamic('componenteCurricular', ['required' => false]);
        $this->campoLista('bool_validacao', 'Validados', [ '1' => 'Não', '2' => 'Sim' ],  $this->bool_validacao,null, null, null, null, null, false);

        $this->campoQuebra();
        $this->campoRotulo('filtros_periodo', '<b>Filtros por período</b>');

        $this->inputsHelper()->dynamic(['dataInicial'], ['required' => false, 'value' => $this->data_inicial]);
        $this->inputsHelper()->dynamic(['dataFinal'], ['required' => false, 'value' => $this->data_final]);

        $this->campoQuebra();
        $this->campoRotulo('filtros_etapa', '<b>Filtros por etapa</b>');

        $this->inputsHelper()->dynamic(['faseEtapa'], ['required' => false, 'label' => 'Etapa']);

        // Paginador
        $this->limite = 20;
        $this->offset = ($_GET["pagina_{$this->nome}"]) ? $_GET["pagina_{$this->nome}"]*$this->limite-$this->limite: 0;

        $obj_plano = new clsModulesPlanejamentoAula();
        $obj_plano->setOrderby('data_inicial DESC');
        $obj_plano->setLimite($this->limite, $this->offset);

        if ($this->data_inicial && Portabilis_Date_Utils::validaData($this->data_inicial) || !$this->data_inicial) {
            $this->data_inicial = dataToBanco($this->data_inicial);
        } else {
            $temp_data_inicial = new DateTime('now');
            $this->data_inicial = dataToBanco($temp_data_inicial->format('d/m/Y'));
        }

        if ($this->data_final && Portabilis_Date_Utils::validaData($this->data_final) || !$this->data_final) {
            $this->data_final = dataToBanco($this->data_final);
        } else {
            $temp_data_final = new DateTime('now');
            $this->data_final = dataToBanco($temp_data_final->format('d/m/Y'));
        }

        $obj_servidor = new clsPmieducarServidor(
            $this->pessoa_logada,
            null,
            null,
            null,
            null,
            null,
            1,      //  Ativo
            1,      //  Fixado na instituição de ID 1
        );

        $eh_professor = $obj_servidor->isProfessor();
        $isCoordenador = $obj_servidor->isCoordenador();


        $escolasUsuario = [];
        if ($isCoordenador) {
            $escolasUser = App_Model_IedFinder::getEscolasUser($this->pessoa_logada);

            foreach ($escolasUser as $e) {
                $escolasUsuario[] = $e['ref_cod_escola'];
            }
        }


        $lista = $obj_plano->lista(
            $this->ano,
            $this->ref_cod_instituicao,
            $this->ref_cod_escola,
            $this->ref_cod_curso,
            $this->ref_cod_serie,
            $this->ref_cod_turma,
            $this->ref_cod_componente_curricular,
            $this->turma_turno_id,
            $this->data_inicial,
            $this->data_final,
            $this->fase_etapa,
            $eh_professor ? $this->pessoa_logada : null,
            null,
            empty($this->ref_cod_escola) ? $escolasUsuario : null,
            ($this->bool_validacao == '2')
        );

        $total = $obj_plano->_total;
        // monta a lista
        if (is_array($lista) && count($lista)) {
            foreach ($lista as $registro) {
                $obj = new clsModulesPlanejamentoAulaComponenteCurricular();
                $componentesCurriculares = $obj->lista($registro['id']);

                $obj = new clsPmieducarSerie();
                $tipo_presenca = $obj->tipoPresencaRegraAvaliacao($registro['cod_serie']);

                $data_inicial_formatada = dataToBrasil($registro['data_inicial']);
                $data_final_formatada = dataToBrasil($registro['data_final']);

                $lista_busca = [
                    "<input type='checkbox' id='aulas_checkbox[{$registro['id']}]' name='aulas_checkbox[]'></input>",
                    "<a href=\"educar_professores_planejamento_de_aula_det.php?id={$registro['id']}\">{$data_inicial_formatada}</a>",
                    "<a href=\"educar_professores_planejamento_de_aula_det.php?id={$registro['id']}\">{$data_final_formatada}</a>",
                    "<a href=\"educar_professores_planejamento_de_aula_det.php?id={$registro['id']}\">{$registro['turma']}</a>",
                    "<a href=\"educar_professores_planejamento_de_aula_det.php?id={$registro['id']}\">{$registro['serie']}</a>",
                    "<a href=\"educar_professores_planejamento_de_aula_det.php?id={$registro['id']}\">{$registro['escola']}</a>",
                    "<a href=\"educar_professores_planejamento_de_aula_det.php?id={$registro['id']}\">{$registro['fase_etapa']}º {$registro['etapa']}</a>"
                ];

                if (isset($componentesCurriculares) && is_array($componentesCurriculares) && !empty($tipo_presenca) && $tipo_presenca == 2) {
                    $abreviatura = '';
                    foreach ($componentesCurriculares as $componenteCurricular) {
                        $abreviatura .= $componenteCurricular['abreviatura'].'<br>';
                    }
                    $lista_busca[] = "<a href=\"educar_professores_frequencia_det.php?id={$registro['id']}\">{$abreviatura}</a>";
                } else {
                    $lista_busca[] = "<a href=\"educar_professores_frequencia_det.php?id={$registro['id']}\">—</a>";
                }

                $lista_busca[] = "<a href=\"educar_professores_planejamento_de_aula_det.php?id={$registro['id']}\">{$registro['professor']}</a>";

                if ($registro['fl_validado']) {
                    $buttonValidacao = "<button
                            id='validar_aula_btn[{$registro['id']}]'
                            name='validar_aula_btn[]'
                            style='width: 40px;cursor: pointer;'
                            class='btn btn-danger'
                            onclick='(function(e){removerValidacaoPlanoAula(e, {$registro['id']})})(event)'
                            alt='Validar Aula'
                        >
                            <i class='fa fa-times' aria-hidden='true' alt='Validar Aula'></i><span>
                        </button>";
                } else {
                    $buttonValidacao = "<button
                            id='validar_aula_btn[{$registro['id']}]'
                            name='validar_aula_btn[]'
                            style='width: 40px;cursor: pointer;'
                            class='btn btn-success'
                            onclick='(function(e){validaPlanoAula(e, {$registro['id']})})(event)'
                            alt='Validar Aula'
                        >
                            <i class='fa fa-check' aria-hidden='true' alt='Validar Aula'></i><span>
                        </button>";
                }

                $lista_busca[] =
                    $buttonValidacao .
                    " <a
                            id='enviar_mensagem_btn[{$registro['id']}]'
                            name='enviar_mensagem_btn[]'
                            style='width: 27px;cursor: pointer;padding: 0.375rem 0.75rem;'
                            class='btn btn-info'
                            onclick='modalOpen(this, {$registro['id']}, 1, {$registro['servidor_id']}, null, {$this->pessoa_logada})'
                            alt='Enviar mensagem ao professor'
                        >
                            <i class='fa fa-send' aria-hidden='true' alt='Enviar mensagem ao professor'></i><span>
                        </a>
                    ";

                $this->addLinhas($lista_busca);
            }
        }

        $this->addPaginador2('educar_professores_validacao_planejamento_de_aula_lst.php', $total, $_GET, $this->nome, $this->limite);
        $this->largura = '100%';

        $this->breadcrumb('Listagem validações de planos de aula', [
            url('intranet/educar_professores_index.php') => 'Professores',
        ]);

        if ($this->bool_validacao == '2') {
            $this->array_botao[] = ['name' => 'Remover validação aula(s) selecionada(s)', 'css-extra' => 'botoes-selecao-usuarios-servidores'];
        } else {
            $this->array_botao[] = ['name' => 'Validar aula(s) selecionada(s)', 'css-extra' => 'botoes-selecao-usuarios-servidores'];
        }
    }

    public function __construct () {
        parent::__construct();
        $this->loadAssets();
    }

    public function loadAssets () {
        $scripts = [
            '/modules/Cadastro/Assets/Javascripts/ValidacaoPlanejamentoAula.js',
            '/modules/Cadastro/Assets/Javascripts/ValidacaoEnviarMensagemModal.js',
        ];

        Portabilis_View_Helper_Application::loadJavascript($this, $scripts);
    }

    public function Formular()
    {
        $this->title = 'Validação de Plano de aula - Listagem';
        $this->processoAp = '58';
    }
};
