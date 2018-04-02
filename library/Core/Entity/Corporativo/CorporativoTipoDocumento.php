<?php

namespace Core\Entity\Corporativo;
use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoTipoDocumento
 *
 * @ORM\Table(name="corporativo.vw_tipo_documento")
 * @ORM\Entity
 */
class CorporativoTipoDocumento
{
    /**
     * @var integer $sqTipoDocumento
     *
     * @ORM\Column(name="sq_tipo_documento", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqTipoDocumento;

    /**
     * @var string $noTipoDocumento
     *
     * @ORM\Column(name="no_tipo_documento", type="string", length=50, nullable=false)
     */
    private $noTipoDocumento;

    /**
     * Get sqTipoDocumento
     *
     * @return integer 
     */
    public function getSqTipoDocumento()
    {
        return $this->sqTipoDocumento;
    }

    /**
     * Set noTipoDocumento
     *
     * @param string $noTipoDocumento
     * @return CorporativoTipoDocumento
     */
    public function setNoTipoDocumento($noTipoDocumento)
    {
        $this->noTipoDocumento = $noTipoDocumento;
        return $this;
    }

    /**
     * Get noTipoDocumento
     *
     * @return string 
     */
    public function getNoTipoDocumento()
    {
        return $this->noTipoDocumento;
    }
}