<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Historico
 *
 * @ORM\Table(name="historico")
 * @ORM\Entity
 */
class Historico
{
    /**
     * @var integer $idHistorico
     *
     * @ORM\Column(name="id_historico", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idHistorico;

    /**
     * @var datetime $dtCadastramento
     *
     * @ORM\Column(name="dt_cadastramento", type="datetime", nullable=false)
     */
    private $dtCadastramento;

    /**
     * @var text $noAcao
     *
     * @ORM\Column(name="no_acao", type="text", nullable=false)
     */
    private $noAcao;

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
     * @var Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id_pessoa")
     * })
     */
    private $idUsuario;


    /**
     * Get idHistorico
     *
     * @return integer 
     */
    public function getIdHistorico()
    {
        return $this->idHistorico;
    }

    /**
     * Set dtCadastramento
     *
     * @param datetime $dtCadastramento
     * @return Historico
     */
    public function setDtCadastramento($dtCadastramento)
    {
        $this->dtCadastramento = $dtCadastramento;
        return $this;
    }

    /**
     * Get dtCadastramento
     *
     * @return datetime 
     */
    public function getDtCadastramento()
    {
        return $this->dtCadastramento;
    }

    /**
     * Set noAcao
     *
     * @param text $noAcao
     * @return Historico
     */
    public function setNoAcao($noAcao)
    {
        $this->noAcao = $noAcao;
        return $this;
    }

    /**
     * Get noAcao
     *
     * @return text 
     */
    public function getNoAcao()
    {
        return $this->noAcao;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return Historico
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
     * @return Historico
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

    /**
     * Set idUsuario
     *
     * @param Usuario $idUsuario
     * @return Historico
     */
    public function setIdUsuario(\Usuario $idUsuario = null)
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