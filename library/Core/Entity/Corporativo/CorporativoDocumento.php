<?php

namespace Core\Entity\Corporativo;
/**
 * CorporativoDocumento
 *
 * @ORM\Table(name="corporativo.vw_documento")
 * @ORM\Entity
 */
class CorporativoDocumento
{
    /**
     * @var integer $sqDocumento
     *
     * @ORM\Column(name="sq_documento", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqDocumento;

    /**
     * @var string $txValor
     *
     * @ORM\Column(name="tx_valor", type="string", length=50, nullable=false)
     */
    private $txValor;

    /**
     * @var \Core\Entity\Corporativo\CorporativoAtributoTipoDocumento
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoAtributoTipoDocumento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_atributo_tipo_documento", referencedColumnName="sq_atributo_tipo_documento")
     * })
     */
    private $sqAtributoTipoDocumento;

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
     * Get sqDocumento
     *
     * @return integer 
     */
    public function getSqDocumento()
    {
        return $this->sqDocumento;
    }

    /**
     * Set txValor
     *
     * @param string $txValor
     * @return CorporativoDocumento
     */
    public function setTxValor($txValor)
    {
        $this->txValor = $txValor;
        return $this;
    }

    /**
     * Get txValor
     *
     * @return string 
     */
    public function getTxValor()
    {
        return $this->txValor;
    }

    /**
     * Set sqAtributoTipoDocumento
     *
     * @param \Core\Entity\Corporativo\CorporativoAtributoTipoDocumento $sqAtributoTipoDocumento
     * @return CorporativoDocumento
     */
    public function setSqAtributoTipoDocumento(\Core\Entity\Corporativo\CorporativoAtributoTipoDocumento $sqAtributoTipoDocumento = null)
    {
        $this->sqAtributoTipoDocumento = $sqAtributoTipoDocumento;
        return $this;
    }

    /**
     * Get sqAtributoTipoDocumento
     *
     * @return CorporativoAtributoTipoDocumento 
     */
    public function getSqAtributoTipoDocumento()
    {
        return $this->sqAtributoTipoDocumento;
    }

    /**
     * Set sqPessoa
     *
     * @param \Core\Entity\Corporativo\CorporativoPessoa $sqPessoa
     * @return CorporativoDocumento
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