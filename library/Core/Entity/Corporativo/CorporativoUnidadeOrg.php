<?php


namespace  Core\Entity\Corporativo;
use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoUnidadeOrg
 *
 * @ORM\Table(name="corporativo.vw_unidade_org")
 * @ORM\Entity
 */
class CorporativoUnidadeOrg
{
    /**
     * @var string $coUorg
     *
     * @ORM\Column(name="co_uorg", type="string", length=11, nullable=true)
     */
    private $coUorg;
    
    /**
     * @var integer $sqUnidOrgMunicipio
     *
     * @ORM\OneToMany(targetEntity="\Core\Entity\Corporativo\CorporativoUnidOrgMunicipio", mappedBy="sqUnidadeOrg")
     */
    private $sqUnidOrgMunicipio;

    /**
     * @var string $sgUnidadeOrg
     *
     * @ORM\Column(name="sg_unidade_org", type="string", length=120, nullable=true)
     */
    private $sgUnidadeOrg;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;

    /**
     * @var string $nuLatitude
     *
     * @ORM\Column(name="nu_latitude", type="string", length=10, nullable=true)
     */
    private $nuLatitude;

    /**
     * @var string $nuLongitude
     *
     * @ORM\Column(name="nu_longitude", type="string", length=10, nullable=true)
     */
    private $nuLongitude;

    /**
     * @var boolean $inUnidadeFinanceira
     *
     * @ORM\Column(name="in_unidade_financeira", type="boolean", nullable=true)
     */
    private $inUnidadeFinanceira;

    /**
     * @var boolean $inUoExterna
     *
     * @ORM\Column(name="in_uo_externa", type="boolean", nullable=true)
     */
    private $inUoExterna;

    /**
     * @var string $coUnidadeGestora
     *
     * @ORM\Column(name="co_unidade_gestora", type="string", length=10, nullable=true)
     */
    private $coUnidadeGestora;

    /**
     * @var integer $nuNup
     *
     * @ORM\Column(name="nu_nup", type="integer", nullable=true)
     */
    private $nuNup;

    /**
     * @var string $theGeom
     *
     * @ORM\Column(name="the_geom", type="string", nullable=true)
     */
    //private $theGeom;

    /**
     * @var CorporativoEsfera
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoEsfera")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_esfera", referencedColumnName="sq_esfera")
     * })
     */
    private $sqEsfera;

    /**
     * @var CorporativoPessoa
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="\Core\Entity\Corporativo\CorporativoPessoa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_pessoa", referencedColumnName="sq_pessoa")
     * })
     */
    private $sqPessoa;

    /**
     * @var CorporativoUnidadeOrg
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoUnidadeOrg")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_uo_protocolizadora", referencedColumnName="sq_pessoa")
     * })
     */
    private $sqUoProtocolizadora;

    /**
     * @var CorporativoTipoUnidadeOrg
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoTipoUnidadeOrg")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_tipo_unidade", referencedColumnName="sq_tipo_unidade_org")
     * })
     */
    private $sqTipoUnidade;

    /**
     * @var CorporativoUnidadeOrg
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoUnidadeOrg")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_unidade_adm_pai", referencedColumnName="sq_pessoa")
     * })
     */
    private $sqUnidadeAdmPai;

    /**
     * @var CorporativoUnidadeOrg
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoUnidadeOrg")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_unidade_fin_pai", referencedColumnName="sq_pessoa")
     * })
     */
    private $sqUnidadeFinPai;
    
    /**
     * @var CorporativoUnidadeOrg
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoUnidadeOrg")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_tipo_pessoa", referencedColumnName="sq_tipo_pessoa")
     * })
     */
    private $sqTipoPessoa;
    
    /**
     * @var CorporativoUnidadeOrg
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoUnidadeOrg")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="no_pessoa", referencedColumnName="sq_pessoa")
     * })
     */
    private $noPessoa;

    /**
     * @var CorporativoUnidadeOrg
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoUnidadeOrg")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_unidade_superior", referencedColumnName="sq_pessoa")
     * })
     */
    private $sqUnidadeSuperior;
    
    public function __construct()
    {
    	$this->sqUnidOrgMunicipio          = new ArrayCollection();
    }


