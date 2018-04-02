<?php

/**
 * Formulário de Perfil
 * @author Cezar Zaleski
 * @see APPLICATION_PATH/admin/forms/Perfil.php
 */
class Admin_Form_Perfil extends Zend_Form {

    public function init() {
        $noPerfil = new Zend_Form_Element_Text('noPerfil',
                        array("class" => "validate[required]",
                            "tabindex" => "1",
                            "title" => "Perfil",
                            "maxlength" => "45"));
        $noPerfil->setRequired(true)->setLabel('Perfil*:');
        $this->addElement($noPerfil);
   
       
        // Botão de Envio
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setIgnore(false)->setLabel('Cadastrar');
        $this->addElement($submit);
              
    }
   
    public function editarPerfilForm(\Core\Entity\BibliotecaInfantil\Perfil $valueObject, $form, $id) {
        $form->getElement('submit')->setLabel("Salvar");
        $idPerfil = new Zend_Form_Element_Hidden('idPerfil');
        $form->addElement($idPerfil);
        $form->getElement("idPerfil")->setValue($id);
        $form->getElement("noPerfil")->setValue($valueObject->getNoPerfil());

        return $form;
    }

    public function carregarModulos() {
        echo 'teste';
    }

}

