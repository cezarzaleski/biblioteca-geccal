<?php

/**
 * Formulário de Funcao Atividade
 * @author Cezar Zaleski
 * @see APPLICATION_PATH/admin/forms/Usuario.php
 */
class Admin_Form_Usuario extends Zend_Form {

    protected $_cripografia;
    public function init() {
        $this->_cripografia = Zend_Controller_Action_HelperBroker::getStaticHelper('Criptografia');
        
        $noUsuario = new Zend_Form_Element_Text('noUsuario',
                        array("class" => "validate[required]",
                            "tabindex" => "1",
                            "title" => "Usuário",
                            "maxlength" => "45"));
        $noUsuario->setRequired(true)->setLabel('Usuário*:');
        $this->addElement($noUsuario);

        $noSenha = new Zend_Form_Element_Password('noSenha',
                        array("class" => "validate[required]",
                            "tabindex" => "2",
                            "title" => "Senha",
                            "maxlength" => "17"));
        $noSenha->setRequired(true)->setLabel('Senha*:');
        $this->addElement($noSenha);

        $idColaborador = new Zend_Form_Element_Select('idColaborador', array("tabindex" => "3",
                    "title" => "Colaborador", "class" => "validate[required]"));
        $idColaborador->setRequired(true)->setLabel('Colaborador*:');
        $this->addElement($idColaborador);
        
        $idPerfil = new Zend_Form_Element_Select('idPerfil', array("tabindex" => "4",
                    "title" => "Perfil", "class" => "validate[required]"));
        $idPerfil->setRequired(true)->setLabel('Perfil*:');
        $this->addElement($idPerfil);


        // Botão de Envio
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setIgnore(true)->setLabel('Cadastrar');
        $this->addElement($submit);

        //legend e fieldset 
        $this->addDisplayGroup(array('noUsuario','noSenha','idColaborador','idPerfil','submit'), 'legend', array(
            'legend' => 'Usuário'
        ));

        // Configurações do Formulário
        $this->setName('cadastrarUsuario')->setMethod(self::METHOD_POST)
                ->setAction("/admim/usuario/cadastrar")->setAttrib('class', 'form');
        $this->carregarColaborador($idColaborador);
        $this->carregarPerfil($idPerfil);
    }

    public function editarUsuarioForm(\Core\Entity\BibliotecaInfantil\Usuario $valueObject, $form, $id) {
        $form->setAction('/admim/usuario/editar')->setName('editarUsuario');
        $form->getElement('submit')->setLabel("Salvar");
        $idUsuario = new Zend_Form_Element_Hidden('idUsuario');
        $form->addElement($idUsuario);
        $form->removeElement('idColaborador');
        $noColaborador = new Zend_Form_Element_Text('noColaborador',
                        array("class" => "validate[required]",
                            "tabindex" => "2",
                            "title" => "Colaborador",
                            "maxlength" => "45",
                            "disabled" => "disabled"));
        $noColaborador->setRequired(true)->setLabel('Colaborador:');
        $alterSenha = new Zend_Form_Element_Checkbox('alterSenha',
                        array("tabindex" => "4",));
        $form->addElement($alterSenha);       
        
        $form->addElement($noColaborador);
        $form->getElement("noColaborador")->setValue($valueObject->getIdColaborador()->getNoColaborador());
        $form->getElement("idPerfil")->setValue($this->_cripografia->cripto($valueObject->getIdPerfil()->getIdPerfil()));
                
        $form->getElement("idUsuario")->setValue($id);
        $form->getElement("noUsuario")->setValue($valueObject->getNoUsuario());
        $form->getElement("noSenha")->setAttrib('disabled', true);
        
        $form->addDisplayGroup(array('noUsuario','noColaborador','idPerfil','alterSenha','noSenha','submit'), 'usuario', array(
            'legend' => 'Usuário'
        ));
        
        return $form;
    }
    
    private function carregarColaborador($idColaborador) {
        $colaboradorBusiness = new \Core\Models\Business\ColaboradorBusiness();
        $idColaborador->addMultiOption(NULL, "Selecione...");
        foreach ($colaboradorBusiness->findByColaboradorNovoUsuario() as $val) {
            $idColaborador->addMultiOption($this->_cripografia->cripto($val['idColaborador']), $val['noColaborador']);
        }
    }
    
    private function carregarPerfil($idPerfil) {
        $perfilBusiness = new \Core\Models\Business\PerfilBusiness();
        $idPerfil->addMultiOption(NULL, "Selecione...");
        foreach ($perfilBusiness->findAll() as $val) {
            $idPerfil->addMultiOption($this->_cripografia->cripto($val->getIdPerfil()), $val->getNoPerfil());
        }
    }

}

