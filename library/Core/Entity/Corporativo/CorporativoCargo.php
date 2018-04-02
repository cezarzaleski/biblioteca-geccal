<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoCargo
 *
 * @ORM\Table(name="corporativo.vw_cargo")
 * @ORM\Entity
 */
class CorporativoCargo
{
    /**
     * @var integer $sqCargo
     *
     * @ORM\Column(name="sq_cargo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqCargo;

    /**
     * @var string $noCargo
     *
     * @ORM\Column(name="no_cargo", type="string", length=50, nullable=false)
     */
    private $noCargo;

    /**
     * Get sqCargo
     *
     * @return integer 
     */
    public function getSqCargo()
    {
        return $this->sqCargo;
    }

    /**
     * Set noCargo
     *
     * @param string $noCargo
     * @return CorporativoCargo
     */
    public function setNoCargo($noCargo)
    {
        $this->noCargo = $noCargo;
        return $this;
    }

    /**
     * Get noCargo
     *
     * @return string 
     */
    public function getNoCargo()
    {
        return $this->noCargo;
    }
}