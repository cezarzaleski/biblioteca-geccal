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
     * @var datetime $dtCadastro
     *
     * @ORM\Column(name="dt_cadastro", type="datetime", nullable=false)
     */
    private $dtCadastro;

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
     * Set dtCadastro
     *
     * @param datetime $dtCadastro
     * @return Historico
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