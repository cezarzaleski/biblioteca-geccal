<?php


namespace Core\Entity\Corporativo;
use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoUnidadeMedida
 *
 * @ORM\Table(name="corporativo.vw_unidade_medida")
 * @ORM\Entity
 */
class CorporativoUnidadeMedida
{
    /**
     * @var integer $sqUnidadeMedida
     *
     * @ORM\Column(name="sq_unidade_medida", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqUnidadeMedida;

    /**
     * @var string $noUnidadeMedida
     *
     * @ORM\Column(name="no_unidade_medida", type="string", length=50, nullable=true)
     */
    private $noUnidadeMedida;

    /**
     * @var CorporativoTipoUnidadeMedida
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoTipoUnidadeMedida")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_tipo_unidade_medida", referencedColumnName="sq_tipo_unidade_medida")
     * })
     */
    private $sqTipoUnidadeMedida;


    /**
     * Get sqUnidadeMedida
     *
     * @return integer 
     */
    public function getSqUnidadeMedida()
    {
        return $this->sqUnidadeMedida;
    }

    /**
     * Set noUnidadeMedida
     *
     * @param string $noUnidadeMedida
     * @return CorporativoUnidadeMedida
     */
    public function setNoUnidadeMedida($noUnidadeMedida)
    {
        $this->noUnidadeMedida = $noUnidadeMedida;
        return $this;
    }

    /**
     * Get noUnidadeMedida
     *
     * @return string 
     */
    public function getNoUnidadeMedida()
    {
        return $this->noUnidadeMedida;
    }

    /**
     * Set sqTipoUnidadeMedida
     *
     * @param CorporativoTipoUnidadeMedida $sqTipoUnidadeMedida
     * @return CorporativoUnidadeMedida
     */
    public function setSqTipoUnidadeMedida(\Core\Entity\Corporativo\CorporativoTipoUnidadeMedida $sqTipoUnidadeMedida = null)
    {
        $this->sqTipoUnidadeMedida = $sqTipoUnidadeMedida;
        return $this;
    }

    /**
     * Get sqTipoUnidadeMedida
     *
     * @return CorporativoTipoUnidadeMedida 
     */
    public function getSqTipoUnidadeMedida()
    {
        return $this->sqTipoUnidadeMedida;
    }
}