<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoIndicativoFimVinculo
 *
 * @ORM\Table(name="corporativo.vw_indicativo_fim_vinculo")
 * @ORM\Entity
 */
class CorporativoIndicativoFimVinculo
{
    /**
     * @var integer $sqIndicativoFimVinculo
     *
     * @ORM\Column(name="sq_indicativo_fim_vinculo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqIndicativoFimVinculo;

    /**
     * @var string $noIndicativoFimVinculo
     *
     * @ORM\Column(name="no_indicativo_fim_vinculo", type="string", length=50, nullable=false)
     */
    private $noIndicativoFimVinculo;

    /**
     * Get sqIndicativoFimVinculo
     *
     * @return integer 
     */
    public function getSqIndicativoFimVinculo()
    {
        return $this->sqIndicativoFimVinculo;
    }

    /**
     * Set noIndicativoFimVinculo
     *
     * @param string $noIndicativoFimVinculo
     * @return CorporativoIndicativoFimVinculo
     */
    public function setNoIndicativoFimVinculo($noIndicativoFimVinculo)
    {
        $this->noIndicativoFimVinculo = $noIndicativoFimVinculo;
        return $this;
    }

    /**
     * Get noIndicativoFimVinculo
     *
     * @return string 
     */
    public function getNoIndicativoFimVinculo()
    {
        return $this->noIndicativoFimVinculo;
    }
}