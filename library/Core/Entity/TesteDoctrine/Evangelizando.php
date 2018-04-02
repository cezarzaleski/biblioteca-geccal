<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Evangelizando
 *
 * @ORM\Table(name="evangelizando")
 * @ORM\Entity
 */
class Evangelizando
{
    /**
     * @var integer $idEvangelizando
     *
     * @ORM\Column(name="id_evangelizando", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvangelizando;

    /**
     * @var text $noEvangelizando
     *
     * @ORM\Column(name="no_evangelizando", type="text", nullable=false)
     */
    private $noEvangelizando;

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
     * @var string $noSexo
     *
     * @ORM\Column(name="no_sexo", type="string", length=45, nullable=false)
     */
    private $noSexo;

    /**
     * @var text $noPai
     *
     * @ORM\Column(name="no_pai", type="text", nullable=true)
     */
    private $noPai;

    /**
     * @var text $noMae
     *
     * @ORM\Column(name="no_mae", type="text", nullable=true)
     */
    private $noMae;

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
     * @var datetime $dtNascimento
     *
     * @ORM\Column(name="dt_nascimento", type="datetime", nullable=true)
     */
    private $dtNascimento;

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
     * @var text $noObs
     *
     * @ORM\Column(name="no_obs", type="text", nullable=true)
     */
    private $noObs;


    /**
     * Get idEvangelizando
     *
     * @return integer 
     */
    public function getIdEvangelizando()
    {
        return $this->idEvangelizando;
    }

    /**
     * Set noEvangelizando
     *
     * @param text $noEvangelizando
     * @return Evangelizando
     */
    public function setNoEvangelizando($noEvangelizando)
    {
        $this->noEvangelizando = $noEvangelizando;
        return $this;
    }

    /**
     * Get noEvangelizando
     *
     * @return text 
     */
    public function getNoEvangelizando()
    {
        return $this->noEvangelizando;
    }

    /**
     * Set dtCadastro
     *
     * @param datetime $dtCadastro
     * @return Evangelizando
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
     * @return Evangelizando
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
     * Set noSexo
     *
     * @param string $noSexo
     * @return Evangelizando
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
     * Set noPai
     *
     * @param text $noPai
     * @return Evangelizando
     */
    public function setNoPai($noPai)
    {
        $this->noPai = $noPai;
        return $this;
    }

    /**
     * Get noPai
     *
     * @return text 
     */
    public function getNoPai()
    {
        return $this->noPai;
    }

    /**
     * Set noMae
     *
     * @param text $noMae
     * @return Evangelizando
     */
    public function setNoMae($noMae)
    {
        $this->noMae = $noMae;
        return $this;
    }

    /**
     * Get noMae
     *
     * @return text 
     */
    public function getNoMae()
    {
        return $this->noMae;
    }

    /**
     * Set noEndereco
     *
     * @param string $noEndereco
     * @return Evangelizando
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
     * @return Evangelizando
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
     * @return Evangelizando
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
     * @return Evangelizando
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
     * Set dtNascimento
     *
     * @param datetime $dtNascimento
     * @return Evangelizando
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
     * Set nuFoneRes
     *
     * @param string $nuFoneRes
     * @return Evangelizando
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
     * @return Evangelizando
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
     * Set noObs
     *
     * @param text $noObs
     * @return Evangelizando
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
}