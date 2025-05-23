<?php


namespace Core\Entity\BibliotecaInfantil;
use Doctrine\ORM\Mapping as ORM;

/**
 * Perfil
 *
 * @ORM\Table(name="perfil")
 * @ORM\Entity
 */
class Perfil
{
    /**
     * @var integer $idPerfil
     *
     * @ORM\Column(name="id_perfil", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPerfil;

    /**
     * @var string $noPerfil
     *
     * @ORM\Column(name="no_perfil", type="string", length=45, nullable=false)
     */
    private $noPerfil;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Funcionalidade", mappedBy="idPerfil")
     */
    private $idFuncionalidade;

    public function __construct()
    {
        $this->idFuncionalidade = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get idPerfil
     *
     * @return integer 
     */
    public function getIdPerfil()
    {
        return $this->idPerfil;
    }

    /**
     * Set noPerfil
     *
     * @param string $noPerfil
     * @return Perfil
     */
    public function setNoPerfil($noPerfil)
    {
        $this->noPerfil = $noPerfil;
        return $this;
    }

    /**
     * Get noPerfil
     *
     * @return string 
     */
    public function getNoPerfil()
    {
        return $this->noPerfil;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return Perfil
     */
    public function setStAtivo($stAtivo)
    {
        $this->stAtivo = $stAtivo;
        return $this;
    }

    /**
     * Get stAtivo
     *
     * @return boolean 
     */
    public function getStAtivo()
    {
        return $this->stAtivo;
    }

    /**
     * Add idFuncionalidade
     *
     * @param Funcionalidade $idFuncionalidade
     * @return Perfil
     */
    public function addFuncionalidade(\Core\Entity\BibliotecaInfantil\Funcionalidade $idFuncionalidade)
    {
        $this->idFuncionalidade[] = $idFuncionalidade;
        return $this;
    }

    /**
     * Get idFuncionalidade
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getIdFuncionalidade()
    {
        return $this->idFuncionalidade;
    }
}