    /**
     * Set coUorg
     *
     * @param string $coUorg
     * @return CorporativoUnidadeOrg
     */
    public function setCoUorg($coUorg)
    {
        $this->coUorg = $coUorg;
        return $this;
    }

    /**
     * Get coUorg
     *
     * @return string 
     */
    public function getCoUorg()
    {
        return $this->coUorg;
    }

    /**
     * Set sgUnidadeOrg
     *
     * @param string $sgUnidadeOrg
     * @return CorporativoUnidadeOrg
     */
    public function setSgUnidadeOrg($sgUnidadeOrg)
    {
        $this->sgUnidadeOrg = $sgUnidadeOrg;
        return $this;
    }

    /**
     * Get sgUnidadeOrg
     *
     * @return string 
     */
    public function getSgUnidadeOrg()
    {
        return $this->sgUnidadeOrg;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return CorporativoUnidadeOrg
     */
    public function setStAtivo($stAtivo)
    {
        $this->stAtivo = $stAtivo;
        return $this;
    }

    /**
     * Get stAtivo
     *
     * @return boolean 
     */
    public function getStAtivo()
    {
        return $this->stAtivo;
    }

    /**
     * Set nuLatitude
     *
     * @param string $nuLatitude
     * @return CorporativoUnidadeOrg
     */
    public function setNuLatitude($nuLatitude)
    {
        $this->nuLatitude = $nuLatitude;
        return $this;
    }

    /**
     * Get nuLatitude
     *
     * @return string 
     */
    public function getNuLatitude()
    {
        return $this->nuLatitude;
    }

    /**
     * Set nuLongitude
     *
     * @param string $nuLongitude
     * @return CorporativoUnidadeOrg
     */
    public function setNuLongitude($nuLongitude)
    {
        $this->nuLongitude = $nuLongitude;
        return $this;
    }

    /**
     * Get nuLongitude
     *
     * @return string 
     */
    public function getNuLongitude()
    {
        return $this->nuLongitude;
    }

    /**
     * Set inUnidadeFinanceira
     *
     * @param boolean $inUnidadeFinanceira
     * @return CorporativoUnidadeOrg
     */
    public function setInUnidadeFinanceira($inUnidadeFinanceira)
    {
        $this->inUnidadeFinanceira = $inUnidadeFinanceira;
        return $this;
    }

    /**
     * Get inUnidadeFinanceira
     *
     * @return boolean 
     */
    public function getInUnidadeFinanceira()
    {
        return $this->inUnidadeFinanceira;
    }

    /**
     * Set inUoExterna
     *
     * @param boolean $inUoExterna
     * @return CorporativoUnidadeOrg
     */
    public function setInUoExterna($inUoExterna)
    {
        $this->inUoExterna = $inUoExterna;
        return $this;
    }

    /**
     * Get inUoExterna
     *
     * @return boolean 
     */
    public function getInUoExterna()
    {
        return $this->inUoExterna;
    }

    /**
     * Set coUnidadeGestora
     *
     * @param string $coUnidadeGestora
     * @return CorporativoUnidadeOrg
     */
    public function setCoUnidadeGestora($coUnidadeGestora)
    {
        $this->coUnidadeGestora = $coUnidadeGestora;
        return $this;
    }

    /**
     * Get coUnidadeGestora
     *
     * @return string 
     */
    public function getCoUnidadeGestora()
    {
        return $this->coUnidadeGestora;
    }

    /**
     * Set nuNup
     *
     * @param integer $nuNup
     * @return CorporativoUnidadeOrg
     */
    public function setNuNup($nuNup)
    {
        $this->nuNup = $nuNup;
        return $this;
    }

    /**
     * Get nuNup
     *
     * @return integer 
     */
    public function getNuNup()
    {
        return $this->nuNup;
    }

    /**
     * Set theGeom
     *
     * @param string $theGeom
     * @return CorporativoUnidadeOrg
    
    public function setTheGeom($theGeom)
    {
        $this->theGeom = $theGeom;
        return $this;
    }
     */

    /**
     * Get theGeom
     *
     * @return string 
     
    public function getTheGeom()
    {
        return $this->theGeom;
    }
     */

    /**
     * Set sqEsfera
     *
     * @param CorporativoEsfera $sqEsfera
     * @return CorporativoUnidadeOrg
     */
    public function setSqEsfera(\Core\Entity\Corporativo\CorporativoEsfera $sqEsfera = null)
    {
        $this->sqEsfera = $sqEsfera;
        return $this;
    }

    /**
     * Get sqEsfera
     *
     * @return CorporativoEsfera 
     */
    public function getSqEsfera()
    {
        return $this->sqEsfera;
    }

    /**
     * Set sqPessoa
     *
     * @param CorporativoPessoa $sqPessoa
     * @return CorporativoUnidadeOrg
     */
    public function setSqPessoa(\Core\Entity\Corporativo\CorporativoPessoa $sqPessoa)
    {
        $this->sqPessoa = $sqPessoa;
        return $this;
    }

    /**
     * Get sqPessoa
     *
     * @return CorporativoPessoa 
     */
    public function getSqPessoa()
    {
        return $this->sqPessoa;
    }

    /**
     * Set sqUoProtocolizadora
     *
     * @param CorporativoUnidadeOrg $sqUoProtocolizadora
     * @return CorporativoUnidadeOrg
     */
    public function setSqUoProtocolizadora(\Core\Entity\Corporativo\CorporativoUnidadeOrg $sqUoProtocolizadora = null)
    {
        $this->sqUoProtocolizadora = $sqUoProtocolizadora;
        return $this;
    }

    /**
     * Get sqUoProtocolizadora
     *
     * @return CorporativoUnidadeOrg 
     */
    public function getSqUoProtocolizadora()
    {
        return $this->sqUoProtocolizadora;
    }

    /**
     * Set sqTipoUnidade
     *
     * @param CorporativoTipoUnidadeOrg $sqTipoUnidade
     * @return CorporativoUnidadeOrg
     */
    public function setSqTipoUnidade(\Core\Entity\Corporativo\CorporativoTipoUnidadeOrg $sqTipoUnidade = null)
    {
        $this->sqTipoUnidade = $sqTipoUnidade;
        return $this;
    }

    /**
     * Get sqTipoUnidade
     *
     * @return CorporativoTipoUnidadeOrg 
     */
    public function getSqTipoUnidade()
    {
        return $this->sqTipoUnidade;
    }

    /**
     * Set sqUnidadeAdmPai
     *
     * @param CorporativoUnidadeOrg $sqUnidadeAdmPai
     * @return CorporativoUnidadeOrg
     */
    public function setSqUnidadeAdmPai(\Core\Entity\Corporativo\CorporativoUnidadeOrg $sqUnidadeAdmPai = null)
    {
        $this->sqUnidadeAdmPai = $sqUnidadeAdmPai;
        return $this;
    }

    /**
     * Get sqUnidadeAdmPai
     *
     * @return CorporativoUnidadeOrg 
     */
    public function getSqUnidadeAdmPai()
    {
        return $this->sqUnidadeAdmPai;
    }

    /**
     * Set sqUnidadeFinPai
     *
     * @param CorporativoUnidadeOrg $sqUnidadeFinPai
     * @return CorporativoUnidadeOrg
     */
    public function setSqUnidadeFinPai(\Core\Entity\Corporativo\CorporativoUnidadeOrg $sqUnidadeFinPai = null)
    {
        $this->sqUnidadeFinPai = $sqUnidadeFinPai;
        return $this;
    }

    /**
     * Get sqUnidadeFinPai
     *
     * @return CorporativoUnidadeOrg 
     */
    public function getSqUnidadeFinPai()
    {
        return $this->sqUnidadeFinPai;
    }

    /**
     * Set sqUnidadeSuperior
     *
     * @param CorporativoUnidadeOrg $sqUnidadeSuperior
     * @return CorporativoUnidadeOrg
     */
    public function setSqUnidadeSuperior(\Core\Entity\Corporativo\CorporativoUnidadeOrg $sqUnidadeSuperior = null)
    {
        $this->sqUnidadeSuperior = $sqUnidadeSuperior;
        return $this;
    }

    /**
     * Get sqUnidadeSuperior
     *
     * @return CorporativoUnidadeOrg 
     */
    public function getSqUnidadeSuperior()
    {
        return $this->sqUnidadeSuperior;
    }
}