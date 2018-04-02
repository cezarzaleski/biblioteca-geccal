<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoFeriado
 *
 * @ORM\Table(name="corporativo.vw_feriado")
 * @ORM\Entity
 */
class CorporativoFeriado
{
    /**
     * @var integer $sqFeriado
     *
     * @ORM\Column(name="sq_feriado", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqFeriado;

    /**
     * @var string $deFeriado
     *
     * @ORM\Column(name="de_feriado", type="string", length=50, nullable=false)
     */
    private $deFeriado;

    /**
     * @var datetime $dtFeriado
     *
     * @ORM\Column(name="dt_feriado", type="datetime", nullable=true)
     */
    private $dtFeriado;

    /**
     * Get sqFeriado
     *
     * @return integer 
     */
    public function getSqFeriado()
    {
        return $this->sqFeriado;
    }

    /**
     * Set deFeriado
     *
     * @param string $deFeriado
     * @return CorporativoFeriado
     */
    public function setDeFeriado($deFeriado)
    {
        $this->deFeriado = $deFeriado;
        return $this;
    }

    /**
     * Get deFeriado
     *
     * @return string 
     */
    public function getDeFeriado()
    {
        return $this->deFeriado;
    }

    /**
     * Set dtFeriado
     *
     * @param datetime $dtFeriado
     * @return CorporativoFeriado
     */
    public function setDtFeriado($dtFeriado)
    {
        $this->dtFeriado = $dtFeriado;
        return $this;
    }

    /**
     * Get dtFeriado
     *
     * @return datetime 
     */
    public function getDtFeriado()
    {
        return $this->dtFeriado;
    }
}