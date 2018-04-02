<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoDadoBancario
 *
 * @ORM\Table(name="corporativo.vw_dado_bancario")
 * @ORM\Entity
 */
class CorporativoDadoBancario
{
    /**
     * @var integer $sqDadoBancario
     *
     * @ORM\Column(name="sq_dado_bancario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqDadoBancario;

    /**
     * @var string $nuConta
     *
     * @ORM\Column(name="nu_conta", type="string", length=10, nullable=false)
     */
    private $nuConta;

    /**
     * @var string $nuContaDv
     *
     * @ORM\Column(name="nu_conta_dv", type="string", length=3, nullable=true)
     */
    private $nuContaDv;

    /**
     * @var string $coOperacao
     *
     * @ORM\Column(name="co_operacao", type="string", length=3, nullable=true)
     */
    private $coOperacao;

    /**
     * @var \Core\Entity\Corporativo\CorporativoAgencia
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoAgencia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_agencia", referencedColumnName="sq_agencia")
     * })
     */
    private $sqAgencia;

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
     * @var \Core\Entity\Corporativo\CorporativoTipoDadoBancario
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoTipoDadoBancario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_tipo_dado_bancario", referencedColumnName="sq_tipo_dado_bancario")
     * })
     */
    private $sqTipoDadoBancario;


    /**
     * Get sqDadoBancario
     *
     * @return integer 
     */
    public function getSqDadoBancario()
    {
        return $this->sqDadoBancario;
    }

    /**
     * Set nuConta
     *
     * @param string $nuConta
     * @return CorporativoDadoBancario
     */
    public function setNuConta($nuConta)
    {
        $this->nuConta = $nuConta;
        return $this;
    }

    /**
     * Get nuConta
     *
     * @return string 
     */
    public function getNuConta()
    {
        return $this->nuConta;
    }

    /**
     * Set nuContaDv
     *
     * @param string $nuContaDv
     * @return CorporativoDadoBancario
     */
    public function setNuContaDv($nuContaDv)
    {
        $this->nuContaDv = $nuContaDv;
        return $this;
    }

    /**
     * Get nuContaDv
     *
     * @return string 
     */
    public function getNuContaDv()
    {
        return $this->nuContaDv;
    }

    /**
     * Set coOperacao
     *
     * @param string $coOperacao
     * @return Corporativo.dadoBancario
     */
    public function setCoOperacao($coOperacao)
    {
        $this->coOperacao = $coOperacao;
        return $this;
    }

    /**
     * Get coOperacao
     *
     * @return string 
     */
    public function getCoOperacao()
    {
        return $this->coOperacao;
    }

    /**
     * Set sqAgencia
     *
     * @param \Core\Entity\Corporativo\CorporativoAgencia $sqAgencia
     * @return CorporativoDadoBancario
     */
    public function setSqAgencia(\Core\Entity\Corporativo\CorporativoAgencia $sqAgencia = null)
    {
        $this->sqAgencia = $sqAgencia;
        return $this;
    }

    /**
     * Get sqAgencia
     *
     * @return CorporativoAgencia 
     */
    public function getSqAgencia()
    {
        return $this->sqAgencia;
    }

    /**
     * Set sqPessoa
     *
     * @param \Core\Entity\Corporativo\CorporativoPessoa $sqPessoa
     * @return CorporativoDadoBancario
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
     * Set sqTipoDadoBancario
     *
     * @param \Core\Entity\Corporativo\CorporativoTipoDadoBancario $sqTipoDadoBancario
     * @return CorporativoDadoBancario
     */
    public function setSqTipoDadoBancario(\Core\Entity\Corporativo\CorporativoTipoDadoBancario $sqTipoDadoBancario = null)
    {
        $this->sqTipoDadoBancario = $sqTipoDadoBancario;
        return $this;
    }

    /**
     * Get sqTipoDadoBancario
     *
     * @return \Core\Entity\Corporativo\CorporativoTipoDadoBancario 
     */
    public function getSqTipoDadoBancario()
    {
        return $this->sqTipoDadoBancario;
    }
}