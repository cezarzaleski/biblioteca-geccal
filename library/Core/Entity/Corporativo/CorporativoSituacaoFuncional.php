<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoSituacaoFuncional
 *
 * @ORM\Table(name="corporativo.vw_situacao_funcional")
 * @ORM\Entity
 */
class CorporativoSituacaoFuncional
{
    /**
     * @var integer $sqSituacaoFuncional
     *
     * @ORM\Column(name="sq_situacao_funcional", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqSituacaoFuncional;

    /**
     * @var string $noSituacaoFuncional
     *
     * @ORM\Column(name="no_situacao_funcional", type="string", length=50, nullable=false)
     */
    private $noSituacaoFuncional;


    /**
     * Get sqSituacaoFuncional
     *
     * @return integer 
     */
    public function getSqSituacaoFuncional()
    {
        return $this->sqSituacaoFuncional;
    }

    /**
     * Set noSituacaoFuncional
     *
     * @param string $noSituacaoFuncional
     * @return CorporativoSituacaoFuncional
     */
    public function setNoSituacaoFuncional($noSituacaoFuncional)
    {
        $this->noSituacaoFuncional = $noSituacaoFuncional;
        return $this;
    }

    /**
     * Get noSituacaoFuncional
     *
     * @return string 
     */
    public function getNoSituacaoFuncional()
    {
        return $this->noSituacaoFuncional;
    }
}