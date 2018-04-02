<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * DesativacaoUsuario
 *
 * @ORM\Table(name="desativacao_usuario")
 * @ORM\Entity
 */
class DesativacaoUsuario
{
    /**
     * @var integer $idDesativacao
     *
     * @ORM\Column(name="id_desativacao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDesativacao;

    /**
     * @var datetime $dtDesativacao
     *
     * @ORM\Column(name="dt_desativacao", type="datetime", nullable=false)
     */
    private $dtDesativacao;

    /**
     * @var text $noMotivoDesat
     *
     * @ORM\Column(name="no_motivo_desat", type="text", nullable=false)
     */
    private $noMotivoDesat;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;

    /**
     * @var datetime $dtAtivacao
     *
     * @ORM\Column(name="dt_ativacao", type="datetime", nullable=true)
     */
    private $dtAtivacao;

    /**
     * @var text $noMotivoAtivacao
     *
     * @ORM\Column(name="no_motivo_ativacao", type="text", nullable=true)
     */
    private $noMotivoAtivacao;

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
     * Get idDesativacao
     *
     * @return integer 
     */
    public function getIdDesativacao()
    {
        return $this->idDesativacao;
    }

    /**
     * Set dtDesativacao
     *
     * @param datetime $dtDesativacao
     * @return DesativacaoUsuario
     */
    public function setDtDesativacao($dtDesativacao)
    {
        $this->dtDesativacao = $dtDesativacao;
        return $this;
    }

    /**
     * Get dtDesativacao
     *
     * @return datetime 
     */
    public function getDtDesativacao()
    {
        return $this->dtDesativacao;
    }

    /**
     * Set noMotivoDesat
     *
     * @param text $noMotivoDesat
     * @return DesativacaoUsuario
     */
    public function setNoMotivoDesat($noMotivoDesat)
    {
        $this->noMotivoDesat = $noMotivoDesat;
        return $this;
    }

    /**
     * Get noMotivoDesat
     *
     * @return text 
     */
    public function getNoMotivoDesat()
    {
        return $this->noMotivoDesat;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return DesativacaoUsuario
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
     * Set dtAtivacao
     *
     * @param datetime $dtAtivacao
     * @return DesativacaoUsuario
     */
    public function setDtAtivacao($dtAtivacao)
    {
        $this->dtAtivacao = $dtAtivacao;
        return $this;
    }

    /**
     * Get dtAtivacao
     *
     * @return datetime 
     */
    public function getDtAtivacao()
    {
        return $this->dtAtivacao;
    }

    /**
     * Set noMotivoAtivacao
     *
     * @param text $noMotivoAtivacao
     * @return DesativacaoUsuario
     */
    public function setNoMotivoAtivacao($noMotivoAtivacao)
    {
        $this->noMotivoAtivacao = $noMotivoAtivacao;
        return $this;
    }

    /**
     * Get noMotivoAtivacao
     *
     * @return text 
     */
    public function getNoMotivoAtivacao()
    {
        return $this->noMotivoAtivacao;
    }

    /**
     * Set idUsuario
     *
     * @param Usuario $idUsuario
     * @return DesativacaoUsuario
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