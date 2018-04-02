<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoPessoaEstrangeira
 *
 * @ORM\Table(name="corporativo.vw_pessoa_estrangeira")
 * @ORM\Entity
 */
class CorporativoPessoaEstrangeira
{
    /**
     * @var string $nuPassaporte
     *
     * @ORM\Column(name="nu_passaporte", type="string", length=20, nullable=true)
     */
    private $nuPassaporte;

    /**
     * @var string $noMae
     *
     * @ORM\Column(name="no_mae", type="string", length=120, nullable=true)
     */
    private $noMae;

    /**
     * @var datetime $dtNascimento
     *
     * @ORM\Column(name="dt_nascimento", type="datetime", nullable=true)
     */
    private $dtNascimento;

    /**
     * @var bigint $sqNacionalidade
     *
     * @ORM\Column(name="sq_nacionalidade", type="bigint", nullable=true)
     */
    private $sqNacionalidade;

    /**
     * @var string $sgSexo
     *
     * @ORM\Column(name="sg_sexo", type="string", nullable=true)
     */
    private $sgSexo;

    /**
     * @var string $nuCurriculoLates
     *
     * @ORM\Column(name="nu_curriculo_lates", type="string", length=50, nullable=true)
     */
    private $nuCurriculoLates;

    /**
     * @var string $txEndereco
     *
     * @ORM\Column(name="tx_endereco", type="string", length=300, nullable=true)
     */
    private $txEndereco;

    /**
     * @var string $txComplementoEnd
     *
     * @ORM\Column(name="tx_complemento_end", type="string", length=50, nullable=true)
     */
    private $txComplementoEnd;

    /**
     * @var string $txCidade
     *
     * @ORM\Column(name="tx_cidade", type="string", length=100, nullable=true)
     */
    private $txCidade;

    /**
     * @var string $txEstadoProvincia
     *
     * @ORM\Column(name="tx_estado_provincia", type="string", length=100, nullable=true)
     */
    private $txEstadoProvincia;

    /**
     * @var string $coZonaInternacional
     *
     * @ORM\Column(name="co_zona_internacional", type="string", length=50, nullable=true)
     */
    private $coZonaInternacional;

    /**
     * @var \Core\Entity\Corporativo\CorporativoPais
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoPais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_pais_endereco", referencedColumnName="sq_pais")
     * })
     */
    private $sqPaisEndereco;

    /**
     * @var \Core\Entity\Corporativo\CorporativoPessoa
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="\Core\Entity\Corporativo\CorporativoPessoa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_pessoa", referencedColumnName="sq_pessoa")
     * })
     */
    private $sqPessoa;

    /**
     * Set nuPassaporte
     *
     * @param string $nuPassaporte
     * @return CorporativoPessoaEstrangeira
     */
    public function setNuPassaporte($nuPassaporte)
    {
        $this->nuPassaporte = $nuPassaporte;
        return $this;
    }

    /**
     * Get nuPassaporte
     *
     * @return string 
     */
    public function getNuPassaporte()
    {
        return $this->nuPassaporte;
    }

    /**
     * Set noMae
     *
     * @param string $noMae
     * @return CorporativoPessoaEstrangeira
     */
    public function setNoMae($noMae)
    {
        $this->noMae = $noMae;
        return $this;
    }

    /**
     * Get noMae
     *
     * @return string 
     */
    public function getNoMae()
    {
        return $this->noMae;
    }

    /**
     * Set dtNascimento
     *
     * @param datetime $dtNascimento
     * @return CorporativoPessoaEstrangeira
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
     * Set sqNacionalidade
     *
     * @param bigint $sqNacionalidade
     * @return CorporativoPessoaEstrangeira
     */
    public function setSqNacionalidade($sqNacionalidade)
    {
        $this->sqNacionalidade = $sqNacionalidade;
        return $this;
    }

    /**
     * Get sqNacionalidade
     *
     * @return bigint 
     */
    public function getSqNacionalidade()
    {
        return $this->sqNacionalidade;
    }

    /**
     * Set sgSexo
     *
     * @param string $sgSexo
     * @return CorporativoPessoaEstrangeira
     */
    public function setSgSexo($sgSexo)
    {
        $this->sgSexo = $sgSexo;
        return $this;
    }

