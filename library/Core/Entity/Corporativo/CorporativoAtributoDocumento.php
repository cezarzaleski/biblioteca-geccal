<?php
namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoAtributoDocumento
 *
 * @ORM\Table(name="corporativo.vw_atributo_documento")
 * @ORM\Entity
 */
class CorporativoAtributoDocumento
{
    /**
     * @var integer $sqAtributoDocumento
     *
     * @ORM\Column(name="sq_atributo_documento", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqAtributoDocumento;

    /**
     * @var string $noAtributoDocumento
     *
     * @ORM\Column(name="no_atributo_documento", type="string", length=30, nullable=false)
     */
    private $noAtributoDocumento;

    /**
     * Get sqAtributoDocumento
     *
     * @return integer 
     */
    public function getSqAtributoDocumento()
    {
        return $this->sqAtributoDocumento;
    }

    /**
     * Set noAtributoDocumento
     *
     * @param string $noAtributoDocumento
     * @return CorporativoAtributoDocumento
     */
    public function setNoAtributoDocumento($noAtributoDocumento)
    {
        $this->noAtributoDocumento = $noAtributoDocumento;
        return $this;
    }

    /**
     * Get noAtributoDocumento
     *
     * @return string 
     */
    public function getNoAtributoDocumento()
    {
        return $this->noAtributoDocumento;
    }
}