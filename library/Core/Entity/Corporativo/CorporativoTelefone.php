<?php

namespace Core\Entity\Corporativo;
use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoTelefone
 *
 * @ORM\Table(name="corporativo.vw_telefone")
 * @ORM\Entity
 */
class CorporativoTelefone
{
    /**
     * @var integer $sqTelefone
     *
     * @ORM\Column(name="sq_telefone", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqTelefone;

    /**
     * @var string $nuDdd
     *
     * @ORM\Column(name="nu_ddd", type="string", length=3, nullable=false)
     */
    private $nuDdd;

    /**
     * @var string $nuTelefone
     *
     * @ORM\Column(name="nu_telefone", type="string", length=8, nullable=false)
     */
    private $nuTelefone;

    /**
     * @var \Core\Entity\Corporativo\CorporativoPessoa
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoPessoa", inversedBy="sqPessoaTelefone")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_pessoa", referencedColumnName="sq_pessoa")
     * })
     */
    private $sqPessoa;

    /**
     * @var \Core\Entity\Corporativo\CorporativoTipoTelefone
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoTipoTelefone")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_tipo_telefone", referencedColumnName="sq_tipo_telefone")
     * })
     */
    private $sqTipoTelefone;


    /**
     * Get sqTelefone
     *
     * @return integer 
     */
    public function getSqTelefone()
    {
        return $this->sqTelefone;
    }

    /**
     * Set nuDdd
     *
     * @param string $nuDdd
     * @return CorporativoTelefone
     */
    public function setNuDdd($nuDdd)
    {
        $this->nuDdd = $nuDdd;
        return $this;
    }

    /**
     * Get nuDdd
     *
     * @return string 
     */
    public function getNuDdd()
    {
        return $this->nuDdd;
    }

    /**
     * Set nuTelefone
     *
     * @param string $nuTelefone
     * @return CorporativoTelefone
     */
    public function setNuTelefone($nuTelefone)
    {
        $this->nuTelefone = $nuTelefone;
        return $this;
    }

    /**
     * Get nuTelefone
     *
     * @return string 
     */
    public function getNuTelefone()
    {
        return $this->nuTelefone;
    }

    /**
     * Set sqPessoa
     *
     * @param \Core\Entity\Corporativo\CorporativoPessoa $sqPessoa
     * @return CorporativoTelefone
     */
    public function setSqPessoa(\Core\Entity\CorporativoPessoa $sqPessoa = null)
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
     * Set sqTipoTelefone
     *
     * @param \Core\Entity\Corporativo\CorporativoTipoTelefone $sqTipoTelefone
     * @return CorporativoTelefone
     */
    public function setSqTipoTelefone(\Core\Entity\Corporativo\CorporativoTipoTelefone $sqTipoTelefone = null)
    {
        $this->sqTipoTelefone = $sqTipoTelefone;
        return $this;
    }

    /**
     * Get sqTipoTelefone
     *
     * @return \Core\Entity\Corporativo\CorporativoTipoTelefone 
     */
    public function getSqTipoTelefone()
    {
        return $this->sqTipoTelefone;
    }
}