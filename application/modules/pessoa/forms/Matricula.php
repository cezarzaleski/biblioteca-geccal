<?php

/**
 * Formulário de matricusla
 * @author Cezar Zaleski
 * @see APPLICATION_PATH/pessoa/forms/Matricula.php
 */
class Pessoa_Form_Matricula extends Zend_Form {

    protected $_cripografia;

    public function init() {
        $this->_cripografia = Zend_Controller_Action_HelperBroker::getStaticHelper('Criptografia');
        $filtroIdade = new Zend_Form_Element_Radio('filtroIdade',
                        array("tabindex" => "1",
                            "separator" => ""));
        $filtroIdade->addMultiOptions(array(
                    'sim' => 'Sim',
                    'nao' => 'Não'))
                ->setValue("sim");
        $this->addElement($filtroIdade);

        $nuAno = new Zend_Form_Element_Select('nuAno', array("tabindex" => "1",
                    "title" => "Ano", "class" => "validate[required]"));
        $nuAno->setRequired(true)->setLabel('Ano:');
        $this->addElement($nuAno);

        $idEvangelizando = new Zend_Form_Element_Select('idEvangelizando', array("tabindex" => "3",
                    "title" => "Evangelizando", "class" => "validate[required]"));
        $idEvangelizando->setRequired(true)->setLabel('Evangelizando:');
        $this->addElement($idEvangelizando);

        // Botão de Envio
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setIgnore(true)->setLabel('Matricular');
        $this->addElement($submit);
    }

    public function editarMatriculaForm(\Core\Entity\BibliotecaInfantil\EvangelizandoTurma $valueObject, $form, $id) {
        $form->getElement('submit')->setLabel("Salvar");
        $idEvangTurma = new Zend_Form_Element_Hidden('idEvangTurma');
        $noEvangelizando = new Zend_Form_Element_Text('noEvangelizando',
                        array("disabled" => "disabled",
                            "tabindex" => "1",
                            "title" => "Evangelizando"));
        $noEvangelizando->setRequired(true)->setLabel('Evangelizando:');
        $this->addElement($noEvangelizando);
        $form->addElement($idEvangTurma);
        $form->getElement("idEvangTurma")->setValue($id);
        $this->carregarTurma($form, $valueObject->getIdTurma()->getNuAno(), $this->_cripografia->cripto($valueObject->getIdTurma()->getIdTurma()));
        $form->getElement("noEvangelizando")->setValue($valueObject->getIdEvangelizando()->getNoEvangelizando());
        return $form;
    }

    public function carregarAno($form, $ano,$turma) {
        $nuAno = new Zend_Form_Element_Select('nuAno', array("tabindex" => "1",
                    "title" => "Ano", "class" => "validate[required]"));
        $nuAno->setRequired(true)->setLabel('Ano:');
        $form->addElement($nuAno);
        $voTurma = new \Core\Models\Business\TurmaBusiness();
        $allAno = array();
        foreach ($voTurma->findByYear() as $val) {
            if (!in_array($val->getNuAno(), $allAno)) {
                $allAno[] = $val->getNuAno();
                $nuAno->addMultiOption($val->getNuAno(), $val->getNuAno());
            }
        }
        if (count($allAno) > 1) {
            $nuAno->addMultiOption("all", "Todos");
        }
        $nuAno->setValue($ano);
        return $this->carregarTurma($form, $ano,$turma);
    }

    public function carregarTurma($form, $ano,$turma) {
        $idTurma = new Zend_Form_Element_Select('idTurma', array("tabindex" => "2",
                    "title" => "Turma", "class" => "validate[required]"));
        $idTurma->setRequired(true)->setLabel('Turma:');
        $form->addElement($idTurma);
        $turmaBusiness = new \Core\Models\Business\TurmaBusiness();
        $idTurma->addMultiOption(NULL, "Selecione...");
        foreach ($turmaBusiness->findAll($ano) as $val) {
            $idTurma->addMultiOption($this->_cripografia->cripto($val->getIdTurma()), $val->getIdCiclo()->getNoCiclo());
        }
        $idTurma->setValue($turma);
        return $form;
    }

}