<?php


namespace Core\Entity\Corporativo;
use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoTipoSociedade
 *
 * @ORM\Table(name="corporativo.vw_tipo_sociedade")
 * @ORM\Entity
 */
class CorporativoTipoSociedade
{
    /**
     * @var integer $sqTipoSociedade
     *
     * @ORM\Column(name="sq_tipo_sociedade", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     */
    private $sqTipoSociedade;

    /**
     * @var string $noTipoSociedade
     *
     * @ORM\Column(name="no_tipo_sociedade", type="string", length=20, nullable=false)
     */
    private $noTipoSociedade;


    /**
     * Get sqTipoSociedade
     *
     * @return integer 
     */
    public function getSqTipoSociedade()
    {
        return $this->sqTipoSociedade;
    }

    /**
     * Set noTipoSociedade
     *
     * @param string $noTipoSociedade
     * @return CorporativoTipoSociedade
     */
    public function setNoTipoSociedade($noTipoSociedade)
    {
        $this->noTipoSociedade = $noTipoSociedade;
        return $this;
    }

    /**
     * Get noTipoSociedade
     *
     * @return string 
     */
    public function getNoTipoSociedade()
    {
        return $this->noTipoSociedade;
    }
}