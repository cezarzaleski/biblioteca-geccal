<?php

namespace Core\Models\Model;

class EmprestimoModel extends \Core\Persist\Model {

    protected $_repositoryName = '\Core\Entity\BibliotecaInfantil\Emprestimo';

    public function findBy($where, $order = null, $limit = 1000000, $offset = 0) {
        return $this->getRepository()->findBy($where, $order, $limit, $offset);
    }

    public function findByPendencia($id, $opcao) {
        $params = array(1 => $id, 2 => TRUE);
        $qb = $this->getEntityManager()->createQueryBuilder()
                ->from($this->_repositoryName, "EMP")
                ->select("EMP.idEmprestimo,EMP.nuAno");
        if ($opcao == "evangelizando") {
            $qb->innerJoin('EMP.idEvangelizandoTurma', 'ET')
                    ->innerJoin('ET.idEvangelizando', 'E')
                    ->where("E.idEvangelizando =?1 AND EMP.idEvangelizandoTurma IS NOT NULL");
        } else if ($opcao == "colaborador") {
            $qb->innerJoin('EMP.idColaborador', 'C')
                    ->where("C.idColaborador =?1 AND EMP.idColaborador IS NOT NULL");
        }
        $qb->andWhere("EMP.stAtivo =?2 AND EMP.dtDevolucao IS NULL")
                ->setParameters($params)
                ->orderBy('EMP.dtEmprestimo', 'ASC');
        $query = $qb->getQuery();
        $results = $query->getArrayResult();

        return $results;
    }

    public function findByEmprestimoEvangelizando($idEvangelizando, $idTurma, $nuAno, $stEmprestimo) {
        $params = array(1 => TRUE);
        $qb = $this->getEntityManager()->createQueryBuilder()
                ->from($this->_repositoryName, "EE")
                ->select("EE.idEmprestimo, EE.dtEmprestimo, EE.dtPrevDevolucao,
                    EE.dtDevolucao, L.noLivro, L.nuExemplar, E.noEvangelizando, C.noCiclo, U.noUsuario")
                ->innerJoin('EE.idEvangelizandoTurma', 'ET')
                ->innerJoin('ET.idEvangelizando', 'E')
                ->innerJoin('EE.idLivro', 'L')
                ->innerJoin('EE.idUsuario', 'U')
                ->innerJoin('ET.idTurma', 'T')
                ->innerJoin('T.idCiclo', 'C')
                ->where("EE.stAtivo =?1 AND EE.idEvangelizandoTurma IS NOT NULL");

        if ($idEvangelizando) {
            $count = count($params);
            $params[$count + 1] = $idEvangelizando;
            $where = "E.idEvangelizando=?" . ($count + 1);
            $qb->andWhere($where);
        }
        if ($idTurma) {
            $count = count($params);
            $params[$count + 1] = $idTurma;
            $where = "T.idTurma=?" . ($count + 1);
            $qb->andWhere($where);
        }
        if ($nuAno) {
            $count = count($params);
            $params[$count + 1] = $nuAno;
            $where = "EE.nuAno=?" . ($count + 1);
            $qb->andWhere($where);
        }
        if ($stEmprestimo != "all") {
            if ($stEmprestimo == "emprestado") {
                $where = "EE.dtDevolucao IS NULL ";
            } else if ($stEmprestimo == "devolvido") {
                $where = "EE.dtDevolucao IS NOT NULL ";
            }
            $qb->andWhere($where);
        }
        $qb->setParameters($params)
                ->orderBy('EE.dtEmprestimo', 'DESC')
                ->orderBy('E.noEvangelizando', 'DESC');
        $query = $qb->getQuery();
        $results = $query->getArrayResult();
        return $results;
    }

    public function findByEmprestimoColaborador($idColaborador, $nuAno, $stEmprestimo) {
        $params = array(1 => TRUE);
        $qb = $this->getEntityManager()->createQueryBuilder()
                ->from($this->_repositoryName, "EC")
                ->select("EC.idEmprestimo, EC.dtEmprestimo, EC.dtPrevDevolucao,
                    EC.dtDevolucao, L.noLivro, L.nuExemplar, C.noColaborador, F.noFuncao, U.noUsuario")
                ->innerJoin('EC.idColaborador', 'C')
                ->innerJoin('C.idFunc', 'F')
                ->innerJoin('EC.idLivro', 'L')
                ->innerJoin('EC.idUsuario', 'U')
                ->where("EC.stAtivo =?1 AND EC.idColaborador IS NOT NULL");

        if ($idColaborador) {
            $count = count($params);
            $params[$count + 1] = $idColaborador;
            $where = "EC.idColaborador=?" . ($count + 1);
            $qb->andWhere($where);
        }
        if ($nuAno) {
            $count = count($params);
            $params[$count + 1] = $nuAno;
            $where = "EC.nuAno=?" . ($count + 1);
            $qb->andWhere($where);
        }
        if ($stEmprestimo != "all") {
            if ($stEmprestimo == "emprestado") {
                $where = "EC.dtDevolucao IS NULL ";
            } else if ($stEmprestimo == "devolvido") {
                $where = "EC.dtDevolucao IS NOT NULL ";
            }
            $qb->andWhere($where);
        }
        $qb->setParameters($params)
                ->orderBy('EC.dtEmprestimo', 'DESC')
                ->orderBy('C.noColaborador', 'DESC');
        $query = $qb->getQuery();
        $results = $query->getArrayResult();
        return $results;
    }

    public function findByYear($opcao) {
        $params = array(1 => TRUE);
        $qb = $this->getEntityManager()->createQueryBuilder()
                ->from($this->_repositoryName, "EM")
                ->select("EM.nuAno")
                ->where("EM.stAtivo =?1");
        
        if($opcao=="evangelizando"){
            $qb->andWhere("EM.idEvangelizandoTurma IS NOT NULL");
        }else if("colaborador"){
            $qb->andWhere("EM.idColaborador IS NOT NULL");
        }
        $qb->setParameters($params)
                ->orderBy('EM.dtEmprestimo', 'DESC');
        
        $query = $qb->getQuery();
        $results = $query->getArrayResult();
        return $results;
    }

}
