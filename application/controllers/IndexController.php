<?php

class IndexController extends Core_Controller_Action
{

    public function init()
    {
    	$this->_helper->cache(array('index'), array('indexaction'));
    }

    public function indexAction()
    {
    	//$this->view->menuExterno =  $_SESSION['USER']->MenuExterno;
    }
}

