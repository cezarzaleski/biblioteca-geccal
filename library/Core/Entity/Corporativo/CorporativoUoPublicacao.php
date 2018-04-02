<?php


namespace  Core\Entity\Corporativo;
use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoUoPublicacao
 *
 * @ORM\Table(name="corporativo.vw_uo_publicacao")
 * @ORM\Entity
 */
class CorporativoUoPublicacao
{
    /**
     * @var integer $sqUoPublicacao
     *
     * @ORM\Column(name="sq_uo_publicacao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqUoPublicacao;

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
     * Get sqUoPublicacao
     *
     * @return integer 
     */
    public function getSqUoPublicacao()
    {
        return $this->sqUoPublicacao;
    }

    /**
     * Set sqUnidadeOrg
     *
     * @param CorporativoUnidadeOrg $sqUnidadeOrg
     * @return CorporativoUoPublicacao
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