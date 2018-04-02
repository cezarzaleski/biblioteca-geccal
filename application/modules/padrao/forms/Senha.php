<?php

/**
 * Formulário para alterar senha
 * @author Cezar Zaleski
 * @see APPLICATION_PATH/padrao/forms/Senha.php
 */
class Padrao_Form_Senha extends Zend_Form {

    protected $_cripografia;

    public function init() {
        $this->_cripografia = Zend_Controller_Action_HelperBroker::getStaticHelper('Criptografia');
        
        $noColaborador = new Zend_Form_Element_Text('noColaborador',
                        array("tabindex" => "1",
                            "title" => "Nome Colaborador",
                            "disabled" => "disabled"));
        $noColaborador->setLabel('Nome Colaborador:');
        $this->addElement($noColaborador);
        
        $noUsuario = new Zend_Form_Element_Text('noUsuario',
                        array("tabindex" => "2",
                            "title" => "Nome Usuário",
                            "disabled" => "disabled"));
        $noUsuario->setLabel('Nome Usuário:');
        $this->addElement($noUsuario);
        
        $noSenha = new Zend_Form_Element_Password('noSenha',
                        array("class" => "validate[required]",
                            "tabindex" => "3",
                            "title" => "Senha",
                            "maxlength" => "17"));
        $noSenha->setRequired(true)->setLabel('Senha*:');
        $this->addElement($noSenha);

        // Botão de Envio
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setIgnore(true)->setLabel('Salvar');
        $this->addElement($submit);

        //legend e fieldset 
        $this->addDisplayGroup(array('noColaborador', 'noUsuario','noSenha','submit'), 'legend', array(
            'legend' => 'Alterar Senha'
        ));

        // Configurações do Formulário
        $this->setName('editarSenha')->setMethod(self::METHOD_POST)
                ->setAction("/padrao/senha/alterar")->setAttrib('class', 'form');
    }

    public function editarSenhaForm(\Core\Entity\BibliotecaInfantil\Usuario $valueObject, $form) {
        $idUsuario = new Zend_Form_Element_Hidden('idUsuario');
        $form->addElement($idUsuario);
        $form->getElement("idUsuario")->setValue($this->_cripografia->cripto($valueObject->getIdUsuario()));
        $form->getElement("noColaborador")->setValue($valueObject->getIdColaborador()->getNoColaborador());
        $form->getElement("noUsuario")->setValue($valueObject->getNoUsuario());
        return $form;
    }

}

