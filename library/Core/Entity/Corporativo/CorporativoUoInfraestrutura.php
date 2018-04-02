<?php


namespace Core\Entity\Corporativo;
use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoUoInfraestrutura
 *
 * @ORM\Table(name="corporativo.vw_uo_infraestrutura")
 * @ORM\Entity
 */
class CorporativoUoInfraestrutura
{
    /**
     * @var integer $sqUoInfraestrutura
     *
     * @ORM\Column(name="sq_uo_infraestrutura", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqUoInfraestrutura;

    /**
     * @var text $noInfraestrutura
     *
     * @ORM\Column(name="no_infraestrutura", type="text", nullable=false)
     */
    private $noInfraestrutura;

    /**
     * @var CorporativoUnidadeOrg
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoUnidadeOrg")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_unidade_org", referencedColumnName="sq_pessoa")
     * })
     */
    private $sqUnidadeOrg;


    /**
     * Get sqUoInfraestrutura
     *
     * @return integer 
     */
    public function getSqUoInfraestrutura()
    {
        return $this->sqUoInfraestrutura;
    }

    /**
     * Set noInfraestrutura
     *
     * @param text $noInfraestrutura
     * @return CorporativoUoInfraestrutura
     */
    public function setNoInfraestrutura($noInfraestrutura)
    {
        $this->noInfraestrutura = $noInfraestrutura;
        return $this;
    }

    /**
     * Get noInfraestrutura
     *
     * @return text 
     */
    public function getNoInfraestrutura()
    {
        return $this->noInfraestrutura;
    }

    /**
     * Set sqUnidadeOrg
     *
     * @param CorporativoUnidadeOrg $sqUnidadeOrg
     * @return CorporativoUoInfraestrutura
     */
    public function setSqUnidadeOrg(\Core\Entity\Corporativo\CorporativoUnidadeOrg $sqUnidadeOrg = null)
    {
        $this->sqUnidadeOrg = $sqUnidadeOrg;
        return $this;
    }

    /**
     * Get sqUnidadeOrg
     *
     * @return CorporativoUnidadeOrg 
     */
    public function getSqUnidadeOrg()
    {
        return $this->sqUnidadeOrg;
    }
}