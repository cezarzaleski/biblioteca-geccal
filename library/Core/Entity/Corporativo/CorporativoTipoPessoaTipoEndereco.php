<?php


namespace Core\Entity\Corporativo;
use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoTipoPessoaTipoEndereco
 *
 * @ORM\Table(name="corporativo.vw_tipo_pessoa_tipo_endereco")
 * @ORM\Entity
 */
class CorporativoTipoPessoaTipoEndereco
{
    /**
     * @var integer $sqTipoPessoaTipoEndereco
     *
     * @ORM\Column(name="sq_tipo_pessoa_tipo_endereco", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     */
    private $sqTipoPessoaTipoEndereco;

    /**
     * @var CorporativoTipoEndereco
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoTipoEndereco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_tipo_endereco", referencedColumnName="sq_tipo_endereco")
     * })
     */
    private $sqTipoEndereco;

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
     * Get sqTipoPessoaTipoEndereco
     *
     * @return integer 
     */
    public function getSqTipoPessoaTipoEndereco()
    {
        return $this->sqTipoPessoaTipoEndereco;
    }

    /**
     * Set sqTipoEndereco
     *
     * @param CorporativoTipoEndereco $sqTipoEndereco
     * @return CorporativoTipoPessoaTipoEndereco
     */
    public function setSqTipoEndereco(\Core\Entity\Corporativo\CorporativoTipoEndereco $sqTipoEndereco = null)
    {
        $this->sqTipoEndereco = $sqTipoEndereco;
        return $this;
    }

    /**
     * Get sqTipoEndereco
     *
     * @return CorporativoTipoEndereco 
     */
    public function getSqTipoEndereco()
    {
        return $this->sqTipoEndereco;
    }

    /**
     * Set sqTipoPessoa
     *
     * @param CorporativoTipoPessoa $sqTipoPessoa
     * @return CorporativoTipoPessoaTipoEndereco
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
}