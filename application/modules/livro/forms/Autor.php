<?php

/**
 * Formulário de autor
 * @author Cezar Zaleski
 * @see APPLICATION_PATH/livro/forms/Autor.php
 */
class Livro_Form_Autor extends Zend_Form {
    
    protected $_myhelper;

    public function init() {
        //Nome de Editora

        $noAutor = new Zend_Form_Element_Text('noAutor',
                        array("class" => "validate[required]",
                            "tabindex" => "1",
                            "title" => "Nome do Autor",
                            "maxlength" => "45"));
        $noAutor->setRequired(true)->setLabel('Nome do Autor*:');
        $this->addElement($noAutor);

        // Botão de Envio
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setIgnore(true)->setLabel('Cadastrar');
        $this->addElement($submit);

        //legend e fieldset 
        $this->addDisplayGroup(array('noAutor', 'submit'), 'legend', array(
            'legend' => 'Autor'
        ));

        // Configurações do Formulário
        $this->setName('cadastrarAutor')->setMethod(self::METHOD_POST)
                ->setAction("/autor/index/cadastrar")->setAttrib('class', 'form');
    }

    public function editarAutorForm(\Core\Entity\BibliotecaInfantil\Autor $valueObject, $form, $id) {
        $form->setAction('/autor/index/autor')->setName('editarAutor');
        $form->getElement('submit')->setLabel("Salvar");
        $idAutor = new Zend_Form_Element_Hidden('idAutor');
        $form->addElement($idAutor);
        $form->getElement("idAutor")->setValue($id);
        $form->getElement("noAutor")->setValue($valueObject->getNoAutor());
        
        return $form;
              
    }

}

