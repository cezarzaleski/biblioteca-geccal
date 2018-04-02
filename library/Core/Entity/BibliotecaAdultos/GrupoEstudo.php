<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * GrupoEstudo
 *
 * @ORM\Table(name="grupo_estudo")
 * @ORM\Entity
 */
class GrupoEstudo
{
    /**
     * @var integer $idGrupoEstudo
     *
     * @ORM\Column(name="id_grupo_estudo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idGrupoEstudo;

    /**
     * @var string $noGrupoEstudo
     *
     * @ORM\Column(name="no_grupo_estudo", type="string", length=45, nullable=false)
     */
    private $noGrupoEstudo;

    /**
     * @var boolean $stAtivo
     *
     * @ORM\Column(name="st_ativo", type="boolean", nullable=false)
     */
    private $stAtivo;

    /**
     * @var TipoGrupo
     *
     * @ORM\ManyToOne(targetEntity="TipoGrupo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_grupo", referencedColumnName="id_tipo_grupo")
     * })
     */
    private $idTipoGrupo;


    /**
     * Get idGrupoEstudo
     *
     * @return integer 
     */
    public function getIdGrupoEstudo()
    {
        return $this->idGrupoEstudo;
    }

    /**
     * Set noGrupoEstudo
     *
     * @param string $noGrupoEstudo
     * @return GrupoEstudo
     */
    public function setNoGrupoEstudo($noGrupoEstudo)
    {
        $this->noGrupoEstudo = $noGrupoEstudo;
        return $this;
    }

    /**
     * Get noGrupoEstudo
     *
     * @return string 
     */
    public function getNoGrupoEstudo()
    {
        return $this->noGrupoEstudo;
    }

    /**
     * Set stAtivo
     *
     * @param boolean $stAtivo
     * @return GrupoEstudo
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
     * Set idTipoGrupo
     *
     * @param TipoGrupo $idTipoGrupo
     * @return GrupoEstudo
     */
    public function setIdTipoGrupo(\TipoGrupo $idTipoGrupo = null)
    {
        $this->idTipoGrupo = $idTipoGrupo;
        return $this;
    }

    /**
     * Get idTipoGrupo
     *
     * @return TipoGrupo 
     */
    public function getIdTipoGrupo()
    {
        return $this->idTipoGrupo;
    }
}