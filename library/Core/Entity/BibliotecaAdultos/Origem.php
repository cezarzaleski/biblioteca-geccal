<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Origem
 *
 * @ORM\Table(name="origem")
 * @ORM\Entity
 */
class Origem
{
    /**
     * @var integer $idOrigem
     *
     * @ORM\Column(name="id_origem", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOrigem;

    /**
     * @var string $noOrigem
     *
     * @ORM\Column(name="no_origem", type="string", length=45, nullable=false)
     */
    private $noOrigem;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;


    /**
     * Get idOrigem
     *
     * @return integer 
     */
    public function getIdOrigem()
    {
        return $this->idOrigem;
    }

    /**
     * Set noOrigem
     *
     * @param string $noOrigem
     * @return Origem
     */
    public function setNoOrigem($noOrigem)
    {
        $this->noOrigem = $noOrigem;
        return $this;
    }

    /**
     * Get noOrigem
     *
     * @return string 
     */
    public function getNoOrigem()
    {
        return $this->noOrigem;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return Origem
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