<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    public function _initView() {

        $this->bootstrap("layout");
        $layout = $this->getResource("layout");
        $view = $layout->getView();
        Zend_Layout::getMvcInstance()->setLayout('layout');

        $view->addHelperPath("ZendX/JQuery/View/Helper", "ZendX_JQuery_View_Helper");
        $view->jQuery()
                ->enable()
                ->uiEnable()
                ->setLocalPath('/js/structure/jquery.min.js')
                ->setUiLocalPath("/js/structure/ui/js/jquery-ui-1.8.17.custom.min.js");

        $view->doctype('HTML5');
        $view->setEncoding('UTF-8');

        $view->headLink()->headLink(array('rel' => 'shortcut icon',
            'href' => $this->baseUrl('/img/structure/icons/geccal.ico'),
            'type' => 'image/icon'), 'PREPEND');
        $view->headLink()->prependStylesheet($this->baseUrl("/css/structure/geral.css"))
                ->prependStylesheet("/css/structure/validationEngine.css")
                ->prependStylesheet("/css/structure/jquery.ui.css")
                ->prependStylesheet("/css/structure/chosen.css")
                ->prependStylesheet("/css/structure/messi.css")
                ->prependStylesheet("/css/structure/form-style.css")
                ->prependStylesheet("/css/structure/menu.css")
                ->prependStylesheet("/css/structure/multiselect.css")
                ->prependStylesheet("/css/structure/prompt.css")
                ->prependStylesheet("/css/structure/modal.css")
        		->prependStylesheet("/css/structure/tabela-style.css")
        		->prependStylesheet("/css/structure/table.css")
 		        ->prependStylesheet("/css/structure/jquery.dataTables.css");

        // Scripts js
        $view->headScript()->appendFile('/js/structure/jquery.validationEngine-pt_BR.js')
                ->appendFile('/js/structure/jquery.maskedInput.js')
                ->appendFile('/js/structure/chosen.js')
                ->appendFile('/js/structure/jquery.dataTables.min.js')
                ->appendFile('/js/structure/jquery.validationEngine.js')
                ->appendFile('/js/structure/application.js')
                ->appendFile('/js/structure/jquery.quicksearch.js')
                ->appendFile('/js/structure/jquery.multi-select.min.js')
                ->appendFile('/js/structure/messi.js')
                ->appendFile('/js/structure/jquery-impromptu.3.1.min.js')
                ->appendFile('/js/structure/jquery.sumdate-1.1.0.js')
                ->appendFile('/js/structure/menu.js')
                ->appendFile('/js/structure/geral.js');


        $view->headMeta()->appendHttpEquiv('Content-Type', 'text/html; charset=UTF-8')
                ->appendHttpEquiv('Content-Language', 'pt-BR')
                ->appendName('author', "Cezar Zaleski")
                ->appendName('publisher', "Biblioteca Infantil - GECCAL")
                ->appendName('rating', "General")
                ->appendName('expires', "0")
                ->appendName('language', "portuguese, PT-BR")
                ->appendName('description', "Biblioteca Infantil - GECCAL, Grupo Espírita Cristão a Caminho da Luz, desde 1971.")
                ->appendName('keywords', "Biblioteca Infantil GECCAL, Biblioteca Infantil,GECCAL,Grupo Espírita Cristão à Caminho da Luz,espiritismo,espírita");

        $view->headTitle("Biblioteca Infantil - GECCAL")
                ->setSeparator(" - ");

        $viewRenderer = new Zend_Controller_Action_Helper_ViewRenderer();
        $viewRenderer->setView($view);
        Zend_Controller_Action_HelperBroker::addHelper($viewRenderer);
        $viewRenderer->view->addBasePath(APPLICATION_PATH . '/layouts/');
        $viewRenderer->view->addHelperPath(APPLICATION_PATH . '/helpers/');
    }

    protected function _initConfig() {
        $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini',
                        APPLICATION_ENV);
        Zend_Registry::getInstance()->set('config', $config);
    }

    protected function _initFlashMessenger() {
        /** @var $flashMessenger Zend_Controller_Action_Helper_FlashMessenger */
        $flashMessenger = Zend_Controller_Action_HelperBroker::getStaticHelper('FlashMessenger');
        if ($flashMessenger->hasMessages()) {
            $view = $this->getResource('view');
            $view->messages = $flashMessenger->getMessages();
        }
    }

    public function _initAutoloaderNamespaces() {
        require_once APPLICATION_PATH . '/../library/Doctrine/Common/ClassLoader.php';
        $autoloader = \Zend_Loader_Autoloader::getInstance();
        $fmmAutoloader = new \Doctrine\Common\ClassLoader('Bisna');
        $autoloader->pushAutoloader(array($fmmAutoloader, 'loadClass'), 'Bisna');
        $fmmAutoloader = new \Doctrine\Common\ClassLoader('Bisna');
        $autoloader->pushAutoloader(array($fmmAutoloader, 'loadClass'), 'Core');
    }

    public function _initAcl() {
        $acl = Zend_Controller_Front::getInstance();
        $acl->registerPlugin(new Core_Security_Autorizacao());
    }

    public function _initSecurity() {
        $zfc = Zend_Controller_Front::getInstance();
        $zfc->registerPlugin(new Core_Security_Login());
    }

}

