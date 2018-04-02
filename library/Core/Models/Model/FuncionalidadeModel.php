<?php

namespace Core\Models\Model;

class FuncionalidadeModel extends \Core\Persist\Model {

    protected $_repositoryName = '\Core\Entity\BibliotecaInfantil\Funcionalidade';

    public function findBy($where, $order = null, $limit = 1000000, $offset = 0) {

        return $this->getRepository()->findBy($where, $order, $limit, $offset);
    }

    /**
     * findByFuncAutorizacao
     *
     * @return retorna as funcionalidades para autorização ACL
     */
    public function findByFuncAutorizacao() {
        $params = array(1 => true, 2 => true, 3 => true, 4 => true);
        $qb = $this->getEntityManager()->createQueryBuilder()
                ->from($this->_repositoryName, "F")
                ->select("F.idFuncionalidade,F.noMenu, 
                    C.noController, TP.noTipoFuncionalidade, M.noModulo, M.noMenu as modMenu, M.idModulo")
                ->innerJoin('F.idController', 'C')
                ->innerJoin('C.idModulo', 'M')
                ->innerJoin('F.idTipoFuncionalidade', 'TP')
                ->where('F.stAtivo=?1 AND M.stAtivo=?2 AND TP.stAtivo=?3 AND C.stAtivo=?4')
                ->setParameters($params)
                ->orderBy('M.idModulo', 'ASC');

        $query = $qb->getQuery();
        $results = $query->getArrayResult();


        return $results;
    }

    public function findByFuncModulo($idModulo, $noMenuFunc, $idPerfil) {
        $params = array(1 => true, 2 => $idModulo);
        $qb = $this->getEntityManager()->createQueryBuilder()
                ->from($this->_repositoryName, "F")
                ->select("F.idFuncionalidade,F.noMenu, 
                    C.noController, C.noSubmodulo, TP.noTipoFuncionalidade, M.noModulo, M.noMenu as modMenu, M.idModulo")
                ->innerJoin('F.idController', 'C')
                ->innerJoin('C.idModulo', 'M')
                ->innerJoin('F.idTipoFuncionalidade', 'TP')
                ->innerJoin('F.idPerfil', 'P');

        $count = count($params);
        if ($idPerfil) {
            $params[$count + 1] = $idPerfil;

            $where = "F.stAtivo=?1 AND M.idModulo=?2 AND P.idPerfil=?" . ($count + 1);

            $qb->where($where);
        } else {
            $qb->where('F.stAtivo=?1 AND M.idModulo=?2');
        }
      
        if ($noMenuFunc) {
            $count = count($params);
            $params[$count + 1] = "";

            $where = 'F.noMenu !=?' . ($count + 1);
            $qb->andWhere($where);
        }
        $qb->setParameters($params)
                ->orderBy('M.idModulo', 'ASC');
        $query = $qb->getQuery();
        $results = $query->getArrayResult();

        return $results;
    }

    public function findByFuncController($idController, $idPerfil) {
        $params = array(1 => true, 2 => $idController);
        $qb = $this->getEntityManager()->createQueryBuilder()
                ->from($this->_repositoryName, "F")
                ->select("F.idFuncionalidade, TP.noTipoFuncionalidade")
                ->innerJoin('F.idTipoFuncionalidade', 'TP');

        $where = "F.stAtivo=?1 AND F.idController=?2";
        if ($idPerfil) {
            $params[3] = $idPerfil;
            $qb->innerJoin('F.idPerfil', 'P');
            $where .=' AND P.idPerfil =?3';
        }

        $qb->where($where)
                ->setParameters($params)
                ->orderBy('TP.noTipoFuncionalidade', 'ASC');
        $query = $qb->getQuery();
        $results = $query->getArrayResult();


        return $results;
    }

}
