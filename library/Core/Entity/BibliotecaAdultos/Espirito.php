<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Espirito
 *
 * @ORM\Table(name="espirito")
 * @ORM\Entity
 */
class Espirito
{
    /**
     * @var integer $idEspirito
     *
     * @ORM\Column(name="id_espirito", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEspirito;

    /**
     * @var string $noEspirito
     *
     * @ORM\Column(name="no_espirito", type="string", length=45, nullable=false)
     */
    private $noEspirito;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Livro", inversedBy="idEspirito")
     * @ORM\JoinTable(name="espirito_livro",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_espirito", referencedColumnName="id_espirito")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_livro", referencedColumnName="id_livro")
     *   }
     * )
     */
    private $idLivro;

    public function __construct()
    {
        $this->idLivro = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get idEspirito
     *
     * @return integer 
     */
    public function getIdEspirito()
    {
        return $this->idEspirito;
    }

    /**
     * Set noEspirito
     *
     * @param string $noEspirito
     * @return Espirito
     */
    public function setNoEspirito($noEspirito)
    {
        $this->noEspirito = $noEspirito;
        return $this;
    }

    /**
     * Get noEspirito
     *
     * @return string 
     */
    public function getNoEspirito()
    {
        return $this->noEspirito;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return Espirito
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

    /**
     * Add idLivro
     *
     * @param Livro $idLivro
     * @return Espirito
     */
    public function addLivro(\Livro $idLivro)
    {
        $this->idLivro[] = $idLivro;
        return $this;
    }

    /**
     * Get idLivro
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getIdLivro()
    {
        return $this->idLivro;
    }
}