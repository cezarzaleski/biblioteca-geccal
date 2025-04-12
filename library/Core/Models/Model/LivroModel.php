<?php

namespace Core\Models\Model;

use Doctrine\ORM\Query\ResultSetMapping;

class LivroModel extends \Core\Persist\Model {

    protected $_repositoryName = '\Core\Entity\BibliotecaInfantil\Livro';
    protected $_repositoryEmprestimo = '\Core\Entity\BibliotecaInfantil\Emprestimo';
    protected $_repositoryEmprestimoEvangelizando = '\Core\Entity\BibliotecaInfantil\EmprestimoEvangelizando';
    protected $_repositoryEmprestimoColaborador = '\Core\Entity\BibliotecaInfantil\EmprestimoColaborador';
    protected $_repositoryEvangelizandoTurma = '\Core\Entity\BibliotecaInfantil\EvangelizandoTurma';
    protected $_repositoryEvangelizando = '\Core\Entity\BibliotecaInfantil\Evangelizando';
    protected $_repositoryColaborador = '\Core\Entity\BibliotecaInfantil\Colaborador';

    public function findBy($where, $order = null, $limit = 1000000, $offset = 0) {
        return $this->getRepository()->findBy($where, $order, $limit, $offset);
    }

    public function findByLivroGerarExemplar() {
        $qb = $this->getEntityManager()->createQueryBuilder()
                ->from($this->_repositoryName, "L")
                ->select("L.noLivro")
                ->distinct()
                ->orderBy('L.noLivro', 'ASC')
                ->groupBy('L.noLivro');

        $query = $qb->getQuery();
        $results = $query->getArrayResult();

        return $results;
    }

    public function countExemplar($noLivro) {
        try {
            $params = array(1 => $noLivro, 2 => TRUE);
            $qb = $this->getEntityManager()->createQueryBuilder()
                ->from($this->_repositoryName, "L")
                ->select("max(L.nuExemplar) as qntExemplar")
                ->where('L.noLivro = ?1 AND L.stAtivo = ?2 ')
                ->setParameters($params)
                ->groupBy('L.noLivro, L.nuExemplar');
            $query = $qb->getQuery();
            $results = $query->getArrayResult();
            return $results;
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            exit();
        }

    }

    public function findByAutorLivro($idLivro) {
        $params = array(1 => $idLivro);
        $qb = $this->getEntityManager()->createQueryBuilder()
                ->from($this->_repositoryName, "L")
                ->select("A.noAutor, A.idAutor")
                ->innerJoin('L.idAutor', 'A')
                ->where('L.idLivro=?1')
                ->setParameters($params)
                ->orderBy('A.noAutor', 'ASC');

        $query = $qb->getQuery();
        $results = $query->getArrayResult();


        return $results;
    }

    public function findByTituloExemplar($titulo, $nuExemplar) {
        $params = array(1 => $titulo, 2 => $nuExemplar);
        $qb = $this->getEntityManager()->createQueryBuilder()
                ->from($this->_repositoryName, "L")
                ->select("L.noLivro, L.nuExemplar")
                ->where('L.noLivro=?1 AND L.nuExemplar!=?2')
                ->setParameters($params)
                ->orderBy('L.nuExemplar', 'ASC');
        $query = $qb->getQuery();
        $results = $query->getArrayResult();
        return $results;
    }

    public function findByEmprestimo($st) {
        $params = array(1 => TRUE, 2 => TRUE);
        $qb2 = $this->getEntityManager()->createQueryBuilder();
        $qb2->select('LC.idLivro')
                ->from($this->_repositoryEmprestimo, "EP")
                ->innerJoin('EP.idLivro', 'LC')
                ->where("EP.stAtivo = ?1 AND EP.dtDevolucao IS NULL");

        $qb = $this->getEntityManager()->createQueryBuilder();

        $qb->select('L.noLivro')
                ->from($this->_repositoryName, "L");
        if ($st == "emprestar") {
            $qb->where($qb->expr()->notIn('L.idLivro', $qb2->getDQL()));
        } else if ($st == "emprestado") {
            $qb->where($qb->expr()->in('L.idLivro', $qb2->getDQL()));
        }
        $qb->andWhere("L.stAtivo = ?2")
                ->groupBy('L.noLivro')
                ->orderBy('L.noLivro', 'ASC');

        $qb->setParameters($params);
        $query = $qb->getQuery();
        $results = $query->getArrayResult();
        return $results;
    }

