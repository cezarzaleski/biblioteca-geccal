<?php

namespace Core\WebSErvice;

class Corporativo extends \Zend_Soap_Client
{
	public function estadoById($sqEstado)
	{
		$client = new Zend_Soap_Client("url to wsdl", array('encoding' => 'UTF-8'));
		$result = $client->libCorpEstadoById($sqEstado);
		

	}
}
