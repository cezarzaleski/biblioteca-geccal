<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Controller
 *
 * @ORM\Table(name="controller")
 * @ORM\Entity
 */
class Controller
{
    /**
     * @var integer $idController
     *
     * @ORM\Column(name="id_controller", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idController;

    /**
     * @var text $noController
     *
     * @ORM\Column(name="no_controller", type="text", nullable=false)
     */
    private $noController;

    /**
     * @var string $noSubmodulo
     *
     * @ORM\Column(name="no_submodulo", type="string", length=45, nullable=false)
     */
    private $noSubmodulo;

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
     * @var Modulo
     *
     * @ORM\ManyToOne(targetEntity="Modulo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_modulo", referencedColumnName="id_modulo")
     * })
     */
    private $idModulo;


    /**
     * Get idController
     *
     * @return integer 
     */
    public function getIdController()
    {
        return $this->idController;
    }

    /**
     * Set noController
     *
     * @param text $noController
     * @return Controller
     */
    public function setNoController($noController)
    {
        $this->noController = $noController;
        return $this;
    }

    /**
     * Get noController
     *
     * @return text 
     */
    public function getNoController()
    {
        return $this->noController;
    }

    /**
     * Set noSubmodulo
     *
     * @param string $noSubmodulo
     * @return Controller
     */
    public function setNoSubmodulo($noSubmodulo)
    {
        $this->noSubmodulo = $noSubmodulo;
        return $this;
    }

    /**
     * Get noSubmodulo
     *
     * @return string 
     */
    public function getNoSubmodulo()
    {
        return $this->noSubmodulo;
    }

    /**
     * Set dtCadastro
     *
     * @param datetime $dtCadastro
     * @return Controller
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
     * @return Controller
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
     * Set idModulo
     *
     * @param Modulo $idModulo
     * @return Controller
     */
    public function setIdModulo(\Modulo $idModulo = null)
    {
        $this->idModulo = $idModulo;
        return $this;
    }

    /**
     * Get idModulo
     *
     * @return Modulo 
     */
    public function getIdModulo()
    {
        return $this->idModulo;
    }
}