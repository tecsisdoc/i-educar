<?php
use App\Models\Frequencia;
use App\Models\FrequenciaAluno;
use App\Models\FaltaComponente;
use App\Models\FaltaGeral;
use App\Models\FaltaAluno;
use App\Models\Turma;
use App\Models\Serie;
use App\Models\SerieTurma;

return new class() extends clsCadastro {
    /**
     * Referencia pega da session para o idpes do usuario atual.
     *
     * @var int
     */
    public $pessoa_logada;

    public function Inicializar()
    {
        $retorno = 'Novo';

        $this->ref_cod_matricula = $_GET['ref_cod_matricula'];
        $this->ref_cod_aluno = $_GET['ref_cod_aluno'];

        $obj_permissoes = new clsPermissoes();
        $obj_permissoes->permissao_cadastra(578, $this->pessoa_logada, 7, "educar_matricula_lst.php?ref_cod_aluno={$this->ref_cod_aluno}");

        $obj_matricula = new clsPmieducarMatricula($this->cod_matricula, null, null, null, $this->pessoa_logada, null, null, 6);

        $this->url_cancelar = "educar_manutencao_matricula.php";

        $this->breadcrumb('Registro do falecimento do aluno', [
            url('intranet/educar_index.php') => 'Escola',
        ]);

        $this->nome_url_cancelar = 'Cancelar';

        return $retorno;
    }

    public function Gerar()
    {
        // primary keys
        $this->campoOculto('ref_cod_aluno', $this->ref_cod_aluno);
        $this->campoOculto('ref_cod_matricula', $this->ref_cod_matricula);

        $obj_aluno = new clsPmieducarAluno();
        $lst_aluno = $obj_aluno->lista($this->ref_cod_aluno, null, null, null, null, null, null, null, null, null, 1);
        if (is_array($lst_aluno)) {
            $det_aluno = array_shift($lst_aluno);
            $this->nm_aluno = $det_aluno['nome_aluno'];
            $this->campoTexto('nm_aluno', 'Aluno', $this->nm_aluno, 30, 255, false, false, false, '', '', '', '', true);
        }

        $this->inputsHelper()->date('data_cancel', ['label' => 'Data do falecimento', 'placeholder' => 'dd/mm/yyyy', 'value' => date('d/m/Y')]);

        $this->campoMemo('observacao', 'Observa&ccedil;&atilde;o', $this->observacao, 60, 5, false);

       
        
        
    }

    public function Novo()
    {
        $obj_permissoes = new clsPermissoes();
        $obj_permissoes->permissao_cadastra(578, $this->pessoa_logada, 7, "educar_matricula_det.php?cod_matricula={$this->ref_cod_matricula}");

        $tamanhoObs = strlen($this->observacao);
        if ($tamanhoObs > 300) {
            $this->mensagem = 'O campo observação deve conter no máximo 300 caracteres.<br>';

            return false;
        }

        $obj_matricula = new clsPmieducarMatricula($this->ref_cod_matricula, null, null, null, $this->pessoa_logada, null, null, 6);
        $obj_matricula->data_cancel = Portabilis_Date_Utils::brToPgSQL($this->data_cancel);

        $det_matricula = $obj_matricula->detalhe();

        if (is_null($det_matricula['data_matricula'])) {
            if (substr($det_matricula['data_cadastro'], 0, 10) > $obj_matricula->data_cancel) {
                $this->mensagem = 'Data de falecimento não pode ser inferior a data da matrícula.<br>';

                return false;
            }
        } else {
            if (substr($det_matricula['data_matricula'], 0, 10) > $obj_matricula->data_cancel) {
                $this->mensagem = 'Data de falecimento não pode ser inferior a data da matrícula.<br>';

                return false;
            }
        }

        $turma = new clsPmieducarTurma($_GET['turma']);
        $tipoTurma = $turma->getTipoTurma();

        if ($tipoTurma == 1) {

            $atendimento = new clsModulesComponenteMinistradoAee();
            $dataAtendimento = $atendimento->selectDataAtendimentoByMatricula($_GET['ref_cod_matricula']);

            $frequencia = Frequencia::where('ref_cod_turma', $_GET['turma'])->where('data', '>=', "'".$obj_matricula->data_cancel."'")->orderBy('id', 'DESC')->get();
            foreach($frequencia as $list) {

                $etapa = $list->etapa_sequencial;
                $componente_curricular_id = $list->ref_componente_curricular;
    
    
                   //contabiliza as faltas se for turma dos primeiros anos
                   $qtd_faltas_turma  = 0;
                    $frequencia_aluno = FrequenciaAluno::where('ref_frequencia',$list->id)->where('ref_cod_matricula', $this->ref_cod_matricula)->get();
                        foreach($frequencia_aluno as $list_freq_aluno) {
    
                            $qtd_faltas_turma++;
                            
                        }
                      
                    //contabiliza as faltas se for turma dos ultimos anos
                        $lista_faltas = '';   
                    $frequencia_aluno = FrequenciaAluno::where('ref_frequencia',$list->id)->where('ref_cod_matricula', $this->ref_cod_matricula)->where('aulas_faltou', 'not like', 'undefined')->get();
                        foreach($frequencia_aluno as $list_freq_aluno) {
                           
                        
                            if(!empty($aulas->aulas_faltou)){
    
                            $lista_faltas .= $aulas->aulas_faltou.",";
    
                            }
                            
                        }
                    //verifica a quantidade de faltas no array de aulas que o aluno faltou
                        $lista_faltas = substr($lista_faltas, 0, -1);
                        $str_arr = preg_split ("/\,/", $lista_faltas);
                        $total_faltas = count($str_arr);
    
                             
                    $falta_aluno = FaltaAluno::where('matricula_id', $this->ref_cod_matricula)->get();
                    foreach($falta_aluno as $list_falta_aluno) {
    
                        //Atualiza a quantidade faltas se for turma dos ultimos anos
    
                        if($list_falta_aluno->tipo_falta==2){
                            //pega a quantidade e subtrai pela quantidade de faltas existentes
                            $qtd_falta_atual = 0;
                            $lista_qtd_faltas = FaltaComponente::where('componente_curricular_id', $componente_curricular_id)->where('falta_aluno_id', $list_falta_aluno->id)->where('etapa', $etapa)->get();
                            foreach($lista_qtd_faltas as $lista_qtd_falta) {
                                    $qtd_falta_atual = $lista_qtd_falta->quantidade;
                            }
                            $total_faltas = $qtd_falta_atual - $total_faltas;
                            if($total_faltas<0){
                                $total_faltas = 0;  
                            } 
                            FaltaComponente::where('componente_curricular_id', $componente_curricular_id)->where('falta_aluno_id', $list_falta_aluno->id)->where('etapa', $etapa)->update([
                                'quantidade' => $total_faltas
                                
                            ]);
                        } 
                        //Atualiza a quantidade faltas se for turma dos primeiros anos
                        elseif($list_falta_aluno->tipo_falta==1){
                            
                            $qtd_falta_atual = 0;
                            $lista_qtd_faltas = FaltaGeral::where('falta_aluno_id', $list_falta_aluno->id)->where('etapa', $etapa)->get();
                            foreach($lista_qtd_faltas as $lista_qtd_falta) {
                                    $qtd_falta_atual = $lista_qtd_falta->quantidade;
                            }
                            $total_faltas = $qtd_falta_atual - $qtd_faltas_turma;
                            if($total_faltas<0){
                                $total_faltas = 0;  
                            } 
                            FaltaGeral::where('falta_aluno_id', $list_falta_aluno->id)->where('etapa', $etapa)->update([
                                'quantidade' => $total_faltas
                                
                            ]);
    
                        }
    
    
                    }


                
    

                FrequenciaAluno::where('ref_frequencia',$list['id'])->where('ref_cod_matricula',$this->ref_cod_matricula)->delete();
            }
           
        }

        if ($tipoTurma == 0) {

            $frequencia = new clsModulesFrequencia();
            $dataFrequencia = $frequencia->selectDataFrequenciaByTurma($_GET['turma']);

            $frequencia = Frequencia::where('ref_cod_turma', $_GET['turma'])->where('data', '>=', "'".$obj_matricula->data_cancel."'")->orderBy('id', 'DESC')->get();
            foreach($frequencia as $list) {

                $etapa = $list->etapa_sequencial;
                $componente_curricular_id = $list->ref_componente_curricular;
    
    
                   //contabiliza as faltas se for turma dos primeiros anos
                   $qtd_faltas_turma  = 0;
                    $frequencia_aluno = FrequenciaAluno::where('ref_frequencia',$list->id)->where('ref_cod_matricula', $this->ref_cod_matricula)->get();
                        foreach($frequencia_aluno as $list_freq_aluno) {
    
                            $qtd_faltas_turma++;
                            
                        }
                      
                    //contabiliza as faltas se for turma dos ultimos anos
                        $lista_faltas = '';   
                    $frequencia_aluno = FrequenciaAluno::where('ref_frequencia',$list->id)->where('ref_cod_matricula', $this->ref_cod_matricula)->where('aulas_faltou', 'not like', 'undefined')->get();
                        foreach($frequencia_aluno as $list_freq_aluno) {
                           
                        
                            if(!empty($aulas->aulas_faltou)){
    
                            $lista_faltas .= $aulas->aulas_faltou.",";
    
                            }
                            
                        }
                    //verifica a quantidade de faltas no array de aulas que o aluno faltou
                        $lista_faltas = substr($lista_faltas, 0, -1);
                        $str_arr = preg_split ("/\,/", $lista_faltas);
                        $total_faltas = count($str_arr);
    
                             
                    $falta_aluno = FaltaAluno::where('matricula_id', $this->ref_cod_matricula)->get();
                    foreach($falta_aluno as $list_falta_aluno) {
    
                        //Atualiza a quantidade faltas se for turma dos ultimos anos
    
                        if($list_falta_aluno->tipo_falta==2){
                            //pega a quantidade e subtrai pela quantidade de faltas existentes
                            $qtd_falta_atual = 0;
                            $lista_qtd_faltas = FaltaComponente::where('componente_curricular_id', $componente_curricular_id)->where('falta_aluno_id', $list_falta_aluno->id)->where('etapa', $etapa)->get();
                            foreach($lista_qtd_faltas as $lista_qtd_falta) {
                                    $qtd_falta_atual = $lista_qtd_falta->quantidade;
                            }
                            $total_faltas = $qtd_falta_atual - $total_faltas;
                            if($total_faltas<0){
                                $total_faltas = 0;  
                            } 
                            FaltaComponente::where('componente_curricular_id', $componente_curricular_id)->where('falta_aluno_id', $list_falta_aluno->id)->where('etapa', $etapa)->update([
                                'quantidade' => $total_faltas
                                
                            ]);
                        } 
                        //Atualiza a quantidade faltas se for turma dos primeiros anos
                        elseif($list_falta_aluno->tipo_falta==1){
                            
                            $qtd_falta_atual = 0;
                            $lista_qtd_faltas = FaltaGeral::where('falta_aluno_id', $list_falta_aluno->id)->where('etapa', $etapa)->get();
                            foreach($lista_qtd_faltas as $lista_qtd_falta) {
                                    $qtd_falta_atual = $lista_qtd_falta->quantidade;
                            }
                            $total_faltas = $qtd_falta_atual - $qtd_faltas_turma;
                            if($total_faltas<0){
                                $total_faltas = 0;  
                            } 
                            FaltaGeral::where('falta_aluno_id', $list_falta_aluno->id)->where('etapa', $etapa)->update([
                                'quantidade' => $total_faltas
                                
                            ]);
    
                        }
    
    
                    }


                
    

                FrequenciaAluno::where('ref_frequencia',$list['id'])->where('ref_cod_matricula',$this->ref_cod_matricula)->delete();
            }
        }

        if ($obj_matricula->edita()) {
            if ($obj_matricula->cadastraObservacaoFalecido($this->observacao)) {
                $enturmacoes = new clsPmieducarMatriculaTurma();
                $enturmacoes = $enturmacoes->lista($this->ref_cod_matricula, null, null, null, null, null, null, null, 1);

                foreach ($enturmacoes as $enturmacao) {
                    $enturmacao = new clsPmieducarMatriculaTurma($this->ref_cod_matricula, $enturmacao['ref_cod_turma'], $this->pessoa_logada, null, null, null, 0, null, $enturmacao['sequencial']);

                    if (!$enturmacao->edita()) {
                        $this->mensagem = 'N&atilde;o foi poss&iacute;vel desativar as enturma&ccedil;&otilde;es da matr&iacute;cula.';

                        return false;
                    } else {
                        $enturmacao->marcaAlunoFalecido($this->data_cancel);
                    }
                }

                $notaAluno = (new Avaliacao_Model_NotaAlunoDataMapper())
                    ->findAll(['id'], ['matricula_id' => $obj_matricula->cod_matricula])[0] ?? null;

                if (!empty($notaAluno)) {
                    (new Avaliacao_Model_NotaComponenteMediaDataMapper())
                        ->updateSituation($notaAluno->get('id'), App_Model_MatriculaSituacao::FALECIDO);
                }

                $this->mensagem .= 'Alteração realizado com sucesso.<br>';
                $this->simpleRedirect("educar_matricula_det.php?cod_matricula={$this->ref_cod_matricula}");
            }

            $this->mensagem = 'A alteração não pode ser salva.<br>';

            return false;
        }
        $this->mensagem = 'A alteração não pode ser realizado.<br>';

        return false;
    }

    public function Formular()
    {
        $this->title = 'Transfer&ecirc;ncia Solicita&ccedil;&atilde;o';
        $this->processoAp = '578';
    }
    public function makeExtra()
    {
        return file_get_contents(__DIR__ . '/scripts/extra/educar-confirmar-exclusao.js');
    }
};
