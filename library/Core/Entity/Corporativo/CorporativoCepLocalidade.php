<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoCepLocalidade
 *
 * @ORM\Table(name="corporativo.vw_cep_localidade")
 * @ORM\Entity
 */
class CorporativoCepLocalidade
{
    /**
     * @var integer $sqCepLocalidade
     *
     * @ORM\Column(name="sq_cep_localidade", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqCepLocalidade;

    /**
     * @var string $sgUfLocalidade
     *
     * @ORM\Column(name="sg_uf_localidade", type="string", nullable=true)
     */
    private $sgUfLocalidade;

    /**
     * @var string $noLocalidade
     *
     * @ORM\Column(name="no_localidade", type="string", length=72, nullable=true)
     */
    private $noLocalidade;

    /**
     * @var string $txCep
     *
     * @ORM\Column(name="tx_cep", type="string", nullable=true)
     */
    private $txCep;

    /**
     * @var string $stLocalidade
     *
     * @ORM\Column(name="st_localidade", type="string", nullable=true)
     */
    private $stLocalidade;

    /**
     * @var string $inTipoLocalidade
     *
     * @ORM\Column(name="in_tipo_localidade", type="string", nullable=true)
     */
    private $inTipoLocalidade;

    /**
     * @var integer $nuLocalidadeSubordinacao
     *
     * @ORM\Column(name="nu_localidade_subordinacao", type="integer", nullable=true)
     */
    private $nuLocalidadeSubordinacao;

    /**
     * @var string $noAbreviaturaLocalidade
     *
     * @ORM\Column(name="no_abreviatura_localidade", type="string", length=36, nullable=true)
     */
    private $noAbreviaturaLocalidade;

    /**
     * @var string $coIbge
     *
     * @ORM\Column(name="co_ibge", type="string", length=10, nullable=true)
     */
    private $coIbge;


    /**
     * Get sqCepLocalidade
     *
     * @return integer 
     */
    public function getSqCepLocalidade()
    {
        return $this->sqCepLocalidade;
    }

    /**
     * Set sgUfLocalidade
     *
     * @param string $sgUfLocalidade
     * @return Corporativo.cepLocalidade
     */
    public function setSgUfLocalidade($sgUfLocalidade)
    {
        $this->sgUfLocalidade = $sgUfLocalidade;
        return $this;
    }

    /**
     * Get sgUfLocalidade
     *
     * @return string 
     */
    public function getSgUfLocalidade()
    {
        return $this->sgUfLocalidade;
    }

    /**
     * Set noLocalidade
     *
     * @param string $noLocalidade
     * @return CorporativoCepLocalidade
     */
    public function setNoLocalidade($noLocalidade)
    {
        $this->noLocalidade = $noLocalidade;
        return $this;
    }

    /**
     * Get noLocalidade
     *
     * @return string 
     */
    public function getNoLocalidade()
    {
        return $this->noLocalidade;
    }

    /**
     * Set txCep
     *
     * @param string $txCep
     * @return CorporativoCepLocalidade
     */
    public function setTxCep($txCep)
    {
        $this->txCep = $txCep;
        return $this;
    }

    /**
     * Get txCep
     *
     * @return string 
     */
    public function getTxCep()
    {
        return $this->txCep;
    }

    /**
     * Set stLocalidade
     *
     * @param string $stLocalidade
     * @return CorporativoCepLocalidade
     */
    public function setStLocalidade($stLocalidade)
    {
        $this->stLocalidade = $stLocalidade;
        return $this;
    }

    /**
     * Get stLocalidade
     *
     * @return string 
     */
    public function getStLocalidade()
    {
        return $this->stLocalidade;
    }

    /**
     * Set inTipoLocalidade
     *
     * @param string $inTipoLocalidade
     * @return CorporativoCepLocalidade
     */
    public function setInTipoLocalidade($inTipoLocalidade)
    {
        $this->inTipoLocalidade = $inTipoLocalidade;
        return $this;
    }

    /**
     * Get inTipoLocalidade
     *
     * @return string 
     */
    public function getInTipoLocalidade()
    {
        return $this->inTipoLocalidade;
    }

    /**
     * Set nuLocalidadeSubordinacao
     *
     * @param integer $nuLocalidadeSubordinacao
     * @return CorporativoCepLocalidade
     */
    public function setNuLocalidadeSubordinacao($nuLocalidadeSubordinacao)
    {
        $this->nuLocalidadeSubordinacao = $nuLocalidadeSubordinacao;
        return $this;
    }

    /**
     * Get nuLocalidadeSubordinacao
     *
     * @return integer 
     */
    public function getNuLocalidadeSubordinacao()
    {
        return $this->nuLocalidadeSubordinacao;
    }

    /**
     * Set noAbreviaturaLocalidade
     *
     * @param string $noAbreviaturaLocalidade
     * @return CorporativoCepLocalidade
     */
    public function setNoAbreviaturaLocalidade($noAbreviaturaLocalidade)
    {
        $this->noAbreviaturaLocalidade = $noAbreviaturaLocalidade;
        return $this;
    }

    /**
     * Get noAbreviaturaLocalidade
     *
     * @return string 
     */
    public function getNoAbreviaturaLocalidade()
    {
        return $this->noAbreviaturaLocalidade;
    }

    /**
     * Set coIbge
     *
     * @param string $coIbge
     * @return CorporativoCepLocalidade
     */
    public function setCoIbge($coIbge)
    {
        $this->coIbge = $coIbge;
        return $this;
    }

    /**
     * Get coIbge
     *
     * @return string 
     */
    public function getCoIbge()
    {
        return $this->coIbge;
    }
}