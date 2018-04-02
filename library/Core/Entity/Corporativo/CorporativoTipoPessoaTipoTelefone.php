<?php


namespace Core\Entity\Corporativo;
use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoTipoPessoaTipoTelefone
 *
 * @ORM\Table(name="corporativo.vw_tipo_pessoa_tipo_telefone")
 * @ORM\Entity
 */
class CorporativoTipoPessoaTipoTelefone
{
    /**
     * @var integer $sqTipoPessoaTipoTelefone
     *
     * @ORM\Column(name="sq_tipo_pessoa_tipo_telefone", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqTipoPessoaTipoTelefone;

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
     * @var CorporativoTipoTelefone
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoTipoTelefone")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_tipo_telefone", referencedColumnName="sq_tipo_telefone")
     * })
     */
    private $sqTipoTelefone;


    /**
     * Get sqTipoPessoaTipoTelefone
     *
     * @return integer 
     */
    public function getSqTipoPessoaTipoTelefone()
    {
        return $this->sqTipoPessoaTipoTelefone;
    }

    /**
     * Set sqTipoPessoa
     *
     * @param CorporativoTipoPessoa $sqTipoPessoa
     * @return CorporativoTipoPessoaTipoTelefone
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
     * Set sqTipoTelefone
     *
     * @param CorporativoTipoTelefone $sqTipoTelefone
     * @return CorporativoTipoPessoaTipoTelefone
     */
    public function setSqTipoTelefone(\Core\Entity\Corporativo\CorporativoTipoTelefone $sqTipoTelefone = null)
    {
        $this->sqTipoTelefone = $sqTipoTelefone;
        return $this;
    }

    /**
     * Get sqTipoTelefone
     *
     * @return CorporativoTipoTelefone 
     */
    public function getSqTipoTelefone()
    {
        return $this->sqTipoTelefone;
    }
}