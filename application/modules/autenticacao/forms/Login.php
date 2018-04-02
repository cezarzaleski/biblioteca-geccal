<?php

/**
 * Formulário de Login
 * @author Cezar Zaleski
 * @see APPLICATION_PATH/autenticacao/forms/Login.php
 */
class Autenticacao_Form_Login extends Zend_Form {

    public function init() {

        //Nome de Usuario
        $noUsuario = new Zend_Form_Element_Text('noUsuario',
                        array("class" => "validate[required]",
                            "tabindex" => "1",
                            "title" => "Nome de Usuário",
                            "maxlength" => "17"));
        $noUsuario->setRequired(true)->setLabel('Nome de Usuário');
        $this->addElement($noUsuario);

        //Senha
        $senha = new Zend_Form_Element_Password('senha',
                        array("class" => "validate[required]",
                            "tabindex" => "2",
                            "title" => "Senha",
                            "maxlength" => "17"));
        $senha->setRequired(true)->setLabel('Senha');
        $this->addElement($senha);



        // Botão de Envio
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setIgnore(true)->setLabel('Login');
        $this->addElement($submit);

        //legend e fieldset 
        $this->addDisplayGroup(array('noUsuario', 'senha', 'submit', 'username'), 'geral', array(
            'legend' => 'Login'
        ));

        // Configurações do Formulário
        $this->setName('autenticacao')->setMethod(self::METHOD_POST)
                ->setAction("/autenticacao/index/login");
    }

}

