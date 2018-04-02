<?php

namespace Core\Models\Model;

class ColaboradorModel extends \Core\Persist\Model {

    protected $_repositoryName = '\Core\Entity\BibliotecaInfantil\Colaborador';
    protected $_repositoryNameUser = '\Core\Entity\BibliotecaInfantil\Usuario';
    protected $_repositoryNameColTurma = '\Core\Entity\BibliotecaInfantil\ColaboradorTurma';

    public function findBy($where, $order = null, $limit = 1000000, $offset = 0) {
        return $this->getRepository()->findBy($where, $order, $limit, $offset);
    }

    public function findByColaboradorNovoUsuario() {

        $params = array(1 => TRUE);

        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb2 = $qb;

        $qb2->select('CC.idColaborador')
                ->from($this->_repositoryNameUser, "U")
                ->innerJoin('U.idColaborador', 'CC')
                ->where('U.stAtivo = ?1');

        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('C.idColaborador, C.noColaborador')
                ->from($this->_repositoryName, "C")
                ->where($qb->expr()->notIn('C.idColaborador', $qb2->getDQL()))
                ->setParameters($params);


        $query = $qb->getQuery();
        $results = $query->getArrayResult();


        return $results;
    }

    public function findByColaboradorTurma($nuAno) {

        $params = array(1 => TRUE, 2 => $nuAno,3=>TRUE);

        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb2 = $qb;

        $qb2->select('CC.idColaborador')
                ->from($this->_repositoryNameColTurma, "CT")
                ->innerJoin('CT.idColaborador', 'CC')
                ->innerJoin('CT.idTurma', 'T')
                ->where('CT.stAtivo = ?1 AND T.nuAno=?2');

        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('C.idColaborador, C.noColaborador')
                ->from($this->_repositoryName, "C")
                ->where($qb->expr()->notIn('C.idColaborador', $qb2->getDQL()))
                ->andWhere("C.stAtivo=?3")
                ->setParameters($params);


        $query = $qb->getQuery();
        $results = $query->getArrayResult();


        return $results;
    }

}
