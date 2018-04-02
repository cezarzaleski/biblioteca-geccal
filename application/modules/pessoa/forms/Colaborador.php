<?php

/**
 * Formulário de colaborador
 * @author Cezar Zaleski
 * @see APPLICATION_PATH/pessoa/forms/Colaborador.php
 */
class Pessoa_Form_Colaborador extends Zend_Form {
    
    protected $_cripografia;

    public function init() {
        $this->_cripografia = Zend_Controller_Action_HelperBroker::getStaticHelper('Criptografia');
        
        $noColaborador = new Zend_Form_Element_Text('noColaborador',
                        array("class" => "validate[required]",
                            "tabindex" => "1",
                            "title" => "Nome do Colaborador"));
        $noColaborador->setRequired(true)->setLabel('Nome do Colaborador*:');
        $this->addElement($noColaborador);

        $noEmail = new Zend_Form_Element_Text('noEmail',
                        array("tabindex" => "2",
                            "title" => "Email"));
        $noEmail->setLabel('Email:');
        $this->addElement($noEmail);

        $nuCep = new Zend_Form_Element_Text('nuCep',
                        array("tabindex" => "3",
                            "title" => "CEP",
                            "maxlength" => "9"));
        $nuCep->setLabel('CEP:');
        $this->addElement($nuCep);

        $endereco = new Zend_Form_Element_Text('noEndereco',
                        array("tabindex" => "4",
                            "title" => "Endereço",
                            "maxlength" => "45"));
        $endereco->setLabel('Endereço:');
        $this->addElement($endereco);

        $bairro = new Zend_Form_Element_Text('noBairro',
                        array("tabindex" => "5",
                            "title" => "Bairro",
                            "maxlength" => "20"));
        $bairro->setLabel('Bairro:');
        $this->addElement($bairro);

        $cidade = new Zend_Form_Element_Text('noCidade',
                        array("tabindex" => "6",
                            "title" => "Cidade",
                            "maxlength" => "45"));
        $cidade->setLabel('Cidade:');
        $this->addElement($cidade);

        $nuFoneRes = new Zend_Form_Element_Text('nuFoneRes',
                        array("tabindex" => "7",
                            "title" => "Telefone",
                            "maxlength" => "14"));
        $nuFoneRes->setLabel('Telefone:');
        $this->addElement($nuFoneRes);

        $nuFoneCel = new Zend_Form_Element_Text('nuFoneCel',
                        array("tabindex" => "8",
                            "title" => "Celular",
                            "maxlength" => "14"));
        $nuFoneCel->setLabel('Celular:');
        $this->addElement($nuFoneCel);

        $noSexo = new Zend_Form_Element_Select('noSexo', array("tabindex" => "9",
                    "title" => "Sexo", "class" => "validate[required]"));
        $noSexo->addMultiOption(NULL, "Selecione...");
        $noSexo->addMultiOption("Feminino", "Feminino");
        $noSexo->addMultiOption("Masculino", "Masculino");
        $noSexo->setRequired(true)->setLabel('Sexo*:');
        $this->addElement($noSexo);
        
        $idFunc = new Zend_Form_Element_Select('idFuncionalidade', array("tabindex" => "10",
                    "title" => "Função/Atividade", "class" => "validate[required]"));
        $idFunc->setRequired(true)->setLabel('Função/Atividade*:');
        $this->addElement($idFunc);

        // Botão de Envio
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setIgnore(true)->setLabel('Cadastrar');
        $this->addElement($submit);

        //legend e fieldset 
        $this->addDisplayGroup(array('noColaborador', 'noEmail', 'nuCep', 'noEndereco',
            'noBairro', 'noCidade', 'nuFoneRes', 'nuFoneCel', 'noSexo', 'idFuncionalidade','submit'), 'legend', array(
            'legend' => 'Colaborador'
        ));

        // Configurações do Formulário
        $this->setName('cadastrarColaborador')->setMethod(self::METHOD_POST)
                ->setAction("/pessoa/colaborador/cadastrar")->setAttrib('class', 'form');
        $this->carregarFuncao($idFunc);
    }

    public function editarColaboradorForm(\Core\Entity\BibliotecaInfantil\Colaborador $valueObject, $form, $id) {
        $form->setAction('/pessoa/colaborador/editar')->setName('editarColaborador');
        $form->getElement('submit')->setLabel("Salvar");
        $idColaborador = new Zend_Form_Element_Hidden('idColaborador');
        $form->addElement($idColaborador);
        $form->getElement("idColaborador")->setValue($id);
        $form->getElement("noColaborador")->setValue($valueObject->getNoColaborador());
        $form->getElement("noEmail")->setValue($valueObject->getNoEmail());
        $form->getElement("nuCep")->setValue($valueObject->getNuCep());
        $form->getElement("noEndereco")->setValue($valueObject->getNoEndereco());
        $form->getElement("noBairro")->setValue($valueObject->getNoBairro());
        $form->getElement("noCidade")->setValue($valueObject->getNoCidade());
        $form->getElement("nuFoneRes")->setValue($valueObject->getNuFoneRes());
        $form->getElement("nuFoneCel")->setValue($valueObject->getNuFoneCel());
        $form->getElement("noSexo")->setValue($valueObject->getNoSexo());
        $form->getElement("idFuncionalidade")->setValue($this->_cripografia->cripto($valueObject->getIdFunc()->getIdFunc()));

        return $form;
    }

    private function carregarFuncao($idFunc) {
        $funcaoAtividadeBusiness = new \Core\Models\Business\FuncaoAtividadeBusiness();
        $idFunc->addMultiOption(NULL, "Selecione...");
        foreach ($funcaoAtividadeBusiness->findAll() as $val) {
            $idFunc->addMultiOption($this->_cripografia->cripto($val->getIdFunc()), $val->getNoFuncao());
        }
    }

}

