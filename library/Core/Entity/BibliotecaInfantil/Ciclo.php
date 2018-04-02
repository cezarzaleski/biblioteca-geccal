<?php


namespace Core\Entity\BibliotecaInfantil;
use Doctrine\ORM\Mapping as ORM;

/**
 * Ciclo
 *
 * @ORM\Table(name="ciclo")
 * @ORM\Entity
 */
class Ciclo
{
    /**
     * @var integer $idCiclo
     *
     * @ORM\Column(name="id_ciclo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCiclo;

    /**
     * @var string $noCiclo
     *
     * @ORM\Column(name="no_ciclo", type="string", length=45, nullable=false)
     */
    private $noCiclo;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;


    /**
     * Get idCiclo
     *
     * @return integer 
     */
    public function getIdCiclo()
    {
        return $this->idCiclo;
    }

    /**
     * Set noCiclo
     *
     * @param string $noCiclo
     * @return Ciclo
     */
    public function setNoCiclo($noCiclo)
    {
        $this->noCiclo = $noCiclo;
        return $this;
    }

    /**
     * Get noCiclo
     *
     * @return string 
     */
    public function getNoCiclo()
    {
        return $this->noCiclo;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return Ciclo
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
}