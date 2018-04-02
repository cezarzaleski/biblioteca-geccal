<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoEmail
 *
 * @ORM\Table(name="corporativo.vw_email")
 * @ORM\Entity
 */
class CorporativoEmail
{
    /**
     * @var integer $sqEmail
     *
     * @ORM\Column(name="sq_email", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqEmail;

    /**
     * @var string $txEmail
     *
     * @ORM\Column(name="tx_email", type="string", length=200, nullable=false)
     */
    private $txEmail;

    /**
     * @var \Core\Entity\Corporativo\CorporativoPessoa
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoPessoa", inversedBy="sqPessoaEmail")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_pessoa", referencedColumnName="sq_pessoa")
     * })
     */
    private $sqPessoa;

    /**
     * @var \Core\Entity\Corporativo\CorporativoTipoEmail
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoTipoEmail")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_tipo_email", referencedColumnName="sq_tipo_email")
     * })
     */
    private $sqTipoEmail;


    /**
     * Get sqEmail
     *
     * @return integer 
     */
    public function getSqEmail()
    {
        return $this->sqEmail;
    }

    /**
     * Set txEmail
     *
     * @param string $txEmail
     * @return CorporativoEmail
     */
    public function setTxEmail($txEmail)
    {
        $this->txEmail = $txEmail;
        return $this;
    }

    /**
     * Get txEmail
     *
     * @return string 
     */
    public function getTxEmail()
    {
        return $this->txEmail;
    }

    /**
     * Set sqPessoa
     *
     * @param \Core\Entity\Corporativo\CorporativoPessoa $sqPessoa
     * @return CorporativoEmail
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
     * Set sqTipoEmail
     *
     * @param \Core\Entity\Corporativo\CorporativoTipoEmail $sqTipoEmail
     * @return CorporativoEmail
     */
    public function setSqTipoEmail(\Core\Entity\Corporativo\CorporativoTipoEmail $sqTipoEmail = null)
    {
        $this->sqTipoEmail = $sqTipoEmail;
        return $this;
    }

    /**
     * Get sqTipoEmail
     *
     * @return \Core\Entity\Corporativo\CorporativoTipoEmail 
     */
    public function getSqTipoEmail()
    {
        return $this->sqTipoEmail;
    }
}