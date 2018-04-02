<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoEstruturaHidrografica
 *
 * @ORM\Table(name="corporativo.vw_estrutura_hidrografica")
 * @ORM\Entity
 */
class CorporativoEstruturaHidrografica
{
    /**
     * @var integer $sqEstruturaHidrografica
     *
     * @ORM\Column(name="sq_estrutura_hidrografica", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqEstruturaHidrografica;

    /**
     * @var string $noEstruturaHidrografica
     *
     * @ORM\Column(name="no_estrutura_hidrografica", type="string", length=60, nullable=false)
     */
    private $noEstruturaHidrografica;

    /**
     * @var CorporativoEstruturaHidrografica
     *
     * @ORM\ManyToOne(targetEntity="CorporativoEstruturaHidrografica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_estrutura_hidrografica_pai", referencedColumnName="sq_estrutura_hidrografica")
     * })
     */
    private $sqEstruturaHidrograficaPai;

    /**
     * @var \Core\Entity\Corporativo\CorporativoTipoEstruturaHidrografica
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoTipoEstruturaHidrografica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_tipo_estrutura_hidrografica", referencedColumnName="sq_tipo_estrutura_hidrografica")
     * })
     */
    private $sqTipoEstruturaHidrografica;


    /**
     * Get sqEstruturaHidrografica
     *
     * @return integer 
     */
    public function getSqEstruturaHidrografica()
    {
        return $this->sqEstruturaHidrografica;
    }

    /**
     * Set noEstruturaHidrografica
     *
     * @param string $noEstruturaHidrografica
     * @return CorporativoEstruturaHidrografica
     */
    public function setNoEstruturaHidrografica($noEstruturaHidrografica)
    {
        $this->noEstruturaHidrografica = $noEstruturaHidrografica;
        return $this;
    }

    /**
     * Get noEstruturaHidrografica
     *
     * @return string 
     */
    public function getNoEstruturaHidrografica()
    {
        return $this->noEstruturaHidrografica;
    }

    /**
     * Set sqEstruturaHidrograficaPai
     *
     * @param CorporativoEstruturaHidrografica $sqEstruturaHidrograficaPai
     * @return CorporativoEstruturaHidrografica
     */
    public function setSqEstruturaHidrograficaPai(CorporativoEstruturaHidrografica $sqEstruturaHidrograficaPai = null)
    {
        $this->sqEstruturaHidrograficaPai = $sqEstruturaHidrograficaPai;
        return $this;
    }

    /**
     * Get sqEstruturaHidrograficaPai
     *
     * @return CorporativoEstruturaHidrografica 
     */
    public function getSqEstruturaHidrograficaPai()
    {
        return $this->sqEstruturaHidrograficaPai;
    }

    /**
     * Set sqTipoEstruturaHidrografica
     *
     * @param \Core\Entity\Corporativo\CorporativoTipoEstruturaHidrografica $sqTipoEstruturaHidrografica
     * @return CorporativoEstruturaHidrografica
     */
    public function setSqTipoEstruturaHidrografica(\Core\Entity\Corporativo\CorporativoTipoEstruturaHidrografica $sqTipoEstruturaHidrografica = null)
    {
        $this->sqTipoEstruturaHidrografica = $sqTipoEstruturaHidrografica;
        return $this;
    }

    /**
     * Get sqTipoEstruturaHidrografica
     *
     * @return \Core\Entity\Corporativo\CorporativoTipoEstruturaHidrografica 
     */
    public function getSqTipoEstruturaHidrografica()
    {
        return $this->sqTipoEstruturaHidrografica;
    }
}