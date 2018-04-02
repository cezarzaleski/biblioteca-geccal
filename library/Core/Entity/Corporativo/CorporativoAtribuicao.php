<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoAtribuicao
 *
 * @ORM\Table(name="corporativo.vw_atribuicao")
 * @ORM\Entity
 */
class CorporativoAtribuicao
{
    /**
     * @var integer $sqAtribuicao
     *
     * @ORM\Column(name="sq_atribuicao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqAtribuicao;

    /**
     * @var string $noAtribuicao
     *
     * @ORM\Column(name="no_atribuicao", type="string", length=50, nullable=false)
     */
    private $noAtribuicao;


    /**
     * Get sqAtribuicao
     *
     * @return integer 
     */
    public function getSqAtribuicao()
    {
        return $this->sqAtribuicao;
    }

    /**
     * Set noAtribuicao
     *
     * @param string $noAtribuicao
     * @return CorporativoAtribuicao
     */
    public function setNoAtribuicao($noAtribuicao)
    {
        $this->noAtribuicao = $noAtribuicao;
        return $this;
    }

    /**
     * Get noAtribuicao
     *
     * @return string 
     */
    public function getNoAtribuicao()
    {
        return $this->noAtribuicao;
    }
}