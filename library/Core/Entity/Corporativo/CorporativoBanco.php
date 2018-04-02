<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoBanco
 *
 * @ORM\Table(name="corporativo.vw_banco")
 * @ORM\Entity
 */
class CorporativoBanco
{
    /**
     * @var integer $sqBanco
     *
     * @ORM\Column(name="sq_banco", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqBanco;

    /**
     * @var string $noBanco
     *
     * @ORM\Column(name="no_banco", type="string", length=100, nullable=false)
     */
    private $noBanco;

    /**
     * @var string $coBanco
     *
     * @ORM\Column(name="co_banco", type="string", nullable=true)
     */
    private $coBanco;


    /**
     * Get sqBanco
     *
     * @return integer 
     */
    public function getSqBanco()
    {
        return $this->sqBanco;
    }

    /**
     * Set noBanco
     *
     * @param string $noBanco
     * @return CorporativoBanco
     */
    public function setNoBanco($noBanco)
    {
        $this->noBanco = $noBanco;
        return $this;
    }

    /**
     * Get noBanco
     *
     * @return string 
     */
    public function getNoBanco()
    {
        return $this->noBanco;
    }

    /**
     * Set coBanco
     *
     * @param string $coBanco
     * @return CorporativoBanco
     */
    public function setCoBanco($coBanco)
    {
        $this->coBanco = $coBanco;
        return $this;
    }

    /**
     * Get coBanco
     *
     * @return string 
     */
    public function getCoBanco()
    {
        return $this->coBanco;
    }
}