<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoAgencia
 *
 * @ORM\Table(name="corporativo.vw_agencia")
 * @ORM\Entity
 */
class CorporativoAgencia
{
    /**
     * @var integer $sqAgencia
     *
     * @ORM\Column(name="sq_agencia", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqAgencia;

    /**
     * @var integer $coAgencia
     *
     * @ORM\Column(name="co_agencia", type="integer", nullable=false)
     */
    private $coAgencia;

    /**
     * @var string $noAgencia
     *
     * @ORM\Column(name="no_agencia", type="string", length=100, nullable=false)
     */
    private $noAgencia;

    /**
     * @var integer $coDigitoAgencia
     *
     * @ORM\Column(name="co_digito_agencia", type="integer", nullable=true)
     */
    private $coDigitoAgencia;

    /**
     * @var \Core\Entity\Corporativo\CorporativoBanco
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoBanco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_banco", referencedColumnName="sq_banco")
     * })
     */
    private $sqBanco;


    /**
     * Get sqAgencia
     *
     * @return integer 
     */
    public function getSqAgencia()
    {
        return $this->sqAgencia;
    }

    /**
     * Set coAgencia
     *
     * @param integer $coAgencia
     * @return CorporativoAgencia
     */
    public function setCoAgencia($coAgencia)
    {
        $this->coAgencia = $coAgencia;
        return $this;
    }

    /**
     * Get coAgencia
     *
     * @return integer 
     */
    public function getCoAgencia()
    {
        return $this->coAgencia;
    }

    /**
     * Set noAgencia
     *
     * @param string $noAgencia
     * @return CorporativoAgencia
     */
    public function setNoAgencia($noAgencia)
    {
        $this->noAgencia = $noAgencia;
        return $this;
    }

    /**
     * Get noAgencia
     *
     * @return string 
     */
    public function getNoAgencia()
    {
        return $this->noAgencia;
    }

    /**
     * Set coDigitoAgencia
     *
     * @param integer $coDigitoAgencia
     * @return CorporativoAgencia
     */
    public function setCoDigitoAgencia($coDigitoAgencia)
    {
        $this->coDigitoAgencia = $coDigitoAgencia;
        return $this;
    }

    /**
     * Get coDigitoAgencia
     *
     * @return integer 
     */
    public function getCoDigitoAgencia()
    {
        return $this->coDigitoAgencia;
    }

    /**
     * Set sqBanco
     *
     * @param \Core\Entity\Corporativo\CorporativoBanco $sqBanco
     * @return CorporativoAgencia
     */
    public function setSqBanco(\Core\Entity\Corporativo\CorporativoBanco $sqBanco = null)
    {
        $this->sqBanco = $sqBanco;
        return $this;
    }

    /**
     * Get sqBanco
     *
     * @return CorporativoBanco 
     */
    public function getSqBanco()
    {
        return $this->sqBanco;
    }
}