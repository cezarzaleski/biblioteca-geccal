<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoCepBairro
 *
 * @ORM\Table(name="corporativo.vw_cep_bairro")
 * @ORM\Entity
 */
class CorporativoCepBairro
{
    /**
     * @var integer $sqCepBairro
     *
     * @ORM\Column(name="sq_cep_bairro", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqCepBairro;

    /**
     * @var string $sgUfBairro
     *
     * @ORM\Column(name="sg_uf_bairro", type="string", nullable=true)
     */
    private $sgUfBairro;

    /**
     * @var string $noBairro
     *
     * @ORM\Column(name="no_bairro", type="string", length=72, nullable=true)
     */
    private $noBairro;

    /**
     * @var string $noAbreviaturaBairro
     *
     * @ORM\Column(name="no_abreviatura_bairro", type="string", length=36, nullable=true)
     */
    private $noAbreviaturaBairro;

    /**
     * @var CorporativoCepLocalidade
     *
     * @ORM\ManyToOne(targetEntity="CorporativoCepLocalidade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_uf_localidade", referencedColumnName="sq_cep_localidade")
     * })
     */
    private $sqUfLocalidade;

    /**
     * Get sqCepBairro
     *
     * @return integer 
     */
    public function getSqCepBairro()
    {
        return $this->sqCepBairro;
    }

    /**
     * Set sgUfBairro
     *
     * @param string $sgUfBairro
     * @return CorporativoCepBairro
     */
    public function setSgUfBairro($sgUfBairro)
    {
        $this->sgUfBairro = $sgUfBairro;
        return $this;
    }

    /**
     * Get sgUfBairro
     *
     * @return string 
     */
    public function getSgUfBairro()
    {
        return $this->sgUfBairro;
    }

    /**
     * Set noBairro
     *
     * @param string $noBairro
     * @return CorporativoCepBairro
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
     * Set noAbreviaturaBairro
     *
     * @param string $noAbreviaturaBairro
     * @return CorporativoCepBairro
     */
    public function setNoAbreviaturaBairro($noAbreviaturaBairro)
    {
        $this->noAbreviaturaBairro = $noAbreviaturaBairro;
        return $this;
    }

    /**
     * Get noAbreviaturaBairro
     *
     * @return string 
     */
    public function getNoAbreviaturaBairro()
    {
        return $this->noAbreviaturaBairro;
    }

    /**
     * Set sqUfLocalidade
     *
     * @param \Core\Entity\Corporativo\CorporativoCepLocalidade $sqUfLocalidade
     * @return CorporativoCepBairro
     */
    public function setSqUfLocalidade(\Core\Entity\Corporativo\CorporativoCepLocalidade $sqUfLocalidade = null)
    {
        $this->sqUfLocalidade = $sqUfLocalidade;
        return $this;
    }

    /**
     * Get sqUfLocalidade
     *
     * @return CorporativoCepLocalidade 
     */
    public function getSqUfLocalidade()
    {
        return $this->sqUfLocalidade;
    }
}