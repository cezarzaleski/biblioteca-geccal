<?php


namespace Core\Entity\Corporativo;
use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoTipoPessoa
 *
 * @ORM\Table(name="corporativo.vw_tipo_pessoa")
 * @ORM\Entity
 */
class CorporativoTipoPessoa
{
    /**
     * @var integer $sqTipoPessoa
     *
     * @ORM\Column(name="sq_tipo_pessoa", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqTipoPessoa;

    /**
     * @var string $noTipoPessoa
     *
     * @ORM\Column(name="no_tipo_pessoa", type="string", length=30, nullable=false)
     */
    private $noTipoPessoa;


    /**
     * Get sqTipoPessoa
     *
     * @return integer 
     */
    public function getSqTipoPessoa()
    {
        return $this->sqTipoPessoa;
    }

    /**
     * Set noTipoPessoa
     *
     * @param string $noTipoPessoa
     * @return CorporativoTipoPessoa
     */
    public function setNoTipoPessoa($noTipoPessoa)
    {
        $this->noTipoPessoa = $noTipoPessoa;
        return $this;
    }

    /**
     * Get noTipoPessoa
     *
     * @return string 
     */
    public function getNoTipoPessoa()
    {
        return $this->noTipoPessoa;
    }
}