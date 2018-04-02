<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoTipoMidia
 *
 * @ORM\Table(name="corporativo.vw_tipo_midia")
 * @ORM\Entity
 */
class CorporativoTipoMidia
{
    /**
     * @var integer $sqTipoMidia
     *
     * @ORM\Column(name="sq_tipo_midia", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqTipoMidia;

    /**
     * @var string $deTipoMidia
     *
     * @ORM\Column(name="de_tipo_midia", type="string", length=10, nullable=false)
     */
    private $deTipoMidia;

    /**
     * Get sqTipoMidia
     *
     * @return integer 
     */
    public function getSqTipoMidia()
    {
        return $this->sqTipoMidia;
    }

    /**
     * Set deTipoMidia
     *
     * @param string $deTipoMidia
     * @return CorporativoTipoMidia
     */
    public function setDeTipoMidia($deTipoMidia)
    {
        $this->deTipoMidia = $deTipoMidia;
        return $this;
    }

    /**
     * Get deTipoMidia
     *
     * @return string 
     */
    public function getDeTipoMidia()
    {
        return $this->deTipoMidia;
    }
}