    /*
      public function findByEmprestimo($st) {
      $dtDevolucao = "IS NULL";
      $params = array(1 => TRUE, 2 => TRUE, 3 => TRUE);
      $qb = $this->getEntityManager()->createQueryBuilder();
      $qb2 = $qb;
      $qb3 = $this->getEntityManager()->createQueryBuilder();
      $qb3->select('LC.idLivro')
      ->from($this->_repositoryEmprestimoColaborador, "EC")
      ->innerJoin('EC.idLivro', 'LC')
      ->where("EC.stAtivo = ?1 AND EC.dtDevolucao {$dtDevolucao}");
      $qb2->select('LE.idLivro')
      ->from($this->_repositoryEmprestimoEvangelizando, "EE")
      ->innerJoin('EE.idLivro', 'LE')
      ->where("EE.stAtivo = ?2 AND EE.dtDevolucao {$dtDevolucao}");

      $qb = $this->getEntityManager()->createQueryBuilder();
      $qb->select('L.noLivro')
      ->from($this->_repositoryName, "L");
      if ($st == "emprestar") {
      $qb->where($qb->expr()->notIn('L.idLivro', $qb3->getDQL()))
      ->andWhere($qb->expr()->notIn('L.idLivro', $qb2->getDQL()));
      } else if ($st == "emprestado") {
      $qb->where($qb->expr()->in('L.idLivro', $qb3->getDQL()))
      ->orWhere($qb->expr()->in('L.idLivro', $qb2->getDQL()));
      }
      $qb->andWhere("L.stAtivo = ?3")
      ->groupBy('L.noLivro')
      ->orderBy('L.noLivro', 'ASC');

      $qb->setParameters($params);
      $query = $qb->getQuery();
      $results = $query->getArrayResult();
      return $results;
      }
     */

    public function findByExemplar($noLivro, $st) {
        $params = array(1 => TRUE, 2 => $noLivro, 3 => TRUE);
        $qb2 = $this->getEntityManager()->createQueryBuilder();

        $qb2->select('LC.idLivro')
                ->from($this->_repositoryEmprestimo, "EP")
                ->innerJoin('EP.idLivro', 'LC')
                ->where("EP.stAtivo = ?1 AND EP.dtDevolucao IS NULL");

        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('L.nuExemplar, L.idLivro')
                ->from($this->_repositoryName, "L");
        if ($st == "emprestar") {
            $qb->where($qb->expr()->notIn('L.idLivro', $qb2->getDQL()));
        } else if ($st == "emprestado") {
            $qb->where($qb->expr()->in('L.idLivro', $qb2->getDQL()));
        }
        $qb->andWhere("L.noLivro =?2 AND L.stAtivo=?3");
        $qb->setParameters($params);
        $query = $qb->getQuery();
        $results = $query->getArrayResult();
        return $results;
    }

    /* public function findByExemplar($noLivro, $st) {
      $dtDevolucao = "IS NULL";
      $params = array(1 => TRUE, 2 => TRUE, 3 => $noLivro, 4 => TRUE);
      $qb = $this->getEntityManager()->createQueryBuilder();
      $qb2 = $qb;
      $qb3 = $this->getEntityManager()->createQueryBuilder();
      $qb3->select('LC.idLivro')
      ->from($this->_repositoryEmprestimoColaborador, "EC")
      ->innerJoin('EC.idLivro', 'LC')
      ->where("EC.stAtivo = ?1 AND EC.dtDevolucao {$dtDevolucao}");
      $qb2->select('LE.idLivro')
      ->from($this->_repositoryEmprestimoEvangelizando, "EE")
      ->innerJoin('EE.idLivro', 'LE')
      ->where("EE.stAtivo = ?2 AND EE.dtDevolucao {$dtDevolucao}");

      $qb = $this->getEntityManager()->createQueryBuilder();
      $qb->select('L.nuExemplar, L.idLivro')
      ->from($this->_repositoryName, "L");
      if ($st == "emprestar") {
      $qb->where($qb->expr()->notIn('L.idLivro', $qb3->getDQL()))
      ->andWhere($qb->expr()->notIn('L.idLivro', $qb2->getDQL()));
      } else if ($st == "emprestado") {
      $qb->where($qb->expr()->in('L.idLivro', $qb3->getDQL()))
      ->orWhere($qb->expr()->in('L.idLivro', $qb2->getDQL()));
      }
      $qb->andWhere("L.noLivro =?3 AND L.stAtivo=?4");
      $qb->setParameters($params);
      $query = $qb->getQuery();
      $results = $query->getArrayResult();
      return $results;
      } */

