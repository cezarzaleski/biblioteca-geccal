<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * PessoaFisica
 *
 * @ORM\Table(name="pessoa_fisica")
 * @ORM\Entity
 */
class PessoaFisica
{
    /**
     * @var string $noSexo
     *
     * @ORM\Column(name="no_sexo", type="string", length=45, nullable=false)
     */
    private $noSexo;

    /**
     * @var integer $nuCpf
     *
     * @ORM\Column(name="nu_cpf", type="integer", nullable=true)
     */
    private $nuCpf;

    /**
     * @var datetime $dtNascimento
     *
     * @ORM\Column(name="dt_nascimento", type="datetime", nullable=true)
     */
    private $dtNascimento;

    /**
     * @var FuncaoAtividade
     *
     * @ORM\ManyToOne(targetEntity="FuncaoAtividade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_funcao", referencedColumnName="id_funcao")
     * })
     */
    private $idFuncao;

    /**
     * @var Pessoa
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Pessoa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pessoa", referencedColumnName="id_pessoa")
     * })
     */
    private $idPessoa;


    /**
     * Set noSexo
     *
     * @param string $noSexo
     * @return PessoaFisica
     */
    public function setNoSexo($noSexo)
    {
        $this->noSexo = $noSexo;
        return $this;
    }

    /**
     * Get noSexo
     *
     * @return string 
     */
    public function getNoSexo()
    {
        return $this->noSexo;
    }

    /**
     * Set nuCpf
     *
     * @param integer $nuCpf
     * @return PessoaFisica
     */
    public function setNuCpf($nuCpf)
    {
        $this->nuCpf = $nuCpf;
        return $this;
    }

    /**
     * Get nuCpf
     *
     * @return integer 
     */
    public function getNuCpf()
    {
        return $this->nuCpf;
    }

    /**
     * Set dtNascimento
     *
     * @param datetime $dtNascimento
     * @return PessoaFisica
     */
    public function setDtNascimento($dtNascimento)
    {
        $this->dtNascimento = $dtNascimento;
        return $this;
    }

    /**
     * Get dtNascimento
     *
     * @return datetime 
     */
    public function getDtNascimento()
    {
        return $this->dtNascimento;
    }

    /**
     * Set idFuncao
     *
     * @param FuncaoAtividade $idFuncao
     * @return PessoaFisica
     */
    public function setIdFuncao(\FuncaoAtividade $idFuncao = null)
    {
        $this->idFuncao = $idFuncao;
        return $this;
    }

    /**
     * Get idFuncao
     *
     * @return FuncaoAtividade 
     */
    public function getIdFuncao()
    {
        return $this->idFuncao;
    }

    /**
     * Set idPessoa
     *
     * @param Pessoa $idPessoa
     * @return PessoaFisica
     */
    public function setIdPessoa(\Pessoa $idPessoa)
    {
        $this->idPessoa = $idPessoa;
        return $this;
    }

    /**
     * Get idPessoa
     *
     * @return Pessoa 
     */
    public function getIdPessoa()
    {
        return $this->idPessoa;
    }
}