<?php

class Zend_Controller_Action_Helper_Paginator extends Zend_Controller_Action_Helper_Abstract {

    public function paginator($adaptador, $page, $qntItens=5) {
        
        $paginator = Zend_Paginator::factory($adaptador);
        $paginator->setCurrentPageNumber($page)->setItemCountPerPage(10000);
        Zend_Paginator::setDefaultScrollingStyle('Sliding');
        Zend_View_Helper_PaginationControl::setDefaultViewPartial('pagination.phtml');
        
        return $paginator;
    }

}