<?php

/**
 * Formulário de editora
 * @author Cezar Zaleski
 * @see APPLICATION_PATH/livro/forms/Editora.php
 */
class Livro_Form_Editora extends Zend_Form {

    public function init() {
        //Nome de Editora

        $noEditora = new Zend_Form_Element_Text('noEditora',
                        array("class" => "validate[required]",
                            "tabindex" => "1",
                            "title" => "Nome da Editora",
                            "maxlength" => "45"));
        $noEditora->setRequired(true)->setLabel('Nome da Editora*:');
        $this->addElement($noEditora);

        // Botão de Envio
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setIgnore(true)->setLabel('Cadastrar');
        $this->addElement($submit);

        //legend e fieldset 
        $this->addDisplayGroup(array('noEditora', 'submit'), 'legend', array(
            'legend' => 'Editora'
        ));

        // Configurações do Formulário
        $this->setName('cadastrarEditora')->setMethod(self::METHOD_POST)
                ->setAction("/editora/index/cadastrar")->setAttrib('class', 'form');
    }

    public function editarEditoraForm(\Core\Entity\BibliotecaInfantil\Editora $valueObject, $form, $id) {
        $form->setAction('/editora/index/editar')->setName('editarEditora');
        $form->getElement('submit')->setLabel("Salvar");
        $idEditora = new Zend_Form_Element_Hidden('idEditora');
        $form->addElement($idEditora);
        $form->getElement("idEditora")->setValue($id);
        $form->getElement("noEditora")->setValue($valueObject->getNoEditora());

        return $form;
    }

}

