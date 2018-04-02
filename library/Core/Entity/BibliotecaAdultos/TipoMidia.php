<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * TipoMidia
 *
 * @ORM\Table(name="tipo_midia")
 * @ORM\Entity
 */
class TipoMidia
{
    /**
     * @var integer $idTipoMidia
     *
     * @ORM\Column(name="id_tipo_midia", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTipoMidia;

    /**
     * @var string $noTipo
     *
     * @ORM\Column(name="no_tipo", type="string", length=45, nullable=false)
     */
    private $noTipo;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;


    /**
     * Get idTipoMidia
     *
     * @return integer 
     */
    public function getIdTipoMidia()
    {
        return $this->idTipoMidia;
    }

    /**
     * Set noTipo
     *
     * @param string $noTipo
     * @return TipoMidia
     */
    public function setNoTipo($noTipo)
    {
        $this->noTipo = $noTipo;
        return $this;
    }

    /**
     * Get noTipo
     *
     * @return string 
     */
    public function getNoTipo()
    {
        return $this->noTipo;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return TipoMidia
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