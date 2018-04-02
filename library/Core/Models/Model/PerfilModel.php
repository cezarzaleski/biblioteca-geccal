<?php

namespace Core\Models\Model;

use Doctrine\ORM\Query\AST\Functions\LowerFunction,
    Doctrine\ORM\QueryBuilder,
    Doctrine\ORM\AbstractQuery;

class PerfilModel extends \Core\Persist\Model {

    protected $_repositoryName = '\Core\Entity\BibliotecaInfantil\Perfil';
    protected $_repositoryNameS = '\Core\Entity\BibliotecaInfantil\Submodulo';

    public function findBy($where, $order = null, $limit = 1000000, $offset = 0) {
        return $this->getRepository()->findBy($where, $order, $limit, $offset);
    }

    /**
     * findByFuncModulo
     *
     * @param id_perfil
     * @return retorna as funcionalidades do perfil
     */
    public function findByFuncPerfil($idPerfil) {
        $params = array(1 => $idPerfil, 2 => TRUE);
        $qb = $this->getEntityManager()->createQueryBuilder()
                ->from($this->_repositoryName, "P")
                ->select("F.idFuncionalidade, F.noFuncionalidade, 
                    F.noMenu, C.noController, TP.noTipoFuncionalidade, 
                    M.noModulo, M.noMenu as modMenu, M.idModulo")
                ->innerJoin('P.idFuncionalidade', 'F')
                ->innerJoin('F.idController', 'C')
                ->innerJoin('C.idModulo', 'M')
                ->innerJoin('F.idTipoFuncionalidade', 'TP')
                ->where('P.idPerfil = ?1 AND P.stAtivo = ?2 ')
                ->setParameters($params)
                ->orderBy('M.idModulo', 'ASC');

        $query = $qb->getQuery();
        $results = $query->getArrayResult();


        return $results;
    }

    /**
     * findModuloPerfil
     *
     * @param id_perfil
     * @return retorna os modulos do perfil
     */
    public function findByModuloPerfil($idPerfil) {
        $params = array(1 => $idPerfil, 2 => true, 3 => true, 4 => true, 5 => true);
        $qb = $this->getEntityManager()->createQueryBuilder()
                ->from($this->_repositoryName, "P")
                ->select("M.idModulo, M.noModulo, M.noImg, M.noMenu, C.idController")
                ->innerJoin('P.idFuncionalidade', 'F')
                ->innerJoin('F.idController', 'C')
                ->innerJoin('C.idModulo', 'M')
                ->where('P.idPerfil = ?1 AND P.stAtivo = ?2 AND F.stAtivo=?3 
                    AND M.stAtivo=?4 AND C.stAtivo=?5')
                ->setParameters($params)
                ->orderBy('M.idModulo', 'ASC');

        $query = $qb->getQuery();
        $results = $query->getArrayResult();

        return $results;
    }

}
