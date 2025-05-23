<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Editora
 *
 * @ORM\Table(name="editora")
 * @ORM\Entity
 */
class Editora
{
    /**
     * @var integer $idEditora
     *
     * @ORM\Column(name="id_editora", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEditora;

    /**
     * @var string $noEditora
     *
     * @ORM\Column(name="no_editora", type="string", length=45, nullable=false)
     */
    private $noEditora;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;


    /**
     * Get idEditora
     *
     * @return integer 
     */
    public function getIdEditora()
    {
        return $this->idEditora;
    }

    /**
     * Set noEditora
     *
     * @param string $noEditora
     * @return Editora
     */
    public function setNoEditora($noEditora)
    {
        $this->noEditora = $noEditora;
        return $this;
    }

    /**
     * Get noEditora
     *
     * @return string 
     */
    public function getNoEditora()
    {
        return $this->noEditora;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return Editora
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