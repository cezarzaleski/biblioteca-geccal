<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Classificacao
 *
 * @ORM\Table(name="classificacao")
 * @ORM\Entity
 */
class Classificacao
{
    /**
     * @var integer $idClassificacao
     *
     * @ORM\Column(name="id_classificacao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idClassificacao;

    /**
     * @var string $classificacao
     *
     * @ORM\Column(name="classificacao", type="string", length=45, nullable=false)
     */
    private $classificacao;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;


    /**
     * Get idClassificacao
     *
     * @return integer 
     */
    public function getIdClassificacao()
    {
        return $this->idClassificacao;
    }

    /**
     * Set classificacao
     *
     * @param string $classificacao
     * @return Classificacao
     */
    public function setClassificacao($classificacao)
    {
        $this->classificacao = $classificacao;
        return $this;
    }

    /**
     * Get classificacao
     *
     * @return string 
     */
    public function getClassificacao()
    {
        return $this->classificacao;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return Classificacao
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