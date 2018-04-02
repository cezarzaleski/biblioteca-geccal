<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoAtributoTipoDocumento
 *
 * @ORM\Table(name="corporativo.vw_atributo_tipo_documento")
 * @ORM\Entity
 */
class CorporativoAtributoTipoDocumento
{
    /**
     * @var integer $sqAtributoTipoDocumento
     *
     * @ORM\Column(name="sq_atributo_tipo_documento", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqAtributoTipoDocumento;

    /**
     * @var bigint $sqTipoDocumento
     *
     * @ORM\Column(name="sq_tipo_documento", type="bigint", nullable=false)
     */
    private $sqTipoDocumento;

    /**
     * @var \Core\Entity\Corporativo\CorporativoAtributoDocumento
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoAtributoDocumento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_atributo_documento", referencedColumnName="sq_atributo_documento")
     * })
     */
    private $sqAtributoDocumento;


    /**
     * Get sqAtributoTipoDocumento
     *
     * @return integer 
     */
    public function getSqAtributoTipoDocumento()
    {
        return $this->sqAtributoTipoDocumento;
    }

    /**
     * Set sqTipoDocumento
     *
     * @param bigint $sqTipoDocumento
     * @return CorporativoAtributoTipoDocumento
     */
    public function setSqTipoDocumento($sqTipoDocumento)
    {
        $this->sqTipoDocumento = $sqTipoDocumento;
        return $this;
    }

    /**
     * Get sqTipoDocumento
     *
     * @return bigint 
     */
    public function getSqTipoDocumento()
    {
        return $this->sqTipoDocumento;
    }

    /**
     * Set sqAtributoDocumento
     *
     * @param \Core\Entity\Corporativo\CorporativoAtributoDocumento $sqAtributoDocumento
     * @return CorporativoAtributoTipoDocumento
     */
    public function setSqAtributoDocumento(\Core\Entity\Corporativo\CorporativoAtributoDocumento $sqAtributoDocumento = null)
    {
        $this->sqAtributoDocumento = $sqAtributoDocumento;
        return $this;
    }

    /**
     * Get sqAtributoDocumento
     *
     * @return CorporativoAtributoDocumento 
     */
    public function getSqAtributoDocumento()
    {
        return $this->sqAtributoDocumento;
    }
}