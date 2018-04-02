<?php

namespace Core\Models\Model;
class AutorModel extends \Core\Persist\Model
{
    protected $_repositoryName = '\Core\Entity\BibliotecaInfantil\Autor';
    
       
    public function findBy($where, $order=null, $limit=100, $offset=0)
    {
    	return $this->getRepository()->findBy($where, $order,$limit, $offset);
    }
    
    
}
