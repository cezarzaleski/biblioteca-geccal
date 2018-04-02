<?php


namespace Core\Entity\Corporativo;
use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoTipoUnidadeMedida
 *
 * @ORM\Table(name="corporativo.vw_tipo_unidade_medida")
 * @ORM\Entity
 */
class CorporativoTipoUnidadeMedida
{
    /**
     * @var integer $sqTipoUnidadeMedida
     *
     * @ORM\Column(name="sq_tipo_unidade_medida", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqTipoUnidadeMedida;

    /**
     * @var string $noTipoUnidadeMedida
     *
     * @ORM\Column(name="no_tipo_unidade_medida", type="string", length=50, nullable=true)
     */
    private $noTipoUnidadeMedida;


    /**
     * Get sqTipoUnidadeMedida
     *
     * @return integer 
     */
    public function getSqTipoUnidadeMedida()
    {
        return $this->sqTipoUnidadeMedida;
    }

    /**
     * Set noTipoUnidadeMedida
     *
     * @param string $noTipoUnidadeMedida
     * @return CorporativoTipoUnidadeMedida
     */
    public function setNoTipoUnidadeMedida($noTipoUnidadeMedida)
    {
        $this->noTipoUnidadeMedida = $noTipoUnidadeMedida;
        return $this;
    }

    /**
     * Get noTipoUnidadeMedida
     *
     * @return string 
     */
    public function getNoTipoUnidadeMedida()
    {
        return $this->noTipoUnidadeMedida;
    }
}