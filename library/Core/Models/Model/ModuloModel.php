<?php

namespace Core\Models\Model;
class ModuloModel extends \Core\Persist\Model
{
    protected $_repositoryName = '\Core\Entity\BibliotecaInfantil\Modulo';
    
       
    public function findBy($where, $order=null, $limit=1000000, $offset=0)
    {
    	return $this->getRepository()->findBy($where, $order,$limit, $offset);
    }
    
}
