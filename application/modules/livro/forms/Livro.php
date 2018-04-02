<?php

/**
 * Formulário de livro
 * @author Cezar Zaleski
 * @see APPLICATION_PATH/livro/forms/Livro.php
 */
class Livro_Form_Livro extends Zend_Form {

    protected $_cripografia;

    public function init() {
        $this->_cripografia = Zend_Controller_Action_HelperBroker::getStaticHelper('Criptografia');

        $opcao = new Zend_Form_Element_Radio('opcao',
                        array("tabindex" => "1",
                            "separator" => ""));
        $opcao->addMultiOptions(array(
                    'cadastrarLivro' => 'Cadastrar Título',
                    'gerarExemplar' => 'Gerar Exemplar'))
                ->setValue("cadastrarLivro");
        $this->addElement($opcao);

        $noLivro = new Zend_Form_Element_Text('noLivro',
                        array("class" => "validate[required]",
                            "tabindex" => "1",
                            "title" => "Nome do Livro",
                            "maxlength" => "100"));
        $noLivro->setRequired(true)->setLabel('Nome do Livro*:');
        $this->addElement($noLivro);
        $idLivro = new Zend_Form_Element_Select('idLivro', array("title" => "Livro"));
        $idLivro->setRequired(true)->setLabel('Livro*:');
        $this->addElement($idLivro);

        $nuEdicao = new Zend_Form_Element_Text('nuEdicao',
                        array("tabindex" => "2",
                            "title" => "Número Edição",
                            "maxlength" => "11"));
        $nuEdicao->setLabel('Número Edição:');
        $this->addElement($nuEdicao);
        $nuAno = new Zend_Form_Element_Select('nuAno', array("tabindex" => "3",
                    "title" => "Ano"));
        $nuAno->addMultiOption(NULL, "Selecione...");
        $ano = date("Y");

        for ($cont = 1988; $cont <= $ano; $cont++) {
            $nuAno->addMultiOption($cont, $cont);
        }
        $nuAno->setLabel('Ano:');
        $this->addElement($nuAno);
        $idOrigemLivro = new Zend_Form_Element_Select('idOrigemLivro', array("tabindex" => "4",
                    "title" => "Origem Livro", "class" => "validate[required]"));
        $idOrigemLivro->setRequired(true)->setLabel('Origem*:');
        $this->addElement($idOrigemLivro);
        $idEditora = new Zend_Form_Element_Select('idEditora', array("tabindex" => "5",
                    "title" => "Editora", "class" => "validate[required]"));
        $idEditora->setRequired(true)->setLabel('Editora*:');
        $this->addElement($idEditora);

        $noObs = new Zend_Form_Element_Textarea('noObs',
                        array("tabindex" => "6",
                            "title" => "Observação"));
        $noObs->setLabel('Observação:');
        $this->addElement($noObs);

        $noMotivoExclusao = new Zend_Form_Element_Textarea('noMotivoExclusao',
                        array("class" => "validate[required]",
                            "title" => "Motivo Exclusão"));
        $noMotivoExclusao->setLabel('Motivo Exclusão:');
        $this->addElement($noMotivoExclusao);

        $nuExemplar = new Zend_Form_Element_Hidden('nuExemplar');
        $this->addElement($nuExemplar);

        $editora = new Zend_Form_Element_Hidden('editora');
        $this->addElement($editora);

        $autores = new Zend_Form_Element_Hidden('autores');
        $this->addElement($autores);


        // Botão de Envio
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setIgnore(true)->setLabel('Cadastrar');
        $this->addElement($submit);

        //legend e fieldset 
        $this->addDisplayGroup(array('noLivro', 'nuEdicao', 'nuAno', 'idOrigemLivro', 'idEditora', 'noObs', 'submit'), 'livro', array(
            'legend' => 'Livro'
        ));

        // Configurações do Formulário
        $this->setName('cadastrarEditora')->setMethod(self::METHOD_POST)
                ->setAction("/livro/livro/cadastrar")->setAttrib('class', 'form');
        $this->carregarEditora($idEditora);
        $this->carregarOrigemLivro($idOrigemLivro);
        $this->carregarLivro($idLivro);
    }

    public function editarLivroForm(\Core\Entity\BibliotecaInfantil\Livro $valueObject, $form, $id) {
        $form->getElement('submit')->setLabel("Salvar");
        $idLivro = new Zend_Form_Element_Hidden('idLivro');
        $form->addElement($idLivro);
        $form->getElement("idLivro")->setValue($id);
        $form->getElement("noLivro")->setValue($valueObject->getNoLivro());
        $form->getElement("nuEdicao")->setValue($valueObject->getNuEdicao());
        $form->getElement("nuAno")->setValue($valueObject->getNuAno());
        $form->getElement("idOrigemLivro")->setValue($this->_cripografia->cripto($valueObject->getIdOrigemLivro()->getIdOrigemLivro()));
        $form->getElement("idEditora")->setValue($this->_cripografia->cripto($valueObject->getIdEditora()->getIdEditora()));
        $form->getElement("noObs")->setValue($valueObject->getNoObs());

        return $form;
    }

    private function carregarOrigemLivro($idOrigemLivro) {
        $origemLivroBusiness = new \Core\Models\Business\OrigemLivroBusiness();
        $idOrigemLivro->addMultiOption(NULL, "Selecione...");

        foreach ($origemLivroBusiness->findAll() as $val) {
            $idOrigemLivro->addMultiOption($this->_cripografia->cripto($val->getIdOrigemLivro()), $val->getNoOrigem());
        }
    }

    private function carregarEditora($idEditora) {
        $editoraBusiness = new \Core\Models\Business\EditoraBusiness();
        $idEditora->addMultiOption(NULL, "Selecione...");

        foreach ($editoraBusiness->findAll() as $val) {
            $idEditora->addMultiOption($this->_cripografia->cripto($val->getIdEditora()), $val->getNoEditora());
        }
    }

    private function carregarLivro($idLivro) {
        $livroBusiness = new \Core\Models\Business\LivroBusiness();
        $idLivro->addMultiOption(NULL, "Selecione...");
        foreach ($livroBusiness->findByLivroGerarExemplar() as $val) {
            $idLivro->addMultiOption($val['noLivro'], $val['noLivro']);
        }
    }

}

