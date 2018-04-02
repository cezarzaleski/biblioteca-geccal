<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * CorporativoEstado
 *
 * @ORM\Table(name="corporativo.vw_estado")
 * @ORM\Entity
 */
class CorporativoEstado
{
    /**
     * @var integer $sqEstado
     *
     * @ORM\Column(name="sq_estado", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqEstado;
    
    /**
     * @var integer $sqMunicipio
     *
     * @ORM\OneToMany(targetEntity="\Core\Entity\Corporativo\CorporativoMunicipio", mappedBy="sqEstado")
     */
    private $sqMunicipio;

    /**
     * @var string $sgEstado
     *
     * @ORM\Column(name="sg_estado", type="string", nullable=false)
     */
    private $sgEstado;

    /**
     * @var string $noEstado
     *
     * @ORM\Column(name="no_estado", type="string", length=50, nullable=false)
     */
    private $noEstado;

    /**
     * @var integer $coIbge
     *
     * @ORM\Column(name="co_ibge", type="integer", nullable=true)
     */
    private $coIbge;

    /**
     * @var string $theGeom
     *
     * @ORM\Column(name="the_geom", type="string", nullable=true)
     */
    private $theGeom;

    /**
     * @var \Core\Entity\Corporativo\CorporativoPais
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoPais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_pais", referencedColumnName="sq_pais")
     * })
     */
    private $sqPais;
    
    public function __construct()
    {
    	$this->sqMunicipio          = new ArrayCollection();
    }


    /**
     * Get sqEstado
     *
     * @return integer 
     */
    public function getSqEstado()
    {
        return $this->sqEstado;
    }

    /**
     * Set sgEstado
     *
     * @param string $sgEstado
     */
    public function setSgEstado($sgEstado)
    {
        $this->sgEstado = $sgEstado;
        return $this;
    }

    /**
     * Get sgEstado
     *
     * @return string 
     */
    public function getSgEstado()
    {
        return $this->sgEstado;
    }

    /**
     * Set noEstado
     *
     * @param string $noEstado
     * @return \Core\Entity\Corporativo\CorporativoEstado
     */
    public function setNoEstado($noEstado)
    {
        $this->noEstado = $noEstado;
        return $this;
    }

    /**
     * Get noEstado
     *
     * @return string 
     */
    public function getNoEstado()
    {
        return $this->noEstado;
    }

    /**
     * Set coIbge
     *
     * @param integer $coIbge
     * @return \Core\Entity\Corporativo\CorporativoEstado
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
     * Set theGeom
     *
     * @param string $theGeom
     * @return \Core\Entity\Corporativo\CorporativoEstado
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
     * Set sqPais
     *
     * @param \Core\Entity\Corporativo\CorporativoPais $sqPais
     * @return \Core\Entity\Corporativo\CorporativoEstado
     */
    public function setSqPais(\Core\Entity\Corporativo\CorporativoPais $sqPais = null)
    {
        $this->sqPais = $sqPais;
        return $this;
    }

    /**
     * Get sqPais
     *
     * @return \Core\Entity\Corporativo\CorporativoPais
     */
    public function getSqPais()
    {
        return $this->sqPais;
    }
}