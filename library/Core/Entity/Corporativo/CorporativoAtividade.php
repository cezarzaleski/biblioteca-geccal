<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoAtividade
 *
 * @ORM\Table(name="corporativo.vw_atividade")
 * @ORM\Entity
 */
class CorporativoAtividade
{
    /**
     * @var integer $sqAtividade
     *
     * @ORM\Column(name="sq_atividade", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqAtividade;

    /**
     * @var string $noAtividade
     *
     * @ORM\Column(name="no_atividade", type="string", length=25, nullable=false)
     */
    private $noAtividade;

    /**
     * @var string $txGrau
     *
     * @ORM\Column(name="tx_grau", type="string", length=25, nullable=true)
     */
    private $txGrau;

    /**
     * @var boolean $inPessoaFisica
     *
     * @ORM\Column(name="in_pessoa_fisica", type="boolean", nullable=true)
     */
    private $inPessoaFisica;

    /**
     * @var \Core\Entity\Corporativo\CorporativoCategoriaAtividade
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoCategoriaAtividade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_categoria_atividade", referencedColumnName="sq_categoria_atividade")
     * })
     */
    private $sqCategoriaAtividade;


    /**
     * Get sqAtividade
     *
     * @return integer 
     */
    public function getSqAtividade()
    {
        return $this->sqAtividade;
    }

    /**
     * Set noAtividade
     *
     * @param string $noAtividade
     * @return CorporativoAtividade
     */
    public function setNoAtividade($noAtividade)
    {
        $this->noAtividade = $noAtividade;
        return $this;
    }

    /**
     * Get noAtividade
     *
     * @return string 
     */
    public function getNoAtividade()
    {
        return $this->noAtividade;
    }

    /**
     * Set txGrau
     *
     * @param string $txGrau
     * @return CorporativoAtividade
     */
    public function setTxGrau($txGrau)
    {
        $this->txGrau = $txGrau;
        return $this;
    }

    /**
     * Get txGrau
     *
     * @return string 
     */
    public function getTxGrau()
    {
        return $this->txGrau;
    }

    /**
     * Set inPessoaFisica
     *
     * @param boolean $inPessoaFisica
     * @return CorporativoAtividade
     */
    public function setInPessoaFisica($inPessoaFisica)
    {
        $this->inPessoaFisica = $inPessoaFisica;
        return $this;
    }

    /**
     * Get inPessoaFisica
     *
     * @return boolean 
     */
    public function getInPessoaFisica()
    {
        return $this->inPessoaFisica;
    }

    /**
     * Set sqCategoriaAtividade
     *
     * @param \Core\Entity\Corporativo\CorporativoCategoriaAtividade $sqCategoriaAtividade
     * @return CorporativoAtividade
     */
    public function setSqCategoriaAtividade(\Core\Entity\Corporativo\CorporativoCategoriaAtividade $sqCategoriaAtividade = null)
    {
        $this->sqCategoriaAtividade = $sqCategoriaAtividade;
        return $this;
    }

    /**
     * Get sqCategoriaAtividade
     *
     * @return CorporativoCategoriaAtividade 
     */
    public function getSqCategoriaAtividade()
    {
        return $this->sqCategoriaAtividade;
    }
}