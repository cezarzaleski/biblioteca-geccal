<?php


namespace Core\Entity\Corporativo;
use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoTipoPessoaDocumento
 *
 * @ORM\Table(name="corporativo.vw_tipo_pessoa_documento")
 * @ORM\Entity
 */
class CorporativoTipoPessoaDocumento
{
    /**
     * @var integer $sqTipoPessoaDocumento
     *
     * @ORM\Column(name="sq_tipo_pessoa_documento", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqTipoPessoaDocumento;

    /**
     * @var boolean $stObrigatorio
     *
     * @ORM\Column(name="st_obrigatorio", type="boolean", nullable=false)
     */
    private $stObrigatorio;

    /**
     * @var CorporativoTipoDocumento
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoTipoDocumento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_tipo_documento", referencedColumnName="sq_tipo_documento")
     * })
     */
    private $sqTipoDocumento;

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
     * Get sqTipoPessoaDocumento
     *
     * @return integer 
     */
    public function getSqTipoPessoaDocumento()
    {
        return $this->sqTipoPessoaDocumento;
    }

    /**
     * Set stObrigatorio
     *
     * @param boolean $stObrigatorio
     * @return CorporativoTipoPessoaDocumento
     */
    public function setStObrigatorio($stObrigatorio)
    {
        $this->stObrigatorio = $stObrigatorio;
        return $this;
    }

    /**
     * Get stObrigatorio
     *
     * @return boolean 
     */
    public function getStObrigatorio()
    {
        return $this->stObrigatorio;
    }

    /**
     * Set sqTipoDocumento
     *
     * @param CorporativoTipoDocumento $sqTipoDocumento
     * @return CorporativoTipoPessoaDocumento
     */
    public function setSqTipoDocumento(\Core\Entity\Corporativo\CorporativoTipoDocumento $sqTipoDocumento = null)
    {
        $this->sqTipoDocumento = $sqTipoDocumento;
        return $this;
    }

    /**
     * Get sqTipoDocumento
     *
     * @return CorporativoTipoDocumento 
     */
    public function getSqTipoDocumento()
    {
        return $this->sqTipoDocumento;
    }

    /**
     * Set sqTipoPessoa
     *
     * @param CorporativoTipoPessoa $sqTipoPessoa
     * @return CorporativoTipoPessoaDocumento
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