<?php

namespace Core\Entity\Corporativo;
use Doctrine\ORM\Mapping as ORM,
Doctrine\Common\Collections\ArrayCollection;

/**
 * CorporativoTipoUnidadeOrg
 *
 * @ORM\Table(name="corporativo.vw_tipo_unidade_org")
 * @ORM\Entity
 */
class CorporativoTipoUnidadeOrg
{
    /**
     * @var integer $sqTipoUnidadeOrg
     *
     * @ORM\Column(name="sq_tipo_unidade_org", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\OneToMany(targetEntity="\Core\Entity\Corporativo\CorporativoTipoUnidadeOrg", mappedBy="sqTipoUnidadePai")
     */
    private $sqTipoUnidadeOrg;

    /**
     * @var text $noTipoUnidadeOrg
     *
     * @ORM\Column(name="no_tipo_unidade_org", type="text", nullable=false)
     */
    private $noTipoUnidadeOrg;

    /**
     * @var string $sgTipoUnidade
     *
     * @ORM\Column(name="sg_tipo_unidade", type="string", length=80, nullable=false)
     */
    private $sgTipoUnidade;

    /**
     * @var boolean $inEstrutura
     *
     * @ORM\Column(name="in_estrutura", type="boolean", nullable=false)
     */
    private $inEstrutura;

    /**
     * @var boolean $stRegistroAtivo
     *
     * @ORM\Column(name="st_registro_ativo", type="boolean", nullable=true)
     */
    private $stRegistroAtivo;

    /**
     * @var CorporativoTipoUnidadeOrg
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoTipoUnidadeOrg", inversedBy="sqTipoUnidadeOrg")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_tipo_unidade_pai", referencedColumnName="sq_tipo_unidade_org")
     * })
     */
    private $sqTipoUnidadePai;

    public function __construct()
    {
    	$this->sqTipoUnidadeOrg    = new ArrayCollection();
    }
    
    
    /**
     * Get sqTipoUnidadeOrg
     * @return integer 
     */
    public function getSqTipoUnidadeOrg()
    {
        return $this->sqTipoUnidadeOrg;
    }

    /**
     * Set noTipoUnidadeOrg
     *
     * @param text $noTipoUnidadeOrg
     * @return CorporativoTipoUnidadeOrg
     */
    public function setNoTipoUnidadeOrg($noTipoUnidadeOrg)
    {
        $this->noTipoUnidadeOrg = $noTipoUnidadeOrg;
        return $this;
    }

    /**
     * Get noTipoUnidadeOrg
     *
     * @return text 
     */
    public function getNoTipoUnidadeOrg()
    {
        return $this->noTipoUnidadeOrg;
    }

    /**
     * Set sgTipoUnidade
     *
     * @param string $sgTipoUnidade
     * @return CorporativoTipoUnidadeOrg
     */
    public function setSgTipoUnidade($sgTipoUnidade)
    {
        $this->sgTipoUnidade = $sgTipoUnidade;
        return $this;
    }

    /**
     * Get sgTipoUnidade
     *
     * @return string 
     */
    public function getSgTipoUnidade()
    {
        return $this->sgTipoUnidade;
    }

    /**
     * Set inEstrutura
     *
     * @param boolean $inEstrutura
     * @return CorporativoTipoUnidadeOrg
     */
    public function setInEstrutura($inEstrutura)
    {
        $this->inEstrutura = $inEstrutura;
        return $this;
    }

    /**
     * Get inEstrutura
     *
     * @return boolean 
     */
    public function getInEstrutura()
    {
        return $this->inEstrutura;
    }

    /**
     * Set stRegistroAtivo
     *
     * @param boolean $stRegistroAtivo
     * @return CorporativoTipoUnidadeOrg
     */
    public function setStRegistroAtivo($stRegistroAtivo)
    {
        $this->stRegistroAtivo = $stRegistroAtivo;
        return $this;
    }

    /**
     * Get stRegistroAtivo
     *
     * @return boolean 
     */
    public function getStRegistroAtivo()
    {
        return $this->stRegistroAtivo;
    }

    /**
     * Set sqTipoUnidadePai
     *
     * @param CorporativoTipoUnidadeOrg $sqTipoUnidadePai
     * @return CorporativoTipoUnidadeOrg
     */
    public function setSqTipoUnidadePai(\Core\Entity\Corporativo\CorporativoTipoUnidadeOrg $sqTipoUnidadePai = null)
    {
        $this->sqTipoUnidadePai = $sqTipoUnidadePai;
        return $this;
    }

    /**
     * Get sqTipoUnidadePai
     *
     * @return CorporativoTipoUnidadeOrg 
     */
    public function getSqTipoUnidadePai()
    {
        return $this->sqTipoUnidadePai;
    }
}