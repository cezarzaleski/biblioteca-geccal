<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoTipoEstruturaHidrografica
 *
 * @ORM\Table(name="corporativo.vw_tipo_estrutura_hidrografica")
 * @ORM\Entity
 */
class CorporativoTipoEstruturaHidrografica
{
    /**
     * @var integer $sqTipoEstruturaHidrografica
     *
     * @ORM\Column(name="sq_tipo_estrutura_hidrografica", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqTipoEstruturaHidrografica;

    /**
     * @var string $noTipoEstruturaHidrografica
     *
     * @ORM\Column(name="no_tipo_estrutura_hidrografica", type="string", length=30, nullable=false)
     */
    private $noTipoEstruturaHidrografica;

    /**
     * Get sqTipoEstruturaHidrografica
     *
     * @return integer 
     */
    public function getSqTipoEstruturaHidrografica()
    {
        return $this->sqTipoEstruturaHidrografica;
    }

    /**
     * Set noTipoEstruturaHidrografica
     *
     * @param string $noTipoEstruturaHidrografica
     * @return CorporativoTipoEstruturaHidrografica
     */
    public function setNoTipoEstruturaHidrografica($noTipoEstruturaHidrografica)
    {
        $this->noTipoEstruturaHidrografica = $noTipoEstruturaHidrografica;
        return $this;
    }

    /**
     * Get noTipoEstruturaHidrografica
     *
     * @return string 
     */
    public function getNoTipoEstruturaHidrografica()
    {
        return $this->noTipoEstruturaHidrografica;
    }
}