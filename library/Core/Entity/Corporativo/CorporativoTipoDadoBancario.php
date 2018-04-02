<?php

namespace Core\Entity\Corporativo;
use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoTipoDadoBancario
 *
 * @ORM\Table(name="corporativo.vw_tipo_dado_bancario")
 * @ORM\Entity
 */
class CorporativoTipoDadoBancario
{
    /**
     * @var integer $sqTipoDadoBancario
     *
     * @ORM\Column(name="sq_tipo_dado_bancario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqTipoDadoBancario;

    /**
     * @var string $noTipoDadoBancario
     *
     * @ORM\Column(name="no_tipo_dado_bancario", type="string", length=30, nullable=false)
     */
    private $noTipoDadoBancario;

    /**
     * Get sqTipoDadoBancario
     *
     * @return integer 
     */
    public function getSqTipoDadoBancario()
    {
        return $this->sqTipoDadoBancario;
    }

    /**
     * Set noTipoDadoBancario
     *
     * @param string $noTipoDadoBancario
     * @return CorporativoTipoDadoBancario
     */
    public function setNoTipoDadoBancario($noTipoDadoBancario)
    {
        $this->noTipoDadoBancario = $noTipoDadoBancario;
        return $this;
    }

    /**
     * Get noTipoDadoBancario
     *
     * @return string 
     */
    public function getNoTipoDadoBancario()
    {
        return $this->noTipoDadoBancario;
    }
}