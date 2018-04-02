<?php


namespace Core\Entity\BibliotecaInfantil;
use Doctrine\ORM\Mapping as ORM;

/**
 * Livro
 *
 * @ORM\Table(name="livro")
 * @ORM\Entity
 */
class Livro
{
    /**
     * @var integer $idLivro
     *
     * @ORM\Column(name="id_livro", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLivro;

    /**
     * @var string $noLivro
     *
     * @ORM\Column(name="no_livro", type="string", length=45, nullable=false)
     */
    private $noLivro;

    /**
     * @var string $nuExemplar
     *
     * @ORM\Column(name="nu_exemplar", type="string", length=10, nullable=false)
     */
    private $nuExemplar;

    /**
     * @var datetime $dtCadastro
     *
     * @ORM\Column(name="dt_cadastro", type="datetime", nullable=false)
     */
    private $dtCadastro;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;

    /**
     * @var string $nuEdicao
     *
     * @ORM\Column(name="nu_edicao", type="string", length=11, nullable=true)
     */
    private $nuEdicao;

    /**
     * @var integer $nuAno
     *
     * @ORM\Column(name="nu_ano", type="integer", nullable=true)
     */
    private $nuAno;

    /**
     * @var text $noObs
     *
     * @ORM\Column(name="no_obs", type="text", nullable=true)
     */
    private $noObs;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Autor", mappedBy="idLivro")
     */
    private $idAutor;

    /**
     * @var OrigemLivro
     *
     * @ORM\ManyToOne(targetEntity="OrigemLivro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_origem_livro", referencedColumnName="id_origem_livro")
     * })
     */
    private $idOrigemLivro;

    /**
     * @var Editora
     *
     * @ORM\ManyToOne(targetEntity="Editora")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_editora", referencedColumnName="id_editora")
     * })
     */
    private $idEditora;

    /**
     * @var Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuario;
    
        
    /**
     * @var integer $idLivroEmprestimo
     *
     * @ORM\OneToMany(targetEntity="Emprestimo", mappedBy="idLivro")
     */
    private $idLivroEmprestimo;

    public function __construct()
    {
        $this->idAutor = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idLivroEmprestimo = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get idLivro
     *
     * @return integer 
     */
    public function getIdLivro()
    {
        return $this->idLivro;
    }

    /**
     * Set noLivro
     *
     * @param string $noLivro
     * @return Livro
     */
    public function setNoLivro($noLivro)
    {
        $this->noLivro = $noLivro;
        return $this;
    }

    /**
     * Get noLivro
     *
     * @return string 
     */
    public function getNoLivro()
    {
        return $this->noLivro;
    }

    /**
     * Set nuExemplar
     *
     * @param string $nuExemplar
     * @return Livro
     */
    public function setNuExemplar($nuExemplar)
    {
        $this->nuExemplar = $nuExemplar;
        return $this;
    }

    /**
     * Get nuExemplar
     *
     * @return string 
     */
    public function getNuExemplar()
    {
        return $this->nuExemplar;
    }

    /**
     * Set dtCadastro
     *
     * @param datetime $dtCadastro
     * @return Livro
     */
    public function setDtCadastro($dtCadastro)
    {
        $this->dtCadastro = $dtCadastro;
        return $this;
    }

    /**
     * Get dtCadastro
     *
     * @return datetime 
     */
    public function getDtCadastro()
    {
        return $this->dtCadastro;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return Livro
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
     * Set nuEdicao
     *
     * @param string $nuEdicao
     * @return Livro
     */
    public function setNuEdicao($nuEdicao)
    {
        $this->nuEdicao = $nuEdicao;
        return $this;
    }

    /**
     * Get nuEdicao
     *
     * @return string 
     */
    public function getNuEdicao()
    {
        return $this->nuEdicao;
    }

    /**
     * Set nuAno
     *
     * @param integer $nuAno
     * @return Livro
     */
    public function setNuAno($nuAno)
    {
        $this->nuAno = $nuAno;
        return $this;
    }

    /**
     * Get nuAno
     *
     * @return integer 
     */
    public function getNuAno()
    {
        return $this->nuAno;
    }

    /**
     * Set noObs
     *
     * @param text $noObs
     * @return Livro
     */
    public function setNoObs($noObs)
    {
        $this->noObs = $noObs;
        return $this;
    }

    /**
     * Get noObs
     *
     * @return text 
     */
    public function getNoObs()
    {
        return $this->noObs;
    }

    /**
     * Add idAutor
     *
     * @param Autor $idAutor
     * @return Livro
     */
    public function addAutor(\Core\Entity\BibliotecaInfantil\Autor $idAutor)
    {
        $this->idAutor[] = $idAutor;
        return $this;
    }

    /**
     * Get idAutor
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getIdAutor()
    {
        return $this->idAutor;
    }

    /**
     * Set idOrigemLivro
     *
     * @param OrigemLivro $idOrigemLivro
     * @return Livro
     */
    public function setIdOrigemLivro(\Core\Entity\BibliotecaInfantil\OrigemLivro $idOrigemLivro = null)
    {
        $this->idOrigemLivro = $idOrigemLivro;
        return $this;
    }

    /**
     * Get idOrigemLivro
     *
     * @return OrigemLivro 
     */
    public function getIdOrigemLivro()
    {
        return $this->idOrigemLivro;
    }

    /**
     * Set idEditora
     *
     * @param Editora $idEditora
     * @return Livro
     */
    public function setIdEditora(\Core\Entity\BibliotecaInfantil\Editora $idEditora = null)
    {
        $this->idEditora = $idEditora;
        return $this;
    }

    /**
     * Get idEditora
     *
     * @return Editora 
     */
    public function getIdEditora()
    {
        return $this->idEditora;
    }

    /**
     * Set idUsuario
     *
     * @param Usuario $idUsuario
     * @return Livro
     */
    public function setIdUsuario(\Core\Entity\BibliotecaInfantil\Usuario $idUsuario = null)
    {
        $this->idUsuario = $idUsuario;
        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return Usuario 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
}