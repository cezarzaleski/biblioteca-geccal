<?php


namespace Core\Entity\Corporativo;
use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoTipoPessoaTipoDadoBancario
 *
 * @ORM\Table(name="corporativo.vw_tipo_pessoa_tipo_dado_bancario")
 * @ORM\Entity
 */
class CorporativoTipoPessoaTipoDadoBancario
{
    /**
     * @var integer $sqTipoPessoaTipoDadoBancario
     *
     * @ORM\Column(name="sq_tipo_pessoa_tipo_dado_bancario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     */
    private $sqTipoPessoaTipoDadoBancario;

    /**
     * @var CorporativoTipoDadoBancario
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoTipoDadoBancario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_tipo_dado_bancario", referencedColumnName="sq_tipo_dado_bancario")
     * })
     */
    private $sqTipoDadoBancario;

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
     * Get sqTipoPessoaTipoDadoBancario
     *
     * @return integer 
     */
    public function getSqTipoPessoaTipoDadoBancario()
    {
        return $this->sqTipoPessoaTipoDadoBancario;
    }

    /**
     * Set sqTipoDadoBancario
     *
     * @param CorporativoTipoDadoBancario $sqTipoDadoBancario
     * @return CorporativoTipoPessoaTipoDadoBancario
     */
    public function setSqTipoDadoBancario(\Core\Entity\Corporativo\CorporativoTipoDadoBancario $sqTipoDadoBancario = null)
    {
        $this->sqTipoDadoBancario = $sqTipoDadoBancario;
        return $this;
    }

    /**
     * Get sqTipoDadoBancario
     *
     * @return CorporativoTipoDadoBancario 
     */
    public function getSqTipoDadoBancario()
    {
        return $this->sqTipoDadoBancario;
    }

    /**
     * Set sqTipoPessoa
     *
     * @param CorporativoTipoPessoa $sqTipoPessoa
     * @return CorporativoTipoPessoaTipoDadoBancario
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