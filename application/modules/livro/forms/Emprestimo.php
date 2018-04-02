<?php

/**
 * Formulário de empréstimo de livro
 * @author Cezar Zaleski
 * @see APPLICATION_PATH/livro/forms/Emprestimo.php
 */
class Livro_Form_Emprestimo extends Zend_Form {

    protected $_cripografia;

    public function init() {
        $this->_cripografia = Zend_Controller_Action_HelperBroker::getStaticHelper('Criptografia');

        $opcao = new Zend_Form_Element_Radio('opcao',
                        array("tabindex" => "1",
                            "separator" => ""));
        $opcao->addMultiOptions(array(
                    'evangelizando' => 'Evangelizando',
                    'colaborador' => 'Colaborador',
                    'livro' => 'Livro'))
                ->setValue("evangelizando");
        $this->addElement($opcao);


        $idTurma = new Zend_Form_Element_Select('idTurma', array("tabindex" => "1",
                    "title" => "Turma", "class" => "validate[required]"));
        $idTurma->setRequired(true)->setLabel('Turma*:');
        $this->addElement($idTurma);

        $noEvangelizando = new Zend_Form_Element_Select('noEvangelizando', array("tabindex" => "2",
                    "title" => "Evangelizando", "class" => "validate[required]"));
        $noEvangelizando->setRequired(true)->setLabel('Evangelizando*:');
        $noEvangelizando->addMultiOption(NULL, "Selecione a turma...");
        $this->addElement($noEvangelizando);

        $idColaborador = new Zend_Form_Element_Select('idColaborador', array("tabindex" => "2",
                    "title" => "Colaborador", "class" => "validate[required]"));
        $idColaborador->setRequired(true)->setLabel('Colaborador*:');
        $this->addElement($idColaborador);

        $idLivro = new Zend_Form_Element_Select('idLivro', array("tabindex" => "3",
                    "title" => "Livro", "class" => "validate[required]"));
        $idLivro->setRequired(true)->setLabel('Livro*:');
        $this->addElement($idLivro);

        $nuExemplar = new Zend_Form_Element_Select('nuExemplar', array("tabindex" => "4",
                    "title" => "Exemplar", "class" => "validate[required]"));
        $nuExemplar->setRequired(true)->setLabel('Exemplar*:');
        $this->addElement($nuExemplar);

        $dtEmprestimo = new Zend_Form_Element_Text('dtEmprestimo',
                        array("class" => "validate[required]",
                            "tabindex" => "5",
                            "title" => "Data Empréstimo",
                            "maxlength" => "45"));
        $dtEmprestimo->setRequired(true)->setLabel('Data Empréstimo*:');
        $this->addElement($dtEmprestimo);

        $dtPrevDevolucao = new Zend_Form_Element_Text('dtPrevDevolucao',
                        array("class" => "validate[required]",
                            "tabindex" => "6",
                            "disabled" => "disabled",
                            "title" => "Data Previsão Devolução",
                            "maxlength" => "45"));
        $dtPrevDevolucao->setRequired(true)->setLabel('Data Previsão Devolução:');
        $this->addElement($dtPrevDevolucao);

        $nuAnoEvangelizando = new Zend_Form_Element_Select('nuAnoEvangelizando', array("tabindex" => "1",
                    "title" => "Ano"));
        $nuAnoEvangelizando->setLabel('Ano:');
        $this->addElement($nuAnoEvangelizando);

        $nuAnoColaborador = new Zend_Form_Element_Select('nuAnoColaborador', array("tabindex" => "1",
                    "title" => "Ano"));
        $nuAnoColaborador->setLabel('Ano:');
        $this->addElement($nuAnoColaborador);

        // Botão de Envio
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setIgnore(true)->setLabel('Cadastrar');
        $this->addElement($submit);


        $this->carregarTurma($idTurma);
        $this->carregarLivro($idLivro, "emprestar");
        $this->carregarColaborador($idColaborador);
        $this->carregarAnoEvangelizando($nuAnoEvangelizando);
        $this->carregarAnoColaborador($nuAnoColaborador);
    }

