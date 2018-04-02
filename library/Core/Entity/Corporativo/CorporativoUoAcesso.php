<?php


namespace  Core\Entity\Corporativo;
use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoUoAcesso
 *
 * @ORM\Table(name="corporativo.vw_uo_acesso")
 * @ORM\Entity
 */
class CorporativoUoAcesso
{
    /**
     * @var integer $sqUoAcesso
     *
     * @ORM\Column(name="sq_uo_acesso", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqUoAcesso;

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
     * Get sqUoAcesso
     *
     * @return integer 
     */
    public function getSqUoAcesso()
    {
        return $this->sqUoAcesso;
    }

    /**
     * Set sqUnidadeOrg
     *
     * @param CorporativoUnidadeOrg $sqUnidadeOrg
     * @return CorporativoUoAcesso
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