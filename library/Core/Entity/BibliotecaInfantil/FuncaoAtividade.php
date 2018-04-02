<?php


namespace Core\Entity\BibliotecaInfantil;
use Doctrine\ORM\Mapping as ORM;

/**
 * FuncaoAtividade
 *
 * @ORM\Table(name="funcao_atividade")
 * @ORM\Entity
 */
class FuncaoAtividade
{
    /**
     * @var integer $idFunc
     *
     * @ORM\Column(name="id_func", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFunc;

    /**
     * @var string $noFuncao
     *
     * @ORM\Column(name="no_funcao", type="string", length=45, nullable=false)
     */
    private $noFuncao;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;


    /**
     * Get idFunc
     *
     * @return integer 
     */
    public function getIdFunc()
    {
        return $this->idFunc;
    }

    /**
     * Set noFuncao
     *
     * @param string $noFuncao
     * @return FuncaoAtividade
     */
    public function setNoFuncao($noFuncao)
    {
        $this->noFuncao = $noFuncao;
        return $this;
    }

    /**
     * Get noFuncao
     *
     * @return string 
     */
    public function getNoFuncao()
    {
        return $this->noFuncao;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return FuncaoAtividade
     */
    public function setStAtivo($stAtivo)
    {
        $this->stAtivo = $stAtivo;
        return $this;
    }

    /**
     * Get stAtivo
     *
     * @return boolean 
     */
    public function getStAtivo()
    {
        return $this->stAtivo;
    }
}