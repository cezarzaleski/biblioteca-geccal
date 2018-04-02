<?php

namespace  Core\Entity\Corporativo;
use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoVinculoFuncional
 *
 * @ORM\Table(name="corporativo.vw_vinculo_funcional")
 * @ORM\Entity
 */
class CorporativoVinculoFuncional
{
    /**
     * @var integer $sqVinculoFuncional
     *
     * @ORM\Column(name="sq_vinculo_funcional", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqVinculoFuncional;

    /**
     * @var datetime $dtInicioVinculo
     *
     * @ORM\Column(name="dt_inicio_vinculo", type="datetime", nullable=false)
     */
    private $dtInicioVinculo;

    /**
     * @var string $nuMatricula
     *
     * @ORM\Column(name="nu_matricula", type="string", length=10, nullable=true)
     */
    private $nuMatricula;

    /**
     * @var CorporativoAtribuicao
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoAtribuicao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_atribuicao", referencedColumnName="sq_atribuicao")
     * })
     */
    private $sqAtribuicao;

    /**
     * @var CorporativoCargo
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoCargo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_cargo", referencedColumnName="sq_cargo")
     * })
     */
    private $sqCargo;

    /**
     * @var CorporativoFuncao
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoFuncao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_funcao", referencedColumnName="sq_funcao")
     * })
     */
    private $sqFuncao;

    /**
     * @var CorporativoIndicativoFimVinculo
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoIndicativoFimVinculo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_ind_fim_vinculo", referencedColumnName="sq_indicativo_fim_vinculo")
     * })
     */
    private $sqIndFimVinculo;

    /**
     * @var CorporativoPessoa
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoPessoa", inversedBy="sqPessoa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_pessoa", referencedColumnName="sq_pessoa")
     * })
     */
    private $sqPessoa;

    /**
     * @var CorporativoSituacaoFuncional
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoSituacaoFuncional")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_situacao_funcional", referencedColumnName="sq_situacao_funcional")
     * })
     */
    private $sqSituacaoFuncional;

    /**
     * @var CorporativoPessoa
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoPessoa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_unidade_exercicio", referencedColumnName="sq_pessoa")
     * })
     */
    private $sqUnidadeExercicio;

    /**
     * @var CorporativoPessoa
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoPessoa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_unidade_lotacao", referencedColumnName="sq_pessoa")
     * })
     */
    private $sqUnidadeLotacao;


    /**
     * Get sqVinculoFuncional
     *
     * @return integer 
     */
    public function getSqVinculoFuncional()
    {
        return $this->sqVinculoFuncional;
    }

    /**
     * Set dtInicioVinculo
     *
     * @param datetime $dtInicioVinculo
     * @return CorporativoVinculoFuncional
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
     * Set nuMatricula
     *
     * @param string $nuMatricula
     * @return CorporativoVinculoFuncional
     */
    public function setNuMatricula($nuMatricula)
    {
        $this->nuMatricula = $nuMatricula;
        return $this;
    }

    /**
     * Get nuMatricula
     *
     * @return string 
     */
    public function getNuMatricula()
    {
        return $this->nuMatricula;
    }

    /**
     * Set sqAtribuicao
     *
     * @param CorporativoAtribuicao $sqAtribuicao
     * @return CorporativoVinculoFuncional
     */
    public function setSqAtribuicao(\Core\Entity\Corporativo\Corporativo\CorporativoAtribuicao $sqAtribuicao = null)
    {
        $this->sqAtribuicao = $sqAtribuicao;
        return $this;
    }

    /**
     * Get sqAtribuicao
     *
     * @return CorporativoAtribuicao 
     */
    public function getSqAtribuicao()
    {
        return $this->sqAtribuicao;
    }

    /**
     * Set sqCargo
     *
     * @param CorporativoCargo $sqCargo
     * @return CorporativoVinculoFuncional
     */
    public function setSqCargo(\Core\Entity\Corporativo\Corporativo\CorporativoCargo $sqCargo = null)
    {
        $this->sqCargo = $sqCargo;
        return $this;
    }

    /**
     * Get sqCargo
     *
     * @return CorporativoCargo 
     */
    public function getSqCargo()
    {
        return $this->sqCargo;
    }

    /**
     * Set sqFuncao
     *
     * @param CorporativoFuncao $sqFuncao
     * @return CorporativoVinculoFuncional
     */
    public function setSqFuncao(\Core\Entity\Corporativo\Corporativo\CorporativoFuncao $sqFuncao = null)
    {
        $this->sqFuncao = $sqFuncao;
        return $this;
    }

    /**
     * Get sqFuncao
     *
     * @return CorporativoFuncao 
     */
    public function getSqFuncao()
    {
        return $this->sqFuncao;
    }

    /**
     * Set sqIndFimVinculo
     *
     * @param CorporativoIndicativoFimVinculo $sqIndFimVinculo
     * @return CorporativoVinculoFuncional
     */
    public function setSqIndFimVinculo(\Core\Entity\Corporativo\Corporativo\CorporativoIndicativoFimVinculo $sqIndFimVinculo = null)
    {
        $this->sqIndFimVinculo = $sqIndFimVinculo;
        return $this;
    }

    /**
     * Get sqIndFimVinculo
     *
     * @return CorporativoIndicativoFimVinculo 
     */
    public function getSqIndFimVinculo()
    {
        return $this->sqIndFimVinculo;
    }

    /**
     * Set sqPessoa
     *
     * @param CorporativoPessoa $sqPessoa
     * @return CorporativoVinculoFuncional
     */
    public function setSqPessoa(\Core\Entity\Corporativo\Corporativo\CorporativoPessoa $sqPessoa = null)
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
     * Set sqSituacaoFuncional
     *
     * @param CorporativoSituacaoFuncional $sqSituacaoFuncional
     * @return CorporativoVinculoFuncional
     */
    public function setSqSituacaoFuncional(\Core\Entity\Corporativo\Corporativo\CorporativoSituacaoFuncional $sqSituacaoFuncional = null)
    {
        $this->sqSituacaoFuncional = $sqSituacaoFuncional;
        return $this;
    }

    /**
     * Get sqSituacaoFuncional
     *
     * @return CorporativoSituacaoFuncional 
     */
    public function getSqSituacaoFuncional()
    {
        return $this->sqSituacaoFuncional;
    }

    /**
     * Set sqUnidadeExercicio
     *
     * @param CorporativoPessoa $sqUnidadeExercicio
     * @return CorporativoVinculoFuncional
     */
    public function setSqUnidadeExercicio(\Core\Entity\Corporativo\CorporativoPessoa $sqUnidadeExercicio = null)
    {
        $this->sqUnidadeExercicio = $sqUnidadeExercicio;
        return $this;
    }

    /**
     * Get sqUnidadeExercicio
     *
     * @return CorporativoPessoa 
     */
    public function getSqUnidadeExercicio()
    {
        return $this->sqUnidadeExercicio;
    }

    /**
     * Set sqUnidadeLotacao
     *
     * @param CorporativoPessoa $sqUnidadeLotacao
     * @return CorporativoVinculoFuncional
     */
    public function setSqUnidadeLotacao(\Core\Entity\Corporativo\CorporativoPessoa $sqUnidadeLotacao = null)
    {
        $this->sqUnidadeLotacao = $sqUnidadeLotacao;
        return $this;
    }

    /**
     * Get sqUnidadeLotacao
     *
     * @return CorporativoPessoa 
     */
    public function getSqUnidadeLotacao()
    {
        return $this->sqUnidadeLotacao;
    }
}