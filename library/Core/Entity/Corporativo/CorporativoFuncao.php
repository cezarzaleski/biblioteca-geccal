<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoFuncao
 *
 * @ORM\Table(name="corporativo.vw_funcao")
 * @ORM\Entity
 */
class CorporativoFuncao
{
    /**
     * @var integer $sqFuncao
     *
     * @ORM\Column(name="sq_funcao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqFuncao;

    /**
     * @var string $noFuncao
     *
     * @ORM\Column(name="no_funcao", type="string", length=50, nullable=false)
     */
    private $noFuncao;


    /**
     * Get sqFuncao
     *
     * @return integer 
     */
    public function getSqFuncao()
    {
        return $this->sqFuncao;
    }

    /**
     * Set noFuncao
     *
     * @param string $noFuncao
     * @return CorporativoFuncao
     */
    public function setNoFuncao($noFuncao)
    {
        $this->noFuncao = $noFuncao;
        return $this;
    }

    /**
     * Get noFuncao
     *
     * @return string 
     */
    public function getNoFuncao()
    {
        return $this->noFuncao;
    }
}