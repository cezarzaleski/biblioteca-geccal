<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoEsfera
 *
 * @ORM\Table(name="corporativo.vw_esfera")
 * @ORM\Entity
 */
class CorporativoEsfera
{
    /**
     * @var integer $sqEsfera
     *
     * @ORM\Column(name="sq_esfera", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqEsfera;

    /**
     * @var text $noEsfera
     *
     * @ORM\Column(name="no_esfera", type="text", nullable=false)
     */
    private $noEsfera;


    /**
     * Get sqEsfera
     *
     * @return integer 
     */
    public function getSqEsfera()
    {
        return $this->sqEsfera;
    }

    /**
     * Set noEsfera
     *
     * @param text $noEsfera
     * @return CorporativoEsfera
     */
    public function setNoEsfera($noEsfera)
    {
        $this->noEsfera = $noEsfera;
        return $this;
    }

    /**
     * Get noEsfera
     *
     * @return text 
     */
    public function getNoEsfera()
    {
        return $this->noEsfera;
    }
}