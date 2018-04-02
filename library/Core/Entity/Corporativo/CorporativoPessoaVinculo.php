<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoPessoaVinculo
 *
 * @ORM\Table(name="corporativo.vw_pessoa_vinculo")
 * @ORM\Entity
 */
class CorporativoPessoaVinculo
{
    /**
     * @var integer $sqPessoaVinculo
     *
     * @ORM\Column(name="sq_pessoa_vinculo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqPessoaVinculo;

    /**
     * @var string $noCargo
     *
     * @ORM\Column(name="no_cargo", type="string", length=50, nullable=true)
     */
    private $noCargo;

    /**
     * @var datetime $dtInicioVinculo
     *
     * @ORM\Column(name="dt_inicio_vinculo", type="datetime", nullable=true)
     */
    private $dtInicioVinculo;

    /**
     * @var datetime $dtFimVinculo
     *
     * @ORM\Column(name="dt_fim_vinculo", type="datetime", nullable=true)
     */
    private $dtFimVinculo;

    /**
     * @var boolean $stRegistroAtivo
     *
     * @ORM\Column(name="st_registro_ativo", type="boolean", nullable=false)
     */
    private $stRegistroAtivo;

    /**
     * @var \Core\Entity\Corporativo\CorporativoPessoa
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoPessoa", inversedBy="sqPessoaVinculo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_pessoa", referencedColumnName="sq_pessoa")
     * })
     */
    private $sqPessoa;

    /**
     * @var \Core\Entity\Corporativo\CorporativoPessoa
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoPessoa", inversedBy="sqPessoaRelacionamento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_pessoa_relacionamento", referencedColumnName="sq_pessoa")
     * })
     */
    private $sqPessoaRelacionamento;

    /**
     * @var \Core\Entity\Corporativo\CorporativoTipoVinculo
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoTipoVinculo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_tipo_vinculo", referencedColumnName="sq_tipo_vinculo")
     * })
     */
    private $sqTipoVinculo;


    /**
     * Get sqPessoaVinculo
     *
     * @return integer 
     */
    public function getSqPessoaVinculo()
    {
        return $this->sqPessoaVinculo;
    }

    /**
     * Set noCargo
     *
     * @param string $noCargo
     * @return CorporativoPessoaVinculo
     */
    public function setNoCargo($noCargo)
    {
        $this->noCargo = $noCargo;
        return $this;
    }

    /**
     * Get noCargo
     *
     * @return string 
     */
    public function getNoCargo()
    {
        return $this->noCargo;
    }

    /**
     * Set dtInicioVinculo
     *
     * @param datetime $dtInicioVinculo
     * @return CorporativoPessoaVinculo
     */
    public function setDtInicioVinculo($dtInicioVinculo)
    {
        $this->dtInicioVinculo = $dtInicioVinculo;
        return $this;
    }

    /**
     * Get dtInicioVinculo
     *
     * @return datetime 
     */
    public function getDtInicioVinculo()
    {
        return $this->dtInicioVinculo;
    }

    /**
     * Set dtFimVinculo
     *
     * @param datetime $dtFimVinculo
     * @return CorporativoPessoaVinculo
     */
    public function setDtFimVinculo($dtFimVinculo)
    {
        $this->dtFimVinculo = $dtFimVinculo;
        return $this;
    }

    /**
     * Get dtFimVinculo
     *
     * @return datetime 
     */
    public function getDtFimVinculo()
    {
        return $this->dtFimVinculo;
    }

    /**
     * Set stRegistroAtivo
     *
     * @param boolean $stRegistroAtivo
     * @return CorporativoPessoaVinculo
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
     * Set sqPessoa
     *
     * @param \Core\Entity\Corporativo\CorporativoPessoa $sqPessoa
     * @return CorporativoPessoaVinculo
     */
    public function setSqPessoa(\Core\Entity\Corporativo\CorporativoPessoa $sqPessoa = null)
    {
        $this->sqPessoa = $sqPessoa;
        return $this;
    }

    /**
     * Get sqPessoa
     *
     * @return \Core\Entity\Corporativo\CorporativoPessoa 
     */
    public function getSqPessoa()
    {
        return $this->sqPessoa;
    }

    /**
     * Set sqPessoaRelacionamento
     *
     * @param \Core\Entity\Corporativo\CorporativoPessoa $sqPessoaRelacionamento
     * @return CorporativoPessoaVinculo
     */
    public function setSqPessoaRelacionamento(\Core\Entity\Corporativo\CorporativoPessoa $sqPessoaRelacionamento = null)
    {
        $this->sqPessoaRelacionamento = $sqPessoaRelacionamento;
        return $this;
    }

    /**
     * Get sqPessoaRelacionamento
     *
     * @return \Core\Entity\Corporativo\CorporativoPessoa 
     */
    public function getSqPessoaRelacionamento()
    {
        return $this->sqPessoaRelacionamento;
    }

    /**
     * Set sqTipoVinculo
     *
     * @param \Core\Entity\Corporativo\CorporativoTipoVinculo $sqTipoVinculo
     * @return CorporativoPessoaVinculo
     */
    public function setSqTipoVinculo(\Core\Entity\Corporativo\CorporativoTipoVinculo $sqTipoVinculo = null)
    {
        $this->sqTipoVinculo = $sqTipoVinculo;
        return $this;
    }

    /**
     * Get sqTipoVinculo
     *
     * @return \Core\Entity\Corporativo\CorporativoTipoVinculo 
     */
    public function getSqTipoVinculo()
    {
        return $this->sqTipoVinculo;
    }
}