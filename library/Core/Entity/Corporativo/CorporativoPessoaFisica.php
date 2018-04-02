<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * \Core\Entity\Corporativo\CorporativoPessoaFisica
 *
 * @ORM\Table(name="corporativo.vw_pessoa_fisica")
 * @ORM\Entity
 */
class CorporativoPessoaFisica
{
    /**
     * @var string $nuCpf
     *
     * @ORM\Column(name="nu_cpf", type="string", length=11, nullable=true)
     */
    private $nuCpf;

    /**
     * @var string $noMae
     *
     * @ORM\Column(name="no_mae", type="string", length=120, nullable=true)
     */
    private $noMae;

    /**
     * @var string $noPai
     *
     * @ORM\Column(name="no_pai", type="string", length=120, nullable=true)
     */
    private $noPai;

    /**
     * @var string $sgSexo
     *
     * @ORM\Column(name="sg_sexo", type="string", nullable=true)
     */
    private $sgSexo;

    /**
     * @var string $nuCurriculoLates
     *
     * @ORM\Column(name="nu_curriculo_lates", type="string", length=50, nullable=true)
     */
    private $nuCurriculoLates;

    /**
     * @var datetime $dtNascimento
     *
     * @ORM\Column(name="dt_nascimento", type="datetime", nullable=true)
     */
    private $dtNascimento;

    /**
     * @var string $noProfissao
     *
     * @ORM\Column(name="no_profissao", type="string", length=50, nullable=true)
     */
    private $noProfissao;

    /**
     * @var \Core\Entity\Corporativo\CorporativoMunicipio
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoMunicipio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_naturalidade", referencedColumnName="sq_municipio")
     * })
     */
    private $sqNaturalidade;

    /**
     * @var \Core\Entity\Corporativo\CorporativoEstadoCivil
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoEstadoCivil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_estado_civil", referencedColumnName="sq_estado_civil")
     * })
     */
    private $sqEstadoCivil;

    /**
     * @var \Core\Entity\Corporativo\CorporativoPessoa
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="\Core\Entity\Corporativo\CorporativoPessoa", inversedBy="sqPessoaFisica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_pessoa", referencedColumnName="sq_pessoa")
     * })
     */
    private $sqPessoa;


    /**
     * Set nuCpf
     *
     * @param string $nuCpf
     * @return CorporativoPessoaFisica
     */
    public function setNuCpf($nuCpf)
    {
        $this->nuCpf = $nuCpf;
        return $this;
    }

    /**
     * Get nuCpf
     *
     * @return string 
     */
    public function getNuCpf()
    {
        return $this->nuCpf;
    }

    /**
     * Set noMae
     *
     * @param string $noMae
     * @return \Core\Entity\Corporativo\CorporativoPessoaFisica
     */
    public function setNoMae($noMae)
    {
        $this->noMae = $noMae;
        return $this;
    }

    /**
     * Get noMae
     *
     * @return string 
     */
    public function getNoMae()
    {
        return $this->noMae;
    }

    /**
     * Set noPai
     *
     * @param string $noPai
     * @return \Core\Entity\Corporativo\CorporativoPessoaFisica
     */
    public function setNoPai($noPai)
    {
        $this->noPai = $noPai;
        return $this;
    }

    /**
     * Get noPai
     *
     * @return string 
     */
    public function getNoPai()
    {
        return $this->noPai;
    }

    /**
     * Set sgSexo
     *
     * @param string $sgSexo
     * @return \Core\Entity\Corporativo\CorporativoPessoaFisica
     */
    public function setSgSexo($sgSexo)
    {
        $this->sgSexo = $sgSexo;
        return $this;
    }

    /**
     * Get sgSexo
     *
     * @return string 
     */
    public function getSgSexo()
    {
        return $this->sgSexo;
    }

    /**
     * Set nuCurriculoLates
     *
     * @param string $nuCurriculoLates
     * @return \Core\Entity\Corporativo\CorporativoPessoaFisica
     */
    public function setNuCurriculoLates($nuCurriculoLates)
    {
        $this->nuCurriculoLates = $nuCurriculoLates;
        return $this;
    }

    /**
     * Get nuCurriculoLates
     *
     * @return string 
     */
    public function getNuCurriculoLates()
    {
        return $this->nuCurriculoLates;
    }

    /**
     * Set dtNascimento
     *
     * @param datetime $dtNascimento
     * @return \Core\Entity\Corporativo\CorporativoPessoaFisica
     */
    public function setDtNascimento($dtNascimento)
    {
        $this->dtNascimento = $dtNascimento;
        return $this;
    }

    /**
     * Get dtNascimento
     *
     * @return datetime 
     */
    public function getDtNascimento()
    {
        return $this->dtNascimento;
    }

    /**
     * Set noProfissao
     *
     * @param string $noProfissao
     * @return \Core\Entity\Corporativo\CorporativoPessoaFisica
     */
    public function setNoProfissao($noProfissao)
    {
        $this->noProfissao = $noProfissao;
        return $this;
    }

    /**
     * Get noProfissao
     *
     * @return string 
     */
    public function getNoProfissao()
    {
        return $this->noProfissao;
    }

    /**
     * Set sqNaturalidade
     *
     * @param \Core\Entity\Corporativo\CorporativoMunicipio $sqNaturalidade
     * @return \Core\Entity\Corporativo\CorporativoPessoaFisica
     */
    public function setSqNaturalidade(\Core\Entity\Corporativo\CorporativoMunicipio $sqNaturalidade = null)
    {
        $this->sqNaturalidade = $sqNaturalidade;
        return $this;
    }

    /**
     * Get sqNaturalidade
     *
     * @return \Core\Entity\Corporativo\CorporativoMunicipio 
     */
    public function getSqNaturalidade()
    {
        return $this->sqNaturalidade;
    }

    /**
     * Set sqEstadoCivil
     *
     * @param \Core\Entity\Corporativo\CorporativoEstadoCivil $sqEstadoCivil
     * @return \Core\Entity\Corporativo\CorporativoPessoaFisica
     */
    public function setSqEstadoCivil(\Core\Entity\Corporativo\CorporativoEstadoCivil $sqEstadoCivil = null)
    {
        $this->sqEstadoCivil = $sqEstadoCivil;
        return $this;
    }

    /**
     * Get sqEstadoCivil
     *
     * @return \Core\Entity\Corporativo\CorporativoEstadoCivil 
     */
    public function getSqEstadoCivil()
    {
        return $this->sqEstadoCivil;
    }

    /**
     * Set sqPessoa
     *
     * @param \Core\Entity\Corporativo\CorporativoPessoa $sqPessoa
     * @return \Core\Entity\Corporativo\CorporativoPessoaFisica
     */
    public function setSqPessoa(\Core\Entity\Corporativo\CorporativoPessoa $sqPessoa)
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
}