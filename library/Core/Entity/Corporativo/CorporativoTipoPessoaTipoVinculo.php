<?php


namespace \Core\Entity\Corporativo;
use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoTipoPessoaTipoVinculo
 *
 * @ORM\Table(name="corporativo.vw_tipo_pessoa_tipo_vinculo")
 * @ORM\Entity
 */
class CorporativoTipoPessoaTipoVinculo
{
    /**
     * @var integer $sqTipoPessoaTipoVinculo
     *
     * @ORM\Column(name="sq_tipo_pessoa_tipo_vinculo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqTipoPessoaTipoVinculo;

    /**
     * @var CorporativoTipoPessoa
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoTipoPessoa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_tipo_pessoa", referencedColumnName="sq_tipo_pessoa")
     * })
     */
    private $sqTipoPessoa;

    /**
     * @var CorporativoTipoVinculo
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoTipoVinculo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_tipo_vinculo", referencedColumnName="sq_tipo_vinculo")
     * })
     */
    private $sqTipoVinculo;


    /**
     * Get sqTipoPessoaTipoVinculo
     *
     * @return integer 
     */
    public function getSqTipoPessoaTipoVinculo()
    {
        return $this->sqTipoPessoaTipoVinculo;
    }

    /**
     * Set sqTipoPessoa
     *
     * @param CorporativoTipoPessoa $sqTipoPessoa
     * @return CorporativoTipoPessoaTipoVinculo
     */
    public function setSqTipoPessoa(\Core\Entity\Corporativo\CorporativoTipoPessoa $sqTipoPessoa = null)
    {
        $this->sqTipoPessoa = $sqTipoPessoa;
        return $this;
    }

    /**
     * Get sqTipoPessoa
     *
     * @return CorporativoTipoPessoa 
     */
    public function getSqTipoPessoa()
    {
        return $this->sqTipoPessoa;
    }

    /**
     * Set sqTipoVinculo
     *
     * @param CorporativoTipoVinculo $sqTipoVinculo
     * @return CorporativoTipoPessoaTipoVinculo
     */
    public function setSqTipoVinculo(\Core\Entity\Corporativo\CorporativoTipoVinculo $sqTipoVinculo = null)
    {
        $this->sqTipoVinculo = $sqTipoVinculo;
        return $this;
    }

    /**
     * Get sqTipoVinculo
     *
     * @return CorporativoTipoVinculo 
     */
    public function getSqTipoVinculo()
    {
        return $this->sqTipoVinculo;
    }
}