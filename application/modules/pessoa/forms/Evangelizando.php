<?php

/**
 * Formulário de evangelizando
 * @author Cezar Zaleski
 * @see APPLICATION_PATH/pessoa/forms/Evangelizando.php
 */
class Pessoa_Form_Evangelizando extends Zend_Form {

    protected $_cripografia;

    public function init() {
        $this->_cripografia = Zend_Controller_Action_HelperBroker::getStaticHelper('Criptografia');

        $noEvangelizando = new Zend_Form_Element_Text('noEvangelizando',
                        array("class" => "validate[required]",
                            "tabindex" => "1",
                            "title" => "Nome do Colaborador"));
        $noEvangelizando->setRequired(true)->setLabel('Nome do Evangelizando*:');
        $this->addElement($noEvangelizando);

        $noPai = new Zend_Form_Element_Text('noPai',
                        array("tabindex" => "2",
                            "title" => "Nome do Pai"));
        $noPai->setLabel('Pai:');
        $this->addElement($noPai);

        $noMae = new Zend_Form_Element_Text('noMae',
                        array("tabindex" => "3",
                            "title" => "Nome da Mãe"));
        $noMae->setLabel('Nome da Mãe:');
        $this->addElement($noMae);

        $nuCep = new Zend_Form_Element_Text('nuCep',
                        array("tabindex" => "4",
                            "title" => "CEP",
                            "maxlength" => "9"));
        $nuCep->setLabel('CEP:');
        $this->addElement($nuCep);

        $endereco = new Zend_Form_Element_Text('noEndereco',
                        array("tabindex" => "5",
                            "title" => "Endereço",
                            "maxlength" => "150"));
        $endereco->setLabel('Endereço:');
        $this->addElement($endereco);

        $bairro = new Zend_Form_Element_Text('noBairro',
                        array("tabindex" => "6",
                            "title" => "Bairro",
                            "maxlength" => "20"));
        $bairro->setLabel('Bairro:');
        $this->addElement($bairro);

        $cidade = new Zend_Form_Element_Text('noCidade',
                        array("tabindex" => "7",
                            "title" => "Cidade",
                            "maxlength" => "45"));
        $cidade->setLabel('Cidade:');
        $this->addElement($cidade);

        $nuFoneRes = new Zend_Form_Element_Text('nuFoneRes',
                        array("tabindex" => "8",
                            "title" => "Telefone",
                            "maxlength" => "14"));
        $nuFoneRes->setLabel('Telefone:');
        $this->addElement($nuFoneRes);

        $nuFoneCel = new Zend_Form_Element_Text('nuFoneCel',
                        array("tabindex" => "9",
                            "title" => "Telefone 2",
                            "maxlength" => "14"));
        $nuFoneCel->setLabel('Telefone2:');
        $this->addElement($nuFoneCel);

        $noSexo = new Zend_Form_Element_Select('noSexo', array("tabindex" => "10",
                    "title" => "Sexo", "class" => "validate[required]"));



        $noSexo->addMultiOption(NULL, "Selecione...");
        $noSexo->addMultiOption("Feminino", "Feminino");
        $noSexo->addMultiOption("Masculino", "Masculino");
        $noSexo->setRequired(true)->setLabel('Sexo*:');
        $this->addElement($noSexo);

        $dtNascimento = new Zend_Form_Element_Text('dtNascimento',
                        array("tabindex" => "9",
                            "title" => "Data de Nasciemnto",
                            "maxlength" => "14"));
        $dtNascimento->setLabel('Data de Nascimento:');
        $this->addElement($dtNascimento);


        $idCiclo = new Zend_Form_Element_Select('idCiclo', array("tabindex" => "11",
                    "title" => "Ciclo"));
        $idCiclo->setRequired(false)->setLabel('Ciclo:');
        $this->addElement($idCiclo);

        // Botão de Envio
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setIgnore(true)->setLabel('Cadastrar');
        $this->addElement($submit);

        //legend e fieldset 
        $this->addDisplayGroup(array('noEvangelizando', 'noPai', 'noMae', 'nuCep', 'noEndereco',
            'noBairro', 'noCidade', 'nuFoneRes', 'nuFoneCel', 'noSexo', 'dtNascimento', 'idCiclo', 'submit'), 'legend', array(
            'legend' => 'Evangelizando'));

        // Configurações do Formulário
        $this->setName('cadastrarEvangelizando')->setMethod(self::METHOD_POST)
                ->setAction("/pessoa/evangelizando/cadastrar")->setAttrib('class', 'form');
        $this->carregarCiclo($idCiclo);
    }

    public function editarEvangelizandoForm(\Core\Entity\BibliotecaInfantil\Evangelizando $valueObject, $form, $id) {
        $form->setAction('/pessoa/evangelizando/editar')->setName('editarColaborador');
        $form->getElement('submit')->setLabel("Salvar");
        $idEvangelizando = new Zend_Form_Element_Hidden('idEvangelizando');
        $form->addElement($idEvangelizando);
        $form->getElement("idEvangelizando")->setValue($id);
        $form->getElement("noEvangelizando")->setValue($valueObject->getNoEvangelizando());
        $form->getElement("noPai")->setValue($valueObject->getNoPai());
        $form->getElement("noMae")->setValue($valueObject->getNoMae());
        $form->getElement("nuCep")->setValue($valueObject->getNuCep());
        $form->getElement("noEndereco")->setValue($valueObject->getNoEndereco());
        $form->getElement("noBairro")->setValue($valueObject->getNoBairro());
        $form->getElement("noCidade")->setValue($valueObject->getNoCidade());
        $form->getElement("nuFoneRes")->setValue($valueObject->getNuFoneRes());
        $form->getElement("nuFoneCel")->setValue($valueObject->getNuFoneCel());
        $form->getElement("noSexo")->setValue($valueObject->getNoSexo());
        if ($valueObject->getDtNascimento()) {
            $form->getElement("dtNascimento")->setValue($valueObject->getDtNascimento()->format("d/m/Y"));
        }
        $form->removeElement('idCiclo');

        return $form;
    }

    private function carregarCiclo($idCiclo) {
        $turmaBusiness = new \Core\Models\Business\TurmaBusiness();
        $idCiclo->addMultiOption(NULL, "Selecione...");
        foreach ($turmaBusiness->findAll(date("Y")) as $val) {
            $idCiclo->addMultiOption($this->_cripografia->cripto($val->getIdTurma()), $val->getIdCiclo()->getNoCiclo());
        }
    }

}

