<?php

/**
 * Formulário de Funcao Atividade
 * @author Cezar Zaleski
 * @see APPLICATION_PATH/admin/forms/FuncaoAtividade.php
 */
class Admin_Form_FuncaoAtividade extends Zend_Form {
    

    public function init() {
        $noFuncao = new Zend_Form_Element_Text('noFuncao',
                        array("class" => "validate[required]",
                            "tabindex" => "1",
                            "title" => "Nome Editora",
                            "maxlength" => "45"));
        $noFuncao->setRequired(true)->setLabel('Nome da Função/Atividade*:');
        $this->addElement($noFuncao);

        // Botão de Envio
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setIgnore(true)->setLabel('Cadastrar');
        $this->addElement($submit);

        //legend e fieldset 
        $this->addDisplayGroup(array('noFuncao', 'submit'), 'legend', array(
            'legend' => 'Função/Atividade'
        ));

        // Configurações do Formulário
        $this->setName('cadastrarFuncaoAtividade')->setMethod(self::METHOD_POST)
                ->setAction("/funcao-atividade/index/cadastrar")->setAttrib('class', 'form');
    }

    public function editarEditoraForm(\Core\Entity\BibliotecaInfantil\FuncaoAtividade $valueObject, $form, $id) {
        $form->setAction('/funcao-atividade/index/editar')->setName('editarFuncaoAtividade');
        $form->getElement('submit')->setLabel("Salvar");
        $idFunc = new Zend_Form_Element_Hidden('idFunc');
        $form->addElement($idFunc);
        $form->getElement("idFunc")->setValue($id);
        $form->getElement("noFuncao")->setValue($valueObject->getNoFuncao());
        
        return $form;
              
    }

}

