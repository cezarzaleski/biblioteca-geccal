<?php

namespace Core\Models\Model;

class CicloModel extends \Core\Persist\Model {

    protected $_repositoryName = '\Core\Entity\BibliotecaInfantil\Ciclo';
    protected $_repositoryNameTurma = '\Core\Entity\BibliotecaInfantil\Turma';

    public function findBy($where, $order = null, $limit = 100, $offset = 0) {
        return $this->getRepository()->findBy($where, $order, $limit, $offset);
    }

    public function findByCicloTurma($nuAno, $idCiclo) {
        $params = array(1 => TRUE, 2 => $nuAno);
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb2 = $qb;

        $qb2->select('CC.idCiclo')
                ->from($this->_repositoryNameTurma, "T")
                ->innerJoin('T.idCiclo', 'CC')
                ->where('T.stAtivo = ?1 AND T.nuAno=?2');

        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('C.idCiclo, C.noCiclo')
                ->from($this->_repositoryName, "C")
                ->where($qb->expr()->notIn('C.idCiclo', $qb2->getDQL()));

        if ($idCiclo) {
            $qb->orwhere('C.idCiclo =?3');
            $params[3]=$idCiclo;
        }
        $qb->setParameters($params);
        $query = $qb->getQuery();
        $results = $query->getArrayResult();

        return $results;
    }
    
    public function findByCicloEvangelizando($nuAno){
        $params = array(1 => TRUE, 2 => $nuAno);
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb2 = $qb;

        $qb2->select('CC.idCiclo')
                ->from($this->_repositoryNameTurma, "T")
                ->innerJoin('T.idCiclo', 'CC')
                ->where('T.stAtivo = ?1 AND T.nuAno=?2');

        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('C.idCiclo, C.noCiclo')
                ->from($this->_repositoryName, "C")
                ->where($qb->expr()->in('C.idCiclo', $qb2->getDQL()));

        
        $qb->setParameters($params);
        $query = $qb->getQuery();
        $results = $query->getArrayResult();

        return $results;
    }

}
