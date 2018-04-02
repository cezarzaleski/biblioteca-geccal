<?php

namespace Core\Entity\Corporativo;

use Doctrine\ORM\Mapping as ORM;

/**
 * CorporativoExtensaoArquivo
 *
 * @ORM\Table(name="corporativo.vw_extensao_arquivo")
 * @ORM\Entity
 */
class CorporativoExtensaoArquivo
{
    /**
     * @var integer $sqExtensaoArquivo
     *
     * @ORM\Column(name="sq_extensao_arquivo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $sqExtensaoArquivo;

    /**
     * @var string $sgExtensaoArquivo
     *
     * @ORM\Column(name="sg_extensao_arquivo", type="string", length=5, nullable=false)
     */
    private $sgExtensaoArquivo;

    /**
     * @var \Core\Entity\Corporativo\CorporativoTipoMidia
     *
     * @ORM\ManyToOne(targetEntity="\Core\Entity\Corporativo\CorporativoTipoMidia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sq_tipo_midia", referencedColumnName="sq_tipo_midia")
     * })
     */
    private $sqTipoMidia;


    /**
     * Get sqExtensaoArquivo
     *
     * @return integer 
     */
    public function getSqExtensaoArquivo()
    {
        return $this->sqExtensaoArquivo;
    }

    /**
     * Set sgExtensaoArquivo
     *
     * @param string $sgExtensaoArquivo
     * @return CorporativoExtensaoArquivo
     */
    public function setSgExtensaoArquivo($sgExtensaoArquivo)
    {
        $this->sgExtensaoArquivo = $sgExtensaoArquivo;
        return $this;
    }

    /**
     * Get sgExtensaoArquivo
     *
     * @return string 
     */
    public function getSgExtensaoArquivo()
    {
        return $this->sgExtensaoArquivo;
    }

    /**
     * Set sqTipoMidia
     *
     * @param \Core\Entity\Corporativo\CorporativoTipoMidia $sqTipoMidia
     * @return CorporativoExtensaoArquivo
     */
    public function setSqTipoMidia(\Core\Entity\Corporativo\CorporativoTipoMidia $sqTipoMidia = null)
    {
        $this->sqTipoMidia = $sqTipoMidia;
        return $this;
    }

    /**
     * Get sqTipoMidia
     *
     * @return \Core\Entity\Corporativo\CorporativoTipoMidia 
     */
    public function getSqTipoMidia()
    {
        return $this->sqTipoMidia;
    }
}