<?php

class Application_Form_Login extends Zend_Form {

    public function init() {
        $this->addElements(
                array(
                    new Zend_Form_Element_Text('nuContrato',
                            array("class" => "form-txt required",
                                "tabindex" => "1",
                                "title" => "Número do Contrato",
                                "maxlength" => "10",
                                "validators" =>
                                array(
                                    array("NotEmpty", true,
                                        array("messages" =>
                                            array("isEmpty" => "Campo obrigatório")))))),
                    new Core_Form_Html("toolbar")
                )
        );
        //$this->addDisplayGroup(array('dePalavraChave', 'stAtivo', 'sqPalavraChave'), 'manterPalavraChave');
        //$group = $this->getDisplayGroup('manterPalavraChave');


        $value = "<div class='form-toolbar'>
					<input type='button' id='btNovoManterAditivo' value='Novo' />
					<input type='button' id='btPesquisarManterAditivo' value='Pesquisar' />
				 </div>";
        $this->getElement("toolbar")->setValue($value);
        $this->setElementDecorators(array('ViewHelper', array('Label', array('class' => 'form-lbl'))));
    }

}

