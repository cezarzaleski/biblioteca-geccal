<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * TipoGrupo
 *
 * @ORM\Table(name="tipo_grupo")
 * @ORM\Entity
 */
class TipoGrupo
{
    /**
     * @var integer $idTipoGrupo
     *
     * @ORM\Column(name="id_tipo_grupo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTipoGrupo;

    /**
     * @var string $noTipoGrupo
     *
     * @ORM\Column(name="no_tipo_grupo", type="string", length=45, nullable=false)
     */
    private $noTipoGrupo;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;


    /**
     * Get idTipoGrupo
     *
     * @return integer 
     */
    public function getIdTipoGrupo()
    {
        return $this->idTipoGrupo;
    }

    /**
     * Set noTipoGrupo
     *
     * @param string $noTipoGrupo
     * @return TipoGrupo
     */
    public function setNoTipoGrupo($noTipoGrupo)
    {
        $this->noTipoGrupo = $noTipoGrupo;
        return $this;
    }

    /**
     * Get noTipoGrupo
     *
     * @return string 
     */
    public function getNoTipoGrupo()
    {
        return $this->noTipoGrupo;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return TipoGrupo
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