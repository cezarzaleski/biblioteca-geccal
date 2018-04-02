<?php



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
     * @var integer $idFuncao
     *
     * @ORM\Column(name="id_funcao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFuncao;

    /**
     * @var string $noFuncao
     *
     * @ORM\Column(name="no_funcao", type="string", length=45, nullable=false)
     */
    private $noFuncao;


    /**
     * Get idFuncao
     *
     * @return integer 
     */
    public function getIdFuncao()
    {
        return $this->idFuncao;
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
}