<?php



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
     * @var datetime $dtCadastro
     *
     * @ORM\Column(name="dt_cadastro", type="datetime", nullable=false)
     */
    private $dtCadastro;

    /**
     * @var integer $nuExemplar
     *
     * @ORM\Column(name="nu_exemplar", type="integer", nullable=false)
     */
    private $nuExemplar;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;

    /**
     * @var string $nuEdicao
     *
     * @ORM\Column(name="nu_edicao", type="string", length=45, nullable=true)
     */
    private $nuEdicao;

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
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Espirito", mappedBy="idLivro")
     */
    private $idEspirito;

    /**
     * @var Classificacao
     *
     * @ORM\ManyToOne(targetEntity="Classificacao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_classificacao", referencedColumnName="id_classificacao")
     * })
     */
    private $idClassificacao;

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
     * @var Indexacao
     *
     * @ORM\ManyToOne(targetEntity="Indexacao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_indexacao", referencedColumnName="id_indexacao")
     * })
     */
    private $idIndexacao;

    /**
     * @var Origem
     *
     * @ORM\ManyToOne(targetEntity="Origem")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_origem", referencedColumnName="id_origem")
     * })
     */
    private $idOrigem;

    public function __construct()
    {
        $this->idAutor = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idEspirito = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nuExemplar
     *
     * @param integer $nuExemplar
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
     * @return integer 
     */
    public function getNuExemplar()
    {
        return $this->nuExemplar;
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
    public function addAutor(\Autor $idAutor)
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
     * Add idEspirito
     *
     * @param Espirito $idEspirito
     * @return Livro
     */
    public function addEspirito(\Espirito $idEspirito)
    {
        $this->idEspirito[] = $idEspirito;
        return $this;
    }

    /**
     * Get idEspirito
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getIdEspirito()
    {
        return $this->idEspirito;
    }

    /**
     * Set idClassificacao
     *
     * @param Classificacao $idClassificacao
     * @return Livro
     */
    public function setIdClassificacao(\Classificacao $idClassificacao = null)
    {
        $this->idClassificacao = $idClassificacao;
        return $this;
    }

    /**
     * Get idClassificacao
     *
     * @return Classificacao 
     */
    public function getIdClassificacao()
    {
        return $this->idClassificacao;
    }

    /**
     * Set idEditora
     *
     * @param Editora $idEditora
     * @return Livro
     */
    public function setIdEditora(\Editora $idEditora = null)
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
     * Set idIndexacao
     *
     * @param Indexacao $idIndexacao
     * @return Livro
     */
    public function setIdIndexacao(\Indexacao $idIndexacao = null)
    {
        $this->idIndexacao = $idIndexacao;
        return $this;
    }

    /**
     * Get idIndexacao
     *
     * @return Indexacao 
     */
    public function getIdIndexacao()
    {
        return $this->idIndexacao;
    }

    /**
     * Set idOrigem
     *
     * @param Origem $idOrigem
     * @return Livro
     */
    public function setIdOrigem(\Origem $idOrigem = null)
    {
        $this->idOrigem = $idOrigem;
        return $this;
    }

    /**
     * Get idOrigem
     *
     * @return Origem 
     */
    public function getIdOrigem()
    {
        return $this->idOrigem;
    }
}