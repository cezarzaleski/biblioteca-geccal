<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoMunicipio
 *
 * @ORM\Table(name="corporativo.vw_municipio")
 * @ORM\Entity
 */
class CorporativoMunicipio
{
    /**
     * @var integer $sqMunicipio
     *
     * @ORM\Column(name="sq_municipio", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqMunicipio;

    /**
     * @var integer $coIbge
     *
     * @ORM\Column(name="co_ibge", type="integer", nullable=false)
     */
    private $coIbge;

    /**
     * @var text $noMunicipio
     *
     * @ORM\Column(name="no_municipio", type="text", nullable=false)
     */
    private $noMunicipio;

    /**
     * @var \Core\Entity\Corporativo\CorporativoEstado
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoEstado", inversedBy="sqMunicipio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_estado", referencedColumnName="sq_estado")
     * })
     */
    private $sqEstado;

    /**
     * Get sqMunicipio
     *
     * @return integer 
     */
    public function getSqMunicipio()
    {
        return $this->sqMunicipio;
    }

    /**
     * Set coIbge
     *
     * @param integer $coIbge
     * @return CorporativoMunicipio
     */
    public function setCoIbge($coIbge)
    {
        $this->coIbge = $coIbge;
        return $this;
    }

    /**
     * Get coIbge
     *
     * @return integer 
     */
    public function getCoIbge()
    {
        return $this->coIbge;
    }

    /**
     * Set noMunicipio
     *
     * @param text $noMunicipio
     * @return CorporativoMunicipio
     */
    public function setNoMunicipio($noMunicipio)
    {
        $this->noMunicipio = $noMunicipio;
        return $this;
    }

    /**
     * Get noMunicipio
     *
     * @return text 
     */
    public function getNoMunicipio()
    {
        return $this->noMunicipio;
    }

    /**
     * Set sqEstado
     *
     * @param \Core\Entity\Corporativo\CorporativoEstado $sqEstado
     * @return CorporativoMunicipio
     */
    public function setSqEstado(\Core\Entity\Corporativo\CorporativoEstado $sqEstado = null)
    {
        $this->sqEstado = $sqEstado;
        return $this;
    }

    /**
     * Get sqEstado
     *
     * @return \Core\Entity\Corporativo\CorporativoEstado 
     */
    public function getSqEstado()
    {
        return $this->sqEstado;
    }
}