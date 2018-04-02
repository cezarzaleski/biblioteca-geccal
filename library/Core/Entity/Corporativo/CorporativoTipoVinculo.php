<?php


namespace Core\Entity\Corporativo;
use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoTipoVinculo
 *
 * @ORM\Table(name="corporativo.vw_tipo_vinculo")
 * @ORM\Entity
 */
class CorporativoTipoVinculo
{
    /**
     * @var integer $sqTipoVinculo
     *
     * @ORM\Column(name="sq_tipo_vinculo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqTipoVinculo;

    /**
     * @var string $noTipoVinculo
     *
     * @ORM\Column(name="no_tipo_vinculo", type="string", length=50, nullable=false)
     */
    private $noTipoVinculo;

    /**
     * @var CorporativoTipoVinculo
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoTipoVinculo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_tipo_vinculo_pai", referencedColumnName="sq_tipo_vinculo")
     * })
     */
    private $sqTipoVinculoPai;


    /**
     * Get sqTipoVinculo
     *
     * @return integer 
     */
    public function getSqTipoVinculo()
    {
        return $this->sqTipoVinculo;
    }

    /**
     * Set noTipoVinculo
     *
     * @param string $noTipoVinculo
     * @return CorporativoTipoVinculo
     */
    public function setNoTipoVinculo($noTipoVinculo)
    {
        $this->noTipoVinculo = $noTipoVinculo;
        return $this;
    }

    /**
     * Get noTipoVinculo
     *
     * @return string 
     */
    public function getNoTipoVinculo()
    {
        return $this->noTipoVinculo;
    }

    /**
     * Set sqTipoVinculoPai
     *
     * @param CorporativoTipoVinculo $sqTipoVinculoPai
     * @return CorporativoTipoVinculo
     */
    public function setSqTipoVinculoPai(\Core\Entity\Corporativo\CorporativoTipoVinculo $sqTipoVinculoPai = null)
    {
        $this->sqTipoVinculoPai = $sqTipoVinculoPai;
        return $this;
    }

    /**
     * Get sqTipoVinculoPai
     *
     * @return CorporativoTipoVinculo 
     */
    public function getSqTipoVinculoPai()
    {
        return $this->sqTipoVinculoPai;
    }
}