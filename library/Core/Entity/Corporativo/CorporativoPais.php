<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoPais
 *
 * @ORM\Table(name="corporativo.vw_pais")
 * @ORM\Entity
 */
class CorporativoPais
{
    /**
     * @var integer $sqPais
     *
     * @ORM\Column(name="sq_pais", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqPais;

    /**
     * @var string $noPais
     *
     * @ORM\Column(name="no_pais", type="string", length=50, nullable=false)
     */
    private $noPais;

    /**
     * @var string $theGeom
     *
     * @ORM\Column(name="the_geom", type="string", nullable=true)
     */
    private $theGeom;

    /**
     * @var boolean $inFazFronteira
     *
     * @ORM\Column(name="in_faz_fronteira", type="boolean", nullable=false)
     */
    private $inFazFronteira;


    /**
     * Get sqPais
     *
     * @return integer 
     */
    public function getSqPais()
    {
        return $this->sqPais;
    }

    /**
     * Set noPais
     *
     * @param string $noPais
     * @return \Core\Entity\Corporativo\CorporativoPais
     */
    public function setNoPais($noPais)
    {
        $this->noPais = $noPais;
        return $this;
    }

    /**
     * Get noPais
     *
     * @return string 
     */
    public function getNoPais()
    {
        return $this->noPais;
    }

    /**
     * Set theGeom
     *
     * @param string $theGeom
     * @return \Core\Entity\Corporativo\CorporativoPais
     */
    public function setTheGeom($theGeom)
    {
        $this->theGeom = $theGeom;
        return $this;
    }

    /**
     * Get theGeom
     *
     * @return string 
     */
    public function getTheGeom()
    {
        return $this->theGeom;
    }

    /**
     * Set inFazFronteira
     *
     * @param boolean $inFazFronteira
     * @return \Core\Entity\Corporativo\CorporativoPais
     */
    public function setInFazFronteira($inFazFronteira)
    {
        $this->inFazFronteira = $inFazFronteira;
        return $this;
    }

    /**
     * Get inFazFronteira
     *
     * @return boolean 
     */
    public function getInFazFronteira()
    {
        return $this->inFazFronteira;
    }
}