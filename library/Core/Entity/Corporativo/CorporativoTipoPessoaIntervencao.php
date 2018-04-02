<?php


namespace Core\Entity\Corporativo;
use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoTipoPessoaIntervencao
 *
 * @ORM\Table(name="corporativo.vw_tipo_pessoa_intervencao")
 * @ORM\Entity
 */
class CorporativoTipoPessoaIntervencao
{
    /**
     * @var integer $sqTipoPessoaIntervencao
     *
     * @ORM\Column(name="sq_tipo_pessoa_intervencao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     */
    private $sqTipoPessoaIntervencao;

    /**
     * @var CorporativoIntervencao
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoIntervencao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_intervencao", referencedColumnName="sq_intervencao")
     * })
     */
    private $sqIntervencao;

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
     * Get sqTipoPessoaIntervencao
     *
     * @return integer 
     */
    public function getSqTipoPessoaIntervencao()
    {
        return $this->sqTipoPessoaIntervencao;
    }

    /**
     * Set sqIntervencao
     *
     * @param CorporativoIntervencao $sqIntervencao
     * @return CorporativoTipoPessoaIntervencao
     */
    public function setSqIntervencao(\Core\Entity\Corporativo\CorporativoIntervencao $sqIntervencao = null)
    {
        $this->sqIntervencao = $sqIntervencao;
        return $this;
    }

    /**
     * Get sqIntervencao
     *
     * @return CorporativoIntervencao 
     */
    public function getSqIntervencao()
    {
        return $this->sqIntervencao;
    }

    /**
     * Set sqTipoPessoa
     *
     * @param CorporativoTipoPessoa $sqTipoPessoa
     * @return CorporativoTipoPessoaIntervencao
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