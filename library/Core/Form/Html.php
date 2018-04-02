<?php

class Core_Form_Html extends Zend_Form_Element_Xhtml
{
	public $helper = 'formNote';
	
	public function isValid($value, $context = null) {
		return true;
	}

}