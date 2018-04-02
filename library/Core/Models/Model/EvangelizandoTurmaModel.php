<?php

namespace Core\Models\Model;

class EvangelizandoTurmaModel extends \Core\Persist\Model {

    protected $_repositoryName = '\Core\Entity\BibliotecaInfantil\EvangelizandoTurma';

    public function findBy($where, $order = null, $limit = 1000000, $offset = 0) {
        return $this->getRepository()->findBy($where, $order, $limit, $offset);
    }

    public function findByEvangelizandoTurma($idTurma, $nuAno) {
        $params = array(1 => $idTurma, 2 => TRUE, 3 => $nuAno);
        $qb = $this->getEntityManager()->createQueryBuilder()
                ->from($this->_repositoryName, "ET")
                ->select("E.idEvangelizandoTurma, E.noEvangelizando")
                ->innerJoin('ET.idEvangelizando', 'E')
                ->innerJoin('ET.idTurma', 'T')
                ->where('ET.stAtivo = ?1 AND T.idTurma =?2 AND T.nuAno = ?3')
                ->setParameters($params)
                ->orderBy('M.idModulo', 'ASC');

        $query = $qb->getQuery();
        $results = $query->getArrayResult();

        return $results;
    }
}
