<?php

namespace Core\Entity\Corporativo;
use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoBiomaMunicipio
 *
 * @ORM\Table(name="corporativo.vw_bioma_municipio")
 * @ORM\Entity
 */
class CorporativoBiomaMunicipio
{
    /**
     * @var integer $sqBiomaMunicipio
     *
     * @ORM\Column(name="sq_bioma_municipio", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqBiomaMunicipio;

    /**
     * @var \Core\Entity\Corporativo\CorporativoBioma
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoBioma")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_bioma", referencedColumnName="sq_bioma")
     * })
     */
    private $sqBioma;

    /**
     * @var \Core\Entity\Corporativo\CorporativoMunicipio
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoMunicipio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_municipio", referencedColumnName="sq_municipio")
     * })
     */
    private $sqMunicipio;


    /**
     * Get sqBiomaMunicipio
     *
     * @return integer 
     */
    public function getSqBiomaMunicipio()
    {
        return $this->sqBiomaMunicipio;
    }

    /**
     * Set sqBioma
     *
     * @param \Core\Entity\Corporativo\CorporativoBioma $sqBioma
     * @return CorporativoBiomaMunicipio
     */
    public function setSqBioma(\Core\Entity\Corporativo\CorporativoBioma $sqBioma = null)
    {
        $this->sqBioma = $sqBioma;
        return $this;
    }

    /**
     * Get sqBioma
     *
     * @return \Core\Entity\Corporativo\CorporativoBioma 
     */
    public function getSqBioma()
    {
        return $this->sqBioma;
    }

    /**
     * Set sqMunicipio
     *
     * @param \Core\Entity\Corporativo\CorporativoMunicipio $sqMunicipio
     * @return CorporativoBiomaMunicipio
     */
    public function setSqMunicipio(\Core\Entity\Corporativo\CorporativoMunicipio $sqMunicipio = null)
    {
        $this->sqMunicipio = $sqMunicipio;
        return $this;
    }

    /**
     * Get sqMunicipio
     *
     * @return \Core\Entity\Corporativo\CorporativoMunicipio
     */
    public function getSqMunicipio()
    {
        return $this->sqMunicipio;
    }
}