    public function findByLivroEmprestado($idLivro, $noLivro, $stEmprestimo) {
        $params = array(1 => TRUE, 2 => TRUE);
        $qb1 = $this->getEntityManager()->createQueryBuilder()
                ->from($this->_repositoryName, "L")
                ->select("L.noLivro, L.nuExemplar, C.noColaborador,E.noEvangelizando,EP.dtEmprestimo, EP.dtDevolucao, EP.idEmprestimo as idEmp")
                ->innerJoin('L.idLivroEmprestimo', 'EP')
                ->leftJoin('EP.idColaborador', 'C')
                ->leftJoin('EP.idEvangelizandoTurma', 'ET')
                ->leftJoin('ET.idEvangelizando', 'E')
                ->where("L.stAtivo = ?1 AND EP.stAtivo =?2");

        if ($idLivro) {
            $count = count($params);
            $params[$count + 1] = $idLivro;
            $where = "L.idLivro=?" . ($count + 1);
            $qb1->andWhere($where);
        } else if ($noLivro) {
            $count = count($params);
            $params[$count + 1] = $noLivro;
            $where = "L.noLivro=?" . ($count + 1);
            $qb1->andWhere($where);
        }
        if ($stEmprestimo != "all") {
            if ($stEmprestimo == "emprestado") {
                $qb1Where = "EP.dtDevolucao IS NULL ";
            } else if ($stEmprestimo == "devolvido") {
                $qb1Where = "EP.dtDevolucao IS NOT NULL ";
            }
            $qb1->andWhere($qb1Where);
        }

        $qb1->setParameters($params);
        $query = $qb1->getQuery();
        $result = $query->getArrayResult();
        return $result;
    }

    /* public function findByLivroEmprestado($idLivro, $noLivro, $stEmprestimo) {
      $params = array(1 => TRUE, 2 => TRUE);
      $qb1 = $this->getEntityManager()->createQueryBuilder()
      ->from($this->_repositoryName, "L")
      ->select("L.noLivro, L.nuExemplar, E.noEvangelizando as noNome, EE.dtEmprestimo, EE.dtDevolucao, EE.idEmpEvangelizando as idEmp, 'ee' AS noOrigem")
      ->innerJoin('L.idLivroEmpEvangelizando', 'EE')
      ->innerJoin('EE.idEvangelizandoTurma', 'ET')
      ->innerJoin('ET.idEvangelizando', 'E')
      ->where("L.stAtivo = ?1 AND EE.stAtivo =?2");

      $qb2 = $this->getEntityManager()->createQueryBuilder()
      ->from($this->_repositoryName, "L")
      ->select("L.noLivro, L.nuExemplar, C.noColaborador as noNome, EC.dtEmprestimo, EC.dtDevolucao, EC.idEmColaborador as idEmp, 'ec' AS noOrigem")
      ->innerJoin('L.idLivroEmpColaborador', 'EC')
      ->innerJoin('EC.idColaborador', 'C')
      ->where("L.stAtivo = ?1 AND EC.stAtivo=?2");
      if ($idLivro) {
      $count = count($params);
      $params[$count + 1] = $idLivro;
      $where = "L.idLivro=?" . ($count + 1);
      $qb1->andWhere($where);
      $qb2->andWhere($where);
      } else if ($noLivro) {
      $count = count($params);
      $params[$count + 1] = $noLivro;
      $where = "L.noLivro=?" . ($count + 1);
      $qb1->andWhere($where);
      $qb2->andWhere($where);
      }
      if ($stEmprestimo != "all") {
      if ($stEmprestimo == "emprestado") {
      $qb1Where = "EE.dtDevolucao IS NULL ";
      $qb2Where = "EC.dtDevolucao IS NULL ";
      } else if ($stEmprestimo == "devolvido") {
      $qb1Where = "EE.dtDevolucao IS NOT NULL ";
      $qb2Where = "EC.dtDevolucao IS NOT NULL ";
      }
      $qb1->andWhere($qb1Where);
      $qb2->andWhere($qb2Where);
      }
      $qb1->setParameters($params);
      $qb2->setParameters($params);
      $query = $qb1->getQuery();
      $result1 = $query->getArrayResult();
      $query = $qb2->getQuery();
      $result2 = $query->getArrayResult();

      $results = array_merge($result1, $result2);
      array_multisort($results);
      return $results;
      } */
}
