<?php


namespace Core\Entity\Corporativo;
use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoUnidOrgMunicipio
 *
 * @ORM\Table(name="corporativo.vw_unid_org_municipio")
 * @ORM\Entity
 */
class CorporativoUnidOrgMunicipio
{
    /**
     * @var integer $sqUnidOrgMunicipio
     *
     * @ORM\Column(name="sq_unid_org_municipio", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqUnidOrgMunicipio;

    /**
     * @var boolean $inPrincipal
     *
     * @ORM\Column(name="in_principal", type="boolean", nullable=true)
     */
    private $inPrincipal;

    /**
     * @var CorporativoIntervencao
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoIntervencao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_intervencao", referencedColumnName="sq_intervencao")
     * })
     */
    private $sqIntervencao;

    /**
     * @var CorporativoMunicipio
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoMunicipio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_municipio", referencedColumnName="sq_municipio")
     * })
     */
    private $sqMunicipio;

    /**
     * @var CorporativoUnidadeOrg
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoUnidadeOrg", inversedBy="sqUnidOrgMunicipio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_unidade_org", referencedColumnName="sq_pessoa")
     * })
     */
    private $sqUnidadeOrg;


    /**
     * Get sqUnidOrgMunicipio
     *
     * @return integer 
     */
    public function getSqUnidOrgMunicipio()
    {
        return $this->sqUnidOrgMunicipio;
    }

    /**
     * Set inPrincipal
     *
     * @param boolean $inPrincipal
     * @return CorporativoUnidOrgMunicipio
     */
    public function setInPrincipal($inPrincipal)
    {
        $this->inPrincipal = $inPrincipal;
        return $this;
    }

    /**
     * Get inPrincipal
     *
     * @return boolean 
     */
    public function getInPrincipal()
    {
        return $this->inPrincipal;
    }

    /**
     * Set sqIntervencao
     *
     * @param CorporativoIntervencao $sqIntervencao
     * @return CorporativoUnidOrgMunicipio
     */
    public function setSqIntervencao(\Core\Entity\Corporativo\CorporativoIntervencao $sqIntervencao = null)
    {
        $this->sqIntervencao = $sqIntervencao;
        return $this;
    }

    /**
     * Get sqIntervencao
     *
     * @return CorporativoIntervencao 
     */
    public function getSqIntervencao()
    {
        return $this->sqIntervencao;
    }

    /**
     * Set sqMunicipio
     *
     * @param CorporativoMunicipio $sqMunicipio
     * @return CorporativoUnidOrgMunicipio
     */
    public function setSqMunicipio(\Core\Entity\Corporativo\CorporativoMunicipio $sqMunicipio = null)
    {
        $this->sqMunicipio = $sqMunicipio;
        return $this;
    }

    /**
     * Get sqMunicipio
     *
     * @return CorporativoMunicipio 
     */
    public function getSqMunicipio()
    {
        return $this->sqMunicipio;
    }

    /**
     * Set sqUnidadeOrg
     *
     * @param CorporativoUnidadeOrg $sqUnidadeOrg
     * @return CorporativoUnidOrgMunicipio
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