<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoPessoaJuridica
 *
 * @ORM\Table(name="corporativo.vw_pessoa_juridica")
 * @ORM\Entity
 */
class CorporativoPessoaJuridica
{
    /**
     * @var string $nuCnpj
     *
     * @ORM\Column(name="nu_cnpj", type="string", length=14, nullable=true)
     */
    private $nuCnpj;

    /**
     * @var text $noFantasia
     *
     * @ORM\Column(name="no_fantasia", type="text", nullable=true)
     */
    private $noFantasia;

    /**
     * @var string $sgEmpresa
     *
     * @ORM\Column(name="sg_empresa", type="string", length=10, nullable=true)
     */
    private $sgEmpresa;

    /**
     * @var datetime $dtAbertura
     *
     * @ORM\Column(name="dt_abertura", type="datetime", nullable=true)
     */
    private $dtAbertura;

    /**
     * @var \Core\Entity\Corporativo\CorporativoPessoa
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="\Core\Entity\Corporativo\CorporativoPessoa", inversedBy="sqPessoaJuridica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_pessoa", referencedColumnName="sq_pessoa")
     * })
     */
    private $sqPessoa;

    /**
     * @var \Core\Entity\Corporativo\CorporativoTipoSociedade
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoTipoSociedade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_tipo_sociedade", referencedColumnName="sq_tipo_sociedade")
     * })
     */
    private $sqTipoSociedade;

    /**
     * Set nuCnpj
     *
     * @param string $nuCnpj
     * @return CorporativoPessoaJuridica
     */
    public function setNuCnpj($nuCnpj)
    {
        $this->nuCnpj = $nuCnpj;
        return $this;
    }

    /**
     * Get nuCnpj
     *
     * @return string 
     */
    public function getNuCnpj()
    {
        return $this->nuCnpj;
    }

    /**
     * Set noFantasia
     *
     * @param text $noFantasia
     * @return CorporativoPessoaJuridica
     */
    public function setNoFantasia($noFantasia)
    {
        $this->noFantasia = $noFantasia;
        return $this;
    }

    /**
     * Get noFantasia
     *
     * @return text 
     */
    public function getNoFantasia()
    {
        return $this->noFantasia;
    }

    /**
     * Set sgEmpresa
     *
     * @param string $sgEmpresa
     * @return CorporativoPessoaJuridica
     */
    public function setSgEmpresa($sgEmpresa)
    {
        $this->sgEmpresa = $sgEmpresa;
        return $this;
    }

    /**
     * Get sgEmpresa
     *
     * @return string 
     */
    public function getSgEmpresa()
    {
        return $this->sgEmpresa;
    }

    /**
     * Set dtAbertura
     *
     * @param datetime $dtAbertura
     * @return CorporativoPessoaJuridica
     */
    public function setDtAbertura($dtAbertura)
    {
        $this->dtAbertura = $dtAbertura;
        return $this;
    }

    /**
     * Get dtAbertura
     *
     * @return datetime 
     */
    public function getDtAbertura()
    {
        return $this->dtAbertura;
    }

    /**
     * Set sqPessoa
     *
     * @param \Core\Entity\Corporativo\CorporativoPessoa $sqPessoa
     * @return CorporativoPessoaJuridica
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
     * Set sqTipoSociedade
     *
     * @param \Core\Entity\Corporativo\CorporativoTipoSociedade $sqTipoSociedade
     * @return CorporativoPessoaJuridica
     */
    public function setSqTipoSociedade(\Core\Entity\Corporativo\CorporativoTipoSociedade $sqTipoSociedade = null)
    {
        $this->sqTipoSociedade = $sqTipoSociedade;
        return $this;
    }

    /**
     * Get sqTipoSociedade
     *
     * @return \Core\Entity\Corporativo\CorporativoTipoSociedade 
     */
    public function getSqTipoSociedade()
    {
        return $this->sqTipoSociedade;
    }
}