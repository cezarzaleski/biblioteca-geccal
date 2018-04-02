<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoAtividadePessoa
 *
 * @ORM\Table(name="corporativo.vw_atividade_pessoa")
 * @ORM\Entity
 */
class CorporativoAtividadePessoa
{
    /**
     * @var integer $sqAtividadePessoa
     *
     * @ORM\Column(name="sq_atividade_pessoa", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqAtividadePessoa;

    /**
     * @var datetime $dtInicioAtividade
     *
     * @ORM\Column(name="dt_inicio_atividade", type="datetime", nullable=true)
     */
    private $dtInicioAtividade;

    /**
     * @var datetime $dtFimAtividade
     *
     * @ORM\Column(name="dt_fim_atividade", type="datetime", nullable=true)
     */
    private $dtFimAtividade;

    /**
     * @var \Core\Entity\Corporativo\CorporativoAtividade
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoAtividade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_atividade", referencedColumnName="sq_atividade")
     * })
     */
    private $sqAtividade;

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
     * Get sqAtividadePessoa
     *
     * @return integer 
     */
    public function getSqAtividadePessoa()
    {
        return $this->sqAtividadePessoa;
    }

    /**
     * Set dtInicioAtividade
     *
     * @param datetime $dtInicioAtividade
     * @return CorporativoAtividadePessoa
     */
    public function setDtInicioAtividade($dtInicioAtividade)
    {
        $this->dtInicioAtividade = $dtInicioAtividade;
        return $this;
    }

    /**
     * Get dtInicioAtividade
     *
     * @return datetime 
     */
    public function getDtInicioAtividade()
    {
        return $this->dtInicioAtividade;
    }

    /**
     * Set dtFimAtividade
     *
     * @param datetime $dtFimAtividade
     * @return CorporativoAtividadePessoa
     */
    public function setDtFimAtividade($dtFimAtividade)
    {
        $this->dtFimAtividade = $dtFimAtividade;
        return $this;
    }

    /**
     * Get dtFimAtividade
     *
     * @return datetime 
     */
    public function getDtFimAtividade()
    {
        return $this->dtFimAtividade;
    }

    /**
     * Set sqAtividade
     *
     * @param \Core\Entity\Corporativo\CorporativoAtividade $sqAtividade
     * @return CorporativoAtividadePessoa
     */
    public function setSqAtividade(\Core\Entity\Corporativo\CorporativoAtividade $sqAtividade = null)
    {
        $this->sqAtividade = $sqAtividade;
        return $this;
    }

    /**
     * Get sqAtividade
     *
     * @return \Core\Entity\Corporativo\CorporativoAtividade 
     */
    public function getSqAtividade()
    {
        return $this->sqAtividade;
    }

    /**
     * Set sqPessoa
     *
     * @param \Core\Entity\Corporativo\CorporativoPessoa $sqPessoa
     * @return CorporativoAtividadePessoa
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
}