    /**
     * Get sgSexo
     *
     * @return string 
     */
    public function getSgSexo()
    {
        return $this->sgSexo;
    }

    /**
     * Set nuCurriculoLates
     *
     * @param string $nuCurriculoLates
     * @return CorporativoPessoaEstrangeira
     */
    public function setNuCurriculoLates($nuCurriculoLates)
    {
        $this->nuCurriculoLates = $nuCurriculoLates;
        return $this;
    }

    /**
     * Get nuCurriculoLates
     *
     * @return string 
     */
    public function getNuCurriculoLates()
    {
        return $this->nuCurriculoLates;
    }

    /**
     * Set txEndereco
     *
     * @param string $txEndereco
     * @return CorporativoPessoaEstrangeira
     */
    public function setTxEndereco($txEndereco)
    {
        $this->txEndereco = $txEndereco;
        return $this;
    }

    /**
     * Get txEndereco
     *
     * @return string 
     */
    public function getTxEndereco()
    {
        return $this->txEndereco;
    }

    /**
     * Set txComplementoEnd
     *
     * @param string $txComplementoEnd
     * @return CorporativoPessoaEstrangeira
     */
    public function setTxComplementoEnd($txComplementoEnd)
    {
        $this->txComplementoEnd = $txComplementoEnd;
        return $this;
    }

    /**
     * Get txComplementoEnd
     *
     * @return string 
     */
    public function getTxComplementoEnd()
    {
        return $this->txComplementoEnd;
    }

    /**
     * Set txCidade
     *
     * @param string $txCidade
     * @return CorporativoPessoaEstrangeira
     */
    public function setTxCidade($txCidade)
    {
        $this->txCidade = $txCidade;
        return $this;
    }

    /**
     * Get txCidade
     *
     * @return string 
     */
    public function getTxCidade()
    {
        return $this->txCidade;
    }

    /**
     * Set txEstadoProvincia
     *
     * @param string $txEstadoProvincia
     * @return CorporativoPessoaEstrangeira
     */
    public function setTxEstadoProvincia($txEstadoProvincia)
    {
        $this->txEstadoProvincia = $txEstadoProvincia;
        return $this;
    }

    /**
     * Get txEstadoProvincia
     *
     * @return string 
     */
    public function getTxEstadoProvincia()
    {
        return $this->txEstadoProvincia;
    }

    /**
     * Set coZonaInternacional
     *
     * @param string $coZonaInternacional
     * @return CorporativoPessoaEstrangeira
     */
    public function setCoZonaInternacional($coZonaInternacional)
    {
        $this->coZonaInternacional = $coZonaInternacional;
        return $this;
    }

    /**
     * Get coZonaInternacional
     *
     * @return string 
     */
    public function getCoZonaInternacional()
    {
        return $this->coZonaInternacional;
    }

    /**
     * Set sqPaisEndereco
     *
     * @param \Core\Entity\Corporativo\CorporativoPais $sqPaisEndereco
     * @return CorporativoPessoaEstrangeira
     */
    public function setSqPaisEndereco(\Core\Entity\Corporativo\CorporativoPais $sqPaisEndereco = null)
    {
        $this->sqPaisEndereco = $sqPaisEndereco;
        return $this;
    }

    /**
     * Get sqPaisEndereco
     *
     * @return \Core\Entity\Corporativo\CorporativoPais 
     */
    public function getSqPaisEndereco()
    {
        return $this->sqPaisEndereco;
    }

    /**
     * Set sqPessoa
     *
     * @param \Core\Entity\Corporativo\CorporativoPessoa $sqPessoa
     * @return CorporativoPessoaEstrangeira
     */
    public function setSqPessoa(\Core\Entity\Corporativo\CorporativoPessoa $sqPessoa)
    {
        $this->sqPessoa = $sqPessoa;
        return $this;
    }

    /**
     * Get sqPessoa
     *
     * @return \Core\Entity\Corporativo\CorporativoPessoa 
     */
    public function getSqPessoa()
    {
        return $this->sqPessoa;
    }
}