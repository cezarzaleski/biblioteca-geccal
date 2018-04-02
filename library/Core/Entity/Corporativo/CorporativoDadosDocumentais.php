<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoDadosDocumentais
 *
 * @ORM\Table(name="corporativo.vw_dados_documentais")
 * @ORM\Entity
 */
class CorporativoDadosDocumentais
{
    /**
     * @var integer $sqDadosDocumentais
     *
     * @ORM\Column(name="sq_dados_documentais", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqDadosDocumentais;

    /**
     * @var string $nuDocumento
     *
     * @ORM\Column(name="nu_documento", type="string", length=30, nullable=false)
     */
    private $nuDocumento;

    /**
     * @var datetime $dtEmissao
     *
     * @ORM\Column(name="dt_emissao", type="datetime", nullable=true)
     */
    private $dtEmissao;

    /**
     * @var string $noOrgaoEmissor
     *
     * @ORM\Column(name="no_orgao_emissor", type="string", length=50, nullable=true)
     */
    private $noOrgaoEmissor;

    /**
     * @var datetime $dtValidade
     *
     * @ORM\Column(name="dt_validade", type="datetime", nullable=true)
     */
    private $dtValidade;

    /**
     * @var \Core\Entity\Corporativo\CorporativoEstado
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoEstado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_estado", referencedColumnName="sq_estado")
     * })
     */
    private $sqEstado;

    /**
     * @var \Core\Entity\Corporativo\CorporativoPessoa
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoPessoa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_pessoa", referencedColumnName="sq_pessoa")
     * })
     */
    private $sqPessoa;

    /**
     * @var \Core\Entity\Corporativo\CorporativoTipoDocumento
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoTipoDocumento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_tipo_documento", referencedColumnName="sq_tipo_documento")
     * })
     */
    private $sqTipoDocumento;


    /**
     * Get sqDadosDocumentais
     *
     * @return integer 
     */
    public function getSqDadosDocumentais()
    {
        return $this->sqDadosDocumentais;
    }

    /**
     * Set nuDocumento
     *
     * @param string $nuDocumento
     * @return CorporativoDadosDocumentais
     */
    public function setNuDocumento($nuDocumento)
    {
        $this->nuDocumento = $nuDocumento;
        return $this;
    }

    /**
     * Get nuDocumento
     *
     * @return string 
     */
    public function getNuDocumento()
    {
        return $this->nuDocumento;
    }

    /**
     * Set dtEmissao
     *
     * @param datetime $dtEmissao
     * @return CorporativoDadosDocumentais
     */
    public function setDtEmissao($dtEmissao)
    {
        $this->dtEmissao = $dtEmissao;
        return $this;
    }

    /**
     * Get dtEmissao
     *
     * @return datetime 
     */
    public function getDtEmissao()
    {
        return $this->dtEmissao;
    }

    /**
     * Set noOrgaoEmissor
     *
     * @param string $noOrgaoEmissor
     * @return CorporativoDadosDocumentais
     */
    public function setNoOrgaoEmissor($noOrgaoEmissor)
    {
        $this->noOrgaoEmissor = $noOrgaoEmissor;
        return $this;
    }

    /**
     * Get noOrgaoEmissor
     *
     * @return string 
     */
    public function getNoOrgaoEmissor()
    {
        return $this->noOrgaoEmissor;
    }

    /**
     * Set dtValidade
     *
     * @param datetime $dtValidade
     * @return CorporativoDadosDocumentais
     */
    public function setDtValidade($dtValidade)
    {
        $this->dtValidade = $dtValidade;
        return $this;
    }

    /**
     * Get dtValidade
     *
     * @return datetime 
     */
    public function getDtValidade()
    {
        return $this->dtValidade;
    }

    /**
     * Set sqEstado
     *
     * @param \Core\Entity\Corporativo\CorporativoEstado $sqEstado
     * @return CorporativoDadosDocumentais
     */
    public function setSqEstado(\Core\Entity\Corporativo\CorporativoEstado $sqEstado = null)
    {
        $this->sqEstado = $sqEstado;
        return $this;
    }

    /**
     * Get sqEstado
     *
     * @return \Core\Entity\CorporativoEstado 
     */
    public function getSqEstado()
    {
        return $this->sqEstado;
    }

    /**
     * Set sqPessoa
     *
     * @param \Core\Entity\Corporativo\CorporativoPessoa $sqPessoa
     * @return CorporativoDadosDocumentais
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
     * Set sqTipoDocumento
     *
     * @param \Core\Entity\Corporativo\CorporativoTipoDocumento $sqTipoDocumento
     * @return CorporativoDadosDocumentais
     */
    public function setSqTipoDocumento(\Core\Entity\Corporativo\CorporativoTipoDocumento $sqTipoDocumento = null)
    {
        $this->sqTipoDocumento = $sqTipoDocumento;
        return $this;
    }

    /**
     * Get sqTipoDocumento
     *
     * @return \Core\Entity\Corporativo\CorporativoTipoDocumento 
     */
    public function getSqTipoDocumento()
    {
        return $this->sqTipoDocumento;
    }
}