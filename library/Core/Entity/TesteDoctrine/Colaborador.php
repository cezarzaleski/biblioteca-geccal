<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Colaborador
 *
 * @ORM\Table(name="colaborador")
 * @ORM\Entity
 */
class Colaborador
{
    /**
     * @var integer $idColaborador
     *
     * @ORM\Column(name="id_colaborador", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idColaborador;

    /**
     * @var text $noColaborador
     *
     * @ORM\Column(name="no_colaborador", type="text", nullable=false)
     */
    private $noColaborador;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;

    /**
     * @var string $noEndereco
     *
     * @ORM\Column(name="no_endereco", type="string", length=45, nullable=true)
     */
    private $noEndereco;

    /**
     * @var string $noBairro
     *
     * @ORM\Column(name="no_bairro", type="string", length=20, nullable=true)
     */
    private $noBairro;

    /**
     * @var string $noCidade
     *
     * @ORM\Column(name="no_cidade", type="string", length=45, nullable=true)
     */
    private $noCidade;

    /**
     * @var string $nuCep
     *
     * @ORM\Column(name="nu_cep", type="string", length=9, nullable=true)
     */
    private $nuCep;

    /**
     * @var datetime $dtCadastro
     *
     * @ORM\Column(name="dt_cadastro", type="datetime", nullable=true)
     */
    private $dtCadastro;

    /**
     * @var string $noSexo
     *
     * @ORM\Column(name="no_sexo", type="string", length=10, nullable=true)
     */
    private $noSexo;

    /**
     * @var string $nuFoneRes
     *
     * @ORM\Column(name="nu_fone_res", type="string", length=14, nullable=true)
     */
    private $nuFoneRes;

    /**
     * @var string $nuFoneCel
     *
     * @ORM\Column(name="nu_fone_cel", type="string", length=14, nullable=true)
     */
    private $nuFoneCel;

    /**
     * @var string $noEmail
     *
     * @ORM\Column(name="no_email", type="string", length=45, nullable=true)
     */
    private $noEmail;

    /**
     * @var FuncaoAtividade
     *
     * @ORM\ManyToOne(targetEntity="FuncaoAtividade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_func", referencedColumnName="id_func")
     * })
     */
    private $idFunc;


    /**
     * Get idColaborador
     *
     * @return integer 
     */
    public function getIdColaborador()
    {
        return $this->idColaborador;
    }

    /**
     * Set noColaborador
     *
     * @param text $noColaborador
     * @return Colaborador
     */
    public function setNoColaborador($noColaborador)
    {
        $this->noColaborador = $noColaborador;
        return $this;
    }

    /**
     * Get noColaborador
     *
     * @return text 
     */
    public function getNoColaborador()
    {
        return $this->noColaborador;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return Colaborador
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
     * Set noEndereco
     *
     * @param string $noEndereco
     * @return Colaborador
     */
    public function setNoEndereco($noEndereco)
    {
        $this->noEndereco = $noEndereco;
        return $this;
    }

    /**
     * Get noEndereco
     *
     * @return string 
     */
    public function getNoEndereco()
    {
        return $this->noEndereco;
    }

    /**
     * Set noBairro
     *
     * @param string $noBairro
     * @return Colaborador
     */
    public function setNoBairro($noBairro)
    {
        $this->noBairro = $noBairro;
        return $this;
    }

    /**
     * Get noBairro
     *
     * @return string 
     */
    public function getNoBairro()
    {
        return $this->noBairro;
    }

    /**
     * Set noCidade
     *
     * @param string $noCidade
     * @return Colaborador
     */
    public function setNoCidade($noCidade)
    {
        $this->noCidade = $noCidade;
        return $this;
    }

    /**
     * Get noCidade
     *
     * @return string 
     */
    public function getNoCidade()
    {
        return $this->noCidade;
    }

    /**
     * Set nuCep
     *
     * @param string $nuCep
     * @return Colaborador
     */
    public function setNuCep($nuCep)
    {
        $this->nuCep = $nuCep;
        return $this;
    }

    /**
     * Get nuCep
     *
     * @return string 
     */
    public function getNuCep()
    {
        return $this->nuCep;
    }

    /**
     * Set dtCadastro
     *
     * @param datetime $dtCadastro
     * @return Colaborador
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
     * Set noSexo
     *
     * @param string $noSexo
     * @return Colaborador
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
     * Set nuFoneRes
     *
     * @param string $nuFoneRes
     * @return Colaborador
     */
    public function setNuFoneRes($nuFoneRes)
    {
        $this->nuFoneRes = $nuFoneRes;
        return $this;
    }

    /**
     * Get nuFoneRes
     *
     * @return string 
     */
    public function getNuFoneRes()
    {
        return $this->nuFoneRes;
    }

    /**
     * Set nuFoneCel
     *
     * @param string $nuFoneCel
     * @return Colaborador
     */
    public function setNuFoneCel($nuFoneCel)
    {
        $this->nuFoneCel = $nuFoneCel;
        return $this;
    }

    /**
     * Get nuFoneCel
     *
     * @return string 
     */
    public function getNuFoneCel()
    {
        return $this->nuFoneCel;
    }

    /**
     * Set noEmail
     *
     * @param string $noEmail
     * @return Colaborador
     */
    public function setNoEmail($noEmail)
    {
        $this->noEmail = $noEmail;
        return $this;
    }

    /**
     * Get noEmail
     *
     * @return string 
     */
    public function getNoEmail()
    {
        return $this->noEmail;
    }

    /**
     * Set idFunc
     *
     * @param FuncaoAtividade $idFunc
     * @return Colaborador
     */
    public function setIdFunc(\FuncaoAtividade $idFunc = null)
    {
        $this->idFunc = $idFunc;
        return $this;
    }

    /**
     * Get idFunc
     *
     * @return FuncaoAtividade 
     */
    public function getIdFunc()
    {
        return $this->idFunc;
    }
}