<?php

/**
 * Formulário de Turma
 * @author Cezar Zaleski
 * @see APPLICATION_PATH/admin/forms/Turma.php
 */
class Admin_Form_Turma extends Zend_Form {

    protected $_cripografia;

    public function init() {
        $this->_cripografia = Zend_Controller_Action_HelperBroker::getStaticHelper('Criptografia');
        $idCiclo = new Zend_Form_Element_Select('idCiclo', array("tabindex" => "1",
                    "title" => "Ciclo", "class" => "validate[required]"));
        $idCiclo->setRequired(true)->setLabel('Ciclo*:');
        $this->addElement($idCiclo);

        $dtInicio = new Zend_Form_Element_Text('dtInicio',
                        array("tabindex" => "2",
                            "title" => "Data de Início",
                            "class" => "validate[required]"));
        $dtInicio->setLabel('Data de Início*:');
        $this->addElement($dtInicio);

        $dtFim = new Zend_Form_Element_Text('dtFim',
                        array("tabindex" => "3",
                            "title" => "Data de Término",
                            "class" => "validate[required]"));
        $dtFim->setLabel('Data de Término*:');
        $this->addElement($dtFim);

        $nuIdadeMinima = new Zend_Form_Element_Select('nuIdadeMinima', array("tabindex" => "4",
                    "title" => "Idade Mínima", "class" => "validate[required]"));
        $nuIdadeMinima->setLabel('Idade Mínima*:');
        $this->addElement($nuIdadeMinima);

        $nuIdadeMaxima = new Zend_Form_Element_Select('nuIdadeMaxima', array("tabindex" => "5",
                    "title" => "Idade Máxima", "class" => "validate[required]"));
        $nuIdadeMaxima->setLabel('Idade Máxima*:');
        $this->addElement($nuIdadeMaxima);
        $nuIdadeMinima->addMultiOption(NULL, "Selecione...");
        $nuIdadeMaxima->addMultiOption(NULL, "Selecione...");
        for ($cont = 3; $cont <= 13; $cont++) {
            $nuIdadeMinima->addMultiOption($cont, $cont);
            $nuIdadeMaxima->addMultiOption($cont, $cont);
        }

        $noObs = new Zend_Form_Element_Textarea('noObs',
                        array("tabindex" => "6",
                            "title" => "Observação"));
        $noObs->setLabel('Observação:');
        $this->addElement($noObs);

        // Botão de Envio
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setIgnore(true)->setLabel('Cadastrar');
        $this->addElement($submit);

        //legend e fieldset 
        $this->addDisplayGroup(array('idCiclo', 'dtInicio', 'dtFim', 'submit'), 'legend', array(
            'legend' => 'Turma'
        ));

        // Configurações do Formulário
        $this->setName('cadastrarTurma')->setMethod(self::METHOD_POST)
                ->setAction("/admin/turma/cadastrar")->setAttrib('class', 'form');

        $this->carregarCiclo($idCiclo, FALSE);
    }

    public function editarTurmaForm(\Core\Entity\BibliotecaInfantil\Turma $valueObject, $form, $id) {
        $form->getElement('submit')->setLabel("Salvar");
        $idTurma = new Zend_Form_Element_Hidden('idTurma');
        $form->addElement($idTurma);
        $form->getElement("idTurma")->setValue($id);
        $form->getElement("idCiclo")->setValue($this->_cripografia->cripto($valueObject->getIdCiclo()->getIdCiclo()));
        $form->getElement("dtInicio")->setValue($valueObject->getDtInicio()->format('d/m/Y'));
        $form->getElement("dtFim")->setValue($valueObject->getDtFim()->format('d/m/Y'));
        $form->getElement("nuIdadeMinima")->setValue($valueObject->getNuIdadeMinima());
        $form->getElement("nuIdadeMaxima")->setValue($valueObject->getNuIdadeMaxima());
        $form->getElement("noObs")->setValue($valueObject->getNoObs());
        $idCiclo = $form->getElement("idCiclo");
        $this->carregarCiclo($idCiclo, $valueObject->getIdCiclo()->getIdCiclo());
        return $form;
    }

    private function carregarCiclo($idCiclo, $inCiclo) {
        $cicloBusiness = new \Core\Models\Business\CicloBusiness();
        $idCiclo->addMultiOption(NULL, "Selecione...");
        foreach ($cicloBusiness->findByCicloTurma(date("Y"), $inCiclo) as $val) {
            $idCiclo->addMultiOption($this->_cripografia->cripto($val['idCiclo']), $val['noCiclo']);
        }
    }

    public function carregarAno($form,$ano) {
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
        if(count($allAno) > 1){
            $nuAno->addMultiOption("all", "Todos");
        }
        $nuAno->setValue($ano);
        return $form;
    }

}

