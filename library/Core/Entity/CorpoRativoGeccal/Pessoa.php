<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Pessoa
 *
 * @ORM\Table(name="pessoa")
 * @ORM\Entity
 */
class Pessoa
{
    /**
     * @var integer $idPessoa
     *
     * @ORM\Column(name="id_pessoa", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPessoa;

    /**
     * @var string $noPessoa
     *
     * @ORM\Column(name="no_pessoa", type="string", length=45, nullable=false)
     */
    private $noPessoa;

    /**
     * @var datetime $dtCadastro
     *
     * @ORM\Column(name="dt_cadastro", type="datetime", nullable=false)
     */
    private $dtCadastro;

    /**
     * @var text $noEndereco
     *
     * @ORM\Column(name="no_endereco", type="text", nullable=true)
     */
    private $noEndereco;

    /**
     * @var string $noBairro
     *
     * @ORM\Column(name="no_bairro", type="string", length=45, nullable=true)
     */
    private $noBairro;

    /**
     * @var integer $nuCep
     *
     * @ORM\Column(name="nu_cep", type="integer", nullable=true)
     */
    private $nuCep;

    /**
     * @var string $noCidade
     *
     * @ORM\Column(name="no_cidade", type="string", length=45, nullable=true)
     */
    private $noCidade;


    /**
     * Get idPessoa
     *
     * @return integer 
     */
    public function getIdPessoa()
    {
        return $this->idPessoa;
    }

    /**
     * Set noPessoa
     *
     * @param string $noPessoa
     * @return Pessoa
     */
    public function setNoPessoa($noPessoa)
    {
        $this->noPessoa = $noPessoa;
        return $this;
    }

    /**
     * Get noPessoa
     *
     * @return string 
     */
    public function getNoPessoa()
    {
        return $this->noPessoa;
    }

    /**
     * Set dtCadastro
     *
     * @param datetime $dtCadastro
     * @return Pessoa
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
     * Set noEndereco
     *
     * @param text $noEndereco
     * @return Pessoa
     */
    public function setNoEndereco($noEndereco)
    {
        $this->noEndereco = $noEndereco;
        return $this;
    }

    /**
     * Get noEndereco
     *
     * @return text 
     */
    public function getNoEndereco()
    {
        return $this->noEndereco;
    }

    /**
     * Set noBairro
     *
     * @param string $noBairro
     * @return Pessoa
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
     * Set nuCep
     *
     * @param integer $nuCep
     * @return Pessoa
     */
    public function setNuCep($nuCep)
    {
        $this->nuCep = $nuCep;
        return $this;
    }

    /**
     * Get nuCep
     *
     * @return integer 
     */
    public function getNuCep()
    {
        return $this->nuCep;
    }

    /**
     * Set noCidade
     *
     * @param string $noCidade
     * @return Pessoa
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
}