<?php

/**
 * Formulário para alterar ano
 * @author Cezar Zaleski
 * @see APPLICATION_PATH/padrao/forms/Ano.php
 */
class Padrao_Form_Ano extends Zend_Form {

    protected $_cripografia;

    public function init() {
        $this->_cripografia = Zend_Controller_Action_HelperBroker::getStaticHelper('Criptografia');
        
        
        $nuAno = new Zend_Form_Element_Select('nuAno', array("tabindex" => "1",
                    "title" => "Ano", "class" => "validate[required]"));
        $nuAno->setRequired(true)->setLabel('Ano:');
        $this->addElement($nuAno);
                    
        // Botão de Envio
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setIgnore(true)->setLabel('Salvar');
        $this->addElement($submit);

        //legend e fieldset 
        $this->addDisplayGroup(array('nuAno','submit'), 'editarAno', array(
            'legend' => 'Alterar Ano'
        ));

        // Configurações do Formulário
        $this->setName('editarAno')->setMethod(self::METHOD_POST)
                ->setAction("/padrao/ano/editar")->setAttrib('class', 'form');
        $this->carregarAno($nuAno);
    }
    
    private function carregarAno($nuAno){
        $voEmprestimo = new \Core\Models\Business\EmprestimoBusiness();
        $allAno = array();
        foreach ($voEmprestimo->findByYear("evangelizando") as $val) {
            if (!in_array($val["nuAno"], $allAno)) {
                $allAno[] = $val["nuAno"];
                $nuAno->addMultiOption($val["nuAno"], $val["nuAno"]);
            }
        }
    }
    
/*
    public function editarSenhaForm(\Core\Entity\BibliotecaInfantil\Usuario $valueObject, $form) {
        $form->addElement($idUsuario);
        $form->getElement("idUsuario")->setValue($this->_cripografia->cripto($valueObject->getIdUsuario()));
        $form->getElement("noColaborador")->setValue($valueObject->getIdColaborador()->getNoColaborador());
        $form->getElement("noUsuario")->setValue($valueObject->getNoUsuario());
        return $form;
    }*/

}

