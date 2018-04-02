<?php

namespace Core\Persist;
use Doctrine\ORM\Query\ResultSetMapping;

abstract class Model
{
    /**
    * @access protected
    * @var string
    */
    protected $_repositoryName;

    /**
     * @access protected
     * @var string
     */
    protected $doctrine;

    /**
     * @access protected
     * @var string
     */
    protected $objectCurrent;
    
    /**
     * @access protected
     * @var string
     */
    protected $dataSource;

    public function  __construct ()
    {
        $this->doctrine = \Zend_Registry::get('doctrine');
    }
    
    public function getEntityManager ()
    {
        return $this->doctrine->getEntityManager($this->dataSource);
    }
    
    public function getRepository()
    {
        try {
            return $this->getEntityManager()->getRepository($this->_repositoryName);
        } catch(Exception $e) {
            throw new $ex->getMessage();
        }
    }

    public function findAll ()
    {
        try {
            return ($this->getRepository()->findAll());
        } catch(Exception $e) {
            throw new $ex->getMessage();
        }
    }

    public function find ($id)
    {
        try {
            $this->objectCurrent = ($this->getEntityManager()->find($this->_repositoryName,$id));
            return $this->objectCurrent;
        } catch(Exception $e) {
            throw new $ex->getMessage();
        }
    }

    public function select ($dql,$param=array(), $isObject=true, $getSQL=false)
    {
        try {
            if (true==$getSQL) {
               xd($this->getEntityManager()->createQuery($dql)->getSQL(),TRUE);
            } else {
                 $query = $this->getEntityManager()->createQuery($dql);

                 if($param){
                    foreach($param as $key=>$value){
                        $query->setParameter($key, $value);
                    }
                 }

                if(true==$isObject){
                    return $query->getResult();
                } else {
                    return $query->getArrayResult();
                }
            }
        } catch(Exception $e) {
            throw new $ex->getMessage();
        }
    }

    public function sqlNative ($sql,ResultSetMapping $mapper,Array $param=NULL,$isObject=true)
    {
        try {
            $query = $this->getEntityManager()->createNativeQuery($sql, $mapper);

            if($param){
                foreach($param as $key=>$value){
                    $query->setParameter($key, $value);
                }
             }
            $this->getEntityManager()->close();
            if(true==$isObject){
                 return $query->getResult();
            } else {
                return $query->getArrayResult();
            }

        } catch(Exception $e) {
            throw new $ex->getMessage();
        }
    }

    public function delete ($valueObject)
    {
    	$this->getEntityManager()->getConnection()->beginTransaction();
        try {
            $this->getEntityManager()->remove($valueObject);
            $this->getEntityManager()->flush();
            $this->getEntityManager()->getConnection()->commit();
        } catch(Exception $e) {
            $this->getEntityManager()->getConnection()->rollback();
            $this->getEntityManager()->close();
            throw new $ex->getMessage();
        }
    }

    public function update ($valueObject)
    {
    	$this->getEntityManager()->getConnection()->beginTransaction();
        try {
            $this->getEntityManager()->merge($valueObject);
            $this->getEntityManager()->flush();
            $this->getEntityManager()->getConnection()->commit();
            return $valueObject;
        } catch(Exception $e) {
            $this->getEntityManager()->getConnection()->rollback();
            $this->getEntityManager()->close();
            throw new $ex->getMessage();
        }
    }

    public function save ($valueObject)
    {
    	$this->getEntityManager()->getConnection()->beginTransaction();
        try {
            $this->getEntityManager()->persist($valueObject);
            $this->getEntityManager()->flush();
            $this->getEntityManager()->getConnection()->commit();

            return $valueObject;
        } catch(Exception $e) {
           $this->getEntityManager()->getConnection()->rollback();
           $this->getEntityManager()->close();
           throw new $ex->getMessage();
        }
    }
    
    public function objectToArray ($object, $convertChildObject = TRUE)
    {
    	if (is_object($object))
    	{
    		$className = get_class ($object);
    		$methods = get_class_methods($className);
    		foreach ($methods as $value) {
    			if (('get' == substr($value, 0, 3)) && ($value != 'getTableName')) {
    				//$var = lcfirst(str_replace('get', '', $value));
    				$var = lcfirst(substr($value, 3));
    				$val = $object->$value();
    
    				if ((is_object($val)) && ($convertChildObject)) {
    					$val = $this->objectToArray($val);
    				}
    
    				if ($val) {
    					$arr[$var] = $val;
    				}
    			}
    		}
    
    		return $arr;
    	}
    }
    
    public function getObjectCurrent ($valueObject)
    {
    	$arrValue = $this->objectToArray($valueObject);
    	foreach ($arrValue as $value => $key) {
    		$objectCurrent = $this->find($key);
    		break;
    	}
    
    	return $objectCurrent;
    }
    
    public function getDiffObject ($valueObject)
    {
    	if (!$this->objectCurrent) {
    		$this->objectCurrent = $this->getObjectCurrent($valueObject);
    	}
    	$arrCurrent = $this->objectToArray($this->objectCurrent);
    	$arrMerge = $this->objectToArray($valueObject);
    	return array_diff($arrCurrent, $arrMerge);
    }
}