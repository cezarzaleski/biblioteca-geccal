<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoIntervencao
 *
 * @ORM\Table(name="corporativo.vw_intervencao")
 * @ORM\Entity
 */
class CorporativoIntervencao
{
    /**
     * @var integer $sqIntervencao
     *
     * @ORM\Column(name="sq_intervencao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqIntervencao;

    /**
     * @var string $noIntervencao
     *
     * @ORM\Column(name="no_intervencao", type="string", length=50, nullable=false)
     */
    private $noIntervencao;

    /**
     * Get sqIntervencao
     *
     * @return integer 
     */
    public function getSqIntervencao()
    {
        return $this->sqIntervencao;
    }

    /**
     * Set noIntervencao
     *
     * @param string $noIntervencao
     * @return CorporativoIntervencao
     */
    public function setNoIntervencao($noIntervencao)
    {
        $this->noIntervencao = $noIntervencao;
        return $this;
    }

    /**
     * Get noIntervencao
     *
     * @return string 
     */
    public function getNoIntervencao()
    {
        return $this->noIntervencao;
    }
}