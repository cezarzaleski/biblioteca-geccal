<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoCepLogradouro
 *
 * @ORM\Table(name="corporativo.vw_cep_logradouro")
 * @ORM\Entity
 */
class CorporativoCepLogradouro
{
    /**
     * @var integer $sqCepLogradouro
     *
     * @ORM\Column(name="sq_cep_logradouro", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqCepLogradouro;

    /**
     * @var string $sgUfLogradouro
     *
     * @ORM\Column(name="sg_uf_logradouro", type="string", nullable=true)
     */
    private $sgUfLogradouro;

    /**
     * @var string $noLogradouro
     *
     * @ORM\Column(name="no_logradouro", type="string", length=100, nullable=true)
     */
    private $noLogradouro;

    /**
     * @var string $txComplemento
     *
     * @ORM\Column(name="tx_complemento", type="string", length=100, nullable=true)
     */
    private $txComplemento;

    /**
     * @var string $coCep
     *
     * @ORM\Column(name="co_cep", type="string", nullable=true)
     */
    private $coCep;

    /**
     * @var string $noTipoLogradouro
     *
     * @ORM\Column(name="no_tipo_logradouro", type="string", length=36, nullable=true)
     */
    private $noTipoLogradouro;

    /**
     * @var boolean $stUtilizacao
     *
     * @ORM\Column(name="st_utilizacao", type="boolean", nullable=true)
     */
    private $stUtilizacao;

    /**
     * @var string $txAbreviacao
     *
     * @ORM\Column(name="tx_abreviacao", type="string", length=36, nullable=true)
     */
    private $txAbreviacao;

    /**
     * @var \Core\Entity\Corporativo\CorporativoCepLocalidade
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoCepLocalidade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_localidade", referencedColumnName="sq_cep_localidade")
     * })
     */
    private $sqLocalidade;

    /**
     * @var \Core\Entity\Corporativo\CorporativoCepBairro
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoCepBairro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_bairro_final", referencedColumnName="sq_cep_bairro")
     * })
     */
    private $sqBairroFinal;

    /**
     * @var \Core\Entity\Corporativo\CorporativoCepBairro
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoCepBairro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_bairro_inicial", referencedColumnName="sq_cep_bairro")
     * })
     */
    private $sqBairroInicial;


    /**
     * Get sqCepLogradouro
     *
     * @return integer 
     */
    public function getSqCepLogradouro()
    {
        return $this->sqCepLogradouro;
    }

    /**
     * Set sgUfLogradouro
     *
     * @param string $sgUfLogradouro
     * @return CorporativoCepLogradouro
     */
    public function setSgUfLogradouro($sgUfLogradouro)
    {
        $this->sgUfLogradouro = $sgUfLogradouro;
        return $this;
    }

    /**
     * Get sgUfLogradouro
     *
     * @return string 
     */
    public function getSgUfLogradouro()
    {
        return $this->sgUfLogradouro;
    }

    /**
     * Set noLogradouro
     *
     * @param string $noLogradouro
     * @return CorporativoCepLogradouro
     */
    public function setNoLogradouro($noLogradouro)
    {
        $this->noLogradouro = $noLogradouro;
        return $this;
    }

    /**
     * Get noLogradouro
     *
     * @return string 
     */
    public function getNoLogradouro()
    {
        return $this->noLogradouro;
    }

    /**
     * Set txComplemento
     *
     * @param string $txComplemento
     * @return CorporativoCepLogradouro
     */
    public function setTxComplemento($txComplemento)
    {
        $this->txComplemento = $txComplemento;
        return $this;
    }

    /**
     * Get txComplemento
     *
     * @return string 
     */
    public function getTxComplemento()
    {
        return $this->txComplemento;
    }

    /**
     * Set coCep
     *
     * @param string $coCep
     * @return CorporativoCepLogradouro
     */
    public function setCoCep($coCep)
    {
        $this->coCep = $coCep;
        return $this;
    }

    /**
     * Get coCep
     *
     * @return string 
     */
    public function getCoCep()
    {
        return $this->coCep;
    }

    /**
     * Set noTipoLogradouro
     *
     * @param string $noTipoLogradouro
     * @return CorporativoCepLogradouro
     */
    public function setNoTipoLogradouro($noTipoLogradouro)
    {
        $this->noTipoLogradouro = $noTipoLogradouro;
        return $this;
    }

    /**
     * Get noTipoLogradouro
     *
     * @return string 
     */
    public function getNoTipoLogradouro()
    {
        return $this->noTipoLogradouro;
    }

    /**
     * Set stUtilizacao
     *
     * @param boolean $stUtilizacao
     * @return CorporativoCepLogradouro
     */
    public function setStUtilizacao($stUtilizacao)
    {
        $this->stUtilizacao = $stUtilizacao;
        return $this;
    }

    /**
     * Get stUtilizacao
     *
     * @return boolean 
     */
    public function getStUtilizacao()
    {
        return $this->stUtilizacao;
    }

    /**
     * Set txAbreviacao
     *
     * @param string $txAbreviacao
     * @return CorporativoCepLogradouro
     */
    public function setTxAbreviacao($txAbreviacao)
    {
        $this->txAbreviacao = $txAbreviacao;
        return $this;
    }

    /**
     * Get txAbreviacao
     *
     * @return string 
     */
    public function getTxAbreviacao()
    {
        return $this->txAbreviacao;
    }

    /**
     * Set sqLocalidade
     *
     * @param \Core\Entity\Corporativo\CorporativoCepLocalidade $sqLocalidade
     * @return CorporativoCepLogradouro
     */
    public function setSqLocalidade(\Core\Entity\Corporativo\CorporativoCepLocalidade $sqLocalidade = null)
    {
        $this->sqLocalidade = $sqLocalidade;
        return $this;
    }

    /**
     * Get sqLocalidade
     *
     * @return \Core\Entity\Corporativo\CorporativoCepLocalidade  
     */
    public function getSqLocalidade()
    {
        return $this->sqLocalidade;
    }

    /**
     * Set sqBairroFinal
     *
     * @param \Core\Entity\Corporativo\CorporativoCepBairro $sqBairroFinal
     * @return CorporativoCepLogradouro
     */
    public function setSqBairroFinal(\Core\Entity\Corporativo\CorporativoCepBairro $sqBairroFinal = null)
    {
        $this->sqBairroFinal = $sqBairroFinal;
        return $this;
    }

    /**
     * Get sqBairroFinal
     *
     * @return CorporativoCepBairro 
     */
    public function getSqBairroFinal()
    {
        return $this->sqBairroFinal;
    }

    /**
     * Set sqBairroInicial
     *
     * @param \Core\Entity\Corporativo\CorporativoCepBairro $sqBairroInicial
     * @return CorporativoCepLogradouro
     */
    public function setSqBairroInicial(\Core\Entity\Corporativo\CorporativoCepBairro $sqBairroInicial = null)
    {
        $this->sqBairroInicial = $sqBairroInicial;
        return $this;
    }

    /**
     * Get sqBairroInicial
     *
     * @return CorporativoCepBairro 
     */
    public function getSqBairroInicial()
    {
        return $this->sqBairroInicial;
    }
}