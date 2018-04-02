<?php


namespace Core\Entity\Corporativo;
use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoTipoTelefone
 *
 * @ORM\Table(name="corporativo.vw_tipo_telefone")
 * @ORM\Entity
 */
class CorporativoTipoTelefone
{
    /**
     * @var integer $sqTipoTelefone
     *
     * @ORM\Column(name="sq_tipo_telefone", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqTipoTelefone;

    /**
     * @var string $noTipoTelefone
     *
     * @ORM\Column(name="no_tipo_telefone", type="string", length=50, nullable=false)
     */
    private $noTipoTelefone;


    /**
     * Get sqTipoTelefone
     *
     * @return integer 
     */
    public function getSqTipoTelefone()
    {
        return $this->sqTipoTelefone;
    }

    /**
     * Set noTipoTelefone
     *
     * @param string $noTipoTelefone
     * @return CorporativoTipoTelefone
     */
    public function setNoTipoTelefone($noTipoTelefone)
    {
        $this->noTipoTelefone = $noTipoTelefone;
        return $this;
    }

    /**
     * Get noTipoTelefone
     *
     * @return string 
     */
    public function getNoTipoTelefone()
    {
        return $this->noTipoTelefone;
    }
}