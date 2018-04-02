<?php


namespace Core\Entity\Corporativo;
use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoTipoPessoaTipoEmail
 *
 * @ORM\Table(name="corporativo.vw_tipo_pessoa_tipo_email")
 * @ORM\Entity
 */
class CorporativoTipoPessoaTipoEmail
{
    /**
     * @var integer $sqTipoPessoaTipoEmail
     *
     * @ORM\Column(name="sq_tipo_pessoa_tipo_email", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqTipoPessoaTipoEmail;

    /**
     * @var CorporativoTipoEmail
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoTipoEmail")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_tipo_email", referencedColumnName="sq_tipo_email")
     * })
     */
    private $sqTipoEmail;

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
     * Get sqTipoPessoaTipoEmail
     *
     * @return integer 
     */
    public function getSqTipoPessoaTipoEmail()
    {
        return $this->sqTipoPessoaTipoEmail;
    }

    /**
     * Set sqTipoEmail
     *
     * @param CorporativoTipoEmail $sqTipoEmail
     * @return CorporativoTipoPessoaTipoEmail
     */
    public function setSqTipoEmail(\Core\Entity\Corporativo\CorporativoTipoEmail $sqTipoEmail = null)
    {
        $this->sqTipoEmail = $sqTipoEmail;
        return $this;
    }

    /**
     * Get sqTipoEmail
     *
     * @return CorporativoTipoEmail 
     */
    public function getSqTipoEmail()
    {
        return $this->sqTipoEmail;
    }

    /**
     * Set sqTipoPessoa
     *
     * @param CorporativoTipoPessoa $sqTipoPessoa
     * @return CorporativoTipoPessoaTipoEmail
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