    public function editarEmprestimoForm($valueObject, $form, $id) {
        $form->getElement('submit')->setLabel("Salvar");
        $idEmprestimo = new Zend_Form_Element_Hidden('idEmprestimo');
        $form->addElement($idEmprestimo);
        $form->getElement("idEmprestimo")->setValue($id);

        $form->getElement("opcao")->removeMultiOption("livro");
        $noLivroEmprestado = new Zend_Form_Element_Text('noLivroEmprestado',
                        array("tabindex" => "3",
                            "disabled" => "disabled",
                            "title" => "Livro Emprestado",
                            "maxlength" => "100"));
        $noLivroEmprestado->setLabel('Livro Emprestado:');
        $form->addElement($noLivroEmprestado);

        if ($valueObject->getIdEvangelizandoTurma()) {
            $form->getElement("opcao")->setValue("evangelizando");
            $idTurma = new Zend_Form_Element_Text('idTurma',
                            array("tabindex" => "2",
                                "disabled" => "disabled",
                                "title" => "Turma Atual",
                                "maxlength" => "45"));
            $idTurma->setLabel('Turma:');
            $form->addElement($idTurma);
            $noEvangelizando = new Zend_Form_Element_Text('noEvangelizando',
                            array("tabindex" => "3",
                                "disabled" => "disabled",
                                "title" => "Evangelizando",
                                "maxlength" => "45"));
            $noEvangelizando->setLabel('Evangelizando:');
            $form->addElement($noEvangelizando);

            $form->getElement("idTurma")->setValue($valueObject->getIdEvangelizandoTurma()->getIdTurma()->getIdCiclo()->getNoCiclo());
            $form->getElement("noEvangelizando")->setValue($valueObject->getIdEvangelizandoTurma()->getIdEvangelizando()->getNoEvangelizando());
        } else if ($valueObject->getIdColaborador()) {
            $form->getElement("opcao")->setValue("colaborador");
            $idColaborador = new Zend_Form_Element_Text('idColaborador',
                            array("tabindex" => "2",
                                "disabled" => "disabled",
                                "title" => "Colaborador",
                                "maxlength" => "45"));
            $idColaborador->setLabel('Colaborador:');
            $form->addElement($idColaborador);
            $form->getElement("idColaborador")->setValue($valueObject->getIdColaborador()->getNoColaborador());
        }
        $form->getElement("noLivroEmprestado")->setValue($valueObject->getIdLivro()->getNoLivro() . " - exemplar: " . $valueObject->getIdLivro()->getNuExemplar());
        $form->getElement("nuExemplar")->setValue($valueObject->getIdLivro()->getNuExemplar());
        $form->getElement("dtEmprestimo")->setValue($valueObject->getDtEmprestimo()->format("d/m/Y"));
        $form->getElement("dtPrevDevolucao")->setValue($valueObject->getDtPrevDevolucao()->format("d/m/Y"));

        return $form;
    }

    public function stLivro($form, $st) {
        $options = $form->getElement("idLivro")->getMultiOptions();
        foreach ($options as $val) {
            $form->getElement("idLivro")->removeMultiOption($val);
        }
        $this->carregarLivro($form->getElement("idLivro"), $st);
        return $form;
    }

    private function carregarTurma($idTurma) {
        $turmaBusiness = new \Core\Models\Business\TurmaBusiness();
        $idTurma->addMultiOption(NULL, "Selecione...");
        foreach ($turmaBusiness->findAll(date('Y')) as $val) {
            $idTurma->addMultiOption($this->_cripografia->cripto($val->getIdTurma()), $val->getIdCiclo()->getNoCiclo());
        }
    }

    private function carregarLivro($idLivro, $st) {
        $livroBusiness = new \Core\Models\Business\LivroBusiness();
        $idLivro->addMultiOption(NULL, "Selecione...");
        if ($st == "emprestar") {
            foreach ($livroBusiness->findByEmprestimo($st) as $val) {
                $idLivro->addMultiOption($val['noLivro'], $val['noLivro']);
            }
        } else if ($st == "emprestado") {
            foreach ($livroBusiness->findAll() as $val) {
                $idLivro->addMultiOption($val->getNoLivro(), $val->getNoLivro());
            }
        }
    }

    private function carregarColaborador($idColaborador) {
        $colaboradorBusiness = new \Core\Models\Business\ColaboradorBusiness();
        $idColaborador->addMultiOption(NULL, "Selecione...");
        foreach ($colaboradorBusiness->findAll() as $val) {
            $idColaborador->addMultiOption($this->_cripografia->cripto($val->getIdColaborador()), $val->getNoColaborador());
        }
    }

    private function carregarAnoEvangelizando($nuAnoEvangelizando) {
        $voEmprestimo = new \Core\Models\Business\EmprestimoBusiness();
        $nuAnoEvangelizando->addMultiOption(NULL, "Selecione...");
        $allAno = array();
        foreach ($voEmprestimo->findByYear("evangelizando") as $val) {
            if (!in_array($val["nuAno"], $allAno)) {
                $allAno[] = $val["nuAno"];
                $nuAnoEvangelizando->addMultiOption($val["nuAno"], $val["nuAno"]);
            }
        }
    }

    private function carregarAnoColaborador($nuAnoColaborador) {
        $voEmprestimo = new \Core\Models\Business\EmprestimoBusiness();
        $nuAnoColaborador->addMultiOption(NULL, "Selecione...");
        $allAno = array();
        foreach ($voEmprestimo->findByYear("colaborador") as $val) {
            if (!in_array($val['nuAno'], $allAno)) {
                $allAno[] = $val['nuAno'];
                $nuAnoColaborador->addMultiOption($val['nuAno'], $val['nuAno']);
            }
        }
    }

    private function carregarEvangelizando($noEvangelizando) {
        $evangelizandoBusiness = new \Core\Models\Business\EvangelizandoBusiness();
        $noEvangelizando->addMultiOption(NULL, "Selecione...");
        foreach ($evangelizandoBusiness->findAll() as $val) {
            $noEvangelizando->addMultiOption($this->_cripografia->cripto($val->getIdEvangelizando()), $val->getNoEvangelizando());
        }
    }

    public function newComboEvangelizando($form) {
        $options = $form->getElement("noEvangelizando")->getMultiOptions();
        foreach ($options as $val) {
            $form->getElement("noEvangelizando")->removeMultiOption($val);
        }
        $this->carregarEvangelizando($form->getElement("noEvangelizando"));
        return $form;
    }

}

