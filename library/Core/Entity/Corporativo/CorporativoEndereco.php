<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;
//Atenção deverá ser corrigida a view vw_endereco, já que a mesma não tem a coluna sq_pessoa
//Atenção deverá ser corrigida a view vw_endereco, já que a mesma não tem a coluna sq_pessoa
//Atenção deverá ser corrigida a view vw_endereco, já que a mesma não tem a coluna sq_pessoa
//Atenção deverá ser corrigida a view vw_endereco, já que a mesma não tem a coluna sq_pessoa
//Atenção deverá ser corrigida a view vw_endereco, já que a mesma não tem a coluna sq_pessoa
//Atenção deverá ser corrigida a view vw_endereco, já que a mesma não tem a coluna sq_pessoa
//Atenção deverá ser corrigida a view vw_endereco, já que a mesma não tem a coluna sq_pessoa
/**
 * CorporativoEndereco
 *
 * @ORM\Table(name="corporativo.endereco")
 * @ORM\Entity
 */
class CorporativoEndereco
{
    /**
     * @var integer $sqEndereco
     *
     * @ORM\Column(name="sq_endereco", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqEndereco;

    /**
     * @var integer $sqCep
     *
     * @ORM\Column(name="sq_cep", type="integer", nullable=false)
     */
    private $sqCep;

    /**
     * @var string $noBairro
     *
     * @ORM\Column(name="no_bairro", type="string", length=100, nullable=true)
     */
    private $noBairro;

    /**
     * @var string $txEndereco
     *
     * @ORM\Column(name="tx_endereco", type="string", length=200, nullable=false)
     */
    private $txEndereco;

    /**
     * @var string $nuEndereco
     *
     * @ORM\Column(name="nu_endereco", type="string", length=6, nullable=false)
     */
    private $nuEndereco;

    /**
     * @var string $txComplemento
     *
     * @ORM\Column(name="tx_complemento", type="string", length=100, nullable=true)
     */
    private $txComplemento;

    /**
     * @var boolean $inCorrespondencia
     *
     * @ORM\Column(name="in_correspondencia", type="boolean", nullable=true)
     */
    private $inCorrespondencia;

    /**
     * @var \Core\Entity\Corporativo\CorporativoMunicipio
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoMunicipio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_municipio", referencedColumnName="sq_municipio")
     * })
     */
    private $sqMunicipio;

    /**
     * @var \Core\Entity\Corporativo\CorporativoPessoa
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoPessoa", inversedBy="sqPessoaEndereco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_pessoa", referencedColumnName="sq_pessoa")
     * })
     */
    private $sqPessoa;

    /**
     * @var \Core\Entity\Corporativo\CorporativoTipoEndereco
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoTipoEndereco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_tipo_endereco", referencedColumnName="sq_tipo_endereco")
     * })
     */
    private $sqTipoEndereco;


    /**
     * Get sqEndereco
     *
     * @return integer 
     */
    public function getSqEndereco()
    {
        return $this->sqEndereco;
    }

    /**
     * Set sqCep
     *
     * @param integer $sqCep
     * @return CorporativoEndereco
     */
    public function setSqCep($sqCep)
    {
        $this->sqCep = $sqCep;
        return $this;
    }

    /**
     * Get sqCep
     *
     * @return integer 
     */
    public function getSqCep()
    {
        return $this->sqCep;
    }

    /**
     * Set noBairro
     *
     * @param string $noBairro
     * @return CorporativoEndereco
     */
    public function setNoBairro($noBairro)
    {
        $this->noBairro = $noBairro;
        return $this;
    }

    /**
     * Get noBairro
     *
     * @return string 
     */
    public function getNoBairro()
    {
        return $this->noBairro;
    }

    /**
     * Set txEndereco
     *
     * @param string $txEndereco
     * @return CorporativoEndereco
     */
    public function setTxEndereco($txEndereco)
    {
        $this->txEndereco = $txEndereco;
        return $this;
    }

    /**
     * Get txEndereco
     *
     * @return string 
     */
    public function getTxEndereco()
    {
        return $this->txEndereco;
    }

    /**
     * Set nuEndereco
     *
     * @param string $nuEndereco
     * @return CorporativoEndereco
     */
    public function setNuEndereco($nuEndereco)
    {
        $this->nuEndereco = $nuEndereco;
        return $this;
    }

    /**
     * Get nuEndereco
     *
     * @return string 
     */
    public function getNuEndereco()
    {
        return $this->nuEndereco;
    }

    /**
     * Set txComplemento
     *
     * @param string $txComplemento
     * @return CorporativoEndereco
     */
    public function setTxComplemento($txComplemento)
    {
        $this->txComplemento = $txComplemento;
        return $this;
    }

    /**
     * Get txComplemento
     *
     * @return string 
     */
    public function getTxComplemento()
    {
        return $this->txComplemento;
    }

    /**
     * Set inCorrespondencia
     *
     * @param boolean $inCorrespondencia
     * @return CorporativoEndereco
     */
    public function setInCorrespondencia($inCorrespondencia)
    {
        $this->inCorrespondencia = $inCorrespondencia;
        return $this;
    }

    /**
     * Get inCorrespondencia
     *
     * @return boolean 
     */
    public function getInCorrespondencia()
    {
        return $this->inCorrespondencia;
    }

    /**
     * Set sqMunicipio
     *
     * @param \Core\Entity\Corporativo\CorporativoMunicipio $sqMunicipio
     * @return CorporativoEndereco
     */
    public function setSqMunicipio(\Core\Entity\Corporativo\CorporativoMunicipio $sqMunicipio = null)
    {
        $this->sqMunicipio = $sqMunicipio;
        return $this;
    }

    /**
     * Get sqMunicipio
     *
     * @return \Core\Entity\Corporativo\CorporativoMunicipio 
     */
    public function getSqMunicipio()
    {
        return $this->sqMunicipio;
    }

    /**
     * Set sqPessoa
     *
     * @param \Core\Entity\Corporativo\CorporativoPessoa $sqPessoa
     * @return CorporativoEndereco
     */
    public function setSqPessoa(\Core\Entity\Corporativo\CorporativoPessoa $sqPessoa = null)
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
     * Set sqTipoEndereco
     *
     * @param \Core\Entity\Corporativo\CorporativoTipoEndereco $sqTipoEndereco
     * @return CorporativoEndereco
     */
    public function setSqTipoEndereco(\Core\Entity\Corporativo\CorporativoTipoEndereco $sqTipoEndereco = null)
    {
        $this->sqTipoEndereco = $sqTipoEndereco;
        return $this;
    }

    /**
     * Get sqTipoEndereco
     *
     * @return \Core\Entity\Corporativo\CorporativoTipoEndereco 
     */
    public function getSqTipoEndereco()
    {
        return $this->sqTipoEndereco;
    }
}