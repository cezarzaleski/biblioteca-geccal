<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Funcionalidade
 *
 * @ORM\Table(name="funcionalidade")
 * @ORM\Entity
 */
class Funcionalidade
{
    /**
     * @var integer $idFuncionalidade
     *
     * @ORM\Column(name="id_funcionalidade", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFuncionalidade;

    /**
     * @var string $noFuncionalidade
     *
     * @ORM\Column(name="no_funcionalidade", type="string", length=45, nullable=false)
     */
    private $noFuncionalidade;

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
     * @var string $noMenu
     *
     * @ORM\Column(name="no_menu", type="string", length=45, nullable=true)
     */
    private $noMenu;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Perfil", inversedBy="idFuncionalidade")
     * @ORM\JoinTable(name="funcionalidade_perfil",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_funcionalidade", referencedColumnName="id_funcionalidade")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_perfil", referencedColumnName="id_perfil")
     *   }
     * )
     */
    private $idPerfil;

    /**
     * @var Controller
     *
     * @ORM\ManyToOne(targetEntity="Controller")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_controller", referencedColumnName="id_controller")
     * })
     */
    private $idController;

    /**
     * @var TipoFuncionalidade
     *
     * @ORM\ManyToOne(targetEntity="TipoFuncionalidade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_funcionalidade", referencedColumnName="id_tipo_funcionalidade")
     * })
     */
    private $idTipoFuncionalidade;

    public function __construct()
    {
        $this->idPerfil = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get idFuncionalidade
     *
     * @return integer 
     */
    public function getIdFuncionalidade()
    {
        return $this->idFuncionalidade;
    }

    /**
     * Set noFuncionalidade
     *
     * @param string $noFuncionalidade
     * @return Funcionalidade
     */
    public function setNoFuncionalidade($noFuncionalidade)
    {
        $this->noFuncionalidade = $noFuncionalidade;
        return $this;
    }

    /**
     * Get noFuncionalidade
     *
     * @return string 
     */
    public function getNoFuncionalidade()
    {
        return $this->noFuncionalidade;
    }

    /**
     * Set dtCadastro
     *
     * @param datetime $dtCadastro
     * @return Funcionalidade
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
     * @return Funcionalidade
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
     * Set noMenu
     *
     * @param string $noMenu
     * @return Funcionalidade
     */
    public function setNoMenu($noMenu)
    {
        $this->noMenu = $noMenu;
        return $this;
    }

    /**
     * Get noMenu
     *
     * @return string 
     */
    public function getNoMenu()
    {
        return $this->noMenu;
    }

    /**
     * Add idPerfil
     *
     * @param Perfil $idPerfil
     * @return Funcionalidade
     */
    public function addPerfil(\Perfil $idPerfil)
    {
        $this->idPerfil[] = $idPerfil;
        return $this;
    }

    /**
     * Get idPerfil
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getIdPerfil()
    {
        return $this->idPerfil;
    }

    /**
     * Set idController
     *
     * @param Controller $idController
     * @return Funcionalidade
     */
    public function setIdController(\Controller $idController = null)
    {
        $this->idController = $idController;
        return $this;
    }

    /**
     * Get idController
     *
     * @return Controller 
     */
    public function getIdController()
    {
        return $this->idController;
    }

    /**
     * Set idTipoFuncionalidade
     *
     * @param TipoFuncionalidade $idTipoFuncionalidade
     * @return Funcionalidade
     */
    public function setIdTipoFuncionalidade(\TipoFuncionalidade $idTipoFuncionalidade = null)
    {
        $this->idTipoFuncionalidade = $idTipoFuncionalidade;
        return $this;
    }

    /**
     * Get idTipoFuncionalidade
     *
     * @return TipoFuncionalidade 
     */
    public function getIdTipoFuncionalidade()
    {
        return $this->idTipoFuncionalidade;
    }
}