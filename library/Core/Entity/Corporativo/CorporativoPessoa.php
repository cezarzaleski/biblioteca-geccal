<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection;
/**
 * CorporativoPessoa
 *
 * @ORM\Table(name="corporativo.vw_pessoa")
 * @ORM\Entity
 */
class CorporativoPessoa
{
    /**
     * @var integer $sqPessoa
     *
     * @ORM\Column(name="sq_pessoa", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqPessoa;

    /**
     * @var text $noPessoa
     *
     * @ORM\Column(name="no_pessoa", type="text", nullable=false)
     */
    private $noPessoa;

    /**
     * @var integer $sqTipoPessoa
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoTipoPessoa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_tipo_pessoa", referencedColumnName="sq_tipo_pessoa")
     * })
     */
    private $sqTipoPessoa;

    /**
     * @var integer $sqPessoaTelefone
     *
     * @ORM\OneToMany(targetEntity="\Core\Entity\Corporativo\CorporativoTelefone", mappedBy="sqPessoa")
     */
    private $sqPessoaTelefone;
    
    /**
     * @var integer $sqPessoaEmail
     *
     * @ORM\OneToMany(targetEntity="\Core\Entity\Corporativo\CorporativoEmail", mappedBy="sqPessoa")
     */
    private $sqPessoaEmail;
    
    /**
     * @var integer $sqPessoaFisica
     *
     * @ORM\OneToOne(targetEntity="\Core\Entity\Corporativo\CorporativoPessoaFisica", mappedBy="sqPessoa")
     */
    private $sqPessoaFisica;
    
    /**
     * @var integer $sqPessoaJuridica
     *
     * @ORM\OneToOne(targetEntity="\Core\Entity\Corporativo\CorporativoPessoaJuridica", mappedBy="sqPessoa")
     */
    private $sqPessoaJuridica;
    
    /**
     * @var integer $sqPessoaVinculo
     *
     * @ORM\OneToMany(targetEntity="\Core\Entity\Corporativo\CorporativoPessoaVinculo", mappedBy="sqPessoa")
     */
    private $sqPessoaVinculo;
    
    /**
     * @var integer $sqPessoaRelacionamento
     *
     * @ORM\OneToMany(targetEntity="\Core\Entity\Corporativo\CorporativoPessoaVinculo", mappedBy="sqPessoaRelacionamento")
     */
    private $sqPessoaRelacionamento;
    
    /**
     * @var integer $sqPessoaVinculoFuncional
     *
     * @ORM\OneToMany(targetEntity="\Core\Entity\Corporativo\CorporativoVinculoFuncional", mappedBy="sqPessoa")
     */
    private $sqPessoaVinculoFuncional;
    
    /**
     * @var integer $sqPessoaEndereco
     *
     * @ORM\OneToMany(targetEntity="\Core\Entity\Corporativo\CorporativoEndereco", mappedBy="sqPessoa")
     */
    private $sqPessoaEndereco;
    
    
    public function __construct()
    {
    	$this->sqPessoaTelefone          = new ArrayCollection();
    	$this->sqPessoaEmail             = new ArrayCollection();
    	$this->sqPessoaFisica            = new ArrayCollection();
    	$this->sqPessoaJuridica          = new ArrayCollection();
    	$this->sqPessoaVinculo           = new ArrayCollection();
    	$this->sqPessoaRelacionamento    = new ArrayCollection();
    	$this->sqPessoaVinculoFuncional  = new ArrayCollection();
    	$this->sqPessoaEndereco          = new ArrayCollection();
    }
    
    /**
     * Get sqPessoa
     *
     * @return integer 
     */
    public function getSqPessoa()
    {
        return $this->sqPessoa;
    }

    /**
     * Set noPessoa
     *
     * @param text $noPessoa
     * @return \Core\Entity\Corporativo\CorporativoPessoa
     */
    public function setNoPessoa($noPessoa)
    {
        $this->noPessoa = $noPessoa;
        return $this;
    }

    /**
     * Get noPessoa
     *
     * @return text 
     */
    public function getNoPessoa()
    {
        return $this->noPessoa;
    }

    /**
     * Set sqTipoPessoa
     *
     * @param \Core\Entity\Corporativo\CorporativoTipoPessoa $sqTipoPessoa
     * @return \Core\Entity\Corporativo\CorporativoPessoa
     */
    public function setSqTipoPessoa(\Core\Entity\Corporativo\CorporativoTipoPessoa $sqTipoPessoa = null)
    {
        $this->sqTipoPessoa = $sqTipoPessoa;
        return $this;
    }

    /**
     * Get sqTipoPessoa
     *
     * @return \Core\Entity\Corporativo\CorporativoTipoPessoa 
     */
    public function getSqTipoPessoa()
    {
        return $this->sqTipoPessoa;
    }
}