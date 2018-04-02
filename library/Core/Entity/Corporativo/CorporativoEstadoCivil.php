<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoEstadoCivil
 *
 * @ORM\Table(name="corporativo.vw_estado_civil")
 * @ORM\Entity
 */
class CorporativoEstadoCivil
{
    /**
     * @var integer $sqEstadoCivil
     *
     * @ORM\Column(name="sq_estado_civil", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqEstadoCivil;

    /**
     * @var string $noEstadoCivil
     *
     * @ORM\Column(name="no_estado_civil", type="string", length=25, nullable=false)
     */
    private $noEstadoCivil;


    /**
     * Get sqEstadoCivil
     *
     * @return integer 
     */
    public function getSqEstadoCivil()
    {
        return $this->sqEstadoCivil;
    }

    /**
     * Set noEstadoCivil
     *
     * @param string $noEstadoCivil
     * @return CorporativoEstadoCivil
     */
    public function setNoEstadoCivil($noEstadoCivil)
    {
        $this->noEstadoCivil = $noEstadoCivil;
        return $this;
    }

    /**
     * Get noEstadoCivil
     *
     * @return string 
     */
    public function getNoEstadoCivil()
    {
        return $this->noEstadoCivil;
    }
}