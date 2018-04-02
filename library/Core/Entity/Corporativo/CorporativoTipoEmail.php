<?php

namespace Core\Entity\Corporativo;
use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoTipoEmail
 *
 * @ORM\Table(name="corporativo.vw_tipo_email")
 * @ORM\Entity
 */
class CorporativoTipoEmail
{
    /**
     * @var integer $sqTipoEmail
     *
     * @ORM\Column(name="sq_tipo_email", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqTipoEmail;

    /**
     * @var string $noTipoEmail
     *
     * @ORM\Column(name="no_tipo_email", type="string", length=50, nullable=false)
     */
    private $noTipoEmail;

    /**
     * Get sqTipoEmail
     *
     * @return integer 
     */
    public function getSqTipoEmail()
    {
        return $this->sqTipoEmail;
    }

    /**
     * Set noTipoEmail
     *
     * @param string $noTipoEmail
     * @return CorporativoTipoEmail
     */
    public function setNoTipoEmail($noTipoEmail)
    {
        $this->noTipoEmail = $noTipoEmail;
        return $this;
    }

    /**
     * Get noTipoEmail
     *
     * @return string 
     */
    public function getNoTipoEmail()
    {
        return $this->noTipoEmail;
    }
}