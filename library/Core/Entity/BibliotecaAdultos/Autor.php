<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Autor
 *
 * @ORM\Table(name="autor")
 * @ORM\Entity
 */
class Autor
{
    /**
     * @var integer $idAutor
     *
     * @ORM\Column(name="id_autor", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAutor;

    /**
     * @var string $noAutor
     *
     * @ORM\Column(name="no_autor", type="string", length=45, nullable=false)
     */
    private $noAutor;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Livro", inversedBy="idAutor")
     * @ORM\JoinTable(name="autor_livro",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_autor", referencedColumnName="id_autor")
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
     * Get idAutor
     *
     * @return integer 
     */
    public function getIdAutor()
    {
        return $this->idAutor;
    }

    /**
     * Set noAutor
     *
     * @param string $noAutor
     * @return Autor
     */
    public function setNoAutor($noAutor)
    {
        $this->noAutor = $noAutor;
        return $this;
    }

    /**
     * Get noAutor
     *
     * @return string 
     */
    public function getNoAutor()
    {
        return $this->noAutor;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return Autor
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
     * @return Autor
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