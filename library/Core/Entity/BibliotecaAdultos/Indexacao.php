<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Indexacao
 *
 * @ORM\Table(name="indexacao")
 * @ORM\Entity
 */
class Indexacao
{
    /**
     * @var integer $idIndexacao
     *
     * @ORM\Column(name="id_indexacao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idIndexacao;

    /**
     * @var string $noIndexacao
     *
     * @ORM\Column(name="no_indexacao", type="string", length=45, nullable=false)
     */
    private $noIndexacao;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;


    /**
     * Get idIndexacao
     *
     * @return integer 
     */
    public function getIdIndexacao()
    {
        return $this->idIndexacao;
    }

    /**
     * Set noIndexacao
     *
     * @param string $noIndexacao
     * @return Indexacao
     */
    public function setNoIndexacao($noIndexacao)
    {
        $this->noIndexacao = $noIndexacao;
        return $this;
    }

    /**
     * Get noIndexacao
     *
     * @return string 
     */
    public function getNoIndexacao()
    {
        return $this->noIndexacao;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return Indexacao
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