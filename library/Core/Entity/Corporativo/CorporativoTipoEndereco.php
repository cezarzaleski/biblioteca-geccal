<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoTipoEndereco
 *
 * @ORM\Table(name="corporativo.vw_tipo_endereco")
 * @ORM\Entity
 */
class CorporativoTipoEndereco
{
    /**
     * @var integer $sqTipoEndereco
     *
     * @ORM\Column(name="sq_tipo_endereco", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $sqTipoEndereco;

    /**
     * @var text $noTipoEndereco
     *
     * @ORM\Column(name="no_tipo_endereco", type="text", nullable=false)
     */
    private $noTipoEndereco;

    /**
     * Get sqTipoEndereco
     *
     * @return integer 
     */
    public function getSqTipoEndereco()
    {
        return $this->sqTipoEndereco;
    }

    /**
     * Set noTipoEndereco
     *
     * @param text $noTipoEndereco
     * @return CorporativoTipoEndereco
     */
    public function setNoTipoEndereco($noTipoEndereco)
    {
        $this->noTipoEndereco = $noTipoEndereco;
        return $this;
    }

    /**
     * Get noTipoEndereco
     *
     * @return text 
     */
    public function getNoTipoEndereco()
    {
        return $this->noTipoEndereco;
    }
}