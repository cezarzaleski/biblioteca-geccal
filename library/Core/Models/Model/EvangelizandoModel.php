<?php

namespace Core\Models\Model;

class EvangelizandoModel extends \Core\Persist\Model {

    protected $_repositoryName = '\Core\Entity\BibliotecaInfantil\Evangelizando';
    protected $_repositoryNameEvTurma = '\Core\Entity\BibliotecaInfantil\EvangelizandoTurma';

    public function findBy($where, $order = null, $limit = 1000000, $offset = 0) {
        return $this->getRepository()->findBy($where, $order, $limit, $offset);
    }

    public function findByEvangelizandoTurma($idadeMinima, $idadeMaxima, $nuAno) {
        $params = array(1 => TRUE, 2 => $nuAno,3 => TRUE);
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb2 = $qb;
        $qb2->select('EE.idEvangelizando')
                ->from($this->_repositoryNameEvTurma, "ET")
                ->innerJoin('ET.idEvangelizando', 'EE')
                ->innerJoin('ET.idTurma', 'T')
                ->where('ET.stAtivo = ?1 AND T.nuAno = ?2 AND EE.stAtivo =?3');

        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('E.idEvangelizando, E.noEvangelizando,E.noSexo, E.dtNascimento')
                ->from($this->_repositoryName, "E")
		->where("E.stAtivo = TRUE")	
                ->andWhere($qb->expr()->notIn('E.idEvangelizando', $qb2->getDQL()));
        if ($idadeMinima) {
            $idParam = count($params) + 1;
            $params[$idParam] = $idadeMinima;
            $where = "E.dtNascimento <=?" . $idParam;
            $qb->andWhere($where);
            $qb->setParameters($params);
        }
        if ($idadeMaxima) {
            $idParam = count($params) + 1;
            $params[$idParam] = $idadeMaxima;
            $where = "E.dtNascimento >=?" . $idParam;
            $qb->andWhere($where);
            $qb->setParameters($params);
        }
        $qb->orderBy("E.dtNascimento","DESC")->setParameters($params);
        $query = $qb->getQuery();
        $results = $query->getArrayResult();

        return $results;
    }
}
