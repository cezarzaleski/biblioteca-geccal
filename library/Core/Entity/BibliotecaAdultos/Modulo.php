<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Modulo
 *
 * @ORM\Table(name="modulo")
 * @ORM\Entity
 */
class Modulo
{
    /**
     * @var integer $idModulo
     *
     * @ORM\Column(name="id_modulo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idModulo;

    /**
     * @var string $noModulo
     *
     * @ORM\Column(name="no_modulo", type="string", length=45, nullable=false)
     */
    private $noModulo;

    /**
     * @var datetime $dtCadastro
     *
     * @ORM\Column(name="dt_cadastro", type="datetime", nullable=false)
     */
    private $dtCadastro;

    /**
     * @var string $noMenu
     *
     * @ORM\Column(name="no_menu", type="string", length=45, nullable=false)
     */
    private $noMenu;

    /**
     * @var string $noImg
     *
     * @ORM\Column(name="no_img", type="string", length=45, nullable=false)
     */
    private $noImg;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;

    /**
     * @var Sistema
     *
     * @ORM\ManyToOne(targetEntity="Sistema")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_sistema", referencedColumnName="id_sistema")
     * })
     */
    private $idSistema;


    /**
     * Get idModulo
     *
     * @return integer 
     */
    public function getIdModulo()
    {
        return $this->idModulo;
    }

    /**
     * Set noModulo
     *
     * @param string $noModulo
     * @return Modulo
     */
    public function setNoModulo($noModulo)
    {
        $this->noModulo = $noModulo;
        return $this;
    }

    /**
     * Get noModulo
     *
     * @return string 
     */
    public function getNoModulo()
    {
        return $this->noModulo;
    }

    /**
     * Set dtCadastro
     *
     * @param datetime $dtCadastro
     * @return Modulo
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
     * Set noMenu
     *
     * @param string $noMenu
     * @return Modulo
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
     * Set noImg
     *
     * @param string $noImg
     * @return Modulo
     */
    public function setNoImg($noImg)
    {
        $this->noImg = $noImg;
        return $this;
    }

    /**
     * Get noImg
     *
     * @return string 
     */
    public function getNoImg()
    {
        return $this->noImg;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return Modulo
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
     * Set idSistema
     *
     * @param Sistema $idSistema
     * @return Modulo
     */
    public function setIdSistema(\Sistema $idSistema = null)
    {
        $this->idSistema = $idSistema;
        return $this;
    }

    /**
     * Get idSistema
     *
     * @return Sistema 
     */
    public function getIdSistema()
    {
        return $this->idSistema;
    }
}