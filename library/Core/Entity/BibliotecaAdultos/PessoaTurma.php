<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * PessoaTurma
 *
 * @ORM\Table(name="pessoa_turma")
 * @ORM\Entity
 */
class PessoaTurma
{
    /**
     * @var integer $idPessoaTurma
     *
     * @ORM\Column(name="id_pessoa_turma", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPessoaTurma;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;

    /**
     * @var datetime $dtCadastro
     *
     * @ORM\Column(name="dt_cadastro", type="datetime", nullable=false)
     */
    private $dtCadastro;

    /**
     * @var boolean $inEvangelizando
     *
     * @ORM\Column(name="in_evangelizando", type="boolean", nullable=false)
     */
    private $inEvangelizando;

    /**
     * @var PessoaFisica
     *
     * @ORM\ManyToOne(targetEntity="PessoaFisica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pessoa", referencedColumnName="id_pessoa")
     * })
     */
    private $idPessoa;

    /**
     * @var Turma
     *
     * @ORM\ManyToOne(targetEntity="Turma")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_turma", referencedColumnName="id_turma")
     * })
     */
    private $idTurma;

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
     * Get idPessoaTurma
     *
     * @return integer 
     */
    public function getIdPessoaTurma()
    {
        return $this->idPessoaTurma;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return PessoaTurma
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
     * Set dtCadastro
     *
     * @param datetime $dtCadastro
     * @return PessoaTurma
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
     * Set inEvangelizando
     *
     * @param boolean $inEvangelizando
     * @return PessoaTurma
     */
    public function setInEvangelizando($inEvangelizando)
    {
        $this->inEvangelizando = $inEvangelizando;
        return $this;
    }

    /**
     * Get inEvangelizando
     *
     * @return boolean 
     */
    public function getInEvangelizando()
    {
        return $this->inEvangelizando;
    }

    /**
     * Set idPessoa
     *
     * @param PessoaFisica $idPessoa
     * @return PessoaTurma
     */
    public function setIdPessoa(\PessoaFisica $idPessoa = null)
    {
        $this->idPessoa = $idPessoa;
        return $this;
    }

    /**
     * Get idPessoa
     *
     * @return PessoaFisica 
     */
    public function getIdPessoa()
    {
        return $this->idPessoa;
    }

    /**
     * Set idTurma
     *
     * @param Turma $idTurma
     * @return PessoaTurma
     */
    public function setIdTurma(\Turma $idTurma = null)
    {
        $this->idTurma = $idTurma;
        return $this;
    }

    /**
     * Get idTurma
     *
     * @return Turma 
     */
    public function getIdTurma()
    {
        return $this->idTurma;
    }

    /**
     * Set idUsuario
     *
     * @param Usuario $idUsuario
     * @return PessoaTurma
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